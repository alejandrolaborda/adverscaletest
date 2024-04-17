<div class="mb-4">
    <label for="dob">{{$attributes['title']}}</label>
    <div class="flex flex-row w-full">
        <select wire:model.change="form.{{$attributes['fieldName']}}Month" class="flex-1 p-2 @error("form.{$attributes['fieldName']}Month") border-2 border-rose-500 @enderror">
            <option value="">Month</option>
            @foreach ($months as $monthNumber => $monthName)
                <option value="{{ $monthNumber }}">{{ $monthName }}</option>
            @endforeach
        </select>
        <select wire:model.change="form.{{$attributes['fieldName']}}Day" class="flex-1 p-2 mx-2 @error("form.{$attributes['fieldName']}Day") border-2 border-rose-500 @enderror">
            <option value="">Day</option>
            @for ($day = 1; $day <= 31; $day++) 
                <option value="{{ $day }}">{{ $day }}</option>
            @endfor
        </select>
        <select wire:model.change="form.{{$attributes['fieldName']}}Year" class="flex-1 p-2 @error("form.{$attributes['fieldName']}Year") border-2 border-rose-500 @enderror">
            <option value="">Year</option>
            @for ($year = now()->year; $year >= 1900; $year--)
                <option value="{{ $year }}">{{ $year }}</option>
            @endfor
        </select>
    </div>
    
    <input type="hidden" wire:model="form.{{$attributes['fieldName']}}" />
    @error("form.{$attributes['fieldName']}") <span class="error-message">{{ $message }}</span> @enderror
</div>










