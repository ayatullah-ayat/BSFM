@extends('backend.layouts.master')

@section('title', 'Manage Product')

@section('content')

<div>
    <div>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">

            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary text-dark"><a href="/" class="text-decoration-none">View Product</a> </h6>
                <button class="btn btn-sm btn-info"><a class="text-white" href="{{ route('admin.products.index') }}"><i class="fa fa-arrow-left"> Back</i></a></button>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered"  width="100%" cellspacing="0">
                        <tbody>
                            <tr class="borderd">
                                <th colspan="2">
                                    <h4>
                                        Product Master Information
                                    </h4>
                                </th>
                            </tr>
                            <tr>
                                <th>Product Thumbnail</th>
                                <td>
                                    <img src="{{ asset( $product->product_thumbnail_image ?? 'N/A' ) }}" style="width: 80px;" alt="Category Image">
                                </td>
                            </tr>
                            <tr>
                                <th>Product Name</th>
                                <td>{{ $product->product_name ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <th>SKU</th>
                                <td>{{ $product->product_sku ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <th>Category</th>
                                <td>{{ $product->category->category_name ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <th>Sub-Category</th>
                                <td>{{ $product->subCategory->subcategory_name ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <th>Description</th>
                                <td>{!! $product->product_description ?? 'N/A' !!}</td>
                            </tr>
                            <tr>
                                <th>Specification</th>
                                <td>{!! $product->product_specification ?? 'N/A' !!}</td>
                            </tr>
                            <tr>
                                <th>Unit</th>
                                <td>{{ $product->product_unit ?? 'N/A' }}</td>
                            </tr>
                           
                            <tr>
                                <th>Currency</th>
                                <td>{{ $product->currency ?? 'N/A' }}</td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="table-responsive">
                        <table class="table table-bordered"  width="100%" cellspacing="0">
                            <thead>
                                <tr class="borderd">
                                    <th colspan="7">
                                        <h4>
                                            Product Variation Information
                                        </h4>
                                    </th>
                                </tr>
                                <tr>
                                    <th>Color</th>
                                    <th>Size</th>
                                    <th>Unit Price</th></th>
                                    <th>Sales Price</th>
                                    <th>WholeSale Price</th>
                                    <th>Product Qty</th>
                                    <th>Stock Qty</th>
                                </tr>
                            </thead>
                            <tbody>
                                @isset($product->sizes)
                                    {{-- @dd($product->sizes) --}}
                                        @foreach ($product->sizes as $variant)
                                            <tr>
                                                <td>{{ $variant->color_name ?? 'N/A' }}</td>
                                                <td>{{ $variant->size_name ?? 'N/A' }}</td>
                                                <td>{{ $variant->unit_price ?? 'N/A' }}</td>
                                                <td>{{ $variant->sales_price ?? 'N/A' }}</td>
                                                <td>{{ $variant->wholesale_price ?? 'N/A' }}</td>
                                                <td>{{ $variant->product_qty ?? 'N/A' }}</td>
                                                <td>{{ $variant->stock_qty ?? 'N/A' }}</td>
                                            </tr>
                                        @endforeach
                                @endisset
                            </tbody>
                        </table>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered"  width="100%" cellspacing="0">
                            <thead>
                                <tr class="borderd">
                                    <th colspan="6">
                                        <h4>
                                            Product Pricing
                                        </h4>
                                    </th>
                                </tr>
                                <tr>
                                    <th>Total Price</th>
                                    <th>Total Stock Price</th>
                                    <th>WholeSale Price</th>
                                    <th>Discount (%)</th>
                                    <th>Total Qty</th>
                                    <th>Stock Qty</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $product->total_product_unit_price ?? 'N/A' }}</td>
                                    <td>{{ $product->total_stock_price ?? 'N/A' }}</td>
                                    <td>{{ $product->total_product_wholesale_price ?? 'N/A' }}</td>
                                    <td>{{ $product->product_discount ?? 'N/A' }}</td>
                                    <td>{{ $product->total_product_qty ?? 'N/A' }}</td>
                                    <td>{{ $product->total_stock_qty ?? 'N/A' }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered"  width="100%" cellspacing="0">
                            <thead>
                                <h4 style="color: #000; font-size: 1.5rem; font-weight:500; padding: 10px 0px; margin-left: 10px;">
                                    Product Image Gallery
                                </h4>
                            </thead>
                            <tbody>
                                <div class="d-flex justify-content-space-between">
                                    @isset($product->productImages)
                                      {{-- @dd($product->productImages) --}}
                                        @foreach ($product->productImages as $productGallery)
                                            <img src="{{ asset( $productGallery->product_image ?? 'N/A' ) }}" style="width: 120px; margin:10px;" alt="Category Image">
                                        @endforeach
                                    @endisset
                                </div>
                            </tbody>
                        </table>
                    </div>

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
@endpush