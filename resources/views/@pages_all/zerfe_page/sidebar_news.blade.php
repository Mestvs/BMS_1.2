<div class="span3" id="sidebar" style="width:15%;background-color:dodgerblue; padding-bottom:100%;position:fixed"> 
  @foreach ($zerfe as $zerfe_name )
  @endforeach 
    <div style="background-color:cornsilk; margin-top:0%;">
    <img id="avatar" class="img-circle" style="border-radius:400px ; height:80px; width:80px;"
     src="image/{{Auth::user()->profile_location}}">
    <span style="display:grid;margin-left:5%;padding-bottom:5%;font-style:italic;font-size:0.3cm;color:silver;">
      {{$zerfe_name->zerfe_name}} Head</span>
   </div>
   <ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
    <li> <a href="{{route('zerfe.home')}}" style="font-family: all;font-size: 17px;"><i class="icon-chevron-right"></i><i
       class="icon-home"></i><b><strong> {{__('link.home')}} </strong></b></a> </li>
    </li>
    <li>
     <a href="/zerfe_plan" style="font-family: all;font-size: 17px;"><i class="icon-chevron-right"></i><i
       class="icon-tasks " style="margin-right:4px;"></i><b><strong>{{__('sidebar.m_plan')}} 
       </strong></b></a>
    </li>
    <li>
     <a href="/z_payment" style="font-family: all;font-size: 17px;"><i class="icon-chevron-right"></i><i
       class="icon-gift "></i><b><strong>{{__('sidebar.payment')}}  </strong></b></a>
    </li>
    <li>
     <a href="/z_budget" style="font-family: all;font-size: 17px;"><i class="icon-chevron-right"></i><i
       class=" icon-money" style="margin-right:4px;"></i><b><strong>
        {{__('sidebar.m_budget')}} </strong></b></a>
    </li>
    <li >
     <a href="{{route('zerfe.message')}}" style="font-family: all;font-size: 17px;"><i class="icon-chevron-right"></i><i
       class="icon-envelope"></i><b>
          <strong> {{__('sidebar.Message')}} </strong></b>@if ($message_unread->count()==0)  @else<span class="badge badge-important"> {{$message_unread->count()}} </span> @endif </a>
      </a>
    </li>
    <li class="active">
     <a href="/z_view_news" style="font-family: all;font-size: 17px;"><i class="icon-chevron-right"></i><i
       class="icon-book"></i><b>{{__('sidebar.View_News')}}</b> </a>
    </li>
   </ul>
  </div>