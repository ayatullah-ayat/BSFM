@extends('frontend.layouts.master')
@section('title','Your Cart')

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
                            <li class="breadcrumb-item active" aria-current="page"> কার্ট সেকশন </li>
                        </ol>
                    </nav>
                </div>

            </div>
        </div>
    </div>
</section> --}}

<!-- Cart Area-->
<section class="product-cart-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="cart-items-details cart-page">
                    <table class="table table-borderless table-sm">
                        <!-- --------------------- heading -------------------  -->
                        <tr class="bg-danger">
                            <th> প্রোডাক্ট </th>
                            <th class="text-center"> মূল্য </th>
                            <th class="text-center"> পরিমান </th>
                            <th class="text-right"> মোট মূল্য </th>
                        </tr>
                        <!-- --------------------- heading -------------------  -->
                        <tr>
                            <td class="align-middle">
                                <div class="cart-info">
                                    <a href="#"><i class="fa-solid fa-xmark fa-lg"></i></a>
                                    <img src="{{asset('assets/frontend/img/product/cap-2 2.png')}}" alt="">
                                    <p>Nike Airmax 270 react asdasdasdasdasdasdasdasdasds.</p>
                                </div>
                            </td>
                            <td class="text-center align-middle"> ৮০৳ </td>
                            <td class="text-center align-middle btn-qty-cell">
                                <div class="btn-group" role="group">
                                    <button type="button" id="minus" class="stateChange btn btn-light"><span
                                            class="fa fa-minus"></span></button>
                                    <button type="button" class="btn btn-light" id="count" data-min="1"
                                        data-max="10">1</button>
                                    <button type="button" id="plus" class="stateChange btn btn-light"><span
                                            class="fa fa-plus"></span></button>
                                </div>
                            </td>
                            <td class="text-right px-2 align-middle"> ২৪০৳</td>
                        </tr>

                        <tr>
                            <td class="align-middle">
                                <div class="cart-info">
                                    <a href="#"><i class="fa-solid fa-xmark fa-lg"></i></a>
                                    <img src="{{asset('assets/frontend/img/product/cap-2 2.png')}}" alt="">
                                    <p>Nike Airmax 270 react</p>
                                </div>
                            </td>
                            <td class="text-center align-middle"> ৮০৳ </td>
                            <td class="text-center align-middle">
                                <div class="btn-group" role="group">
                                    <button type="button" id="minus" class="stateChange btn btn-light"><span
                                            class="fa fa-minus"></span></button>
                                    <button type="button" class="btn btn-light" id="count" data-min="1"
                                        data-max="10">1</button>
                                    <button type="button" id="plus" class="stateChange btn btn-light"><span
                                            class="fa fa-plus"></span></button>
                                </div>
                            </td>
                            <td class="text-right px-2 align-middle"> ২৪০৳</td>
                        </tr>

                        <!-- -------------------- footer ---------------------------  -->
                        <tr class="fw-bold">
                            <td colspan="3" class="text-dark text-end"> <span>সর্বমোট</span></td>
                            <td class="px-2"> ৮০০৳ </td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2">
                                <a href="{{ route('checkout_index') }}" class="btn btn-danger btn-sm text-decoration-none text-white w-100">চেক আউট</a>
                            </td>
                        </tr>
                        <!-- -------------------- footer ---------------------------  -->

                    </table>
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
    <link rel="stylesheet" href="{{ asset('assets/frontend/pages/css/cart.css') }}">
@endpush