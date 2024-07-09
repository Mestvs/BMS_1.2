<?php
namespace App\Http\Controllers\Directorate;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use DB;
use APP\Models\User;
use App\Models\News;
use App\Models\Message;
use App\Models\MessageSent;
class DirectorateController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }
    //
    function home(){
        $today=date('Y-m-d');
        $auth_user = Auth::user()->id;
        $message_unread=message::where('reciever_id','=',$auth_user)->where('message_status','!=','read')->orderBy('created_at','desc')->get();
        $news=news::where('date','=',$today)->get();

        ////d
        $auth_directorate_id = Auth::user()->directorate_id;
        $d_query=DB::table('users')->join('directorates','directorates.directorate_id','=','users.directorate_id')->select('directorates.directorate_name')->where('users.directorate_id',$auth_directorate_id)->get();
        
        return view('@pages_all.directorate_page.home', compact( 'message_unread','news','d_query'));
    }

      //message
      public function message(){
        $auth_user = Auth::user()->id;
        $user=user::where ('id', '!=',$auth_user)->get();
       $message_unread=message::where('reciever_id','=',$auth_user)->where('message_status','!=','read')->orderBy('created_at','desc')->get();
        $messages=message::where('reciever_id','=',$auth_user)->orderBy('created_at','desc')->get();
         ////d
         $auth_directorate_id = Auth::user()->directorate_id;
         $d_query=DB::table('users')->join('directorates','directorates.directorate_id','=','users.directorate_id')->select('directorates.directorate_name')->where('users.directorate_id',$auth_directorate_id)->get();
         
        return view('@pages_all.directorate_page.user_message',compact('user','messages','message_unread','d_query'));  

    }
    public function sent_message(){
        $auth_user = Auth::user()->id;
        $user=user::where ('id', '!=',$auth_user)->get();
        $message_unread=message::where('reciever_id','=',$auth_user)->where('message_status','!=','read')->orderBy('created_at','desc')->get();
        $recievers=messagesent::where('sender_id','=',$auth_user)->orderBy('created_at','desc')->get();
         ////d
         $auth_directorate_id = Auth::user()->directorate_id;
         $d_query=DB::table('users')->join('directorates','directorates.directorate_id','=','users.directorate_id')->select('directorates.directorate_name')->where('users.directorate_id',$auth_directorate_id)->get();
         
        return view('@pages_all.directorate_page.sent_message',compact('recievers','user','message_unread','d_query'));
    

    }
    public function  view_news(){
        $auth_user = Auth::user()->id;
        $user=user::where ('id', '!=',$auth_user)->get();
        $message_unread=message::where('reciever_id','=',$auth_user)->where('message_status','!=','read')->orderBy('created_at','desc')->get();
        $recievers=messagesent::where('sender_id','=',$auth_user)->orderBy('created_at','desc')->get();
       $news=DB::select('select * from news');
       ////d
       $auth_directorate_id = Auth::user()->directorate_id;
       $d_query=DB::table('users')->join('directorates','directorates.directorate_id','=','users.directorate_id')->select('directorates.directorate_name')->where('users.directorate_id',$auth_directorate_id)->get();
       
        return view('@pages_all.directorate_page.view_news',compact('recievers','user','message_unread','news','d_query'));
    

    }
}
