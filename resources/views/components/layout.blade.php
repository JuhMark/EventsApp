<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EventsApp</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
          let menu_open = true;
          function toggleMenu(){
            if(menu_open){
              $("#mobile-menu").hide();
            } else {
              $("#mobile-menu").show();
            }
            menu_open = !menu_open;
          }
          let account_open = false;
          function toggleAccountMenu(){
            if(account_open){
              $("#account-menu").hide();
            } else {
              $("#account-menu").show();
            }
            account_open = !account_open;
          }
    </script>
</head>
<body class="h-full">
<div class="min-h-full">
  <nav class="bg-gray-800">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="flex h-16 items-center justify-between">
        <div class="flex items-center">
          <div class="text-2xl text-white font-bold">
            <h1>EventsApp</h1>
          </div>
          <div class="hidden md:block">
            <div class="ml-10 flex items-baseline space-x-4">
              @auth
                <!--Menu-->
              @endauth
            </div>
          </div>
        </div>
        @auth
        <div class="-mr-2 flex md:hidden">
          <!-- Mobile menu button -->
          <button onclick="toggleMenu()" type="button" class="relative inline-flex items-center justify-center rounded-md bg-gray-800 p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800 focus:outline-hidden" aria-controls="mobile-menu" aria-expanded="false">
            <span class="absolute -inset-0.5"></span>
            <span class="sr-only">Open main menu</span>
            <!-- Menu open: "hidden", Menu closed: "block" -->
            <svg class="block size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
              <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
          </button>
        </div>
        <div class="relative ml-3 hidden md:block">
              <div>
                <button type="button" onclick="toggleAccountMenu()" class="relative flex max-w-xs items-center rounded-full bg-gray-800 text-sm focus:outline-hidden focus-visible:ring-2 focus-visible:ring-white focus-visible:ring-offset-2 focus-visible:ring-offset-gray-800 hover:scale-110" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                  <span class="absolute -inset-1.5"></span>
                  <span class="sr-only">Open user menu</span>
                  <img class="size-8 rounded-full object-fill" src="https://media.istockphoto.com/id/1495088043/vector/user-profile-icon-avatar-or-person-icon-profile-picture-portrait-symbol-default-portrait.jpg?s=612x612&w=0&k=20&c=dhV2p1JwmloBTOaGAtaA3AW1KSnjsdMt7-U_3EZElZ0=" alt="profile_picture" />
                </button>
              </div>
              <div id="account-menu" class="hidden absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black/5 focus:outline-hidden" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                <x-dropdownitem href="#" id="user-menu-item-0" :active="request()->is('#')">Your Profile</x-dropdownitem>
                <x-dropdownitem href="#" id="user-menu-item-1" :active="request()->is('#')">Settings</x-dropdownitem>
                <x-dropdownitem href="#" id="user-menu-item-2" :active="request()->is('#')">Sign out</x-dropdownitem>
              </div>
        </div>
        @endauth
      </div>
    </div>
    @auth
    <div class="md:hidden" id="mobile-menu">
      <div class="space-y-1 px-2 pt-2 pb-3 sm:px-3">
        <!--Mobile menu-->
      </div>
      <div class="border-t border-gray-700 pt-4 pb-3">
        <div class="flex items-center px-5">
          <div class="shrink-0">
            <img class="size-10 rounded-full" src="https://media.istockphoto.com/id/1495088043/vector/user-profile-icon-avatar-or-person-icon-profile-picture-portrait-symbol-default-portrait.jpg?s=612x612&w=0&k=20&c=dhV2p1JwmloBTOaGAtaA3AW1KSnjsdMt7-U_3EZElZ0=" alt="" />
          </div>
          <div class="ml-3">
            <div class="text-base/5 font-medium text-white">John Doe</div>
            <div class="text-sm font-medium text-gray-400">asd@asd.com</div>
          </div>
        </div>
        <div class="mt-3 space-y-1 px-2">
          <x-nav-link-mobile href="#" :active="request()->is('#')">Your Profile</x-nav-link-mobile>
          <x-nav-link-mobile href="#" :active="request()->is('#')">Settings</x-nav-link-mobile>
          <x-nav-link-mobile href="#" :active="request()->is('#')">Sign out</x-nav-link-mobile>
        </div>
      </div>
    </div>
    @endauth
  </nav>
  <header class="bg-white shadow-sm">
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
      <h1 class="text-3xl font-bold tracking-tight text-gray-900">{{$heading}}</h1>
    </div>
  </header>
  <main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
      {{ $slot }}
    </div>
  </main>
</div>

</body>
</html>