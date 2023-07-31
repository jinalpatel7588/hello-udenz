<div class="navbar-custom">
    <ul class="list-unstyled topnav-menu float-right mb-0">
        <li class="dropdown notification-list">
            <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect" data-toggle="dropdown" href="#"
                role="button" aria-haspopup="false" aria-expanded="false">
                <img src="{{ asset('new_assets/images/profile.png') }}" alt="user-image" class="rounded-circle">
                <span class="d-none d-sm-inline-block ml-1">
                    @if (Auth::user())
                        {{ Auth::user()->name }}
                    @endif
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                <div class="dropdown-header noti-title">
                    <h6 class="text-overflow m-0">Welcome !</h6>
                </div>
                <div class="dropdown-divider"></div>

                @if (Auth::user()->type == App\Enums\UserType::USER)

                    <a class="dropdown-item notify-item" href="{{ route('user.logout') }}">
                        <i class="mdi mdi-logout-variant"></i>{{ __('Logout') }}
                    </a>
                @else
                    <a class="dropdown-item notify-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                        <i class="mdi mdi-logout-variant"></i>{{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                @endif

            </div>
        </li>
    </ul>

    <div class="logo-box">
        <a href="{{ route('home') }}" class="logo text-center">
            <span class="logo-lg dash-logo">
                <img src="{{ asset('new_assets/images/udenz-talks-white.png') }}" alt=""
                style="
    width: 190px;
" >
            </span>
        </a>
    </div>

    <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
        <li>
            <button class="button-menu-mobile waves-effect">
                <i class="mdi mdi-menu"></i>
            </button>
        </li>
    </ul>
</div>
