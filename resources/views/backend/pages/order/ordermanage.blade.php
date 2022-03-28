@extends('backend.layouts.master')

@section('title', 'Manage Order')

@section('content')
<div>
    <div>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">

            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary"><a href="/" class="text-decoration-none">Manage Order</a> </h6>
                <button class="btn btn-sm btn-info"><a class="text-white" href="{{ route('admin.ecom_orders.order_add') }}"><i class="fa fa-plus"> Order</i></a></button>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Order NO</th>
                                <th>Order Date</th>
                                <th>Customer Name</th>
                                <th>Total Amount</th>
                                <th>Status</th>
                                <th width="70" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>


                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $order->order_no ?? 'N/A' }}</td>
                                    <td>{{ $order->order_date ?? 'N/A' }}</td>
                                    <td>{{ $order->customer->customer_name  ?? 'N/A' }}</td>
                                    {{-- <td>{{ $order->customer_name  ?? 'N/A' }}</td> --}}
                                    <td>{{ $order->order_total_price  ?? 'N/A' }}</td>
                                    <td class="text-center">

                                        @if($order->status == "pending")
                                        <span class="badge badge-warning">
                                            {{ ucfirst($order->status) }}
                                        </span>
                                        @elseif($order->status == "confirm" || $order->status == "processing")
                                        <span class="badge badge-warning">
                                            {{ ucfirst($order->status) }}
                                        </span>
                                        @elseif($order->status == "rejected" || $order->status == "cancelled" || $order->status == "returned")
                                        <span class="badge badge-danger">
                                            {{ ucfirst($order->status)  }}
                                        </span>
                                        @elseif($order->status == "completed")
                                        <span class="badge badge-success">
                                            Delivered
                                        </span>
                                        @endif 
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.ecom_orders.show', $order->id) }}" class="fa fa-eye text-info text-decoration-none"></a>
                                        <a href="{{ route('admin.ecom_orders.edit', $order->id)}}" class="fa fa-edit mx-2 text-warning text-decoration-none"></a>
                                        <a href="{{ route('admin.ecom_orders.destroy', $order->id )}}" class="fa fa-trash text-danger text-decoration-none delete"></a>
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

    <script>
        $(document).ready(function(){
            init();
            $(document).on('click', '.delete', deleteToDatabase)
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

        function init(){

            let arr=[
                {
                    dropdownParent  : '#categoryModal',
                    selector        : `#email_template`,
                    type            : 'select',
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

    </script>
@endpush