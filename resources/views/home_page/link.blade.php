<div class="navbar">
    <div class="navbar-inner">
        <div class="container-fluid">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <div class="nav-collapse collapse">
                <ul class="nav" id="footer_nav">
                    <li class="divider-vertical"></li>
                    <li class="active"><a href="{{ route('home_page.home') }}" style="background-color:#08367f"><b
                                class="icon-home"></b><b 
                                style="color:white;font-family: all;font-size: 17px;">&nbsp;<span class="lang"
                                    key="home">{{ __('link.home') }} </span></b></a></li>
                    <li class="divider-vertical"></li>
                    <li><a href="{{ route('home_page.about', app()->getLocale()) }}"
                            style="background-color:#08367f;font-family: all;font-size: 17px;"><i
                                class="icon-info-sign"></i><b style="color:white">&nbsp;<span class="lang"
                                    key="about">{{ __('link.about') }} </span></b></a></li>
                    <li class="divider-vertical"></li>
                    <li><a href="{{ route('home_page.developers') }}"
                            style="background-color:#08367f;font-family: all;font-size: 16px;"><i
                                class="icon-user"></i><b style="color:white">&nbsp;<span class="lang" key="developer">
                                    {{ __('link.dev_title') }} </span></b></a></li>
                    <li class="divider-vertical"></li>
                    <li><a href="{{ route('home_page.contactUs') }}"
                            style="background-color:#08367f;font-family: all;font-size: 16px;"> <i
                                class="icon-phone icon-large"></i><b style="color:white">&nbsp;<span class="lang"
                                    key="contact">
                                    {{ __('link.contact') }}</span></b></a></li>
                    <li class="divider-vertical"></li>
                    <li><a href="/login" style="background-color:#08367f;font-family: all;font-size: 16px;"><i
                                class="icon-signin icon-large"></i><b style="color:white">&nbsp;<span class="lang"
                                    key="help">
                                    {{ __('link.login') }}</span></b></a></li>
                    <li class="divider-vertical"></li>
                        <li><a href="{{ route('home_page.register')}}"
                                style="background-color:#08367f;font-family: all;font-size: 16px;"><i
                                    class="icon-user"></i><b style="color:white">&nbsp;<span class="lang"
                                        key="help"> {{ __('link.sign_up') }}
                                    </span></b></a></li>
                        <li class="divider-vertical"></li>
                    
                    <li class="divider-vertical"></li>
                    <li><a href="{{ route('home_page.help') }}"
                            style="background-color:#08367f;font-family: all;font-size: 16px;"><i
                                class="icon-ok icon-large"></i><b style="color:white">&nbsp;<span class="lang"
                                    key="help">
                                    {{ __('link.help') }}</span></b></a></li>
                    <li class="divider-vertical"></li>
                    <li class="dropdown">
                        <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">
                            {{ __('link.language') }}<i class="caret"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <?php $it = 'it';
                                $en = 'en'; ?>
                                <a href="{{ url('en', $en) }}"><i class="icon-circle"></i><b
                                        style="font-family: all;color: black;"> English</b>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('it', $it) }}"><i class="icon-circle"></i><b
                                        style="font-family: all;color: black;"> አማርኛ</b> </a>
                            </li>
                            <li class="divider-vertical"></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@if (session()->has('status'))
<script>
    jQuery(document).ready(function() {
        $.jGrowl("The registeration is Denied! Please Contact the Admin.", {
            header: 'Registeration Failed'
        });
    });
</script>
@endif
