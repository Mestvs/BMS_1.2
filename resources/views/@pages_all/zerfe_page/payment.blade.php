@include('header')

<body> @include('@pages_all.admin_page.navbar') <div class="row-fluid">@include('@pages_all.zerfe_page.sidebar_payment') <div class="pull-right"
            style="margin-top:2%;">
        </diV>
        <div class="span8" id="" style="width:80% ;margin-left:16%;">
            <div class="row-fluid">
                <!-- block -->
                <div id="block_bg" class="block">
                    <div class="navbar navbar-inner block-header">
                        <div class="alert alert-info" style="font-family: all;font-size:medium;">
                            <i class="icon-info-sign"></i><b><strong>{{ __('payment.p_r_list') }} </strong></b>
                        </div>
                    </div>
                    <div class="block-content collapse in" style="font-size:medium;">
                        <div class="span16">
                            <form action="delete_users.php" method="post" autocomplete="off">
                                <table cellpadding="0" cellspacing="0" border="1" class="table" id="example">
                                    <thead style="font-family: all;color: black;font-size:medium;">
                                        <tr>
                                            <th></th>
                                            <th>R_Id</th>
                                            <th>Request Info</th>
                                            <th>Description</th>
                                            <th>Directorate</th>
                                            <th>Status</th>
                                            <th>Sign</th>
                                        </tr>
                                    </thead>
                                    <tbody style="font-family: all;color: black;font-size:small;">
                                        @foreach ($p_request_query as $p_request)
                                            <tr style="">
                                                <td width="30">
                                                    <input id="optionsCheckbox" class="uniform_on" name="selector[]"
                                                        type="checkbox" value="{{ $p_request->request_id }}">
                                                </td>
                                                <td>{{ $p_request->request_id }} </td>
                                                <td>
                                                    <p class="info">Payment title: <b> {{ $p_request->title }} </b>
                                                    </p>
                                                    <p class="info">Amount: <small class="text-danger"><b>
                                                                {{ $p_request->amount }} </b></small></p>
                                                    <p class="info"><small>Request Date: <b>
                                                                {{ $p_request->request_date }} </b></small></p>
                                                    <p class="info">category: <small
                                                            class="text-danger"><b>{{ $p_request->category_code }}
                                                            </b></small>
                                                    </p>
                                                </td>
                                                <td> {{ $p_request->description }} </td>
                                                <td> {{ $p_request->directorate_name }} </td>
                                                <td>
                                                    <p class="info">Signature: <b
                                                            style="color:green;">{{ $p_request->signature }} </b></p>
                                                    <p class="info"><small>Approval: <b
                                                                style="color:red;">{{ $p_request->approval }}
                                                            </b></small></p>
                                                </td>
                                                <td width="70">
                                                    <a href="{{ url('payment_sign', $p_request->request_id) }}"
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
    </div><br><br><br><br><br><br><br><br><br><br><br>
    @include('home_page.footer') @include('home_page.script') </body>

</html>
