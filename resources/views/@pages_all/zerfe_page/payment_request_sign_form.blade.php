<div class="row-fluid">
 <!--block -->
 <div class="block">
  <div class="navbar navbar-inner block-header">
   <div class="alert alert-info" style="font-family: all;font-size:large;"><i class="icon-info-sign"></i><b><strong>
      {{__('budget.signr')}} </strong></b></div>
  </div>
  <div class="block-content collapse in">
   <div class="span12"> 
    @foreach ($p_request_selected as $request_selected )
      
    @endforeach
    <form action="{{url('/payment_sign',$request_selected->request_id)}}" method="post">
      @csrf
     <div class="control-group" style="font-size:x-large ;">
      <div class="controls">
       <small>Requester:</small><br>
       <input class="input focused" value="{{$request_selected->requester_name}}" name="requester" id="focusedInput"
        type="text" placeholder="{{__('link.f_name')}}" required
        style="font-family: all;color: black;">
      </div>
     </div>
     <div class="control-group" style="font-size:x-large ;">
      <div class="controls">
       <small>Directorate:</small><br>
       <input class="input focused" value="{{$request_selected->directorate_name}}" name="sector" id="focusedInput"
        type="text" placeholder="{{__('link.f_name')}}" required
        style="font-family: all;color: black;">
      </div>
     </div>
     <div class="control-group" style="font-size:x-large ;">
      <div class="controls">
       <small>Signer Name:</small>
       <input class="input focused" value="{{Auth::user()->first_name}} {{Auth::user()->last_name}}"
        name="signer" id="focusedInput" type="text" placeholder="{{__('link.l_name')}}"
        required style="font-family: all;color: black;">
      </div>
     </div>
     <div class="control-group" style="font-size:x-large ;">
      <div class="controls">
       <small>Signature:</small><br>
       <select class="input focused" id="focusedInput" value="" name="sign"
        id="focusedInput" type="text" placeholder="type" required style="font-family: all;color: black;">
        <option style="font-family: all;color: black;" value="[{{Auth::user()->signature}}]">
         [{{Auth::user()->signature}}]</option>
        <option style="font-family: all;color: black;" value="[rejected]">Reject</option>
       </select>
      </div>
     </div>
     <div class="control-group">
      <div class="controls">
       <button name="update" class="btn btn-success"><i class="icon-pencil icon-large">Sign</i></button>
      </div>
     </div>
    </form>
   </div>
  </div>
 </div>
 <!-- /block -->
</div>