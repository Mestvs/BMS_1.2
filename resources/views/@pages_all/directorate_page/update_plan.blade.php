<base href="/public">
@include('header')

<body>
    @include('@pages_all.admin_page.navbar') <div class="row-fluid">
        @include('@pages_all.directorate_page.sidebar_plan') <div class="span6" id="adduser" style="width:80%;margin-left: 16%;">
            <div class="row-fluid">
                <div class="pull-right">
                </diV>
                @include('sweetalert::alert')
                <!-- block -->
                <div class="row-fluid">
                    <!-- block -->
                    <div class="block">
                        <div class="navbar navbar-inner block-header">
                            <div class="alert alert-info" style="font-family: all;font-size: 16px;"><i
                                    class="icon-info-sign"></i><b><strong>
                                        {{ __('plan.p_updation_form') }} </strong></b> </div>
                        </div>
                        <div class="block-content collapse in">
                            <div class="span12">
                                <form method="post" class="form-horizontal" enctype="multipart/form-data"
                                    autocomplete="off">
                                    @csrf
                                    @foreach ($directorate_plan as $d_plan)
                                    @endforeach
                                    @foreach ($d_query as $directorate)
                                        <?php
                                        $d_name = $directorate->directorate_name;
                                        ?>
                                    @endforeach
                                    <strong><b><i>
                                                <h4 style="color: black;font-family: all;">
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><strong>You
                                                            are
                                                            Updating the plan of: </strong></b>&nbsp;&nbsp;&nbsp;<b
                                                        style="color:green;">
                                                        {{ $d_name }}</b>&nbsp;&nbsp;&nbsp; Directorate
                                            </i></b></strong></h4>
                                    <hr>
                                    <div class="control-group" style="float:left;">
                                        <label class="control-label" for="inputPassword"
                                            style="font-family: all;color: black;"><b><strong>
                                                    {{ __('plan.plantype') }}: </strong></b> </label>
                                        <div class="controls">
                                            <select name="plan_id" class="chzn-select" required>
                                                @foreach ($plan_query as $plan)
                                                    <option value="{{ $plan->plan_id }}"> {{ $plan->plan_type }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="control-group" style="clear:both;">
                                        <label class="control-label" for="inputPassword"
                                            style="color: black;font-family: all;">
                                            <b><strong> {{ __('budget.Year') }}: </strong></b> </label>
                                        <div class="controls">
                                            <input class="input focused" name="year" value="{{ $d_plan->year }}"
                                                id="focusedInput" type="text" placeholder="year"
                                                style="color: black;font-family: all;" required>
                                        </div>
                                    </div>
                                    <div class="control-group" style="float:left;">
                                        <label class="control-label" for="inputPassword"
                                            style="color: black;font-family: all;">
                                            <b><strong> {{ __('plan.plandescription') }}: </strong></b> </label>
                                        <div class="controls">
                                            <textarea name="description" cols="60" rows="5" id="comment"
                                                style="border: double;color: black;font-family: all;" placeholder=" " required pattern="[a-zA-Z0-9_]{3,}">{{ $d_plan->description }}</textarea>
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
                                                    <strong> {{ __('budget.b_update') }} </strong></b> </button>
                                        </div>
                                    </div>
                                    </br>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /block -->
                </div>
            </div>@include('home_page.footer') @include('home_page.script')
</body>

</html>
