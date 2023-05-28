<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Decrypt') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __('Upload to Decrypt PDF File') }}

                    <form method="POST" action="{{ route('decrypt.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-4">
                            <label for="pdf" class="block text-gray-700 font-bold mb-2">Select PDF File</label>
                            <input type="file" id="pdf" name="file" accept=".pdf"
                                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>

                        <button type="submit"
                            class="bg-cyan-600 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                            {{ __('Upload') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
