<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use App\Models\File;
use Illuminate\Http\Request;
use Smalot\PdfParser\Parser;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Crypt as AES;

class FileController extends Controller
{
    //
    public function index()
    {
        $indexes = File::all(); // Ganti 'Index' dengan model yang sesuai

        if (session(key: "success_message")) {
        }
        Alert::success('Success', session(key: "success_message"));

        return view('encrypt.index', compact('indexes'));
    }

    //upload file

    public function store(Request $request)
    {
        $file = $request->file;

        $request->validate([
            'file' => 'required|mimes:pdf',
        ]);

        // Gunakan pdf parser untuk membaca konten dari file pdf
        $fileName = $file->getClientOriginalName();

        $pdfParser = new Parser();
        $pdf = $pdfParser->parseFile($file->path());
        $content = $pdf->getText();

        // Enkripsi konten menggunakan AES
        $encryptedContent = AES::encrypt($content);

        // Mendapatkan angka auto-increment berikutnya
        $nextIncrement = File::count() + 1;

        // Ubah nama file menjadi "encrypt.pdf" dengan penambahan angka auto-increment
        $newFileName = "encrypt{$nextIncrement}.pdf";

        // Simpan file di storage dengan nama baru
        $path = $file->storeAs('pdf_files', $newFileName, 'public');

        // Buat objek Dompdf
        $dompdf = new Dompdf();

        // Render konten terenkripsi sebagai HTML
        $dompdf->loadHtml($encryptedContent);

        // Render HTML menjadi file PDF
        $dompdf->render();

        // Simpan hasil render sebagai file PDF
        $newPdfFilePath = 'pdf_files/' . $newFileName;
        Storage::disk('public')->put($newPdfFilePath, $dompdf->output());

        $upload_file = new File;
        $upload_file->orig_filename = $fileName;
        $upload_file->mime_type = $file->getMimeType();
        $upload_file->filesize = $file->getSize();
        $upload_file->content = $encryptedContent;
        $upload_file->file_path = Storage::disk('public')->url($newPdfFilePath); // Simpan URL file di dalam kolom "file_path"
        $upload_file->save();


        return redirect()->back()->with('success_messsage', "File submitted");
    }
}
