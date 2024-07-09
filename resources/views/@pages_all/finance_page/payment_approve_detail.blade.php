<base href="/public">
@include('header')

<body> @include('home_page.navbar') <div class="row-fluid">@include('@pages_all.finance_manager_page.sidebar_payment') <div class="span8" id=""
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
                            <i
                                class="icon-info-sign"></i><b><strong>&nbsp;{{ __('payment.p_r_approve_details') }}</strong></b>
                        </div>
                    </div>
                    <div class="block-content collapse in">
                        <div class="span16">
                            <form action="delete_users.php" method="post" autocomplete="off">
                                <table cellpadding="0" cellspacing="0" border="1" class="table" id="example">
                                    <a data-toggle="modal" href="#user_delete" id="delete" class="btn btn-danger"
                                        name=""><i class="icon-trash icon-large"></i></a> 
                                       
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Id</th>
                                            <th>Request Info</th>
                                            <th>Description</th>
                                            <th>Directorate</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($payment_request_selected as $request_selected)
                                        @endforeach
                                        @foreach ($payment_approval as $detail)
                                            <tr>
                                                <td width="30">
                                                    <input id="optionsCheckbox" class="uniform_on" name="selector[]"
                                                        type="checkbox" value="">
                                                </td>
                                                <td>{{ $request_selected->request_id }}</td>
                                                <td>
                                                    <p class="info">Payment title:
                                                        <b>{{ $request_selected->title }}</b></p>
                                                    <p class="info">Amount: <small
                                                            class="text-danger"><b>{{ $request_selected->amount }}</b></small>
                                                    </p>
                                                    <p class="info"><small>Request Date: <b>
                                                                {{ $request_selected->request_date }} </b></small></p>
                                                </td>
                                                <td>{{ $request_selected->description }}</td>
                                                <td>{{ $request_selected->directorate_name }}</td>
                                                <td>
                                                    <p class="info">Approver: <b
                                                            style="color:green;">{{ $detail->approver_name }}</b></p>
                                                    <p class="info"><small>Signature: <b
                                                                style="color:red;">{{ $detail->signature_sign }}{{ $detail->approved_date }}</b></small>
                                                    </p>
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
    </div><br><br><br><br><br><br><br><br> @include('home_page.footer') @include('home_page.script')</body>

</html>
