
@include('header')
<body>
 <script src="sweetalert.min.js"></script>
 <link rel="stylesheet" type="text/css" href="sweetalert.css"> @include('@pages_all.admin_page.navbar')<div class="row-fluid">
  @include('@pages_all.top_manager_page.sidebar_roles') <div class="span6" id="adduser" style="margin-left:17% ;">
   <div class="row-fluid">
    <div class="pull-right">
    </diV>
    @include('sweetalert::alert')
    <!-- block -->
    <div class="row-fluid">
     <!-- block -->
     <div class="block">
      <div class="navbar navbar-inner block-header">
       <div class="alert alert-info"><i class="icon-info-sign"></i><b><strong>
         {{__('link.add_role')}} </strong></b> </div>
      </div>
      <div class="block-content collapse in">
       <div class="span12">
        <form action="{{route('top.add.role')}}" method="post" class="form-horizontal" enctype="multipart/form-data" autocomplete="off">
         @csrf
         <div class="control-group">
          <label class="control-label" for="inputPassword" style="font-family: all;color: black;"><b>
            {{__('link.role')}}: </b></label>
          <div class="controls">
           <input class="input focused" name="directorate" id="focusedInput" type="text"
            placeholder="{{__('link.role_name')}}" required
            style="font-family: all;color: black;">
          </div>
         </div>
         <div class="control-group">
          <label class="control-label" for="type" style="font-family: all;color: black;"><b>
            {{__('link.zerfe')}}: </b></label>
          <div class="controls">
           <select name="type" class="chzn-select" required>
            <option> </option>
            @foreach ( $zerfe_query as $zerfe )   
           <option value="{{$zerfe->zerfe_id}}"> {{$zerfe->zerfe_name}} </option> 
            @endforeach 
            </select>
          </div>
         </div>
         </br>
         <hr>
         <input class="input focused" name="signature" id="focusedInput" type="hidden">
         <div class="control-group">
          <div class="controls" style="font-family: all;color: black;">
           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button name="save" class="btn btn-info"><i
             class="icon-plus-sign"></i><b style="font-family: all;">
             <strong>{{__('link.a_role')}} </strong></b> </button>
          </div>
         </div>
         </br>
        </form>
       </div>
      </div>
     </div>
     <!-- /block -->
    </div> 
   </div></div></div><br><br><br><br><br><br><br> @include('home_page.script') @include('home_page.footer')