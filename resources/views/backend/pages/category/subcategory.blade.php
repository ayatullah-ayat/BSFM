@extends('backend.layouts.master')

@section('title','Category pages')

@section('content')
    <div>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">

            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary"><a href="/" class="text-decoration-none">Sub Categories</a> </h6>
                <button class="btn btn-sm btn-info" id="add"><i class="fa fa-plus"> Sub Category</i></button>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#SL</th>
                                <th>Parent Category</th>
                                <th>Sub Category Name</th>
                                <th>Sub Category Description</th>
                                <th>Sub-Category Image</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @isset($subcategories)
                                @foreach ($subcategories as $subcategory)
                                    <tr>
                                        <th>{{$loop->iteration}}</th>
                                        <th>{{$subcategory->category_id ?? 'N/A'}}</th>
                                        <th>{{$subcategory->subcategory_name ?? 'N/A'}}</th>
                                        <th>{{$subcategory->subcategory_description ?? 'N/A'}}</th>
                                        <th>
                                            @if($subcategory->subcategory_image)
                                                <img src="{{ asset($subcategory->subcategory) }}" alt="SubCategory Image">
                                            @else 
                                                <img src="" alt="SubCategory Image">
                                            @endif
                                        </th>
                                        <th class="text-center">
                                            {!! $subcategory->is_active ? '<span class="badge badge-success">Active </span>' : '<span class="badge badge-danger">In-Active </span>' !!}
                                        </th>
                                        <th class="text-center">
                                            <a href="javescript:void(0)" class="fa fa-eye text-info text-decoration-none details"></a>
                                            <a href="" class="fa fa-edit mx-2 text-warning text-decoration-none"></a>
                                            <a href="{{ route('admin.subcategory.destroy',$subcategory->id) }}" class="fa fa-trash text-danger text-decoration-none delete"></a>
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

    <div class="modal fade" id="subcategoryModal"  tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" role="dialog" data-backdrop="static" data-keyboard="false" aria-modal="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
    
                <div class="modal-header">
                    <h5 class="modal-title font-weight-bold modal-heading" id="exampleModalLabel">Create Sub-Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
    
                <div class="modal-body">
                    <div id="service-container">
                        <div class="row">
                            <div class="col-md-12">
                                <h5 class="font-weight-bold bg-custom-booking">Sub-Category Information</h5>
                                <hr>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Sub Category Name<span style="color: red;" class="req">*</span></label>
                                    <input type="text" class="form-control" id="sub_category_name">
                                </div>
                            </div>

                            <div class="col-md-6" data-col="col">
                                <div class="form-group">
                                    <label for="parent_category">Parent Category</label>
                                    <select name="parent_category" class="parent_category" data-required id="parent_category" data-placeholder="Parent Category"></select>
                                </div>
                                <span class="v-msg"></span>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                   <label for="">Category Description</label>
                                   {{-- <textarea rows="4" type="text" class="form-control"> --}}
                                    <textarea class="form-control" name="" id="sub_category_description" cols="30" rows="5"></textarea>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Category Image</label>
                                    <input class="d-flex align-items-center" type="file" name="" id="sub_category_images">
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
                        <button type="button" id="resets" class="btn btn-sm btn-secondary"><i class="fa fa-sync"></i> Reset</button>
                        <button id="subcategory_save_btn" type="button" class="save_btn btn btn-sm btn-success float-right"><i class="fa fa-save"></i> <span>Save</span></button>
                        <button type="button" class="btn btn-sm btn-danger float-right mx-1" data-dismiss="modal">Close</button>
                    </div>
                </div>
    
            </div>
        </div>
    </div>

    <div class="modal fade" id="subcategoryDetailModal"  tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true" role="dialog" data-backdrop="static" data-keyboard="false" aria-modal="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
    
                <div class="modal-header">
                    <h5 class="modal-title font-weight-bold modal-heading" id="exampleModalLabel2">Sub Category Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
    
                <div class="modal-body" id="modalDetails"></div>
    
                <div class="modal-footer">
                    <div class="w-100">
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
            $(document).on('click','#subcategory_save_btn', submitToDatabase)
            $(document).on('click', '#resets', resetForm)
            $(document).on('click','.delete', deleteToDatabase)
            $(document).on('click','.details', showDataToModal)
        });

        function showDataToModal(){
            let 
            elem            = $(this),
            tr              = elem.closest('tr'),
            subcategory     = tr?.attr('data-category') ? JSON.parse(tr.attr('data-category')) : null,
            modalDetailElem = $('#modalDetails');

            if(subcategory){
                let html = `
                <table class="table table-sm table-bordered table-striped">
                    <tr>
                        <th>Category Name</th>
                        <td>${subcategory.subcategory_name ?? 'N/A'}</td>
                    </tr>
                    <tr>
                        <th>Parent Category</th>
                        <td>${subcategory.category_id ?? 'N/A'}</td>
                    </tr>
                    <tr>
                        <th>Category Image</th>
                        <td>
                            ${subcategory.category_image ? `
                                <img src="{{ asset('') }}/${subcategory.subcategory_image}" alt="Category Image">
                            `: ` <img src="" alt="Category Image">`}
                        </td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>${subcategory.is_active ? '<span class="badge badge-success">Active </span>' : '<span class="badge badge-danger">In-Active </span>'}</td>
                    </tr>
                </table>
                `;

                modalDetailElem.html(html);
            }

            $('#subcategoryDetailModal').modal('show')
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
                    selector        : `.parent_category`,
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
            showModal('#subcategoryModal');
        }

        function resetForm(){
            resetData();
        }

        function submitToDatabase(){
            //

            ajaxFormToken();

            let obj = {
                url     : `{{ route('admin.subcategory.store') }}`, 
                method  : "POST",
                data    : formatData(),
            };

            ajaxRequest(obj, { reload: true, timer: 2000 });

            resetData();

            // hideModal('#categoryModal');
        }

        function formatData(){
            return {
                subcategory_name        : $('#sub_category_name').val().trim(),
                subcategory_description : $('#sub_category_description').val().trim(),
                subcategory_image       : $('#sub_category_images').val(),
                is_active               : $('#isActive').is(':checked') ? 1 : 0,
            };
        }

        function resetData(){
            $('#sub_category_name').val(null)
            $('#sub_category_description').val(null)
            $('#sub_category_images').val(null)
            $('#isActive').prop('checked', true)
        }

    </script>
@endpush
