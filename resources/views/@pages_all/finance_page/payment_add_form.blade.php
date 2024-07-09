<base href="/public">
@include('header')

<body> @include('@pages_all.admin_page.navbar')
    @include('sweetalert::alert')

    <body>
        <div class="row-fluid"> @include('@pages_all.finance_page.sidebar_payment')<div class="span6" id="adduser"
                style="width:80%;margin-left:16%;">
                <div class="row-fluid">
                    <div class="pull-right">
                    </diV>
                    @foreach ($z_query as $request_selected)
                    @endforeach
                    @foreach ($pa_query as $approval)
                    @endforeach
                    <!-- block -->
                    <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="pull-right " style="padding-top:0%;">
                                    <a href="/payment_add_request_list" id="print" class="btn btn-success"
                                        style="font-family: all;font-size:small;">
                                        <i class="icon-arrow-left">
                                        </i><b><strong> {{ __('link.back') }}</strong></b></a>
                                </div>
                                <div class="alert alert-info" style="color: white;font-family: all;font-size:large;"><i
                                        class="icon-info-sign"></i>{{ __('payment.p_record_form') }} </div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                    <div class="control-group"
                                        style="border-color:green; border-style: solid; ;float:left;">
                                        <div class="controls">
                                            <a href="{{ url('print_voucher_form', $request_selected->request_id) }}"
                                                id="print" class="btn btn-success"
                                                style="font-family: all;"> <i class="icon-plus">
                                                </i><b><strong> {{ __('payment.p_voucher') }}</strong></b></a>
                                        </div>
                                    </div>
                                    <form action="{{ url('payment_add', $request_selected->request_id) }}" method="post"
                                        class="form-horizontal" autocomplete="off">
                                        @csrf
                                        <strong><b><i>
                                                    <h4 style="color: black;font-family: all;text-align:center;">
                                                </i><?php echo 'Directorate'; ?>:&nbsp;&nbsp;&nbsp;
                                                {{ $request_selected->directorate_name }}</b></strong></h4>
                                        <hr>
                                        <div class="control-group" style="float:left;width:30%">
                                            <label class="control-label" for="inputPassword"
                                                style="color: black;font-family: all;">
                                                <b><strong> {{ __('budget.amounttitle') }}:</strong></b> </label>
                                            <div class="controls">
                                                <input class="input focused" value="{{ $request_selected->amount }}"
                                                    name="amount" readonly="true" id="focusedInput" type="text"
                                                    placeholder="" style="color:black;font-family: all;"
                                                    required pattern="[0-9_]{1,}">
                                            </div>
                                        </div>
                                        <div class="control-group" style="float:left;width:30%;">
                                            <label class="control-label" for="inputPassword"
                                                style="color: black;font-family: all;">
                                                <b><strong> {{ __('payment.paid_to') }}:</strong></b>
                                            </label>
                                            <div class="controls">
                                                <input class="input focused" name="payee" readonly="true"
                                                    value="{{ $request_selected->requester_name }}" id="focusedInput"
                                                    type="text" placeholder="" style="color: black;font-family: all;"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="inputPassword"
                                                style="color: black;font-family: all; margin-right: 1%;">
                                                <b><strong> {{ __('budget.b_description') }}:</strong></b> </label>
                                            <div class="controls">
                                                <textarea name="description" cols="30" rows="5" readonly="true" id="comment"
                                                    style="border: double;color: black;font-family: all;" placeholder=" " required pattern="[a-zA-Z0-9_]{3,}">{{ $request_selected->description }}</textarea>
                                            </div>
                                        </div>
                                        <div class="control-group" style="float:left;">
                                            <label class="control-label" for="inputPassword"
                                                style="color: black;font-family: all;">
                                                <b><strong> {{ __('payment.Ref_No') }}:</strong></b>
                                            </label>
                                            <div class="controls">
                                                <input class="input focused" name="reference" id="focusedInput"
                                                    type="text" placeholder="Ref.No"
                                                    style="color: black;font-family: all;" required
                                                    pattern="[0-9_]{1,}">
                                            </div>
                                        </div>
                                        <div class="control-group" style="float:left;width:30%;margin-left:2%;">
                                            <label class="control-label" for="inputPassword"
                                                style="color: black;font-family: all;">
                                                <b><strong>{{ __('payment.p_mode') }}:</strong></b>
                                            </label>
                                            <div class="controls">
                                                <select class="chzn-select" name="mode" id="focusedInput"
                                                    type="text" placeholder="-{{ __('link.select') }}-" required
                                                    style="font-family: all;">
                                                    <option></option>
                                                    <option style="font-family: all;color: black;" value="Check">
                                                        {{ __('payment.check') }} </option>
                                                    <option style="font-family: all;color: black;" value="Bank">
                                                        {{ __('payment.bank') }} </option>
                                                    <option style="font-family: all;color: black;" value="Cash">
                                                        {{ __('payment.cash') }} </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div style="clear:both; border: solid;border-color:green;">
                                            <fieldset style="background-color:darkgray;">
                                                <legend
                                                    style="background-color:cornflowerblue;border-width:initial;text-align:center;">
                                                    {{ __('payment.acc_only') }} </legend>
                                                <label for=""></label>
                                                <div class="control-group" style=" width:25%; float:left;">
                                                    <label class="control-label" for="inputPassword"
                                                        style="color: black;font-family: all;">
                                                        <b><strong>{{ __('budget.budgetcategory') }}: </strong></b>
                                                    </label>
                                                    <div class="controls">
                                                        <input class="input focused" readonly="true"
                                                            value="{{ $request_selected->category_code }}"
                                                            name="category" id="focusedInput" type="text"
                                                            placeholder="category"
                                                            style="color: black;font-family:all;" required
                                                            pattern="[0-9_]{3}[-][0-9_]{2}[-][0-9_]{2}">
                                                    </div>
                                                </div>
                                                <div class="control-group"
                                                    style="float:left;width:22%;margin-left:2%;">
                                                    <label class="control-label" for="inputPassword"
                                                        style="color: black;font-family: all;">
                                                        <b><strong> {{ __('payment.debit') }}:</strong></b>
                                                    </label>
                                                    <div class="controls">
                                                        <input class="input focused" name="debit" id="focusedInput"
                                                            type="text" placeholder="Debit"
                                                            style="color: black;font-family: all;" required
                                                            pattern="[0-9_]{1,}">
                                                    </div>
                                                </div>
                                                <div class="control-group"
                                                    style="float:left;width:25%;margin-left:6%;">
                                                    <label class="control-label" for="inputPassword"
                                                        style="color: black;font-family: all;">
                                                        <b><strong>{{ __('payment.credit') }}:</strong></b>
                                                    </label>
                                                    <div class="controls">
                                                        <input class="input focused" name="credit" id="focusedInput"
                                                            type="text" placeholder="credit"
                                                            style="color: black;font-family: all;">
                                                    </div>
                                                </div>
                                                <div class="control-group" style="float:left; width:25%;">
                                                    <label class="control-label" for="inputPassword"
                                                        style="color: black;font-family: all;">
                                                        <b><strong>{{ __('payment.acc_code') }}:</strong></b>
                                                    </label>
                                                    <div class="controls">
                                                        <select name="account_code" class="chzn-select" required>
                                                            <option> </option>
                                                            @foreach ($account_query as $account)
                                                                <option value="{{ $account->account_code }}">
                                                                    {{ $account->account_code }}{{ $account->account_name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="control-group" style="float:left; margin-left:30%;">
                                                    <label class="control-label" for="inputPassword"
                                                        style="color: black;font-family: all;">
                                                        <b><strong> {{ __('payment.posted') }}:</strong></b>
                                                    </label>
                                                    <div class="controls">
                                                        <input class="input focused" name="posted" id="focusedInput"
                                                            type="text" placeholder="posted"
                                                            style="color: black;font-family: all;">
                                                    </div>
                                                </div>
                                                <div class="control-group"
                                                    style="float:left;margin-left:1%;margin-top:5%;">
                                                    <label class="control-label" for="inputPassword"
                                                        style="color: black;font-family: all;margin-left:35% ;width:60% ;">
                                                        <b><strong> {{ __('payment.authorizer') }}:</strong></b>
                                                    </label><br>
                                                    <div class="controls">
                                                        <input style="color:blue" class="input focused"
                                                            name="payer" readonly="true"
                                                            value="[{{ Auth::user()->signature }}]{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}"
                                                            id="focusedInput" type="text" placeholder=""
                                                            style="color: black;font-family: all;" required
                                                            pattern="[0-9_]{1,}">
                                                    </div>
                                                </div>
                                                <div class="control-group"
                                                    style="float:left;margin-left:15%;margin-top:5%;">
                                                    <label class="control-label" for="inputPassword"
                                                        style="color: black;font-family: all;margin-left:35%; width:60% ;">
                                                        <b><strong> {{ __('payment.approver') }}:</strong></b>
                                                    </label><br>
                                                    <div class="controls">
                                                        <input style="color:blue" class="input focused"
                                                            value="{{ $approval->signature_sign }}{{ $approval->approver_name }} {{ $approval->approved_date }}"
                                                            name="approver" readonly="true" id="focusedInput"
                                                            type="text" placeholder=""
                                                            style="color: black;font-family: all; " required
                                                            pattern="[0-9_]{1,}">
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                        <div class="control-group" style="clear:both ;">
                                            <hr>
                                            <div class="controls" style="margin-left:25%;">
                                                <button name="give" class="btn btn-info"
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
                </div></div></div> @include('home_page.footer') @include('home_page.script')
    </body>

    </html>
