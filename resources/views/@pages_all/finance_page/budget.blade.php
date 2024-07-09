@include('header')

<body>@include('@pages_all.admin_page.navbar') <div class="row-fluid"> @include('@pages_all.finance_page.sidebar_budget') <?php
$Today = date('y:m:d');
?>
        <div class="span8" id="" style="width:80%;margin-left:16%;">
            <div class="row-fluid">
                <!-- block -->
                <div id="block_bg" class="block">
                    <div class="navbar navbar-inner block-header">
                        <div class="pull-right" style="padding-top:0%;">
                            <a href="/budget_category_select" id="print" class="btn btn-success"
                                style="font-family: all;">
                                <i class="icon-plus">
                                </i><b><strong> {{ __('budget.a_budget') }}</strong></b></a>
                            <a href="/budget_categorize" id="print" class="btn btn-success"
                                style="font-family: all;">
                                <i class=" fa fa-question-circle" style="margin-right:4px;">
                                </i><b><strong> {{ __('budget.categorize_b') }}</strong></b>
                            </a>
                        </diV>
                        <div class="alert alert-info" style="font-family: all; font-size:large;">
                            <i class="icon-info-sign"></i><b><strong>{{ __('budget.budgetlist') }}</strong></b>
                        </div>
                    </div>
                    <i class="icon-info-sig" style="margin-left: 35%; "></i><b><strong
                            style="font-size: large; ">{{ __('budget.n_year_total_amount') }}:
                            ${{ $total }}
                        </strong></b>
                    <i class="icon-info-sig" style="margin-left: 5%;"></i><b><strong style="font-size:medium ;">Date:
                    {{$Today}}</strong></b>
                    <div class="block-content collapse in">
                        <div class="span16">
                            <form action="delete_users.php" method="post" autocomplete="off">
                                <table cellpadding="0" cellspacing="0" border="1" class="table" id="example">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Id</th>
                                            <th>Year</th>
                                            <th>Amount</th>
                                            <th>Intial Date </th>
                                            <th>Final Date</th>
                                            <th>Description</th>
                                            <th>Zerfe</th>
                                            <th>Status</th>
                                            <th>Update</th>
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
                                                <td> {{ $budget->year }} </td>
                                                <td> {{ $budget->budget_amount }} </td>
                                                <td> {{ $budget->intial_date }}</td>
                                                <td> {{ $budget->final_date }}</td>
                                                <td> {{ $budget->budget_description }} </td>
                                                <td> {{ $budget->zerfe_name }} </td>
                                                <td> {{ $budget->status }}</td>
                                                <td width="70">
                                                    <a href="{{url('budget/update',$budget->budget_id)}}" data-toggle="modal"
                                                        class="btn btn-success"><i
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
    </div><br><br><br><br><br><br> @include('home_page.footer') @include('home_page.script') </body>

</html>
