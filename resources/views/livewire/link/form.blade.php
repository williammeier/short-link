<div>
    <x-form wire:submit="save">
        <label class="text-lg font-semibold label-text">
            Paste your long link here
            <x-input wire:model="original_url" class="mt-2 font-normal" />
        </label>
        @if ($errors->any())
            {{ implode('', $errors->all('<div>:message</div>')) }}
        @endif

        <div class="py-2 text-start">
            <x-button class="text-lg text-base-100 btn-primary" type="submit"
                spinner="save">
                Get your link for free
                <x-icon name="o-arrow-right" />
            </x-button>
        </div>
    </x-form>


</div>
