<x-layout>
    <x-slot:heading>Events you're not subscribed to</x-slot:heading>
    <form method="post" action="/events">
        @csrf
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <x-form-field class="col-span-3">
                        <x-form-label for="location">Location</x-form-label>
                        <div class="mt-2">
                            <x-form-input type="text" name="location" id="location" placeholder="Location of the event"
                                :value="$location" />
                        </div>
                    </x-form-field>
                    <x-form-field class="col-span-3">
                        <x-form-label for="type">Type</x-form-label>
                        <div class="mt-2">
                            <x-form-input type="text" name="type" id="type" placeholder="Type of the event"
                                :value="$type" />
                        </div>
                    </x-form-field>
                    <x-form-field class="col-span-3">
                        <x-form-label for="dateFrom">From date</x-form-label>
                        <div class="mt-2">
                            <x-form-input type="datetime-local" name="dateFrom" id="dateFrom" placeholder="From date"
                                :value="$dateFrom" />
                        </div>
                    </x-form-field>
                    <x-form-field class="col-span-3">
                        <x-form-label for="dateTime">To date</x-form-label>
                        <div class="mt-2">
                            <x-form-input type="datetime-local" name="dateTo" id="dateTo" placeholder="To date"
                                :value="$dateTo" />
                        </div>
                    </x-form-field>
                </div>
                <div class="mt-6 flex items-center justify-end gap-x-6">
                    <x-form-cancel href="/events"></x-form-cancel>
                    <x-form-button type="submit">Search</x-form-button>
                </div>
            </div>
        </div>
    </form>
    @if(!$events->isEmpty())
        <div class="mt-5 mb-5 align-middle justify-items-center">
            <table>
                <tr class="border-b-4">
                    <th class="pl-3 pr-3">Name</th>
                    <th class="pl-3 pr-3">Date</th>
                    <th class="pl-3 pr-3">Location</th>
                    <th class="pl-3 pr-3">Type</th>
                    <th class="pl-3 pr-3">Details</th>
                    <th class="pl-3 pr-3">Subscribe</th>
                </tr>
                @foreach ($events as $event)
                    <tr class="border-b-4">
                        <td class="pl-3 pr-3 border-r-4">{{$event->name}}</td>
                        <td class="pl-3 pr-3 border-r-4">{{$event->dateTime}}</td>
                        <td class="pl-3 pr-3 border-r-4">{{$event->location}}</td>
                        <td class="pl-3 pr-3 border-r-4">{{$event->type}}</td>
                        <td class="pl-3 pr-3 pt-2 pb-2 border-r-4"><x-table-button
                                href="/events/{{ $event->id }}">Details</x-table-button></td>
                        <td class="pl-3 pr-3 pt-2 pb-2"><x-table-button
                                href="/events/subscribe/{{ $event->id }}">Subscribe</x-table-button></td>
                    </tr>
                @endforeach
            </table>
        </div>
    @endif
</x-layout>