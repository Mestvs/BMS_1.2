@include('header')

<body> @include('@pages_all.admin_page.navbar') <div class="row-fluid"> @include('@pages_all.finance_page.sidebar_dashboard')
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        
        <div class="span9" id="content" style="margin-left:16%;">
            <div class="row-fluid">
                <ul class="breadcrumb" style="text-align:center;">
                    <li><a href="#"><b>{{ __('link.changepassword') }} </b></a><span class="divider"></span>
                    </li>
                </ul>
                <div id="block_bg" class="block">
                    <div class="navbar navbar-inner block-header">
                        <div id="" class="muted pull-left"></div>
                    </div>
                    <div class="block-content collapse in">
                        <div class="span12">
                            <div class="alert alert-info"><i class="icon-info-sign"></i>
                                {{ __('link.Please_Fill') }} </div>

                            <form method="post" action="{{ url('change/password') }}" id="change_password"
                                class="form-horizontal">
                                @csrf
                                <div class="control-group{{ $errors->has('currentpassword') ? ' has-error' : '' }}">
                                    <label class="control-label" for="inputEmail"><b
                                            style="font-family: all;color: black;">
                                            {{ __('link.Current_Password') }}: </b></label>
                                    <div class="controls">
                                        <input type="password" id="current_password" name="currentpassword"
                                            placeholder="{{ __('link.Current_Password') }}" required>
                                        @if ($errors->has('currentpassword'))
                                            <span class="help-block" style="color:red">
                                                <strong>{{ $errors->first('currentpassword') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="control-group{{ $errors->has('new_password') ? ' has-error' : '' }}">
                                    <label class="control-label" for="inputPassword"><b
                                            style="font-family: all;color: black;">
                                            {{ __('link.new') }}: </b>
                                    </label>
                                    <div class="controls">
                                        <input type="password"
                                            class="form-control @error('password') is-invalid @enderror"
                                            id="new_password" name="new_password" value="{{ old('password') }}"
                                            placeholder="{{ __('link.new') }}" minlength="8" required>
                                        @if ($errors->has('new_password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('new_password') }}</strong>
                                            </span>
                                        @endif
                                        <span id="password_strength"></span>
                                    </div>
                                </div>
                                <div class="control-group{{ $errors->has('retype_password') ? ' has-error' : '' }}">
                                    <label class="control-label" for="inputPassword"><b
                                            style="font-family: all;color: black;">
                                            {{ __('link.re') }}: </b></label>
                                    <div class="controls">
                                        <input type="password" id="retype_password" name="retype_password"
                                            placeholder="{{ __('link.re') }}" minlength="8" required>
                                        @if ($errors->has('retype_password'))
                                            <span class="help-block"style="color:red;">
                                                <strong>{{ $errors->first('retype_password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="control-group">
                                    <div class="controls">
                                        <button type="submit" class="btn btn-info"><i class="icon-save"></i>
                                            {{ __('link.Changeadmin') }} </button>
                                    </div>
                                </div>

                            </form>
                            @if (session('status'))
                                <script>
                                    jQuery(document).ready(function() {
                                        $.jGrowl("Your password is successfully change", {
                                            header: 'Change Password Success'
                                        });
                                    });
                                </script>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><br><br> <br> <br> @include('home_page.script') @include('home_page.footer')
