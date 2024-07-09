@extends('header')

<body id="homepage" style="background-color: currentColor no-repeat center center fixed;">
    <div class="navbar navbar-fixed-top navbar-inverse">
        <div class="navbar-inner">
            <div class="container-fluid">
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <a class="brand" href="#"><b style="font-family: all;font-size: 25px;"><span
                            class="lang"key="wellcome">@include('home_page.navbar')</span></b> </a>
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
                    <div class="block" style="width:55%; margin-top:60px;margin-left:340px;">
                        <div class="navbar navbar-inner block-header">
                            <div id="" class="muted pull-right"><a href="{{ route('home_page.home') }}"><i
                                        class="icon-arrow-left"></i> <span class="lang"
                                        key="back">{{ __('link.back') }}</span></a></div>
                        </div>
                        <div class="block-content collapse in">
                            <center>
                                <h4 style="font-family: all; color: black;"><b><strong><span class="logo">
                                                {{ __('link.Sile') }}</span> </strong></b></h4>
                            </center>
                            <hr>
                            <div class="span11">
                                <h4 style="margin-right:0%;font-family:all;color: #000; font-size:20px;font-weight:normal;">
                                    <em>
                                        <span  class="lang" key="p">&nbsp;&nbsp;&nbsp;{{ __('link.SNNPR') }}</span></em>
                                </h4>
                                <a href="http://www.sictda.gov.et">More</a>
                            </div>
                        </div>
                    </div>
                    <!-- /block -->
                </div>
            </div></div></div> @include('home_page.footer')

