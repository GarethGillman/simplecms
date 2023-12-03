<header id="dashboard-nav">
    <!-- Primary Navigation Menu -->
    <div class="container">
    
        <!-- Logo -->
        <div id="logo">
            <a href="{{ route('dashboard') }}">
                <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
            </a>
        </div>
        <!-- End Logo -->

        <!-- Menu Links -->
        <nav class="hidden md:flex" id="menu-links">
            @if( Auth::check() )
                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    <span>{{ __('Dashboard') }}</span>
                </x-nav-link>

                <x-nav-link :href="route('pages.index')" :active="request()->routeIs('pages.index')">
                    <span>{{ __('Pages') }}</span>
                </x-nav-link>

                <x-nav-link :href="route('pages.index')" :active="request()->routeIs('pages.home')">
                    <span>{{ __('Settings') }}</span>
                </x-nav-link>
            @else

            @endif
        </nav>
        <!-- End Menu Links -->

        <!-- Header Right -->
        <div id="header-right">

            <!-- Theme Toggle -->
            <button id="theme-toggle">
                <svg id="dark-toggle" fill="none" height="18px" width="18px" viewBox="0 0 15 15" xmlns="http://www.w3.org/2000/svg"><path fill="none" d="M7.707.003a.5.5 0 0 0-.375.846 6 6 0 0 1-5.569 10.024.5.5 0 0 0-.519.765A7.5 7.5 0 1 0 7.707.003z"/></svg>
                <svg id="light-toggle" height="24px" width="24px" xmlns="http://www.w3.org/2000/svg" width="512" height="512" viewBox="0 0 512 512"><path d="M256,118a22,22,0,0,1-22-22V48a22,22,0,0,1,44,0V96A22,22,0,0,1,256,118Z"/><path d="M256,486a22,22,0,0,1-22-22V416a22,22,0,0,1,44,0v48A22,22,0,0,1,256,486Z"/><path d="M369.14,164.86a22,22,0,0,1-15.56-37.55l33.94-33.94a22,22,0,0,1,31.11,31.11l-33.94,33.94A21.93,21.93,0,0,1,369.14,164.86Z"/><path d="M108.92,425.08a22,22,0,0,1-15.55-37.56l33.94-33.94a22,22,0,1,1,31.11,31.11l-33.94,33.94A21.94,21.94,0,0,1,108.92,425.08Z"/><path d="M464,278H416a22,22,0,0,1,0-44h48a22,22,0,0,1,0,44Z"/><path d="M96,278H48a22,22,0,0,1,0-44H96a22,22,0,0,1,0,44Z"/><path d="M403.08,425.08a21.94,21.94,0,0,1-15.56-6.45l-33.94-33.94a22,22,0,0,1,31.11-31.11l33.94,33.94a22,22,0,0,1-15.55,37.56Z"/><path d="M142.86,164.86a21.89,21.89,0,0,1-15.55-6.44L93.37,124.48a22,22,0,0,1,31.11-31.11l33.94,33.94a22,22,0,0,1-15.56,37.55Z"/><path d="M256,358A102,102,0,1,1,358,256,102.12,102.12,0,0,1,256,358Z"/></svg>
            </button>
            <!-- end Theme Toggle -->

            <!-- User Profile -->
            @if( Auth::check() )
                <div id="user-profile">
                    <button id="user-profile-toggle">
                        <span>{{ Auth::user()->name }}</span>

                        <svg id="user-caret" height="14px" width="14px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" /></svg>
                    </button>

                    <div class="hidden" id="user-profile-menu">
                        <x-nav-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-nav-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-nav-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-nav-link>
                        </form>
                    </div>
                </div>
            @else
                <a class="text-link" id="register-link" href="{{ route('register') }}">
                    {{ __('Register') }}
                </a>

                <a class="text-link" id="login-link" href="{{ route('login') }}">
                    {{ __('Register') }}
                </a>
            @endif
            <!-- End User Profile -->

            <!-- Mobile Nav Toggle -->
            <button id="nav-toggle">
                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24"><path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" /><path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
            </button>
            <!-- End Mobile Nav Toggle -->
            
        </div>
        <!-- End Header Right -->

    @if( Auth::check() )
    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
    @endif
</header>
