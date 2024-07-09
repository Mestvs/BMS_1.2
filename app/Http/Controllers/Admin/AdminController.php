<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Message;
use App\Models\MessageSent;
use App\Models\RegisterActivation;
use Auth;
use DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;
//new sess


class AdminController extends Controller
{
    /**
     * 
     * @return void
     */
    public function __construct()
    {
    	$this->middleware('auth');
        //$this->middleware(['auth','verified']);


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
       
        return view('@pages_all.admin_page.home', compact( 'message_unread','total_user','total_AF','total_ICT','total_Top','total_SIT'));
   
    }
    function manage_user(){
        $auth_user = Auth::user()->id;
        $message_unread=message::where('reciever_id','=',$auth_user)->where('message_status','!=','read')->orderBy('created_at','desc')->get();
        $users = User::get();
        return view('@pages_all.admin_page.admin_user', compact( 'users','message_unread'));
    }
    function showAddUserForm(){
        $auth_user = Auth::user()->id;
        $message_unread=message::where('reciever_id','=',$auth_user)->where('message_status','!=','read')->orderBy('created_at','desc')->get();
        $user =0;
        return view('@pages_all.admin_page.add_user',compact('message_unread','user'));
    
       
    }
    function addUser(Request $request){
        //data fromform    
$first_name=$request->firstname;
$last_name=$request->lastname;
$password=$request->password;
$email=$request->email;
//to upload image
$image=$request->image;
$imagename=time().'.'.$image->getClientOriginalExtension();
$request->image->move('image',$imagename);
//to generate four character
   $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
  $signature = substr(str_shuffle($chars), 0, 4);

///to store data into the database
     $data =new user; 
     $data->first_name =$first_name;
     $data->last_name =$last_name;
     $data->email=$email;
     $data->role=$request->type;
     $data->signature=$signature;
     $data->profile_location=$imagename;
     $data->password  =Hash::make ($password) ;

     $auth_user = Auth::user()->id;
     $message_unread=message::where('reciever_id','=',$auth_user)->where('message_status','!=','read')->orderBy('created_at','desc')->get();
     
     $query=DB::table('users')->where('email',$email)->get();
     if( $query->count()>0){
        $user='exists';
        return view('@pages_all.admin_page.add_user', compact('message_unread', 'user'));
    
     }
     else{
        $user=$data->save();
        return view('@pages_all.admin_page.add_user', compact( 'message_unread','user','first_name','last_name','password','signature'));
     }
    
    }

    function showUserUpdateForm($id){
        
        $users = User::get();
        $data=user::find($id);
        $auth_user = Auth::user()->id;
        $message_unread=message::where('reciever_id','=',$auth_user)->where('message_status','!=','read')->orderBy('created_at','desc')->get();
        
        return view('@pages_all.admin_page.edit_user',compact('data','message_unread','users'));
    
       
    }

    function updateUser(Request $request,$id){
        $user=user::find($id);
        $user->first_name=$request->firstname;
        $user->last_name=$request->lastname;
        $user->email=$request->email;
        $user->account_status=$request->status;
        $user->save();
        Alert::success('User Updated successfully','success');
        return redirect()->back()->with('message','User detailes updated successfully ');

       
    }
   
    //to delete user
    public function delete_user($id){
        $user=user::find($id);
        $user->delete();
     return redirect()->back();

    }
    public function message(){
        $auth_user = Auth::user()->id;
        $user=user::where ('id', '!=',$auth_user)->get();
        //$messages=message::where('reciever_id','=',$auth_user)->where('message_status','!=','read')->orderBy('created_at','desc')->get();
        $message_unread=message::where('reciever_id','=',$auth_user)->where('message_status','!=','read')->orderBy('created_at','desc')->get();
        $messages=message::where('reciever_id','=',$auth_user)->orderBy('created_at','desc')->get();
        return view('@pages_all.admin_page.user_message',compact('user','messages','message_unread'));  

    }
    public function sent_message(){
        $auth_user = Auth::user()->id;
        $user=user::where ('id', '!=',$auth_user)->get();
        $message_unread=message::where('reciever_id','=',$auth_user)->where('message_status','!=','read')->orderBy('created_at','desc')->get();
        $recievers=messagesent::where('sender_id','=',$auth_user)->orderBy('created_at','desc')->get();
        return view('@pages_all.admin_page.sent_message',compact('recievers','user','message_unread'));
    

    }
    public function  view_news(){
        $auth_user = Auth::user()->id;
        $date=carbon::now();
        $user=user::where ('id', '!=',$auth_user)->get();
        $message_unread=message::where('reciever_id','=',$auth_user)->where('message_status','!=','read')->orderBy('created_at','desc')->get();
        $recievers=messagesent::where('sender_id','=',$auth_user)->orderBy('created_at','desc')->get();
       $news=DB::select('select * from news');
        return view('@pages_all.admin_page.view_news',compact('recievers','user','message_unread','news'));
    

    }

    public function  allow_registeration(){
        $auth_user = Auth::user()->id;
        $user=user::where ('id', '!=',$auth_user)->get();
        $message_unread=message::where('reciever_id','=',$auth_user)->where('message_status','!=','read')->orderBy('created_at','desc')->get();
        $recievers=messagesent::where('sender_id','=',$auth_user)->orderBy('created_at','desc')->get();
        $activations=DB::select('select * from register_activations');
        return view('@pages_all.admin_page.registeration',compact('recievers','user','message_unread','activations'));
    

    }
    public function  allow_register(Request $request, $button){
        $date=$request->date;
        $status=$button;
       
            if($status=='Activate'){
        $activations=DB::update('update register_activations set status =?,end_date=? where status=?', ['Activated',$date,'Deactivated']); 
             if($activations){
                Alert::Success('The registeration is Allowed', ' ', 'success');
                return redirect()->back();
             }else{
                Alert::error('Try again', 'Activation', 'error');
                return redirect()->back();     
            }   
        
            }else{
                 $activations=DB::update('update register_activations  set status =? where status=? ',['Deactivated','Activated']); 
                if($activations){
                    Alert::Success('The registeration is Denied', ' ', 'success');
            
                    return redirect()->back();  
                }
                else{
                    Alert::error('Try again', ' denial', 'error');
                    return redirect()->back();     
                }
               
            }
            
        
        

    }
   
}
