<div>
    <!-- First Name -->
    <div class="mb-4">
        <label for="form.firstName">First Name</label>
        <input wire:model.blur="form.firstName" type="text" class="@error('form.firstName') border-2 border-rose-500 @enderror">
        @error('form.firstName') <span class="error-message">{{ $message }}</span> @enderror
    </div>

    <!-- Last Name -->
    <div class="mb-4">
        <label for="form.lastName">Last Name</label>
        <input wire:model.blur="form.lastName" type="text" class="@error('form.lastName') border-2 border-rose-500 @enderror">
        @error('form.lastName') <span class="error-message">{{ $message }}</span> @enderror
    </div>

    <!-- Address -->
    <div class="mb-4">
        <label for="form.address">Address</label>
        <input wire:model.blur="form.address" type="text" class="@error('form.address') border-2 border-rose-500 @enderror">
        @error('form.address') <span class="error-message">{{ $message }}</span> @enderror
    </div>

    <!-- City -->
    <div class="mb-4">
        <label for="form.city">City</label>
        <input wire:model.blur="form.city" type="text" class="@error('form.city') border-2 border-rose-500 @enderror">
        @error('form.city') <span class="error-message">{{ $message }}</span> @enderror
    </div>

    <div class="mb-4">
        <label for="form.countryOfBirth">Country of Origin</label>
        <select wire:model.change="form.countryOfBirth" class="w-full @error('form.countryOfBirth') border-2 border-rose-500 @enderror" >
            <option value="">Select Country</option>
            @foreach ($form::COUNTRIES as $countryCode => $countryName)
                <option value="{{ $countryCode }}">{{ $countryName }}</option>
            @endforeach
        </select>
        @error('form.countryOfBirth') <span class="error-message">{{ $message }}</span> @enderror
    </div>

    <div class="mb-4">
        <label for="dob">Date of Birth</label>
        <div class="flex flex-row w-full">
            <select wire:model.change="form.dateOfBirthMonth" class="flex-1 p-2 @error('form.dateOfBirthMonth') border-2 border-rose-500 @enderror">
                <option value="">Month</option>
                @foreach ($form::MONTHS as $monthNumber => $monthName)
                <option value="{{ $monthNumber }}">{{ $monthName }}</option>
                @endforeach
            </select>
            <select wire:model.change="form.dateOfBirthDay" class="flex-1 p-2 mx-2 @error('form.dateOfBirthDay') border-2 border-rose-500 @enderror">
                <option value="">Day</option>
                @for ($day = 1; $day <= 31; $day++) <option value="{{ $day }}">{{ $day }}</option>
                    @endfor
            </select>
            <select wire:model.change="form.dateOfBirthYear" class="flex-1 p-2 @error('form.dateOfBirthYear') border-2 border-rose-500 @enderror">
                <option value="">Year</option>
                @for ($year = now()->year; $year >= 1900; $year--)
                <option value="{{ $year }}">{{ $year }}</option>
                @endfor
            </select>
        </div>
        @error('form.dateOfBirthMonth') <span class="error-message">{{ $message }}</span> @enderror
        @error('form.dateOfBirthDay') <span class="error-message">{{ $message }}</span> @enderror
        @error('form.dateOfBirthYear') <span class="error-message">{{ $message }}</span> @enderror
    </div>

    <!-- Buttons -->
    <div class="flex justify-between">
        <button type="button" wire:click="resetForm" class="bg-gray-500 hover:bg-gray-700 font-bold py-2 px-4 rounded">
            Reset Form
        </button>

        </button>
        <button type="button" wire:click="nextStep" class="bg-blue-500 hover:bg-blue-700 font-bold py-2 px-4 rounded">
            Next
        </button>
    </div>
</div>