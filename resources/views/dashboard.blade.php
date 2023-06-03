<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-3 gap-4">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-900 dark:text-gray-100">User Count</h3>
                        <div class="mt-4 text-4xl font-bold text-gray-900 dark:text-gray-100">{{ $userCount }}</div>
                    </div>
                </div>
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-900 dark:text-gray-100">Encrypt Count</h3>
                        <div class="mt-4 text-4xl font-bold text-gray-900 dark:text-gray-100">{{ $encryptCount }}</div>
                    </div>
                </div>
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-900 dark:text-gray-100">Decrypt Count</h3>
                        <div class="mt-4 text-4xl font-bold text-gray-900 dark:text-gray-100">{{ $decryptCount }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
