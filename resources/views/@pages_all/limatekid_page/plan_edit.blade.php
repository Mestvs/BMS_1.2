<base href="/public">
@include('header')

<body> @include('@pages_all.admin_page.navbar')
    <div class="row-fluid"> @include('@pages_all.limatekid_page.sidebar_plan')
        <div class="span3" id="adduser"style="width:19.3%; position:sticky;top:10%; margin-left:16%;">
            @include('@pages_all.limatekid_page.plan_edit_form')
        </div>
        <div class="span6" id="" style="margin-left:0.5%;width:64%;">
            <div class="row-fluid">
                @include('sweetalert::alert')
                <!-- block -->
                <div id="block_bg" class="block">
                    <div class="navbar navbar-inner block-header">
                        <div class="pull-right " style="padding-top:0%;">
                            <a href="/limatekid_plan" id="print" class="btn btn-success" style="font-family: all;">
                                <i class="icon-arrow-left">
                                </i><b><strong>{{ __('link.back') }} </strong></b></a>
                        </div>
                        <div class="alert alert-info"><i class="icon-info-sign"></i><b><strong>
                                    {{ __('plan.plan_list') }}</strong></b></div>
                    </div>
                    <div class="block-content collapse in">
                        <div class="span12">
                            <form action="delete_users.php" method="post" enctype="multipart/form-data">
                                <table cellpadding="0" cellspacing="0" border="1" class="table" id="example">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Year</th>
                                            <th>Plan Type</th>
                                            <th>Description </th>
                                            <th>Zerfe</th>
                                            <th>sent Date</th>
                                            <th>Filename</th>
                                            <th>Size</th>
                                            <th>Status</th>
                                            <th>Approve</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($z_plan_query as $z_plan)
                                            <tr>
                                                <td> {{ $z_plan->zerfe_sent_id }} </td>
                                                <td>{{ $z_plan->year }} </td>
                                                <td> {{ $z_plan->plan_type }} </td>
                                                <td> {{ $z_plan->description }} </td>
                                                <td> {{ $z_plan->zerfe_name }} </td>
                                                <td> {{ $z_plan->sent_date }} </td>
                                                <td>{{ $z_plan->filename }}<a
                                                        href="{{ url('l_download_file', $z_plan->zerfe_sent_id) }}"
                                                        data-toggle="modal" id="download" title="Download"
                                                        class="btn btn-success"><i class="icon-download"></i></a></td>
                                                <td>{{ floor($z_plan->size / 1000) . 'KB' }} </td>
                                                <td>{{ $z_plan->status }}</td>
                                                <td width="40">
                                                    <a href="{{ url('l_plan_edit', $z_plan->zerfe_sent_id) }}"
                                                        data-toggle="modal" class="btn btn-success"><i
                                                            class="icon-pencil icon-small">Sign</i></a>
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
    </div><br><br><br><br><br><br> @include('home_page.footer') @include('home_page.script')
</body>
<!-- /tooltip -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#download').tooltip('show');
        $('#download').tooltip('hide');
    });
</script>

</html>
