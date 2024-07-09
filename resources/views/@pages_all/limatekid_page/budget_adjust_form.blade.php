<div class="row-fluid">
    <!-- block -->
    @foreach ($budget_selected as $b_selected)
        <?php $Dept = $b_selected->zerfe_name; ?>
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
            <div class="alert alert-info"><i class="icon-info-sign"></i>
                {{ __('budget.b_adjust_form') }} </div>
        </div>
        <div class="block-content collapse in">
            <div class="span12">
                <form action="{{ route('limatekid.budget.adjust', ['category' => $category, 'bd_id' => $budget_detail_id]) }}"
                    method="post" class="form-horizontal" autocomplete="off">
                    @csrf
                    <strong><b><i>
                                <h4 style="color: black;font-family: all;">
                                    <b><strong style="margin-left: %;">Department: </strong></b>&nbsp;&nbsp;
                                    {{ $Dept }}
                            </i></b></strong></h4>
                    <hr>
                    </p>
                    <b>Account Code:</b>&nbsp;<span style="font-weight:normal">{{ $account_code }}</span>
                    <b>Balance:</b>&nbsp;&nbsp;<span style="font-weight:normal">{{ $amount }}</span></p>
                    <div class="control-group" style="clear:both ;">
                        <hr>
                        Transfer To:
                        <select name="account_code" class="chzn-select" required>
                            <option> </option>
                            @foreach ($account_query as $account)
                                <option value="{{ $account->account_id}}">
                                    {{ $account->account_code }}{{ $account->account_name }}
                                </option>
                            @endforeach
                        </select>
                        <hr>

                        Amount:&nbsp;&nbsp;<input style="padding:4%" class="input focused"
                            name="amount" id="focusedInput" type="text" placeholder="amount"
                            style="color: black;font-family: all;" required pattern="[0-9_]{1,}">

                        <hr>
                        <div class="controls"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button name="give"
                                class="btn btn-info" style="color: black;font-family: all;"><i
                                    class="icon-plus-sign"></i><b>Transfer </b></button>
                            
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
