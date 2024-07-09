@include('header')

<body>@include('@pages_all.admin_page.navbar')
    <div class="row-fluid">@include('@pages_all.zerfe_page.sidebar_plan')
        <div class="span6" id=""style="margin-left:16%;width:75%;">
            <div class="row-fluid">
                <!-- block -->
                <div id="block_bg" class="block">
                    <div class="navbar navbar-inner block-header">
                        <div class="pull-right " style="padding-top:0%;">
                            <a href="/zerfe_plan" id="print" class="btn btn-success" style="font-family: all;">
                                <i class="icon-arrow-left">
                                </i><b><strong></i><b><strong>{{ __('link.back') }}</strong></b></a>
                        </div>
                        <div class="alert alert-info" style="font-family: all;font-size:large;"><i
                                class="icon-info-sign"></i><b><strong>
                                    {{ __('plan.plan_list') }}</strong></b></div>
                    </div>
                    <div class="block-content collapse in" style="font-size:large ;">
                        <div class="span12">
                            <form action="delete_users.php" method="post" enctype="multipart/form-data">
                                <table cellpadding="0" cellspacing="0" border="1" class="table" id="example">
                                    <thead style="font-family: all;color: black; font-size:medium;">
                                        <tr>
                                            <th></th>
                                            <th>Id</th>
                                            <th>Year</th>
                                            <th>Plan Type </th>
                                            <th>Description </th>
                                            <th>sent Date</th>
                                            <th>Filename</th>
                                            <th>Size</th>
                                            <th>Status</th>
                                            <th>Download</th>
                                        </tr>
                                    </thead>
                                    <tbody style="font-family: all;color: black;font-size:small;"> 
                                      @foreach ($plans as $plan)
                                            <tr>
                                                <td width="30">
                                                    <input id="optionsCheckbox" class="uniform_on" name="selector[]"
                                                        type="checkbox" value="{{ $plan->plan_id }}">
                                                </td>
                                                <td>{{ $plan->plan_id }} </td>
                                                <td> {{ $plan->year }} </td>
                                                <td> {{ $plan->plan_type }} </td>
                                                <td> {{ $plan->description }} </td>
                                                <td> {{ $plan->sent_date }} </td>
                                                <td> {{ $plan->filename }}</td>
                                                <td> {{ floor($plan->size / 1000) . 'KB' }} </td>
                                                <td> {{ $plan->status }} </td>
                                                <td><a href="{{ url('download_annual_file', $plan->plan_id) }}"
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
    </div><br><br><br><br><br><br><br><br><br> <br><br><br><br>  @include('home_page.footer') @include('home_page.script')
</body>
<!-- /tooltip -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#download').tooltip('show');
        $('#download').tooltip('hide');
    });
</script>

</html>
