<div class="span3" id="message">
    <div class="row-fluid">
        <!-- block -->
        <div class="block">
            <div class="navbar navbar-inner block-header">
                <div id="" class="muted pull-left">
                    <h4><i class="icon-pencil"></i> Create Message</h4>
                </div>
            </div>
            <div class="block-content collapse in">
                <div class="span12">
                    <form method="post" id="send_message">
                        @csrf
                        <div class="control-group">
                            <label>To:</label>
                            <div class="controls">
                                <select name="user_id" class="chzn-select" required>
                                    <option></option>
                                    @foreach ($user as $users)
                                        <option value="{{ $users->id }}">{{ $users->first_name }}
                                            {{ $users->last_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label>Content:</label>
                            <div class="controls">
                                <textarea name="my_message" class="my_message" required></textarea>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="controls">
                                <button class="btn btn-info"><i class="icon-envelope-alt"></i> Send </button>

                            </div>
                        </div>
                    </form>

                    <script>
                        jQuery(document).ready(function() {
                            jQuery("#send_message").submit(function(e) {
                                e.preventDefault();
                                var formData = jQuery(this).serialize();
                                $.ajax({
                                    type: "POST",
                                    url: "{{ url('send_message') }}",
                                    data: formData,
                                    success: function(html) {

                                        $.jGrowl("Message Successfully Sent", {
                                            header: 'Message Sent'
                                        });
                                        var delay = 2000;
                                        setTimeout(function() {
                                            window.location = '{{ route('directorate.message') }}'
                                        }, delay);
                                    }
                                });
                                return false;
                            });
                        });
                    </script>

                </div>
            </div>
        </div>
        <!-- /block -->
    </div>
</div>
