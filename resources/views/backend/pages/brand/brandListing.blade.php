@extends('backend.layouts.master')

@section('title', 'Brand pages')

@section('content')
<div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">

        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary"><a href="/" class="text-decoration-none">Brand</a> </h6>
            <button class="btn btn-sm btn-info" id="add"><i class="fa fa-plus"> Brand</i></button>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#SL</th>
                            <th>Brand Name</th>
                            <th>Brand Description</th>
                            <th>Brand Image</th>
                            <th>Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>  
                        
                        @isset($brands)
                            @foreach ($brands as $brand)
                                <tr>
                                    <th>{{ $loop->iteration }}</th>
                                    <th>{{ $brand->brand_name }}</th>
                                    <th>{{ $brand->brand_description }}</th>
                                    <th>
                                        @if($brand->brand_image)
                                            <img src="{{ asset($brand->brand_image) }}" alt="Category Image">
                                        @else 
                                            <img src="" alt="Category Image">
                                        @endif
                                    </th>
                                    <th class="text-center">
                                        {!! $brand->is_active ? '<span class="badge badge-success">Active </span>' : '<span class="badge badge-danger">In-Active </span>' !!}
                                    </th>
                                    <th class="text-center">
                                        {{-- <a href="" class="fa fa-eye text-info text-decoration-none"></a> --}}
                                        <a href="javascript:void(0)" class="fa fa-edit mx-2 text-warning text-decoration-none brandUpdate"></a>
                                        <a href="{{ route('admin.brand.destroy',$brand->id) }}" class="fa fa-trash text-danger text-decoration-none delete"></a>
                                    </th>
                                </tr>
                            @endforeach
                        @endisset
                        
                    </tbody>

                </table>
            </div>
        </div>
    </div>

</div>

<div class="modal fade" id="brandModal"  tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" role="dialog" data-backdrop="static" data-keyboard="false" aria-modal="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title font-weight-bold modal-heading" id="exampleModalLabel">Create Brand</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div id="service-container">
                    <div class="row">
                        <div class="col-md-12">
                            <h5 class="font-weight-bold bg-custom-booking">Brand Information</h5>
                            <hr>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Brand Name <span style="color: red;" class="req">*</span> </label>
                                <input type="text" class="form-control " id="brand_name">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                               <label for="">Brand Description</label>
                               <input type="text" class="form-control " id="brand_description">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Brand Image</label>
                                <input class="d-flex align-items-center " accept="image/*" type="file" name="" id="brand_image">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Is Active</label><br>
                                <input type="radio" name="is_active" id="isActive" checked>
                                <label for="isActive">Active</label>
                                <input type="radio" name="is_active" id="isInActive">
                                <label for="isInActive">Inactive</label>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <div class="w-100">
                    <button type="button" id="reset" class="btn btn-sm btn-secondary"><i class="fa fa-sync"></i> Reset</button>
                    <button id="brand_save_btn" type="button" class="save_btn btn btn-sm btn-success float-right"><i class="fa fa-save"></i> <span>Save</span></button>
                    <button type="button" class="btn btn-sm btn-danger float-right mx-1" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="updateBrandModal"  tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" role="dialog" data-backdrop="static" data-keyboard="false" aria-modal="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title font-weight-bold modal-heading" id="exampleModalLabel">Create Brand</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div id="service-container">
                    <div class="row">
                        <div class="col-md-12">
                            <h5 class="font-weight-bold bg-custom-booking">Brand Information</h5>
                            <hr>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Brand Name <span style="color: red;" class="req">*</span> </label>
                                <input type="text" class="form-control " id="brand_name">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                               <label for="">Brand Description</label>
                               <input type="text" class="form-control " id="brand_description">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Brand Image</label>
                                <input class="d-flex align-items-center " accept="image/*" type="file" name="" id="brand_image">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Is Active</label><br>
                                <input type="radio" name="is_active" id="isActive" checked>
                                <label for="isActive">Active</label>
                                <input type="radio" name="is_active" id="isInActive">
                                <label for="isInActive">Inactive</label>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <div class="w-100">
                    <button type="button" id="reset" class="btn btn-sm btn-secondary"><i class="fa fa-sync"></i> Reset</button>
                    <button id="brand_update_btn" type="button" class="save_btn btn btn-sm btn-success float-right"><i class="fa fa-save"></i> <span>Update</span></button>
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
            $(document).on('click' , '#add', createModal)
            $(document).on('click' , '.brandUpdate', showUpdateModal)
            $(document).on('click' , '#brand_save_btn', submitToDatabase)
            $(document).on('click' , '#reset', resetForm)
            $(document).on('click' , '.delete', deleteToDatabase)
            $(document).on('click' , '#brand_update_btn', UpdateToDatabase)
        });

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

                        // console.log(res?.data);
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

        function showUpdateModal(){
            showModal('#updateBrandModal');
        }

        function init(){

            let arr=[
                {
                    dropdownParent  : '#categoryModal',
                    selector        : `#stuff`,
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
            showModal('#brandModal');
        }

        function submitToDatabase(){
            //

            ajaxFormToken();

            let obj = {
                url     : `{{route('admin.brand.store')}}`, 
                method  : "POST",
                data    : formData(),
            };

            ajaxRequest(obj, { reload: true, timer: 2000 })
            resetData()
            // hideModal('#categoryModal');
        }

        function UpdateToDatabase(){
            //

            ajaxFormToken();

            let obj = {
                url     : `{{route('admin.brand.update', $brand->id)}}`, 
                method  : "PUT",
                data    : formData(),
            };

            ajaxRequest(obj, { reload: true, timer: 2000 })
            resetData()
            // hideModal('#categoryModal');
        }

        function formData(){
            return {
                brand_name          : $('#brand_name').val().trim(),
                brand_description   : $('#brand_description').val().trim(),
                brand_image         : $('#brand_image').val(),
                is_active           : $('#isActive').is(':checked') ? 1 : 0,
            };
        }

        function resetData(){
            $('#brand_name').val(null)
            $('#brand_description').val(null)
            $('#brand_image').val(null)
            $('#isActive').prop('checked', true)
        }

        function resetForm(){
            resetData();
        }

    </script>
@endpush