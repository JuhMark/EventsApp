<x-layout>
    <x-slot:heading>{{auth()->user()->firstName." ".auth()->user()->lastName}}</x-slot:heading>
    <x-list>
        <li class="mb-1 mt-1">Email: {{auth()->user()->email}}</li>
        <li class="mb-1 mt-1">Phone number: {{auth()->user()->phone ? auth()->user()->phone : "Not provided"}}</li>
        <li class="mb-1 mt-1">Address: {{auth()->user()->address ? auth()->user()->address : "Not provided"}}</li>
    </x-list>
    <div>
        <x-button-long href="/profile/edit">Edit profile</x-button-long>
    </div>
</x-layout>