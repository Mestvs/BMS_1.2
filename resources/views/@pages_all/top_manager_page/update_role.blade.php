<base href="/public">
@include('header')

<body> @include('@pages_all.admin_page.navbar')<div class="row-fluid"> @include('@pages_all.top_manager_page.sidebar_roles') <div class="span3" id="adduser"
            style="width:20%;margin-left:17%; position:stiky;top:10%;margin-bottom:7%;"> @include('@pages_all.top_manager_page.update_role_form')
        </div>
        <div class="span8" id="" style="width:60%;margin-left:0.5%;">
            <div class="row-fluid">
                @include('sweetalert::alert')
                <!-- block -->
                <div id="block_bg" class="block">
                    <div class="navbar navbar-inner block-header">
                        <div class="pull-right " style="padding-top:0%;">
                            <a href="/roles" id="print" class="btn btn-success" style="font-family: all;">
                                <i class="icon-arrow-left">
                                </i><b><strong> {{ __('link.back') }}</strong></b></a>
                        </div>
                        <div class="alert alert-info">
                            <i class="icon-info-sign"></i><b><strong> {{ __('link.role_list') }} </strong></b>
                        </div>
                    </div>
                    <div class="block-content collapse in">
                        <table cellpadding="0" cellspacing="0" border="1" class="table" id="example">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>ID </th>
                                    <th> {{ __('link.role_name') }} </th>
                                    <th> zerfe id </th>
                                    <th> Update</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $role)
                                    <tr>
                                        <td width="30">
                                            <input id="optionsCheckbox" class="uniform_on" name="selector[]"
                                                type="checkbox" value="">
                                        </td>
                                        <td> {{ $role->directorate_id }} </td>
                                        <td> {{ $role->directorate_name }}</td>
                                        <td> {{ $role->zerfe_id }} </td>
                                        <td width="50">
                                            <p class="info"
                                                style="width:0.3cm ;height:0.3cm;float:left;margin-right:0.8cm;">
                                                <a href="{{ url('update_role', $role->directorate_id) }}"
                                                    data-toggle="modal" class="btn btn-success"
                                                    style="height:0.3cm;width:0.3cm;"><i
                                                        class="icon-pencil icon-small"></i></a>
                                            </p>
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
    </div><br><br><br><br><br><br><br><br> @include('home_page.footer') @include('home_page.script') </body>

</html>
