<base href="/public">
@include('header') 
<body> @include('@pages_all.admin_page.navbar') <div class="row-fluid"> @include('@pages_all.limatekid_page.sidebar_budget_codes') <div
   class="span8" id="" style="width:30%; margin-left: 16%;">
   <div class="row-fluid">
    @include('sweetalert::alert')
    <!-- block -->
    <div id="block_bg" class="block">
     <div class="navbar navbar-inner block-header">
      <div class="pull-right " style="padding-top:0%;">
        <a href="/budget_codes" id="print" class="btn btn-success" style="font-family: all;">
         <i class="icon-arrow-left">
         </i><b><strong> {{__('link.back')}}</strong></b></a>
       </div>
      <div class="alert alert-info"><i class="icon-info-sign"></i><b><strong>
        {{__('budget.update_adjustment')}} </strong></b></div>
     
        </div>
     <div class="block-content collapse in">
      <div class="span12">
        @foreach ($zerfe_acc_query as $zerfe_acc )
          
        @endforeach
       <form action="{{url('update_zerfe_account',$zerfe_acc->zerfe_account_id)}}" method="post" class="form-vertical" autocomplete="off">
        @csrf
        <div class="control-group">
         <label class="control-label" for="type" style="font-family: all;color: black;"><b>
          {{__('link.zerfe')}}: </b></label>
         <div class="controls">
          <select name="type" class="chzn-select" required>
            <option> </option> @foreach ($zerfe_query as $z_query )
              
           <option value="{{$z_query->zerfe_id}}"> {{$z_query->zerfe_name}} </option> 
           @endforeach 
           </select>
         </div>
        </div>
        <div class="control-group">
         <label class="control-label" for="type" style="font-family: all;color: black;"><b>
         {{__('payment.acc_code')}}: </b></label>
         <div class="controls">
          <select name="acc_category" class="chzn-select" required>
           <option selected value="{{$zerfe_acc->account_id}}">{{$zerfe_acc->account_code}} </option> 
        @foreach ($acc_cat_query as $acc_category)
        <option value="{{$acc_category->account_id}}"> {{$acc_category->account_name}}
         {{$acc_category->account_code}} </option>
         @endforeach 
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
   </div>@include('home_page.script')
   