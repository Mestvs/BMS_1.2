@include('header')
<!-- script used to show alert during registration -->
<script src="{{ asset('css/js/dist.js') }}"></script>
@include('home_page.navbar')

<body id="homepage">
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="block-content collapse in">
                <div class="block">
                    <div class="navbar navbar-inner block-header">
                        <div class="alert alert-info" style="font-family: all;font-size: 16px;"><i
                                class="icon-info-sign"></i><b><strong>
                                    {{ __('link.allows_sign_up') }} </strong></b>
                        </div>
                        <div id="" class="muted pull-right"><a href="{{ route('home_page.home') }}"><i
                                    class="icon-arrow-left"></i><b
                                    style="font-family: all;font-style: normal;font-weight: normal;font-size: 18px;">
                                    {{ __('link.back') }}</b></a></div>
                    </div>
                    <div class="block-content collapse in">
                        <div class="span12">
                            <div align="center">
                                <font color="blue"></font>
                            </div>
                            <form method="post" class="form-horizontal" enctype="multipart/form-data"
                                autocomplete="off" action="{{ Route('register.post') }}">
                                @csrf
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword"
                                        style="font-family: all;color: black;"><b>
                                            {{ __('link.f_name') }}: </b></label>
                                    <div class="controls">
                                        <input class="input focused" name="firstname" id="focusedInput" type="text"
                                            placeholder=" {{ __('link.f_name') }}" required
                                            style="font-family: all;color: black;" pattern="[A-Za-z]{3,}">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword"
                                        style="font-family: all;color: black;"><b><strong>
                                                {{ __('link.l_name') }} : </strong></b></label>
                                    <div class="controls">
                                        <input class="input focused" name="lastname" id="focusedInput" type="text"
                                            placeholder="{{ __('link.l_name') }}" required
                                            style="font-family: all;color: black;" pattern="[A-Za-z]{3,}">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword"
                                        style="font-family: all;color: black;"><b><strong>
                                                {{ __('link.email') }}: </strong></b> </label>
                                    <div class="controls">
                                        <input class="input focused" name="email" id="focusedInput" type="email"
                                            placeholder="{{ __('link.email') }}" required
                                            style="font-family: all;color: black;">
                                        <i class="icon-user icon-large"></i>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword"
                                        style="font-family: all;color: black;"><b><strong>
                                                {{ __('link.pass') }} : </strong></b> </label>
                                    <div class="controls">
                                        <input class="input focused" name="password" id="new_password" type="password"
                                            placeholder="{{ __('link.pass') }}" minlength="4" required
                                            style="font-family: all;color: black;">
                                        <span id="password_strength">
                                            <i class="icon-lock icon-large"></i></span>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="inputPassword"
                                        style="font-family: all;color: black;"><b><strong>
                                                {{ __('link.Profileadmin') }} : </strong></b> </label>
                                    <div class="controls">
                                        <input class="input focused" name="image" id="file" type="file"
                                            placeholder=" " required style="font-family: all;color: black;"
                                            onchange="fileValidation()">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword"
                                        style="font-family: all;color: black;"><b><strong>
                                                {{ __('link.Typeadmin') }}: </strong></b> </label>
                                    <div class="controls">
                                        <select class="chzn-select" name="type" id="focusedInput" type="text"
                                            placeholder="-Select-" required style="font-family: all;">
                                            <option></option>
                                            <option style="font-family: all;color: black;" value="administrator">
                                                {{ __('link.S_Admin') }} </option>
                                            <option style="font-family: all;color: black;" value="Top_Manager">
                                                {{ __('link.t_Manager') }} </option>
                                            <option style="font-family: all;color: black;" value="Finance_Manager">
                                                {{ __('link.f_manager') }} </option>
                                            <option style="font-family: all;color: black;"
                                                value="Purchasing_&_Finance">
                                                {{ __('link.Finance') }}</option>
                                            <option style="font-family: all;color: black;" value="Limatekid">
                                                {{ __('limatekid') }} </option>
                                            <option style="font-family: all;color: black;" value="Zerfe">
                                                {{ __('zerfe') }}
                                            </option>
                                            <option style="font-family: all;color: black;" value="Directorate">
                                                {{ __('link.directorate') }} </option>
                                        </select>
                                    </div>
                                </div>
                                </br>
                                <hr>
                                <input class="input focused" name="signature" id="focusedInput" type="hidden">
                                <div class="control-group">
                                    <div class="controls" style="font-family: all;color: black;">
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button name="save"
                                            class="btn btn-info"><i class="icon-plus-sign"></i><b
                                                style="font-family: all;">
                                                <strong>{{ __('link.Create_account') }} </strong></b> </button>
                                        <div class="text-center"> {{ __('link.Already_account') }}<a href="/login">
                                                {{ __('link.Sign_in') }} </a>
                                        </div>
                                    </div>
                                </div>
                                </br>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if ($user == 1)
        <?php
        $firstname = $first_name;
        $lastname = $last_name;
        $sign = $signature;
        $password = $password;
        ?>
        <script>
            $(document).ready(function() {

                swal("Registered Successfuly!", "read the info bellow", "success").then(function() {
                    document.getElementById("register").scrollIntoView();
                });

            });
        </script> <?php
        
        echo '<div class="alert alert-dismissable alert-success fade in" id="register">';
        echo '<div class="alert alert-dismissable alert-success fade in">';
        
        echo '<strong>' . ' You have been successfully registered.Please wait for the admin approval.' . '</strong>';
        echo '<br>';
        echo '<strong>' . ' Dear' . '&nbsp; &nbsp;' . "<font face='monotype ' color='black' size='3'>" . $firstname . '</font>' . ' &nbsp;' . "<font face='monotype ' color='black' size='2'>" . $lastname . '</font>' . '&nbsp; &nbsp;' . ' your account is now created and your password is ' . "<font color='black' size='3'>" . $password . '</font>' . '&nbsp; &nbsp;' . 'and your Signature is   ' . "<font color='black' size='3'>" . "$sign " . '</font>' . 'take these information use  username and password to sign in to our system after you will aprove' . '</strong>';
        echo '</div>';
        ?>
    @elseif ($user == 'exists')
        <script>
            $(document).ready(function() {

                swal("User Already Existed!", "Please Try Again!", "error");

            });
        </script>
    @else
    @endif

    <script>
        $(function() {
            $(".datepicker").datepicker();
            $(".uniform_on").uniform();
            $(".chzn-select").chosen();
            $('#rootwizard .finish').click(function() {
                alert('Finished!, Starting over!');
                $('#rootwizard').find("a[href*='tab1']").trigger('click');
            });
        });
    </script>
    </div>
    @include('home_page.script')@include('home_page.footer')
</body>
