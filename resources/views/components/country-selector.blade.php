<div class="mb-4">
    <label for="{{ $attributes['wire:model'] }}">{{$attributes['title']}}</label>
    <select wire:model="{{ $attributes['wire:model'] }}" class="w-full @error($attributes['wire:model']) border-2 border-rose-500 @enderror">
        <option value="">Select Country</option>
        @foreach ($countries as $countryCode => $countryName)
            <option value="{{ $countryCode }}">{{ $countryName }}</option>
        @endforeach
    </select>
    @error($attributes['wire:model']) <span class="error-message">{{ $message }}</span> @enderror
</div>