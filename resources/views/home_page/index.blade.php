@include('header')

<body  id="homepage">
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
    <div id="login">
        @include('home_page.link')
    </div>
    <div class="row-fluid"> <br>
        <div class="span7">
            <iframe scrolling="no" src="{{ route('rotation.send') }}"
                name="g"style="border:0px; margin-left:30px;  height: 420px;width: 890px;"></iframe>
        </div>
        <div class="span4" style="display: inline-block; margin-bottom:50px; text-align: center;">
            <div>
                <div class="box box-danger">
                    <div class="box box-header with-border">
                        <h3 class="jumbotron-heading" style="color:#ffffff"> <span class="logo">
                                {{ __('link.Our_Mission') }}</span></h3>
                    </div>
                    <div class="box-body">
                        <p class="jumbotron-heading" style="font-family:all;color: #00007d; font-size:20px;">
                            {{ __('link.BoSIT_mission') }} </p>
                    </div>
                </div>
                <div class="box box-danger">
                    <div class="box box-header with-border">
                        <h3 class="jumbotron-heading"><span class="logo" style="color:#ffffff">
                                {{ __('link.Our_Vision') }} </span></h3>
                    </div>
                    <div class="box-body">
                        <p class="jumbotron-heading" style="font-family:all;color: #00007d; font-size:20px;">
                            {{ __('link.BoSIT_vision') }} </p>
                    </div>
                </div>
            </div>
        </div>
    </div> @include('home_page.script')
    @include('home_page.footer')