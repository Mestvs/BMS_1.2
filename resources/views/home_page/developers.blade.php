@include('header')

<body id="homepage" style="background-color: currentColor no-repeat center center fixed;">
    <div class="navbar navbar-fixed-top navbar-inverse">
        <div class="navbar-inner">
            <div class="container-fluid"style="background-color:rgb(0, 160, 230);">
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <a class="brand" href="#" style="margin-left: 35%"><b style="font-family: all;font-size: 25px;">
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
                            <h3 style="font-family: all; color: black;"> {{ __('link.dev_title') }} </h3>
                            <hr>
                            <div class="span2" style="float:left ;width:25%;">
                                <center>
                                    <img id="developers" src="{{ url('/images/kume1.jpg') }}" class="img-circle">
                                    <hr>
                                    <p style="font-family: all; color: black;"><b>{{ __('link.name1') }} </b></p>
                                    <p style="font-family: all; color: black;"><b>{{ __('link.address') }} </b></p>
                                    <p style="font-family: all; color: black;"><b>{{ __('link.email1') }} </b></p>
                                    <p style="font-family: all; color: black;"><b> {{ __('link.phone') }} </b></p>
                                </center>
                            </div>
                            <div class="span3" style="float:left ;width:20%;">
                                <center>
                                    <img id="developers" src="{{ url('/images/desta.jpg') }}" class="img-circle">
                                    <hr>
                                    <p style="font-family: all; color: black;"><b>{{ __('link.name2') }} </b></p>
                                    <p style="font-family: all; color: black;"><b>{{ __('link.address2') }} </b></p>
                                    <p style="font-family: all; color: black;"><b>{{ __('link.email2') }} </b></p>
                                    <p style="font-family: all; color: black;"><b> {{ __('link.phone2') }} </b></p>
                                </center>
                            </div>
                            <div class="span4" style="float:left; width:20%;margin-left:2%;">
                                <center>
                                    <img id="developers" src="{{ url('/images/sami.jpg') }}" class="img-circle">
                                    <hr>
                                    <p style="font-family: all; color: black;"><b>{{ __('link.name3') }} </b></p>
                                    <p style="font-family: all; color: black;"><b>{{ __('link.address3') }} </b></p>
                                    <p style="font-family: all; color: black;"><b>{{ __('link.email3') }} </b></p>
                                    <p style="font-family: all; color: black;"><b> {{ __('link.phone3') }} </b></p>
                                </center>
                            </div>
                            <div class="span5" style="float:left; width:20% ;">
                                <center>
                                    <img id="developers" src="{{ url('/images/fanuel.jpg') }}" class="img-circle">
                                    <hr>
                                    <p style="font-family: all; color: black;"><b>{{ __('link.name4') }} </b></p>
                                    <p style="font-family: all; color: black;"><b>{{ __('link.address4') }} </b></p>
                                    <p style="font-family: all; color: black;"><b>{{ __('link.email4') }} </b></p>
                                    <p style="font-family: all; color: black;"><b> {{ __('link.phone4') }} </b></p>
                                </center>
                            </div>
                            <div class="span6" style="float:left; width:20% ;">
                                <center>
                                    <img id="developers" src="{{ url('/images/habte.jpg') }}" class="img-circle">
                                    <hr>
                                    <p style="font-family: all; color: black;"><b>{{ __('link.name5') }} </b></p>
                                    <p style="font-family: all; color: black;"><b>{{ __('link.address5') }} </b></p>
                                    <p style="font-family: all; color: black;"><b>{{ __('link.email5') }} </b></p>
                                    <p style="font-family: all; color: black;"><b> {{ __('link.phone5') }} </b></p>
                                </center>
                            </div>
                        </div>
                    </div>
                    <!-- /block -->
                </div>
            </div>
        </div>
    </div><br> @include('home_page.footer')
