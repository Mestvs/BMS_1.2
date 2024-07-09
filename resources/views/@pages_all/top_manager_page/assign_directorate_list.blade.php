<base href="/public">
@include('header')

<body> @include('@pages_all.admin_page.navbar') <div class="row-fluid"> @include('@pages_all.top_manager_page.sidebar_user') <div class="span3" id="adduser"
            style="position:sticky ;top:10%;margin-left:17%;width:20%;"> @include('@pages_all.top_manager_page.assign_as_D_form') </div>
        <div class="span6" id="" style="width:60%; margin-left:0.5%;">
            <div class="row-fluid">
                @include('sweetalert::alert')
                <!-- block -->
                <div id="block_bg" class="block">
                    <div class="navbar navbar-inner block-header">
                        <div class="pull-right " style="padding-top:0%;">
                            <a href="/assign_dept_select" id="print" class="btn btn-success"
                                style="font-family: all;">
                                <i class="icon-arrow-left">
                                </i><b><strong> {{ __('link.back') }}</strong></b></a>
                        </div>
                        <div class="alert alert-info" style="font-family: all;font-size:large;"><i
                                class="icon-info-sign"></i><b><strong>
                                    {{ __('link.userlist') }} </strong>
                            </b>
                        </div>
                    </div>
                    <div class="block-content collapse in">
                        <table cellpadding="0" cellspacing="0" border="1" class="table" id="example">
                            <thead>
                                <tr>
                                    <th>{{ __('link.fullname') }} </th>
                                    <th>{{ __('link.email') }} </th>
                                    <th> {{ __('link.usetype') }} </th>
                                    <th>{{ __('link.user_status') }}</th>
                                    <th>{{ __('link.acc_status') }}</th>
                                    <th>{{ __('budget.b_update') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- //this information is used to display the users in the database to assign them roles --}}
                                @foreach ($user_query as $user)
                                    <tr>
                                        <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                                        <td> {{ $user->email }} </td>
                                        <td> {{ $user->role }} </td>
                                        <td> {{ $user->user_status }} </td>
                                        <td> {{ $user->account_status }} </td>
                                        <td width="30">
                                            <a href="{{ route('top.assign.directorate.form', ['zid' => $zid, 'uid' => $user->id]) }}"
                                                data-toggle="modal" class="btn btn-success"
                                                style="height:0.3cm;width:0.3cm;"><i
                                                    class="icon-pencil icon-small"></i></a>
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
