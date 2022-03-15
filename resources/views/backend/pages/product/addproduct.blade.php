@extends('backend.layouts.master')

@section('title', 'Add Product')

@section('content')
<div class="card p-4 shadow">
    <h4 class="text-dark f-2x font-weight-bold text-dark">Add Product Information</h4>
    <form action="{{ route('admin.products.store') }}" method="POST" id="productForm" enctype="multipart/form-data">
        {{-- @csrf  --}}
        <div class="row">
        
            <div class="col-md-6" data-col="col">
                <div class="form-group">
                    <label for="category"> Category<span style="color: red;" class="req">*</span></label>
                    <select name="category_id" class="category" data-required id="category" data-placeholder="Select Category">
                        @if($categories)
                            @foreach ($categories as $item)
                                <option value="{{ $item->id }}">{{ $item->category_name }}</option>
                            @endforeach
                        @endif
                    </select>
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
        
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Product Name<span style="color: red;" class="req">*</span></label>
                    <input name="product_name" id="product_name" type="text" class="form-control" placeholder="Product Name">
                </div>
            </div>
        
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Product SKU<span style="color: red;" class="req">*</span></label> 
                    <span class="float-right">
                        <label for="manageVariant" type="button">Manage Variant wise Price & Qty</label>
                        <input type="checkbox" name="manageVariant" id="manageVariant">
                    </span>
                    <input name="product_sku" id="product_sku" type="text" class="form-control" placeholder="Product SKU">
                </div>
            </div>
        {{-- ----------------------------------------------------------------------------------------- --}}
            <div class="row p-0 mx-0 w-100" id="defaultPrice" data-product-variant="">
                <div class="col-md-6" data-col="col">
                    <div class="form-group">
                        <label for="color"> Color</label>
                        <select name="color_ids" class="color" data-required id="color" data-placeholder="Select Color">
                            @if($colors)
                                @foreach ($colors as $item)
                                    <option value="{{ $item->id }}">{{ $item->variant_name }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <span class="v-msg"></span>
                </div>
                
                <div class="col-md-6" data-col="col">
                    <div class="form-group">
                        <label for="size">Size</label>
                        <select name="size_ids" class="size" multiple data-required id="size" data-placeholder="Select Size">
                            @if($sizes)
                                @foreach ($sizes as $item)
                                    <option value="{{ $item->id }}">{{ $item->variant_name }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <span class="v-msg"></span>
                </div>
                
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="price">Unit Price</label>
                        <input name="unit_price" id="unit_price" type="number" class="form-control" placeholder="Product Price">
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="wholesale_price">Wholesale Price</label>
                        <input name="wholesale_price" id="wholesale_price" type="number" class="form-control" placeholder="Product Wholesale Price">
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Product Qty</label>
                        <input name="product_qty" id="product_qty" type="number" class="form-control" placeholder="Product Qty">
                    </div>
                </div>
            </div>

        {{-- -----------------------------------------------------------------------------------------------  --}}
        
            <div class="col-md-6" data-col="col">
                <div class="form-group">
                    <label for="brand"> Brand</label>
                    <select name="brand" class="brand" data-required id="brand" data-placeholder="Select brand">
                         @if($brands)
                            @foreach ($brands as $item)
                                <option value="{{ $item->id }}">{{ $item->brand_name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <span class="v-msg"></span>
            </div>
        
            <div class="col-md-6" data-col="col">
                <div class="form-group">
                    <label for="currency">Currency</label>
                    <select name="currency" class="currency" data-required id="currency" data-placeholder="Select currency">
                        @if($currencies)
                            @foreach ($currencies as $item)
                                <option value="{{ $item->id }}">{{ $item->currency_name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <span class="v-msg"></span>
            </div>
        
            <div class="col-md-6">
                <div class="form-group">
                    <label for="discount">Discount(%)</label>
                    <input name="discount" id="discount" type="number" class="form-control" placeholder="Discount">
                </div>
            </div>
        
            <div class="col-md-6" data-col="col">
                <div class="form-group">
                    <label for="unit">Uom (Unit)</label>
                    <select name="product_unit" class="unit" data-required id="unit" data-placeholder="Select Unit">
                        @if($units)
                            @foreach ($units as $item)
                                <option value="{{ $item->id }}">{{ $item->unit_name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <span class="v-msg"></span>
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
                <div class="form-group">
                    <label for="default_image">Thumbnail Image</label><br>
                    <input name="product_thumbnail_image" type="file" id="default_image">
                </div>
            </div>
            
            <div class="col-md-12">
                <div class="form-group">
                    <label for="product_gallery">Gallery Image</label><br>
                    <input name="product_gallery" type="file" multiple id="product_gallery">
                </div>
            </div>
        
            <div class="col-md-12" data-col="col">
                <div class="form-group">
                    <label for="tags">Tags</label>
                    <select name="tags" class="tags" multiple data-required id="tags" data-placeholder="Select Tags"></select>
                </div>
                <span class="v-msg"></span>
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



{{-- -------------------- modal area ----------------------------------------------  --}}
<div class="modal fade" id="manageVariantSizePriceModal" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true"
    role="dialog" data-backdrop="static" data-keyboard="false" aria-modal="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title font-weight-bold modal-heading" id="exampleModalLabel1">Manage Product Variant & Stock Qty </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
            {{-- ---------------------------------------- variant wise qty price --------------------------------------- --}}
                <div class="row">
                    <div class="col-md-12" id="variantWisePrice">
                        <table class="table table-sm table-bordered w-100 text-center mx-auto">
                            <thead class="bg-danger">
                                <tr>
                                    <th class="text-white">Color</th>
                                    <th class="text-white">Size</th>
                                    <th class="text-white">Price</th>
                                    <th class="text-white">Qty</th>
                                    <th>
                                        <button class="btn btn-sm btn-light text-dark" id="addVariantRow"><i class="fa fa-plus"></i> Add</button>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <select name="color_id" class="color" data-required data-placeholder="Select Color"></select>
                                    </td>
                                    <td>
                                        <select name="size_id" class="size" data-required data-placeholder="Select Size"></select>
                                    </td>
                                    <td>
                                        <input type="number" name="unit_price" class="form-control">
                                    </td>
                                    <td>
                                        <input type="number" name="product_qty" class="form-control">
                                    </td>
                                    <td>
                                        <span class="fa fa-times text-danger fa-lg deleteVariantRow" type="button"></span>
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot class="bg-dark text-white">
                                <tr>
                                    <th colspan="1">0</th>
                                    <th colspan="1">0</th>
                                    <th colspan="1">0</th>
                                    <th colspan="1">0</th>
                                    <th></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            {{-- ---------------------------------------- variant wise qty price --------------------------------------- --}}
            </div>

            <div class="modal-footer">
                <div class="w-100">
                    <button type="button" id="save-variant-price-qty" class="btn btn-sm btn-success float-right mx-1"><i class="fa fa-save"></i> Submit</button>
                    <button type="button" class="btn btn-sm btn-danger float-right mx-1" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
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

        $(document).on('change','#manageVariant', manageVariantPriceStock)
        $(document).on('click','#addVariantRow', createRow)
        $(document).on('click','.deleteVariantRow', deleteRow)
        $(document).on('click','#save-variant-price-qty', ()=>{

            let 
            data = [],
            rows = [...$('#variantWisePrice').find('tbody').find('tr')];

            rows.forEach(row => {

                let 
                color_id    = $(row).find('[name="color_id"]').val() ?? null,
                size_id     = $(row).find('[name="size_id"]').val() ?? null,
                unit_price  = $(row).find('[name="unit_price"]').val() ?? 0,
                product_qty = $(row).find('[name="product_qty"]').val() ?? 0;

                data.push(
                    {
                        color_id,
                        size_id,
                        unit_price,
                        product_qty,
                    }
                )
            });

            collectionOfVariantPriceQty(data);

            hideModal('#manageVariantSizePriceModal');
        })

        $(document).on('submit','#productForm', submitToDatabase)
    });

    


    function createRow(){
        let 
        elem    = $(this),
        tbody   = $('#variantWisePrice').find('tbody'),
        html    = `
        <tr>
           <td>
                <select name="color_id" class="color" data-required data-placeholder="Select Color"></select>
            </td>
            <td>
                <select name="size_id" class="size" data-required data-placeholder="Select Size"></select>
            </td>
            <td>
                <input type="number" name="unit_price" class="form-control">
            </td>
            <td>
                <input type="number" name="product_qty" class="form-control">
            </td>
            <td>
                <span class="fa fa-times text-danger fa-lg deleteVariantRow" type="button"></span>
            </td>
        </tr>`;
        
        tbody.append(html);

        let arr = [
             {
                selector        : `.color`,
                type            : 'select'
            },
            {
                selector        : `.size`,
                type            : 'select',
            },
        ];

        globeInit(arr);
    }


    function deleteRow(){
        $(this).closest('tr').remove();
    }


    function collectionOfVariantPriceQty(data=null){

        let 
        targetElem = $('#defaultPrice');

        if(data){
            targetElem.attr('data-product-variant', JSON.stringify(data));
        }else{
            return JSON.parse(targetElem.attr('data-product-variant'));
        }

    }


    function manageVariantPriceStock(){
        let elem = $(this);

        if(elem.is(":checked")){
            $('#defaultPrice').hide();
            showModal('#manageVariantSizePriceModal');
        }else{
            $('#defaultPrice').show();
            hideModal('#manageVariantSizePriceModal');
        }
    }


    function init(){

        let arr=[
            {
                selector        : `#subcategory`,
                type            : 'select',
            },
            {
                selector        : `.color`,
                type            : 'select'
            },
            {
                selector        : `.size`,
                type            : 'select',
            },
            {
                selector        : `#tags`,
                type            : 'select',
                tags            : true,
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
        e.preventDefault();

console.log(formatProductData());
return false;

        ajaxFormToken();

        $.ajax({
            url: `{{ route('admin.products.store') }}`,
            method: 'POST',
            cache: false,
            contentType: false,
            processData: false,
            data : { data: JSON.stringify(formatProductData())},
            beforeSend(){
                console.log('Sending ...');
            },
            success(res){
                console.log(res);
            },
            error(err){
                console.log(err);
            },
        })

        


        // hideModal('#categoryModal');
    }


    function formatProductData(){

        let files = [];
        function fileRead(elem, src = '#img-preview') {
            if (elem[0]?.files && elem[0]?.files[0]) {
                let FR = new FileReader();
                FR.addEventListener("load", function (e) {
                    files.push(e.target.result);
                });
        
                FR.readAsDataURL(elem[0].files[0]);

                return files;
            }
        }

        return {
            category_id             : $('.category').val(),
            subcategory_id          : $('#subcategory').val(),
            product_name            : $('#product_name').val(),
            product_sku             : $('#product_sku').val(),
            color_ids               : $('#color').val(),
            size_ids                : $('#size').val(),
            unit_price              : $('#unit_price').val(),
            wholesale_price         : $('#wholesale_price').val(),
            product_qty             : $('#product_qty').val(),
            brand                   : $('.brand').val(),
            currency                : $('.currency').val(),
            product_qty             : $('#product_qty').val(),
            product_unit            : $('.unit').val(),
            discount                : $('#discount').val(),
            description             : $('#description').val(),
            specification           : $('#specification').val(),
            is_best_sale            : $('#is_best_sale').prop('checked'),
            allow_review            : $('#allow_review').prop('checked'),
            is_active               : $('#is_active').prop('checked'),
            is_publish              : $('#is_publish').prop('checked'),
            product_thumbnail_image : $('#default_image')[0].files.length ? fileRead($('#default_image')) : null,
            product_gallery         : $('#product_gallery')[0].files.length ? fileRead($('#product_gallery')) : [],
            tags                    : $('#tags').val(),
            variant_prices          :[]
        };
    }

</script>
@endpush