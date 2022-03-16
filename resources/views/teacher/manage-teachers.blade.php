<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Manage Teachers') }}
        </h2>
    </x-slot>

    <div>
        <div class="py-10 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="mt-10 sm:mt-0 mb-3">
                <div class="grid grid-cols-1">
                    <div class="justify-self-end">
                        <x-jet-danger-button class="bg-green-700 hover:bg-green-800">
                        add
                        </x-jet-danger-button>
                    </div>

                </div>
            </div>

            <div class="mt-10 sm:mt-0">
                @livewire('teacher.list-teacher')
            </div>
            <x-jet-section-border />
        </div>
    </div>
</x-app-layout>
