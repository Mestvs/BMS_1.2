<div class="row-fluid">
    <!-- block -->
    @foreach ($budget_detail_selected as $b_selected)
    
@endforeach
@if ($budget_detail_selected->count() > 0)
    @foreach ($budget_detail_selected as $detail_selected)
        <?php
        $amount = $detail_selected->amount;
        $account_name = $detail_selected->account_name;
        $account_code = $detail_selected->account_code;
        $budget_detail_id = $detail_selected->budget_detail_id;
        ?>
    @endforeach
@else
    <?php
    $amount = '';
    $account_name = '';
    $account_code = '';
    $budget_detail_id = 0;
    ?>
@endif
    <div class="block">
        <div class="navbar navbar-inner block-header">
            <div class="alert alert-info"><i
                    class="icon-info-sign"></i>
                {{ __('budget.b_add_detail_form') }} </div>
        </div>
        <div class="block-content collapse in" style="margin-left:0%;">
            <div class="span12">

                <form action="{{ url('budget_categorize_update', $budget_detail_id) }}" method="POST" class="form-horizontal"
                    autocomplete="off">
                    @csrf
                    <strong><b><i>
                                <h4 style="color: black;font-family: all;">
                                    <b><strong style="margin-left: 17%;">Department:
                                        </strong></b>&nbsp;&nbsp;{{ $z_name }}
                            </i></b></strong></h4>
                    <hr>
                    <div class="control-group" style="float:left ;">
                        <label class="control-label" for="inputPassword" style="color: black;font-family: all;">
                            <b><strong>{{ __('budget.budgetcategory') }}:</strong></b> </label>
                        <div class="controls">
                            <input class="input focused" readonly name="category" value="{{ $b_category }}"
                                id="focusedInput" type="text" placeholder="category"
                                style="color: black;font-family: all;" required
                                pattern="[0-9_]{3}[-_]{1}[0-9_]{2}[-_]{1}[0-9_]{2}">

                        </div>
                    </div>
                    <div class="control-group" style="float:left ;">
                        <label class="control-label" for="inputPassword"style="color: black;font-family: all;">
                            <b><strong>{{ __('payment.acc_code') }}:</strong></b> </label>
                        <div class="controls">
                            <input class="input focused" readonly value="{{$account_code}}" name="acc_code" id="focusedInput" type="text"
                            placeholder="account code" style="color: black;font-family: all;" required
                            pattern="[0-9_]{1,}">
                        </div>
                    </div>
                    <div class="control-group" style="float:left;">
                        <label class="control-label" for="inputPassword"style="color: black;font-family: all;">
                            <b><strong>{{ __('budget.amounttitle') }}:</strong></b> </label>
                        <div class="controls">
                            <input class="input focused" name="amount" id="focusedInput" type="text"
                                placeholder="amount" style="color: black;font-family: all;" required
                                pattern="[0-9_]{1,}">
                        </div>
                    </div>
                    <div class="control-group"style="clear:both ;">
                        <hr>
                        <div class="controls">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button name="give" class="btn btn-info"
                                style="color: black;font-family: all;"><i class="icon-plus-sign"></i><b>
                                    {{__('budget.b_update')}}</b></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
