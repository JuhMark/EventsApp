<x-layout>
    <x-slot:heading>Edit profile</x-slot:heading>
    <form method="POST" action="/profile/edit">
        @csrf
        @method('PATCH')

        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <x-form-field class="col-span-3">
                        <x-form-label for="firstName">First name</x-form-label>
                        <div class="mt-2">
                            <x-form-input type="text" name="firstName" id="firstName" required
                                placeholder="Your first name" :value="Auth::user()->firstName" />
                        </div>
                    </x-form-field>
                    <x-form-field class="col-span-3">
                        <x-form-label for="lastName">Last name</x-form-label>
                        <div class="mt-2">
                            <x-form-input type="text" name="lastName" id="lastName" required
                                placeholder="Your last name" :value="Auth::user()->lastName" />
                        </div>
                    </x-form-field>
                    <x-form-field class="col-span-6">
                        <x-form-label for="email">Email</x-form-label>
                        <div class="mt-2">
                            <x-form-input type="email" name="email" id="email" required placeholder="Your email"
                                :value="Auth::user()->email" />
                        </div>
                    </x-form-field>
                    <x-form-field class="col-span-3">
                        <x-form-label for="address">Address</x-form-label>
                        <div class="mt-2">
                            <x-form-input type="text" name="address" id="address" placeholder="Your address"
                                :value="Auth::user()->address" />
                        </div>
                    </x-form-field>
                    <x-form-field class="col-span-3">
                        <x-form-label for="phone">Phone number</x-form-label>
                        <div class="mt-2">
                            <x-form-input type="phone" name="phone" id="phone" placeholder="Your phone number"
                                :value="Auth::user()->phone" />
                        </div>
                    </x-form-field>
                    <div class="sm:col-span-4">
                        <x-form-error></x-form-error>
                    </div>
                    <div class="mt-6 flex items-center justify-end gap-x-6">
                        <x-form-cancel href="/dashboard"></x-form-cancel>
                        <x-form-button type="submit">Update profile</x-form-button>
                    </div>
    </form>
</x-layout>