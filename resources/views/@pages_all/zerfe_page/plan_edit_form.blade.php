<div class="row-fluid">
 <!-- block -->
 <div class="block">
  <div class="navbar navbar-inner block-header">
   <div class="alert alert-info" style="font-family: all; font-size: medium;"><i class="icon-info-sign"></i><b><strong>{{__('plan.e_plan')}} </strong></b></div>
  </div>
  <div class="block-content collapse in">
   <div class="span12">
      @foreach ($plan_query_selected as $plan_selected )
         
      @endforeach 
      
      <form action="{{url('plan_edit',$plan_selected->directorate_plan_id)}}" method="post">
     @csrf
         <div class="control-group" style="">
      <label class="control-label" for="inputPassword" style="font-family: all;color: black;"><b><strong>{{__('plan.plantype')}}: </strong></b> </label>
      <div class="controls">
       <select class="chzn-select" name="p_type" id="focusedInput" type="text"
        placeholder="-{{__('link.select')}}-" required style="font-family: all;">
        <option selected value="{{$plan_selected->plan_type}}"> {{$plan_selected->plan_type}} </option>
        <option style="font-family: all;color: black;" value="Annual"> {{__('plan.yearly')}}</option>
        <option style="font-family: all;color: black;" value="Quarter">{{__('plan.quarter')}} </option>
        <option style="font-family: all;color: black;" value="Monthly">{{__('plan.monthly')}} </option>
       </select>
      </div>
     </div>
     <div class="control-group" style="float:left; width:20%;">
      <label class="control-label" for="inputPassword" style="font-family: all;color: black;"><b><strong>{{__('link.zerfe')}}:</strong></b> </label>
      <div class="controls">
       <select class="chzn-select" name="z_name" id="focusedInput" type="text"
        placeholder="-{{__('link.select')}}-" required style="font-family: all;">
        <option></option>
        <option selected style="font-family: all;color: black;" value="{{$plan_selected->zerfe_name}}">
         {{$plan_selected->zerfe_name}} </option>
        <option style="font-family: all;color: black;" value="Annual">{{__('link.a_financeZ')}}</option>
        <option style="font-family: all;color: black;" value="Quarter">{{__('link.i_c_tZ')}} </option>
        <option style="font-family: all;color: black;" value="Monthly">{{__('link.t_managementZ')}}</option>
        <option style="font-family: all;color: black;" value="Monthly">{{__('link.s_&_technologyZ')}}</option>
       </select>
      </div>
     </div>
     <div class="control-group" style="clear:both;">
      <label class="control-label" for="inputPassword" style="color: black;font-family: all;">
       <b><strong>{{__('budget.Year')}}: </strong></b> </label>
      <div class="controls">
       <input class="input focused" name="year" id="focusedInput" type="text" value="{{$plan_selected->year}}"
        style="color: black;font-family: all;" required>
      </div>
     </div>
     <div class="control-group">
      <div class="controls">
       <small>Signature:</small>
       <select class="input focused" id="focusedInput" value="{{$plan_selected->status}}" name="sign"
        id="focusedInput" type="text" placeholder="type" required style="font-family: all;color: black;">
        <option style="font-family: all;color: black;" value="Signed"> [{{Auth::user()->signature}}]
         {{Auth::user()->first_name}} {{Auth::user()->last_name}} </option>
        <option style="font-family: all;color: black;" value="rejected">Reject</option>
       </select>
      </div>
     </div>
     <div class="control-group">
      <div class="controls">
       <button name="update" class="btn btn-success"><i class="icon-save icon-large">Sign</i></button>
      </div>
     </div>
    </form>
   </div>
  </div>
 </div>
 <!-- /block -->
</div>
