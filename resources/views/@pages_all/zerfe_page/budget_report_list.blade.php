@include('header')
@foreach ($zerfe as $zerfe_name)
    <?php
    $z_name = $zerfe_name->zerfe_name;
    ?>
@endforeach
<?php
if ($z_name = 'ICT') {
    $Dept = __('link.i_c_tZ');
} elseif ($z_name = 'Top_Management') {
    $Dept = __('link.t_managementZ');
} elseif ($z_name = 'Admin_&_Finance') {
    $Dept = __('link.a_financeZ');
} else {
    $Dept = __('link.s_&_technologyZ');
}
?> @include('@pages_all.admin_page.navbar') <div class="row-fluid"> @include('@pages_all.zerfe_page.sidebar_budget') <div
        class="pull-right" style="margin-top:2%;">
    </diV>
    <div class="span8" id="" style="width:80%;margin-left:16%">
        <div class="row-fluid">
            
            <!-- begin -->
            <form action="{{ url('z_budget_report') }}" method="post" class="form-horizontal"
                enctype="multipart/form-data" autocomplete="off">
                @csrf
                <div
                    style="border-color:black; border-style: solid; width:40% ;margin-top:3%; padding-bottom:3% ;padding-top:1% ;">
                    <div class="control-group" style="float:left; width:35%;margin-right:5%;">
                        <div class="controls" style="margin-left:0%;width:100%;">
                            <select name="years" class="chzn-select" required>
                                <option></option>
                                @foreach ($year_query as $query)
                                    <option value="{{ $query->year }}">{{ $query->year }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="control-group" style="float:left; width:40%;margin-left:10%;">
                        <div class="controls" style="margin-left:5%;width:100%;">
                            <button name="report" id="print" class="btn btn-success" style="font-family: all;">
                                <i class="icon-plus">
                                </i><b><strong>{{ __('budget.b_report') }} </strong></b></button>
                        </div>
                    </div>
                </div>
            </form>
            <!--end-->
            @if (isset($_POST['report']))<?php
            $year = $_POST['years'];
            
            ?> <div id="block_bg"
                    class="block" style="clear: both;">
                    <div class="navbar navbar-inner block-header">
                        <div class="navbar navbar-inner block-header">
                            <div class="pull-right " style="padding-top:0%;">
                                <a href="/z_budget" id="print" class="btn btn-success" style="font-family: all;">
                                    <i class="icon-arrow-left">
                                    </i><b><strong></i><b><strong>{{ __('link.back') }}</strong></b></a>
                            </div>
                            <div class="alert alert-info" style="font-family: all;font-size:large;">
                                <i class="icon-info-sign"></i><b><strong>&nbsp;{{ $year }}&nbsp;{{ $Dept }}
                                        &nbsp;{{ __('budget.b_report') }}</strong></b>
                            </div>
                        </div>
                        <!--begin-->
                        <div class="control-group"
                            style="border-color:green; padding-top:0%; padding-bottom:0%; border-style: solid; width:45% ;margin-left:2%;float:left;">
                            <div style="display:grid; width: 100%;">
                                <i class="icon-info-sign" style="margin-left: 3%;margin-top: 1.5%; ">Total Annual
                                    amount:$<b><strong style="">{{ $total }} </strong></b></i>
                                <i class="icon-info-sign" style="margin-left: 3%;margin-top: 1.5%;">Amount used:
                                    $<b><strong style="">{{ $used }} </strong></b></i>
                                <i class="icon-info-sign" style="margin-left: 3%;margin-top: 1.5%;">Amount Remains:
                                    $<b><strong style=""> {{ $remain }} </strong></b></i>
                            </div>
                        </div>
                        <div class="control-group"
                            style="border-color:green;  padding-top:0%; border-style: solid; width:45% ;margin-left:2%;float:left; ">
                            <div style="display:grid; width: 100%;">
                                <i class="icon-info-sign" style="margin-left: 3%;margin-top: 1.5%;">Total Annual
                                    percent:<b><strong>{{ $annual_percent }}% </strong></b></i>
                                <i class="icon-info-sign" style="margin-left: 3%;margin-top: 1.5%;">Percent
                                    used:<b><strong style=" ">{{ $percent_used }} </strong>%</b></i>
                                <i class="icon-info-sign" style="margin-left: 3%;margin-top: 1.5%;">Percent
                                    remains:<b><strong style=" ">{{ $percent_remains }}% </strong></b></i>
                            </div>
                        </div>
                        <!--end-->
                        <div class="block-content collapse in" style="clear:both ;font-size:large;">
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
                                                    type="checkbox" value="{{ $budget->budget_id }}">
                                            </td>
                                            <td> {{ $budget->budget_id }} </td>
                                            <td> {{ $budget->year }} </td>
                                            <td> {{ $budget->budget_amount }} </td>
                                            <td> {{ $budget->intial_date }} </td>
                                            <td> {{ $budget->final_date }} </td>
                                            <td> {{ $budget->budget_description }} </td>
                                            <td> {{ $z_name }}</td>
                                            <td> {{ $budget->status }} </td>
                                            <td width="70">
                                                <a href="{{ route('zerfe.budget.detail', ['budget_id' => $budget->budget_id, 'direction' => 2]) }}"
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
                @else<div id="block_bg" class="block">
                        <div class="navbar navbar-inner block-header">
                            <div class="alert alert-info" style="font-family: all;font-size:large;">
                                <i class="icon-info-sign"></i><b><strong>{{ __('budget.b_report') }} </strong></b>
                            </div>
                        </div>
                        <!--begin-->
                        <div class="control-group"
                            style="border-color:green; padding-top:0%; padding-bottom:1%; border-style: solid; width:45% ;margin-left:2%;float:left;">
                            <div style="display:none; width: 100%;">
                            </div>
                        </div>
                        <div class="control-group"
                            style="border-color:green;  padding-top:0%; padding-bottom:1%; border-style: solid; width:45% ;margin-left:2%;float:left; ">
                            <div style="display:none; width: 100%;">
                            </div>
                        </div>
                        <!--end-->
                        <div class="block-content collapse in" style="clear:both ;font-size:large;">
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
                                    @foreach ($invalid_budget_query as $invalid_budget)
                                        <tr>
                                            <td width="30">
                                                <input id="optionsCheckbox" class="uniform_on" name="selector[]"
                                                    type="checkbox" value="">
                                            </td>
                                            <td> {{ $invalid_budget->budget_id }} </td>
                                            <td>{{ $invalid_budget->year }} </td>
                                            <td>{{ $invalid_budget->budget_amount }} </td>
                                            <td>{{ $invalid_budget->intial_date }} </td>
                                            <td>{{ $invalid_budget->final_date }} </td>
                                            <td> {{ $invalid_budget->budget_description }} </td>
                                            <td></td>
                                            <td>{{ $invalid_budget->status }} </td>
                                            <td width="70">
                                                <a href="" data-toggle="modal" class="btn btn-success"><i
                                                        class="icon-pencil icon-large">Details</i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
            @endif
            <!-- /block -->
        </div>
    </div>
</div>
</div><br><br><br><br><br><br><br>
@include('home_page.footer') @include('home_page.script')</body>

</html>
