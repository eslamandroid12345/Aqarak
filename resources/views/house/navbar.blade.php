<!--This Is Navbar-->
<nav class="navbar navbar-light bg-light fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{url('/')}}" style="font-weight: bold;"><img src="{{asset('image/ba.png')}}" alt="" srcset="" style="width: 140px;height: 65px;"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
            <i class="fa fa-bars"></i>
        </button>

        <ul class="data">
            @guest
                @if (Route::has('login'))
                    <li class="nav-link">
                        <a  class="dropdown-item" href="{{ route('login') }}"><i class="fa fa-user-plus"></i>{{ __('تسجيل الدخول') }}</a>
                    </li>
                @endif

                @if (Route::has('houses.create'))

                    <li class="nav-link">
                        <a  class="dropdown-item" href="{{ route('admin.login') }}"><i class="fa fa-user"></i>{{ __('دخول الادمن') }}</a>
                    </li>
                @endif
            @else
                @auth
                    <li class="nav-link"> <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('navbar.log') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>


                    <li class="nav-link"><a class="dropdown-item" href="{{route('houses.sale')}}"><i class="fa fa-home"></i>عقاري</a></li>

                @endauth
            @endguest
                <li class="nav-link">
                    <a  class="dropdown-item" href="{{ route('houses.create') }}"><i class="fa fa-building"></i>{{ __('اعلن') }}</a>
                </li>
                <li class="nav-link"><a class="dropdown-item" href="{{route('houses.data')}}"><i class="fa fa-search"></i>ابحث</a></li>


        </ul>



        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <a class="navbar-brand" href="{{url('/')}}" style="font-weight: bold;"><img src="{{asset('image/ca.png')}}" alt="" srcset="" style="width: 140px;height: 65px;"></a>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    @auth

                        <li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>

                        <li class="nav-link"><a class="dropdown-item" href="{{route('houses.data')}}"><i class="fa fa-search"></i>ابحث</a></li>
                        <li class="nav-link"><a class="dropdown-item" href="{{route('houses.sale')}}"><i class="fa fa-building"></i>عقاري</a></li>
                        <li class="nav-link"><a class="dropdown-item" href="{{route('houses.create')}}"><i class="fa fa-home"></i>اعلن</a></li>



                    @endauth

                </ul>


                <ul class="navbar-nav">
                    <!-- Authentication Links -->
                    @guest

                        @if (Route::has('houses.data'))
                            <li class="nav-item">
                                <a  class="nav-link" href="{{ route('houses.data') }}"><i class="fa fa-search"></i>{{ __('ابحث') }}</a>
                            </li>
                        @endif
                            @if (Route::has('houses.create'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('houses.create') }}"><i class="fa fa-building"></i>{{ __('اعلن') }}</a>
                                </li>


                            @endif

                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}"><i class="fa fa-user-plus"></i>{{ __('تسجيل الدخول') }}</a>
                            </li>
                        @endif




                        @if (Route::has('admin.login'))
                            <li class="nav-item">
                                <a  class="nav-link" href="{{ route('admin.login') }}"><i class="fa fa-user"></i>{{ __('دخول الادمن') }}</a>
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


