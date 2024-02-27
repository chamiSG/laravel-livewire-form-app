<form class="w-full border border-gray-900/10 p-10 rounded-lg" wire:submit.prevent="store">
    @if ($step == 1)
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-lg font-semibold leading-7 text-gray-900">Personal Information</h2>

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-3">
                        <label for="firstName" class="block text-sm font-medium leading-6 text-gray-900">First
                            Name</label>
                        <div class="mt-2">
                            <input type="text" name="firstName" id="firstName" wire:model.defer="firstName"
                                class='block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6'>
                            @error('firstName')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="sm:col-span-3">
                        <label for="lastName" class="block text-sm font-medium leading-6 text-gray-900">Last
                            Name</label>
                        <div class="mt-2">
                            <input type="text" name="lastName" id="lastName" wire:model.defer="lastName"
                                class='block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6'>
                            @error('lastName')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="sm:col-span-3">
                        <label for="address" class="block text-sm font-medium leading-6 text-gray-900">Address</label>
                        <div class="mt-2">
                            <input type="text" name="address" id="address" wire:model.defer="address"
                                class='block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6'>
                            @error('address')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="sm:col-span-3">
                        <label for="city" class="block text-sm font-medium leading-6 text-gray-900">City</label>
                        <div class="mt-2">
                            <input type="text" name="city" id="city" wire:model.defer="city"
                                class='block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6'>
                            @error('city')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="sm:col-span-3">
                        <label for="country" class="block text-sm font-medium leading-6 text-gray-900">Country</label>
                        <div class="mt-2 w-full">
                            <select name="country" id="country" wire:model.defer="country"
                                class='block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6'>
                                @foreach ($countryOptions as $option)
                                    <option value="{{ $option['value'] }}">{{ $option['label'] }}</option>
                                @endforeach
                            </select>
                            @error('country')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="sm:col-span-3">
                        <label for="dateOfBirth" class="block text-sm font-medium leading-6 text-gray-900">Date of
                            birth</label>
                        <div class="mt-2 flex gap-3">
                            <select name="birthMonth" id="birthMonth" wire:model.defer="birthMonth"
                                class='block w-48 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6'>
                                @foreach ($monthsOptions as $option)
                                    <option value="{{ $option['value'] }}">{{ $option['label'] }}</option>
                                @endforeach
                            </select>
                            <select name="birthDay" id="birthDay" wire:model.defer="birthDay"
                                class='block w-24 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6'>
                                @foreach ($daysOptions as $option)
                                    <option value="{{ $option['value'] }}">{{ $option['label'] }}</option>
                                @endforeach
                            </select>
                            <select name="birthYear" id="birthYear" wire:model.defer="birthYear"
                                class='block w-28 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6'>
                                @foreach ($yearsOptions as $option)
                                    <option value="{{ $option['value'] }}">{{ $option['label'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        @if ($errors->has('birthMonth') || $errors->has('birthDay') || $errors->has('birthYear'))
                            <p class="text-sm text-red-600">The Date of birth field is required.</p>
                        @endif
                        @if ($errors->has('birthDate'))
                            <p class="text-sm text-red-600">{{ $errors->first('birthDate') }}</p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="mt-6 flex items-center justify-end gap-x-6">
                <button type="button" wire:click="next"
                    class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-700">Next</button>
            </div>
        </div>
    @elseif ($step == 2)
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-3">
                        <label for="isMarried" class="block mb-3 text-lg font-medium leading-6 text-gray-900">Are you
                            married?</label>
                        <div class="mt-2">
                            <div class="flex gap-2 items-center">
                                <input type="radio" name="isMarried" id="isMarriedYes" value="1"
                                    wire:model.defer="isMarried"
                                    class='h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500'><label
                                    class="text-base font-medium leading-6 text-gray-900" for="isMarriedYes">Yes</label>
                            </div>
                            <div class="flex gap-2 items-center">
                                <input type="radio" name="isMarried" id="isMarriedNo" value="0"
                                    wire:model.defer="isMarried"
                                    class='h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500'><label
                                    class="text-base font-medium leading-6 text-gray-900" for="isMarriedNo">No</label>
                            </div>

                            @error('isMarried')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-6 flex items-center justify-between gap-x-6">
                <button type="button" wire:click="previous"
                    class="rounded-md bg-gray-100 px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm hover:bg-gray-200 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-600">Preview</button>

                <button type="button" wire:click="next"
                    class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-700">Next</button>
            </div>
        </div>
    @elseif ($step == 3)
        @if ($isMarried)
            <div class="space-y-12">
                <div class="border-b border-gray-900/10 pb-12">
                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="sm:col-span-3">
                            <label for="dateOfMarriage" class="block text-sm font-medium leading-6 text-gray-900">Date of marriage</label>
                            <div class="mt-2 flex gap-3">
                                <select name="marriageMonth" id="marriageMonth" wire:model.defer="marriageMonth"
                                    class='block w-48 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6'>
                                    @foreach ($monthsOptions as $option)
                                        <option value="{{ $option['value'] }}">{{ $option['label'] }}</option>
                                    @endforeach
                                </select>
                                <select name="marriageDay" id="marriageDay" wire:model.defer="marriageDay"
                                    class='block w-24 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6'>
                                    @foreach ($daysOptions as $option)
                                        <option value="{{ $option['value'] }}">{{ $option['label'] }}</option>
                                    @endforeach
                                </select>
                                <select name="marriageYear" id="marriageYear" wire:model.defer="marriageYear"
                                    class='block w-28 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6'>
                                    @foreach ($yearsOptions as $option)
                                        <option value="{{ $option['value'] }}">{{ $option['label'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @if ($errors->has('marriageMonth') || $errors->has('marriageDay') || $errors->has('marriageYear'))
                                <p class="text-sm text-red-600">The Date of marriage field is required.</p>
                            @endif
                            @if ($errors->has('marriageDate'))
                                <p class="text-sm text-red-600">{{ $errors->first('marriageDate') }}</p>
                            @endif
                        </div>
                        <div class="sm:col-span-3">
                            <label for="marriageCountry"
                                class="block text-sm font-medium leading-6 text-gray-900">Country of marriage</label>
                            <div class="mt-2">
                                <select name="marriageCountry" id="marriageCountry"
                                    wire:model.defer="marriageCountry"
                                    class='block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6'>
                                    @foreach ($countryOptions as $option)
                                        <option value="{{ $option['value'] }}">{{ $option['label'] }}</option>
                                    @endforeach
                                </select>
                                @error('marriageCountry')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-6 flex items-center justify-between gap-x-6">
                    <button type="button" wire:click="previous"
                        class="rounded-md bg-gray-100 px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm hover:bg-gray-200 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-600">Preview</button>

                    <button type="submit"
                        class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-700">Submit</button>
                </div>
            </div>
        @else
            <div class="space-y-12">
                <div class="border-b border-gray-900/10 pb-12">
                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="sm:col-span-3">
                            <label for="isWidowed" class="block mb-3 text-lg font-medium leading-6 text-gray-900">Are
                                you widowed?</label>
                            <div class="mt-2">
                                <div class="flex gap-2 items-center">
                                    <input type="radio" name="isWidowed" id="isWidowedYes" value="1"
                                        wire:model.defer="isWidowed"
                                        class='h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500'><label
                                        class="text-base font-medium leading-6 text-gray-900"
                                        for="isWidowedYes">Yes</label>
                                </div>
                                <div class="flex gap-2 items-center">
                                    <input type="radio" name="isWidowed" id="isWidowedNo" value="0"
                                        wire:model.defer="isWidowed"
                                        class='h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500'><label
                                        class="text-base font-medium leading-6 text-gray-900"
                                        for="isWidowedNo">No</label>
                                </div>

                                @error('isWidowed')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="sm:col-span-3">
                            <label for="isWidowed" class="block mb-3 text-lg font-medium leading-6 text-gray-900">Have
                                you ever been married in the past?</label>
                            <div class="mt-2">
                                <div class="flex gap-2 items-center">
                                    <input type="radio" name="hasBeenMarried" id="hasBeenMarriedYes"
                                        value="1" wire:model.defer="hasBeenMarried"
                                        class='h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500'><label
                                        class="text-base font-medium leading-6 text-gray-900"
                                        for="hasBeenMarriedYes">Yes</label>
                                </div>
                                <div class="flex gap-2 items-center">
                                    <input type="radio" name="hasBeenMarried" id="hasBeenMarriedNo" value="0"
                                        wire:model.defer="hasBeenMarried"
                                        class='h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500'><label
                                        class="text-base font-medium leading-6 text-gray-900"
                                        for="hasBeenMarriedNo">No</label>
                                </div>

                                @error('hasBeenMarried')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-6 flex items-center justify-between gap-x-6">
                    <button type="button" wire:click="previous"
                        class="rounded-md bg-gray-100 px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm hover:bg-gray-200 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-600">Preview</button>

                    <button type="submit"
                        class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-700">Submit</button>
                </div>
            </div>
        @endif

    @endif
</form>
