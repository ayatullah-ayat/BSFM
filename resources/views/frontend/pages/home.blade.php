@extends('frontend.layouts.master',  ['customservicecategories'=>$customservicecategories ?? null, 'sociallink'=>$sociallink ?? null, 'footerabout'=>$footerabout ?? null])
@section('title','Home')

@section('content')

    <!-- Banner Area -->
    <section class="banner-area">
        <div class="banner-content">
            <h1>Welcome to our online store</h1>
            <p>Discover our latest collections</p>
            <a href="#" class="btn-shop-now">Shop now</a>
        </div>
    </section>
    <!-- Hero Area-->
    <section class="container-fluid hero-area">
    
        <div class="background-1">
            <img src="{{asset('assets/frontend/img/bg/bg-1.png')}}" alt="bg-1">
        </div>
    
        <div class="container">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8 col-sm-12 d-flex align-items-center justify-content-center">
    
                    <div class="text-center">
                        <div class="hero-heading">
                            <h2 class="text-justify">Customize Your Corporate Gift Item</h2>
                        </div>
                        <div class="hero-text">
                            <p class="text-justify">Create any type of customized product at lowest cost, fastest time, highest quality assurance only at Micromedia. Order any type of customized print Work as per your requirement from the list below</p>
                        </div>
                    </div>
    
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
    
    </section>
    
    <!-- Product Area-->
    <section class="container-fluid product-area">
    
        <div class="container">
            <div class="row">
                @php
                    $maxCatId = 0;
                @endphp

                @isset($customservicecategories)
                    @foreach ($customservicecategories as $customservicecategory)
                        @php
                        $maxCatId = $customservicecategory->id;
                        @endphp

                        <div class="col-md-4 col-sm-12 mb-4">
                            <div class="product-content d-flex">
        
                                <div class='reveal'>
                                    <div class="image-wrap">
                                        <div class="product-img">
                                            @isset($customservicecategory->category_thumbnail)
                                                <img src="{{asset( $customservicecategory->category_thumbnail )}}" alt="Product img">
                                            @else    
                                                <img src="{{asset('assets/frontend/img/product/1234.png')}}" alt="Product img">
                                            @endisset
                                        </div>
                                    </div>
                                </div>
            
                                <div class="product-details text-center">
                                    <h3 class="product-title"> {{ $customservicecategory->category_name  }} </h3>
                                    <p class="product-text">  {{ $customservicecategory->category_description  }} </p>
                                    <a href="javascript:void(0)" id="category_id" data-categoryid="{{$customservicecategory->id}}" type="button" class="product-button customize-btn"> Customize </a>
                                </div>
            
                            </div>
                        </div>
                    @endforeach
                @endisset

                <div data-totalcount="{{ $countCustomservicecategories ?? 0 }}" class="product-ses-more text-center loadMoreContainer {{ $countCustomservicecategories <= $limit ? 'd-none' : '' }}">
                    <a href="javascript:void(0)" data-uri="{{ route('home_index') }}" class="loadMoreBtn" data-maxid="{{ $maxCatId }}" data-limit="{{ $limit }}"> See More Customize Products </a>
                </div>
    
            </div>
        </div>
    
    </section>
    
    <!-- Readymade Products Area-->
    <section class="container-fluid readymade-products-area">
    
        <div class="background-2">
            <img src="{{asset('assets/frontend/img/bg/bg-2.png')}}" alt="bg-1">
        </div>
    
        <div class="container">
    
            <div class="heading-title text-center">
                <h2>Buy Readymade Product</h2>
            </div>
    
            <div class="row">
                <div class="readymade-products-content">
                    <div class="readymade-products">
                        @if($shopbanner && $shopbanner->banner_image)
                                <a href="{{ route('shop_index')}}"><img src="{{ asset($shopbanner->banner_image) }}" class="img-fluid" alt="micromedia-image"></a>
                            @else 
                                <a href="{{ route('shop_index')}}"><img src="{{asset('assets/frontend/img/micromedia-image 1.png')}}" class="img-fluid" alt="micromedia-image"></a>
                        @endif
                    </div>
                </div>
            </div>
    
        </div>
    
    </section>
    
    <!-- Our Service Area-->
    <section class="container-fluid our-service-area">
    
        <div class="background-3">
            <img src="{{asset('assets/frontend/img/bg/bg-3.png')}}" alt="bg-3">
        </div>
    
        <div class="container">
    
            <div class="heading-title text-center">
                <h2> Our Services </h2>
            </div>
    
            <div class="row">
                @isset($customservices)
                    @foreach ($customservices as $customservice)
                        <div class="col-md-3 col-12 mt-4 d-flex align-items-center justify-content-center">
                            <div class="card service-card">
                                <img draggable="false" class="card-img-top" src="{{ asset($customservice->service_thumbnail) }}" alt="Card image cap">
                                @if ($customservice->is_allow_caption)
                                    <div class="card-body">
                                        <p class="card-text text-center">{{ $customservice->service_name  }}</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                @endisset
    
            </div>
    
        </div>
    
    </section>
    
    <!-- Our Clients Area-->
    <section class="container-fluid our-clients-area">
    
        <div class="container">
    
            <div class="heading-title text-center">
                <h2> Our Clients </h2>
            </div>
    
            <div class="client-details">
                <div class="row d-flex align-items-center justify-content-center loadMoreContainerlogosparent">

                    @php
                        $maxClientLogoId = 0;
                    @endphp

                    @isset($clientlogos)
                        @foreach ($clientlogos as $clientlogo)
                            @php
                            $maxClientLogoId = $clientlogo->id;
                            @endphp

                            @if($clientlogo->logo)
                                <div class="col-md-2">
                                    
                                            <div class="single-client text-center m-1 our-clients-logo">
                                                <img src="{{asset( $clientlogo->logo ?? null)}}" alt="">
                                            </div>
                                        
                                </div>
                            @endif 

                        @endforeach
                    @endisset
                </div>
            </div>

            <div data-totalcount="{{ $countClientLogos ?? 0 }}"
                class="product-ses-more text-center loadMoreContainerlogos {{ $countClientLogos <= $clientLogosLimit ? 'd-none' : '' }}">
                <a href="javascript:void(0)" data-uri="{{ route('home_client_loadmore') }}" class="loadMoreBtnClientLogo" data-maxid="{{ $maxClientLogoId }}"
                    data-limit="{{ $clientLogosLimit }}"> See More Client </a>
            </div>
    
        </div>
    
    </section>
    
    <!-- Our Contact Area-->
    <section class="container-fluid our-contact-area">
    
        <div class="container">
    
            <div class="heading-title text-center">
                <h2> Our Address </h2>
            </div>
    
            <div class="contact-details">
                <div class="row d-flex align-items-center justify-content-center">
    
                    <div class="col-md-7 mt-3">
                        <div class="google-map">
                            <iframe 
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d383.8414241729757!2d90.40134244963308!3d23.756805423079125!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b89c9df193bb%3A0xa1b4580bb580a46f!2sBegun%20Bari%20Jame%20Masjid!5e0!3m2!1sen!2sbd!4v1649218491900!5m2!1sen!2sbd" 
                                width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                        </div>
                    </div>
    
                    <div class="col-md-5 mt-3">
    
                        <div class="contact-form">
                            <h3 class="text-center">Contact Us </h3>

                                <div class="form-group form-group2">
                                    <input type="text" class="form-control form-control2 border mt-3"
                                        id="name" placeholder="Your Name">
                                </div>
    
                                <div class="form-group">
                                    <input type="email" class="form-control form-control2 border mt-3"
                                        id="email" placeholder="Email Address">
                                </div>
    
                                <div class="form-group">
                                    <input type="number" class="form-control form-control2 border mt-3"
                                        id="phone" placeholder="Phone Number">
                                </div>
                                
                                <div class="form-group">
                                    <input type="text" class="form-control form-control2 border mt-3"
                                        id="subject" placeholder="Subject">
                                </div>
    
                                <div class="form-group">
                                    <textarea style="resize: none;" class="form-control border mt-3"
                                        id="message" rows="20" cols="10"
                                        placeholder="Describe Here.... "></textarea>
                                </div>
    
                                <div class="form-group text-center text-lg-end  mt-3">
                                    <button class="contact-button btn-outline-none border-0" id="contact_sent_btn"> Send </button>
                                </div>
    
                        </div>
    
                    </div>
    
                </div>
    
            </div>
    
        </div>
    
    </section>
    
    <!-- Our Contact Area-->
    <section class="container-fluid call-center-area">
    
        <div class="container">
            <div class="row">
                <div class="col-md-12 d-flex align-items-center justify-content-center">
    
                    <div class="call-center text-center">
                        <h2 class="text-capitalize"> You didn't find what you were looking for? Please Call:<span> <a href="tel:01971819813" class="text-decoration-none" type="button">0197-1819-813</a></span></h2>
                    </div>
    
                </div>
            </div>
        </div>
    
    </section>
    
    
    
    <div class="modal fade" id="adsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
        role="dialog" data-backdrop="static" data-keyboard="false" aria-modal="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">

                <div class="modal-body px-0 py-0 m-0" id="adsBody">
                    <button type="button" class="btn-close c-btn" data-bs-dismiss="modal" aria-label="Close"></button>
                    @if($ad)
                    <img src="{{asset($ad->image)}}" alt="" class="adsImage">
                    @else 
                    <img src="{{asset('assets/frontend/img/micromedia-image 1.png')}}" alt="" class="img-fluidx adsImage">
                    @endif 
                </div>
    
            </div>
        </div>
    </div>
    
 
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/frontend/pages/css/home.css') }}">
    <style>
    
            .adsImage{
                width: 100%;
                /*height: 100%;*/
            }
            
            .c-btn{
                position: absolute;
                top: 0;
                right: 0px;
                color: #fff !important;
                font-size: 24px;
            }

            
        /*   img {
             height: 100%;
             width: auto;
             max-width: 75vw;
             object-fit: contain;
           }*/
   
           .image-wrap {
             transition: 1s ease-out;
             transition-delay: 0.1s;
             position: relative;
             /*width: auto;
             height: 80vh;*/
             overflow: hidden;
             clip-path: polygon(0 100%, 100% 100%, 100% 100%, 0 100%);
             visibility: hidden;
           }
   
           .image-wrap img {
             transform: scale(1.2);
             transition: 2s ease-out;
           }
   
           .animating .image-wrap {
             clip-path: polygon(0 0, 100% 0, 100% 100%, 0 100%);
             visibility: visible;
             transform: skewY(0);
           }
   
           .animating img {
             transform: scale(1);
             transition: 2s ease-out;
           }
   
           .fadeup {
             opacity: 0;
             transition: 0.2s ease-out;
             transform: translateY(40px);
           }
   
           .fading-up {
             opacity: 1;
             transition: 1s ease-out;
             transform: translateY(0px);
             transition-delay: 0.4s;
           }

        .reveal.animating {
            margin-top: -62px;
        } 
        .animating:hover img {
            transform: scale(1.1);
            cursor: pointer;
        }

        .our-clients-logo img {
            transform: scale(1);
            transition: 2s all;
        }
        .our-clients-logo:hover img {
            transform: scale(1.2);
            cursor: pointer;
        }
          
       </style>
@endpush

@push('js')
<script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function () {
            
        let acessToAds = @json($ad && $ad->is_publish);

        if(acessToAds){
           setTimeout(()=>  $('#adsModal').modal('show'), 2000)
        }
        
        const options = {
        root: null,
        rootMargin: "0px",
        threshold: 0.4
        };

        // IMAGE ANIMATION

        let revealCallback = (entries) => {
        entries.forEach((entry) => {
            let container = entry.target;

            if (entry.isIntersecting) {
            console.log(container);
            container.classList.add("animating");
            return;
            }

            if (entry.boundingClientRect.top > 0) {
            container.classList.remove("animating");
            }
        });
        };

        let revealObserver = new IntersectionObserver(revealCallback, options);

        document.querySelectorAll(".reveal").forEach((reveal) => {
        revealObserver.observe(reveal);
        });

    });
</script>

<script>
    $(document).ready( function(){
        $(document).on('click','#contact_sent_btn', submitToDatabase)
        $(document).on('click','.loadMoreBtnClientLogo', loadMoreLogos)
    });

    function submitToDatabase(){
        let obj = {
            url     : `{{ route('contact_store')}}`, 
            method  : "POST",
            data    : formatData(),
        };

        ajaxRequest(obj, { reload: true, timer: 2000 })
    }

    function formatData(){
        return {
            name    : $('#name').val().trim(),
            email   : $('#email').val(),
            phone   : $('#phone').val(),
            subject : $('#subject').val().trim(),
            message : $('#message').val().trim(),
            _token  : `{{csrf_token()}}`
        }
    }

</script>
@endpush