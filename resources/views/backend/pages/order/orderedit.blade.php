@extends('backend.layouts.master')

@section('title', 'Edit Order')

@section('content')
    <div>
        <div class="container card p-3 shadow">
            <div class="container py-3 d-flex justify-content-between align-items-center">
                <h4 class="text-dark font-weight-bold text-dark">Edit Order Information</h4>
                <a class="text-white btn btn-sm btn-info float-right" href="{{ route('admin.ecom_orders.order_manage') }}"><i class="fa fa-arrow-left"> Back</i></a>
            </div>
            <div class="row">

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="product"> Order NO</label>
                        <input readonly type="text" class="form-control" value="{{ $orderdata->order_no }}">
                    </div>
                    <span class="v-msg"></span>
                </div>

                <div class="col-md-4" data-col="col">
                    <div class="form-group">
                        <label for="order_date">Order Date </label>
                        <input type="text" data-required autocomplete="off" class="form-control" id="order_date" name="order_date" placeholder="Order Date" value="{{ $orderdata->order_date }}">
                    </div>
                    <span class="v-msg"></span>
                </div>

                <div class="col-md-4" data-col="col">
                    <div class="form-group">
                        <label for="customer"> Customer </label>
                        <select name="customer" class="customer" data-required id="customer" data-placeholder="Select Customer">
                            @if ($customers)
                                @foreach ($customers as $customer)
                                    <option value="{{ $customer->id }}">{{ $customer->customer_name }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <span class="v-msg"></span>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="note">Note</label>
                        <textarea name="note" id="note" cols="0" rows="3" class="form-control note" placeholder="{{ $orderdata->order_note }}" value="{{ $orderdata->order_note }}" ></textarea>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="shipping_address">Shipment</label>
                        <textarea name="shipping_address" id="shipping_address" cols="0" rows="3" class="form-control shipment" placeholder="{{ $orderdata->shipping_address }}" value="{{ $orderdata->shipping_address }}" ></textarea>
                    </div>
                </div>



                <div class="col-md-12">
                    <div class="table-responsive w-100">
                        <table class="table table-bordered table-sm">
                            <thead class="bg-danger text-white">
                                <tr>
                                    <th>Item Information</th>
                                    <th>Color</th>
                                    <th width="200">Size</th>
                                    <th width="100" class="text-center">Qty</th>
                                    <th width="150" class="text-center">Product Price</th>
                                    <th width="150" class="text-center">Discount Price</th>
                                    <th width="150" class="text-center">Total</th>
                                    {{-- <th width="100" class="text-center">
                                        <button class="btn btn-sm btn-info"><i class="fa fa-plus"></i> Add</button>
                                    </th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <select name="product" class="product" data-required id="product" data-placeholder="Select Customer">
                                                @if ($products)
                                                    @foreach ($products as $product)
                                                        <option value="{{ $product->id }}">{{ $product->product_name }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                        <span class="v-msg"></span>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <select name="color" class="color" data-required id="color" data-placeholder="Select Color">
                                                @if($colors)
                                                    @foreach ($colors as $color)
                                                        <option value="{{ $color->variant_name }}">{{ $color->variant_name }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                        <span class="v-msg"></span>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <select name="size" class="size" data-required id="size" data-placeholder="Select Sizes">
                                                @if($sizes)
                                                    @foreach ($sizes as $size)
                                                        <option value="{{ $size->variant_name }}">{{ $size->variant_name }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                        <span class="v-msg"></span>
                                    </td>
                                    <td >
                                        <input type="text" id="order_qty" class="form-control calculatePrice" value="{{ $detaildata->product_qty }}">
                                    </td>
                                    <td>
                                        <input type="text" id="unit_price" class="form-control calculatePrice" value="{{ $detaildata->product_price }}">
                                    </td>
                                    <td>
                                        <input type="text" readonly id="discount_price" class="form-control" value="{{ $detaildata->discount_price }}">
                                    </td>
                                    <td>
                                        <input type="text" id="total_price" class="form-control" value="{{ $detaildata->subtotal }}">
                                    </td>
                                    {{-- <td class="text-center">
                                        <i class="fa fa-times text-danger fa-lg" type="button"></i>
                                    </td> --}}
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="col-md-12 d-flex justify-content-end">
                    <button id="order_update_btn" class="btn btn-success text-right outline-none"> <i class="fa fa-save"></i> Update</button>
                </div>

            </div>
        </div>
    </div>
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/backend/css/purchase/addpurchase.css')}}">
@endpush

@push('js')
<script>
    $(document).ready(function(){
        init();
        $(document).on('click','#order_update_btn', updateToDatabase)
        $(document).on('input keyup change', ".calculatePrice", OrderPriceCalculation)
    });

    function OrderPriceCalculation(){
            let price   = Number($('#order_qty').val().trim() ?? 0);
            let qty     = Number($('#unit_price').val().trim() ?? 0);

            if( price < 0 ){
                price  =0;
                $('#price').val(price)
            }
            if( qty < 0 ){
                qty  =0;
                $('#qty').val(qty)
            }

            let total   = price * qty;
            $('#total_price').val(total);
    }

    function init(){

        let arr=[
            {
                selector        : `#customer`,
                type            : 'select',
            },
            {
                selector        : `#product`,
                type            : 'select',
            },
            {
                selector        : `#color`,
                type            : 'select'
            },
            {
                selector        : `#size`,
                type            : 'select'
            },
            {
                selector        : `#order_date`,
                type            : 'date',
                format          : 'yyyy-mm-dd',
            },
        ];

        globeInit(arr);

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

    function updateToDatabase(){
        ajaxFormToken();

        let order_id = $('').attr('data-id');

        let obj = {
            url     : `{{ route('admin.ecom_orders.update','')}}/${order_id}`, 
            method  : "PUT",
            data    : formatData(),
        };
        ajaxRequest(obj, { reload: true, timer: 2000 })
    }

    function formatData(){
        return {
        order_no            : $('#order_no').val(),
        order_date          : $('#order_date').val(),
        customer_id         : $('#customer').val(),
        order_note          : $('#note').val(),
        shipping_address    : $('#shipping_address').val(),
        products            : productsInfo()
        }
    }

    function productsInfo(){

        let rows        = $('#addorder-body').find('tr');
        let total_qty   = 0;
        let grandtotal  = 0;
        let productsArr =[];

        [...rows].forEach( row => {
        let  order_no       = $('#order_no').val().trim();
        let product_id      = $(row).find('.product').val();
        let product_name    = $(row).find('.product').find('option:selected').text();
        let product_color   = $(row).find('.color').val();
        let product_size    = $(row).find('.size').val();
        let product_qty     = Number($(row).find('.order_qty').val() ?? 0);
        let product_price   = Number($(row).find('.product_price').val() ?? 0);
        let subtotal        = Number($(row).find('.total_price').val() ?? 0);

        productsArr.push({
            order_no,
            product_id,
            product_name,
            product_color,
            product_size,
            product_qty,
            product_price,
            subtotal
        });
       });

        return productsArr;
    }

</script>
@endpush

