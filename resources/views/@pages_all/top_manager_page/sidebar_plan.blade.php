<div class="span3" id="sidebar" style="width:16%;background-color:dodgerblue; padding-bottom:100%;position:fixed">
    <div style="background-color:cornsilk; margin-top:0%;">
     <img id="avatar" class="img-circle" style="border-radius:400px ; height:80px; width:80px;"
      src="image/{{Auth::user()->profile_location}}">
     <span style="display:grid;margin-left:5%;padding-bottom:5%;font-style:italic;font-size:0.3cm;color:silver;">
      {{Auth::user()->role}}</span>
    </div>
    <ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
     <li> <a href="/top_manager_home" style="font-family: all;font-size: 17px;"><i class="icon-chevron-right"></i><i
        class="icon-home"></i><b><strong> {{__('link.home')}}</strong></b></a> </li>
     <li>
      <a href="/top_manager_user" style="font-family: all;font-size: 17px;"><i class="icon-chevron-right"></i><i
        class="icon-user "></i><b><strong>{{__('sidebar.m_directorate')}} </strong></b></a>
     </li>
     <li>
      <a href="/roles" style="font-family: all;font-size: 17px;"><i class="icon-chevron-right"></i><i class="icon-star"
        style="margin-right:4px;"></i><b><strong>{{__('sidebar.m_role')}} </strong></b></a>
     </li>
     <li>
      <a href="/t_budget" style="font-family: all;font-size: 17px;"><i class="icon-chevron-right"></i><i
        class="icon-money" style="margin-right:4px;"></i><b><strong>
        {{__('sidebar.budget')}} </strong></b></a>
     </li>
     <li class="active">
      <a href="/t_plan" style="font-family: all;font-size: 17px;"><i class="icon-chevron-right"></i><i
        class="icon-tasks " style="margin-right:4px;"></i><b><strong>{{__('sidebar.plan')}} 
        </strong></b></a>
     </li>
     <li>
      <a href="{{route('top.message')}}" style="font-family: all;font-size: 17px;"><i class="icon-chevron-right"></i><i
        class="icon-envelope"></i><b>
            <strong> {{__('sidebar.Message')}} </strong></b>@if ($message_unread->count()==0)  @else<span class="badge badge-important"> {{$message_unread->count()}} </span> @endif </a>
        </a>
     </li>
     <li >
      <a href="/reportnews" style="font-family: all;font-size: 17px;"><i class="icon-chevron-right"></i><i
        class="icon-plus"></i><b>{{__('sidebar.postnews')}}  </b> </a>
     </li>
    </ul>
   </div>