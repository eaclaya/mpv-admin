<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Clients') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-2 text-gray-900 lg:p-6 dark:text-gray-100">
                    <div class="flex items-end justify-end px-3">
                        <x-button-link href="{{ route('clients.create') }}" class>New Client</x-button-link>
                    </div>
                    <livewire:client-table />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
