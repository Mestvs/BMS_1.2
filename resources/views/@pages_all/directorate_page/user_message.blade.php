@include('header')

<body> @include('@pages_all.admin_page.navbar') 
  <div class="row-fluid"> @include('@pages_all.directorate_page.sidebar_message')
     <div class="span6" id="content"style="margin-left:16%;">
            <div class="row-fluid">
                <!-- breadcrumb -->
                <ul class="breadcrumb" style="text-align:center;"> 
                <?php $Today = Date('y:m:d');?> 
                    <li><a href="#">Message</a><span class="divider">/</span></li>
                    <li><a href="#"><b>Inbox</b></a><span class="divider">/</span></li>
                    <li><a href="#">Date: {{$Today}}</a></li>
                </ul>
                <!-- end breadcrumb -->
                <!-- block -->
                <div id="block_bg" class="block">
                    <div class="navbar navbar-inner block-header">
                        <!-- errro message -->
                        @if ($message = Session::get('error'))
                            <div class="alert alert-danger alert-block" id="alert"
                                style="margin-left: 10%; margin-right:20%" aria-hidden="true">
                                <i class="icon-ban-circle"></i>
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                                <strong>{{ $message }}</strong>
                            </div>
                        @endif
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                        @endif

                        <!-- errro message end -->
                        <!-- success message -->
                        @if (session()->has('message'))
                            <div class="alert alert-success" style="margin-left: 30%; margin-right:40%">
                                <i class="icon-check"></i>
                                {{ session()->get('message') }}
                                <button type="button" class="close" data-bs-dismiss="alert"
                                    aria-hidden="true"></button>

                            </div>
                        @endif
                        <div id="" class="muted pull-left"></div>
                    </div>

                    <div class="block-content collapse in">
                        <div class="span12">
                            <form action="{{ route('read_message') }}" enctype="multipart/form-data" autocomplete="off"
                                method="POST">
                                @csrf
                                <div class="pull-right" style="font-size:large;">
                                    <button class="btn btn-info" name="read"><i class="icon-check"></i> Read</button>
                                    Check All <input type="checkbox" name="selectAll" id="checkAll" />
                                    <script>
                                        $("#checkAll").click(function() {
                                            $('input:checkbox').not(this).prop('checked', this.checked);
                                        });
                                    </script>
                                </div>
                                <ul class="nav nav-pills">
                                    <li class="active"><a href="{{ route('directorate.message') }}"><i
                                                class="icon-envelope-alt"></i>inbox</a></li>
                                    <li class=""><a href="{{ route('directorate.sent_message') }}"><i
                                                class="icon-envelope-alt"></i>Send messages</a></li>
                                </ul>
                                @if ($messages->count() > 0)
                                    @foreach ($messages as $message)
                                        <div class="post" id="del{{ $message->message_id }}">
                                            <div class="message_content"> {{ $message->content }} </div>
                                            <div class="pull-right">
                                                @if ($message->message_status == 'read')
                                                @else
                                                    <input id="" class="" name="selector[]"
                                                        type="checkbox" value="{{ $message->message_id }}" />
                                                @endif
                                            </div>
                                            <hr> Send by: <strong> {{ $message->sender_name }} </strong>
                                            <i class="icon-calendar"></i> {{ $message->date_sended }} <div
                                                class="pull-right" style="font-size:large ;">
                                                <a class="btn btn-link" href="#{{ $message->message_id }}"
                                                    data-toggle="modal"><i class="icon-remove"></i> Remove </a>
                                                @include('@pages_all.directorate_page.remove_inbox_message_modal')
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="alert alert-info" style="font-size:large ;"><i
                                            class="icon-info-sign"></i> No Message Inbox</div>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /block -->
            </div>
            <script type="text/javascript">
                $(document).ready(function() {
                    $('.remove').click(function() {
                        var id = $(this).attr("id");
                        $.ajax({
                            type: "GET",
                            url: "{{ url('remove_inbox_message/{id}') }}",
                            data: ({
                                id: id
                            }),
                            cache: false,
                            success: function(html) {
                                $("#del" + id).fadeOut('slow', function() {
                                    $(this).remove();
                                });
                                $('#' + id).modal('hide');
                                $.jGrowl("Your Sent message is Successfully Deleted", {
                                    header: 'Data Delete'
                                });
                            }
                        });
                        return false;
                    });
                });
            </script>

        </div>@include('@pages_all.directorate_page.create_message') </div>
    </div><br><br>@include('home_page.footer')
    @include('home_page.script')
