<!-- Main Header-->
<header class="container-fluid main-header box-shadow" style="background-color:#FCE5CD">

    <nav class="navbar navbar-expand-lg navbar-light" style="width: 100% !important; padding-top: 0px; padding-bottom: 0px;">

        <div class="container">
               @if (isset($companylogo))
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img class="logo" src="{{asset( $companylogo->dark_logo )}}" alt="">
                    </a>
               @else
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img class="logo" src="{{asset('assets/frontend/img/logo-mic.png')}}" alt="">
                    </a> 
               @endif

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse menu" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link" aria-current="page" href="{{ route('home_index') }}">Customize</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('shop_index') }}">Shop</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('gallery_index') }}">Gallery</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('about_index') }}">About</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contact_index') }}">Contact</a>
                    </li>

                    <li class="nav-item ordertraking">
                        <a class="nav-link" href="#">Order Track</a>
                    </li>
                    
                </ul>

                <form action="{{ route('searchResult') }}" autocomplete="off" class="d-flex justify-content-lg-end justify-content-start" style="position: relative !important;">
                    <div class="input-group border rounded">
                        <input class="form-control search-product" name="key" type="search" placeholder="Search Product" aria-label="Search">
                        <button class="btn d-flex justify-content-center" type="submit"><i
                                class="fas fa-search"></i></button>
                    </div>
                    <div id="my-list"></div>
                </form>

                <div class="cart-icon ps-2">
                    <a href="{{ route('cart_index') }}"> <i class="fas fa-cart-shopping"></i><span class="cartvalue"> {{ isset($productIds) && is_array($productIds) ? count($productIds) : 0 }} </span></a>
                </div>

                <div class="cart-icon ps-3">
                    <a href="{{ route('cart_index') }}"> <i class="fas fa-user"></i></a>
                </div>


            </div>
        </div>

    </nav>

</header>
