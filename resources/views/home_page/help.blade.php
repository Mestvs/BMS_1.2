@include('header')
<body id="homepage" style="background-color: currentColor no-repeat center center fixed;">
    <div class="navbar navbar-fixed-top navbar-inverse">
        <div class="navbar-inner">
            <div class="container-fluid" style="background-color:rgb(0, 160, 230);">
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span>
                    <span class="icon-bar"></span><span class="icon-bar"></span></a>
                <a class="brand"href="#"style="margin-left: 35%"><b style="font-family: all;font-size: 25px;">
                        {{ __('link.abouttile') }} </b> </a>
                <div class="nav-collapse collapse">
                    <ul class="nav pull-right">
                    </ul>
                </div>
                <!--/.nav-collapse -->
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12" id="content">
                <div class="row-fluid">
                    <!-- block -->
                    <div class="block">
                        <div class="navbar navbar-inner block-header">
                            <div id="" class="muted pull-right"><a href="{{ route('home_page.home') }}"><i
                                        class="icon-arrow-left"></i>
                                    {{ __('link.back') }}</a></div>
                        </div>
                        <div class="block-content collapse in">
                            <center>
                                <h3 style="font-family: all; color: black;"><b><strong>
                                            {{ __('link.About_Our_System') }}</strong></b></h3>
                            </center>
                            <hr>
                            <div class="span10">
                                <h4 style="font-family: all;font-weight:normal;font-size: 17px;color: black;">
                                    <em>
                                        <p>
                                        <h4> {{ __('link.Users_of_The_System') }} </h4>
                                        </p>
                                        <hr>
                                        <p>{{ __('link.Majorly') }}, <br> {{ __('link.S_Admin') }},
                                            {{ __('link.t_Manager') }},{{__('link.f_manager') }},
                                            {{ __('link.Finance') }}, {{ __('link.limatekid') }},
                                            {{ __('link.directorate') }}, {{ __('link.and') }}
                                            {{ __('link.zerfe') }} .<br />
                                            1.{{ __('link.first_page') }}<br />
                                            2.{{ __('link.details_about') }}<br />
                                            3.{{ __('link.see_information') }}<br />
                                            4.{{ __('link.need_to_fill') }}<br />
                                            5.{{ __('link.should_be_click') }}<br />
                                            6.{{ __('link.create_account_but') }}<br />
                                            7.{{ __('link.can_access_easily') }} </p>
                                    </em>
                                </h4>
                                <a style="float:right" href="#">More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /block -->
            </div>
        </div> </div><br><br><br> @include('home_page.footer')

