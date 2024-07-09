@include('header')

<body>
    <script>
        function display_ct6() {
            var x = new Date()
            var ampm = x.getHours() >= 12 ? ' PM' : ' AM';
            hours = x.getHours() % 12;
            hours = hours ? hours : 12;
            var x1 = x.getMonth() + 1 + "/" + x.getDate() + "/" + x.getFullYear();
            x1 = x1 + " - " + hours + ":" + x.getMinutes() + ":" + x.getSeconds() + ":" + ampm;
            document.getElementById('ct6').innerHTML = x1;
            display_c6();
        }

        function display_c6() {
            var refresh = 1000; // Refresh rate in milli seconds
            mytime = setTimeout('display_ct6()', refresh)
        }
        display_c6()
    </script> @include('@pages_all.admin_page.navbar') <div class="row-fluid"> @include('@pages_all.finance_manager_page.sidebar_budget')
        <?php
        $Today = date('y:m:d');
        ?> <div class="span8" id="" style="width:80%;margin-left:16%;">
            <div class="row-fluid">
                <!-- block -->
                <div id="block_bg" class="block">
                    <div class="navbar navbar-inner block-header">
                        <div class="pull-right" style="padding-top:0%;">
                            <a href="/budget_request_list" id="print" class="btn btn-success"
                                style="font-family: all;">
                                <i class=" fa fa-question-circle" style="margin-right:4px;">
                                </i><b><strong> {{ __('budget.b_requests') }}</strong></b>
                                @if ($budget_request_query->count() == '0')
                                @else
                                    <span class="badge badge-important">{{ $budget_request_query->count() }}</span>
                            </a>
                            @endif
                            </a>
                        </diV>
                        <div class="alert alert-info">
                            <i class="icon-info-sign"></i><b><strong> {{ __('budget.budgetlist') }}</strong></b>
                        </div>
                    </div>
                    <i class="icon-info-sig"
                        style="margin-left: 35%;"></i><b><strong>{{ __('budget.n_year_total_amount') }}:
                            ${{ $total }}</strong></b>
                    <span style=" margin-left: 4%; width:30%; background-color:dodgerblue ;">Date:</span>
                    <span id='ct6' style="background-color:goldenrod ; width:30%;"></span>
                    <div class="block-content collapse in">
                        <div class="span16">
                            <form action="delete_users.php" method="post" autocomplete="off">
                                <table cellpadding="0" cellspacing="0" border="1" class="table" id="example">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Id</th>
                                            <th>Amount</th>
                                            <th>Intial Date </th>
                                            <th>Final Date</th>
                                            <th>Description</th>
                                            <th>Zerfe</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($budget_query as $budget)
                                            <tr>
                                                <td width="30">
                                                    <input id="optionsCheckbox" class="uniform_on" name="selector[]"
                                                        type="checkbox" value="{{ $budget->budget_id }}">
                                                </td>
                                                <td>{{ $budget->budget_id }} </td>
                                                <td>{{ $budget->budget_amount }} </td>
                                                <td>{{ $budget->intial_date }} </td>
                                                <td>{{ $budget->final_date }} </td>
                                                <td>{{ $budget->budget_description }} </td>
                                                <td>{{ $budget->zerfe_name }} </td>
                                                <td>{{ $budget->status }} </td>
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
    </div><br><br><br><br><br><br><br> @include('home_page.footer') @include('home_page.script')
</body>

</html>
