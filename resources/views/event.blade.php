<x-layout>
    <x-slot:heading>{{$event->name.' - '.$event->dateTime.' - '.$event->location}}</x-slot:heading>
    <x-list>
        @if($event->image)
        <li class="mb-1 mt-1">Image:<img class="w-3xl h-52" src="{{ asset($event->image) }}" alt="Picture of the event"></li>
        @else
        <li class="mb-1 mt-1">Image: Not provided</li>
        @endif
        <li class="mb-1 mt-1">Type: {{$event->type}}</li>
        <li class="mb-1 mt-1">Description: {{$event->description ? $event->description : "Not provided"}}</li>
    </x-list>
    @can('belongs',$event->id)
    <div>
        <x-button-long href="/events/edit/{{ $event->id }}">Edit event</x-button-long>
    </div>
    <div class="mt-5">
        <x-button-long href="/events/delete/{{ $event->id }}">Delete event</x-button-long>
    </div>
    @endcan
</x-layout>