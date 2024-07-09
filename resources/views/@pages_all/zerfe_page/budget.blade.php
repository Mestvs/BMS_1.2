@include('header')

<body> @include('@pages_all.admin_page.navbar') <div class="row-fluid">@include('@pages_all.zerfe_page.sidebar_budget') <div class="span8" id=""
            style="width:80%; margin-left:16%;">
            <div class="row-fluid">
                @foreach ($zerfe as $zerfe_name)
                @endforeach
                <!-- block -->
                <div id="block_bg" class="block">
                    <div class="navbar navbar-inner block-header">
                        <div class="pull-right" style="padding-top:0%;">
                            <a href="/z_budget_report" id="print" class="btn btn-success" style="font-family: all;">
                                <i class="icon-plus">
                                </i><b><strong>{{ __('budget.b_report') }}</strong></b></a>
                            <a href="/budget_request" id="print" class="btn btn-success" style="font-family: all;">
                                <i class=" fa fa-question-circle">
                                </i><b><strong> {{ __('budget.requestbudget') }} </strong></b></a>
                        </diV>
                        <div class="alert alert-info" style="font-family: all;font-size:large;">
                            <i class="icon-info-sign"></i><b><strong>{{ __('budget.budgetlist') }} </strong></b>
                        </div>
                    </div>
                    <i class="icon-info-sig" style="margin-left: 35%;"></i><b><strong style="">
                            {{ __('budget.n_year_total_amount') }}: $ {{ $total }}</strong></b>
                    <div class="block-content collapse in" style="font-size:large;">
                        <table cellpadding="0" cellspacing="0" border="1" class="table" id="example">
                            <thead style="font-family: all;color: black;font-size:medium;">
                                <tr>
                                    <th></th>
                                    <th>B_Id</th>
                                    <th>Year</th>
                                    <th>Amount</th>
                                    <th>Intial Date </th>
                                    <th>Final Date</th>
                                    <th>Description</th>
                                    <th>Zerfe</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody style="font-family: all;color: black;font-size:small;">

                                @foreach ($budget_query as $budget)
                                    <tr>
                                        <td width="30">
                                            <input id="optionsCheckbox" class="uniform_on" name="selector[]"
                                                type="checkbox" value="">
                                        </td>
                                        <td>{{ $budget->budget_id }} </td>
                                        <td>{{ $budget->year }} </td>
                                        <td>{{ $budget->budget_amount }} </td>
                                        <td>{{ $budget->intial_date }}</td>
                                        <td>{{ $budget->final_date }} </td>
                                        <td>{{ $budget->budget_description }} </td>
                                        <td> {{ $zerfe_name->zerfe_name }} </td>
                                        <td>{{ $budget->status }} </td>
                                        <td width="70">
                                            <a href="{{ route('zerfe.budget.detail', ['budget_id' => $budget->budget_id, 'direction' => 1]) }}"
                                                data-toggle="modal" class="btn btn-success"
                                                style="font-size:small ;width:0.7cm;height:0.5cm;"><i
                                                    class="icon-penci icon-small">Details</i></a>
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
    </div><br><br><br><br><br><br><br><br><br><br><br><br> @include('home_page.footer')@include('home_page.script') </body>

</html>
