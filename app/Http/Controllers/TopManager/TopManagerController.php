<?php
namespace App\Http\Controllers\TopManager;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\News;
use App\Models\Message;
use App\Models\MessageSent;
use DB;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;
class TopManagerController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }
    function home(){
        
        //datanumber of Depts
         /*********total data number******/
         $auth_user = Auth::user()->id;
         $total_user = User::get()->count();

             /*********Admin and finance ******/
        $query_reg_AFH=DB::table('users')->join('zerfes','users.zerfe_id','=','zerfes.zerfe_id')->select('*')->where('zerfes.zerfe_name','Admin_&_finance')->where('users.role','Zerfe')->get();
        $count_reg_AFH= $query_reg_AFH->count();
        $query_reg_AF=DB::table('users')->join('directorates','users.directorate_id','=','directorates.directorate_id')->select('*')->where('directorates.directorate_name','Admin_&_finance')->orwhere('directorates.directorate_name','Finance_Manager')->orwhere('directorates.directorate_name','Human_Resource')->orwhere('directorates.directorate_name','HIV_&_Gender')
        ->orwhere('directorates.directorate_name','General_Service')->orwhere('directorates.directorate_name','Limatekid')->orwhere('directorates.directorate_name','Merjastatics')->orwhere('directorates.directorate_name','Purchasing_&_Finance')->get();
        $count_reg_AF= $query_reg_AF->count();
        $total_AF=$count_reg_AF+$count_reg_AFH;
              /*********ICT ******/
        $query_reg_ICTH=DB::table('users')->join('zerfes','users.zerfe_id','=','zerfes.zerfe_id')->select('*')->where('zerfes.zerfe_name','ICT')->where('users.role','Zerfe')->get();
        $count_reg_ICTH=$query_reg_ICTH->count();
        $query_reg_ICT=DB::table('users')->join('directorates','users.directorate_id','=','directorates.directorate_id')->select('*')->where('directorates.directorate_name','Maintenance')->orwhere('directorates.directorate_name','Job_Creation')->orwhere('directorates.directorate_name','Network_&_Software')->orwhere('directorates.directorate_name','Public_Merja_Information')->get();
        $count_reg_ICT= $query_reg_ICT->count() ;
        $total_ICT=$count_reg_ICT+$count_reg_ICT;
           /*********Top management ******/
           $query_reg_TopH=DB::table('users')->join('zerfes','users.zerfe_id','=','zerfes.zerfe_id')->select('*')->where('zerfes.zerfe_name','Top_Management')->where('users.role','Zerfe')->get();
           $count_reg_TopH=$query_reg_TopH->count();
           $query_reg_Top=DB::table('users')->join('directorates','users.directorate_id','=','directorates.directorate_id')->select('*')->where('directorates.directorate_name','Ethical_Dept')->orwhere('directorates.directorate_name','Communiction')->orwhere('directorates.directorate_name','Head_Office')->orwhere('directorates.directorate_name','Communiction')->orwhere('directorates.directorate_name','Top_Manager')->orwhere('directorates.directorate_name','Audit')->get(); 
           $count_reg_Top= $query_reg_Top->count();
           $total_Top=$count_reg_TopH+$count_reg_Top;
        /*********SIT******/
        $query_reg_SITH=DB::table('users')->join('zerfes','users.zerfe_id','=','zerfes.zerfe_id')->select('*')->where('zerfes.zerfe_name','Science_&_Technology')->where('users.role','Zerfe')->get();
        $count_reg_SITH =$query_reg_SITH->count();
        $query_reg_SIT=DB::table('users')->join('directorates','users.directorate_id','=','directorates.directorate_id')->select('*')->where('directorates.directorate_name','Research_&_Analysis')->orwhere('directorates.directorate_name','Capacity_Build')->orwhere('directorates.directorate_name','Radation_Conrol')->orwhere('directorates.directorate_name','Patent_Writes')->get();
        $count_reg_SIT= $query_reg_SIT->count();
        $total_SIT=$count_reg_SITH+$count_reg_SIT;
         /*********Message******/
        $message_unread=message::where('reciever_id','=',$auth_user)->where('message_status','!=','read')->orderBy('created_at','desc')->get();
       
        return view('@pages_all.Top_manager_page.home', compact( 'message_unread','total_user','total_AF','total_ICT','total_Top','total_SIT'));
   
    }
    function post_news(){
        $auth_user = Auth::user()->id;
        $message_unread=message::where('reciever_id','=',$auth_user)->where('message_status','!=','read')->orderBy('created_at','desc')->get();
        $total_user = User::get()->count();
        return view('@pages_all.Top_manager_page.reportnews', compact( 'message_unread','total_user'));

        
    }
    function Add_news( Request $request){
        $news= new News;
        $title=$request->title;
        $news->title=$title;
        $news->news=$request->report;
        $date=carbon::now();
        $news->date=$date;
        $result=DB::select('select * from news where title = ? and date= ?', [$title,$date]);
        if($result){
            Alert::error('Try again ','Error');
            return redirect()->back();
    //checking problem
        }
        else{
            $news->save();
            Alert::Success('Succesfully posted', ' ', 'success');
            return redirect()->back();
        }
        
       
        
    }

    function user(){
        $auth_user = Auth::user()->id;
        $message_unread=message::where('reciever_id','=',$auth_user)->where('message_status','!=','read')->orderBy('created_at','desc')->get();
        $user_query=DB::table('users')->join('zerfes','zerfes.zerfe_id','=','users.zerfe_id')->join('directorates','directorates.directorate_id','=','users.directorate_id')->get();
        return view('@pages_all.Top_manager_page.top_manager_user', compact( 'message_unread','user_query'));

    }

    ///message
    public function message(){
        $auth_user = Auth::user()->id;
        $user=user::where ('id', '!=',$auth_user)->get();
       $message_unread=message::where('reciever_id','=',$auth_user)->where('message_status','!=','read')->orderBy('created_at','desc')->get();
        $messages=message::where('reciever_id','=',$auth_user)->orderBy('created_at','desc')->get();
        return view('@pages_all.top_manager_page.user_message',compact('user','messages','message_unread'));  

    }
    public function sent_message(){
        $auth_user = Auth::user()->id;
        $user=user::where ('id', '!=',$auth_user)->get();
        $message_unread=message::where('reciever_id','=',$auth_user)->where('message_status','!=','read')->orderBy('created_at','desc')->get();
        $recievers=messagesent::where('sender_id','=',$auth_user)->orderBy('created_at','desc')->get();
        return view('@pages_all.top_manager_page.sent_message',compact('recievers','user','message_unread'));
    

    }
    function plan(){
        $auth_user = Auth::user()->id;
        $z_query=DB::table('zerfe_plan_sents')->join('plans','zerfe_plan_sents.plan_id','=','plans.plan_id')->join('zerfes','zerfe_plan_sents.zerfe_id','=','zerfes.zerfe_id')
        ->select('zerfe_plan_sents.zerfe_sent_id','zerfe_plan_sents.filename','zerfe_plan_sents.description','zerfe_plan_sents.status','zerfe_plan_sents.sent_date','zerfes.zerfe_name','plans.plan_type','plans.year')->get();
        $message_unread=message::where('reciever_id','=',$auth_user)->where('message_status','!=','read')->orderBy('created_at','desc')->get();
        return view('@pages_all.top_manager_page.plan', compact( 'message_unread','z_query'));

        
    }

}
/**

 */