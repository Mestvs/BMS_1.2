<base href="/public">
@include('header')

<body> @include('@pages_all.admin_page.navbar')
    <div class="row-fluid"> @include('@pages_all.finance_manager_page.sidebar_budget')
        <div class="span3" id="adduser"style="width:20%;margin-left:16%;">@include('@pages_all.finance_manager_page.budget_request_approve_form')
        </div>
        <div class="span8" id="" style="width:60%; margin-left: 0.5%;">
            <div class="row-fluid">
                @include('sweetalert::alert')
                <!-- block -->
                <div id="block_bg" class="block">
                    <div class="navbar navbar-inner block-header">
                        <div class="pull-right " style="padding-top:0%;">
                            <a href="/budget_request_list" id="print" class="btn btn-success"
                                style="font-family: all;">
                                <i class="icon-arrow-left">
                                </i><b><strong></i><b><strong>{{ __('link.back') }}</strong></b></a>
                        </div>
                        <div class="alert alert-info">
                            <i class="icon-info-sign"></i><b><strong>{{ __('budget.b_request_list') }}</strong></b>
                        </div>
                    </div>
                    <div class="block-content collapse in">
                        <div class="span16">
                            <form action="delete_users.php" method="post" autocomplete="off">
                                <table cellpadding="0" cellspacing="0" border="1" class="table" id="example">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>R_Id</th>
                                            <th>Request Info</th>
                                            <th>Description</th>
                                            <th>zerfe</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($budget_request_query as $budget_request)
                                            <tr>
                                                <td width="30">
                                                    <input id="optionsCheckbox" class="uniform_on" name="selector[]"
                                                        type="checkbox" value="{{ $budget_request->b_request_id }}">
                                                </td>
                                                <td>{{ $budget_request->b_request_id }}</td>
                                                <td>
                                                    <p class="info">Payment
                                                        title:<b>{{ $budget_request->b_request_title }}</b>
                                                    </p>
                                                    <p class="info">Amount: <small
                                                            class="text-danger"><b>{{ $budget_request->b_request_amount }}</b></small>
                                                    </p>
                                                    <p class="info">
                                                        <small>Date:<b>{{ $budget_request->b_request_date }}</b></small>
                                                    </p>
                                                </td>
                                                <td>{{ $budget_request->description }}</td>
                                                <td>{{ $budget_request->zerfe_name }}</td>
                                                @if ( $budget_request->status=='Rejected')
                                                <td>
                                                    <p class="info"><small>Approval: <b
                                                                style="color:red;">{{ $budget_request->status }}</b></small>
                                                    </p>
                                                </td>
                                                @else
                                                <td>
                                                    <p class="info"><small>Approval: <b
                                                                style="color:rgb(11, 0, 128);">{{ $budget_request->status }}</b></small>
                                                    </p>
                                                </td>
                                                @endif
                                                
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
    </div><br><br><br><br> @include('home_page.footer') @include('home_page.script')
</body>

</html>
