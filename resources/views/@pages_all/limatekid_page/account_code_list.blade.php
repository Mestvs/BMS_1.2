@include('header')

<body> @include('@pages_all.admin_page.navbar') <div class="row-fluid"> @include('@pages_all.limatekid_page.sidebar_budget_codes') <div class="span3" id="adduser"
            style="position:sticky;top:10%;width:30%;margin-left:16%;">
            @include('@pages_all.limatekid_page.account_code_adjust_form') </div>
        <div class="span8" id="" style="width:53%; margin-left:0.5%;">
            <div class="row-fluid">
                @include('sweetalert::alert')
                <!-- block -->
                <div id="block_bg" class="block">
                    <div class="navbar navbar-inner block-header">
                        <div class="pull-right " style="padding-top:0%;">
                            <a href="/budget_codes" id="print" class="btn btn-success" style="font-family: all;">
                                <i class="icon-arrow-left">
                                </i><b><strong> {{ __('link.back') }}</strong></b></a>
                        </div>
                        <div class="alert alert-info">
                            <i class="icon-info-sign"></i><b><strong>{{ __('budget.acc_code_list') }} </strong></b>
                        </div>
                    </div>
                    <div class="block-content collapse in">
                        <div class="span16">
                            <form action="delete_users.php" method="post" autocomplete="off">
                                <table cellpadding="0" cellspacing="0" border="1" class="table" id="example">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>{{ __('payment.acc_name') }}</th>
                                            <th>{{ __('payment.acc_code') }}</th>
                                            <th>zerfe_id</th>
                                            <th>{{ __('link.zerfe') }} </th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($zerfe_acc_query as $zerfe_acc)
                                            <tr>
                                                <td> {{ $zerfe_acc->zerfe_account_id }} </td>
                                                <td> {{ $zerfe_acc->account_name }} </td>
                                                <td> {{ $zerfe_acc->account_code }} </td>
                                                <td> {{ $zerfe_acc->zerfe_id }} </td>
                                                <td> {{ $zerfe_acc->zerfe_name }} </td>
                                                <td width="70">
                                                    <p class="info"
                                                        style="width:0.3cm ;height:0.3cm;float:left;margin-right:0.8cm;">
                                                        <a href="{{ url('update_zerfe_account', $zerfe_acc->zerfe_account_id) }}"
                                                            data-toggle="modal" class="btn btn-success"
                                                            style="height:0.3cm;width:0.3cm;"><i
                                                                class="icon-pencil icon-small"></i></a>
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
    </div><br><br><br><br><br><br><br><br> @include('home_page.footer')@include('home_page.script') </body>

</html>
