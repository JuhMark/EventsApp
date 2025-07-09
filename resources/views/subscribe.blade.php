<x-layout>
    <x-slot:heading>New subscription</x-slot:heading>
    <div>
        <h1 class="text-2xl">Are you sure you want to subscribe to this event?</h1>
    </div>
    <div class="mt-5">
    <x-button-long href="/dashboard">No</x-button-long>
    </div>
    <form method="POST" action="/events/subscribe/{{ $event->id }}" class="mt-5">
    @csrf
    <div class="space-y-12">
        <div class="pb-12">
            <div>
                <x-button-long type="submit" onclick="this.closest('form').submit();return false;">Yes</x-button-long>
            </div>
        </div>
    </div>
    </form>
</x-layout>