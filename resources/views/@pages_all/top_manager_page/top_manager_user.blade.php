@include('header')

<body> @include('@pages_all.admin_page.navbar') <div class="row-fluid"> @include('@pages_all.top_manager_page.sidebar_user')<div class="span8" id=""
            style="width:80%;margin-left:17%;">
            <div class="row-fluid">
                <!-- block -->
                <div id="block_bg" class="block">
                    <div class="navbar navbar-inner block-header">
                        <div class="pull-right " style="padding-top:0%;">
                            <a href="/assign_zerfe_list" id="print" class="btn btn-success"
                                style="font-family: all;">
                                <i class="icon-plus">
                                </i><b><strong>{{ __('link.a_heads') }} </strong></b></a>
                            <a href="/assign_dept_select" id="print" class="btn btn-success"
                                style="font-family: all;">
                                <i class="icon-plus">
                                </i><b><strong>{{ __('link.a_directorate') }} </strong></b></a>
                        </div>
                        <div class="alert alert-info" style="font-family: all; font-size:large;">
                            <i class="icon-info-sign"></i><b><strong>{{ __('link.userlist') }} </strong></b>
                        </div>
                    </div>
                    <div class="block-content collapse in">
                        <table cellpadding="0" cellspacing="0" border="1" class="table" id="example">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>{{ __('link.fullname') }} </th>
                                    <th>{{ __('link.email') }} </th>
                                    <th>{{ __('link.usetype') }} </th>
                                    <th>{{ __('link.directorate') }} </th>
                                    <th>{{ __('link.zerfe') }} </th>
                                    <th>{{ __('link.user_status') }}</th>
                                    <th>{{ __('link.acc_status') }}</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($user_query as $user)
                                    <tr>
                                        <td width="30">
                                            <input id="optionsCheckbox" class="uniform_on" name="selector[]"
                                                type="checkbox" value="">
                                        </td>
                                        <td> {{ $user->first_name }} {{ $user->last_name }} </td>
                                        <td> {{ $user->email }} </td>
                                        <td> {{ $user->role }} </td>
                                        <td>{{ $user->directorate_name }} </td>
                                        <td> {{ $user->zerfe_name }} </td>
                                        <td> {{ $user->user_status }} </td>
                                        <td> {{ $user->account_status }} </td>
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
    </div><br><br><br><br><br><br><br>@include('home_page.footer') @include('home_page.script')
