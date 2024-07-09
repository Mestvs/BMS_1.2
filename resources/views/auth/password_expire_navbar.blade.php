<div class="navbar navbar-fixed-top navbar-inverse">
    <div class="navbar-inner">
        <div class="container-fluid" style="background-color:rgb(0, 160, 230);">
            <a class="brand" href="#">
                <img src="{{ url('/images/logo.png') }}" width="400" alt="logo"
                    style="margin-left:0px;height:1.1cm"></a>
            <a class="brand" href="#" style="margin-left:20px;">
                <b style="font-family: all;font-size: 23px;">
                    @lang('link.abouttile')</i> </a>
            <div class="nav-collapse collapse">
                <ul class="nav pull-right">
                    <li class="dropdown">
                        <a href="#" role="button" class="dropdown-toggle" style="font-size:large ;"
                            data-toggle="dropdown">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }} <i
                                class="icon-user icon-large"></i>
                            <i class="caret"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="divider"></li>
                            <li>
                            </li><?php $it = 'it';
                            $en = 'en'; ?>
                            <li>
                                <a href="{{ url('en', $en) }}"><i class="icon-circle"></i><b
                                        style="font-family: all;color: black;font-size: large;"> English</b>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('it', $it) }}"><i class="icon-circle"></i><b
                                        style="font-family: all;color: black;font-size: large;"> አማርኛ</b> </a>
                            </li>
                            <li>
                                <a tabindex="-1" href="{{ route('logout') }}"><i class="icon-signout"></i>&nbsp; <b
                                        style="font-family: all;color: black;font-size: large;">{{ __('link.logout') }}
                                    </b> </a>
                                </form>
                            </li>
                    </li>
                </ul>
                </li>
                </ul>
            </div>

        </div>
    </div>

</div>
@include('@pages_all.admin_page.profile_modal_admin')

   