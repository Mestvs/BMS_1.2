@include('header')
<body id="homepage" style="background-color: currentColor no-repeat center center fixed;">
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
    <div class="container-fluid" style="margin-bottom: 11%">
        <div class="row-fluid">
            <div class="span12" id="content">
                <div class="row-fluid">
                    <!-- block -->
                    <center>
                        <div class="block " style="margin-top:67px; width:45%; ">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-right"><a href="{{ route('home_page.home') }}"><i
                                            class="icon-arrow-left"></i> {{ __('link.back') }}</a></div>
                            </div>
                            <div class="block-content collapse in">
                                <div class=""style="margin-left:-50%;display: inline-block; text-align: center;">
                                    <form id="login_form1" action="{{route('login.post') }}" class="form-signin"
                                        autocomplete="off" method="POST">
                                        @csrf
                                        <h3 class="form-signin-heading"><i class="icon-lock"> <b
                                                    style="color:black;font-family: all;">
                                                    {{ __('link.ples') }} </b></i> </h3>
                                        <input type="text" style=" width:23%; " class="input-block-level"
                                            id="username" name="email" placeholder="{{ __('link.username') }}"
                                            minlength="04" required style="color:black;font-family: Times;"><br>
                                        <input type="password" style=" width:23%; " oncopy="return false"
                                            onpaste="return false" class="input-block-level" id="password"
                                            name="password" placeholder="{{ __('link.pass') }}" required
                                            style="color:black;font-family: all;">
                                        <center><a href="{{ route('forget.password.get') }}"><i class=""></i><i
                                                    class=""></i>
                                                <h4 style="color:black;font-family: all;">{{ __('link.forgo') }}</h4>
                                            </a></center><br>
                                        <button data-placement="right" title="Click Here to Log In" id="signin"
                                            name="login" class="btn btn-info" type="submit"
                                            style="color:black;font-family: all;">
                                            <i class="icon-signin icon-large"> {{ __('link.login') }} </i> </button>
                                        <div class="container">
                                            <h3 class="jumbotron-heading"><span class="logo"></span> <a
                                                    href="register.php"></a></h3>
                                        </div>
                                        <label></label>
                                        {{-- script to show the tooltip --}}
                                        <script type="text/javascript">
                                            $(document).ready(function() {
                                                $('#signin').tooltip('show');
                                                $('#signin').tooltip('hide');
                                            });
                                        </script>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </center>
                    <!-- end block -->
                </div>
                {{-- script used to load and direct to the intended pages --}}
                <script>
                    jQuery(document).ready(function() {
                        jQuery("#login_form1").submit(function(e) {
                            e.preventDefault();
                            var formData = jQuery(this).serialize();
                            $.ajax({
                                type: "POST",
                                url: "{{ url('login') }}",
                                data: formData,
                                success: function(html) {
                                    if (html == 'true_admin') {
                                        $.jGrowl("Loading File Please Wait......", {
                                            sticky: true
                                        });
                                        $.jGrowl("Welcome to Automated Budget Management System", {
                                            header: 'Access Granted'
                                        });
                                        var delay = 1000;
                                        setTimeout(function() {
                                            window.location = '/admin_home'
                                        }, delay);
                                    } else if (html == 'true_Top_Manager') {
                                        $.jGrowl("Loading File Please Wait......", {
                                            sticky: true
                                        });
                                        $.jGrowl("Welcome to Automated Budget Management System", {
                                            header: 'Access Granted'
                                        });
                                        var delay = 1000;
                                        setTimeout(function() {
                                            window.location = '/top_manager_home'
                                        }, delay);
                                    } else if (html == 'true_Finance_Manager') {
                                        $.jGrowl("Loading File Please Wait......", {
                                            sticky: true
                                        });
                                        $.jGrowl("Welcome to Automated Budget Management System", {
                                            header: 'Access Granted'
                                        });
                                        var delay = 1000;
                                        setTimeout(function() {
                                            window.location = '/finance_manager_home'
                                        }, delay);
                                    } else if (html == 'true_Finance') {
                                        $.jGrowl("Loading File Please Wait......", {
                                            sticky: true
                                        });
                                        $.jGrowl("Welcome to Automated Budget Management System", {
                                            header: 'Access Granted'
                                        });
                                        var delay = 1000;
                                        setTimeout(function() {
                                            window.location = '/Finance_home'
                                        }, delay);
                                    } else if (html == 'true_Limatekid') {
                                        $.jGrowl("Loading File Please Wait......", {
                                            sticky: true
                                        });
                                        $.jGrowl("Welcome to Automated Budget Management System", {
                                            header: 'Access Granted'
                                        });
                                        var delay = 1000;
                                        setTimeout(function() {
                                            window.location = '/limatekid_home'
                                        }, delay);
                                    } else if (html == 'true_Zerfe') {
                                        $.jGrowl("Loading File Please Wait......", {
                                            sticky: true
                                        });
                                        $.jGrowl("Welcome to Automated Budget Management System", {
                                            header: 'Access Granted'
                                        });
                                        var delay = 1000;
                                        setTimeout(function() {
                                            window.location = 'zerfe_home'
                                        }, delay);
                                    } else if (html == 'true_Directorate') {
                                        $.jGrowl("Loading File Please Wait......", {
                                            sticky: true
                                        });
                                        $.jGrowl("Welcome to Automated Budget Management System", {
                                            header: 'Access Granted'
                                        });
                                        var delay = 1000;
                                        setTimeout(function() {
                                            window.location = '/directorate_home'
                                        }, delay);
                                    } else {
                                        $.jGrowl("Please Check your username and Password", {
                                            header: 'Login Failed'
                                        });
                                        var delay = 2000;
                                        setTimeout(function() {
                                            window.location = '/login'
                                        }, delay);
                                    }
                                }
                            });
                            return false;
                        });
                    });
                </script>
            </div>
        </div>
    </div><br> @include('home_page.script') @include('home_page.footer')
