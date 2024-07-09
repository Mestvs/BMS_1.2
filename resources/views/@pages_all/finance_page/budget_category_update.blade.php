<base href="/public">
@include('header')
<body> @include('@pages_all.admin_page.navbar')<div class="row-fluid">@include('@pages_all.finance_page.sidebar_budget') <div
   class="span3" id="adduser" style="position:sticky;top:10%;width:30%;margin-left:16%;">
   @include('@pages_all.finance_page.budget_category_update_form') </div>
  <div class="span8" id="" style="margin-left:0.5%;width:53%;">
   <div class="row-fluid"> 
    <!-- block -->
    @include('sweetalert::alert')
    <div id="block_bg" class="block">
     <div class="navbar navbar-inner block-header">
      <div class="pull-right " style="padding-top:0%;">
       <a href="/budget_categorize" id="print" class="btn btn-success"
        style="font-family: all;font-size:small;">
        <i class="icon-arrow-left">
        </i><b><strong> {{__('link.back')}}</strong></b></a>
      </div>
      <div class="alert alert-info">
       <i class="icon-info-sign"></i><b><strong>{{__('budget.b_add_detail_list')}}</strong></b>
      </div>
     </div>
     <i class="icon-info-sig" style="margin-left: 5%;"></i><b><strong style=" ;">Available Amount:
       ${{$r_amount}} </strong>
     </b>
     <i class="icon-info-sig" style="margin-left: 5%;"></i><b><strong style="font-size:medium ;">Categorized:
       {{$total}} </strong></b>
       <i class="icon-info-sig" style="margin-left: 5%;"></i><b><strong style="font-size:medium ;">Remain:
        {{$remain}} </strong></b>
     <div class="block-content collapse in" style="font-size: large;">
      <form action="delete_users.php" method="post" autocomplete="off">
       <table cellpadding="0" cellspacing="0" border="1" class="table" id="example">
        <thead>
         <tr>
          <th>ID</th>
          <th>{{__('budget.budgetcategory')}}</th>
          <th>{{__('payment.acc_name')}}</th>
          <th>{{__('payment.acc_code')}}</th>
          <th>{{__('budget.amounttitle')}}</th>
          <th>update</th>
         </tr>
        </thead>
        <tbody> 
           @foreach ($budget_detail_query as $budget_detail )
<tr>
          <td> {{$budget_detail->budget_detail_id}} </td>
          <td> {{$b_category}} </td>
          <td> {{$budget_detail->account_name}} </td>
          <td> {{$budget_detail->account_code}} </td>
          <td> {{$budget_detail->amount}} </td>
          <td width="70">
            <a href="{{ url('budget_categorize_update', $budget_detail->budget_detail_id) }}"
                data-toggle="modal" class="btn btn-success"
                style=" height:0.8em; width:0.8em;"><i class="icon-pencil"
                    style="text-align:center;"></i></a>
        </td>
         </tr>
@endforeach
</tbody>
       </table>
     </div>
     <!-- /block -->
    </div>
   </div>
  </div>
 </div> @include('home_page.footer') @include('home_page.script') </body>

</html>