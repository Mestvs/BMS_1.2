<div class="row-fluid">
    <!--block -->
    <div class="block">
        <div class="navbar navbar-inner block-header">
            <div class="alert alert-info"><i
                    class="icon-info-sign"></i><b><strong>Approve Payment</strong></b></div>
        </div>
        <div class="block-content collapse in">
            <div class="span12">
                @foreach ($payment_request_selected as $request_selected)
                @endforeach
                <form action="{{ url('approve_payment', $request_selected->request_id) }}" method="post">
                    @csrf
                    <div class="control-group">
                        <div class="controls">
                            <small>Requester:</small>
                            <input class="input focused" value="{{ $request_selected->requester_name }}"
                                name="requester" id="focusedInput" type="text" placeholder="{{ __('link.f_name') }}"
                                required style="font-family: all;color: black;">
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls">
                            <small>Directorate:</small>
                            <input class="input focused" value="{{ $request_selected->directorate_name }}"
                                name="sector" id="focusedInput" type="text" placeholder="{{ __('link.f_name') }}"
                                required style="font-family: all;color: black;">
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls">
                            <small>Signer Name:</small>
                            <input class="input focused"
                                value="{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}" name="signer"
                                id="focusedInput" type="text" placeholder="{{ __('link.l_name') }}" required
                                style="font-family: all;color: black;">
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls">
                            <small>Signature:</small>
                            <select class="input focused" id="focusedInput" value="<?php //echo $row['status'];
                            ?>" name="sign"
                                id="focusedInput" type="text" placeholder="type" required
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
