<nav
    x-data="{ open: false }"
    class="border-gray-100 border-b bg-white"
>
    <!-- Primary Navigation Menu -->
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 justify-between">
            <div class="flex">
                <!-- Logo -->
                <div class="flex shrink-0 items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="text-gray-800 block h-9 w-auto fill-current" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link
                        :href="route('dashboard')"
                        :active="request()->routeIs('dashboard')"
                    >
                        {{ __('Dashboard') }}
                    </x-nav-link>
                    <x-nav-link
                        :href="route('admin.categories.index')"
                        :active="request()->routeIs('admin.categories.index')"
                    >
                        @lang('admin.categories')
                    </x-nav-link>
                    <x-nav-link
                        :href="route('admin.posts.index')"
                        :active="request()->routeIs('admin.posts.index')"
                    >
                        @lang('admin.posts')
                    </x-nav-link>

                    <x-nav-link
                        :href="route('admin.announcements.index')"
                        :active="request()->routeIs('admin.announcements.index')"
                    >
                        @lang('admin.announcements')
                    </x-nav-link>

                    <div class="dropdown dropdown-hover self-center">
                        <div
                            tabindex="0"
                            role="button"
                        >
                            @lang('admin.albums')
                        </div>
                        <ul
                            tabindex="0"
                            class="menu dropdown-content z-[1] w-52 rounded-box bg-base-100 p-2 shadow"
                        >
                            <li>
                                <x-nav-link
                                    :href="route('admin.albums.index')"
                                    :active="request()->routeIs('admin.albums.index')"
                                >
                                    @lang('admin.albums.all')
                                </x-nav-link>
                            </li>
                            <li>
                                <x-nav-link
                                    :href="route('admin.photos.index')"
                                    :active="request()->routeIs('admin.photos.index')"
                                >
                                    @lang('admin.photos.all')
                                </x-nav-link>
                            </li>
                            <li>
                                <x-nav-link
                                    :href="route('admin.videos.index')"
                                    :active="request()->routeIs('admin.videos.index')"
                                >
                                    @lang('admin.videos.all')
                                </x-nav-link>
                            </li>
                            <li>
                                <x-nav-link
                                    :href="route('admin.cooperations.index')"
                                    :active="request()->routeIs('admin.cooperations.index')"
                                >
                                    @lang('admin.cooperations.all')
                                </x-nav-link>
                            </li>
                        </ul>
                    </div>

                    <x-nav-link
                        :href="route('admin.contacts.index')"
                        :active="request()->routeIs('admin.contacts.index')"
                    >
                        @lang('admin.contacts')
                    </x-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:ms-6 sm:flex sm:items-center">
                <x-dropdown
                    align="right"
                    width="48"
                >
                    <x-slot name="trigger">
                        <button class="text-gray-500 hover:text-gray-700 inline-flex items-center rounded-md border border-transparent bg-white px-3 py-2 text-sm font-medium leading-4 transition duration-150 ease-in-out focus:outline-none">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg
                                    class="h-4 w-4 fill-current"
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20"
                                >
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('admin.profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form
                            method="POST"
                            action="{{ route('logout') }}"
                        >
                            @csrf

                            <x-dropdown-link
                                :href="route('logout')"
                                onclick="event.preventDefault();
                                                this.closest('form').submit();"
                            >
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button
                    @click="open = ! open"
                    class="text-gray-400 hover:bg-gray-100 hover:text-gray-500 focus:bg-gray-100 focus:text-gray-500 inline-flex items-center justify-center rounded-md p-2 transition duration-150 ease-in-out focus:outline-none"
                >
                    <svg
                        class="h-6 w-6"
                        stroke="currentColor"
                        fill="none"
                        viewBox="0 0 24 24"
                    >
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" /><path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div
        :class="{ 'block': open, 'hidden': !open }"
        class="hidden sm:hidden"
    >
        <div class="space-y-1 pb-3 pt-2">
            <x-responsive-nav-link
                :href="route('dashboard')"
                :active="request()->routeIs('dashboard')"
            >
                {{ __('Dashboard') }}
            </x-responsive-nav-link>

            <x-nav-link
                :href="route('admin.categories.index')"
                :active="request()->routeIs('admin.categories.index')"
            >
                @lang('admin.categories')
            </x-nav-link>

            <x-nav-link
                :href="route('admin.posts.index')"
                :active="request()->routeIs('admin.posts.index')"
            >
                @lang('admin.posts')
            </x-nav-link>

            <x-nav-link
                :href="route('admin.announcements.index')"
                :active="request()->routeIs('admin.announcements.index')"
            >
                @lang('admin.announcements')
            </x-nav-link>

            <x-nav-link
                :href="route('admin.albums.index')"
                :active="request()->routeIs('admin.albums.index')"
            >
                @lang('admin.albums')
            </x-nav-link>

            <x-nav-link
                :href="route('admin.photos.index')"
                :active="request()->routeIs('admin.photos.index')"
            >
                @lang('admin.photos.all')
            </x-nav-link>

            <x-nav-link
                :href="route('admin.videos.index')"
                :active="request()->routeIs('admin.videos.index')"
            >
                @lang('admin.videos.all')
            </x-nav-link>

            <x-nav-link
                :href="route('admin.cooperations.index')"
                :active="request()->routeIs('admin.cooperations.index')"
            >
                @lang('admin.cooperations.all')
            </x-nav-link>

            <x-nav-link
                :href="route('admin.contacts.index')"
                :active="request()->routeIs('admin.contacts.index')"
            >
                @lang('admin.contacts')
            </x-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="border-gray-200 border-t pb-1 pt-4">
            <div class="px-4">
                <div class="text-gray-800 text-base font-medium">{{ Auth::user()->name }}</div>
                <div class="text-gray-500 text-sm font-medium">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form
                    method="POST"
                    action="{{ route('logout') }}"
                >
                    @csrf

                    <x-responsive-nav-link
                        :href="route('logout')"
                        onclick="event.preventDefault();
                                        this.closest('form').submit();"
                    >
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
