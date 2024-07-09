<base href="/public">
@include('header')

<body>
    @include('@pages_all.admin_page.navbar')<div class="row-fluid">
        @include('@pages_all.zerfe_page.sidebar_plan') <div class="span6" id="adduser" style="width:80%;margin-left:16%;">
            <div class="row-fluid">
                <div class="pull-right">
                </diV>
                @include('sweetalert::alert')
                <!-- block -->
                <div class="row-fluid">
                    <!-- block -->
                    <div class="block">
                        <div class="navbar navbar-inner block-header">
                            <div class="pull-right " style="padding-top:0%;">
                                <a href="/plan_submit_select" id="print" class="btn btn-success"
                                    style="font-family: all;">
                                    <i class="icon-arrow-left">
                                    </i><b><strong>{{ __('link.back') }} </strong></b></a>
                            </div>
                            <div class="alert alert-info" style="font-family: all;font-size: 16px;"><i
                                    class="icon-info-sign"></i><b><strong>
                                        {{ __('plan.planpreparationf') }} </strong>
                                </b>
                            </div>
                        </div>
                        <div class="block-content collapse in">
                            @foreach ($zerfe as $zerfe)
                            @endforeach
                            <!--Select category Limatekid-->
                            @if ($get_category == 'Limatekid')
                                <div class="span12">
                                    <form action="/plan_submit_to_limatekid" method="post" class="form-horizontal"
                                        enctype="multipart/form-data" autocomplete="off">
                                        @csrf
                                        <strong><b><i>
                                                    <h4 style="color: black;font-family: all;">
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>
                                                            <strong>You are submiting the plan of:
                                                            </strong></b>&nbsp;&nbsp;&nbsp;<b style="color:green;">
                                                            {{ $zerfe->zerfe_name }} </b>&nbsp;&nbsp;&nbsp; Zerfe to
                                                        <strong style="color:blue;">Limatekid!</strong>
                                                </i></b></strong></h4>
                                        <hr>
                                        <div class="control-group" style="float:left;">
                                            <label class="control-label"
                                                for="inputPassword"style="font-family: all;color: black;"><b><strong>{{ __('plan.plantype') }}:
                                                    </strong></b> </label>
                                            <div class="controls">
                                                <select name="plan_id" class="chzn-select" required>
                                                    <option> </option>
                                                    @foreach ($plans as $plan)
                                                        <option value="{{ $plan->plan_id }}">{{ $plan->plan_type }}
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
                                                <select name="year" class="chzn-select" required>
                                                    <option> </option>
                                                    @foreach ($year_query as $year)
                                                        <option value="{{ $year->year }}"> {{ $year->year }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="control-group" style="float:left;">
                                            <label class="control-label" for="inputPassword"
                                                style="color: black;font-family: all;">
                                                <b><strong> {{ __('plan.plandescription') }}: </strong></b> </label>
                                            <div class="controls">
                                                <textarea name="description" cols="60" rows="6" id="comment"
                                                    style="border: double;color: black;font-family: all;" placeholder="{{ __('plan.about_plan') }} " required
                                                    pattern="[a-zA-Z0-9_]{3,}"></textarea>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="inputPassword"
                                                style="font-family: all;color: black;margin-bottom:0% ;"><b><strong>
                                                        {{ __('plan.file') }}: </strong></b> </label>
                                            <div class="controls">
                                                <input class="input focused" name="myfile" id="file"
                                                    type="file" placeholder=" " required
                                                    style="font-family: all;color: black;"
                                                    onchange="return fileValidations()">
                                            </div>
                                        </div>
                                        </br>
                                        <hr>
                                        <div class="control-group" style="margin-bottom:0% ;">
                                            <div class="controls" style="font-family: all;color: black;">
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button name="save"
                                                    class="btn btn-info"><i class="icon-plus-sign"></i><b
                                                        style="font-family: all;">
                                                        <strong> {{ __('budget.b_submit') }} </strong></b> </button>
                                            </div>
                                        </div>
                                        </br>
                                    </form>
                                </div>
                                <!--Select category Directorate-->
                            @else
                                <div class="span12">
                                    <form action="/plan_submit_to_directorate" method="post" class="form-horizontal"
                                        enctype="multipart/form-data" autocomplete="off">
                                        @csrf
                                        <strong><b><i>
                                                    <h4 style="color: black;font-family: all;">
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><strong>You
                                                                are submiting the plan of:
                                                            </strong></b>&nbsp;&nbsp;&nbsp;<b style="color:green;">
                                                            {{ $zerfe->zerfe_name }} </b>&nbsp;&nbsp;&nbsp; Zerfe to
                                                        <strong style="color:blue;">Directorate!</strong>
                                                </i></b></strong></h4>
                                        <hr>
                                        <div class="control-group" style="float:left;">
                                            <label class="control-label" for="inputPassword"
                                                style="font-family: all;color: black;"><b><strong>{{ __('plan.plantype') }}:
                                                    </strong></b> </label>
                                            <div class="controls">
                                                <select name="plan_id" class="chzn-select" required>
                                                    <option> </option>
                                                    @foreach ($plans as $plan)
                                                        <option value="{{ $plan->plan_id }}">{{ $plan->plan_type }}
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
                                                <select name="year" class="chzn-select" required>
                                                    <option> </option>
                                                    @foreach ($year_query as $year)
                                                        <option value="{{ $year->year }}"> {{ $year->year }}
                                                        </option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>
                                        <div class="control-group" style="float:left;">
                                            <label class="control-label" for="inputPassword"
                                                style="color: black;font-family: all;">
                                                <b><strong> {{ __('plan.plandescription') }}: </strong></b> </label>
                                            <div class="controls">
                                                <textarea name="description" cols="60" rows="6" id="comment"
                                                    style="border: double;color: black;font-family: all;" placeholder="{{ __('plan.about_plan') }} " required
                                                    pattern="[a-zA-Z0-9_]{3,}"></textarea>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="inputPassword"
                                                style="font-family: all;color: black;"><b><strong>{{ __('plan.file') }}:
                                                    </strong></b> </label>
                                            <div class="controls">
                                                <input class="input focused" name="myfile" id="file"
                                                    type="file" placeholder=" " required
                                                    style="font-family: all;color: black;"
                                                    onchange="return fileValidations()">
                                            </div>
                                        </div>
                                        </br>
                                        <hr>
                                        <div class="control-group">
                                            <div class="controls" style="font-family: all;color: black;">
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button name="submit"
                                                    class="btn btn-info"><i class="icon-plus-sign"></i><b
                                                        style="font-family: all;">
                                                        <strong> {{ __('budget.b_submit') }} </strong></b> </button>
                                            </div>
                                        </div>
                                        </br>
                                    </form>
                                </div>
                            @endif
                        </div>
                    </div>
                    <!-- /block -->
                </div></div></div></div><br>

            </div>@include('home_page.script') @include('home_page.footer')
</body>

</html>
