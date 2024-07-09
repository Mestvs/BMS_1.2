<div class="row-fluid">
    <!-- block -->
    <div class="block">
        <div class="navbar navbar-inner block-header">
            <div class="alert alert-info"><i class="icon-info-sign"></i><b><strong>
                        {{ __('link.edit_role') }} </strong></b></div>
        </div>
        <div class="block-content collapse in">
            <div class="span12">
                @foreach ($directorate_query as $directorate)
                @endforeach
                <form action="{{ url('update_role', $directorate->directorate_id) }}" method="post">
                    @csrf
                    <div class="control-group">
                        <div class="controls">
                            <input class="input focused" value="{{ $directorate->directorate_id }}"
                                name="directorate_id" id="focusedInput" type="text" placeholder="" required
                                style="font-family: all;color: black;">
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls">
                            <input class="input focused" value="{{ $directorate->directorate_name }}"
                                name="directorate_name" id="focusedInput" type="text" placeholder="" required
                                style="font-family: all;color: black;">
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls">
                            <input class="input focused" value="{{ $directorate->zerfe_id }}" name="zerfe_id"
                                id="focusedInput" type="text" placeholder="" style="font-family: all;color: black;"
                                required>
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
