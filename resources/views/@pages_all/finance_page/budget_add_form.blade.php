<head>
    <base href="/public">
    @include('header')
</head>

<body>
    @include('sweetalert::alert')
    @include('@pages_all.admin_page.navbar') <div class="row-fluid"> @include('@pages_all.finance_page.sidebar_budget') <div class="span6" id="adduser"
            style="width:80%;margin-left:16%;">
            <div class="row-fluid">
                <div class="pull-right">
                </diV>
                <div class="row-fluid">
                    <!-- block -->
                    <div class="block">
                        <div class="navbar navbar-inner block-header">
                            <div class="pull-right " style="padding-top:0%;">
                                <a href="/budget_category_select" id="print"
                                    class="btn btn-success"style="font-family: all;"><i class="icon-arrow-left">
                                    </i><b><strong>{{ __('link.back') }} </strong></b></a>
                            </div>
                            <div class="alert alert-info"><i
                                    class="icon-info-sign"></i> {{ __('budget.b_add_form') }} </div>
                        </div>
                        <div class="block-content collapse in">
                            <div class="span12">
                                @foreach ($db_results as $db_result)
                                @endforeach
                                <form action="{{ url('add_budget', $db_result->category_id) }}"method="post"
                                    class="form-horizontal" autocomplete="off">
                                    @csrf
                                    <strong><b><i>
                                                <center>
                                                    <h4 style="color: black;font-family: all;">
                                                        <b><strong>Department:</strong></b>&nbsp;&nbsp;&nbsp;{{ $db_result->zerfe_name }}
                                            </i></b></strong></h4>
                                    </center>
                                    <hr>
                                    <div class="control-group" style="float:left;">
                                        <label class="control-label" for="inputPassword"
                                            style="color: black;font-family: all;">
                                            <b><strong>{{ __('budget.Year') }}:</strong></b> </label>
                                        <div class="controls">
                                            <input class="input focused" name="year" id="focusedInput" type="text"
                                                placeholder="year" style="color: black;font-family: all;" required
                                                pattern="[0-9_]{1,}">
                                        </div>
                                    </div>
                                    <div class="control-group" style="float:left ;">
                                        <label class="control-label" for="inputPassword"
                                            style="color: black;font-family: all;">
                                            <b><strong> {{ __('budget.budgetcategory') }}: </strong></b> </label>
                                        <div class="controls">
                                            <input class="input focused" name="category"
                                                value="{{ $db_result->category_code }}" id="focusedInput" type="text"
                                                placeholder="category" style="color: black;font-family: all;" required
                                                pattern="[0-9_]{3}[-_]{1}[0-9_]{2}[-_]{1}[0-9_]{2}">
                                        </div>
                                    </div>
                                    <div class="control-group" style="float:left;">
                                        <label class="control-label" for="inputPassword"
                                            style="color: black;font-family: all;">
                                            <b><strong>{{ __('budget.amounttitle') }}: </strong></b>
                                        </label>
                                        <div class="controls">
                                            <input class="input focused" name="amount" id="focusedInput" type="text"
                                                placeholder="amount" style="color: black;font-family: all;" required
                                                pattern="[0-9_]{1,}">
                                        </div>
                                    </div>
                                    <div class="control-group" style="float:left ;">
                                        <label class="control-label" for="inputPassword"
                                            style="color: black;font-family: all;">
                                            <b><strong>{{ __('budget.i_date') }}:</strong></b> </label>
                                        <div class="controls">
                                            <input class="input focused" name="i_date" id="focusedInput" type="Date"
                                                placeholder="intial date" style="color: black;font-family: all;"
                                                required pattern="">
                                        </div>
                                    </div>
                                    <div class="control-group" style="float:left ;">
                                        <label class="control-label" for="inputPassword"
                                            style="color: black;font-family: all;">
                                            <b><strong>{{ __('budget.f_date') }}:</strong></b> </label>
                                        <div class="controls">
                                            <input class="input focused" name="f_date" id="focusedInput" type="Date"
                                                placeholder="intial date" style="color: black;font-family: all;"
                                                required pattern="">
                                        </div>
                                    </div>
                                    <div class="control-group" style="float:left;">
                                        <label class="control-label" for="inputPassword"
                                            style="color: black;font-family: all;">
                                            <b><strong>{{ __('budget.b_description') }} : </strong></b> </label>
                                        <div class="controls">
                                            <textarea name="description" cols="60" rows="7" id="comment"
                                                style="border: double;color: black;font-family: all;" placeholder="{{ __('budget.description_here') }}" required
                                                pattern="[a-zA-Z0-9_]{3,}"></textarea>
                                        </div>
                                    </div>
                                    <div class="control-group" style="clear:both ;">
                                        <hr>
                                        <div class="controls"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button
                                                name="give" class="btn btn-info"
                                                style="color: black;font-family: all;"><i
                                                    class="icon-plus-sign"></i><b>
                                                    {{ __('budget.b_submit') }}</b></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div></div></div><br> @include('home_page.footer') @include('home_page.script')
</body>

</html>
