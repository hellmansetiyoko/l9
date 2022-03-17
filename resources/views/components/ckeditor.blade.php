@props([
    'textId',
    'data'
])
<div {{ $attributes }}

        wire:ignore
        x-data
        x-init="
        CKEDITOR.replace( $refs.area.getAttribute('id') ).on('change', function(evt){
            $dispatch('input', evt.editor.getData())
        });

        CKEDITOR.instances[$refs.area.getAttribute('id')].setData('{{$data}}');
        "
        class="mt-1">
        <textarea x-ref="area" id="{{ $textId }}"
        class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea>

    </div>
