@extends('backend.layouts.master')

@section('title', 'Manage Purchase')

@section('content')
<div>
    <div>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">

            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary"><a href="/" class="text-decoration-none">Manage Purchase</a> </h6>
                <button class="btn btn-sm btn-info"><a class="text-white" href="{{ route('admin.purchase.create') }}"><i class="fa fa-plus"> Purchase</i></a></button>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Invoice No</th>
                                <th>Supplier Name</th>
                                <th>Purchase Date</th>
                                <th>Total Qty</th>
                                <th>Total Amount</th>
                                <th>Total Payment</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($purchases as $item)
                                <tr>
                                    <th>{{ $loop->iteration }}</th>
                                    <th>
                                        <a href="">{{ $item->invoice_no ?? 'N/A' }}</a>
                                    </th>
                                    <th>{{ $item->supplier_name ?? 'N/A' }}</th>
                                    <th>{{ $item->purchase_date ?? 'N/A' }}</th>
                                    <th>{{ $item->total_qty ?? '0' }}</th>
                                    <th>{{ $item->total_price ?? '0.0' }}</th>
                                    <th>{{ $item->total_payment ?? '0.0' }}</th>
                                    {{-- 
                                    <th>{{ $item->total_payment_due ?? '0.0' }}</th> --}}
                                    <th class="text-center">
                                        <span class="btn btn-outline-success btn-sm payNow" data-total-bill="{{ $item->total_price - $item->total_payment }}" data-purchaseid="{{ $item->id }}">Pay Now</span>
                                        @if(!$item->is_manage_stock)
                                        <span class="btn btn-outline-info btn-sm">Manage Stock</span>
                                        @endif 
                                        <a href="" class="fa fa-edit mx-2 text-warning text-decoration-none"></a>
                                        <a href="javascript:void(0)" class="fa fa-trash text-danger text-decoration-none"></a>
                                    </th>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    
    </div>
</div>


<div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="exampleModalLabel1"
    aria-hidden="true" role="dialog" data-backdrop="static" data-keyboard="false" aria-modal="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title font-weight-bold modal-heading" id="exampleModalLabel1">Pay Now</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">

                <table class="table table-sm">
                    <tr>
                        <th>Bill Amount</th>
                        <th>:</th>
                        <td id="billAmount">0</td>
                    </tr>
                    <tr>
                        <th>Payment Amount</th>
                        <th>:</th>
                        <th>
                            <input type="text" name="total_payment" id="total_payment" value="0"><br>
                            <span class="v-error text-danger"></span>
                        </th>
                    </tr>
                </table>
                
            </div>

            <div class="modal-footer">
                <div class="w-100">
                    <button type="button" id="save-variant-price-qty" class="btn btn-sm btn-success float-right mx-1"><i class="fa fa-save"></i> Pay</button>
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
            $(document).on("click",".payNow", openPaymentModal)
            $(document).on("input change","#total_payment", isPaymentAmountValid)
        })


        function openPaymentModal(){

            let elem = $(this),
            bill        = elem.attr('data-total-bill'),
            purchase_id = elem.attr('data-purchaseid');
            //
            $('#billAmount').text(bill);
            $('#paymentModal').modal('show')
        }


        function isPaymentAmountValid(){
            let elem = $(this),
            payment = Number(elem.val().trim() ?? 0),
            bill    = Number($('#billAmount').text() ?? 0 );

            $('.v-error').text('')
            if(payment > bill){
                elem.addClass("is-invalid");
                $('.v-error').text('Invalid Payment!');
            }
        }
    </script>
@endpush