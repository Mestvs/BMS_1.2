<div class="row-fluid">
    <!-- block -->
    <div class="block">
        <div class="navbar navbar-inner block-header">
            <div class="alert alert-info"><i
                    class="icon-info-sign"></i><b><strong>
                        {{ __('payment.e_payment') }} </strong></b></div>
        </div>
        <div class="block-content collapse in">
            <div class="span12">
                @foreach ($payment_query_selected as $p_query)
                @endforeach
                <form action="{{ url('edit_payment', $p_query->request_id) }}" method="post">
                    @csrf
                    <div class="control-group">
                        <label class="control-label" for="title" style="color: black;font-family: all;">
                            <b><strong> {{ __('link.Titleadmin') }} </strong></b> </label>
                        <div class="controls">
                            <input class="input focused" value="{{ $p_query->title }}" name="title" id="title"
                                type="text" placeholder="{{ __('link.Titleadmin') }}" required
                                style="font-family: all;color: black;">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="amount" style="color: black;font-family: all;">
                            <b><strong> {{ __('budget.amounttitle') }} </strong></b> </label>
                        <div class="controls">
                            <input class="input focused" value="{{ $p_query->amount }}" name="amount" id="amount"
                                type="text" placeholder="{{ __('budget.amounttitle') }}" required
                                style="font-family: all;color: black;">
                        </div>
                    </div>
                    <div class="control-group" style="float:left;">
                        <label class="control-label" for="inputPassword" style="color: black;font-family: all;">
                            <b><strong> {{ __('payment.paymentcategory') }}: </strong></b> </label>
                        <div class="controls">
                            <select name="b_category" class="chzn-select" required>
                                <option> </option>
                                @foreach ($b_category_query as $b_category)
                                    <option value="{{ $b_category->category_id }}">{{ $b_category->category_code }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="description" style="color: black;font-family: all;">
                            <b><strong> {{ __('budget.b_description') }} </strong></b> </label>
                        <div class="controls">
                            <textarea name="description" cols="60" rows="5" id="comment"
                                style="border: double;color: black;font-family: all;" placeholder="{{ __('payment.your_description_here') }} "
                                required pattern="[a-zA-Z0-9_]{3,}">{{ $p_query->description }}</textarea>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls">
                            <button name="update" class="btn btn-success"><i class="icon-save icon-large"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /block -->
</div>
