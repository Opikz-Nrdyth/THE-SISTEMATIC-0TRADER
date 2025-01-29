<div class="group mt-3">
    <label for="{{ $name }}"
        class="ml-[2.5%] mb-2 block group-focus-within:text-white peer-focus:text-white">{{ $placeholder }}</label>
    <select id="{{ $name }}" name="{{ $name }}"
        class="peer w-[95%] ml-[2.5%] py-3 px-2 @if ($disabled) bg-base-input-disabled @else bg-base-input @endif text-white outline-primary border-none rounded-md"
        value="{{ $value }}" @if ($model) wire:model.defer="{{ $model }}" @endif>
        <option value="" disabled selected hidden>Pilih {{ $placeholder }}</option>
        @foreach ($options as $option)
            <option value="{{ trim($option) }}" {{ $value == trim($option) ? 'selected' : '' }}>
                {{ trim($option) }}
            </option>
        @endforeach
    </select>
</div>
