<?php

namespace App\Http\Controllers;
use App\Models\Message;
use App\Models\MessageSent;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Auth;
class MessageController extends Controller
{
    public function send_message(Request $request){
        $message=new message;
        $message_sent=new messageSent;
        $auth_user_id = Auth::user()->id;
        $auth_f_name=Auth::user()->first_name;
        $auth_l_name=Auth::user()->last_name;
        $full_name=$auth_f_name.' '.$auth_l_name;
        $reciever_id=$request->user_id;
$reciver_f_name=user::where('id', $reciever_id)->value('first_name');
$reciver_l_name=user::where('id', $reciever_id)->value('last_name');
$reciver_full_name=$reciver_f_name.' '.$reciver_l_name;
        $message->reciever_id= $reciever_id;
        $message->content=$request->my_message;
        $message->reciever_name=$reciver_full_name;
        $message->sender_id=$auth_user_id ;
        $message->sender_name=$full_name;
        $message->message_status='';
        $message->date_sended= Carbon::now();
        //inser into messagesent table
        $message_sent->reciever_id=$reciever_id;
        $message_sent->content=$request->my_message;
        $message_sent->reciever_name=$reciver_full_name;
        $message_sent->sender_id=$auth_user_id ;
        $message_sent->sender_name=$full_name;
        $message_sent->date_sended= Carbon::now();
        $message->save();
        $message_sent->save();
     return redirect()->back();
    }
public function remove_inbox_message(Request $request){
    $message_id=$request->id;
DB::delete('delete from messages where message_id = ?',[$message_id]);
     return redirect()->back()->with('error','failed');
    }
   public function remove_sent_message(Request $request){
    $message_id=$request->id;
        DB::delete('delete from message_sents where message_sent_id = ?',[$message_id]);
             return redirect()->back();
            }
  
    public function read_message(Request $Request){
        $id=$Request->selector;
          if(value($id)==null){
            return redirect()->back()->with('error','please select the check box?');  
        }
        else{
            $N = count($id);
            for ($i = 0; $i < $N; $i++) {
                $result=DB::update('update messages set message_status =? where message_id = ?',['read',$id[$i]]);
               }
               return redirect()->back();
        }
    }        
}
