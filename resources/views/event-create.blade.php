<x-layout>
  <x-slot:heading>Create event</x-slot:heading>

  <form method="POST" action="/events/create" enctype="multipart/form-data">
    @csrf
    <div class="space-y-12">
      <div class="border-b border-gray-900/10 pb-12">
        <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
          <x-form-field class="col-span-3">
            <x-form-label for="firstName">Name</x-form-label>
            <div class="mt-2">
              <x-form-input type="text" name="name" id="name" required placeholder="Name of the event"
                :value="old('name')" />
            </div>
          </x-form-field>
          <x-form-field class="col-span-3">
            <x-form-label for="dateTime">Date</x-form-label>
            <div class="mt-2">
              <x-form-input type="datetime-local" name="dateTime" id="dateTime" required placeholder="Date of the event"
                :value="old('dateTime')" />
            </div>
          </x-form-field>
          <x-form-field class="col-span-3">
            <x-form-label for="location">Location</x-form-label>
            <div class="mt-2">
              <x-form-input type="text" name="location" id="location" required placeholder="Location of the event"
                :value="old('location')" />
            </div>
          </x-form-field>
          <x-form-field class="col-span-3">
            <x-form-label for="type">Type</x-form-label>
            <div class="mt-2">
              <x-form-input type="text" name="type" id="type" required placeholder="Type of the event"
                :value="old('type')" />
            </div>
          </x-form-field>
          <x-form-field class="col-span-6">
            <x-form-label for="description">Description</x-form-label>
            <div class="mt-2">
              <x-form-input type="text" name="description" id="description" placeholder="Description of the event"
                :value="old('description')" />
            </div>
          </x-form-field>
          <x-form-field class="col-span-6">
            <x-form-label for="image">Image</x-form-label>
            <div class="mt-2">
              <x-form-input type="file" name="image" id="image" placeholder="Picture of the event"/>
            </div>
          </x-form-field>
        </div>
      </div>
    </div>
    <div class="sm:col-span-4">
      <x-form-error></x-form-error>
    </div>
    <div class="mt-6 flex items-center justify-end gap-x-6">
      <x-form-cancel href="/dashboard"></x-form-cancel>
      <x-form-button type="submit">Create</x-form-button>
    </div>
  </form>
</x-layout>