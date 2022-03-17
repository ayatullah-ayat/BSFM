@extends('frontend.layouts.master')
@section('title','Product Details')

@section('content')

<!-- Single Product Area-->
    <section class="container-fluid single-product-area my-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="single-prodect-info right">
    
                        <div class="exzoom" id="exzoom">
                            <!-- Images -->
                            <div class="exzoom_img_box">
                                <ul class='exzoom_img_ul'>
                                    @isset($product->productImages)
                                        @foreach ($product->productImages as $item)
                                            <li><img src="{{ asset($item->product_image )}}" /></li>
                                        @endforeach
                                    @endisset
                            
                                </ul>
                            </div>
    
                            <div class="exzoom_nav"></div>
                            <!-- Nav Buttons -->
                            <p class="exzoom_btn">
                                <a href="javascript:void(0);" class="exzoom_prev_btn"> <i class="fa fa-angles-left"></i>
                                </a>
                                <a href="javascript:void(0);" class="exzoom_next_btn"> <i class="fa fa-angles-right"></i>
                                </a>
                            </p>
                        </div>
    
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="single-prodect-info">
    
                        <div class="single-prodect-title">
                            <h2>{{ $product->product_name }}</h2>
                        </div>

                        @if ( $product->total_product_unit_price && $product->total_product_qty )
                        @php
                            $totalprice = $product->total_product_unit_price;
                            $totalqty = $product->total_product_qty;
                            $unitprice = $totalprice / $totalqty;
                        @endphp
                        @endif

                        @if ($product->total_product_unit_price && $product->product_discount)
                            @php
                                $totaldiscount = $product->total_product_unit_price * $product->product_discount / 100;
                                $singlediscount = $totaldiscount / $product->total_product_qty ;
                                $saleprice =  $unitprice - $singlediscount;
                            @endphp
                        @endif
                        
                        <div class="single-prodect-offer-price d-flex">
                            <h3> নির্ধারিত মূল্য- {{ $saleprice ?? '0.0' }} টাকা </h3>
                            <h5> {{ $unitprice ?? '0.0' }} টাকা </h5>
                        </div>
    
                        <div class="single-prodect-description">
                            <p>
                                {!! $product->product_description !!}
                            </p>
                        </div>

                        @if (count($product->brands))
                            @php $brands = []; @endphp 
                            @foreach ($product->brands as $brand)
                            @php
                                $brands[]= $brand->pivot->brand_name;
                            @endphp
                            @endforeach

                            <div class="single-prodect-model">
                                <h3> ব্র্যান্ড: {{ implode(',', $brands) ?? 'টি সার্ট মডেল নং- AT-505'}} </h3>
                            </div>
                        @endif
                    
    
                        <div class="single-prodect-color">
                            <!-- <div class="spacer"></div> -->
                            <h3> কালার </h3>

                            @isset( $product->productColors )
                                <div class=" ms-2 row color_container" style="margin-left: -0.5rem!important;">
                                    @foreach ($product->productColors as $indx => $item)
                                        <div type="button" data-color="{{ $item->color_name  ?? ''}}" class=" col-md-2 col-1 color {{ $indx == 0 ? 'selected' : ''}} {{ matchColor($item->color_name) ? ' black' : '' }} " style="background-color: {{ $item->color_name }}; {{matchColor($item->color_name) ? 'box-shadow: 0px 0px 2px #000;' : '' }}"> <i class="fa-solid fa-check"></i></div>
                                    @endforeach
                                </div>
                            @endisset
                        </div>
    
                        <div class="single-prodect-size">
                            <h3> সাইজ </h3>
                            <div class="row" style="margin-left: -0.5rem!important;">
                                @isset( $product->productSizes )
                                    <div class=" ms-2 row size_container" style="margin-left: -0.5rem!important;">
                                        @foreach ($product->productSizes as $indx => $item)
                                            <div type="button" data-size="{{ $item->size_name  ?? ''}}" class=" col-md-2 col-1 size {{ $indx == 0 ? 'selected' : ''}}"> <span>{{ $item->size_name  ?? ''}}</span></div>
                                        @endforeach
                                    </div>
                                @endisset

                            </div>
    
                        </div>
    
                        <div class="actions">
                            @php
                                $stockQty = $product->total_stock_qty ?? 0;
                            @endphp
                            
                            @if($stockQty > 0)
                            <div class="btn-group" role="group">
                                <button type="button" id="minus" class="stateChange btn btn-light"><span class="fa fa-minus"></span></button>
                                <button type="button" style="cursor:default;" class="btn btn-light" id="count" data-min="1" data-max="{{ $stockQty >= 10 ? 10 : $stockQty}}">1</button>
                                <button type="button" id="plus" class="stateChange btn btn-light"><span class="fa fa-plus"></span></button>
                            </div>
                            @else 
                                <span class="text-danger fw-bold">Out of Stock</span>
                            @endif 
    
                            <div><button type="button" class="btn btn-dark" data-stockqty="{{$stockQty}}">কার্ডে যুক্ত করুন</button></div>
                            <div><button type="button" class="btn btn-danger" data-stockqty="{{$stockQty}}">অর্ডার করুন</button></div>
                            <div class="d-flex align-items-center text-danger" data-stockqty="{{$stockQty}}" type="button"><span class="fa fa-heart fa-2x"></span></div>
    
                        </div>
    
                        <div class="single-prodect-category">
                            <h3 class="mb-2"> ক্যাটাগরি সমূহঃ</h3>
                            <div class="d-flex flex-wrap gap-1">
                                @isset($product->category)
                                    <div class="ms-2 row category_container" style="margin-left: -0.5rem!important;">
                                        <div><button data-size="{{ $product->category->category_name  ?? ''}}" type="button" class="btn rounded btn-light me-2"> {{ $product->category->category_name  ?? ''}} </button></div>
                                    </div>
                                @endisset
                            </div>
                        </div>
    
                        <div class="single-prodect-category">
                            <h3 class="mb-2"> ট্যাগ সমূহঃ </h3>
                            <div class="d-flex flex-wrap  gap-1">

                                @isset( $product->singleProductTags )
                                    @foreach ($product->singleProductTags as $indx => $item)
                                        <div type="button" data-tag="{{ $item->tag_name  ?? ''}}"  class="btn rounded btn-light me-2">{{ $item->tag_name  ?? ''}}</div>
                                    @endforeach
                                @endisset 
                            </div>
                        </div>

    
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Product-Tabs Area-->
    <section class="container-fluid product-tabs">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
    
                    <div class="product-tab-area">

                        <ul class="nav nav-tabs" id="nav-tab" role="tablist">
                            <li class=" nav-item bg-light"> <a class="nav-link " data-bs-toggle="tab" href="#des"> ডিসক্রিপশন </a></li>
                            <li class="nav-item bg-light"> <a class="nav-link " data-bs-toggle="tab" href="#review"> স্পেসিফিকেশন </a></li>
                            <li class="nav-item bg-light"> <a class="nav-link active" data-bs-toggle="tab" href="#tag"> রিভিও </a></li>
                        </ul>

                        <div class="tab-content">
                            <div class="tab-pane" id="des">
                                <div class="row border g-0 shadow-sm">
                                    <div class="col-md-12 p-5 tabs-product-comments">
    
                                        <p>
                                       {!! $product->product_description !!}
                                        </p>
    
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="review">
                                <div class="row border g-0 shadow-sm">
                                    <div class="col p-5 tabs-product-comments">
                                        <p>
                                            {!! $product->product_specification !!}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane active" id="tag">
                                <div class="border g-0 shadow-sm">
    
                                    <div class="col tabs-product-comments d-flex">
    
                                        <div class="reviw-person">
                                            <img src="{{asset('assets/frontend/img/comment/comment.png')}}" alt="reviw person">
                                        </div>
                                        <div class="comment-text">
                                            <h3> অমুক রিভিও ভাই </h3>
                                            <ul class="tabs-product-review mb-2 list-unstyled d-flex">
                                                <li><i class="fa-solid fa-star"></i></li>
                                                <li><i class="fa-solid fa-star"></i></li>
                                                <li><i class="fa-solid fa-star"></i></li>
                                                <li><i class="fa-solid fa-star-half-stroke"></i></li>
                                                <li><i class="fa-regular fa-star"></i></li>
    
                                            </ul>
                                            <p>
                                                আমার বাংলা নিয়ে প্রথম কাজ করবার সুযোগ তৈরি হয়েছিল অভ্র নামক এক যুগান্তকারী
                                                বাংলা সফ্‌টওয়্যার হাতে পাবার মধ্য দিয়ে।
                                                এর পর একে একে বাংলা উইকিপিডিয়া, ওয়ার্ডপ্রেস বাংলা কোডেক্সসহ বিভিন্ন বাংলা
                                                অনলাইন পত্রিকা তৈরির কাজ করতে করতে বাংলার সাথে নিজেকে বেঁধে নিয়েছি
                                                আষ্টেপৃষ্ঠে।
                                                বিশেষ করে অনলাইন পত্রিকা তৈরি করতে ডিযাইন করার সময়, সেই ডিযাইনকে কোডে
                                                রূপান্তর করবার সময় বারবার অনুভব করেছি কিছু নমুনা লেখার।
                                                যে লেখাগুলো ফটোশপে বসিয়ে বাংলায় ডিযাইন করা যাবে, আবার সেই লেখাই অনলাইনে
                                                ব্যবহার করা যাবে।
                                            </p>
                                        </div>
    
                                    </div>
    
                                    <div class="col tabs-product-comments d-flex">
    
                                        <div class="reviw-person">
                                            <img src="{{asset('assets/frontend/img/comment/comment.png')}}" alt="reviw person">
                                        </div>
    
                                        <div class="comment-text w-100">
                                            <h3> অমুক রিভিও ভাই </h3>
                                            <ul class="tabs-product-review mb-2 list-unstyled d-flex">
                                                <li><i class="fa-solid fa-star"></i></li>
                                                <li><i class="fa-solid fa-star"></i></li>
                                                <li><i class="fa-solid fa-star"></i></li>
                                                <li><i class="fa-solid fa-star"></i></li>
                                                <li><i class="fa-solid fa-star"></i></li>

                                            </ul>
    
                                            <div class="comment-area w-100 mb-4">
                                                <textarea style="resize: none;" class="w-75"></textarea>
                                                <button type="button" class="d-block btn btn-sm btn-danger my-2"> Submit </button>
                                            </div>
    
                                        </div>
                                    </div>
    
                                </div>
                            </div>
                        </div>
                    </div>
    
                </div>
            </div>
        </div>
    </section>
    
    <!-- Related Product Area-->
    <section class="container-fluid related-product-area">
        <div class="container">
            <div class="heading-title text-center">
                <h2> আমাদের অন্যান্য পণ্যসমূহ </h2>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="product-slider">
                        <div class="slider" data-slick='{"slidesToShow": 5, "slidesToScroll": 5}'>
    
                            <div class="col-md-3 px-2">
                                <div class="card __product-card">
                                    <div class="card-wishlist" type="button"> <i class="fa-solid fa-heart"></i></div>
                                    <img src="{{asset('assets/frontend/img/slider/slider-5.png')}}" class="card-img-top" alt="...">
                                    <div class="card-body p-0">
                                        <div class="card-product-title card-title text-center fw-bold">
                                            <h5>টি-শার্ট</h5>
                                        </div>
                                        <div class="card-product-price card-text text-center fw-bold">
                                            <h5>বর্তমান মূুল্য- ২২০/= <span
                                                    class="text-decoration-line-through text-danger"> ২৫০/= </span></h5>
                                        </div>
                                        <div class="card-product-button d-flex justify-content-evenly">
                                            <button type="button" class="btn btn-sm btn-secondary btn-card">কার্ডে যুক্ত
                                                করুন</button>
                                            <button type="button" class="btn btn-sm btn-danger"> অর্ডার করুন </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
    
                            <div class="col-md-3 px-2">
                                <div class="card __product-card">
                                    <div class="card-wishlist" type="button"> <i class="fa-solid fa-heart"></i></div>
                                    <img src="{{asset('assets/frontend/img/slider/slider-5.png')}}" class="card-img-top" alt="...">
                                    <div class="card-body p-0">
                                        <div class="card-product-title card-title text-center fw-bold">
                                            <h5>টি-শার্ট</h5>
                                        </div>
                                        <div class="card-product-price card-text text-center fw-bold">
                                            <h5>বর্তমান মূুল্য- ২২০/= <span
                                                    class="text-decoration-line-through text-danger"> ২৫০/= </span></h5>
                                        </div>
                                        <div class="card-product-button d-flex justify-content-evenly">
                                            <button type="button" class="btn btn-sm btn-secondary btn-card">কার্ডে যুক্ত
                                                করুন</button>
                                            <button type="button" class="btn btn-sm btn-danger"> অর্ডার করুন </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
    
                            <div class="col-md-3 px-2">
                                <div class="card __product-card">
                                    <div class="card-wishlist" type="button"> <i class="fa-solid fa-heart"></i></div>
                                    <img src="{{asset('assets/frontend/img/slider/slider-5.png')}}" class="card-img-top" alt="...">
                                    <div class="card-body p-0">
                                        <div class="card-product-title card-title text-center fw-bold">
                                            <h5>টি-শার্ট</h5>
                                        </div>
                                        <div class="card-product-price card-text text-center fw-bold">
                                            <h5>বর্তমান মূুল্য- ২২০/= <span
                                                    class="text-decoration-line-through text-danger"> ২৫০/= </span></h5>
                                        </div>
                                        <div class="card-product-button d-flex justify-content-evenly">
                                            <button type="button" class="btn btn-sm btn-secondary btn-card">কার্ডে যুক্ত
                                                করুন</button>
                                            <button type="button" class="btn btn-sm btn-danger"> অর্ডার করুন </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
    
                            <div class="col-md-3 px-2">
                                <div class="card __product-card">
                                    <div class="card-wishlist" type="button"> <i class="fa-solid fa-heart"></i></div>
                                    <img src="{{asset('assets/frontend/img/slider/slider-5.png')}}" class="card-img-top" alt="...">
                                    <div class="card-body p-0">
                                        <div class="card-product-title card-title text-center fw-bold">
                                            <h5>টি-শার্ট</h5>
                                        </div>
                                        <div class="card-product-price card-text text-center fw-bold">
                                            <h5>বর্তমান মূুল্য- ২২০/= <span
                                                    class="text-decoration-line-through text-danger"> ২৫০/= </span></h5>
                                        </div>
                                        <div class="card-product-button d-flex justify-content-evenly">
                                            <button type="button" class="btn btn-sm btn-secondary btn-card">কার্ডে যুক্ত
                                                করুন</button>
                                            <button type="button" class="btn btn-sm btn-danger"> অর্ডার করুন </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
    
                            <div class="col-md-3 px-2">
                                <div class="card __product-card">
                                    <div class="card-wishlist" type="button"> <i class="fa-solid fa-heart"></i></div>
                                    <img src="{{asset('assets/frontend/img/slider/slider-5.png')}}" class="card-img-top" alt="...">
                                    <div class="card-body p-0">
                                        <div class="card-product-title card-title text-center fw-bold">
                                            <h5>টি-শার্ট</h5>
                                        </div>
                                        <div class="card-product-price card-text text-center fw-bold">
                                            <h5>বর্তমান মূুল্য- ২২০/= <span
                                                    class="text-decoration-line-through text-danger"> ২৫০/= </span></h5>
                                        </div>
                                        <div class="card-product-button d-flex justify-content-evenly">
                                            <button type="button" class="btn btn-sm btn-secondary btn-card">কার্ডে যুক্ত
                                                করুন</button>
                                            <button type="button" class="btn btn-sm btn-danger"> অর্ডার করুন </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
    
                            <div class="col-md-3 px-2">
                                <div class="card __product-card">
                                    <div class="card-wishlist" type="button"> <i class="fa-solid fa-heart"></i></div>
                                    <img src="{{asset('assets/frontend/img/slider/slider-5.png')}}" class="card-img-top" alt="...">
                                    <div class="card-body p-0">
                                        <div class="card-product-title card-title text-center fw-bold">
                                            <h5>টি-শার্ট</h5>
                                        </div>
                                        <div class="card-product-price card-text text-center fw-bold">
                                            <h5>বর্তমান মূুল্য- ২২০/= <span
                                                    class="text-decoration-line-through text-danger"> ২৫০/= </span></h5>
                                        </div>
                                        <div class="card-product-button d-flex justify-content-evenly">
                                            <button type="button" class="btn btn-sm btn-secondary btn-card">কার্ডে যুক্ত
                                                করুন</button>
                                            <button type="button" class="btn btn-sm btn-danger"> অর্ডার করুন </button>
                                        </div>
                                    </div>
                                </div>
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
                        <h2> আপনি যা খুঁজছিলেন তা খুঁজে পাননি? কল করুন:<span> <a href="tel:01971819813" class="text-decoration-none" type="button">০১৯৭-১৮১৯-৮১৩</a></span></h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/frontend/libs/slick-carousel/slick-theme.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/libs/slick-carousel/slick.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/libs/exzoom/jquery.exzoom.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/pages/css/product_detail.css') }}">
@endpush

@push('js')
    <script src="{{ asset('assets/frontend/libs/slick-carousel/slick.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/libs/exzoom/jquery.exzoom.js') }}"></script>
    <script>
        $(function(){
    
                $(document).on("click",'.color_container .color', selectColor)
                $(document).on("click",'.size_container .size', selectSize)
                $(document).on("click",'.stateChange', incrementDecrementCount)
    
                $("#exzoom").exzoom({
                    // thumbnail nav options
                    "navWidth": 60,
                    "navHeight": 60,
                    "navItemNum": 5,
                    "navItemMargin": 7,
                    "navBorder": 1,
                    // autoplay
                    "autoPlay": false,
                    // autoplay interval in milliseconds
                    // "autoPlayTimeout": 2000
                });
    
    
                // ============slider ================== 
                    $('.product-slider .slider').slick({
                        dots: true,
                        infinite: false,
                        speed: 500,
                        slidesToShow: 5,
                        slidesToScroll: 5,
                        // centerMode: true,
                        responsive: [{
                            breakpoint: 1024,
                            settings: {
                                slidesToShow: 3,
                                slidesToScroll: 3,
                                infinite: true,
                                dots: true
                            }
                        }, {
                            breakpoint: 600,
                            settings: {
                                slidesToShow: 2,
                                slidesToScroll: 2
                            }
                        }, {
                            breakpoint: 480,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1
                            }
                        }]
                    });
                // ============slider ================== 
    
    
            });


            function selectColor(){
                let currentElem = $(this);
                $(document).find('.color_container .color').removeClass('selected')
                currentElem.addClass('selected')
            }

            function selectSize(){
                let currentElem = $(this);
                $(document).find('.size_container .size').removeClass('selected')
                currentElem.addClass('selected')
            }
    
    
            function incrementDecrementCount(e){
                let 
                countElem   = $('#count'),
                count       = Number(countElem.text() ?? 0 ),
                elem        = $(this),
                ref         = elem.attr('id'),
                pattern1    = /(plus|increment|increament)/im,
                pattern2    = /(minus|decrement|decreament)/im,
                minCount    = Number(countElem?.attr('data-min') ?? 1),
                maxCount    = Number(countElem?.attr('data-max') ?? 10);
    
                if(pattern1.test(ref)){
    
                    count++;
                    if(count > maxCount) count = maxCount;
    
                }else if(pattern2.test(ref)){
    
                    count--;
                    if(count < minCount) count = minCount;
                }
    
                countElem.text(count);
            }
            
    </script>
@endpush