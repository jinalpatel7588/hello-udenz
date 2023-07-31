<div class="left-side-menu">
    <div class="slimscroll-menu">
        <div id="sidebar-menu">
            <ul class="metismenu" id="side-menu">
                @if (Auth::user()->type == App\Enums\UserType::ADMIN)
                    <li @if (Route::currentRouteName() == 'home') class="mm-active" @endif>
                        <a href="{{ route('home') }}"
                            class="waves-effect waves-light @if (Route::currentRouteName() == 'home') active @endif">
                            <i class="fas fa-chart-bar"></i>

                            <span> Dashboard </span>
                        </a>
                    </li>

                    <li @if (Route::currentRouteName() == 'admin.users.index') class="mm-active" @endif>
                        <a href="{{ route('admin.users.index') }}"
                            class="waves-effect waves-light @if (Route::currentRouteName() == 'admin.chapters.index') active @endif">
                            <i class="fas fa-user-friends"></i>
                            <span> Users </span>
                        </a>
                    </li>

                    {{-- <li @if (Route::currentRouteName() == 'admin.chatroom') class="mm-active" @endif>
                        <a href="{{ route('admin.chatroom') }}"
                            class="waves-effect waves-light @if (Route::currentRouteName() == 'admin.chatroom') active @endif">
                            <i class="mdi mdi-view-dashboard"></i>
                            <span> Chat Room </span>
                        </a>
                    </li> --}}
                @endif

                {{--  @if (Auth::user()->type == App\Enums\UserType::USER)
                    <li @if (Route::currentRouteName() == 'user.chat.index') class="mm-active" @endif>
                        <a href="{{ route('user.chat.index') }}"
                            class="waves-effect waves-light @if (Route::currentRouteName() == 'user.chat.index') active @endif">
                            <i class="fas fa-chart-bar"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                @endif  --}}
                <li @if (Route::currentRouteName() == 'admin.contactUs') class="mm-active" @endif>
                    <a href="{{ route('admin.contactUs') }}"
                        class="waves-effect waves-light @if (Route::currentRouteName() == 'admin.contactUs') active @endif">
                        <i class="fas fa-chart-bar"></i>
                        <span>Contact Us</span>
                    </a>
                </li>

                <li @if (Route::currentRouteName() == 'waitingList') class="mm-active" @endif>
                    <a href="{{ route('waitingList') }}"
                        class="waves-effect waves-light @if (Route::currentRouteName() == 'waitingList') active @endif">
                        <i class="fas fa-chart-bar"></i>
                        <span>Waiting List</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
