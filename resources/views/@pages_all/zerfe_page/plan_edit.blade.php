<base href="/public">
@include('header')

<body> @include('@pages_all.admin_page.navbar') <div class="row-fluid"> @include('@pages_all.zerfe_page.sidebar_plan') <div class="span3" id="adduser"
            style="width:19%; position:sticky;top:10%; margin-left:16%;">@include('@pages_all.zerfe_page.plan_edit_form')
        </div>
        <div class="span6" id="" style="margin-left:0.75%;width:63%;">
            <div class="row-fluid">
                @include('sweetalert::alert')
                <!-- block -->
                <div id="block_bg" class="block">
                    <div class="navbar navbar-inner block-header">
                        <div class="pull-right " style="padding-top:0%;">
                            <a href="/zerfe_plan" id="print" class="btn btn-success" style="font-family: all;">
                                <i class="icon-arrow-left">
                                </i><b><strong>{{ __('link.back') }} </strong></b></a>
                        </div>
                        <div class="alert alert-info" style="font-family: all; font-size: medium;"><i
                                class="icon-info-sign"></i><b><strong> {{ __('plan.plan_list') }}</strong></b></div>
                    </div>
                    <div class="block-content collapse in" style="font-size:medium;">
                        <table cellpadding="0" cellspacing="0" border="1" class="table" id="example">
                            <thead style="font-family: all;color: black; font-size:medium;">
                                <tr>
                                    <th>Id</th>
                                    <th>Year</th>
                                    <th>Plan Type </th>
                                    <th>Description</th>
                                    <th>Zerfe</th>
                                    <th>Directorate</th>
                                    <th>sent Date</th>
                                    <th>Filename</th>
                                    <th>Size</th>
                                    <th>Status</th>
                                    <th>sign</th>
                                </tr>
                            </thead>
                            <tbody style="font-family: all;color: black;font-size:small;">
                                @foreach ($plan_query as $plan)
                                    <tr>
                                        <td> {{ $plan->directorate_plan_id }} </td>
                                        <td> {{ $plan->year }} </td>
                                        <td> {{ $plan->plan_type }} </td>
                                        <td> {{ $plan->description }} </td>
                                        <td> {{ $plan->zerfe_name }} </td>
                                        <td> {{ $plan->directorate_name }} </td>
                                        <td> {{ $plan->prepared_date }} </td>
                                        <td> {{ $plan->filename }} <a
                                                href="{{ url('download_file', $plan->directorate_plan_id) }}"
                                                data-toggle="modal" title="Download" id="download"
                                                class="btn btn-success"><i class="icon-download icon-large "></i></a>
                                        </td>
                                        <td> {{ floor($plan->size / 1000) . 'KB' }} </td>
                                        <td> {{ $plan->status }} </td>
                                        <td width="40">
                                            <a href="{{ url('plan_edit', $plan->directorate_plan_id) }}"
                                                data-toggle="modal" class="btn btn-success"
                                                style="width:0.6cm;height:0.6cm;"><i>Sign</i></a>
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
    </div><br><br><br><br><br> @include('home_page.footer') @include('home_page.script')</body>
<!-- /tooltip -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#download').tooltip('show');
        $('#download').tooltip('hide');
    });
</script>

</html>
