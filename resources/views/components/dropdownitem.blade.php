@props(['active' => false])

<a {{ $attributes }} class="{{$active ? 'bg-gray-100 outline-hidden' : ''}} block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200" role="menuitem" tabindex="-1"
>{{$slot}}</a>