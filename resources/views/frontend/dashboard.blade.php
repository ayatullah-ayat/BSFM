@extends('frontend.layouts.master')
@section('title','Dashboard')

@section('content')
    <!-- User Dashboard Area-->
    <section class="user-dashboard-area mt-3 mb-5">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="sidebar">
    
                        <div class="sidebar__info">
                            <p class="p-1"> কাস্টমার ইনফরমেশন </p>
    
                            <div class="d-flex align-items-center py-2">
    
                                <div class="sidebar__info--thumbnail mx-3">
                                    {!! profilePhoto(auth()->user()->profile ? auth()->user()->profile->photo : null,['class' => 'img-fluid', 'width' => '50px', 'draggable' => 'false'] ) !!}
                                </div>
    
                                <div class="sidebar__info--content">
                                    <h3>{{ auth()->user()->name ?? 'N/A' }}</h3>
                                </div>
                            </div>
    
                        </div>
    
                        <div class="user-dashboard-menu">
                            <div class="">
                                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                                    aria-orientation="vertical">
                                    <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill"
                                        data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home"
                                        aria-selected="true"> ড্যাশবোর্ড </button>
                                    <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill"
                                        data-bs-target="#v-pills-profile" type="button" role="tab"
                                        aria-controls="v-pills-profile" aria-selected="false"> প্রফাইল </button>
                                    <button class="nav-link" id="v-pills-purchaseditems-tab" data-bs-toggle="pill"
                                        data-bs-target="#v-pills-purchaseditems" type="button" role="tab"
                                        aria-controls="v-pills-purchaseditems" aria-selected="false"> কেনা আইটেম </button>
                                    <button class="nav-link" id="v-pills-orderlist-tab" data-bs-toggle="pill"
                                        data-bs-target="#v-pills-orderlist" type="button" role="tab"
                                        aria-controls="v-pills-orderlist" aria-selected="false">অর্ডার লিস্ট </button>
                                    <button class="nav-link" id="v-pills-editprofile-tab" data-bs-toggle="pill"
                                        data-bs-target="#v-pills-editprofile" type="button" role="tab"
                                        aria-controls="v-pills-editprofile" aria-selected="false"> ইডিট প্রফাইল </button>
                                    <button class="nav-link" id="v-pills-resetpass-tab" data-bs-toggle="pill"
                                        data-bs-target="#v-pills-resetpass" type="button" role="tab"
                                        aria-controls="v-pills-resetpass" aria-selected="false"> রিসেট পাসওয়ার্ড </button>
                                    <button class="nav-link" onclick="javascript: document.getElementById('logoutForm').submit()" data-bs-toggle="pill" type="button" >লগ আউট </button>
                                    <form action="{{ route('logout') }}" method="POST" id="logoutForm"> @csrf </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    
                <div class="col-md-9">
                    <div class="mainbar">
    
                        <div class="user-profile-details">
                            <div class="tab-content" id="v-pills-tabContent">
                                <div class="tab-pane fade active show" id="v-pills-home" role="tabpanel"
                                    aria-labelledby="v-pills-home-tab">
                                    <div class="account-info">
                                        <h2 class="mb-3"> ড্যাশবোর্ড </h2>
                                        <div class="row g-3">
                                            <div class="col-md-4">
                                                <div class="box">
                                                    <h2 class="title"> My Account </h2>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="box">
                                                    <h2 class="title"> My Balance </h2>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="box border">
                                                    <h2 class="title">Total Orders </h2>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="box">
                                                    <h2 class="title"> Pending Orders </h2>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="box">
                                                    <h2 class="title"> Recent Orders</h2>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="box">
                                                    <h2 class="title"> My Account </h2>
                                                </div>
                                            </div>
    
                                        </div>
                                    </div>
                                </div>
    
                                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
                                    aria-labelledby="v-pills-profile-tab">
                                    <div class="account-info">
                                        <h2 class="mb-3"> প্রফাইল </h2>
                                        <div class="row justify-content-between">
    
                                            <div class="col-md-4 order-md-2">
                                                <div class="user-profile-picture">
                                                    {!! profilePhoto(auth()->user()->profile ? auth()->user()->profile->photo : null ) !!}
                                                </div>
                                            </div>
                                            <div class="col-md-8 order-md-1">
                                                <div class="user-profile-info">
                                                    @php
                                                        $authUser   = auth()->user();
                                                        $gender     = null;
                                                        $hasProfile = false;
                                                        if($authUser->profile){
                                                            $hasProfile = true;
                                                            $gender = $authUser->profile->gender == 1 ? 'পুরুষ' : ($authUser->profile->gender == 2 ? 'মহিলা' : 'অন্যান্য');
                                                        }
                                        
                                                    @endphp
                                                    <ul>
                                                        <li><span class="text-danger fw-bold"> নামঃ </span> {{ $authUser->name ?? 'N/A' }} </li>
                                                        <li><span class="text-danger fw-bold"> ইউজার নামঃ </span> {{ $authUser->name ?? 'N/A' }}</li>
                                                        <li><span class="text-danger fw-bold"> ইমেইলঃ </span> {{ $authUser->email ?? 'N/A' }} </li>
                                                        <li><span class="text-danger fw-bold"> মোবাইলঃ </span> {{ $hasProfile ? $authUser->profile->mobile_no : 'N/A' }}</li>
                                                        <li><span class="text-danger fw-bold"> লিঙ্গঃ </span>{{ $gender ?? 'N/A' }} </li>
                                                        <li><span class="text-danger fw-bold"> ঠিকানাঃ </span> {{ $hasProfile ? $authUser->profile->address : 'N/A' }} </li>
                                                    </ul>
                                                </div>
                                            </div>
    
                                        </div>
                                    </div>
                                </div>
    
                                <div class="tab-pane fade" id="v-pills-purchaseditems" role="tabpanel"
                                    aria-labelledby="v-pills-purchaseditems-tab">
                                    <div class="account-info">
                                        <h2 class="mb-3"> কেনা আইটেম </h2>
                                        <div class="data-table">
                                            <table id="user-purchaseditems" class="table table-striped w-100">
                                                <thead class="bg-danger">
                                                    <tr class="text-white">
                                                        <th> প্রডাক্ট নাম </th>
                                                        <th> অর্ডার </th>
                                                        <th>মোট অর্ডার</th>
                                                        <th> পরিমাণ </th>
                                                        <th> সময় </th>
                                                        <th> মূল্য </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="order-product align-middle">
                                                            <div class="inner-wrap">
                                                                <img src="{{asset('assets/frontend/img/product/product-1.png')}}" alt="">
                                                                <p>Garrett consecte vitae suscipit optio. </p>
                                                            </div>
                                                        </td>
                                                        <td class="align-middle">System Architect</td>
                                                        <td class="align-middle">Edinburgh</td>
                                                        <td class="align-middle">61</td>
                                                        <td class="align-middle">2011/04/25</td>
                                                        <td class="align-middle">$320,800</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="order-product">
                                                            <div class="inner-wrap">
                                                                <img src="{{asset('assets/frontend/img/product/product-2.png')}}" alt="">
                                                                <p>Garrett Winters System Architect weqrqwrwq </p>
                                                            </div>
                                                        </td>
                                                        <td class="align-middle">Accountant</td>
                                                        <td class="align-middle">Edinburgh</td>
                                                        <td class="align-middle">61</td>
                                                        <td class="align-middle">2011/04/25</td>
                                                        <td class="align-middle">$320,800</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="order-product">
                                                            <div class="inner-wrap">
                                                                <img src="{{asset('assets/frontend/img/product/product-3.png')}}" alt="">
                                                                <p>Garrett Winters System Architect weqrqwrwq </p>
                                                            </div>
                                                        </td>
                                                        <td class="align-middle">Accountant</td>
                                                        <td class="align-middle">Edinburgh</td>
                                                        <td class="align-middle">61</td>
                                                        <td class="align-middle">2011/04/25</td>
                                                        <td class="align-middle">$320,800</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="order-product">
                                                            <div class="inner-wrap">
                                                                <img src="{{asset('assets/frontend/img/product/product-4.png')}}" alt="">
                                                                <p>Garrett Winters System Architect weqrqwrwq </p>
                                                            </div>
                                                        </td>
                                                        <td class="align-middle">Accountant</td>
                                                        <td class="align-middle">Edinburgh</td>
                                                        <td class="align-middle">61</td>
                                                        <td class="align-middle">2011/04/25</td>
                                                        <td class="align-middle">$320,800</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="order-product">
                                                            <div class="inner-wrap">
                                                                <img src="{{asset('assets/frontend/img/product/product-5.png')}}" alt="">
                                                                <p>Garrett Winters System Architect weqrqwrwq </p>
                                                            </div>
                                                        </td>
                                                        <td class="align-middle">Accountant</td>
                                                        <td class="align-middle">Edinburgh</td>
                                                        <td class="align-middle">61</td>
                                                        <td class="align-middle">2011/04/25</td>
                                                        <td class="align-middle">$320,800</td>
                                                    </tr>
    
                                                </tbody>
                                                <tfoot>
                                                    <tr class="text-center">
                                                        <th> প্রডাক্ট নাম </th>
                                                        <th> অর্ডার </th>
                                                        <th>মোট অর্ডার</th>
                                                        <th> পরিমাণ </th>
                                                        <th> সময় </th>
                                                        <th> মূল্য </th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
    
                                <div class="tab-pane fade" id="v-pills-orderlist" role="tabpanel"
                                    aria-labelledby="v-pills-orderlist-tab">
                                    <div class="account-info">
                                        <h2 class="mb-3"> অর্ডার লিস্ট </h2>
                                        <div class="data-table">
                                            <table id="user-product-oderlist" class="table table-striped w-100">
                                                <thead class="bg-danger">
                                                    <tr class="text-white">
                                                        <th> প্রডাক্ট নাম </th>
                                                        <th> অর্ডার </th>
                                                        <th>মোট অর্ডার</th>
                                                        <th> পরিমাণ </th>
                                                        <th> সময় </th>
                                                        <th> মূল্য </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="order-product align-middle">
                                                            <div class="inner-wrap">
                                                                <img src="{{asset('assets/frontend/img/product/product-1.png')}}" alt="">
                                                                <p>Garrett Winters System Architect Lorem ipsum dolor, sit
                                                                    amet consectetur adipisicing elit. Id dignissimos ea
                                                                    pariatur aliquid molestiae perspiciatis corrupti totam
                                                                    minus omnis provident rem, distinctio explicabo at
                                                                    maiores a quis, vitae suscipit optio. </p>
                                                            </div>
                                                        </td>
                                                        <td class="align-middle">System Architect</td>
                                                        <td class="align-middle">Edinburgh</td>
                                                        <td class="align-middle">61</td>
                                                        <td class="align-middle">2011/04/25</td>
                                                        <td class="align-middle">$320,800</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="order-product">
                                                            <div class="inner-wrap">
                                                                <img src="{{asset('assets/frontend/img/product/product-2.png')}}" alt="">
                                                                <p>Garrett Winters System Architect weqrqwrwq </p>
                                                            </div>
                                                        </td>
                                                        <td class="align-middle">Accountant</td>
                                                        <td class="align-middle">Edinburgh</td>
                                                        <td class="align-middle">61</td>
                                                        <td class="align-middle">2011/04/25</td>
                                                        <td class="align-middle">$320,800</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="order-product">
                                                            <div class="inner-wrap">
                                                                <img src="{{asset('assets/frontend/img/product/product-3.png')}}" alt="">
                                                                <p>Garrett Winters System Architect weqrqwrwq </p>
                                                            </div>
                                                        </td>
                                                        <td class="align-middle">Accountant</td>
                                                        <td class="align-middle">Edinburgh</td>
                                                        <td class="align-middle">61</td>
                                                        <td class="align-middle">2011/04/25</td>
                                                        <td class="align-middle">$320,800</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="order-product">
                                                            <div class="inner-wrap">
                                                                <img src="{{asset('assets/frontend/img/product/product-4.png')}}" alt="">
                                                                <p>Garrett Winters System Architect weqrqwrwq </p>
                                                            </div>
                                                        </td>
                                                        <td class="align-middle">Accountant</td>
                                                        <td class="align-middle">Edinburgh</td>
                                                        <td class="align-middle">61</td>
                                                        <td class="align-middle">2011/04/25</td>
                                                        <td class="align-middle">$320,800</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="order-product">
                                                            <div class="inner-wrap">
                                                                <img src="{{asset('assets/frontend/img/product/product-5.png')}}" alt="">
                                                                <p>Garrett Winters System Architect weqrqwrwq </p>
                                                            </div>
                                                        </td>
                                                        <td class="align-middle">Accountant</td>
                                                        <td class="align-middle">Edinburgh</td>
                                                        <td class="align-middle">61</td>
                                                        <td class="align-middle">2011/04/25</td>
                                                        <td class="align-middle">$320,800</td>
                                                    </tr>
    
                                                </tbody>
                                                <tfoot>
                                                    <tr class="text-center">
                                                        <th> প্রডাক্ট নাম </th>
                                                        <th> অর্ডার </th>
                                                        <th>মোট অর্ডার</th>
                                                        <th> পরিমাণ </th>
                                                        <th> সময় </th>
                                                        <th> মূল্য </th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
    
                                <div class="tab-pane fade" id="v-pills-editprofile" role="tabpanel"
                                    aria-labelledby="v-pills-editprofile-tab">
    
                                    <div class="account-info">
                                        <h2 class="mb-3"> ইডিট প্রফাইল </h2>
                                        <div class="row">
    
                                            <div class="col-md-12 px-2 mb-3 d-flex align-items-center">
    
                                                <div class="profile-img">
                                                    {!! profilePhoto(auth()->user()->profile ? auth()->user()->profile->photo : null ) !!}
                                                    <div title="Click To Upload Image" type="button"
                                                        class="overlay d-flex align-items-center justify-content-center"
                                                        onclick="javascript: document.getElementById('profileImageUploader').click()">
                                                        <span class="fa-solid fa-images fa-2x text-danger"></span>
                                                        <input id="profileImageUploader" type="file"
                                                            class="form-control border file-loder bg-danger d-none"
                                                            name="profile_img">
                                                    </div>
                                                </div>
    
                                            </div>
    
                                            <div class="col-md-6 px-2 mb-3">
                                                <div class="form-group">
                                                    <input type="text" class="form-control border"
                                                        placeholder="আপনার নাম লিখুন" value="{{ $authUser->name ?? 'N/A' }}" name="full_name">
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6 px-2 mb-3">
                                                <div class="form-group">
                                                    <input type="text" class="form-control border"
                                                        placeholder="আপনার ইউজার নাম লিখুন" name="username">
                                                </div>
                                            </div>
    
                                            <div class="col-md-6 px-2 mb-3">
                                                <div class="form-group">
                                                    <input type="email" class="form-control border"
                                                        value="{{ $authUser->email ?? 'N/A' }}"
                                                        placeholder="আপনার ইমেইল লিখুন" name="email">
                                                </div>
                                            </div>
    
    
                                            <div class="col-md-6 px-2 mb-3">
                                                <div class="form-group">
                                                    <input type="text" class="form-control border"
                                                        value="{{ $hasProfile ? $authUser->profile->mobile_no : 'N/A' }}"
                                                        placeholder="আপনার মোবাইল নাম্বার লিখুন" name="mobile_no">
                                                </div>
                                            </div>
    
    
                                            <div class="col-md-6 px-2 mb-3">
                                                <div class="form-group">
                                                    <select class="form-select form-control border">
                                                        @php
                                                            $selectedDefault = "selected";
                                                            $address = null;
                                                            if($hasProfile){
                                                                $selectedDefault = "";
                                                                $address = $authUser->profile->address ?? '';
                                                            }

                                                        @endphp
                                                        <option value="" {{ $selectedDefault }}> সিলেক্ট ইউর জেন্ডার </option>
                                                        <option value="1" {{ $hasProfile && $authUser->profile->gender == 1 ? 'selected':'' }}> পুরুষ </option>
                                                        <option value="2" {{ $hasProfile && $authUser->profile->gender == 2 ? 'selected':'' }}> মহিলা </option>
                                                        <option value="3" {{ $hasProfile && $authUser->profile->gender == 3 ? 'selected':'' }}> অন্যান্য </option>
                                                    </select>
                                                </div>
                                            </div>
    
                                            <div class="col-md-6 px-2 mb-3">
                                                <div class="form-group">
                                                    <select class="form-select form-control border">
                                                        <option selected> সিলেক্ট ইউর জেলা </option>
                                                        <option value="2"> ঢাকা </option>
                                                        <option value="1"> রাজশাহী </option>
                                                        <option value="3"> বরিশাল </option>
                                                    </select>
                                                </div>
                                            </div>
    
                                            <div class="col-md-12 px-2 mb-3">
                                                <div class="form-group">
                                                    <textarea name="address" id="" style="resize:vertical" cols="5" rows="5"
                                                        class=" border form-control"
                                                        placeholder="আপনার এড্রেস লিখুন !">{{ $address ?? '' }}</textarea>
                                                </div>
                                            </div>
    
                                            <div class="col-md-4 mb-3">
                                                <button
                                                    class=" updatebtn btn btn-sm btn-danger text-white text-center px-5">
                                                    আপডেট </button>
                                            </div>
    
                                        </div>
                                    </div>
    
                                </div>
    
                                <div class="tab-pane fade" id="v-pills-resetpass" role="tabpanel"
                                    aria-labelledby="v-pills-resetpass-tab">
                                    <div class="account-info">
                                        <h2> রিসেট পাসওয়ার্ড </h2>
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
<link rel="stylesheet" href="{{ asset('assets/frontend/pages/css/user_dashboard.css') }}">
@endpush