@extends('frontend.layouts.master')
@section('title','Checkout')

@section('content')
<!-- Breadcrumb Area-->
    {{-- <section class="container-fluid breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
    
                    <div class="breadcrumb-details d-flex align-items-center justify-content-center">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 py-4">
                                <li class="breadcrumb-item"><a href="#"> হোম </a></li>
                                <li class="breadcrumb-item active" aria-current="page"> সোপ </li>
                                <li class="breadcrumb-item active" aria-current="page"> চেক আউট </li>
                            </ol>
                        </nav>
                    </div>
    
                </div>
            </div>
        </div>
    </section> --}}
    
    <!-- Checkout Area-->
    <div class="container-fluid checkout-area my-5">
        <div class="container">
            <div class="row my-4">
                <div class="col-md-4 order-md-2 mb-4">
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-muted">কার্ট ইনফরমেশনঃ</span>
                        <span class="badge badge-secondary badge-pill">3</span>
                    </h4>
                    <ul class="list-group mb-3">
    
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div>
                                <h6 class="my-0"> প্রোডাক্ট দাম (৳): </h6>
                            </div>
                            <span class="text-muted">১২০</span>
                        </li>
    
                        <li class="list-group-item d-flex justify-content-between bg-light">
                            <div class="text-success">
                                <h6 class="my-0"> ডিসকাউন্ট (৳): </h6>
    
                            </div>
                            <span class="text-success">২০</span>
                        </li>
    
                        <li class="list-group-item d-flex justify-content-between">
                            <span> সর্বমোট (৳):</span>
                            <strong> ১০০ </strong>
                        </li>
    
                    </ul>
    
                    <form class="card">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="কুপন কোড ">
                            <button type="submit" class="btn btn-danger"> রিডিম </button>
                        </div>
                    </form>
                </div>
    
                <div class="col-md-8 order-md-1">
                    <h4 class="mb-3">শিপমেন্ট এড্রেসঃ</h4>
                    <div class="row">
    
                        <div class="col-md-6 px-2 mb-3">
                            <div class="form-group">
                                <input type="text" class="form-control border" placeholder="আপনার নাম লিখুন"
                                    name="full_name">
                            </div>
                        </div>
    
                        <div class="col-md-6 px-2 mb-3">
                            <div class="form-group">
                                <input type="text" class="form-control border" placeholder="আপনার মোবাইল নাম্বার লিখুন"
                                    name="mobile_no">
                            </div>
                        </div>
    
                        <div class="col-md-12 px-2 mb-3">
                            <div class="form-group">
                                <input type="email" class="form-control border" placeholder="আপনার ইমেইল লিখুন"
                                    name="email">
                            </div>
                        </div>
    
                        <div class="col-md-12 px-2 mb-3">
                            <div class="form-group">
                                <textarea name="address" id="" style="resize:vertical" cols="30" rows="10"
                                    class="form-control"
                                    placeholder="আপনার ঠিকানা লিখুন এবং সাথে বিভাগ , জেলা, পোস্টাল কোড ইত্যাদি !"></textarea>
                            </div>
                        </div>
    
                        <div class="col-md-12 px-2 mb-3">
                            <strong>Select a Payment</strong>
                            <div class="form-group">
                                <input type="radio" name="payment_type" id="bkash">
                                <label for="bkash">Bkash</label>
                                <!-- <input type="radio" name="payment_type" id="rocket">
                                <label for="rocket">Rocket</label> -->
                                <input type="radio" name="payment_type" id="sslcommerz" checked>
                                <label for="sslcommerz">SSL Commerz</label>
                            </div>
    
                            <div class="payment-type-box">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control border" name="card_no">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control border" name="card_no">
                                        </div>
                                    </div>
                                    <div class="col-md-4 my-3">
                                        <button class="btn btn-sm btn-danger text-white text-center"> <span
                                                class="fa fa-paper-plane mx-1"
                                                style="color: #fff !important;"></span>Proceed To Payment</button>
                                    </div>
                                </div>
                            </div>
                        </div>
    
                    </div>
                </div>
    
            </div>
        </div>
    </div>
    
    
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
    <link rel="stylesheet" href="{{ asset('assets/frontend/pages/css/checkout.css') }}">
@endpush