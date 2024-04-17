<div class="min-h-screen flex flex-col items-center justify-center bg-gray-900">
    <div id="form-wrapper">
        <form wire:submit="save">
            @if($currentStep == 'step-one')           

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

                    <!-- Country of Origin -->
                    <x-country-selector wire:model="form.countryOfBirth" title="Country of Origin"/>

                    <!-- Date of Birth -->
                    <x-date-selector wire:model="form" fieldName="dateOfBirth" title="Date of Birth"/>                 
                
                    <!-- Buttons -->
                    <div class="flex justify-between">
                        <button type="button" wire:click="resetForm" class="bg-gray-500 hover:bg-gray-700 font-bold py-2 px-4 rounded">
                            Reset Form
                        </button>
                
                        </button>
                        <button type="button" wire:click="setStep('step-two')" class="bg-blue-500 hover:bg-blue-700 font-bold py-2 px-4 rounded">
                            Next
                        </button>
                    </div>
                </div>

            @else

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

                        <!-- Date of Marriage -->
                        <x-date-selector wire:model="form" fieldName="dateOfMarriage" title="Date of Marriage"/>
                        <!-- Country of Marriage -->
                        <x-country-selector wire:model="form.countryOfMarriage" title="Country of Marriage"/>

                
                    @elseif ($form->isMarried === '0')
                    
                        <!-- Fields that show up if the user is not married -->
                        <div class="mb-4">
                            <label for="form.isWidowed" class="block  text-white">Are you widowed?</label>
                            <select wire:model.change="form.isWidowed" class="w-full p-2 rounded bg-gray-700 @error('form.isWidowed') border-2 border-rose-500 @enderror">
                                <option value="">Choose...</option>
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                            @error('form.isWidowed') <span class="error-message">{{ $message }}</span> @enderror
                        </div>
                
                        <div class="mb-4">
                            <label for="form.isEverMarried" class="block  text-white">Have you ever been married in the past?</label>
                            <select wire:model.change="form.isEverMarried" class="w-full p-2 rounded bg-gray-700 @error('form.isEverMarried') border-2 border-rose-500 @enderror">
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
                        <button type="button" wire:click="setStep('step-one')" class="bg-blue-500 hover:bg-blue-700 font-bold py-2 px-4 rounded">
                            Previous
                        </button>
                        <button type="submit" class="bg-green-200 hover:bg-green-800 font-bold py-2 px-4 rounded">
                            Submit
                        </button>
                    </div>
                </div>
                
            @endif

        </form>
    </div>
</div>
