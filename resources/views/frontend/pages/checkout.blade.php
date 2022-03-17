@extends('frontend.layouts.master')
@section('title','Checkout')

@section('content')
    <!-- Checkout Area-->
    <div class="container-fluid checkout-area my-5">
        <div class="container">
            <div class="row my-4">
                <div class="col-md-4 order-md-2 mb-4">
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-muted">ওভারভিউঃ </span>
                        <span class="badge badge-secondary badge-pill">3</span>
                    </h4>
                    <ul class="list-group mb-3">
    
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div>
                                <h6 class="my-0"> প্রোডাক্ট দাম (৳): </h6>
                            </div>
                            <span class="text-muted" id="producterdum">0.0</span>
                        </li>
    
                        <li class="list-group-item d-flex justify-content-between bg-light">
                            <div class="text-success">
                                <h6 class="my-0"> ডিসকাউন্ট (৳): </h6>
    
                            </div>
                            <span class="text-success" id="discount">0</span>
                        </li>
    
                        <li class="list-group-item d-flex justify-content-between">
                            <span> সর্বমোট (৳):</span>
                            <strong id="surbomot"> 0.0 </strong>
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
                    <!-- Checkout cart start-->
                        <section class="product-cart-area">
                            <div class="containerx">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="cart-items-details">
                                            <table class="table table-borderless table-sm">
                                                <!-- --------------------- heading -------------------  -->
                                                <tr class="bg-danger">
                                                    <th> প্রোডাক্ট </th>
                                                    <th class="text-center"> মূল্য (৳) </th>
                                                    <th class="text-center"> পরিমান </th>
                                                    <th class="text-right"> মোট মূল্য (৳) </th>
                                                </tr>
                                                <!-- --------------------- heading -------------------  -->
                                                @isset($product)
                                                    @if($product->total_product_unit_price && $product->total_stock_qty)
                                                        @php
                                                            $totalprice = $product->total_product_unit_price;
                                                            $totalqty   = $product->total_product_qty;
                                                            $unitprice  = $totalprice / $totalqty;
                                                        @endphp
                                                    @endif
                                                @endisset

                                                @if ( $product->total_product_unit_price && $product->product_discount )
                                                    @php
                                                        $totaldiscount  = $product->total_product_unit_price * $product->product_discount / 100;
                                                        $singlediscount = $totaldiscount / $product->total_product_qty ;
                                                        $saleprice      =  $unitprice - $singlediscount;
                                                    @endphp
                                                @endif


                                                @if(isset($product) && $product->product_name)
                                                <tr data-product="{{ $product->id }}">
                                                    <td class="align-middle">
                                                        <div class="cart-info">
                                                            <a href="javascript:void(0)"><i class="fa-solid fa-xmark fa-lg deleteItem"></i></a>
                                                            <img src="{{asset($product->product_thumbnail_image ?? '')}}" alt="">
                                                            <p>{{ $product->product_name ?? 'N/A'}}</p>
                                                        </div>
                                                    </td>
                                                    <td class="text-center align-middle Sale_Price"  data-salesprice="{{$saleprice * 1 }}"> {{ $saleprice ?? '0.0' }}</td>
                                                    <td class="text-center align-middle btn-qty-cell">
                                                        <div class="btn-group" role="group">
                                                            <button type="button" data-increment-type="minus" class="stateChange btn btn-light"><span
                                                                    class="fa fa-minus"></span></button>
                                                            <button type="button" class="btn btn-light count" data-min="1"
                                                                data-max="10" value="">1</button>
                                                            <button type="button" data-increment-type="plus" class="stateChange btn btn-light"><span
                                                                    class="fa fa-plus"></span></button>
                                                        </div>
                                                    </td>
                                                    <td class="text-right px-2 align-middle subtotal"> {{ $saleprice * 1 }}</td>
                                                </tr>

                                                @else 
                                                <tr>
                                                    <td class="align-middle">
                                                        <div class="cart-info">
                                                            <a href="#"><i class="fa-solid fa-xmark fa-lg"></i></a>
                                                            <img src="{{asset('assets/frontend/img/product/cap-2 2.png')}}" alt="">
                                                            <p>Nike Airmax 270 react else.</p>
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
                                                @endif 
                        
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    <!-- Checkout cart end -->

                    <!-- Checkout Shipment start-->
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
                    <!-- Checkout Shipment end-->

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
    <link rel="stylesheet" href="{{ asset('assets/frontend/pages/css/cart.css') }}">
@endpush

@push('js')
<script>
        $(function(){
            $(document).on("click",'.stateChange', incrementDecrementCount)
            $(document).on("click",'.deleteItem', removeItemFromRow)
        });

        function incrementDecrementCount(e){
            let 
            elem        = $(this),
            countElem   = elem.closest('tr').find('.count'),
            ref         = elem.attr('data-increment-type'),
            count       = Number(countElem.text() ?? 0 ),
            pattern1    = /(plus|increment|increament)/im,
            pattern2    = /(minus|decrement|decreament)/im,
            minCount    = Number(countElem?.attr('data-min') ?? 1),
            maxCount    = Number(countElem?.attr('data-max') ?? 10),
            price       = Number(elem.closest('tr').find('.Sale_Price').attr('data-salesprice') ?? 0);
            
            if(pattern1.test(ref)){

                count++;
                if(count > maxCount) count = maxCount;

            }else if(pattern2.test(ref)){

                count--;
                if(count < minCount) count = minCount;
            }

            
            countElem.text(count);

            priceCalculation( (price * count) , elem.closest('tr').find('.subtotal') )
        }

        function priceCalculation( price, target){

            let pattern = /^[+-]?\d+(\.\d+)$/im;
            if(pattern.test(price)){
                price = price.toFixed(3);
            }

            target.text(price);
            overview();
            
        }

        function removeItemFromRow(){
            let 
            elem    = $(this),
            len     = $(document).find('.cart-items-details table').find(`tr[data-product]`).length;
            if(len <= 1){
                alert('You can\'t delete This Product')
                return false;
            }

            if(confirm("Are you sure To remove the Product?")){
                elem.closest('tr[data-product]').remove();
                overview();
            }
        }


        function overview(){
            let 
            pattern         = /^[+-]?\d+(\.\d+)$/im,
            totalProduct    = 0,
            grandTotal      = 0,
            disCountPrice   = Number($('#discount').text() ?? 0),
            rows            = $(document).find('.cart-items-details table').find(`tr[data-product]`);

            [...rows].forEach(row => {
                let itemCount   = Number($(row).find('.count').text() ?? 0);
                let itemPrice   = Number($(row).find('.Sale_Price').attr('data-salesprice') ?? 0);
                totalProduct    = itemPrice * itemCount;
            })

            grandTotal = Number(totalProduct) + Number(disCountPrice);

            if(pattern.test(totalProduct)){
                totalProduct = totalProduct.toFixed(3);
                grandTotal   = grandTotal.toFixed(3)
            }

            $('#producterdum').text(totalProduct);
            $('#surbomot').text(grandTotal);
        }

        
</script>
@endpush