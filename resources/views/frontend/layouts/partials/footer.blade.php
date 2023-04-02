<!-- Footer Area-->
<footer class="container-fluid">

    <div class="container">
        <div class="row py-4">

            <div class="col-md-3">

                <div class="about-footer">
                    @if($footerabout)

                        @if($footerabout->footer_logo)
                            <div class="footer-logo my-3">
                                <a href="{{ url('/') }}"><img class="logo" src="{{asset($footerabout->footer_logo)}}" alt="footer logo"></a>
                            </div>
                        @endif

                        @if($footerabout->footer_about)
                            <div class="footer-text">
                                <h2>{{ $footerabout->footer_about }}</h2>
                            </div>
                        @endif

                    @endif

                    {{-- @dd($sociallink) --}}
                    @if($sociallink)
                        <div class="footer-social">
                            @if( $sociallink->facebook )
                                <a href="{{ $sociallink->facebook }}"><i class="fa-brands fa-facebook"></i></a>
                            @endif

                            @if( $sociallink->twitter )
                                <a href="{{ $sociallink->twitter }}"><i class="fa-brands fa-twitter"></i></a>
                            @endif

                            @if( $sociallink->instagram )
                                <a href="{{ $sociallink->instagram }}"><i class="fa-brands fa-instagram"></i></a> 
                            @endif

                            @if( $sociallink->linkedin )
                                <a href="{{ $sociallink->linkedin }}"><i class="fa-brands fa-linkedin"></i></a> 
                            @endif

                        </div>
                    @endif

                </div>
            </div>

            <div class="col-md-3">

                <div class="footer-text-header">
                    <h3 class="fw-bold"> কাস্টমাইজ </h3>
                </div>

                <div class="category-menu">
                    <ul class="list-unstyled">
                        @isset($customservicecategoriesFooter)
                            @foreach ( $customservicecategoriesFooter as $customservicecategory )
                                <li><a href="javascript:void(0)" class="customize-btn" data-categoryid="{{ $customservicecategory->id }}">{{ $customservicecategory->category_name }}</a></li>
                            @endforeach
                        @endisset

                    </ul>
                </div>

            </div>

            <div class="col-md-3">

                <div class="footer-text-header">
                    <h3 class="fw-bold"> মেনু </h3>
                </div>

                <div class="footer-menu">
                    <ul class="list-unstyled">
                        <li><a href="{{ route('home_index')}}"> কাস্টমাইজ</a></li>
                        <li><a href="{{ route('shop_index')}}"> শপ</a></li>
                        <li><a href="{{ route('about_index')}}"> আমাদের সম্পর্কে</a></li>
                        <li><a href="{{ route('contact_index')}}"> যোগাযোগ করুন </a></li>
                        <li class="ordertraking-footer"><a href="javascript:void(0)"> অর্ডার ট্র্যাক করুন </a></li>
                        <li><a href="{{ route('dashboard.index')}}"> একাউন্ট </a></li>
                    </ul>
                </div>
             
            </div>

            <div class="col-md-3">

                <div class="footer-text-header">
                    <h3 class="fw-bold">আমাদের অংগ প্রতিষ্ঠান সমূহ</h3>
                </div>


                <div class="our-organigation">
                    <ul class="list-unstyled d-flex">
                        @if(isset($organizationlogo))
                               @foreach ($organizationlogo as $ind => $organizationItem)
                                    <li><a href="{{ $ind == 0 ? 'https://www.facebook.com/keyringhouse':'https://www.facebook.com/merchandisefashion' }}"><img class="img-fluid" src="{{asset( $organizationItem->logo )}}" alt=""></a></li>
                               @endforeach
                        @endif
                    </ul>
                </div>

                @if($contactInfo)
                    <div class="footer-address">
                        @if ( $contactInfo->address )
                            <p>{{ $contactInfo->address }}</p>
                        @endif
                    </div>
                @endif

            </div>

        </div>
        <div class="row order-top-color pt-2">

            <div class="col-md-6">
                <div class="copy-right-footer">
                    <p> কপিরাইট © ২০২২ মাইক্রোমিডিয়া. সমস্ত অধিকার সংরক্ষিত. </p>
                </div>
            </div>

            <div class="col-md-6">
                <div class="footer-privacy-policy">
                    <ul class="list-unstyled d-flex justify-content-end align-items-start align-items-lg-center flex-column flex-lg-row ">
                        <li><a href="#"> প্রাইভেসি এন্ড পলিসি </a></li>
                        <li><a href="#"> টার্মস এন্ড কন্ডিশন </a></li>
                        <li><a href="#"> সাইটম্যাপ </a></li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</footer>

<button onclick="topFunction()" id="myBtn" title="Go to top">
    <i class="fa-solid fa-angles-up"></i> Top
</button>

