@extends('frontend.layouts.master')
@section('title','Shop')

@section('content')
<!-- Product Shop Area-->
<section class="container-fluid product-shop-area my-5">
    <div class="container">
        <div class="row shop-row">
            <div class="col-md-3">
                <div class="shop-sidebar">

                    <div class="accordion" id="accordionPanelsStayOpenExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                                    aria-controls="panelsStayOpen-collapseOne">
                                    ক্যাটাগরি
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show"
                                aria-labelledby="panelsStayOpen-headingOne">
                                <div class="accordion-body">
                                    <!-- --------------------- category start ---------------------  -->
                                    <div class="category">
                                        <div class="form-check parentCategory" type="button" data-category="ক্লথ">
                                            <i class="fa-solid fa-angle-up triggerIcon"></i>
                                            <label class="form-check-label" type="button"> ক্লথ </label>
                                        </div>
                                        <div class="childer-category" data-parent="ক্লথ">
                                            <div class="form-check">
                                                <input type="checkbox" id="টি-শার্ট">
                                                <label class="form-check-label" for="টি-শার্ট"> টি-শার্ট </label>
                                            </div>
                                            <div class="form-check">
                                                <input type="checkbox" id="পোলো টি শার্ট">
                                                <label class="form-check-label" for="পোলো টি শার্ট"> পোলো টি শার্ট
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input type="checkbox" id="ড্রেস">
                                                <label class="form-check-label" for="ড্রেস"> ড্রেস </label>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- ---------------- end of category --------------------  -->

                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false"
                                    aria-controls="panelsStayOpen-collapseTwo">
                                    কালার
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse"
                                aria-labelledby="panelsStayOpen-headingTwo">
                                <div class="accordion-body">
                                    <div class="single-prodect-color">
                                        <!-- <div class="spacer"></div> -->
                                        <h3> কালার </h3>

                                        <div class=" ms-2 row" style="margin-left: -0.5rem!important;">
                                            <div class="col-md-2 col-1 color selected" style="background-color: #F4DE17;"> <i class="fa-solid fa-check"></i> </div>
                                            <div class=" col-md-2 col-1 color" style="background-color: rgba(55, 158, 38, 0.93);"><i class="fa-solid fa-check"></i></div>
                                            <div class=" col-md-2 col-1 color" style="background-color: rgba(64, 207, 199, 0.5);"><i class="fa-solid fa-check"></i></div>
                                            <div class=" col-md-2 col-1 color" style="background-color: rgba(31, 71, 214, 0.4);"><i class="fa-solid fa-check"></i></div>
                                            <div class=" col-md-2 col-1 color" style="background-color: #43475C;"><i class="fa-solid fa-check"></i></div>
                                            <div class=" col-md-2 col-1 color " style="background-color: rgba(255, 255, 255, 0.2); border: 1px solid #000000;"> <i class="fa-solid fa-check"></i></div>
                                            <div class=" col-md-2 col-1 color" style="background-color: #DC0029;"><i class="fa-solid fa-check"></i></div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false"
                                    aria-controls="panelsStayOpen-collapseThree">
                                    সাইজ
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse"
                                aria-labelledby="panelsStayOpen-headingThree">
                                <div class="accordion-body">
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
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#panelsStayOpen-collapseFour" aria-expanded="false"
                                    aria-controls="panelsStayOpen-collapseThree">
                                    প্রাইজ
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseFour" class="accordion-collapse collapse"
                                aria-labelledby="panelsStayOpen-headingFour">
                                <div class="accordion-body w-100">

                                    <div class="price-slider">
                                        <div id="slider-range"
                                            class="ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content">
                                            <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                            <span tabindex="0"
                                                class="ui-slider-handle ui-corner-all ui-state-default"></span><span
                                                tabindex="0"
                                                class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                        </div>
                                        <span id="min-price" data-currency="৳" class="slider-price">0</span> <span
                                            class="seperator">-</span> <span id="max-price" data-currency="৳"
                                            data-max="3500" class="slider-price">3500 +</span>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingFive">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#panelsStayOpen-collapseFive" aria-expanded="false"
                                    aria-controls="panelsStayOpen-collapseThree">
                                    ট্যাগ
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseFive" class="accordion-collapse collapse"
                                aria-labelledby="panelsStayOpen-headingFive">
                                <div class="accordion-body">
                                    <div class="single-prodect-category">
                                        <h3 class="mb-2"> ট্যাগ সমূহঃ </h3>
                                        <div class="d-flex flex-wrap  gap-1">
                                            <div><button type="button" class="btn rounded btn-light me-2"> ম্যান ফ্যাশন
                                                </button></div>
                                            <div><button type="button" class="btn rounded btn-light me-2"> টি-শার্ট
                                                </button></div>
                                            <div><button type="button" class="btn rounded btn-light me-2"> টি-শার্ট
                                                </button></div>
                                            <div><button type="button" class="btn rounded btn-light me-2"> টি-শার্ট
                                                </button></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-md-9 w-100">
                <div class="row shopping-card-row">

                    @isset($products)
                        @foreach ($products as $item)
                            <div class="mb-3">
                                <div class="card __product-card">
                                    <div class="card-wishlist" type="button"> <i class="fa-solid fa-heart"></i></div>
                                    <img src="{{asset( $item->product_thumbnail_image )}}" class="card-img-top" alt="...">
                                    <div class="card-body p-0">
                                        <div class="card-product-title card-title text-center fw-bold">
                                            <h5>{{ $item->product_name }}</h5>
                                        </div>

                                        @if ( $item->total_product_unit_price && $item->total_product_qty )
                                            @php
                                                $totalprice = $item->total_product_unit_price;
                                                $totalqty = $item->total_product_qty;
                                                $unitprice = $totalprice / $totalqty;
                                            @endphp
                                        @endif

                                        @if ($item->total_product_unit_price && $item->product_discount)
                                            @php
                                                $totaldiscount = $item->total_product_unit_price * $item->product_discount / 100;
                                                $singlediscount = $totaldiscount / $item->total_product_qty ;
                                                $saleprice =  $unitprice - $singlediscount;
                                            @endphp
                                        @endif

                                        <div class="card-product-price card-text text-center fw-bold">
                                            <h5>বর্তমান মূুল্য {{$saleprice ?? '0.0'}} /= <span class="text-decoration-line-through text-danger">
                                                {{ $unitprice ?? '0.0'}} /=</span></h5>
                                        </div>
                                        <div class="card-product-button d-flex justify-content-evenly">
                                            <button type="button" class="btn btn-sm btn-secondary btn-card">কার্ডে যুক্ত
                                                করুন</button>
                                            <a href="{{ route('product_detail',$item->id ) }}" type="button" class="btn btn-sm btn-danger"> অর্ডার
                                                করুন </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endisset
                   

                    {{-- <div class=" mb-3">
                        <div class="card __product-card">
                            <div class="card-wishlist" type="button"> <i class="fa-solid fa-heart"></i></div>
                            <img src="{{asset('assets/frontend/img/slider/slider-5.png')}}" class="card-img-top" alt="...">
                            <div class="card-body p-0">
                                <div class="card-product-title card-title text-center fw-bold">
                                    <h5>টি-শার্ট</h5>
                                </div>
                                <div class="card-product-price card-text text-center fw-bold">
                                    <h5>বর্তমান মূুল্য- ২২০/= <span class="text-decoration-line-through text-danger">
                                            ২৫০/= </span></h5>
                                </div>
                                <div class="card-product-button d-flex justify-content-evenly">
                                    <button type="button" class="btn btn-sm btn-secondary btn-card">কার্ডে যুক্ত
                                        করুন</button>
                                    <button type="button" class="btn btn-sm btn-danger"> অর্ডার করুন </button>
                                </div>
                            </div>
                        </div>
                    </div> --}}

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
<link rel="stylesheet" href="{{ asset('assets/common_assets/libs/jquery/css/jquery-ui.css') }}">
<link rel="stylesheet" href="{{ asset('assets/frontend/pages/css/shop.css') }}">
@endpush

@push('js')
        <script src="{{ asset('assets/common_assets/libs/jquery/jquery-ui.min.js') }}"> </script>
        <script>
            $(function(){
        
                    $(document).on("click",'.parentCategory', toggleChildrenCategories)
        
                    $(document).on("click",'.stateChange', incrementDecrementCount)
        
                        
                    // ============Range Slider ================== 
                 
                        $("#slider-range").slider({
                            range: true, 
                            min: 0,
                            max: 5000,
                            step: 50,
                            slide: function( event, ui ) {
                                $( "#min-price").html(ui.values[ 0 ]);
                                
                                console.log(ui.values[0])
                                
                                suffix = '';
                                if (ui.values[ 1 ] == $( "#max-price").data('max') ){
                                suffix = ' +';
                                }
                                $( "#max-price").html(ui.values[ 1 ] + suffix);         
                            }
                        })
        
                    // ============slider ================== 
        
                });
        
                function toggleChildrenCategories(){
                    let 
                    elem    = $(this),
                    current = elem.attr('data-category'),
                    target  = $(`.childer-category[data-parent=${current}]`),
                    icon    = elem.find('.triggerIcon');
                    target.toggle();
        
                    if(icon.hasClass('fa-angle-down')){
                        icon.removeClass('fa-angle-down')
                        icon.addClass('fa-angle-up')
                    }else{
                        icon.removeClass('fa-angle-up')
                        icon.addClass('fa-angle-down')
                    }
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