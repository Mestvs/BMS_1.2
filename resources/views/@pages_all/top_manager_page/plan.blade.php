@include('header')

<body> @include('@pages_all.admin_page.navbar') <div class="row-fluid"> @include('@pages_all.top_manager_page.sidebar_plan')<div class="span8" id=""
            style="width:80%;margin-left:17%;">
            <div class="row-fluid">
                <!-- block -->
                <div id="block_bg" class="block">
                    <div class="navbar navbar-inner block-header">
                        <div class="alert alert-info">
                            <i class="icon-info-sign"></i><b><strong> {{ __('plan.plan_list') }} </strong></b>
                        </div>
                    </div>
                    <div class="block-content collapse in">
                        <table cellpadding="0" cellspacing="0" border="1" class="table" id="example">
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
                                    <th>Download</th>
                            </thead>
                            <tbody>
                                @foreach ($z_query as $z_query)
                                    <tr>
                                        <td width="30">
                                            <input id="optionsCheckbox" class="uniform_on" name="selector[]"
                                                type="checkbox" value="">
                                        </td>
                                        <td> {{ $z_query->zerfe_sent_id }} </td>
                                        <td> {{ $z_query->year }} </td>
                                        <td> {{ $z_query->plan_type }} </td>
                                        <td> {{ $z_query->description }} </td>
                                        <td> {{ $z_query->zerfe_name }}</td>
                                        <td> {{ $z_query->sent_date }} </td>
                                        <td> {{ $z_query->filename }}</td>
                                        <td> {{ $z_query->status }} </td>
                                        <td width="40">
                                            <a href="{{ url('l_download_file', $z_query->zerfe_sent_id) }}"
                                                data-toggle="modal" id="download" title="Download"
                                                class="btn btn-success"><i class="icon-download icon-small"></i></a>
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
    </div> @include('home_page.script')
    <!-- /tooltip -->
    <script type="text/javascript">
        $(document).ready(function() {
            $('#download').tooltip('show');
            $('#download').tooltip('hide');
        });
    </script>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    @include('home_page.footer')
