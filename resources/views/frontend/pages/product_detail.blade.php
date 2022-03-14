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
                                    <!-- <li><img src="{{asset('assets/frontend/img/product/slider-6.png')}}"/></li> -->
                                    <li><img src="https://www.jqueryscript.net/demo/Feature-rich-Product-Gallery-With-Image-Zoom-xZoom/images/gallery/preview/01_b_car.jpg" />
                                    </li>
                                    <li><img src="{{asset('assets/frontend/img/product/product-1.png')}}" /></li>
                                    <li><img src="{{asset('assets/frontend/img/product/product-2.png')}}" /></li>
                                    <li><img src="{{asset('assets/frontend/img/product/product-3.png')}}" /></li>
                                    <li><img src="{{asset('assets/frontend/img/product/product-4.png')}}" /></li>
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
                            <h2> টি সার্ট </h2>
                        </div>
    
                        <div class="single-prodect-offer-price d-flex">
                            <h3> নির্ধারিত মূল্য- ১৫০ টাকা </h3>
                            <h5> ২৫০ টাকা </h5>
                        </div>
    
                        <div class="single-prodect-description">
                            <p>প্রিমিয়াম লাক্সারী টাইপের এই টি সার্টটিতে আপনি পাচ্ছেন ১০০% কটন, কম্ফোর্ট ও ডিভাইন লাইফের
                                ফিল,
                                যা আপনাকে সব সময় আরো এক ধাপ এগিয়ে নিতে সাহায্য করবে তীব্র বেগে। তাই আজই স্বপ্নের সাজে
                                নিজে সাজিয়ে তুলুন এক অন্যন নবায়নে।
                            </p>
                        </div>
    
                        <div class="single-prodect-model">
                            <h3> টি সার্ট মডেল নং- AT-505 </h3>
                        </div>
    
                        <div class="single-prodect-color">
                            <!-- <div class="spacer"></div> -->
                            <h3> কালার </h3>
    
                            <div class=" ms-2 row" style="margin-left: -0.5rem!important;">
                                <div class=" col-md-2 col-1 color selected" style="background-color: #F4DE17;"> <i
                                        class="fa-solid fa-check"></i></div>
                                <div class=" col-md-2 col-1 color" style="background-color: rgba(55, 158, 38, 0.93);"><i
                                        class="fa-solid fa-check"></i></div>
                                <div class=" col-md-2 col-1 color" style="background-color: rgba(64, 207, 199, 0.5);"><i
                                        class="fa-solid fa-check"></i></div>
                                <div class=" col-md-2 col-1 color" style="background-color: rgba(31, 71, 214, 0.4);"><i
                                        class="fa-solid fa-check"></i></div>
                                <div class=" col-md-2 col-1 color" style="background-color: #43475C;"><i
                                        class="fa-solid fa-check"></i></div>
                                <div class=" col-md-2 col-1 color "
                                    style="background-color: rgba(255, 255, 255, 0.2); border: 1px solid #000000;"><i
                                        class="fa-solid fa-check"></i></div>
                                <div class=" col-md-2 col-1 color" style="background-color: #DC0029;"><i
                                        class="fa-solid fa-check"></i></div>
                            </div>
    
                        </div>
    
                        <div class="single-prodect-size">
                            <h3> সাইজ </h3>
                            <div class="row" style="margin-left: -0.5rem!important;">
                                <div class=" col-md-2 col-1 size selected"><span>XXL-30</span> </div>
                                <div class=" col-md-2 col-1 size"><span>S-30</span> </div>
                                <div class=" col-md-2 col-1 size"><span>S-30</span> </div>
                                <div class=" col-md-2 col-1 size"><span>S-30</span> </div>
                                <div class=" col-md-2 col-1 size"><span>S-30</span> </div>
                            </div>
    
                        </div>
    
                        <div class="actions">
    
                            <div class="btn-group" role="group">
                                <button type="button" id="minus" class="stateChange btn btn-light"><span class="fa fa-minus"></span></button>
                                <button type="button" style="cursor:default;" class="btn btn-light" id="count" data-min="1" data-max="10">1</button>
                                <button type="button" id="plus" class="stateChange btn btn-light"><span class="fa fa-plus"></span></button>
                            </div>
    
                            <div><button type="button" class="btn btn-dark">কার্ডে যুক্ত করুন</button></div>
                            <div><button type="button" class="btn btn-danger">অর্ডার করুন</button></div>
                            <div class="d-flex align-items-center text-danger" type="button"><span class="fa fa-heart fa-2x"></span></div>
    
                        </div>
    
                        <div class="single-prodect-category">
                            <h3 class="mb-2"> ক্যাটাগরি সমূহঃ</h3>
                            <div class="d-flex flex-wrap gap-1">
                                <div><button type="button" class="btn rounded btn-light me-2"> ম্যান ফ্যাশন </button></div>
                                <div><button type="button" class="btn rounded btn-light me-2"> টি-শার্ট </button></div>
                                <div><button type="button" class="btn rounded btn-light me-2"> টি-শার্ট </button></div>
                                <div><button type="button" class="btn rounded btn-light me-2"> টি-শার্ট </button></div>
                            </div>
                        </div>
    
                        <div class="single-prodect-category">
                            <h3 class="mb-2"> ট্যাগ সমূহঃ </h3>
                            <div class="d-flex flex-wrap  gap-1">
                                <div><button type="button" class="btn rounded btn-light me-2"> ম্যান ফ্যাশন </button></div>
                                <div><button type="button" class="btn rounded btn-light me-2"> টি-শার্ট </button></div>
                                <div><button type="button" class="btn rounded btn-light me-2"> টি-শার্ট </button></div>
                                <div><button type="button" class="btn rounded btn-light me-2"> টি-শার্ট </button></div>
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
                                            প্রিমিয়াম লাক্সারী টাইপের এই টি সার্টটিতে আপনি পাচ্ছেন ১০০% কটন, কম্ফোর্ট ও
                                            ডিভাইন লাইফের ফিল,
                                            যা আপনাকে সব সময় আরো এক ধাপ এগিয়ে নিতে সাহায্য করবে তীব্র বেগে। তাই আজই স্বপ্নের
                                            সাজে নিজে সাজিয়ে তুলুন এক অন্যন নবায়নে।
                                            প্রিমিয়াম লাক্সারী টাইপের এই টি সার্টটিতে আপনি পাচ্ছেন ১০০% কটন, কম্ফোর্ট ও
                                            ডিভাইন লাইফের ফিল, যা আপনাকে সব সময় আরো এক ধাপ এগিয়ে নিতে সাহায্য করবে তীব্র
                                            বেগে।
                                            তাই আজই স্বপ্নের সাজে নিজে সাজিয়ে তুলুন এক অন্যন নবায়নে। প্রিমিয়াম লাক্সারী
                                            টাইপের এই টি সার্টটিতে আপনি পাচ্ছেন ১০০% কটন,
                                            কম্ফোর্ট ও ডিভাইন লাইফের ফিল, যা আপনাকে সব সময় আরো এক ধাপ এগিয়ে নিতে সাহায্য
                                            করবে তীব্র বেগে। তাই আজই স্বপ্নের সাজে নিজে সাজিয়ে তুলুন এক অন্যন নবায়নে।
                                            প্রিমিয়াম লাক্সারী টাইপের এই টি সার্টটিতে আপনি পাচ্ছেন ১০০% কটন, কম্ফোর্ট ও
                                            ডিভাইন লাইফের ফিল,
                                            যা আপনাকে সব সময় আরো এক ধাপ এগিয়ে নিতে সাহায্য করবে তীব্র বেগে। তাই আজই স্বপ্নের
                                            সাজে নিজে সাজিয়ে তুলুন এক অন্যন নবায়নে।
                                        </p>
    
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="review">
                                <div class="row border g-0 shadow-sm">
                                    <div class="col p-5 tabs-product-comments">
    
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur iusto facere
                                            voluptates
                                            aliquam odio libero quis modi recusandae sint eaque consequatur suscipit officia
                                            fugit hic
                                            odit ipsum asperiores tempora quae ab, aut id! Architecto magni fugiat vero
                                            unde,
                                            excepturi perspiciatis! Recusandae consectetur eius facere aliquid eaque nostrum
                                            placeat alias nihil!</p>
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