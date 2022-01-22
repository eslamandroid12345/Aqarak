<!--This Is Navbar-->
<nav class="navbar navbar-light bg-light fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{route('admin.home')}}" style="font-weight: bold;"><img src="{{asset('image/ba.png')}}" alt="" srcset="" style="width: 140px;height: 65px;"></a>

        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
            <i class="fa fa-bars"></i>
        </button>

        <ul class="data">
            @guest
                @if (Route::has('login'))
                    <li class="nav-link">
                        <a  class="dropdown-item" href="{{ route('login') }}">{{ __('تسجيل الدخول') }}</a>
                    </li>
                @endif

                @if (Route::has('register'))
                    <li class="nav-link">
                        <a  class="dropdown-item" href="{{ route('register') }}">{{ __('تسجيل حساب') }}</a>
                    </li>

                        <li class="nav-link">
                            <a  class="dropdown-item" href="{{ route('admin.login') }}">{{ __('دخول الادمن') }}</a>
                        </li>
                @endif
            @else
            @auth
                    <li> <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('navbar.log') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form></li>

                    <li class="nav-link"> <a class="dropdown-item" href="{{route('admin.users')}}">{{__('navbar.users')}}</a></li>
                <li class="nav-link"> <a class="dropdown-item" href="{{route('admin.sales')}}">{{__('navbar.houses')}}</a></li>
                <li class="nav-link"> <a class="dropdown-item" href="{{route('admin.access')}}">{{__('navbar.access')}}</a></li>
                <li class="nav-link"><a class="dropdown-item" href="{{route('admin.trashed')}}">{{__('navbar.trashed')}}</a></li>
                <li class="nav-link"><a class="dropdown-item" href="{{route('admin.company.rate.register')}}">تسجيل عمليه</a></li>

            @endauth

            @endguest
        </ul>



        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
    <a class="navbar-brand" href="{{route('admin.home')}}" style="font-weight: bold;"><img src="{{asset('image/ca.png')}}" alt="" srcset="" style="width: 140px;height: 65px;"></a>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    @auth
                        <li class="nav-link"> <a class="dropdown-item" href="{{route('admin.users')}}">{{__('navbar.users')}}</a></li>
                        <li class="nav-link"> <a class="dropdown-item" href="{{route('admin.sales')}}">{{__('navbar.houses')}}</a></li>
                        <li class="nav-link"> <a class="dropdown-item" href="{{route('admin.access')}}">{{__('navbar.access')}}</a></li>
                        <li class="nav-link"><a class="dropdown-item" href="{{route('admin.trashed')}}">{{__('navbar.trashed')}}</a></li>
                        <li class="nav-link"><a class="dropdown-item" href="{{route('admin.company.rate.register')}}">تسجيل عمليه</a></li>

                    @endauth
                </ul>


                <ul class="navbar-nav">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('تسجيل الدخول') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('تسجيل حساب') }}</a>
                            </li>


                        @endif


                        @if (Route::has('admin.login'))
                                <li class="nav-item">
                                    <a  class="nav-link" href="{{ route('admin.login') }}">{{ __('دخول الادمن') }}</a>
                                </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{__('navbar.welcome')}}
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('navbar.log') }}
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
    </div>
</nav>

<!--End Navbar-->


