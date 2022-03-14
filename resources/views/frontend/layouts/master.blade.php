<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) ?? 'en' }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title','Micro Media')</title>

    {{-- libs css goes here --}}
    <link rel="stylesheet" href="{{ asset('assets/frontend/libs/bootstrap5/bootstrap5.min.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('assets/frontend/libs/fontawesome6/all.min.css') }}"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    {{-- main css goes here --}}
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/master.css') }}">

    @stack('css')

</head>

<body>

    {{-- -------- header -------------------------------  --}}
    @includeIf('frontend.layouts.partials.topbar')
    @includeIf('frontend.layouts.partials.header')
    {{-- -------- header -------------------------------  --}}

    {{-- ------------- content area ---------------------------  --}}
    @hasSection('content')
        @yield('content')
    @endIf
    
    @sectionMissing('content')
        <div class="py-5 mx-5">
            <h2 class="text-center text-uppercase font-weight-bold display-5 alert alert-danger alert-heading">No content Found</h2>
        </div>
    @endIf
    {{-- ------------- content area ---------------------------  --}}

    {{-- -------- footer ------------------------------- --}}
    @includeIf('frontend.layouts.partials.footer')
    {{-- -------- footer ------------------------------- --}}


    <div class="modal fade" style="z-index: 22001;" id="orderTrackModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content modal-dialog-scrollable">
    
                <div class="modal-header">
                    <h5 class="modal-title text-center mx-auto" id="exampleModalLabel "> আপনার অর্ডার ট্রাক করুন! </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
    
                <div class="modal-body">
    
                    <div class="row track-order-group mb-5">
                        <div class="form-group">
                            <input type="text" placeholder="Enter Order No" class="form-control order-track-input border">
                        </div>
                    </div>

                    <div class="row order-track-row" style="display: none;">
                        <div class="container-fluid">
                            <article class="card">
                                <header class="card-header bg-danger text-white"> <b> My Orders / Tracking </b> </header>
                                <div class="card-body">
                        
                                    <div class="row">
                                        <div class="col-md-2">
                                            <b> Invoice No. </b><br>
                                            0343434343
                                        </div> <!-- // end col md 2 -->
                        
                                        <div class="col-md-2">
                                            <b> Order Date </b><br>
                                            02/10/2021
                                        </div> <!-- // end col md 2 -->
                        
                                        <div class="col-md-2">
                                            <b> Shipping By - Jhioe </b><br>
                                            dhaka / kerani gonj
                                        </div> <!-- // end col md 2 -->
                        
                                        <div class="col-md-2">
                                            <b> Mobile No. </b><br>
                                            01762192067
                                        </div> <!-- // end col md 2 -->
                        
                                        <div class="col-md-2">
                                            <b> Payment Method </b><br>
                                            bkash
                                        </div> <!-- // end col md 2 -->
                        
                                        <div class="col-md-2">
                                            <b> Total Amount </b><br>
                                            $ 200
                                        </div> <!-- // end col md 2 -->
                        
                                    </div> <!-- // end row   -->
                        
                        
                                    <div class="track">
                        
                                        @if('' == 'pending')
                        
                                        <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Pending</span> </div>
                                        <div class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text"> Order Confirmed</span> </div>
                                        <div class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text"> Order Processing </span> </div>
                                        <div class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Delivered</span> </div>

                                        @elseif('' == 'confirm')
                        
                                        <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Pending</span> </div>
                                        <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Confirmed</span> </div>
                                        <div class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text"> Order Processing </span> </div>
                                        <div class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Delivered</span> </div>
                        
                                        @elseif('' == 'processing')
                        
                                        <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Pending</span> </div>
                                        <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Confirmed</span> </div>
                                        <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Processing </span> </div>
                                        <div class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Delivered</span> </div>
                        
                                        @elseif('delivered' == 'delivered')
                        
                                        <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Pending</span> </div>
                                        <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Confirmed</span> </div>
                                        <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Processing </span> </div>
                                        <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Delivered </span> </div>
                         
                                        @endif                        
                        
                                    </div> <!-- // end track  -->
                        
                                    <hr><br><br>
                                </div>
                            </article>
                        </div>
                    </div>

                    <div class="row px-3 order-not-found" style="display: none;">
                        <div class="col-md-12 alert alert-danger">
                            <h2>404</h2>
                            <h6>Oops ! No Order Found!</h6>
                        </div>
                    </div>
    
                </div>
    
            </div>
        </div>
    </div>

</body>

<script src="{{ asset('assets/common_assets/libs/jquery/jquery.min.js') }}"> </script>
<script src="{{ asset('assets/frontend/libs/bootstrap5/boostrap5.bundle.min.js') }}"></script>
<script src="{{ asset('frontend/libs/fontawesome6/all.min.js') }}"></script>
<script>
    $(document).ready(function(){
        $(document).on('click','.ordertraking > a', openTrackModal)
        $(document).on('change','.order-track-input', callToTrack)
    })


    function callToTrack(){
        let orderNo = $(this).val();
        if(!orderNo){
            $('.order-not-found').show();
            $('.order-track-row').hide();
        }else{
            $('.order-track-row').show();
            $('.order-not-found').hide();
        }
    }

    function openTrackModal(){
        $('#orderTrackModal').modal('show')
    }
</script>
@stack('js')

</html>