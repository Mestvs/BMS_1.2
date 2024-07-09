@include('header')

<body> @include('@pages_all.admin_page.navbar') <div class="row-fluid"> @include('@pages_all.finance_manager_page.sidebar_budget') <div class="pull-right"
            style="margin-top:30px;">
        </diV>
        <div class="span8" style="width:80%;margin-left:16%;">
            <div class="row-fluid">
                <!-- block -->
                <div id="block_bg" class="block">
                    <div class="navbar navbar-inner block-header">
                        <div class="pull-right " style="padding-top:0%;">
                            <a href="/fm_budget" id="print" class="btn btn-success" style="font-family: all;">
                                <i class="icon-arrow-left">
                                </i><b><strong></i><b><strong>{{ __('link.back') }}</strong></b></a>
                        </div>
                        <div class="alert alert-info">
                            <i class="icon-info-sign"></i><b><strong> {{ __('budget.b_request_list') }}</strong></b>
                        </div>
                    </div>
                    <div class="block-content collapse in">

                        <table cellpadding="0" cellspacing="0" border="1" class="table" id="example">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>R_Id</th>
                                    <th>Request Info</th>
                                    <th>Description</th>
                                    <th>Zerfe</th>
                                    <th>Status</th>
                                    <th>Approve</th>
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
                                                <p class="info">Payment title:
                                                    <b>{{ $budget_request->b_request_title }}</b>
                                                </p>
                                                <p class="info">Amount: <small
                                                        class="text-danger"><b>{{ $budget_request->b_request_amount }}</b></small>
                                                </p>
                                                <p class="info"><small>Date:
                                                        <b>{{ $budget_request->b_request_date }}</b></small></p>
                                            </td>
                                            <td>{{ $budget_request->description }}</td>
                                            <td>{{ $budget_request->zerfe_name }}</td>
                                            @if ($budget_request->status == 'Rejected')
                                            <td>
                                                <p class="info"><small>Approval: <b
                                                            style="color:red;">{{ $budget_request->status }}</b></small>
                                                            <a
                                                        href="{{ url('approval_info', $budget_request->b_request_id) }}"
                                                        data-toggle="modal" class="btn btn-success"><i></i>details</a>
                                                </p>
                                            </td>
                                            @elseif ($budget_request->status == 'Pending')
                                            <td>
                                                <p class="info"><small>Approval: <b
                                                            style="color:green">{{ $budget_request->status }}</b></small>
                                                </p>
                                            </td>
                                            @else
                                            <td>
                                                <p class="info"><small>Approval: <b
                                                            style="color:rgb(11, 0, 128);">{{ $budget_request->status }}&nbsp;</b></small><a
                                                        href="{{ url('approval_info', $budget_request->b_request_id) }}"
                                                        data-toggle="modal" class="btn btn-success"><i></i>details</a>
                                                </p>
                                            </td>
                                            @endif
                                            <td width="70">
                                                <a href="{{ url('budget_approve', $budget_request->b_request_id) }}"
                                                    data-toggle="modal" class="btn btn-success"><i
                                                        class="icon-pencil icon-small"></i></a>
                                            </td>
                                        </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                @include('@pages_all.finance_manager_page.budget_approve_detail')
                @if (session('back') == 'true')
                    <script>
                        document.getElementById("login").style.display = "block";
                    </script>
                @else
                @endif
                <!-- /block -->
            </div>
        </div>
    </div>
    </div><br><br><br><br><br><br><br>


    <!-- jQuery --> @include('home_page.footer')@include('home_page.script')
</body>

</html>
