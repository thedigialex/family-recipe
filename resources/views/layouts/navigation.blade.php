<nav x-data="{ open: false }">
    <div class="bg-primary pt-2">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="flex items-center">
                    <a href="{{ route('recipes.index') }}">
                        <x-application-logo class="p-2 mb-2 block h-20 w-auto" />
                    </a>
                </div>
                <div class="flex items-center">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <div class="hidden sm:flex justify-center h-16 items-center space-x-8">
                            <x-nav-link :href="route('recipes.index')" :active="request()->routeIs('recipes.index') || request()->routeIs('recipes.*')">
                                {{ __('Recipes') }}
                            </x-nav-link>
                            <x-nav-link :href="route('families.index')" :active="request()->is('families*') || request()->is('family*')">
                                {{ __('Family') }}
                            </x-nav-link>
                            <x-nav-link :href="route('family.info')" :active="request()->is('info*')">
                                {{ __('Info') }}
                            </x-nav-link>
                        </div>
                    </div>
                </div>

                <div class="hidden sm:flex items-center space-x-4">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <x-primary-button>
                                <div>{{ Auth::user()->name }}</div>
                            </x-primary-button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
                <div class="flex items-center sm:hidden">
                    <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md bg-primary hover:bg-primaryDark text-backgroundAccent focus:outline-none focus:bg-primaryDark focus:text-backgroundAccent transition duration-150 ease-in-out transform hover:scale-105">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pb-3 ">
            <!-- Recipes Link -->
            <x-responsive-nav-link :href="route('recipes.index')" :active="request()->routeIs('recipes.index') || request()->routeIs('recipes.*')">
                {{ __('Recipes') }}
            </x-responsive-nav-link>

            <!-- Family Link -->
            <x-responsive-nav-link :href="route('families.index')" :active="request()->is('families*') || request()->is('family*')">
                {{ __('Family') }}
            </x-responsive-nav-link>

            <!-- Info Link -->
            <x-responsive-nav-link :href="route('family.info')" :active="request()->is('info*')">
                {{ __('Info') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('profile.edit')">
                {{ __('Profile') }}
            </x-responsive-nav-link>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault();
                    this.closest('form').submit();">
                    {{ __('Log Out') }}
                </x-responsive-nav-link>
            </form>
        </div>
    </div>
</nav>