@include('header')

<body> @include('@pages_all.admin_page.navbar') <div class="row-fluid"> @include('@pages_all.top_manager_page.sidebar_budget') <div class="span6" id="adduser"
            style="width:83%;margin-left:17%;padding-bottom:15% ">
            <div class="row-fluid">
                <div class="pull-right">
                </diV>
                @include('sweetalert::alert')
                <!-- block -->
                <div class="row-fluid">
                    <!-- block -->
                    <div class="block">
                        <div class="navbar navbar-inner block-header">
                            <div class="alert alert-info"><i class="icon-info-sign"></i>
                                {{ __('budget.b_category_selection') }}</div>
                        </div>
                        <div class="block-content collapse in">
                            <div class="span12">
                                <form method="post" class="form-horizontal" autocomplete="off">
                                    <strong><b><i>
                                                <h4 style="color: black;font-family: all; text-align: center;">
                                                    <b><strong>{{ __('budget.BoSIT_depts') }} </strong></b>
                                            </i></b></strong></h4>
                                    <hr>
                                    <div class="navbar navbar-inner block-header"
                                        style="width:20%;float:left;margin-right:1%;">
                                        <div class="alert alert-info"
                                            style="background-color:blueviolet;font-family: all;font-size:large;"><i
                                                class="icon-info-sign"></i>{{ __('link.a_financeZ') }} </div>
                                        <a href="{{ route('top.budget.report', ['category' => $id1]) }}" id="print"
                                            class="btn btn-success" style="font-family: all;"> <i class="icon-plus">
                                            </i><b><strong>{{ __('budget.b_report') }}</strong></b></a>
                                    </div>
                                    <div class="navbar navbar-inner block-header"
                                        style="width:20%;float:left;margin-right:1%;">
                                        <div class="alert alert-info"
                                            style="background-color:blueviolet;font-family: all;font-size:large;"><i
                                                class="icon-info-sign"></i> {{ __('link.i_c_tZ') }}</div>
                                        <a href="{{ route('top.budget.report', ['category' => $id2]) }}" id="print"
                                            class="btn btn-success" style="font-family: all;"> <i class="icon-plus">
                                            </i><b><strong>{{ __('budget.b_report') }}</strong></b></a>
                                    </div>
                                    <div class="navbar navbar-inner block-header"
                                        style="width:20%;float:left;margin-right:1%;">
                                        <div class="alert alert-info"
                                            style="background-color:blueviolet;font-family: all;font-size:large;"><i
                                                class="icon-info-sign"></i>{{ __('link.t_managementZ') }}</div>
                                        <a href="{{ route('top.budget.report', ['category' => $id3]) }}" id="print"
                                            class="btn btn-success" style="font-family: all;"> <i class="icon-plus">
                                            </i><b><strong>{{ __('budget.b_report') }}</strong></b></a>
                                    </div>
                                    <div class="navbar navbar-inner block-header"
                                        style="width:20% ;float:left;margin-right:1%;">
                                        <div class="alert alert-info"
                                            style="background-color:blueviolet;;font-family: all;font-size:large;"><i
                                                class="icon-info-sign"></i>{{ __('link.s_&_technologyZ') }}</div>
                                        <a href="{{ route('top.budget.report', ['category' => $id4]) }}" id="print"
                                            class="btn btn-success" style="font-family: all;"> <i class="icon-plus">
                                            </i><b><strong> {{ __('budget.b_report') }}</strong></b></a>
                                    </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><br> @include('home_page.footer') @include('home_page.script')
