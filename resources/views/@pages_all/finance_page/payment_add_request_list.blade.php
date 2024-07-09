@include('header')

<body> @include('@pages_all.admin_page.navbar')<div class="row-fluid"> @include('@pages_all.finance_page.sidebar_payment') <div class="pull-right">
        </diV>
        <div class="span8" id="" style="width:80%;margin-left:16%;">
            <div class="row-fluid">
                <!-- block -->
                <div id="block_bg" class="block">
                    <div class="navbar navbar-inner block-header">
                        <div class="pull-right " style="padding-top:0%;">
                            <a href="/f_payment" id="print" class="btn btn-success"
                                style="font-family: all;font-size:small;">
                                <i class="icon-arrow-left">
                                </i><b><strong> {{ __('link.back') }}</strong></b></a>
                        </div>
                        <div class="alert alert-info">
                            <i class="icon-info-sign"></i><b><strong> {{ __('payment.p_r_list') }}</strong></b>
                        </div>
                    </div>
                    <div class="block-content collapse in">
                        <div class="span16">
                            <form action="delete_users.php" method="post" autocomplete="off">
                                <table cellpadding="0" cellspacing="0" border="1" class="table" id="example">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Request Info</th>
                                            <th>Description</th>
                                            <th>Directorate</th>
                                            <th>Status</th>
                                            <th>Add</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($payment_request as $payment)
                                            <tr>
                                            
                                                <td>{{ $payment->request_id }}</td>
                                                <td>
                                                    <p class="info">Payment title: <b>{{ $payment->title }}</b></p>
                                                    <p class="info">Amount: <small
                                                            class="text-danger"><b>{{ $payment->amount }}</b></small>
                                                    </p>
                                                    <p class="info"><small>Request Date:
                                                            <b>{{ $payment->request_date }}</b></small></p>
                                                </td>
                                                <td>{{ $payment->description }}</td>
                                                <td>{{ $payment->directorate_name }}</td>
                                                <td>
                                                    <p class="info">Signature: <b
                                                            style="color:green;">{{ $payment->signature }}</b></p>
                                                    <p class="info"><small>Approval: <b
                                                                style="color:green;">{{ $payment->approval }}</b></small>
                                                    </p>
                                                </td>
                                                <p class="info"><b style="color:green;"></b></p>
                                                <td width="70">
                                                    <a href="{{ url('payment_add_form', $payment->request_id) }}"
                                                        data-toggle="modal" class="btn btn-success"><i
                                                            class="icon-pencil icon-small"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>

                                </table>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /block -->
            </div>
        </div>
    </div>
    </div><br><br><br><br><br><br><br>
    <!-- jQuery --> @include('home_page.footer') @include('home_page.script') </body>

</html>
