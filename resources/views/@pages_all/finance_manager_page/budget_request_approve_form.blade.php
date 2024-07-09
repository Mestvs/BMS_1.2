<div class="row-fluid" style="position:sticky;top:10%;">
    <!--block -->
    <div class="block">
        <div class="navbar navbar-inner block-header">
            <div class="alert alert-info"><i class="icon-info-sign"></i><b><strong>
                        {{ __('budget.approve_budget') }} </strong></b></div>
        </div>
        <div class="block-content collapse in">
            <div class="span12">
                @foreach ($budget_request_query as $budget_request)
                @endforeach
                <form action="{{ url('budget_approve', $budget_request->b_request_id) }}" method="post">
                    @csrf
                    <div class="control-group">
                        <div class="controls">
                            <small>Zerfe_name:</small>
                            <input class="input focused" value="{{ $budget_request->zerfe_name }}" name="sector"
                                id="focusedInput" type="text" placeholder="zerfe" required
                                style="font-family: all;color: black;">
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls">
                            <small>Signer Name:</small>
                            <input class="input focused"
                                value="{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}" name="signer"
                                id="focusedInput" type="text" placeholder="full name" required
                                style="font-family: all;color: black;">
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls">
                            <small>Signature:</small>
                            <select class="input focused" id="focusedInput" value="{{ $budget_request->status }}"
                                name="sign" id="focusedInput" type="text" placeholder="type" required
                                style="font-family: all;color: black;">
                                <option style="font-family: all;color: black;" value="[{{ Auth::user()->signature }}]">
                                    [{{ Auth::user()->signature }}]</option>
                                <option style="font-family: all;color: black;" value="[rejected]">Reject</option>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls">
                            <button name="update" class="btn btn-success"><i
                                    class="icon-pencil icon-large">Sign</i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /block -->
</div>
