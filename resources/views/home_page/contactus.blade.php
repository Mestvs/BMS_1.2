@include('header')

<body id="homepage">
    <div class="navbar navbar-fixed-top navbar-inverse">
        <div class="navbar-inner">
            <div class="container-fluid">
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span>
                    <span class="icon-bar"></span><span class="icon-bar"></span></a>
                <a class="brand" href="#"><b style="font-family: all;font-size: 25px;">
                        @include('home_page.navbar') </b> </a>
                <div class="nav-collapse collapse">
                    <ul class="nav pull-right">
                    </ul>
                </div>

            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12" id="content">
                <div class="row-fluid">
                    <!-- block -->
                    <div class="block" style="width:55%; margin-top:60px;margin-left:340px;">
                        <div class="navbar navbar-inner block-header">
                            <div id="" class="muted pull-right"><a href="{{ route('home_page.home') }}"><i
                                        class="icon-arrow-left"></i>{{ __('link.back') }} </a>
                            </div>
                        </div>
                        <div class="block-content collapse in">
                            <center>
                                <h3 style="font-family: all;color: black;"><b><strong> {{ __('link.contactt') }}
                                        </strong></b></h3>
                            </center>
                            <h4 style="font-family: all;color: black;"><b><strong> {{ __('link.co') }}</strong></b>
                            </h4>
                            <hr>
                            <div class="span10">
                                <form method="post" class="form-horizontal">
                                    <div class="control-group">
                                        <label class="control-label" for="inputPassword"
                                            style="color: black;font-family: all;">
                                            <b><strong>
                                                    <p style="font-family: all; color: black;font-size: 18px;"><i
                                                            class="icon-home icon-large"></i><strong>
                                                            {{ __('link.addd') }}</strong></p>
                                                </strong></b> </label>
                                        <div class="controls">
                                            <label class="control-label" for="inputPassword"
                                                style="color: black;font-family: all;">
                                                <b>
                                                    <p style="font-family: all; color: black;font-size: 18px;"><i
                                                            class="icon-home icon-large"></i><strong>
                                                            {{ __('link.addk') }} </p></strong>
                                                </b> </label>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="control-group">
                                        <label class="control-label" for="inputPassword"
                                            style="color: black;font-family: all;">
                                            <b><strong>
                                                    <p style="font-family: all; color: black;font-size: 18px;"><i
                                                            class="icon-user icon-large"></i>
                                                        <strong> {{ __('link.adk') }} </strong>
                                                    </p>
                                                </strong></b> </label>
                                        <div class="controls">
                                            <label class="control-label" for="inputPassword"
                                                style="color: black;font-family: all;">
                                                <b><strong>
                                                        <p style="font-family: all; color: black;font-size: 18px;"><i
                                                                class="icon-user icon-large"></i>
                                                            <strong> +251462206572 </strong>
                                                        </p>
                                                    </strong></b> </label>
                                        </div>
                                    </div>
                                    <hr>
                                    <!--add-->
                                    <div class="control-group">
                                        <label class="control-label" for="inputPassword"
                                            style="color: black;font-family: all;">
                                            <b><strong>
                                                    <p style="font-family: all; color: black;font-size: 18px;"><i
                                                            class="fa fa-fax icon-large"></i><strong>
                                                            {{ __('Fax') }}</strong></p>
                                                </strong></b> </label>
                                        <div class="controls">
                                            <label class="control-label" for="inputPassword"
                                                style="color: black;font-family: all;">
                                                <b><strong>
                                                        <p style="font-family: all; color: black;font-size: 18px;"><i
                                                                class="fa fa-fax icon-large"></i><strong>
                                                                +251462209386 </strong></p>
                                                    </strong></b> </label>
                                        </div>
                                    </div>
                                    <hr>
                                    <!--add p.o.box-->
                                    <div class="control-group">
                                        <label class="control-label" for="inputPassword"
                                            style="color: black;font-family: all;">
                                            <b><strong>
                                                    <p style="font-family: all; color: black;font-size: 18px;"><i
                                                            class=""></i><strong>
                                                            {{ __('P_Box') }}</strong></p>
                                                </strong></b> </label>
                                        <div class="controls">
                                            <label class="control-label" for="inputPassword"
                                                style="color: black;font-family: all;">
                                                <b><strong>
                                                        <p style="font-family: all; color: black;font-size: 18px;">
                                                            <strong> 929 SNNPRS,Hawassa,Ethiopia</strong>
                                                        </p>
                                                    </strong></b> </label>
                                        </div>
                                    </div>
                                    <hr>
                                    <!--add email-->
                                    <div class="control-group">
                                        <label class="control-label" for="inputPassword"
                                            style="color: black;font-family: all;">
                                            <b><strong>
                                                    <p style="font-family: all; color: black;font-size: 18px;"><i
                                                            class="icon-envelope icon-large"></i><strong>
                                                            {{ __('Email') }} </strong></p>
                                                </strong></b> </label>
                                        <div class="controls">
                                            <label class="control-label" for="inputPassword"
                                                style="color: black;font-family: all;">
                                                <b><strong>
                                                        <p style="font-family: all; color: black;font-size: 18px;">
                                                            <strong> contact@bosit.gov.et</strong>
                                                        </p>
                                                    </strong></b> </label>
                                        </div>
                                    </div>
                                    <hr>
                                    <!--add website-->
                                    <div class="control-group">
                                        <label class="control-label" for="inputPassword"
                                            style="color: black;font-family: all;">
                                            <b><strong>
                                                    <p style="font-family: all; color: black;font-size: 18px;"><i
                                                            class=" fa fa-spinner icon-large"></i><strong>
                                                            {{ __('Web') }} </strong></p>
                                                </strong></b>
                                        </label>
                                        <div class="controls">
                                            <label class="control-label" for="inputPassword"
                                                style="color: black;font-family: all;">
                                                <b><strong>
                                                        <p style="font-family: all; color: black;font-size: 18px;">
                                                            <strong><a
                                                                    href="http://www.sictda.gov.et">http://www.sictda.gov.et</a>
                                                            </strong>
                                                        </p>
                                                    </strong></b>
                                            </label>
                                        </div>
                                    </div>
                                    <hr>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /block -->
                </div>
            </div>
        </div><br>
    </div>
     @include('home_page.footer')
