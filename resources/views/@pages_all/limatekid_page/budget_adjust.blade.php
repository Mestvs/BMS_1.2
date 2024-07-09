<base href="/public">
@include('header')

<body> @include('@pages_all.admin_page.navbar') <div class="row-fluid"> @include('@pages_all.limatekid_page.sidebar_budget') <div class="span3" id="adduser"
            style="position:sticky;top:10%;width:25%;margin-left:16%;">
            @include('@pages_all.limatekid_page.budget_adjust_form') </div>
        <div class="span8" id="" style="margin-left:0.5%;width:58%;">
            <div class="row-fluid">
                @include('sweetalert::alert')
                <!-- block -->
                <div id="block_bg" class="block">
                    <div class="navbar navbar-inner block-header">
                        <div class="pull-right " style="padding-top:0%;">
                            <a href="/l_budget_category_select" id="print" class="btn btn-success"
                                style="font-family: all;">
                                <i class="icon-arrow-left">
                                </i><b><strong></i><b><strong>{{ __('link.back') }}</strong></b></a>
                        </div>
                        <div class="alert alert-info">
                            <i class="icon-info-sign"></i><b><strong>&nbsp;{{ __('budget.b_detail_list') }}</strong></b>
                        </div>
                    </div>
                    <i class="icon-info-sig" style="margin-left: 20%;"></i><b><strong>Available Amount:
                            ${{ $remain_amount }} </strong>
                    </b>
                    <i class="icon-info-sig" style="margin-left: 5%;"></i><b><strong
                            style="font-size:medium ;">Categorized:{{ $total }}</strong></b>
                    <i class="icon-info-sig" style="margin-left: 5%;"></i><b><strong style="font-size:medium ;">Remain:
                            {{ $remain }} </strong></b>
                    <div class="block-content collapse in">
                        <table cellpadding="0" cellspacing="0" border="1" class="table" id="example">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>ID</th>
                                    <th>{{ __('budget.budgetcategory') }}</th>
                                    <th>{{ __('payment.acc_name') }}</th>
                                    <th>{{ __('payment.acc_code') }}</th>
                                    <th>{{ __('budget.amounttitle') }}</th>
                                    <th>Transfer</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($budget_detail_query as $budget_detail)
                                    <tr>
                                        <td width="30"><input id="optionsCheckbox" class="uniform_on"
                                                name="selector[]" type="checkbox" value=""></td>
                                        <td>{{ $budget_detail->budget_detail_id }}</td>
                                        <td>{{ $category_code }}</td>
                                        <td>{{ $budget_detail->account_name }}</td>
                                        <td>{{ $budget_detail->account_code }}</td>
                                        <td>{{ $budget_detail->amount }}</td>
                                        <td width="40">
                                            <a href="{{ route('limatekid.budget.adjust', ['category' => $category, 'bd_id' => $budget_detail->budget_detail_id]) }}"
                                                data-toggle="modal" class="btn btn-success"><i
                                                    class="icon-exchange icon-small"></i></a>
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
    </div><br><br> @include('home_page.footer')@include('home_page.script') </body>

</html>
