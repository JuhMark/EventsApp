<x-layout>
    <x-slot:heading>Register</x-slot:heading>

    <form method="POST" action="/register">
    @csrf
    <div class="space-y-12">
        <div class="border-b border-gray-900/10 pb-12">
        <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <x-form-field class="col-span-3">
              <x-form-label for="firstName">First name</x-form-label>
              <div class="mt-2">
                <x-form-input type="text" name="firstName" id="firstName" required placeholder="Your first name" :value="old('firstName')"/>
              </div>
            </x-form-field>
            <x-form-field class="col-span-3">
              <x-form-label for="lastName">Last name</x-form-label>
              <div class="mt-2">
                <x-form-input type="text" name="lastName" id="lastName" required placeholder="Your last name" :value="old('lastName')"/>
              </div>
            </x-form-field>
            <x-form-field class="col-span-6">
              <x-form-label for="email">Email</x-form-label>
              <div class="mt-2">
                <x-form-input type="email" name="email" id="email" required placeholder="Your email" :value="old('email')"/>
              </div>
            </x-form-field>
            <x-form-field class="col-span-3">
              <x-form-label for="password">Password</x-form-label>
              <div class="mt-2">
                <x-form-input type="password" name="password" id="password" required placeholder="Your password"/>
              </div>
            </x-form-field>
            <x-form-field class="col-span-3">
              <x-form-label for="password_confirmation">Password again</x-form-label>
              <div class="mt-2">
                <x-form-input type="password" name="password_confirmation" id="password_confirmation" required placeholder="Your password again"/>
              </div>
            </x-form-field>
            <x-form-field class="col-span-3">
              <x-form-label for="address">Address</x-form-label>
              <div class="mt-2">
                <x-form-input type="text" name="address" id="address" placeholder="Your address" :value="old('address')"/>
              </div>
            </x-form-field>
            <x-form-field class="col-span-3">
              <x-form-label for="phone">Phone number</x-form-label>
              <div class="mt-2">
                <x-form-input type="phone" name="phone" id="phone" placeholder="Your phone number" :value="old('phone')"/>
              </div>
            </x-form-field>
          </div>
        </div>
    </div>
    <div class="sm:col-span-4">
    <x-form-error></x-form-error>
  </div>
  <div class="mt-6 flex items-center justify-end gap-x-6">
    <x-form-cancel href="/"></x-form-cancel>
    <x-form-button type="submit">Register</x-form-button>
  </div>
</form>
</x-layout>