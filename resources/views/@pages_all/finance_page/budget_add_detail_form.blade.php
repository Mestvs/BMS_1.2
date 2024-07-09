<div class="row-fluid">
    <!-- block -->
    <div class="block">
        <div class="navbar navbar-inner block-header">
            <div class="alert alert-info"><i
                    class="icon-info-sign"></i>
                {{ __('budget.b_add_detail_form') }} </div>
        </div>
        <div class="block-content collapse in" style="margin-left:0%;">
            <div class="span12">

                <form action="{{ url('budget_detail_add', $budget_id) }}" method="POST" class="form-horizontal"
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
                            <select name="account_code" class="chzn-select" required>
                                <option> </option>
                               @foreach ($db_results as $db_result)
                                    <option value="{{ $db_result->account_id }}">
                                        {{ $db_result->account_code }}

                                    </option>
                                @endforeach
                            </select>
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
                                    {{__('budget.b_submit')}}</b></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
