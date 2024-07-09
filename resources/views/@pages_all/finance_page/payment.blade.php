@include('header')

<body> @include('@pages_all.admin_page.navbar') <div class="row-fluid">@include('@pages_all.finance_page.sidebar_payment') <div class="span8"
             style="width:80%;margin-left:16%;">
            <div class="row-fluid">
                <!-- block -->
                <div id="block_bg" class="block">
                    <div class="navbar navbar-inner block-header">
                        <div class="pull-right" style="padding-top:0% ;">
                            <a href="/payment_add_request_list" id="print" class="btn btn-success"
                                style="font-family: all;">
                                <i class="icon-plus">
                                </i><b><strong> {{ __('payment.a_payment') }}</strong></b></a>
                            <a href="/f_payment_request_list" id="print" class="btn btn-success"
                                style="font-family: all;">
                                <i class="fa fa-question-circle" style="margin-right:4px;">
                                </i><b><strong> {{ __('payment.p_requests') }} </strong></b></a>
                        </diV>
                        <div class="alert alert-info">
                            <i class="icon-info-sign"></i><b><strong> {{ __('payment.paymentlist') }} </strong></b>
                        </div>
                    </div>
                    <div class="block-content collapse in">
                        <table cellpadding="0" cellspacing="0" border="1" class="table" id="example">
                            <thead>
                                <tr>
                                    <th>Ref. No</th>
                                    <th>Amount</th>
                                    <th>Paid To</th>
                                    <th>Paid Date</th>
                                    <th>Authorized By</th>
                                    <th>Approved By</th>
                                    <th>status</th>
                                    <th>Update</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($payment_query as $payment)
                                    <tr>
                                        <td>{{ $payment->reference_no }} </td>
                                        <td> {{ $payment->amount }}</td>
                                        <td> {{ $payment->paid_to }}</td>
                                        <td>{{ $payment->paid_date }}</td>
                                        <td> {{ $payment->authorizer_name }} </b></p>
                                        </td>
                                        <td> {{ $payment->approver_name }}</b></p>
                                        </td>
                                        <td>{{ $payment->status }}
                                        <td width="70">
                                            <a href="{{ url('edit/payment/form', $payment->request_id) }}"
                                                data-toggle="modal" class="btn btn-success"><i
                                                    class="icon-pencil icon-small"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /block -->
            </div>
        </div>
    </div>
    </div><br><br><br><br><br><br><br><br>
    <!-- jQuery --> @include('home_page.footer') @include('home_page.script') </body>

</html>
