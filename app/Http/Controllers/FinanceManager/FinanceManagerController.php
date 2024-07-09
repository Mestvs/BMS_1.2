<?php

namespace App\Http\Controllers\FinanceManager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use DB;
use App\Models\News;
use App\Models\User;
use App\Models\Message;
use App\Models\MessageSent;
class FinanceManagerController extends Controller
{
    //
    public function __construct()
    {
    	$this->middleware('auth');
       // $this->middleware('role');

    }
    //
    function home(){
        /*

       $value = session()->get('role');
        if($value!='true_top_manager')
        {
            return redirect('/login');  
        }*/
       
        $today=date('Y-m-d');
        $auth_user = Auth::user()->id;
        $message_unread=message::where('reciever_id','=',$auth_user)->where('message_status','!=','read')->orderBy('created_at','desc')->get();
        $news=news::where('date','=',$today)->get();
        return view('@pages_all.Finance_Manager_page.home', compact( 'message_unread','news'));

    }
      //message
      public function message(){
        $auth_user = Auth::user()->id;
        $user=user::where ('id', '!=',$auth_user)->get();
       $message_unread=message::where('reciever_id','=',$auth_user)->where('message_status','!=','read')->orderBy('created_at','desc')->get();
       $messages=message::where('reciever_id','=',$auth_user)->orderBy('created_at','desc')->get();
        return view('@pages_all.Finance_Manager_page.user_message',compact('user','messages','message_unread'));  

    }
    public function sent_message(){
        $auth_user = Auth::user()->id;
        $user=user::where ('id', '!=',$auth_user)->get();
        $message_unread=message::where('reciever_id','=',$auth_user)->where('message_status','!=','read')->orderBy('created_at','desc')->get();
        $recievers=messagesent::where('sender_id','=',$auth_user)->orderBy('created_at','desc')->get();
        return view('@pages_all.Finance_Manager_page.sent_message',compact('recievers','user','message_unread'));
    

    }
}
