<base href="/public">
@include('header')
@include('@pages_all.admin_page.navbar')<div class="row-fluid"> @include('@pages_all.zerfe_page.sidebar_budget')<div class="span3" id="adduser">
    </div>
    <div class="span8" id="" style="margin-left:16%;width:80%;">
        <div class="row-fluid">
            @foreach ($zerfe_query as $acc_code)
                <?php
                $c_code = $acc_code->category_code;
                ?>
            @endforeach
            <!-- block -->
            <div id="block_bg" class="block">
                <div class="navbar navbar-inner block-header">
                    <div class="navbar navbar-inner block-header">
                        <div class="pull-right " style="padding-top:0%;">
                            @if ($direction == '1')
                                <a href="/z_budget" id="print" class="btn btn-success" style="font-family: all;">
                                    <i class="icon-arrow-left">
                                    </i><b><strong></i><b><strong>{{ __('link.back') }}</strong></b></a>
                            @elseif ($direction == '2')
                                <a href="/z_budget_report" id="print" class="btn btn-success"
                                    style="font-family: all;">
                                    <i class="icon-arrow-left">
                                    </i><b><strong></i><b><strong>{{ __('link.back') }}</strong></b></a>
                            @endif
                        </div>
                        <div class="alert alert-info" style="font-family: all; font-size:large;">
                            <i class="icon-info-sign"></i><b><strong>{{ __('budget.b_detail_list') }}</strong></b>
                        </div>
                    </div>
                    <i class="icon-info-sig" style="margin-left: 35%;"></i><b><strong style="font-size:large ;">Total
                            Amount:
                            ${{ $amount }} </strong>
                    </b>
                    <i class="icon-info-sig" style="margin-left: 5%;"></i><b><strong
                            style="font-size:medium ;">Categorized:
                            {{ $total }}</strong></b>
                    <div class="block-content collapse in" style="font-size:large ;">
                        <table cellpadding="0" cellspacing="0" border="1" class="table" id="example">
                            <thead style="font-family: all;color: black;font-size:medium;">
                                <tr>
                                    <th></th>
                                    <th>ID</th>
                                    <th>Budget_category</th>
                                    <th>Account Name</th>
                                    <th>Account Code</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            <tbody style="font-family: all;color: black;font-size:small;">

                                @foreach ($budget_detail_query as $budget_detail)
                                    <tr>
                                        <td width="30"><input id="optionsCheckbox" class="uniform_on"
                                                name="selector[]" type="checkbox"
                                                value="{{ $budget_detail->budget_detail_id }}"></td>
                                        <td>{{ $budget_detail->budget_detail_id }}</td>
                                        <td>{{ $c_code }}</td>
                                        <td>{{ $budget_detail->account_name }}</td>
                                        <td>{{ $budget_detail->account_code }}</td>
                                        <td>{{ $budget_detail->amount }}</td>
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
</div><br><br><br><br><br><br><br><br> @include('home_page.footer') @include('home_page.script')
</body>

</html>
