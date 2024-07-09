@include('header')

<body> @include('@pages_all.admin_page.navbar') <div class="row-fluid"> @include('@pages_all.zerfe_page.sidebar_plan')<div class="span6" id="adduser"
            style="width:80%;margin-left:16%;padding-bottom:13% ">
            <div class="row-fluid">
                <div class="pull-right">
                </diV> <?php
                $limatekid = 'Limatekid';
                $directorate = 'Directorate';
                
                ?>
                <!-- block -->
                <div class="row-fluid">
                    <!-- block -->
                    <div class="block">
                        <div class="navbar navbar-inner block-header">
                            <div class="alert alert-info" style="color: 0000;font-family: all;font-size:large;"><i
                                    class="icon-info-sign"></i> {{ __('plan.p_s_selection') }}</div>
                        </div>
                        <div class="block-content collapse in">
                            <div class="span12">
                                <form method="post" class="form-horizontal" autocomplete="off">
                                    <strong><b><i>
                                                <h4 style="color: black;font-family: all;text-align:center;">
                                                    <b><strong>Submit To </strong></b>
                                            </i></b></strong></h4>
                                    <hr>
                                    <div class="navbar navbar-inner block-header"
                                        style="width:25%;float:left;margin-left:15%;">
                                        <div class="alert alert-info"
                                            style="background-color:blueviolet;font-family: all;"><i
                                                class="icon-info-sign"></i> {{ __('link.l_ekidD') }}</div>
                                        <a href="{{ url('plan_prepare_form', $limatekid) }}" id="print"
                                            class="btn btn-success" style="font-family: all;font-size:small;"> <i
                                                class="icon-plus">
                                            </i><b><strong> {{ __('plan.s_plan') }}</strong></b></a>
                                    </div>
                                    <div class="navbar navbar-inner block-header"
                                        style="width:25%;float:left;margin-left:5%;">
                                        <div class="alert alert-info"
                                            style="background-color:blueviolet;font-family: all;"><i
                                                class="icon-info-sign"></i> {{ __('link.directorate') }}</div>
                                        <a href="{{ url('plan_prepare_form', $directorate) }}" id="print"
                                            class="btn btn-success" style="font-family: all;font-size:small;"> <i
                                                class="icon-plus">
                                            </i><b><strong>{{ __('plan.s_plan') }}</strong></b></a>
                                    </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><br><br> @include('home_page.footer')@include('home_page.script') </body>

</html>
