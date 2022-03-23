@extends('backend.layouts.master')

@section('title','Apply Coupon')

@section('content')
    <div>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">

            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary"><a href="/" class="text-decoration-none">Apply Coupon Settings</a> </h6>
                <button class="btn btn-sm btn-info" id="add"><i class="fa fa-plus"> Apply Coupon</i></button>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Coupon Name</th>
                                <th>Category Name</th>
                                <th>Product Name</th>
                                <th>User</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @isset($applycoupons)
                                @foreach ($applycoupons as $applycoupon)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $applycoupon->coupons->coupon_name }}</td>
                                        <td>{{ $applycoupon}}</td>
                                        <td>{{ $applycoupon}}</td>
                                        <td>{{ $applycoupon}}</td>
                                        <td class="text-center">
                                            {{-- <a href="" class="fa fa-eye text-info text-decoration-none"></a> --}}
                                            <a href="" class="fa fa-edit mx-2 text-warning text-decoration-none"></a>
                                            <a href="javascript:void(0)" class="fa fa-trash text-danger text-decoration-none"></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endisset

                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    
    </div>

    <div class="modal fade" id="applyCouponModal"  tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" role="dialog" data-backdrop="static" data-keyboard="false" aria-modal="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
    
                <div class="modal-header">
                    <h5 class="modal-title font-weight-bold modal-heading" id="exampleModalLabel">Apply Coupon</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
    
                <div class="modal-body">
                    <div id="service-container">
                        <div class="row">
                            <div class="col-md-12">
                                <h5 class="font-weight-bold bg-custom-booking">Apply Coupon Information</h5>
                                <hr>
                            </div>
                            
                            <div class="col-md-12" data-col="col">
                                <div class="form-group">
                                    <label for="coupon_id">Select Coupon</label>
                                    <select name="coupon_id" data-selected-coupontype="" class="coupon_id" data-required id="coupon_id" data-placeholder="Select Coupon">
                                        @isset($coupons)
                                            @foreach ($coupons as $coupon)
                                                @if (!count($coupon->applycoupons))
                                                <option value="{{ $coupon->id }}" data-coupontype="{{$coupon->coupon_type}}">{{ $coupon->coupon_name }}</option>
                                                @endif
                                            @endforeach
                                        @endisset
                                    </select>
                                </div>
                                <span class="v-msg"></span>
                            </div>

                            <div class="col-md-12 d-none" data-col="col">
                                <div class="form-group">
                                    <label for="category_id">Select Categories</label>
                                    <select name="category_id" multiple class="category_id" data-required id="category_id" data-placeholder="Select Category">
                                        <option value="include">Include</option>
                                        <option value="exclude">Exclude</option>
                                        <option value="category">Category</option>
                                        {{-- <option value="user">User</option> --}}
                                    </select>
                                </div>
                                <span class="v-msg"></span>
                            </div>

                            <div class="col-md-12 d-none" data-col="col">
                                <div class="form-group">
                                    <label for="product_id">Select Products</label>
                                    <select name="product_id" multiple class="product_id" data-required id="product_id" data-placeholder="Select Product"></select>
                                </div>
                                <span class="v-msg"></span>
                            </div>

                        </div>
                    </div>
                </div>
    
                <div class="modal-footer">
                    <div class="w-100">
                        <button type="button" id="reset" class="btn btn-sm btn-secondary"><i class="fa fa-sync"></i> Reset</button>
                        <button id="category_save_btn" type="button" class="save_btn btn btn-sm btn-success float-right"><i class="fa fa-save"></i> <span>Save</span></button>
                        <button type="button" class="btn btn-sm btn-danger float-right mx-1" data-dismiss="modal">Close</button>
                    </div>
                </div>
    
            </div>
        </div>
    </div>
    
@endsection

@push('css')
    <!-- Custom styles for this page -->
    <link href="{{ asset('assets/backend/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/backend/css/currency/currency.css')}}" rel="stylesheet">
    <style>
        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            background-color: #0f3aa4 !important;
            border: 1px solid #0f3aa4 !important;
            border-radius: 4px;
            cursor: default;
            float: left;
            margin-right: 5px;
            margin-top: 5px;
            padding: 0 5px;
            color: #fff !important;
        }
    </style>
@endpush

@push('js')
    <!-- Page level plugins -->
    <script src="{{ asset('assets/backend/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/backend/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <!-- Page level custom scripts -->
    <script src="{{ asset('assets/backend/libs/demo/datatables-demo.js') }}"></script>
    <script>
        $(document).ready(function(){
            init();

            $(document).on('click','#add', createModal)
            $(document).on('click','#category_save_btn', submitToDatabase)
            $(document).on('change','.coupon_id', visibleRelatedSelect2)
            $(document).on('keyup','.product_id', getProduct)
        });


        function getProduct(){
            console.log($(this));
        }


        function visibleRelatedSelect2(){
            let 
            elem                = $(this),
            selectedCouponType  = elem.find(':selected').attr('data-coupontype'),
            patternCat          = /category/im;

            elem.attr('data-selected-coupontype', selectedCouponType);

            if(patternCat.test(selectedCouponType)){
                // show category 
                $('.category_id').parent().parent().removeClass('d-none');
                $('.product_id').parent().parent().addClass('d-none');
            }else{
                $('.category_id').parent().parent().addClass('d-none');
                $('.product_id').parent().parent().removeClass('d-none');
            }

        }


        function init(){

            let arr=[
                {
                    dropdownParent  : '#applyCouponModal',
                    selector        : `#coupon_id`,
                    type            : 'select',
                },
                {
                    dropdownParent  : '#applyCouponModal',
                    selector        : `#category_id`,
                    type            : 'select',
                },
                // {
                //     dropdownParent  : '#applyCouponModal',
                //     selector        : `#product_id`,
                //     type            : 'select',
                //     tags: true
                // },
                {
                    dropdownParent  : '#applyCouponModal',
                    selector        : `#user_id`,
                    type            : 'select',
                },
            ];

            globeInit(arr);

            const URL = "{{ route('admin.applycoupon.searchProduct')}}";

            $("#product_id").select2({
                // minimumInputLength: 2,
                tags: [],
                ajax: {
                    url         : URL,
                    dataType    : 'json',
                    type        : "GET",
                    quietMillis : 50,
                    data        : function (term) {
                        return {
                            term: term
                        };
                    },
                    processResults     : function (data) {
                        console.log(data);
                        return {
                            results: $.map(data, function (item) {

                                return {
                                    text: item.product_name ?? 'N/A',
                                    id: item.id
                                }
                            })
                        };
                    }
                }
            });

            // $(`#stuff`).select2({
            //     width           : '100%',
            //     dropdownParent  : $('#categoryModal'),
            //     theme           : 'bootstrap4',
            // }).val(null).trigger('change')


            // $('#booking_date').datepicker({
            //     autoclose : true,
            //     clearBtn : false,
            //     todayBtn : true,
            //     todayHighlight : true,
            //     orientation : 'bottom',
            //     format : 'yyyy-mm-dd',
            // })
        }


        function createModal(){
            showModal('#applyCouponModal');
        }

        function submitToDatabase(){
            //

            ajaxFormToken();

            let obj = {
                url     : ``, 
                method  : "POST",
                data    : {},
            };

            ajaxRequest(obj);

            hideModal('#applyCouponModal');
        }

    </script>
@endpush
