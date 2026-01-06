        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ route('admin.dashboard') }}">
                    {{ $profile->name }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        @auth
                            <li class="nav-item">
                                <a class="nav-link nav-btn {{ request()->routeIs('admin.profile.*') ? 'active' : '' }}"
                                    href="{{ route('admin.profile.index') }}">Profile</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                                    aria-expanded="false">Content</a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item {{ request()->routeIs('admin.contact.*') ? 'active' : '' }}"
                                            href="{{ route('admin.contact.index') }}">Contact</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item {{ request()->routeIs('admin.principle.*') ? 'active' : '' }}"
                                            href="{{ route('admin.principle.index') }}">Principle</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item {{ request()->routeIs('admin.faq.*') ? 'active' : '' }}"
                                            href="{{ route('admin.faq.index') }}">FAQ</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item {{ request()->routeIs('admin.testimonial.*') ? 'active' : '' }}"
                                            href="{{ route('admin.testimonial.index') }}">Testimonial</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item {{ request()->routeIs('admin.why.*') ? 'active' : '' }}"
                                            href="{{ route('admin.why.index') }}">Why Choose Us</a>
                                    </li>
                                    {{-- <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Separated link</a></li> --}}
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link nav-btn {{ request()->routeIs('admin.rooms.*') ? 'active' : '' }}"
                                    href="{{ route('admin.rooms.index') }}">Rooms Management</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link nav-btn {{ request()->routeIs('admin.facilities.*') ? 'active' : '' }}"
                                    href="{{ route('admin.facilities.index') }}">Facilities Management</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link nav-btn {{ request()->routeIs('admin.bookings.*') ? 'active' : '' }}"
                                    href="{{ route('admin.bookings.index') }}">Booking</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link nav-btn {{ request()->routeIs('admin.messages.*') ? 'active' : '' }}"
                                    href="{{ route('admin.messages.index') }}">Message</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link nav-btn {{ request()->routeIs('admin.privacy.*') ? 'active' : '' }}"
                                    href="{{ route('admin.privacy.index') }}">Privacy Policy</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link nav-btn {{ request()->routeIs('admin.terms.*') ? 'active' : '' }}"
                                    href="{{ route('admin.terms.index') }}">Terms & Conditions</a>
                            </li>
                        @endauth
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
