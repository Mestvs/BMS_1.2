@include('header')
<body> @include('@pages_all.admin_page.navbar') <div class="row-fluid"> @include('@pages_all.zerfe_page.sidebar_budget') <div
   class="span6" id="adduser" style="width:80%;margin-left:16%;">
   <div class="row-fluid">
    <div class="pull-right">
    </diV>
    @include('sweetalert::alert')
    <!-- block -->
    <div class="row-fluid">
     <!-- block -->
     <div class="block">
      <div class="navbar navbar-inner block-header">
       <div class="alert alert-info" style="color: 0000;font-family: all;font-size:large;"><i
         class="icon-info-sign"></i>{{__('budget.budgetrequestf')}} </div>
      </div>
      <div class="block-content collapse in">
       <div class="span12" style="width:1000px;">
        <form action="{{url('budget_request')}}" method="post" class="form-horizontal" autocomplete="off">
          @csrf
         <div class="control-group">
          <label class="control-label" for="inputPassword" style="color: black;font-family: all;">
           <b><strong>{{__('link.Titleadmin')}}: </strong></b> </label>
          <div class="controls">
           <input class="input focused" name="title" id="focusedInput" type="text" placeholder="budget title"
            style="color: black;font-family: all;" required pattern="[a-zA-Z0-9_]{1,}">
          </div>
         </div>
         <div class="control-group">
          <label class="control-label" for="inputPassword" style="color: black;font-family: all;">
           <!---add-->
           <b><strong>{{__('budget.amounttitle')}}: </strong></b>
          </label>
          <div class="controls">
           <input class="input focused" name="amount" id="focusedInput" type="text" placeholder="amount"
            style="color: black;font-family: all;" required pattern="[0-9_]{1,}">
          </div>
         </div>
         <div class="control-group" style="float:left ;">
          <label class="control-label" for="inputPassword" style="color: black;font-family: all;">
           <b><strong>{{__('budget.budgetcategory')}}: </strong></b> </label>
          <div class="controls">
           <select name="category" class="chzn-select" required>
            <option> </option> 
            @foreach ($budget_category_query as $budget_category)
             <option value="{{$budget_category->category_id}}">{{$budget_category->category_code}} </option>
             @endforeach
           </select>
          </div>
         </div>
         <div class="control-group" style="float:left;">
          <label class="control-label" for="inputPassword" style="color: black;font-family: all;">
           <b><strong>{{__('budget.b_description')}}: </strong></b> </label>
          <div class="controls">
           <textarea name="description" cols="60" rows="7" id="comment"
            style="border: double;color: black;font-family: all;" placeholder="budget description " required
            pattern="[a-zA-Z0-9_]{3,}"></textarea>
          </div>
         </div>
         <div class="control-group" style="clear:both ;">
          <hr>
          <div class="controls"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button name="give"
            class="btn btn-info" style="color: black;font-family: all;"><i class="icon-plus-sign"></i><b>
             {{__('budget.b_submit')}} </b></button>
          </div>
         </div>
        </form>
       </div>
      </div>
     </div>
    </div>
   </div></div></div>@include('home_page.footer')@include('home_page.script') </body>

</html>