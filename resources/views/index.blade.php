<x-layout>
    <x-slot:heading>Welcome</x-slot:heading>
    @guest
    <div>
    <x-button-long href="/login">
        Login
    </x-button-long>
</div><div class="mt-5">
    <x-button-long href="/register">
        Register
    </x-button-long>
    </div>
    @endguest
</x-layout>