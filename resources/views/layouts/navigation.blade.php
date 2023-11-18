<nav class="bg-white border-b border-gray-100 shadow-sm">
    <!-- Primary Navigation Menu -->
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <!-- Logo -->
            <div class="flex items-center shrink-0">
                <a href="{{ route('dashboard') }}" class="text-indigo-600">
                    <x-application-logo class="block w-auto fill-current h-9" />
                </a>
            </div>

            <!-- Settings Dropdown -->
            <div class="flex items-center ml-6">
                <x-dropdown align="right">

                    <x-slot name="trigger">
                        <span class="mr-1">
                            {{ Auth::user()->name }}
                        </span>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            <i class="fa-solid fa-user-circle"></i>
                            <span class="ml-1">
                                {{ __('Profile') }}
                            </span>
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                this.closest('form').submit();">

                                <i class="fa-solid fa-right-from-bracket"></i>
                                <span class="ml-1">
                                    {{ __('Log Out') }}
                                </span>
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
        </div>
    </div>
</nav>
