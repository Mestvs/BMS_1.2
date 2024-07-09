@include('header')

<body> @include('@pages_all.admin_page.navbar') <div class="row-fluid">@include('@pages_all.finance_page.sidebar_payment') <div class="span8" id=""
            style="width:80%;margin-left:16%;">
            <div class="row-fluid">

                <!-- block -->
                <div id="block_bg" class="block">
                    <div class="navbar navbar-inner block-header">
                        <div class="pull-right " style="padding-top:0%;">
                            <a href="/f_payment" id="print" class="btn btn-success" style="font-family: all;">
                                <i class="icon-arrow-left">
                                </i><b><strong></i><b><strong>{{ __('link.back') }}</strong></b></a>
                        </div>
                        <div class="alert alert-info">
                            <i class="icon-info-sign"></i><b><strong> {{ __('payment.p_r_list') }} </strong></b>
                        </div>
                    </div>
                    <div class="block-content collapse in">
                        <table cellpadding="0" cellspacing="0" border="1" class="table" id="example">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Id</th>
                                    <th>Request Info</th>
                                    <th>Description</th>
                                    <th>Directorate</th>
                                    <th>Status</th>
                                    <th>Approve</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($payment_request as $payment)
                                    <?php $status=$payment->approval;?>
                                    @if($status == "Not Approved")
                                      <tr>
                                        <td width="30">
                                            <input id="optionsCheckbox" class="uniform_on" name="selector[]"
                                                type="checkbox" value="{{ $payment->request_id }}">
                                        </td>
                                        <td>{{ $payment->request_id }}</td>
                                        <td>
                                            <p class="info">Payment title: <b>{{ $payment->title }}</b></p>
                                            <p class="info">Amount: <small
                                                    class="text-danger"><b>{{ $payment->amount }}</b></small></p>
                                            <p class="info"><small>Request Date:
                                                    <b>{{ $payment->request_date }}</b></small></p>
                                        </td>
                                        <td>{{ $payment->description }}</td>
                                        <td>{{ $payment->directorate_name }}</td>
                                        <td>
                                            <p class="info">Signature: <b
                                                    style="color:red;">{{ $payment->signature }}</b></p>
                                            <p class="info"><small>Approval: <b
                                                        style="color:red;">{{ $payment->approval }}</b></small></p>
                                        </td>
                                        <td width="70">
                                            <a href="{{ url('payment_approve', $payment->request_id) }}"
                                                data-toggle="modal" class="btn btn-success"><i
                                                    class="icon-pencil icon-small"></i></a>
                                        </td>
                                    </tr>
                                    @else                                   <tr>
                                        <td width="30">
                                            <input id="optionsCheckbox" class="uniform_on" name="selector[]"
                                                type="checkbox" value="">
                                        </td>
                                        <td>{{ $payment->request_id }}</td>
                                        <td>
                                            <p class="info">Payment title: <b>{{ $payment->title }}</b></p>
                                            <p class="info">Amount: <small
                                                    class="text-danger"><b>{{ $payment->amount }}</b></small></p>
                                            <p class="info"><small>Date: <b>{{ $payment->request_date }}</b></small>
                                            </p>
                                        </td>
                                        <td>{{ $payment->description }}</td>
                                        <td>{{ $payment->directorate_name }}</td>
                                        <td>
                                            <p class="info">Signature: <b
                                                    style="color:green;">{{ $payment->signature }}</b><a
                                                    href="{{ url('f_payment_approve_detail', $payment->request_id) }}"
                                                    data-toggle="modal" class="btn btn-success"><i
                                                        class=""></i>details</a></p>
                                            <p class="info"><small>Approval: <b
                                                        style="color:green;">{{ $payment->approval }}</b></small></p>
                                        </td>
                                        <p class="info"><b style="color:green;"></b></p>
                                        <td width="70">
                                            <a href="{{ url('payment_approve', $payment->request_id) }}"
                                                data-toggle="modal" class="btn btn-success"><i
                                                    class="icon-pencil icon-small"></i></a>
                                        </td>
                                    </tr>
                                     @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /block -->
                @include('@pages_all.finance_page.payment_approve_detail')
                @if (session('back') == 'true')
                    <script>
                        document.getElementById("login").style.display = "block";
                    </script>
                @else
                @endif
            </div>
        </div>
    </div>
    </div><br><br><br><br><br><br><br><br><br><br><br><br>
    <!-- jQuery --> @include('home_page.footer')@include('home_page.script') </body>

</html>
