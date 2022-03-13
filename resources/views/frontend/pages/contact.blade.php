@extends('frontend.layouts.master')
@section('title','Contact')

@section('content')

<!-- Contact Area-->
<section class="container-fluid contact-area">
    <div class="container">
        <div class="row">

            <div class="col-md-6">
                <div class="contact-details">
                    <h2> অফিসের ঠিকানা </h2>
                    <!-- <img src="images/logo-mic.png" alt="contact logo"> -->
                    <p>
                        যে কোনো ধরনের কাস্টমাইজড প্রোডাক্ট সামগ্রী তৈরি করতে সর্বনিম্ন খরচে,
                        দ্রুততম সময়ে, সর্বোচ্চ গুনগত মানের নিশ্চয়তা পাবেন কেবল মাইক্রোমিডিয়ায়।
                        আপনার চাহিদা অনুযায়ী যে কোনো ধরনে কাস্টমাইজড
                        প্রিন্টের কাজের অর্ডার করুন উপরের লিস্ট থেকে।
                    </p>

                    <div class="contact-icons d-flex">
                        <div class="icon">
                            <i class="fa-solid fa-location-dot"></i>
                        </div>

                        <div class="icon-address">
                            <p>আমাদের ঠিকানা- <br>৪৮, দিপীকা মসজিদ মার্কেট,
                                দোকান নং- ১-৩, ৩য় তলা, তেজগাঁও শিল্প একলাকা, ঢাকা- ১২০৮।
                            </p>
                        </div>
                    </div>

                    <div class="contact-icons d-flex">
                        <div class="icon">
                            <i class="fa-regular fa-envelope"></i>
                        </div>

                        <div class="icon-address">
                            <p> micromedia@gamil.com </p>
                        </div>
                    </div>

                    <div class="contact-icons d-flex">
                        <div class="icon">
                            <i class="fa-solid fa-phone"></i>
                        </div>

                        <div class="icon-address">
                            <p> 01894 812 920-29 </p>
                        </div>
                    </div>

                    <div class="contact-social-media d-flex">
                        <a href="#"><i class="fa-brands fa-facebook"></i></a>
                        <a href="#"><i class="fa-brands fa-twitter-square"></i></a>
                        <a href="#"><i class="fa-brands fa-linkedin"></i></a>
                    </div>


                </div>
            </div>


            <div class="col-md-6 mt-3">
                <div class="contact-form">
                    <h3 class="text-center">যোগাযোগ করুন </h3>

                    <form>
                        <div class="form-group form-group2">
                            <input type="text" class="form-control form-control2 border mt-3"
                                id="exampleFormControlInput1" placeholder=" আপনার নাম ">
                        </div>

                        <div class="form-group">
                            <input type="email" class="form-control form-control2 border mt-3"
                                id="exampleFormControlInput1" placeholder=" ইমেইল অ্যাড্রেস ">
                        </div>

                        <div class="form-group">
                            <input type="email" class="form-control form-control2 border mt-3"
                                id="exampleFormControlInput1" placeholder=" ফোন নাম্বার ">
                        </div>

                        <div class="form-group">
                            <textarea style="resize: none;" class="form-control border mt-3"
                                id="exampleFormControlTextarea1" rows="20" cols="10"
                                placeholder=" আপনি কি চাচ্ছেন তা উল্লেখ করুন.... "></textarea>
                        </div>

                        <div class="form-group text-center mt-3">
                            <!-- <button class="contact-button btn btn-danger btn-sm btn-outline-none border-0"> পাঠিয়ে দিন </button> -->
                            <a href="#" class="btn btn-sm mt-3 btn-danger w-100"> পাঠিয়ে দিন </a>
                        </div>


                    </form>

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
                    <h2> আপনি যা খুঁজছিলেন তা খুঁজে পাননি? কল করুন:<span> <a href="tel:01971819813"
                                class="text-decoration-none" type="button">০১৯৭-১৮১৯-৮১৩</a></span></h2>
                </div>

            </div>
        </div>
    </div>

</section>

@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/frontend/pages/css/contact.css') }}">
@endpush