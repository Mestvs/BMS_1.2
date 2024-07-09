@include('header')

<body> @include('@pages_all.admin_page.navbar') <div class="row-fluid">@include('@pages_all.top_manager_page.sidebar_user') <div class="span6" id="adduser"
            style="width:80%;margin-left:17%;padding-bottom:15%;">
            <div class="row-fluid">
                <div class="pull-right">
                </diV>
                @foreach ($zerfe_query1 as $zerfe_query1)
                @endforeach
                @foreach ($zerfe_query3 as $zerfe_query3)
                @endforeach
                @foreach ($zerfe_query2 as $zerfe_query2)
                @endforeach
                @foreach ($zerfe_query4 as $zerfe_query4)
                @endforeach
                <!-- block -->
                <div class="row-fluid">
                    <!-- block -->
                    <div class="block">
                        <div class="navbar navbar-inner block-header">
                            <div class="alert alert-info"><i class="icon-info-sign"></i>{{ __('link.d_selection_page') }}
                            </div>
                        </div>
                        <div class="block-content collapse in">
                            <div class="span12">
                                <form method="post" class="form-horizontal" autocomplete="off">
                                    <strong><b><i>
                                                <h4 style="color: black;font-family: all; text-align:center;">
                                                    {{ __('link.z_Bosit') }} </strong></b></i></b></strong></h4>
                                    <hr>
                                    <div class="navbar navbar-inner block-header"
                                        style="width:20%;float:left;margin-right:1%;">
                                        <div class="alert alert-info"
                                            style="background-color:blueviolet;font-family: all; font-size: large;"><i
                                                class="icon-info-sign"></i>{{ __('link.a_financeZ') }} </div>
                                        <a href="{{ url('assign_directorate_list', $zerfe_query1->zerfe_id) }}"
                                            id="print" class="btn btn-success" style="font-family: all;">
                                            <i class="icon-plus">
                                            </i><b><strong> {{ __('link.a_directorate') }}</strong></b></a>
                                    </div>
                                    <div class="navbar navbar-inner block-header"
                                        style="width:20%;float:left;margin-right:1%;">
                                        <div class="alert alert-info"
                                            style="background-color:blueviolet;font-family: all;font-size: large;"><i
                                                class="icon-info-sign"></i>{{ __('link.i_c_tZ') }} </div>
                                        <a href="{{ url('assign_directorate_list', $zerfe_query2->zerfe_id) }}"
                                            id="print" class="btn btn-success" style="font-family: all;"> <i
                                                class="icon-plus">
                                            </i><b><strong> {{ __('link.a_directorate') }}</strong></b></a>
                                    </div>
                                    <div class="navbar navbar-inner block-header"
                                        style="width:20%;float:left;margin-right:1%;">
                                        <div class="alert alert-info"
                                            style="background-color:blueviolet;font-family: all;font-size: large;"><i
                                                class="icon-info-sign"></i>{{ __('link.t_managementZ') }}</div>
                                        <a href="{{ url('assign_directorate_list', $zerfe_query3->zerfe_id) }}"
                                            id="print" class="btn btn-success" style="font-family: all;"> <i
                                                class="icon-plus">
                                            </i><b><strong> {{ __('link.a_directorate') }}</strong></b></a>
                                    </div>
                                    <div class="navbar navbar-inner block-header"
                                        style="width:20% ;float:left;margin-right:1%;">
                                        <div class="alert alert-info"
                                            style="background-color:blueviolet;;font-family: all;font-size: large;"><i
                                                class="icon-info-sign"></i>{{ __('link.s_&_technologyZ') }} </div>
                                        <a href="{{ url('assign_directorate_list', $zerfe_query4->zerfe_id) }}"
                                            id="print" class="btn btn-success" style="font-family: all;"> <i
                                                class="icon-plus">
                                            </i><b><strong>{{ __('link.a_directorate') }}</strong></b></a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><br> @include('home_page.footer')@include('home_page.script') </body>

</html>
