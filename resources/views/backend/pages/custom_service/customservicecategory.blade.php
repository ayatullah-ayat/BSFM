@extends('backend.layouts.master')

@section('title','Service Category')

@section('content')
    <div>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">

            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary"><a href="/" class="text-decoration-none">Service Categories</a> </h6>
                <button class="btn btn-sm btn-info" id="add"><i class="fa fa-plus"> Category</i></button>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Category Name</th>
                                <th>Category Description</th>
                                <th>Category Image</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @isset($CustomServiceCategories)
                                @foreach ($CustomServiceCategories as $CustomServiceCategory)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$CustomServiceCategory->category_name  }}</td>
                                        <td>{{$CustomServiceCategory->category_description }}</td>
                                        <td>
                                            @if( $CustomServiceCategory->category_thumbnail )
                                                <img src="{{ asset( $CustomServiceCategory->category_thumbnail ) }}" style="width: 80px;" alt="Category Image">
                                            @else 
                                                <img src="" style="width: 80px;" alt="Category Image">
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            {!! $CustomServiceCategory->is_active ? '<span class="badge badge-success">Active </span>' : '<span class="badge badge-danger">In-Active </span>' !!}
                                        </td>

                                        <td class="text-center">
                                            {{-- <a href="" class="fa fa-eye text-info text-decoration-none"></a> --}}
                                            <a href="javascript:void(0)" class="fa fa-edit mx-2 text-warning text-decoration-none"></a>
                                            <a href="{{ route('admin.customservicecategory.destroy', $CustomServiceCategory->id )}}" class="fa fa-trash text-danger text-decoration-none delete"></a>
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

    <div class="modal fade" id="categoryModal"  tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" role="dialog" data-backdrop="static" data-keyboard="false" aria-modal="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
    
                <div class="modal-header">
                    <h5 class="modal-title font-weight-bold modal-heading" id="exampleModalLabel">Create Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
    
                <div class="modal-body">
                    <div id="service-container">
                        <div class="row">
                            <div class="col-md-12">
                                <h5 class="font-weight-bold bg-custom-booking">Category Information</h5>
                                <hr>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="categoryName">Service Category Name<span style="color: red;" class="req">*</span></label>
                                    <input type="text" class="form-control" id="categoryName">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                   <label for="categoryDescription">Category Description</label>
                                    <textarea class="form-control" name="categoryDescription" id="categoryDescription" cols="30" rows="5"></textarea>
                                </div>
                            </div>

                            <div class="col-md-12 mb-2">
                                <label for="">Category Image</label>
                                {!! renderFileInput(['id' => 'categoryImage', 'imageSrc' => '']) !!}
                                <span class="v-msg"></span>
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
                        <button id="service_category_save_btn" type="button" class="save_btn btn btn-sm btn-success float-right"><i class="fa fa-save"></i> <span>Save</span></button>
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
            $(document).on('click','#add', createModal)

            $(document).on('click' , '.delete', deleteToDatabase)

            $(document).on('click' , '#service_category_save_btn', submitToDatabase)
            $(document).on('click', '#reset', resetForm)
            $(document).on('change' , '#categoryImage', checkImage)
        });

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
            showModal('#categoryModal');
        }

        function resetForm(){
            resetData()
        }

        function submitToDatabase(){

            ajaxFormToken();

            let obj = {
                url     : `{{ route('admin.customservicecategory.store')}}`, 
                method  : "POST",
                data    : formatData(),
            };

            ajaxRequest(obj, { reload: true, timer: 2000 })

            resetData();

            hideModal('#categoryModal');
        }

        function formatData(){
            return {
                category_name       : $('#categoryName').val().trim(),
                category_description: $('#categoryDescription').val().trim(),
                category_thumbnail  : fileToUpload('#img-preview'),
                is_active           : $('#isActive').is(':checked') ? 1 : 0,
            };
        }

        function resetData(){
            $('#categoryName').val(null)
            $('#categoryDescription').val(null)
            $('#categoryImage').val(null)
            fileToUpload('#img-preview', '');
            $('#isActive').prop('checked', true)
        }

    </script>
@endpush