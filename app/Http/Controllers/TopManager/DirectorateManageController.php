<?php

namespace App\Http\Controllers\TopManager;
use Auth;
use App\Models\Message;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
class DirectorateManageController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }
    //
    public function show_zerfe(){
        $auth_user = Auth::user()->id;
        $message_unread=message::where('reciever_id','=',$auth_user)->where('message_status','!=','read')->orderBy('created_at','desc')->get();
        $zerfe_query=DB::table('zerfes')->select('*')->where('Zerfe_name','!=','Unknown')->get();
        $user_query=DB::table('users')->select('*')->get();
         $user_check='no';
        return view('@pages_all.Top_manager_page.assign_zerfe_list', compact( 'message_unread','user_query','zerfe_query','user_check'));
    }
    
    
    public function show_zerfe_list_update($id){
        $auth_user = Auth::user()->id;
        $message_unread=message::where('reciever_id','=',$auth_user)->where('message_status','!=','read')->orderBy('created_at','desc')->get();
        $zerfe_query=DB::table('zerfes')->select('*')->where('Zerfe_name','!=','Unknown')->get();
        $user_check=DB::table('users')->select('*')->where('id',$id)->get();
        $user_query=DB::table('users')->select('*')->get();
      return view('@pages_all.Top_manager_page.assign_zerfe_list', compact( 'message_unread','user_query','zerfe_query','user_check'));
          

    }

function approve_as_zerfe(Request $request, $id){
    $zerfe_id=$request->type;
    $user_status=$request->status;
    $user_check=DB::table('users')->select('*')->where('user_status',$user_status)->where('zerfe_id',$zerfe_id)->where('role','Zerfe')->get();
    if($user_check->count()>0){
        Alert::error('The user already assigned for this role ','please try again','error'); 
     return redirect()->back();
   }else{
    
    $user_update=DB::update('update users set user_status = ?,zerfe_id=?,directorate_id=?,role=? where id = ?', [$user_status,$zerfe_id,1,'Zerfe',$id]);
   if($user_update){
    if($user_status=='Approved'){
        Alert::success('User assigned successfully','Congratutlation','success');
    return redirect()->back();
    }
    else{
        Alert::success('User Denied successfully','Congratutlation','success'); 
         return redirect()->back();
    }
   }
   else{
    Alert::error('Something go wrong ','please try again','error'); 
     return redirect()->back();
   }
}
}
function show_category(){
    $auth_user = Auth::user()->id;
        $message_unread=message::where('reciever_id','=',$auth_user)->where('message_status','!=','read')->orderBy('created_at','desc')->get();
        $zerfe_query1=DB::table('zerfes')->select('zerfe_id')->where('Zerfe_name','=','Admin_&_Finance')->get();
        $zerfe_query2=DB::table('zerfes')->select('zerfe_id')->where('Zerfe_name','=','ICT')->get();
        $zerfe_query3=DB::table('zerfes')->select('zerfe_id')->where('Zerfe_name','=','Top_Management')->get();
        $zerfe_query4=DB::table('zerfes')->select('zerfe_id')->where('Zerfe_name','=','Science_&_Technology')->get();

        return view('@pages_all.Top_manager_page.assign_dept_select', compact( 'message_unread','zerfe_query1','zerfe_query2','zerfe_query3','zerfe_query4'));
    
}
function show_directorate_assign($id){
    $auth_user = Auth::user()->id;
    $message_unread=message::where('reciever_id','=',$auth_user)->where('message_status','!=','read')->orderBy('created_at','desc')->get();
    $directorate_query=DB::table('directorates')->select('*')->where('Zerfe_id','=',$id)->get();
    $user_check='no';
    $zid=$id;
    $user_query=DB::table('users')->select('*')->get();
    return view('@pages_all.Top_manager_page.assign_directorate_list', compact( 'message_unread','user_check','directorate_query','user_query','zid'));

}
function show_directorate_assign_form($zid,$uid){
   
    $auth_user = Auth::user()->id;
    $message_unread=message::where('reciever_id','=',$auth_user)->where('message_status','!=','read')->orderBy('created_at','desc')->get();
    $directorate_query=DB::table('directorates')->select('*')->where('Zerfe_id','=',$zid)->get();
    $user_check=DB::table('users')->select('*')->where('id',$uid)->get();
    $user_query=DB::table('users')->select('*')->get();
    $zid=$zid;
    return view('@pages_all.Top_manager_page.assign_directorate_list', compact( 'message_unread','user_check','directorate_query','user_query','zid'));

}
function assign_directorate ( Request $request,$zid,$uid){
    $type=$request->type;
    $user_status=$request->status;
    $d_query =DB::table('directorates')->select('*')->where('directorate_id', $type)->get();
    foreach( $d_query as  $query){
        $role = $query->directorate_name;
    }
    if ($role == 'adminstrater' || $role == 'Top_Manager' || $role == 'Finance_Manager' || $role == 'Purchasing_&_Finance' || $role == 'Limatekid') {
        $user_update=DB::update('update users set user_status = ?,directorate_id=?,role=?,zerfe_id=? where id = ?', [$user_status,$type,$role,$zid,$uid]);
        if($user_update){
            if($user_status=='Approved'){
                Alert::success('User assigned successfully','Congratutlation','success');
            return redirect()->back();
            }
            else{
                Alert::success('User Denied successfully','Congratutlation','success'); 
                 return redirect()->back();
            }
           }
           else{
            Alert::error('Something go wrong ','please try again','error'); 
             return redirect()->back();
           }
    
    }else{
        $user_update=DB::update('update users set user_status = ?,directorate_id=?,role=?,zerfe_id=? where id = ?', [$user_status,$type,'Directorate',$zid,$uid]);
    
        if($user_update){
            if($user_status=='Approved'){
                Alert::success('User assigned successfully','Congratutlation','success');
            return redirect()->back();
            }
            else{
                Alert::success('User Denied successfully','Congratutlation','success'); 
                 return redirect()->back();
            }
           }
           else{
            Alert::error('Something go wrong ','please try again','error'); 
             return redirect()->back();
           }
    }

}
    }
/*
if (isset($_POST['update'])) {
 $firstname = $_POST['firstname'];
 $lastname = $_POST['lastname'];
 $username = $_POST['username'];
 $type = $_POST['type'];
 $user_status = $_POST['status'];
 $d_query = mysqli_query($link, "select * from directorates where directorate_id='$type'  ") or die(mysqli_error());
 $rowd = mysqli_fetch_array($d_query);
 $role = $rowd['directorate_name'];
 $query = mysqli_query($link, "select * from users where username = '$username' ")
  or die(mysqli_error());
 $count = mysqli_num_rows($query);
 if ($count > 1) { ?>
<script>
 swal("UserName Already Existed!", " Please Try Again! ", "error");
//nosuccess();
</script> <?php

 }

 else if ($role == 'adminstrater' || $role == 'Top_Manager' || $role == 'Finance_Manager' || $role == 'Purchasing_&_Finance' || $role == 'Limatekid') {
  mysqli_query($link, "update users set username = '$username'  , firstname = '$firstname' , lastname = '$lastname' , directorate_id ='$type', role ='$role',zerfe_id='$get_category', user_status = ' $user_status' where user_id = '$get_id' ") or die(mysqli_error());
?>
<script>
 swal("User Successfully Updated!", "Congratulation!", "success")
</script> <?php
 }
 else {
  mysqli_query($link, "update users set username = '$username'  , firstname = '$firstname' , lastname = '$lastname' , directorate_id = '$type',zerfe_id='$get_category',role ='Directorate', user_status = ' $user_status' where user_id = '$get_id' ") or die(mysqli_error());
?>
<script>
 swal("User Successfully Updated!", "Congratulation!", "success")
</script> <?php
 }
}
?>
*/