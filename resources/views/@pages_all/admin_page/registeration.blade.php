@include('header')
<script src="sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="sweetalert.css">
<script>
    function display_ct6() {
        var x = new Date()
        var ampm = x.getHours() >= 12 ? ' PM' : ' AM';
        hours = x.getHours() % 12;
        hours = hours ? hours : 12;
        var x1 = x.getMonth() + 1 + "/" + x.getDate() + "/" + x.getFullYear();
        x1 = x1 + " - " + hours + ":" + x.getMinutes() + ":" + x.getSeconds() + ":" + ampm;
        document.getElementById('ct6').innerHTML = x1;
        display_c6();
    }

    function display_c6() {
        var refresh = 1000; // Refresh rate in milli seconds
        mytime = setTimeout('display_ct6()', refresh)
    }
    display_c6()
</script>

<body> @include('@pages_all.admin_page.navbar') <div class="row-fluid" style="margin-bottom: 15%;"> @include('@pages_all.admin_page.sidebar_register') <div
            class="span6" id="adduser" style="margin-left:16%;">
            <div class="row-fluid">
                <div class="pull-right">
                </diV>
                <!-- to include sweetalert -->
                @include('sweetalert::alert')
                <!-- block -->
                <div class="row-fluid">
                    <!-- block -->
                    <div class="block">
                        <div class="navbar navbar-inner block-header">
                            <div class="alert alert-info" style="font-family: all;font-size: 16px;"><i
                                    class="icon-info-sign"></i><b><strong>
                                        {{ __('link.allow') }}/{{ __('link.n_allow') }}
                                    </strong></b> </div>
                        </div>
                        @foreach ($activations as $activation)
                        @endforeach
                        @if ($activation->status == 'Activated')
                            <?php
                            $button = 'Deactivate';
                            $stat = __('link.allowed');
                            ?>


                            <label class="control-label" for="inputPassword"
                                style="color: black;font-family: all;font-size:large;margin-top:2%;margin-left:2%;">
                                <b><strong>{{ __('link.registration_is') }} : <?php echo $stat; ?> </strong></b> </label>
                            <label class="control-label" for="inputPassword"
                                style="color: black;font-family: all;font-size:large;margin-top:2%;float:left;margin-left:2%;">
                                <b><strong> {{ __('link.the') }} {{ __('link.will_be') }}:
                                        {{ $activation->end_date }}</strong></b> </label>

                            <form action="{{ url('allow_registeration', $button) }}" method="post"
                                class="form-horizontal" enctype="multipart/form-data" autocomplete="off">
                                @csrf
                                <div class="control-group" style="margin-top: 4%;margin-left:4%;">
                                    <div class="controls">
                                        <span id='ct6'
                                            style="background-color: #FFFF00; width:30%;margin-left:15%; clear:both;"></span>
                                    </div>
                                </div>
                            @else
                                <?php
                                $stat = __('link.n_allowed');
                                $button = 'Activate';
                                
                                ?> <label class="control-label" for="inputPassword"
                                    style="color: black;font-family: all; font-size: large; text-align:center;margin-top:2%;">
                                    <b><strong>{{ __('link.registration_was') }} :<?php echo $stat; ?></strong></b>
                                </label>
                                <form action="{{ url('allow_registeration', $button) }}" method="post"
                                    class="form-horizontal" enctype="multipart/form-data" autocomplete="off">
                                    @csrf
                                    <div class="control-group" style="margin-top: 4%;margin-left:4%;">
                                        <label class="control-label" for="inputPassword"
                                            style="color: black;font-family: all;">
                                            <b><strong>{{ __('link.e_date') }} : </strong></b> </label>
                                        <div class="controls">
                                            <input class="input focused" name="date" id="focusedInput" type="date"
                                                placeholder="intial date" style="color: black;font-family: all;"
                                                required pattern="">
                                        </div>
                                    </div> <?php
                                    ?>
                        @endif
                        </br>
                        <hr>
                        <input class="input focused" name="signature" id="focusedInput" type="hidden">
                        <div class="control-group">
                            <div class="controls" style="font-family: all;color: black;">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button name="save"
                                    class="btn btn-info"><i class="icon-plus-sign"></i><b style="font-family: all;">
                                        <strong><?php echo $button; ?> </strong></b> </button>
                            </div>
                        </div>
                        </br>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /block -->
        </div>
    </div><br><br>@include('home_page.footer') @include('home_page.script') </body>

</html>
