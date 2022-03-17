<x-jet-form-section submit="updateUserBiodata">
    <x-slot name="title">
        {{ __('Update Biodata') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Make Other user know you') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">

            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="phone" value="{{ __('phone') }}" />
                <x-jet-input id="phone" type="text" class="block w-full mt-1" wire:model.defer="state.phone" autocomplete="phone" />
                <x-jet-input-error for="phone" class="mt-2" />
            </div>

            <div>
                <x-jet-label for="address" value="{{ __('Address') }}" />

                <div class="mt-1">
                  <textarea wire:model.defer="state.address"
                  rows="4" name="comment" id="comment" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"></textarea>
                </div>
                <x-jet-input-error for="address" class="mt-2" />
            </div>
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

        <x-jet-button>
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
