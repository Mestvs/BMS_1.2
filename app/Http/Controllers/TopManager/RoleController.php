<?php

namespace App\Http\Controllers\TopManager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use DB;
use App\Models\Message;
use RealRashid\SweetAlert\Facades\Alert;
class RoleController extends Controller
{
  public function __construct()
    {
    	$this->middleware('auth');
    }
    //
function show_roles(){
    $auth_user = Auth::user()->id;
    $message_unread=message::where('reciever_id','=',$auth_user)->where('message_status','!=','read')->orderBy('created_at','desc')->get();
    $roles=DB::table('directorates')->select('*')->where('directorate_name','!=','Unknown')->get();
    
  return view('@pages_all.Top_manager_page.roles', compact( 'message_unread','roles'));
   
}
function show_role_form(){
    $auth_user = Auth::user()->id;
    $message_unread=message::where('reciever_id','=',$auth_user)->where('message_status','!=','read')->orderBy('created_at','desc')->get();
    $zerfe_query=DB::table('zerfes')->select('*')->where('zerfe_name','!=','Unknown')->get();
    
  return view('@pages_all.Top_manager_page.add_d_role', compact( 'message_unread','zerfe_query'));
   
}
function add_role(Request $request){

    $directorate =$request->directorate;
    $zerfe_id = $request->type;
    $directorate_query=DB::table('directorates')->select('*')->where('directorate_name','=',$directorate)->get();
    if($directorate_query->count()>0){
        Alert::error('Role exists','please try again','error');
        return redirect()->back();
    }else{
        DB::insert('insert into directorates (directorate_name,zerfe_id) values (?, ?)', [$directorate, $zerfe_id]);
        Alert::success('Role Successfully added!','Congratulation!','success');
        return redirect()->back();
    }
}
function show_update_role_form($id){
    $auth_user = Auth::user()->id;
    $message_unread=message::where('reciever_id','=',$auth_user)->where('message_status','!=','read')->orderBy('created_at','desc')->get();
    $roles=DB::table('directorates')->select('*')->where('directorate_name','!=','Unknown')->get();
    $directorate_query=DB::table('directorates')->select('*')->where('directorate_id',$id)->get();
    
  return view('@pages_all.Top_manager_page.update_role', compact( 'message_unread','roles','directorate_query'));
     
}
function update_role(Request $request,$id){
  $d_id = $request->directorate_id;
  $d_name = $request->directorate_name;
  $z_id =$request->zerfe_id;
  $zerfe_query=DB::table('zerfes')->select('*')->where('zerfe_id',$z_id)->get();
    if($zerfe_query->count()<0){
      Alert::error('this Zerfe_id does not exists','please try again','error');
        return redirect()->back();
    }else{
      $user_update=DB::update('update directorates set directorate_id = ?,directorate_name=?,zerfe_id =? where directorate_id = ?', [ $d_id, $d_name, $z_id,$id]);
      Alert::success('Role Successfully Updated!','Congratulation!','success');
      return redirect()->back();
    }



}
}