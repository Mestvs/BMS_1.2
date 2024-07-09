<?php
namespace App\Http\Controllers\Zerfe;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use DB;
use App\Models\User;
use App\Models\Plan;
use App\Models\Message;
use App\Models\MessageSent;
use Illuminate\Support\Facades\Response;
class ZerfeController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    } //
    function home(){
        $today=date('Y-m-d');
        $auth_user = Auth::user()->id;
        $auth_zerfe_id=Auth::user()->zerfe_id;
        $zerfe=DB::table('zerfes')->select('zerfe_name')->where('zerfe_id',$auth_zerfe_id)->get();
        $message_unread=message::where('reciever_id','=',$auth_user)->where('message_status','!=','read')->orderBy('created_at','desc')->get();
        $total_user = User::get()->count();
        $news=DB::select('select * from news where date=?',[$today]);
        //// Data number////
        ///Admin and finance 
        $query_reg_af1 =DB::table('users')->select('*')->where('role','Finance_Manager')->orwhere('role','Purchasing_&_Finance')->get();
        $query_reg_af2=DB::table('users')->join('directorates','users.directorate_id','=','directorates.directorate_id')->select('users.id','directorates.directorate_id')->where('directorates.directorate_name','Human_Resource')->get();
        $query_reg_af3=DB::table('users')->join('directorates','users.directorate_id','=','directorates.directorate_id')->select('users.id','directorates.directorate_id')->where('directorates.directorate_name','HIV_&_Gender')->get();
        $query_reg_af4 =DB::table('users')->select('id')->where('role','Limatekid')->get();
        $query_reg_af5=DB::table('users')->join('directorates','users.directorate_id','=','directorates.directorate_id')->select('users.id','directorates.directorate_id')->where('directorates.directorate_name','General_Service')->get();
        $query_reg_af6=DB::table('users')->join('directorates','users.directorate_id','=','directorates.directorate_id')->select('users.id','directorates.directorate_id')->where('directorates.directorate_name','Merjastatics')->get();
        ///top
        $query_reg_Top1=DB::table('users')->join('directorates','users.directorate_id','=','directorates.directorate_id')->select('users.id','directorates.directorate_id')->where('directorates.directorate_name','Head_Office')->get();
        $query_reg_Top2=DB::table('users')->join('directorates','users.directorate_id','=','directorates.directorate_id')->select('users.id','directorates.directorate_id')->where('directorates.directorate_name','Audit')->get();
        $query_reg_Top3=DB::table('users')->join('directorates','users.directorate_id','=','directorates.directorate_id')->select('users.id','directorates.directorate_id')->where('directorates.directorate_name','Ethical_Dept')->get();
        $query_reg_Top4=DB::table('users')->join('directorates','users.directorate_id','=','directorates.directorate_id')->select('users.id','directorates.directorate_id')->where('directorates.directorate_name','Communiction')->get();
        //SIT
        $query_reg_SIT1=DB::table('users')->join('directorates','users.directorate_id','=','directorates.directorate_id')->select('users.id','directorates.directorate_id')->where('directorates.directorate_name','Research_&_Analysis')->get();
        $query_reg_SIT2=DB::table('users')->join('directorates','users.directorate_id','=','directorates.directorate_id')->select('users.id','directorates.directorate_id')->where('directorates.directorate_name','Capacity_Build')->get();
        $query_reg_SIT3=DB::table('users')->join('directorates','users.directorate_id','=','directorates.directorate_id')->select('users.id','directorates.directorate_id')->where('directorates.directorate_name','Patent_Writes')->get();
        $query_reg_SIT4=DB::table('users')->join('directorates','users.directorate_id','=','directorates.directorate_id')->select('users.id','directorates.directorate_id')->where('directorates.directorate_name','Radation_Conrol')->get();
        //ICT
        $query_reg_ICT1=DB::table('users')->join('directorates','users.directorate_id','=','directorates.directorate_id')->select('users.id','directorates.directorate_id')->where('directorates.directorate_name','Job_Creation')->get();
        $query_reg_ICT2=DB::table('users')->join('directorates','users.directorate_id','=','directorates.directorate_id')->select('users.id','directorates.directorate_id')->where('directorates.directorate_name','Network_&_Software')->get();
        $query_reg_ICT3=DB::table('users')->join('directorates','users.directorate_id','=','directorates.directorate_id')->select('users.id','directorates.directorate_id')->where('directorates.directorate_name','Maintenance')->get();
        $query_reg_ICT4=DB::table('users')->join('directorates','users.directorate_id','=','directorates.directorate_id')->select('users.id','directorates.directorate_id')->where('directorates.directorate_name','public_merja_information')->get();
        
        return view('@pages_all.zerfe_page.home', compact( 'message_unread','total_user','news','zerfe','query_reg_af1','query_reg_af2','query_reg_af3','query_reg_af4','query_reg_af5','query_reg_af6','query_reg_Top1','query_reg_Top2','query_reg_Top3','query_reg_Top4',
    'query_reg_SIT1','query_reg_SIT2','query_reg_SIT3','query_reg_SIT4','query_reg_ICT1','query_reg_ICT2','query_reg_ICT3','query_reg_ICT4'));
}
   
    //message
    public function message(){
        //zerfe_name
        $auth_zerfe_id=Auth::user()->zerfe_id;
        $zerfe=DB::table('zerfes')->select('zerfe_name')->where('zerfe_id',$auth_zerfe_id)->get();
        ///
        $auth_user = Auth::user()->id;
        $user=user::where ('id', '!=',$auth_user)->get();
       $message_unread=message::where('reciever_id','=',$auth_user)->where('message_status','!=','read')->orderBy('created_at','desc')->get();
        $messages=message::where('reciever_id','=',$auth_user)->orderBy('created_at','desc')->get();
        return view('@pages_all.zerfe_page.user_message',compact('user','messages','message_unread','zerfe'));  

    }
    public function sent_message(){
          //zerfe_name
          $auth_zerfe_id=Auth::user()->zerfe_id;
          $zerfe=DB::table('zerfes')->select('zerfe_name')->where('zerfe_id',$auth_zerfe_id)->get();
        
         ///
        $auth_user = Auth::user()->id;
        $user=user::where ('id', '!=',$auth_user)->get();
        $message_unread=message::where('reciever_id','=',$auth_user)->where('message_status','!=','read')->orderBy('created_at','desc')->get();
        $recievers=messagesent::where('sender_id','=',$auth_user)->orderBy('created_at','desc')->get();
        return view('@pages_all.zerfe_page.sent_message',compact('recievers','user','message_unread','zerfe'));
    

    }
    public function  view_news(){
         //zerfe_name
         $auth_zerfe_id=Auth::user()->zerfe_id;
         $zerfe=DB::table('zerfes')->select('zerfe_name')->where('zerfe_id',$auth_zerfe_id)->get();
        $auth_user = Auth::user()->id;
        $user=user::where ('id', '!=',$auth_user)->get();
        $message_unread=message::where('reciever_id','=',$auth_user)->where('message_status','!=','read')->orderBy('created_at','desc')->get();
        $recievers=messagesent::where('sender_id','=',$auth_user)->orderBy('created_at','desc')->get();
       $news=DB::select('select * from news');
        return view('@pages_all.zerfe_page.view_news',compact('recievers','user','message_unread','news','zerfe'));
    

    }
}
