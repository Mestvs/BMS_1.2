@include('header')

<body> @include('@pages_all.admin_page.navbar') <div class="row-fluid"> @include('@pages_all.admin_page.sidebar_user') <div class="span8" id=""
            style=" width:70%;margin-left:16%">
            <div class="row-fluid">
               
                <!-- block -->
                <div id="block_bg" class="block">
                    <div class="navbar navbar-inner block-header">
                        <div class="pull-right" style="padding-top:0%;">
                            <a href="/add_user" id="print" class="btn btn-success" style="font-family: all;">
                                <i class="icon-plus">
                                </i><b><strong> {{__('link.Add_Useradmin')}} </strong></b></a>
                        </diV>
                        <div class="alert alert-info" class="navbar navbar-inner block-header"
                            style="font-family: all; font-size: large; ">
                            <i class="icon-info-sign"></i><b><strong> {{__('link.Users_Listadmin')}}</strong></b>
                        </div>
                    </div>
                    <div class="block-content collapse in" style="font-size:medium;">
                        <table cellpadding="0" cellspacing="0" border="1" class="table" id="example">
                            <thead style="font-family: all;color: black;font-size:medium;">
                                <tr>
                                    <th></th>
                                    <th>{{__('link.fullname')}} </th>
                                    <th>{{__('link.email')}}</th>
                                    <th> {{__('link.usetype')}}</th>
                                    <th>{{__('link.acc_status')}}</th>
                                    <th>{{__('link.update')}}</th>
                                </tr>
                            </thead>
                            <tbody style="font-family: all;color: black;font-size:small;">
                                @foreach ($users as $user)
                                    <tr>
                                        <td width="30"><input id="optionsCheckbox" class="uniform_on"
                                                name="selector[]" type="checkbox" value="{{ $user->id }}">
                                        </td>
                                        <td> {{ $user->first_name }} {{ $user->last_name }}</td>
                                        <td> {{ $user->email }} </td>
                                        <td> {{ $user->role }} </td>
                                        <td> {{ $user->account_status }} </td>
                                        <td width="70">
                                            <a href="{{ url('update_user', $user->id) }}" data-toggle="modal"
                                                class="btn btn-success" style=" height:0.8em; width:0.8em;"><i
                                                    class="icon-pencil" style="text-align:center;"></i></a>
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
    </div><br><br><br><br><br><br><br><br><br><br><br><br>@include('home_page.script') @include('home_page.footer')
