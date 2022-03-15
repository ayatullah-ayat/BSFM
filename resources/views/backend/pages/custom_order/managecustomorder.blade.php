@extends('backend.layouts.master')

@section('title', 'Manage Order')

@section('content')
<div>
    <div>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">

            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary"><a href="/" class="text-decoration-none">Manage Custom Order</a> </h6>
                <button class="btn btn-sm btn-info"><a class="text-white" id="add"><i class="fa fa-plus"> Custom Order</i></a></button>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Customer Name</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Custom Logo</th>
                                <th>Status</th>
                                <th width="70" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @isset($customserviceorders)
                                @foreach ($customserviceorders as $customserviceorder)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $customserviceorder->customer_name ?? 'N/A' }}</td>
                                        <td>{{ $customserviceorder->customer->customer_phone ?? 'N/A' }}</td>
                                        <td>{{ $customserviceorder->customer_address ?? 'N/A' }}</td>
                                        <td>
                                            @if( $customserviceorder->order_attachment )
                                                <a style="text-decoration: none;" href="{{ asset($customserviceorder->order_attachment) }}" download>
                                                    <img src="{{ asset($customserviceorder->order_attachment) }}" style="width: 80px;" alt="Attachment File">
                                                </a>
                                            @else 
                                                <img src="{{ asset('assets/img/blank-img.png') }}" alt="Attachment File">
                                            @endif
                                        </td>
                                    
                                        <td class="text-center">
                                            {!! $customserviceorder->status ? '<span class="badge badge-danger">Pending </span>' : '<span class="badge badge-success">Confirmed </span>' !!}
                                        </td>
                                        <td class="text-center">
                                            <a href="javascript:void(0)" class="fa fa-eye text-info text-decoration-none"></a>
                                            <a href="javascript:void(0)" class="fa fa-edit mx-2 text-warning text-decoration-none"></a>
                                            <a href="{{ route('admin.customserviceorder.destroy',$customserviceorder->id )}}" class="fa fa-trash text-danger text-decoration-none delete"></a>
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
</div>


<div class="modal fade" id="customServiceOrderModal"  tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" role="dialog" data-backdrop="static" data-keyboard="false" aria-modal="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title font-weight-bold modal-heading" id="exampleModalLabel"> <span class="heading">Create</span> Custom Order</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div id="service-container">
                    <div class="row">
                        <div class="col-md-12">
                            <h5 class="font-weight-bold bg-custom-booking">Order Information</h5>
                            <hr>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="category_id">Select Category</label>
                                <select name="category_id" id="category_id" class="form-control" data-placeholder="Select a Category">
                                    @isset($customservicecategories)
                                        @foreach ($customservicecategories as $customservicecategory)
                                            <option value="{{ $customservicecategory->id }}">{{ $customservicecategory->category_name  }}</option>
                                        @endforeach        
                                    @endisset
                                </select>
                            </div>
                        </div>

                        {{-- <div class="col-md-6">
                            <div class="form-group">
                                <label for="product_id">Select Category</label>
                                <select name="product_id" id="product_id" class="form-control" data-placeholder="Select a Category">
                                    @isset($customserviceproducts)
                                        @foreach ($customserviceproducts as $customserviceproduct)
                                            <option value="{{ $customserviceproduct->id }}">{{ $customserviceproduct->product_name  }}</option>
                                        @endforeach        
                                    @endisset
                                </select>
                            </div>
                        </div> --}}

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="product_id">Select Product</label>
                                <select name="product_id" id="product_id" class="form-control" data-placeholder="Select a Product"></select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="customer_name">Customer Name <span style="color: red;" class="req">*</span></label>
                                <input type="text" class="form-control" id="customer_name" placeholder="Customer Name">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="customer_phone">Customer Phone</label>
                                <input name="customer_phone" id="customer_phone" class="form-control" placeholder="Customer Phone"/>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="customer_address">Customer Address</label>
                                <textarea name="customer_address" id="customer_address" cols="0" rows="5" class="form-control" placeholder="Customer Address"></textarea>
                            </div>
                        </div>

                        {{-- <div class="col-md-12">
                            <div class="form-group">
                                <label for="product_thumbnail">Product Thumbnail</label> <br>
                                 <input type="file" name="" id="product_thumbnail" name="product_thumbnail">
                            </div>
                        </div> --}}

                        <div class="col-md-12 mb-2">
                            <label for="">Attachment File</label>
                            {!! renderFileInput(['id' => 'attachment_file', 'imageSrc' => '']) !!}
                            <span class="v-msg"></span>
                        </div>

                        {{-- <div class="col-md-12">
                            <div class="form-group">
                                <label>Is Active</label><br>
                                <input type="radio" name="is_active" id="isActive" checked>
                                <label for="isActive">Active</label>
                                <input type="radio" name="is_active" id="isInActive">
                                <label for="isInActive">Inactive</label>
                            </div>
                        </div> --}}

                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <div class="w-100">
                    <button type="button" id="reset" class="btn btn-sm btn-secondary"><i class="fa fa-sync"></i> Reset</button>
                    <button id="customproduct_save_btn" type="button" class="save_btn btn btn-sm btn-success float-right"><i class="fa fa-save"></i> <span>Save</span></button>
                    <button id="customproduct_update_btn" type="button" class="save_btn btn btn-sm btn-success float-right d-none"><i class="fa fa-save"></i> <span>Update</span></button>
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
    <link rel="stylesheet" href="{{ asset('assets/backend/css/product/product.css') }}">
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
            $(document).on('change','#category_id', loadProductByCategory)
            $(document).on('click','#customproduct_save_btn', submitToDatabase)

            $(document).on('click', '.delete', deleteToDatabase)
            $(document).on('click' , '#reset', resetForm)
            $(document).on('change' ,'#attachment_file', checkImage)

            $(document).on('click', '.update', showUpdateModal)
            $(document).on('click','#customproduct_update_btn', updateToDatabase)
        });

        function loadProductByCategory(){
            let product_id = $(this).val();

            $.ajax({
                url     : `{{ route('admin.customserviceorder.getProduct','')}}/${product_id}`,
                method  : 'GET',
                beforeSend(){
                    console.log('sending ...');
                },
                success(data){

                    let options = ``;

                    if(data.length){
                        data.forEach(item => {
                            options += `<option value="${item.id}">${item.text}</option>`;
                        });
                    }

                    $(document).find('#product_id').html(options);
                },
                error(err){
                    console.log(err);
                },
            })
        }

        // call the func on change file input 
        function checkImage() {
            fileRead(this, '#img-preview');
        }

        function deleteToDatabase(e){
            e.preventDefault();

            let elem = $(this),
            href = elem.attr('href');
            if(confirm("Are you sure to delete the record?")){
                ajaxFormToken();

                $.ajax({
                    url     : href, 
                    method  : "DELETE",
                    data    : {},
                    success(res){

                        console.log(res);
                        if(res?.success){
                            _toastMsg(res?.msg ?? 'Success!', 'success');
                            resetData();

                            setTimeout(() => {
                                location.reload();
                            }, 2000);
                        }
                    },
                    error(err){
                        console.log(err);
                        _toastMsg((err.responseJSON?.msg) ?? 'Something wents wrong!')
                    },
                });
            }
        }

        function init(){

            let arr=[
                {
                    dropdownParent  : '#customServiceOrderModal',
                    selector        : `#category_id`,
                    type            : 'select',
                },
                {
                    dropdownParent  : '#customServiceOrderModal',
                    selector        : `#product_id`,
                    type            : 'select',
                },
                {
                    selector        : `#booking_date`,
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

        function createModal(){
            showModal('#customServiceOrderModal');
            $('#customproduct_save_btn').removeClass('d-none');
            $('#customproduct_update_btn').addClass('d-none');
            $('#customServiceOrderModal .heading').text('Create')
            resetData();
        }

        function resetForm(){
            resetData()
        }

        function showUpdateModal(){
            resetData();
            let customproduct = $(this).closest('tr').attr('customproduct-data');
            if(customproduct){

                $('#customproduct_save_btn').addClass('d-none');
                $('#customproduct_update_btn').removeClass('d-none');

                customproduct = JSON.parse(customproduct);

                $('#customProductModal .heading').text('Edit').attr('data-id', customproduct?.id)

                $('#product_name').val(customproduct?.product_name)
                $('#product_description').val(customproduct?.product_description)
                $('#service_id').val(customproduct?.service_id).trigger('change')

                setTimeout(() => {
                 $('#category_id').val(customproduct?.category_id).trigger('change')
                }, 1000);

                if(customproduct?.is_active){
                    $('#isActive').prop('checked',true)
                    }else{
                    $('#isInActive').prop('checked',true)
                }
                // show previos image on modal
                $(document).find('#img-preview').attr('src', `{{ asset('') }}${customproduct.product_thumbnail}`);

                showModal('#customProductModal');
            }
        }

        function updateToDatabase(){
            ajaxFormToken();

            let id  = $('#customProductModal .heading').attr('data-id');
            let obj = {
                url     : `{{ route('admin.customserviceproduct.update', '' ) }}/${id}`, 
                method  : "PUT",
                data    : formatData(),
            };

            ajaxRequest(obj, { reload: true, timer: 2000 })

            resetData();

            hideModal('#customProductModal');
        }

        function submitToDatabase(){
            //
            
            ajaxFormToken();

            let obj = {
                url     : `{{ route('admin.customserviceorder.store') }}`, 
                method  : "POST",
                data    : formatData(),
            };

            ajaxRequest(obj, { reload: true, timer: 2000 })

            resetData()

            hideModal('#customServiceOrderModal');
        }

        function formatData(){
            return {
                category_id                 : $('#category_id').val(),
                product_id                  : $('#product_id').val(),
                customer_name               : $('#customer_name').val(),
                customer_phone              : $('#customer_phone').val(),
                customer_address            : $('#customer_address').val().trim(),
                _token                      : `{{ csrf_token()}}`,
                custom_service_product_id   : $('#product_id').val(),
                custom_service_product_name : $('#product_name').val(),
                order_attachment            : fileToUpload('#img-preview'),
            }
        }

        function resetData(){

            $('#category_id').val(null),
            $('#product_id').val(null),
            $('#customer_name').val(null),
            $('#customer_phone').val(null),
            $('#customer_address').val(null),
            $('#product_id').val(null),
            $('#product_name').val(null),
            $('#order_attachment').val(null),
            fileToUpload('#img-preview')
        }

    </script>
@endpush