@include('header')

<body> @include('@pages_all.admin_page.navbar')
    <div class="row-fluid"> @include('@pages_all.directorate_page.sidebar_plan')
        <div class="span6" style="margin-left:16%;width:75%;">
            <div class="row-fluid">
                <!-- block -->
                <div id="block_bg" class="block">
                    <div class="navbar navbar-inner block-header">
                        <div class="pull-right" style="padding-top:0%;">
                            <a href="/directorate_plan" id="print" class="btn btn-success" style="font-family: all;">
                                <i
                                    class="icon-arrow-left"></i><b><strong></i><b><strong>{{ __('link.back') }}</strong></b></a>
                        </div>
                        <div class="alert alert-info"><i
                                class="icon-info-sign"></i><b><strong>{{ __('plan.plan_list') }}</strong></b></div>
                    </div>
                    <div class="block-content collapse in">
                        <div class="span12">
                            <form action="#" method="post" enctype="multipart/form-data">
                                <table cellpadding="0" cellspacing="0" border="1" class="table" id="example">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Year</th>
                                            <th>Plan Type </th>
                                            <th>Description </th>
                                            <th>Zerfe </th>
                                            <th>sent Date</th>
                                            <th>Filename</th>
                                            <th>Size</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($zerfe_Plan_query as $zerfe_Plan)
                                            <tr>
                                                <td> {{ $zerfe_Plan->zerfe_plan_id }} </td>
                                                <td> {{ $zerfe_Plan->year }} </td>
                                                <td> {{ $zerfe_Plan->plan_type }}</td>
                                                <td> {{ $zerfe_Plan->description }} </td>
                                                <td> {{ $zerfe_Plan->zerfe_name }} </td>
                                                <td> {{ $zerfe_Plan->date }}</td>
                                                <td> {{ $zerfe_Plan->filename }} </td>
                                                <td> {{ floor($zerfe_Plan->size / 1000) . 'KB' }} </td>
                                                <td> {{ $zerfe_Plan->status }} </td>
                                                <td><a href="{{ url('d_download_annual_file', $zerfe_Plan->zerfe_plan_id) }}"
                                                        data-toggle="modal" id="download" title="Download"
                                                        class="btn btn-success"><i class="icon-download"></i></a></td>
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
    </div><br><br><br><br><br><br> <br><br> <br><br>@include('home_page.script')
    <!-- /tooltip -->
    <script type="text/javascript">
        $(document).ready(function() {
            $('#download').tooltip('show');
            $('#download').tooltip('hide');
        });
    </script>
    @include('home_page.footer')
