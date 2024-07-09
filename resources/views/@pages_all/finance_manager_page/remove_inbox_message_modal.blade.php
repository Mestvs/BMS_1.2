<!-- Modal -->
<div id="{{$message->message_id}}" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-header">
     <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
     <h3 id="myModalLabel">Remove Message</h3>
    </div>
    <div class="modal-body">
     <div class="alert alert-danger"> Are you sure you want to Remove this message? </div>
     <form  action="{{url('remove_inbox_message',$message->message_id)}}" enctype="multipart/form-data" autocomplete="off" method="POST">
      @csrf
        <center>
       <div class="control-group">
       </div>
      </center>
    </div>
    <div class="modal-footer">
     <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i> Close</button>
     <button id="{{$message->message_id}}" class="btn btn-danger remove" data-dismiss="modal" aria-hidden="true"><i
       class="icon-check icon-large"></i> Yes</button>
    </div>
   </div>