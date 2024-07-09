<?php
namespace App\Http\Controllers\Finance;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Message;
use App\Models\MessageSent;
use App\Models\User;
use Auth;
use DB;
class FinanceController extends Controller
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
        return view('@pages_all.Finance_page.home', compact( 'message_unread','news'));

    }
   

    
  //message
  public function message(){
    $auth_user = Auth::user()->id;
    $user=user::where ('id', '!=',$auth_user)->get();
   $message_unread=message::where('reciever_id','=',$auth_user)->where('message_status','!=','read')->orderBy('created_at','desc')->get();
    $messages=message::where('reciever_id','=',$auth_user)->orderBy('created_at','desc')->get();
    return view('@pages_all.finance_page.user_message',compact('user','messages','message_unread'));  

}
public function sent_message(){
    $auth_user = Auth::user()->id;
    $user=user::where ('id', '!=',$auth_user)->get();
    $message_unread=message::where('reciever_id','=',$auth_user)->where('message_status','!=','read')->orderBy('created_at','desc')->get();
    $recievers=messagesent::where('sender_id','=',$auth_user)->orderBy('created_at','desc')->get();
    return view('@pages_all.finance_page.sent_message',compact('recievers','user','message_unread'));


}

}
