<x-layout>
    <x-slot:heading>Dashboard</x-slot:heading>
    @if(!$subscribers->isEmpty())
    <div class="align-middle justify-items-center"><h1 class="text-3xl">Subscribed events</h1></div>
    <div class="mt-5 mb-5 align-middle justify-items-center">
        <table>
            <tr class="border-b-4">
                <th class="pl-3 pr-3">Name</th>
                <th class="pl-3 pr-3">Date</th>
                <th class="pl-3 pr-3">Location</th>
                <th class="pl-3 pr-3">Type</th>
                <th class="pl-3 pr-3">Details</th>
                <th class="pl-3 pr-3">Unsubscribe</th>
            </tr>
            @foreach ($subscribers as $subscriber)
            <tr class="border-b-4">
                <td class="pl-3 pr-3 border-r-4">{{$subscriber->event->name}}</td>
                <td class="pl-3 pr-3 border-r-4">{{$subscriber->event->dateTime}}</td>
                <td class="pl-3 pr-3 border-r-4">{{$subscriber->event->location}}</td>
                <td class="pl-3 pr-3 border-r-4">{{$subscriber->event->type}}</td>
                <td class="pl-3 pr-3 pt-2 pb-2 border-r-4"><x-table-button href="/events/{{ $subscriber->event->id }}">Details</x-table-button></td>
                <td class="pl-3 pr-3 pt-2 pb-2"><x-table-button href="/subscriptions/{{ $subscriber->id }}">Unsubscribe</x-table-button></td>
            </tr>
            @endforeach
        </table>
    </div>
    @endif
    <x-button-long href="/events/create">Create new event</x-button-long>
    @if(!$events->isEmpty())
    <div class="align-middle justify-items-center mt-5"><h1 class="text-3xl">Own events</h1></div>
    <div class="mt-5 mb-5 align-middle justify-items-center">
        <table>
            <tr class="border-b-4">
                <th class="pl-3 pr-3">Name</th>
                <th class="pl-3 pr-3">Date</th>
                <th class="pl-3 pr-3">Location</th>
                <th class="pl-3 pr-3">Type</th>
                <th class="pl-3 pr-3">Details</th>
            </tr>
            @foreach ($events as $event)
            <tr class="border-b-4">
                <td class="pl-3 pr-3 border-r-4">{{$event->name}}</td>
                <td class="pl-3 pr-3 border-r-4">{{$event->dateTime}}</td>
                <td class="pl-3 pr-3 border-r-4">{{$event->location}}</td>
                <td class="pl-3 pr-3 border-r-4">{{$event->type}}</td>
                <td class="pl-3 pr-3 pt-2 pb-2 border-r-4"><x-table-button href="/events/{{ $event->id }}">Details</x-table-button></td>
            </tr>
            @endforeach
        </table>
    </div>
    @endif
</x-layout>