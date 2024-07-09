@include('header')

<body>
    @include('sweetalert::alert')
    @include('@pages_all.admin_page.navbar')<div class="row-fluid">
        @include('@pages_all.limatekid_page.sidebar_plan') <div class="span6" id="adduser" style="width:70%;margin-left: 16%;">
            <div class="row-fluid">
                <div class="pull-right">
                </diV>
                <!-- block -->
                <div class="row-fluid">
                    <!-- block -->
                    <div class="block">
                        <div class="navbar navbar-inner block-header">
                            <div class="alert alert-info" style="font-family: all;font-size: 16px;"><i
                                    class="icon-info-sign"></i><b><strong>
                                        {{ __('plan.planpreparationf') }} </strong></b> </div>
                        </div>
                        <div class="block-content collapse in">
                            <div class="span12">
                                <form action="{{ url('plan_submit') }}" method="post" class="form-horizontal"
                                    enctype="multipart/form-data" autocomplete="off">
                                    @csrf
                                    <strong><b><i>
                                                <h4 style="color: black;font-family: all;">
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><strong>You
                                                            are preparing the plan of: </strong></b>&nbsp;&nbsp;&nbsp;<b
                                                        style="color:green;">
                                                        {{ Auth::user()->role }}</b>&nbsp;&nbsp;&nbsp; Directorate
                                            </i></b></strong></h4>
                                    <hr>
                                    <div class="control-group" style="float:left;">
                                        <label class="control-label" for="inputPassword"
                                            style="font-family: all;color: black;"><b><strong>
                                                    {{ __('plan.plantype') }}:</strong></b> </label>
                                        <div class="controls">
                                            <select class="chzn-select" name="p_type" id="focusedInput" type="text"
                                                placeholder="-{{ __('link.select') }}-" required
                                                style="font-family: all;">
                                                <option></option>
                                                <option style="font-family: all;color: black;" value="Annual">
                                                    {{ __('plan.yearly') }} </option>
                                                <option style="font-family: all;color: black;" value="Quarter">
                                                    {{ __('plan.quarter') }} </option>
                                                <option style="font-family: all;color: black;" value="Monthly">
                                                    {{ __('plan.monthly') }} </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="control-group" style="clear:both;">
                                        <label class="control-label" for="inputPassword"
                                            style="color: black;font-family: all;">
                                            <b><strong> {{ __('budget.Year') }}: </strong></b> </label>
                                        <div class="controls">
                                            <input class="input focused" name="year" id="focusedInput" type="text"
                                                placeholder="year" style="color: black;font-family: all;" required
                                                pattern="[0-9_]{4,}">
                                        </div>
                                    </div>
                                    <div class="control-group" style="float:left;">
                                        <label class="control-label" for="inputPassword"
                                            style="color: black;font-family: all;">
                                            <b><strong>{{ __('plan.plandescription') }}: </strong></b> </label>
                                        <div class="controls">
                                            <textarea name="description" cols="60" rows="5" id="comment"
                                                style="border: double;color: black;font-family: all;" placeholder="description " required
                                                pattern="[a-zA-Z0-9_]{3,}"></textarea>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="inputPassword"
                                            style="font-family: all;color: black;"><b><strong>
                                                    {{ __('plan.file') }}: </strong></b> </label>
                                        <div class="controls">
                                            <input class="input focused" name="myfile" id="file" type="file"
                                                placeholder=" " required style="font-family: all;color: black;"
                                                onchange="return fileValidations()">
                                        </div>
                                    </div>
                                    </br>
                                    <hr>
                                    <div class="control-group">
                                        <div class="controls" style="font-family: all;color: black;">
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button name="save"
                                                class="btn btn-info"><i class="icon-plus-sign"></i><b
                                                    style="font-family: all;">
                                                    <strong> {{ __('budget.b_submit') }}</strong></b> </button>
                                        </div>
                                    </div>
                                    </br>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /block -->
                </div>
            </div>
        </div>
    </div>@include('home_page.footer') @include('home_page.script')
</body>

</html>
