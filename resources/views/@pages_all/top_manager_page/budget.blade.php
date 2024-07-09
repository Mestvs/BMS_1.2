@include('header')

<body> @include('@pages_all.admin_page.navbar') <div class="row-fluid">@include('@pages_all.top_manager_page.sidebar_budget')
        <?php $total = 0;
        $Today = date('y:m:d'); ?>
        @foreach ($budget_query as $row)
            <?php $total = $total + $row->budget_amount; ?>
        @endforeach
        <div class="span8" id="" style="width:80%;margin-left:17%;">
            <div class="row-fluid">
                <!-- block -->
                <div id="block_bg" class="block">
                    <div class="navbar navbar-inner block-header">
                        <div class="pull-right" style="padding-top:0%;">
                            <a href="/t_budget_category_select" id="print" class="btn btn-success"
                                style="font-family: all;">
                                <i class="icon-plus">
                                </i><b><strong>{{ __('budget.b_report') }}</strong></b></a>
                        </div>
                        <div class="alert alert-info" style="font-family: all;font-size:large;">
                            <i class="icon-info-sign"></i><b><strong>{{ __('budget.budgetlist') }} </strong></b>
                        </div>
                    </div>
                    <i class="icon-info-sig"
                        style="margin-left: 35%;"></i><b><strong>{{ __('budget.n_year_total_amount') }}: $
                            {{ $total }} </strong></b>
                    <i class="icon-info-sig" style="margin-left: 5%;"></i><b><strong style="font-size:medium ;">Date:
                            {{ $Today }}</strong></b>
                    <div class="block-content collapse in">
                        <table cellpadding="0" cellspacing="0" border="1" class="table" id="example">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>B_Id</th>
                                    <th>Amount</th>
                                    <th>year</th>
                                    <th>Intial Date </th>
                                    <th>Final Date</th>
                                    <th>Description</th>
                                    <th>zerfe</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($budget_query as $budget)
                                    <tr>
                                        <td width="30">
                                            <input id="optionsCheckbox" class="uniform_on" name="selector[]"
                                                type="checkbox" value="">
                                        </td>
                                        <td>{{ $budget->budget_id }} </td>
                                        <td>{{ $budget->year }} </td>
                                        <td>{{ $budget->budget_amount }} </td>
                                        <td>{{ $budget->intial_date }} </td>
                                        <td>{{ $budget->final_date }} </td>
                                        <td>{{ $budget->budget_description }} </td>
                                        <td>{{ $budget->zerfe_name }} </td>
                                        <td>{{ $budget->status }}</td>
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
    </div><br><br><br><br><br><br><br><br><br><br><br><br><br><br> @include('home_page.footer')
    @include('home_page.script') </body>
