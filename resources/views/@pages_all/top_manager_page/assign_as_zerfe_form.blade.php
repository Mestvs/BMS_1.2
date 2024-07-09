<div class="row-fluid">
    <!-- block -->
    <div class="block">
        <div class="navbar navbar-inner block-header">
            <div class="alert alert-info"><i class="icon-info-sign"></i><b><strong>
                        {{ __('link.a_as_zerfe_Heads') }} </strong></b></div>
        </div>
        <div class="block-content collapse in">
            <div class="span12">
                @if ($user_check == 'no')
                    <?php
                    $firstname = '';
                    $lastname = '';
                    $email = '';
                    $user_id = '';
                    ?>
                @else
                    @foreach ($user_check as $check)
                        <?php
                        $firstname = $check->first_name;
                        $lastname = $check->last_name;
                        $user_id = $check->id;
                        $email = $check->email;
                        ?>
                    @endforeach
                @endif
                <form action="{{ url('approve_as_zerfe', $user_id) }}" method="post" autocomplete="off">
                    @csrf
                    <div class="control-group">
                        <div class="controls">
                            <input class="input focused" value="{{ $firstname }}" name="firstname" id="focusedInput"
                                type="text" placeholder="{{ __('link.f_name') }}" required
                                style="font-family: all;color: black;">
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls">
                            <input class="input focused" value="{{ $lastname }}" name="lastname" id="focusedInput"
                                type="text" placeholder="{{ __('link.l_name') }}" required
                                style="font-family: all;color: black;">
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls">
                            <input class="input focused" value="{{ $email }}" name="username" id="focusedInput"
                                type="text" placeholder="{{ __('link.email') }}"
                                style="font-family: all;color: black;" required>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls">
                            <select name="type" class="chzn-select" required>
                                <option> </option>
                                @foreach ($zerfe_query as $zerfe)
                                    <option value="{{ $zerfe->zerfe_id }}">{{ $zerfe->zerfe_name }} Head </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls">
                            <select class="input focused" id="focusedInput" value="<?php //echo $row['status'];
                            ?>" name="status"
                                id="focusedInput" type="text" placeholder="type" required
                                style="font-family: all;color: black;">
                                <option style="font-family: all;color: black;" value="Approved">Approved</option>
                                <option style="font-family: all;color: black;" value="Not Approved">Not Approved
                                </option>
                                <option style="font-family: all;color: black;">---{{ __('link.select') }}--- </option>
                            </select>
                        </div>
                    </div>
                    <div class="control-group" style="padding-bottom:4%; padding-top:4% ;">
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
