<div class="accordion" id="accordionPanelsStayOpenExample">
    <div class="accordion-item">
        <h2 class="accordion-header" id="panelsStayOpen-headingOne">
            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                aria-controls="panelsStayOpen-collapseOne">
                ক্যাটাগরি
            </button>
        </h2>

        {{-- @dd($category) --}}
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
                        <div class="col-md-2 col-1 color selected" style="background-color: #F4DE17;"> <i
                                class="fa-solid fa-check"></i> </div>
                        <div class=" col-md-2 col-1 color" style="background-color: rgba(55, 158, 38, 0.93);"><i
                                class="fa-solid fa-check"></i></div>
                        <div class=" col-md-2 col-1 color" style="background-color: rgba(64, 207, 199, 0.5);"><i
                                class="fa-solid fa-check"></i></div>
                        <div class=" col-md-2 col-1 color" style="background-color: rgba(31, 71, 214, 0.4);"><i
                                class="fa-solid fa-check"></i></div>
                        <div class=" col-md-2 col-1 color" style="background-color: #43475C;"><i
                                class="fa-solid fa-check"></i></div>
                        <div class=" col-md-2 col-1 color "
                            style="background-color: rgba(255, 255, 255, 0.2); border: 1px solid #000000;"> <i
                                class="fa-solid fa-check"></i></div>
                        <div class=" col-md-2 col-1 color" style="background-color: #DC0029;"><i
                                class="fa-solid fa-check"></i></div>
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
                        <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span><span
                            tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                    </div>
                    <span id="min-price" data-currency="৳" class="slider-price">0</span> <span
                        class="seperator">-</span> <span id="max-price" data-currency="৳" data-max="3500"
                        class="slider-price">3500 +</span>
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