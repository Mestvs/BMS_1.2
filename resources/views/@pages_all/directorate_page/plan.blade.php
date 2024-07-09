@include('header')
<body> @include('@pages_all.admin_page.navbar') <div class="row-fluid"> @include('@pages_all.directorate_page.sidebar_plan') <div class="span8"
   id="" style="width:80%;margin-left:16%;">
   <div class="row-fluid">
    <!-- block -->
    <div id="block_bg" class="block">
     <div class="navbar navbar-inner block-header">
      <div class="pull-right" style="padding-top:0%;">
       <a href="/d_annual_plan_download" id="print" class="btn btn-success" style="font-family: all;">
        <i class="icon-download">
        </i><b><strong>{{__('plan.annual_plan')}}  </strong></b></a>
       <a href="/plan_prepare_form" id="print" class="btn btn-success" style="font-family: all;">
        <i class="icon-plus">
        </i><b><strong>{{__('plan.prepareplan')}} </strong></b></a>
      </diV>
      <div class="alert alert-info">
       <i class="icon-info-sign"></i><b><strong>{{__('plan.plan_list')}} </strong></b>
      </div>
     </div>
     <div class="block-content collapse in">
      <div class="span16">
        @foreach ($d_query as $directorate )
        <?php
        $d_name=$directorate->directorate_name;
        ?>
        @endforeach  
         <!-- errro message -->
         @if ($message=Session::get('error'))
         <div class="alert alert-danger alert-block" id="alert" style="margin-left: 30%; margin-right:30%" aria-hidden="true">
          <i class="icon-ban-circle"></i>
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button> <strong>{{$message}}</strong>
        </div>
       @endif
      @if (count($errors)>0)
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error )
          <li>{{$error}}</li>
          @endforeach
        </ul>
      @endif
     
       <!-- errro message end -->
       <!-- success message -->
       @if (session()->has('message'))
       <div class="alert alert-success" style="margin-left: 30%; margin-right:40%">
         <i class="icon-check"></i>
         {{session()->get('message')}}
         <button type="button" class="close" data-bs-dismiss="alert" aria-hidden="true"></button>

       </div>
       @endif
   
     <!-- errro message end -->
       <form action="{{route('directorate.plan.delete')}}" method="post" autocomplete="off">
        @csrf
        <table cellpadding="0" cellspacing="0" border="1" class="table" id="example">
         <a data-toggle="modal" href="#plan_delete" id="delete" class="btn btn-danger" name=""><i
           class="icon-trash icon-large"></i></a>@include('@pages_all.directorate_page.modal_delete') 
            <thead>
          <tr>
           <th></th>
           <th>Id</th>
           <th>Year</th>
           <th>Plan Type</th>
           <th>Description</th>
           <th>Zerfe </th>
           <th>Directorate</th>
           <th>sent Date</th>
           <th>filename</th>
           <th>Status</th>
           <th>Update</th>
         </thead>
         <tbody> 
         @foreach ($plan_query as $plan )
          <tr>
           <td width="30">
            <input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="{{$plan->directorate_plan_id}}">
           </td>
           <td> {{$plan->directorate_plan_id}} </td>
           <td> {{$plan->year}}</td>
           <td> {{$plan->plan_type}} </td>
           <td> {{$plan->description}} </td>
           <td> {{$plan->zerfe_name}} </td>
           <td> {{$d_name}} </td>
           <td> {{$plan->prepared_date}} </td>
           <td> {{$plan->filename}} </td>
           <td> {{$plan->status}} </td>
           <td width="70">
            <a href="{{url('update_plan',$plan->directorate_plan_id)}}" data-toggle="modal" class="btn btn-success"><i
              class="icon-pencil icon-small"></i></a>
           </td>
          </tr> 
          @endforeach
       </tbody>
        </table>
       </form>
      </div>
     </div>
    </div>
    <!-- /block -->
   </div>
  </div>
 </div>
 </div><br><br><br><br><br><br><br><br><br> @include('home_page.footer') @include('home_page.script') </body>

</html>