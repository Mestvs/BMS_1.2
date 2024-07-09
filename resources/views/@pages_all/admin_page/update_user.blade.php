<div class="row-fluid">
 <!-- block -->
 <div class="block">
  <div class="navbar navbar-inner block-header">
   <div class="alert alert-info" style="font-family: all; font-size: large;;"><i class="icon-info-sign"></i><b><strong>
     {{__('link.edit_user')}}</strong></b></div>
  </div>
  <div class="block-content collapse in">
   <div class="span12"> 
    <form action="{{url('edit_user',$data->id)}}" method="POST" enctype="multipart/form-data">
     @csrf
        <div class="control-group">
      <div class="controls">
       <input class="input focused" value="{{$data->first_name}}" name="firstname" id="focusedInput"
        type="text" placeholder="" required
        style="font-family: all;color: black;">
      </div>
     </div>
     <div class="control-group">
      <div class="controls">
       <input class="input focused" value="{{$data->last_name}}" name="lastname" id="focusedInput"
        type="text" placeholder="" required
        style="font-family: all;color: black;">
      </div>
     </div>
     <div class="control-group">
      <div class="controls">
       <input class="input focused" value="{{$data->email}}" name="email" id="focusedInput"
        type="email" placeholder=""
        style="font-family: all;color: black;" required>
      </div>
     </div>
     <div class="control-group">
      <div class="controls">
      </div>
     </div>
     <div class="control-group">
      <div class="controls">
       <select class="input focused" id="focusedInput" value="{{$data->account_status}}" name="status"
        id="focusedInput" type="text" placeholder="type" required style="font-family: all;color: black;">
        <option style="font-family: all;color: black;" value="Activated">Activated</option>
        <option style="font-family: all;color: black;" value="DeActivated">DeActivated</option>
        <option style="font-family: all;color: black;">---{{__('link.select')}}--- </option>
       </select>
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
