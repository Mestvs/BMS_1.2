<div class="row-fluid">
    <!-- block -->
    <div class="block">
        <div class="navbar navbar-inner block-header">
            <div class="alert alert-info"><i
                    class="icon-info-sign"></i>
                {{ __('budget.acc_adjust_form') }} </div>
        </div>
        <div class="block-content collapse in" style="margin-left:0%;">
            <div class="span12">
                <!--query from budet detail to display on fields-->
                <form action="/adjust_account_code" method="post" class="form-horizontal" autocomplete="off">
                    @csrf
                    <div class="control-group">
                        <label class="control-label" for="type" style="font-family: all;color: black;"><b>
                                {{ __('link.zerfe') }}: </b></label>
                        <div class="controls">
                            <select name="type" class="chzn-select" required>
                                <option> </option>
                                @foreach ($zerfe_query as $z_query)
                                    <option value="{{ $z_query->zerfe_id }}"> {{ $z_query->zerfe_name }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="type" style="font-family: all;color: black;"><b>
                                {{ __('payment.acc_code') }}: </b></label>
                        <div class="controls">
                            <select name="acc_category" class="chzn-select" required>
                                <option> </option>
                                @foreach ($acc_cat_query as $acc_category)
                                    <option value="{{ $acc_category->account_id }}"> {{ $acc_category->account_name }}
                                        {{ $acc_category->account_code }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="control-group" style="clear:both ;">
                        <hr>
                        <div class="controls"> &nbsp;&nbsp;<button name="give" class="btn btn-info"
                                style="color: black;font-family: all;"><i class="icon-plus-sign"></i><b>
                                    {{ __('budget.b_submit') }} </b></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
