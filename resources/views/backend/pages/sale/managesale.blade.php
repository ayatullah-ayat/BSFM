@extends('backend.layouts.master')

@section('title', 'Manage Sale')

@section('content')
<div>
    <div>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">

            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary"><a href="/" class="text-decoration-none">Manage Sale</a> </h6>
                <button class="btn btn-sm btn-info"><a class="text-white" href="{{ route('admin.ecom_sales.add_sale') }}"><i class="fa fa-plus"> Sale</i></a></button>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Invoice NO</th>
                                <th>Customer Name</th>
                                <th>Date</th>
                                <th>Total Qty</th>
                                <th>Total Amount</th>
                                <th>Total Payment</th>
                                <th>Total Due</th>
                                <th>Paymet status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($sales as $sale)
                                {{-- @dd($sale) --}}
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><a href="{{ route('admin.ecom_sales.showInvoice', $sale->invoice_no) }}">{{ $sale->invoice_no ?? 'N/A' }}</a></td>
                                    <td>{{ $sale->customer_name ?? 'N/A' }}</td>
                                    <td>{{ $sale->sales_date ?? 'N/A' }}</td>
                                    <td>{{ $sale->sold_total_qty ?? 0 }}</td>
                                    <td>{{ $sale->order_grand_total ?? 0 }}</td>
                                    <td class="payment-amount">{{ $sale->total_payment ?? '0.0' }}</td>
                                    <td class="payment-due">{{ $due = $sale->order_grand_total - $sale->total_payment }}</td>
                                    <td class="text-center payment-amount-status">
                                        @if($due > 0)
                                        <span class="btn btn-outline-success btn-sm payNow" data-total-bill="{{ $sale->order_grand_total - $sale->total_payment }}" data-saleid="{{ $sale->id }}">Pay Now</span>
                                        @else
                                        <span class="badge badge-success">Paid</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a href="javascript:void(0)" class="btn btn-sm btn-outline-warning warnig-hover return-sale mx-2 text-decoration-none">
                                            <i class="fa fa-angle-double-right"></i> Return
                                        </a>
                                        <a href="" class="fa fa-edit mx-2 text-warning text-decoration-none"></a>
                                        <a href="javascript:void(0)" class="fa fa-trash text-danger text-decoration-none"></a>
                                    </td>
                                </tr>                        
                            @endforeach
                            
                        </tbody>

                    </table>
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