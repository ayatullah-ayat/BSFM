<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customize Order Approval </title>
    <style>
        body,
        body *:not(html):not(style):not(br):not(tr):not(code) {
            box-sizing: border-box;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif,
                'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol';
            position: relative;
        }

        body {
            -webkit-text-size-adjust: none;
            background-color: #ffffff;
            color: #718096;
            height: 100%;
            line-height: 1.4;
            margin: 0;
            padding: 0;
            width: 100% !important;
        }

        p,
        ul,
        ol,
        blockquote {
            line-height: 1.4;
            text-align: left;
        }

        .order-header .logo img {
            margin: 0 auto;
            display: block;
        }

        .order-body {
            width: 50%;
            margin: 0 auto;
        }

        .header-content {
            text-align: center;
        }

        .order-no {
            color: #000 !important;
            font-weight: bold;
        }

        .btn {
            border: none;
            outline: none;
            padding: 5px 10px;
            font-weight: 600;
        }

        .btn-danger {
            color: #fff;
            background-color: red;
        }

        .table {
            width: 100%;
            position: relative;
            text-align: left;
            border-collapse: collapse;
        }

        .table.fixed {

            table-layout: fixed;
        }

        .table thead tr {
            background-color: #fdfd;
            color: #000;
        }

        .table-borderless,
        .table-borderless tr,
        .table-borderless tr th,
        .table-borderless tr td {
            border: none;
        }

        .mb-10 {
            margin-bottom: 10px;
        }

        .mb-20 {
            margin-bottom: 20px;
        }

        .mb-30 {
            margin-bottom: 30px;
        }

        .mb-40 {
            margin-bottom: 40px;
        }

        .table tbody th,
        .table tbody td {
            padding: 0px 10px;
        }

        .inner-product img {
            float: left;
            max-width: 100px;
            margin-right: 10px;
        }

        .call-us {
            color: #fff !important;
            background-color: red !important;
        }

        .table a {
            text-decoration: none !important;
            color: #fff;
        }

        .header {
            padding: 25px 0;
            text-align: center;
        }

        .header a {
            color: #3d4852;
            font-size: 19px;
            font-weight: bold;
            text-decoration: none;
        }

        .customer-email a{
            color: #000 !important;
        }
    </style>
</head>

<body>
    <div class="order-body">
        <table class="table order-header mb-30">
            <tbody>
                <tr>
                    <th class="header" style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';padding:25px 0;text-align:center">
                        <div class="logo" style="text-align: center !important;">
                            <a href="{{ '' }}" style="display: block; text-align:center;">
                                <img src="{{ asset('assets/frontend/img/logogroup.jpg') }}" alt="Logo"
                                    style="text-align: center !important;margin: 0 auto;display: block;">
                            </a>
                        </div>
                    </th>
                </tr>
                <tr>
                    <th>
                        <div class="header-content" style="text-align: center !important;">
                            @if(preg_match("/pending/im",$data->status))
                            <h2 style="text-align: center !important;">Customize Order Request</h2>
                            <p style="padding: 0; line-height: 0.5em; font-weight: normal;text-align: center !important;">
                                Hi {{ $admin->name ?? '' }},
                                Mr/Mrs {{ ($data->customer_name ?? $customer->customer_name)?? '' }} has been placed order and Currently It's waiting for approval.
                            </p>
                            @endif 
                            <button class="btn btn-danger"><a href="{{ url('/') }}">Visit Web site</a></button>
                        </div>
                    </th>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="order-body">
        <table class="table fixed table-borderless mb-20">
            <thead>
                <tr>
                    <th style="padding: 5px 10px;">ORDER & CUSTOMER INFO</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td rowspan="4" style="vertical-align:top">
                        <h4 style="margin-bottom: 0px !important">Order Details</h4><hr>
                        Order No: #{{ $data->order_no ?? '' }}<br/>
                        Order Date: {{ $data->created_at ? date('Y-m-d', strtotime($data->created_at)) : '' }}<br/>
                        Order Status: {{ $data->status ? ucfirst($data->status) : '' }}<br/>
                    </td>
                    <td rowspan="4" style="vertical-align:top">
                        <h4 style="margin-bottom: 0px !important">Customer</h4><hr>
                        Name : {{ ($data->customer_name ?? $customer->customer_name)?? '' }} <br/>
                        Phone : {{ ($data->customer_phone ?? $customer->customer_phone)?? '' }} <br/>
                        @if(($data->customer_email ?? $customer->customer_email))
                        Email : <span style="color: #000 !important;" class="customer-email">{{ ($data->customer_email ?? $customer->customer_email)?? '' }}</span> <br/>
                        @endif 

                        <h4 style="margin-bottom: 0px !important">Customer Address: </h4><hr>
                        {{ $data->customer_address ?? '' }}
                    </td>
                </tr>
            </tbody>
        </table>

        <table class="table table-borderless">
            <thead>
                <tr>
                    <th style="padding: 5px 10px;">ITEM</th>
                    <th style="width: 100px;text-align: center;">Attachment</th>
                </tr>
            </thead>
            <tbody>
                @php
                $image = $data->product->product_thumbnail ?? '';
                @endphp
                <tr>
                    <td>
                        <div class="inner-product">
                            <img src="{{ asset($image) }}" alt="product image">
                            <p>{{ $data->custom_service_product_name ?? '' }}</p>
                        </div>
                    </td>
                    <td>
                        @if($data->order_attachment)
                        <img src="{{ asset($data->order_attachment) }}" alt="product image">
                        @else 
                        {{ 'N/A' }}
                        @endif 
                    </td>
                </tr>
            </tbody>
        </table>

        Best Regards,<br>
        {{ config('app.name') }}.
    </div>


</body>

</html>