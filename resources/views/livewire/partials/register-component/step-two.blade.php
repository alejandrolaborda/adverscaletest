<div>
    <!-- Is married -->
    <div class="mb-4">
        <label for="form.isMarried">Are you married?</label>
        <select wire:model.change="form.isMarried" class="w-full p-2 rounded bg-gray-700 @error('form.isMarried') border-2 border-rose-500 @enderror">
            <option value="">Choose...</option>
            <option value="1">Yes</option>
            <option value="0">No</option>
        </select>
        @error('form.isMarried') <span class="error-message">{{ $message }}</span> @enderror
    </div>

    @if ($form->isMarried === '1')

        <div class="mb-4">
            <label for="dob">Date of Marriage</label>
            <div class="flex flex-row w-full">
                <select wire:model.blur="form.dateOfMarriageMonth" class="flex-1 p-2 @error('form.dateOfMarriageMonth') border-2 border-rose-500 @enderror">
                    <option value="">Month</option>
                    @foreach ($form::MONTHS as $monthNumber => $monthName)
                    <option value="{{ $monthNumber }}">{{ $monthName }}</option>
                    @endforeach
                </select>
                <select wire:model.blur="form.dateOfMarriageDay" class="flex-1 p-2 mx-2 @error('form.dateOfMarriageDay') border-2 border-rose-500 @enderror">
                    <option value="">Day</option>
                    @for ($day = 1; $day <= 31; $day++) <option value="{{ $day }}">{{ $day }}</option>
                        @endfor
                </select>
                <select wire:model.blur="form.dateOfMarriageYear" class="flex-1 p-2 @error('form.dateOfMarriageYear') border-2 border-rose-500 @enderror">
                    <option value="">Year</option>
                    @for ($year = now()->year; $year >= 1900; $year--)
                    <option value="{{ $year }}">{{ $year }}</option>
                    @endfor
                </select>
            </div>
            @error('form.dateOfMarriageMonth') <span class="error-message">{{ $message }}</span> @enderror
            @error('form.dateOfMarriageDay') <span class="error-message">{{ $message }}</span> @enderror
            @error('form.dateOfMarriageYear') <span class="error-message">{{ $message }}</span> @enderror
        </div>


        <div class="mb-4">
            <label for="form.countryOfMarriage">Country of Marriage</label>
            <select wire:model.blur="form.countryOfMarriage" class="w-full @error('form.countryOfMarriage') border-2 border-rose-500 @enderror" >
                <option value="">Select Country</option>
                @foreach ($form::COUNTRIES as $countryCode => $countryName)
                    <option value="{{ $countryCode }}">{{ $countryName }}</option>
                @endforeach
            </select>
            @error('form.countryOfMarriage') <span class="error-message">{{ $message }}</span> @enderror
        </div>

    @elseif ($form->isMarried === '0')
    
        <!-- Fields that show up if the user is not married -->
        <div class="mb-4">
            <label for="form.isWidowed" class="block  text-white">Are you widowed?</label>
            <select wire:model.blur="form.isWidowed" class="w-full p-2 rounded bg-gray-700 @error('form.isWidowed') border-2 border-rose-500 @enderror">
                <option value="">Choose...</option>
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
            @error('form.isWidowed') <span class="error-message">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="form.isEverMarried" class="block  text-white">Have you ever been married in the past?</label>
            <select wire:model.blur="form.isEverMarried" class="w-full p-2 rounded bg-gray-700 @error('form.isEverMarried') border-2 border-rose-500 @enderror">
                <option value="">Choose...</option>
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
            @error('form.isEverMarried') <span class="error-message">{{ $message }}</span> @enderror
            @error('form.marriage18') <span class="error-message">{{ $message }}</span> @enderror
        </div>
    @endif

    <!-- Buttons -->
    <div class="flex justify-between">
        <button type="button" wire:click="prevStep" class="bg-blue-500 hover:bg-blue-700 font-bold py-2 px-4 rounded">
            Previous
        </button>
        <button type="submit" class="bg-green-200 hover:bg-green-800 font-bold py-2 px-4 rounded">
            Submit
            <div wire:loading>
                <svg>...</svg>
            </div>
        </button>
    </div>
</div>