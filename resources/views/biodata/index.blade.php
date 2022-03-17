<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Manage Biodata') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">

            <div class="mt-10 sm:mt-0">
                @livewire('biodata.list-all')
            </div>
            <x-jet-section-border />

        </div>
    </div>
</x-app-layout>
