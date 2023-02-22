<header class="navbarHeader lh-1 py-3  ">
    <div class="row flex-nowrap justify-content-between align-items-center fixed-top bg-dark p-2">
        <div class="col-4 pt-1 ">
            <form action="{{route('frontend.search')}}" method="get" role="search">
                <div class="input-group">
                    <input type="search" name="search" value="{{Request::get('search')}}" placeholder="Search your product" class="form-control " />
                    <button class="btn btn-outlined-dark" type="submit" style="color:aliceblue">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </form>
        </div>
        <div class="col-4 text-center">
            <a class="navbarHeader-logo text-light" href="{{route('public.index')}}">BD Ecommerce</a>
        </div>
        <div class="col-4 d-flex justify-content-end align-items-center">

            <ul class="nav justify-content-end">

                <li class="nav-item">
                    <a class="nav-link" href="{{route('public.cart')}}">
                        <i class="fa fa-shopping-cart" title="Cart"></i>(
                        <livewire:frontend.cart.cart-count />)
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('public.wishlist')}}" title="wishlist">
                        <i class="fa fa-heart"></i> (
                        <livewire:frontend.wishlist-count />)
                    </a>
                </li>
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
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-user"></i> {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#"><i class="fa fa-user"></i> Profile</a></li>
                        <li><a class="dropdown-item" href="{{route('public.orderList')}}"><i class="fa fa-list"></i> My Orders</a></li>
                        <li><a class="dropdown-item" href="{{route('public.wishlist')}}"><i class="fa fa-heart"></i> My Wishlist</a></li>
                        <li><a class="dropdown-item" href="{{route('public.cart')}}"><i class="fa fa-shopping-cart"></i> My Cart</a></li>
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <i class="fa fa-sign-out"></i>{{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
                @endguest
            </ul>
        </div>
    </div>
</header>
<div class="row flex-nowrap justify-content-between align-items-center nav-scroller ">
    <nav class="nav d-flex justify-content-center">
        <a class="nav-link" href="{{url('/')}}">{{__('Home')}}</a>
        <div class="nav-item dropdown">
            <button class="btn btn-sm nav-link dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                {{__('Categories')}}
            </button>
            <ul class="dropdown-menu">
                @foreach($adminCategory as $category)
                <li><a class="dropdown-item" href="{{route('public.products',$category->slug)}}">{{ $category->name }}</a></li>
                @endforeach
                <li><a class="dropdown-item" href="{{url('/collections')}}">{{__('All Categories')}}</a></li>
            </ul>
        </div>
        <a class="nav-link" href="{{route('public.newArrivals')}}">New Arrivals</a>

    </nav>
</div>