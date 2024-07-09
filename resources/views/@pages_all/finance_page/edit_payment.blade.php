<cite type="hidden"></cite>
<base href="/public">
@include('header')
<body> @include('@pages_all.admin_page.navbar')
    <body>
        <div class="row-fluid"> @include('@pages_all.finance_page.sidebar_payment') <div class="span6" id="adduser"
                style="width:80%;margin-left:16%;">
                <div class="row-fluid">
                    <div class="pull-right">
                    </diV>
                    @foreach ($pa_query as $approval)
                    @endforeach
                    @foreach ($authrizer_query as $authrizer)
                    @endforeach
                    @foreach ($payment_request as $request)
                    @endforeach
                    @foreach ($payment_query as $payment)
                    @endforeach
                    <!-- block -->
                    <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="pull-right " style="padding-top:0%;">
                                    <a href="{{url('/edit/payment/form',$request->request_id)}}" id="print"
                                        class="btn btn-success" style="font-family: all;font-size:small;">
                                        <i class="icon-arrow-left">
                                        </i><b><strong> {{ __('link.back') }}</strong></b></a>
                                </div>
                                <div class="alert alert-info" style="color: white;font-family: all;font-size:large;"><i
                                        class="icon-info-sign"></i> {{ __('payment.p_voucher') }} </div>
                            </div>
                            <div class="block-content collapse in" style="font-size:large ;">
                                <div class="span12">
                                    <div class="control-group"
                                        style="border-color:blue; border-style: solid; width:8% ;background-color:blue;">
                                        <div class="controls">
                                            <a href=""id="print" onclick="printVoucher('voucher')"
                                                class="btn " style="font-family: all;background-color:blue;">
                                                <i class="icon-print">
                                                </i><b><strong>{{ __('payment.Print') }}</strong></b></a>
                                        </div>
                                    </div>
                                    <form method="post" class="form-horizontal" autocomplete="off" id="voucher">
                                        <strong><b><i>
                                                    <h4 style="color: black;font-family: all; text-align: center;">
                                                        <?php echo 'Directorate'; ?>:&nbsp;&nbsp;&nbsp;{{ $request->directorate_name }}
                                            </b></strong>
                                        </h4>
                                        <hr>
                                        <div class="control-group" style="float:left;width:30%">
                                            <label class="control-label" for="inputPassword"
                                                style="color: black;font-family: all;">
                                                <b><strong> {{ __('budget.amounttitle') }}:</strong></b> </label>
                                            <div class="controls">
                                                <input class="input focused" value="{{ $payment->amount }}"
                                                    name="amount" readonly="true" id="focusedInput" type="text"
                                                    placeholder="" style="color: black;font-family: all;" required
                                                    pattern="[a-zA-Z0-9_]{1,}">
                                            </div>
                                        </div>
                                        <div class="control-group" style="float:left;width:30%">
                                            <label class="control-label" for="inputPassword"
                                                style="color: black;font-family: all;">
                                                <b><strong> {{ __('payment.paid_to') }}:</strong></b>
                                            </label>
                                            <div class="controls">
                                                <input class="input focused" name="payee" readonly="true"
                                                    value="{{ $payment->paid_to }}" id="focusedInput" type="text"
                                                    placeholder="" style="color: black;font-family: all;" required
                                                    pattern="[0-9_]{1,}">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="inputPassword"
                                                style="color: black;font-family: all;">
                                                <b><strong> {{ __('budget.b_description') }}:</strong></b> </label>
                                            <div class="controls">
                                                <textarea name="description" cols="30" rows="5" readonly="true" id="comment"
                                                    style="border: double;color: black;font-family: all;" placeholder=" " required pattern="[a-zA-Z0-9_]{3,}">{{ $request->description }}</textarea>
                                            </div>
                                        </div>
                                        <div class="control-group" style="float:left;">
                                            <label class="control-label" for="inputPassword"
                                                style="color: black;font-family: all;">
                                                <b><strong>{{ __('payment.Ref_No') }}:</strong></b>
                                            </label>
                                            <div class="controls">
                                                <input class="input focused" name="reference"
                                                    value="{{ $payment->reference_no }}" id="focusedInput"
                                                    type="text" placeholder="Ref.No"
                                                    style="color: black;font-family: all;" required
                                                    pattern="[0-9_]{1,}">
                                            </div>
                                        </div>
                                        <div class="control-group"
                                            style="float:left;width:30%;margin-left:2%;margin-bottom:2%;">
                                            <label class="control-label" for="inputPassword"
                                                style="color: black;font-family: all;">
                                                <b><strong>{{ __('payment.p_mode') }}:</strong></b> </label>
                                            <div class="controls">
                                                <input class="input focused" name="mode"
                                                    value="{{ $payment->payment_mode }}" id="focusedInput"
                                                    type="text" placeholder="mode"
                                                    style="color: black;font-family: all;" required>
                                            </div>
                                        </div>
                                        <div style="clear:both; border: solid;border-color:green;margin-top:2%;">
                                            <fieldset style="background-color:darkgray;">
                                                <legend
                                                    style="background-color:cornflowerblue;border-width:initial;text-align:center;">
                                                    {{ __('payment.acc_only') }}</legend>
                                                <label for=""></label>
                                                <div class="control-group" style=" width:25%; float:left;">
                                                    <label class="control-label" for="inputPassword"
                                                        style="color: black;font-family: all;">
                                                        <b><strong>{{ __('budget.budgetcategory') }}:</strong></b>
                                                    </label>
                                                    <div class="controls">
                                                        <input class="input focused" readonly="true"
                                                            value="{{ $request->category_code }}" name="category"
                                                            id="focusedInput" type="text" placeholder="category"
                                                            style="color: black;font-family: all;" required
                                                            pattern="[0-9_]{3}[-][0-9_]{2}[-][0-9_]{2}">
                                                    </div>
                                                </div>
                                                <div class="control-group"
                                                    style="float:left;width:22%;margin-left:2%;">
                                                    <label class="control-label" for="inputPassword"
                                                        style="color: black;font-family: all;">
                                                        <b><strong>{{ __('payment.debit') }}:</strong></b>
                                                    </label>
                                                    <div class="controls">
                                                        <input class="input focused" name="debit"
                                                            value="{{ $payment->debit }}" id="focusedInput"
                                                            type="text" placeholder="Debit"
                                                            style="color: black;font-family: all;" required
                                                            pattern="[0-9_]{1,}">
                                                    </div>
                                                </div>
                                                <div class="control-group"
                                                    style="float:left;width:25%;margin-left:6%;">
                                                    <label class="control-label" for="inputPassword"
                                                        style="color: black;font-family: all;">
                                                        <b><strong> {{ __('payment.credit') }}:</strong></b>
                                                    </label>
                                                    <div class="controls">
                                                        <input class="input focused" name="credit" id="focusedInput"
                                                            type="text" placeholder="credit"value="{{ $payment->credit }}"
                                                            style="color: black;font-family: all;">
                                                    </div>
                                                </div>
                                                <div class="control-group" style="float:left; width:25%;">
                                                    <label class="control-label" for="inputPassword"
                                                        style="color: black;font-family: all;">
                                                        <b><strong> {{ __('payment.acc_code') }}:</strong></b>
                                                    </label>
                                                    <div class="controls">
                                                        <input class="input focused" name="account_code"
                                                            value="{{ $payment->account_code }}" id="focusedInput"
                                                            type="text" placeholder="account code"
                                                            style="color: black;font-family: all;">
                                                    </div>
                                                </div>
                                                <div class="control-group" style="float:left; margin-left:30%;">
                                                    <label class="control-label" for="inputPassword"
                                                        style="color: black;font-family: all;">
                                                        <b><strong> {{ __('payment.posted') }}:</strong></b>
                                                    </label>
                                                    <div class="controls">
                                                        <input class="input focused" name="posted" id="focusedInput"
                                                            type="text" placeholder="posted"value="{{ $payment->posted }}"
                                                            style="color: black;font-family: all;">
                                                    </div>
                                                </div>
                                                <div class="control-group" style="clear:both;width:45%;">
                                                    <label class="control-label" for="inputPassword"
                                                        style="color: black;font-family: all;">
                                                        <b><strong> {{ __('payment.acc_name') }}:</strong></b>
                                                    </label>
                                                    <div class="controls">
                                                        <input class="input focused" name="account_name"
                                                            value="{{ $payment->account_name }}" id="focusedInput"
                                                            type="text" placeholder="account name"
                                                            style="color: black;font-family: all;" required>
                                                    </div>
                                                </div>
                                                <div class="control-group"
                                                    style="float:left;margin-left:1%;margin-top:5%;">
                                                    <label class="control-label" for="inputPassword"
                                                        style="color: black;font-family: all;margin-left:30% ;width:60% ;">
                                                        <b><strong>{{ __('payment.authorizer') }}:</strong></b>
                                                    </label><br>
                                                    <div class="controls" style="margin-left:35% ;">
                                                        <input style="color:blue" class="input focused"
                                                            name="payer" readonly="true"
                                                            value="[{{ $authrizer->signature }}]{{ $authrizer->authorizer_name }}"
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
                                                    <div class="controls" style="margin-left:37% ;">
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
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div></div></div> @include('home_page.footer') @include('home_page.script')
    </body>

    </html>
