@include('header')

<body> @include('@pages_all.admin_page.navbar')<div class="row-fluid"> @include('@pages_all.directorate_page.sidebar_payment') <div class="span6" id="adduser"
            style="width:80%;margin-left:16%;">
            <div class="row-fluid">
                <div class="pull-right">
                </diV>
                @include('sweetalert::alert')
                <!-- block -->
                <div class="row-fluid">
                    <!-- block -->
                    <div class="block">
                        <div class="navbar navbar-inner block-header">
                            <div class="alert alert-info"><i class="icon-info-sign"></i>
                                {{ __('payment.paymentrequestf') }} </div>
                        </div>
                        <div class="block-content collapse in">
                            <div class="span12">
                                <form action="{{ url('payment_request') }}" method="post" class="form-horizontal"
                                    autocomplete="off">
                                    @csrf
                                    <strong><b><i>
                                                <h4 style="color: black;font-family: all;">
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><strong>
                                                        </strong></b>&nbsp;&nbsp;&nbsp;
                                            </i></b></strong></h4>
                                    <hr>
                                    <div class="control-group">
                                        <label class="control-label" for="inputPassword"
                                            style="color: black;font-family: all;">
                                            <b><strong> {{ __('link.Titleadmin') }}: </strong></b> </label>
                                        <div class="controls">
                                            <input class="input focused" name="title" id="focusedInput" type="text"
                                                placeholder="payment title" style="color: black;font-family: all;"
                                                required pattern="[a-zA-Z0-9_]{1,}">
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="inputPassword"
                                            style="color: black;font-family: all;">
                                            <!---add-->
                                            <b><strong> {{ __('budget.amounttitle') }}: </strong></b>
                                        </label>
                                        <div class="controls">
                                            <input class="input focused" name="amount" id="focusedInput" type="text"
                                                placeholder="amount" style="color: black;font-family: all;" required
                                                pattern="[1-9_][0-9_]{0,}">
                                        </div>
                                    </div>
                                    <div class="control-group" style="float:left ;">
                                        <label class="control-label" for="inputPassword"
                                            style="color: black;font-family: all;">
                                            <b><strong> {{ __('budget.budgetcategory') }}: </strong></b> </label>
                                        <div class="controls">
                                            <select name="b_category" class="chzn-select" required>
                                                <option> </option>
                                                @foreach ($budget_category as $category)
                                                    <option value="{{ $category->category_id }}">
                                                        {{ $category->category_code }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="control-group" style="float:left;">
                                        <label class="control-label" for="inputPassword"
                                            style="color: black;font-family: all;">
                                            <b><strong> {{ __('budget.b_description') }}: </strong></b> </label>
                                        <div class="controls">
                                            <textarea name="description" cols="60" rows="7" id="comment"
                                                style="border: double;color: black;font-family: all;" placeholder="{{ __('payment.your_description_here') }} "
                                                required pattern="[a-zA-Z0-9_]{3,}"></textarea>
                                        </div>
                                    </div>
                                    <div class="control-group" style="clear:both ;">
                                        <hr>
                                        <div class="controls"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button
                                                name="give" class="btn btn-info"
                                                style="color: black;font-family: all;"><i
                                                    class="icon-plus-sign"></i><b>{{ __('budget.b_submit') }}
                                                </b></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div><br> @include('home_page.footer')@include('home_page.script') </body>

</html>
