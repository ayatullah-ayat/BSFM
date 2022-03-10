@extends('backend.layouts.master')

@section('title', 'Add Product')

@section('content')
<div class="card p-4 shadow">
    <h4 class="text-dark f-2x font-weight-bold text-dark">Add Product Information</h4>
    <form action="{{ route('admin.products.store') }}" method="POST" id="productForm">
        @csrf 
        <div class="row">
        
            <div class="col-md-6" data-col="col">
                <div class="form-group">
                    <label for="category"> Category<span style="color: red;" class="req">*</span></label>
                    <select name="category_id" class="category" data-required id="category"
                        data-placeholder="Select Category"></select>
                </div>
                <span class="v-msg"></span>
            </div>
        
            <div class="col-md-6" data-col="col">
                <div class="form-group">
                    <label for="subcategory">Sub Category</label>
                    <select name="subcategory_id" class="subcategory" data-required id="subcategory"
                        data-placeholder="Select Sub Category"></select>
                </div>
                <span class="v-msg"></span>
            </div>
        
            <div class="col-md-12">
                <div class="form-group">
                    <label for="">Product Name<span style="color: red;" class="req">*</span></label>
                    <input name="product_name" type="text" class="form-control" placeholder="Product Name">
                </div>
            </div>
        
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Product SKU<span style="color: red;" class="req">*</span></label>
                    <input name="product_sku" type="text" class="form-control" placeholder="Product SKU">
                </div>
            </div>
        
            <div class="col-md-6" data-col="col">
                <div class="form-group">
                    <label for="color"> Color</label>
                    <select name="color" class="color" data-required id="color" data-placeholder="Select Color"></select>
                </div>
                <span class="v-msg"></span>
            </div>
        
            <div class="col-md-6" data-col="col">
                <div class="form-group">
                    <label for="size">Size</label>
                    <select name="size" class="size" data-required id="size" data-placeholder="Select Size"></select>
                </div>
                <span class="v-msg"></span>
            </div>
        
            <div class="col-md-6" data-col="col">
                <div class="form-group">
                    <label for="brand"> Brand</label>
                    <select name="brand" class="brand" data-required id="brand" data-placeholder="Select brand"></select>
                </div>
                <span class="v-msg"></span>
            </div>
        
            <div class="col-md-6" data-col="col">
                <div class="form-group">
                    <label for="currency">Currency</label>
                    <select name="currency" class="currency" data-required id="currency"
                        data-placeholder="Select currency"></select>
                </div>
                <span class="v-msg"></span>
            </div>
        
            <div class="col-md-6">
                <div class="form-group">
                    <label for="price">Unit Price</label>
                    <input name="unit_price" type="number" class="form-control" placeholder="Product Price">
                </div>
            </div>
        
            <div class="col-md-6">
                <div class="form-group">
                    <label for="wholesale_price">Wholesale Price</label>
                    <input name="wholesale_price" type="number" class="form-control" placeholder="Product Wholesale Price">
                </div>
            </div>
        
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Product Qty</label>
                    <input name="stock" type="number" class="form-control" placeholder="Product Qty">
                </div>
            </div>
        
            <div class="col-md-6">
                <div class="form-group">
                    <label for="discount">Discount(%)</label>
                    <input name="discount" type="number" class="form-control" placeholder="Discount">
                </div>
            </div>
        
            <div class="col-md-6" data-col="col">
                <div class="form-group">
                    <label for="unit">Uom (Unit)</label>
                    <select name="product_unit" class="unit" data-required id="unit" data-placeholder="Select Unit"></select>
                </div>
                <span class="v-msg"></span>
            </div>
        
        
            <div class="col-md-12" data-col="col">
                <div class="form-group">
                    <label for="tags">Tags</label>
                    <select name="tags" class="tags" multiple data-required id="tags" data-placeholder="Select Tags"></select>
                </div>
                <span class="v-msg"></span>
            </div>
        
            <div class="col-md-12">
                <div class="form-group">
                    <label for="default_image">Thumbnail Image</label><br>
                    <input name="default_image" type="file" id="default_image">
                </div>
            </div>
        
            <div class="col-md-12">
                <div class="form-group">
                    <label for="product_gallery">Gallery Image</label><br>
                    <input name="product_gallery" type="file" multiple id="product_gallery">
                </div>
            </div>
        
            <div class="col-md-12">
                <div class="form-group">
                    <label for="description">Product Description</label>
                    <textarea name="description" id="description" cols="" rows="5" class="form-control"
                        placeholder="Product Description"></textarea>
                </div>
            </div>
        
            <div class="col-md-12">
                <div class="form-group">
                    <label for="specification">Product Specification</label>
                    <textarea name="specification" id="specification" cols="" rows="5" class="form-control"
                        placeholder="Product Specification"></textarea>
                </div>
            </div>
        
            <div class="col-md-12 d-flex">
                <div class="form-group mr-4">
                    <input type="checkbox" name="is_best_sale" id="is_best_sale">
                    <label for="is_best_sale"> Best Sale </label>
                </div>
        
                <div class="form-group">
                    <input type="checkbox" checked name="allow_review" id="allow_review">
                    <label for="allow_review"> Allow Review </label>
                </div>
        
                <div class="form-group mx-4">
                    <input type="checkbox" checked name="is_active" id="is_active">
                    <label for="is_active"> Is Active </label>
                </div>
        
                <div class="form-group">
                    <input type="checkbox" checked name="is_publish" id="is_publish">
                    <label for="is_publish"> Is Publish </label>
                </div>
        
            </div>
        
            <div class="col-md-12">
                <div class="w-100">
                    <button type="button" id="reset" class="btn btn-sm btn-secondary"><i class="fa fa-sync"></i> Reset</button>
                    <button type="submit" class="save_btn btn btn-sm btn-success float-right"><i class="fa fa-save"></i> <span>Submit</span></button>
                    <button type="button" class="btn btn-sm btn-danger float-right mx-1" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        
        </div>
    </form>
</div>
@endsection

@push('css')
    <link href="{{ asset('assets/backend/css/currency/currency.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/backend/libs/summernote/summernote.css')}}" rel="stylesheet">
@endpush

@push('js')
    <script src="{{ asset('assets/backend/libs/summernote/summernote.js') }}"></script>
    <script>

    let uploadedFiles = [];
    $(document).ready(function(){
        init();

        $(document).on('click','#add', createModal)
        $(document).on('submit','#productForm', submitToDatabase)
    });


    function init(){

        let arr=[
            {
                selector        : `#subcategory`,
                type            : 'select',
            },
            {
                selector        : `#color`,
                type            : 'select'
            },
            {
                selector        : `#size`,
                type            : 'select',
            },
            {
                selector        : `#tags`,
                type            : 'select'
            },
            {
                selector        : `.category`,
                type            : 'select',
            },
            {
                selector        : `.brand`,
                type            : 'select'
            },
            {
                selector        : `.currency`,
                type            : 'select'
            },
            {
                selector        : `.unit`,
                type            : 'select'
            },
        ];

        globeInit(arr);

        $('#description').summernote()
        $('#specification').summernote({
            callbacks: {
                onChange: function(contents, $editable) {
                    console.log('onChange:', contents, $editable);
                },
                onImageUpload: function(files) {
                // upload image to server and create imgNode...
                    // console.log(files);
                    uploadedFiles = [];
                    uploadedFiles.push(files);
                    // $('#specification').summernote('insertNode', imgNode);
                }
            }
        });

    }


    function createModal(){
        showModal('#categoryModal');
    }

    function submitToDatabase(e){

        //
        // e.preventDefault();

        console.log(uploadedFiles);

        // return false;

        // ajaxFormToken();

        // let obj = {
        //     url     : ``, 
        //     method  : "POST",
        //     data    : {},
        // };

        // ajaxRequest(obj);

        // hideModal('#categoryModal');
    }

</script>
@endpush