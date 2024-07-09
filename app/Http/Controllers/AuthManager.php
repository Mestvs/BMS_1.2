<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use DB;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use App\Models\Message;
class AuthManager extends Controller
{
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
           
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }



function login(Request $request){
        $credentials= $request->only('email','password');
        if(Auth::attempt($credentials)){
           
if (auth()->user()->role == 'administrator' && auth()->user()-> account_status=='Activated' && auth()->user()->user_status=='Approved' ) {
    return ('true_admin'); 
}  
else
if (auth()->user()->role == 'Top_Manager' && auth()->user()-> account_status=='Activated' && auth()->user()->user_status=='Approved'  ) {
   return ('true_Top_Manager');
}
else
if (auth()->user()->role == 'Limatekid' && auth()->user()-> account_status=='Activated' && auth()->user()->user_status=='Approved' ) {
    return ('true_Limatekid');
}
else  
if (auth()->user()->role == 'Zerfe' && auth()->user()-> account_status=='Activated'&& auth()->user()->user_status=='Approved' ) {
    return ('true_Zerfe');
}
else
if (auth()->user()->role == 'Directorate' && auth()->user()-> account_status=='Activated' && auth()->user()->user_status=='Approved'  ) {
    return ('true_Directorate');
}
else
if (auth()->user()->role == 'Purchasing_&_Finance' && auth()->user()-> account_status=='Activated' && auth()->user()->user_status=='Approved' ) {
    return ('true_Finance');
}
else
if (auth()->user()->role == 'Finance_Manager' && auth()->user()-> account_status=='Activated' && auth()->user()->user_status=='Approved' ) {
    return ('true_Finance_Manager');
}
else{
    return ('error');
}
        }
        return back()->with("error","Please check your email and password ");
    }
//
function register(Request $request){
        
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

     $query=DB::table('users')->where('email',$email)->get();
     if( $query->count()>0){
        $user='exists';
        return view('home_page.register', compact( 'user'));
    
     }
     else{
        $user=$data->save();
        return view('home_page.register', compact( 'user','first_name','last_name','password','signature'));
     }
    
    }
    public function showChangePasswordForm(){
        $auth_user = Auth::user()->id;
        $message_unread=message::where('reciever_id','=',$auth_user)->where('message_status','!=','read')->orderBy('created_at','desc')->get();
        //directorate
        $auth_directorate_id = Auth::user()->directorate_id;
        $d_query=DB::table('users')->join('directorates','directorates.directorate_id','=','users.directorate_id')->select('directorates.directorate_name')->where('users.directorate_id',$auth_directorate_id)->get();
        //zerfe_name
        $auth_zerfe_id=Auth::user()->zerfe_id;
        $zerfe=DB::table('zerfes')->select('zerfe_name')->where('zerfe_id',$auth_zerfe_id)->get();
      
        if(auth()->user()->role=='administrator'){
            return view('@pages_all.admin_page.change_password_admin', compact('message_unread'));
        }
        else if(auth()->user()->role=='Top_Manager'){
            return view('@pages_all.top_manager_page.change_password', compact('message_unread'));
        }
        else if(auth()->user()->role=='Limatekid'){
            return view('@pages_all.limatekid_page.change_password', compact('message_unread'));
        }
        else if(auth()->user()->role=='Zerfe'){
            return view('@pages_all.zerfe_page.change_password', compact( 'message_unread','zerfe'));
        }
        else if(auth()->user()->role=='Directorate'){
            return view('@pages_all.directorate_page.change_password', compact( 'message_unread','d_query'));
        }
        else if(auth()->user()->role=='Purchasing_&_Finance'){
            return view('@pages_all.finance_page.change_password', compact('message_unread'));
        }
        else if(auth()->user()->role=='Finance_Manager'){
            return view('@pages_all.finance_manager_page.change_password', compact('message_unread'));
        }
        else{
            return redirect('/login');    
        }

        
    }
  public function changePassword(Request $request)

    {
        if (!Hash::check($request->currentpassword, $request->user()->password)) {
            return redirect()->back()->withErrors(['currentpassword' => 'Current password is not correct']);
        }
        if($request->new_password!=$request->retype_password){
            return redirect()->back()->withErrors(['retype_password' => 'Password Mismatched']);
        
        }
        $request->user()->update([
            'password' => bcrypt($request->new_password),
            'password_changed_at' => Carbon::now()->toDateTimeString()
        ]);
        return redirect()->back()->with(['status' => 'Password changed successfully']);
        
    }
    function changeProfile(Request $request,$id){
        $user=user::find($id);
        $image=$request->image;
$imagename=time().'.'.$image->getClientOriginalExtension();
$request->image->move('image',$imagename);
$user->profile_location=$imagename;
$user->save();
        return redirect()->back()->with('message','User detailes updated successfully '); 
    }
   
}
