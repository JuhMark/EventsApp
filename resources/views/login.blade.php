<x-layout>
    <x-slot:heading>Login</x-slot:heading>

    <form method="POST" action="/login">
    @csrf
    <div class="space-y-12">
        <div class="border-b border-gray-900/10 pb-12">
        <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <x-form-field class="col-span-6">
              <x-form-label for="email">Email</x-form-label>
              <div class="mt-2">
                <x-form-input type="email" name="email" id="email" required placeholder="Your email"/>
              </div>
            </x-form-field>
            <x-form-field class="col-span-6">
              <x-form-label for="password">Password</x-form-label>
              <div class="mt-2">
                <x-form-input type="password" name="password" id="password" required placeholder="Your password"/>
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
    <x-form-button type="submit">Login</x-form-button>
  </div>
</form>
<div class="mt-5">
    <x-button-long href="/register">Not registered yet? Click here!</x-button-long>
</div>
</x-layout>