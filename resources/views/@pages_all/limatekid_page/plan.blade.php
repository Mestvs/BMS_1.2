@include('header')

<body> @include('@pages_all.admin_page.navbar') <div class="row-fluid"> @include('@pages_all.limatekid_page.sidebar_plan') <div class="span8" id=""
            style="width:80%; margin-left: 16%;">
            <div class="row-fluid">
                <!-- block -->
                <div id="block_bg" class="block">
                    <div class="navbar navbar-inner block-header">
                        <div class="pull-right" style="padding-top:0%;">
                            <a href="/l_plan_prepare_form" id="print" class="btn btn-success"
                                style="font-family: all; ">
                                <i class="icon-plus">
                                </i><b><strong> {{ __('plan.s_plan') }}</strong></b></a>
                        </diV>
                        <div class="alert alert-info">
                            <i class="icon-info-sign"></i><b><strong> {{ __('plan.plan_list') }} </strong></b>
                        </div>
                    </div>
                    <div class="block-content collapse in">
                        <div class="span16">
                            <form action="delete_package.php" method="post" autocomplete="off">
                                <table cellpadding="0" cellspacing="0" border="1" class="table" id="example">
                                    <a data-toggle="modal" href="#plan_delete" id="delete" class="btn btn-danger"
                                        name=""><i
                                            class="icon-trash icon-small"></i></a>@include('@pages_all.limatekid_page.modal_delete') 
                                            <thead>
                                        <tr>
                                            <th></th>
                                            <th>Id</th>
                                            <th>Year</th>
                                            <th>Plan Type</th>
                                            <th>Description</th>
                                            <th>Zerfe </th>
                                            <th>Date</th>
                                            <th>filename</th>
                                            <th>Status</th>
                                            <th>Update</th>
                                    </thead>
                                    <tbody>
                                        {{-- //this query is used to display the plans subitted from the zerfs for approval and --}}
                                        @foreach ($z_plan_query as $z_plan)
                                            <tr>
                                                <td width="30">
                                                    <input id="optionsCheckbox" class="uniform_on" name="selector[]"
                                                        type="checkbox" value="">
                                                </td>
                                                <td> {{ $z_plan->zerfe_sent_id }} </td>
                                                <td>{{ $z_plan->year }} </td>
                                                <td> {{ $z_plan->plan_type }} </td>
                                                <td> {{ $z_plan->description }} </td>
                                                <td> {{ $z_plan->zerfe_name }} </td>
                                                <td> {{ $z_plan->sent_date }} </td>
                                                <td> {{ $z_plan->filename }} </td>
                                                <td> {{ $z_plan->status }} </td>
                                                <td width="70">
                                                    <a href="{{ url('l_plan_edit', $z_plan->zerfe_sent_id) }}"
                                                        data-toggle="modal" class="btn btn-success"><i
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
    </div><br><br><br><br><br><br><br><br><br><br> @include('home_page.footer')@include('home_page.script') </body>

</html>
