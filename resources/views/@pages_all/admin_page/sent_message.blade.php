@include('header')
<body> @include('@pages_all.admin_page.navbar') <div class="row-fluid"> @include('@pages_all.admin_page.sidebar_message') <div
   class="span6" id="content" style="margin-left:16%;">
   <div class="row-fluid">
    <!-- breadcrumb -->
    <ul class="breadcrumb" style="text-align:center;"> <?php
$Today = Date('y:m:d');

?> <li><a href="#">Message</a><span class="divider">/</span></li>
     <li><a href="#"><b>Inbox</b></a><span class="divider">/</span></li>
     <li><a href="#">Date: <?php echo $Today; ?></a></li>
    </ul>
    <!-- end breadcrumb -->
    <!-- block -->
    <div id="block_bg" class="block">
     <div class="navbar navbar-inner block-header">
      <div id="" class="muted pull-left"></div>
     </div>
     <div class="block-content collapse in">
      <div class="span12">
       <ul class="nav nav-pills">
        <li class="">
         <a href="/user_message"><i class="icon-envelope-alt"></i>inbox</a>
        </li>
        <li class="active">
         <a href="/sent_message"><i class="icon-envelope-alt"></i>Sent messages</a>
        </li>
       </ul> <?php/*
//joining
$query_announcement = mysqli_query($link, "select * from message_sent
																	LEFT JOIN users ON users.user_id = message_sent.reciever_id
																	where  sender_id = '$session_id'  order by date_sended DESC
																	") or die(mysqli_error());
$count_my_message = mysqli_num_rows($query_announcement);
if ($count_my_message != '0') {
    
 while ($row = mysqli_fetch_array($query_announcement)) {
  $id = $row['message_sent_id'];
*/?>
@if($recievers->count()>0)
@foreach ( $recievers as $reciever)

<div class="post" id="del{{$reciever->message_sent_id}}"> {{$reciever->content}}
        <hr> Sent to: <strong>{{$reciever->reciever_name}}</strong>
        <i class="icon-calendar"></i> {{$reciever->date_sended}} <div class="pull-right">
         <a class="btn btn-link" href="#{{$reciever->message_sent_id}}" data-toggle="modal"><i class="icon-remove"></i> Remove </a>
        @include('@pages_all.admin_page.remove_sent_message_modal')
        </div>
       </div>
       @endforeach
@else <div class="alert alert-info"><i class="icon-info-sign"></i> No Message in your Sent Items</div> 

@endif
      </div>
     </div>
    </div>
    <!-- /block -->
   </div>
   <script type="text/javascript">
    $(document).ready(function () {

     $('.remove').click(function () {

      var id = $(this).attr("id");
      $.ajax({
       type: "GET",
       url: "{{url('remove_sent_message/{id}')}}",
       data: ({ id: id }),
       cache: false,
       success: function (html) {
        $("#del" + id).fadeOut('slow', function () { $(this).remove(); });
        $('#' + id).modal('hide');
        $.jGrowl("Your Sent message is Successfully Deleted", { header: 'Data Delete' });

       }
      });
      return false;
     });
    });
   </script>
  </div> @include('@pages_all.admin_page.create_message') </div>  </div>@include('home_page.footer')
 @include('home_page.script') </body>

</html>