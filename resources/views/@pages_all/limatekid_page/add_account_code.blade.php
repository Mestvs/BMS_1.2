@include('header')

<body>

    @include('@pages_all.admin_page.navbar') <div class="row-fluid"> @include('@pages_all.limatekid_page.sidebar_budget_codes') <div class="span6" id="adduser"
            style="margin-left:16% ;">
            <div class="row-fluid">
                <div class="pull-right">
                </diV>
                @include('sweetalert::alert')
                <!-- block -->
                <div class="row-fluid" style="margin-bottom: 11%">
                    <!-- block -->
                    <div class="block">
                        <div class="navbar navbar-inner block-header">
                            <div class="alert alert-info" style="font-family: all;font-size: 16px;"><i
                                    class="icon-info-sign"></i><b><strong>Add Account Code
                                    </strong></b> </div>
                        </div>
                        <div class="block-content collapse in">
                            <div class="span12">
                                <form action="/add_account_code" method="post" class="form-horizontal"
                                    enctype="multipart/form-data" autocomplete="off">
                                    @csrf
                                    <div class="control-group">
                                        <label class="control-label" for="inputPassword"
                                            style="font-family: all;color: black;"><b>
                                                {{ __('payment.acc_name') }}: </b></label>
                                        <div class="controls">
                                            <input class="input focused" name="acc_name" id="focusedInput"
                                                type="text" placeholder="accout name" required
                                                style="font-family: all;color: black;">
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="inputPassword"
                                            style="font-family: all;color: black;"><b>
                                                {{ __('payment.acc_code') }} : </b></label>
                                        <div class="controls">
                                            <input class="input focused" name="acc_code" id="focusedInput"
                                                type="text" placeholder="account code" required
                                                style="font-family: all;color: black;" pattern="[0-9_]{4}">
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
                                                    <strong>{{ __('link.Create_acount') }}</strong></b> </button>

                                        </div>
                                    </div>
                                    </br>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /block -->
                </div>

            </div> @include('home_page.script') @include('home_page.footer')
</body>

</html>
