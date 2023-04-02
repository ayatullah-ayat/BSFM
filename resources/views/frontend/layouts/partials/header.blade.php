<!-- Main Header-->
<header class="container-fluid main-header box-shadow">

<!-- Meta Pixel Code -->
<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '254113150287162');
  fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=254113150287162&ev=PageView&noscript=1"
/></noscript>
<!-- End Meta Pixel Code -->

<!-- Facebook domain verification code-->
<meta name="facebook-domain-verification" content="is9gd74qdkdsayhzc5bs62qiksspm6" />
<!-- End Facebook domain verification code-->


<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-1YHEE3KLPE"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-1YHEE3KLPE');
</script>



    <nav class="navbar navbar-expand-lg navbar-light">

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
                        <a class="nav-link" aria-current="page" href="{{ route('home_index') }}"> কাস্টমাইজ </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('shop_index') }}"> শপ </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('gallery_index') }}"> গ্যালারী </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('about_index') }}"> আমাদের সম্পর্কে </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contact_index') }}"> যোগাযোগ </a>
                    </li>
                </ul>

                <form action="{{ route('searchResult') }}" autocomplete="off" class="d-flex justify-content-lg-end justify-content-start" style="position: relative !important;">
                    <div class="input-group border rounded">
                        <input class="form-control search-product" name="key" type="search" placeholder=" অনুসন্ধান করুন " aria-label="Search">
                        <button class="btn d-flex justify-content-center" type="submit"><i
                                class="fas fa-search"></i></button>
                    </div>
                    <div id="my-list"></div>
                </form>

                <div class="ordertraking">
                    <a href="javascript:void(0)"> <i class="fa-solid fa-truck-fast text-light"></i> অর্ডার ট্রাক করুন </a>
                </div>

                <div class="cart-icon">
                    <a href="{{ route('cart_index') }}"> <i class="fas fa-cart-shopping"></i><span class="cartvalue"> {{ isset($productIds) && is_array($productIds) ? count($productIds) : 0 }} </span></a>
                </div>

            </div>
        </div>

    </nav>

</header>
