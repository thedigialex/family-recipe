<nav x-data="{ open: false }">
    <div class="bg-primary">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">

                <div class="flex items-center">
                    <a href="{{ route('recipes.index') }}">
                        <x-application-logo class="block h-16 w-auto fill-current rounded-3xl" />
                    </a>
                </div>
                <div class="flex items-center">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <div class="hidden sm:flex justify-center h-16 items-center space-x-8">
                            <x-nav-link :href="route('recipes.index')" :active="request()->routeIs('recipes.index')">
                                {{ __('Recipes') }}
                            </x-nav-link>
                            <x-nav-link :href="route('families.create')" :active="request()->routeIs('families.create')">
                                {{ __('Create Family') }}
                            </x-nav-link>
                            <x-nav-link :href="route('families.joinForm')" :active="request()->routeIs('families.joinForm')">
                                {{ __('Join Family') }}
                            </x-nav-link>
                            @if(Auth::user()->headedFamilies->isNotEmpty())
                            <x-dropdown align="right" width="48">
                                <x-slot name="trigger">
                                    <button class="flex items-center">
                                        <x-nav-link>{{ __('Manage Family') }}</x-nav-link>
                                    </button>
                                </x-slot>

                                <x-slot name="content">
                                    @foreach(Auth::user()->headedFamilies as $family)
                                    <x-dropdown-link :href="route('families.manage', $family->id)">
                                        {{ $family->name }}
                                    </x-dropdown-link>
                                    @endforeach
                                </x-slot>
                            </x-dropdown>
                            @endif
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

                <div class="-me-2 flex items-center sm:hidden">
                    <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('recipes.index')" :active="request()->routeIs('recipes.index')">
                {{ __('Recipes') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('families.create')" :active="request()->routeIs('families.create')">
                {{ __('Create Family') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('families.joinForm')" :active="request()->routeIs('families.joinForm')">
                {{ __('Join Family') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>