@include('header')

<body style=" overflow:hidden ; position:fixed; width: 100%; height: 100%;"> @include('@pages_all.admin_page.navbar') <div
        class="row-fluid"> @include('@pages_all.finance_page.sidebar_budget') <div class="span8" id=""
            style=" width:70%;margin-left:16%">
            <div class="row-fluid">
                <!-- block -->
                <div id="block_bg" class="block">
                    <div class="navbar navbar-inner block-header">

                        <div class="alert alert-info" class="navbar navbar-inner block-header">
                            <i class="icon-info-sign"></i><b><strong> New Budget List </strong></b>
                        </div>
                    </div>
                    <div class="block-content collapse in">
                        <table cellpadding="0" cellspacing="0" border="1" class="table" id="example">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th> ID </th>
                                    <th>Year</th>
                                    <th>Amount </th>
                                    <th>Description </th>
                                    <th>Budget Category</th>
                                    <th>zerfe Name </th>
                                    <th> Status </th>
                                    <th> Update </th>
                                    <th>  Categorize </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($budgets as $budget)
                                    <tr>
                                        <td width="30"><input id="optionsCheckbox" class="uniform_on"
                                                name="selector[]" type="checkbox" value="{{ $budget->budget_id }}">
                                        </td>
                                        <td> {{ $budget->budget_id }} </td>
                                        <td> {{ $budget->year }} </td>
                                        <td> {{ $budget->budget_amount }} </td>
                                        <td> {{ $budget->budget_description }} </td>
                                        <td> {{ $budget->category_code }} </td>
                                        <td> {{ $budget->zerfe_name }} </td>
                                        <td> {{ $budget->status }} </td>
                                        <td width="70">
                                            <a href="{{ url('budget_categorize_update_form', $budget->budget_id) }}"
                                                data-toggle="modal" class="btn btn-success"
                                                style=" height:0.8em; width:0.8em;"><i class="icon-pencil"
                                                    style="text-align:center;"></i></a>
                                        </td>
                                        <td width="70">
                                            <a href="{{ url('categorize_budget', $budget->budget_id) }}"
                                                data-toggle="modal" class="btn btn-success"
                                                style=" height:0.8em; width:0.8em;"><i class="icon-list-alt"
                                                    style="text-align:center;"></i></a>
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
    </div><br><br><br><br><br><br><br> @include('home_page.footer') @include('home_page.script')</body>

</html>
