<base href="/public">
 @include('header')
<body>@include('@pages_all.admin_page.navbar') <div
  class="row-fluid">@include('@pages_all.admin_page.sidebar_user') <div class="span3" id="adduser"
   style="position:sticky ;top:9%;margin-left:16%; width: fit-content;"> @include('@pages_all.admin_page.update_user') </div>
  <div class="span6" id="" style="margin-left:0.5%;width:60%;">
   <div class="row-fluid">
    @include('sweetalert::alert')
    <!-- block -->
    <div id="block_bg" class="block">
     <div class="navbar navbar-inner block-header">
      <div class="alert alert-info" style="font-family: all; font-size:large;"><i class="icon-info-sign"></i><b><strong>
        {{__('link.Users_Listadmin')}}</strong></b></div>
     </div>
     <div class="block-content collapse in" style="font-size:medium;">
        <table cellpadding="0" cellspacing="0" border="1" class="table" id="example">
            <thead style="font-family: all;color: black;font-size:medium;">
              <tr>
                <th></th>
                <th>{{__('link.fullname')}} </th>
                <th>{{__('link.email')}}</th>
                <th> {{__('link.usetype')}}</th>
                <th>{{__('link.acc_status')}}</th>
                <th>{{__('link.update')}}</th>
            </tr>
            </thead>
            <tbody style="font-family: all;color: black;font-size:small;"> 
    @foreach ($users as $user )
              <tr>
              <td width="30"><input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="{{$user->id}}">
              </td>
              <td> {{$user->first_name}} {{$user->last_name}}</td>
              <td> {{$user->email}} </td>
              <td> {{$user->role}} </td>
              <td> {{$user->account_status}} </td>
              <td width="70"><a href="{{url('update_user',$user->id)}}" data-toggle="modal" class="btn btn-success"
                style=" height:0.8em; width:0.8em;"><i class="icon-pencil" style="text-align:center;"></i></a>
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
 </div><br><br><br><br><br><br><br><br> @include('home_page.footer') @include('home_page.script')