@include('header')
<body> @include('@pages_all.admin_page.navbar') <div class="row-fluid"> @include('@pages_all.zerfe_page.sidebar_plan') <div class="span8"
   id="" style="width:80%;margin-left:16%">
   <div class="row-fluid">
    <!-- block -->
    <div id="block_bg" class="block">
     <div class="navbar navbar-inner block-header">
      <div class="pull-right" style="padding-top:0%;">
       <a href="/annual_plan_download" id="print" class="btn btn-success" style="font-family: all;">
        <i class="icon-download">
        </i><b><strong>{{__('plan.annual_plan')}} </strong></b></a>
       <a href="/plan_submit_select" id="print" class="btn btn-success" style="font-family: all;">
        <i class="icon-plus">
        </i><b><strong>{{__('plan.s_plan')}} </strong></b></a>
      </diV>
      <div class="alert alert-info" style="font-family: all; font-size:large;">
       <i class="icon-info-sign"></i><b><strong> {{__('plan.plan_list')}} </strong></b>
      </div>
     </div>
     <div class="block-content collapse in" style="font-size:large ;">
      <table cellpadding="0" cellspacing="0" border="1" class="table" id="example">
       <thead style="font-family: all;color: black;font-size:medium;">
        <tr>
         <th></th>
         <th>Id</th>
         <th>Year</th>
         <th>Plan Type</th>
         <th>Description</th>
         <th>Zerfe </th>
         <th>Directorate</th>
         <th>Date</th>
         <th>filename</th>
         <th>Status</th>
         <th>Update</th>
       </thead>
       <tbody style="font-family: all;color: black;font-size:small;"> 
{{--This query is to display the plans submitted from directorates--}}

@foreach ($plan_query as $plan )
  
        <tr>
         <td width="30">
          <input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php //echo $id; ?>">
         </td>
         <td> {{$plan->directorate_plan_id}} </td>
         <td> {{$plan->year}} </td>
         <td> {{$plan->plan_type}} </td>
         <td> {{$plan->description}} </td>
         <td> {{$plan->zerfe_name}} </td>
         <td> {{$plan->directorate_name}} </td>
         <td> {{$plan->prepared_date}}</td>
         <td> {{$plan->filename}}</td>
         <td> {{$plan->status}} </td>
         <td width="70">
          <a href="{{url('plan_edit',$plan->directorate_plan_id)}}" data-toggle="modal" class="btn btn-success"><i
            class="icon-pencil icon-small"></i></a>
         </td>
        </tr> 
        @endforeach
         </tbody>
      </table>
     </div>
    </div>
    <!-- /block -->
   </div>
  </div>
 </div>
 </div><br><br><br><br><br><br><br><br><br> @include('home_page.script') @include('home_page.footer') 