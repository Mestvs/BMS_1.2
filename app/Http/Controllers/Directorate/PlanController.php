<?php

namespace App\Http\Controllers\Directorate;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\DirectoratePlan;
use App\Models\ZerfePlan;
use Auth;
use DB;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Response;
class PlanController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }
    //
    function plan(){
        $auth_user = Auth::user()->id;
        $message_unread=message::where('reciever_id','=',$auth_user)->where('message_status','!=','read')->orderBy('created_at','desc')->get();
         ////d
         $auth_directorate_id = Auth::user()->directorate_id;
         $d_query=DB::table('users')->join('directorates','directorates.directorate_id','=','users.directorate_id')->select('directorates.directorate_name')->where('users.directorate_id',$auth_directorate_id)->get();
         ///pl
         $plan_query=DB::table('directorate_plans')->join('plans','plans.plan_id','=','directorate_plans.plan_id')->join('zerfes','zerfes.zerfe_id','=','directorate_plans.zerfe_id')->select('directorate_plans.directorate_plan_id',
         'directorate_plans.filename','directorate_plans.size','directorate_plans.description','directorate_plans.status','directorate_plans.prepared_date','zerfes.zerfe_name','plans.year','plans.plan_type')->where('directorate_plans.directorate_id',$auth_directorate_id)->get();
        return view('@pages_all.directorate_page.plan', compact( 'message_unread','d_query','plan_query'));

       
    }
function plan_form(){
    $auth_user = Auth::user()->id;
    $message_unread=message::where('reciever_id','=',$auth_user)->where('message_status','!=','read')->orderBy('created_at','desc')->get();
     ////d
     $auth_directorate_id = Auth::user()->directorate_id;
     $d_query=DB::table('users')->join('directorates','directorates.directorate_id','=','users.directorate_id')->select('directorates.directorate_name')->where('users.directorate_id',$auth_directorate_id)->get();
     ///pl
     $plan_query=DB::table('plans')->select('*')->where('plans.status','New')->get(); 
//
$z_query =DB::table('zerfes')->select('*')->where('zerfe_name','!=','Unknown')->get();
  return view('@pages_all.directorate_page.plan_prepare_form', compact( 'message_unread','d_query','plan_query','z_query'));

  
}
function plan_submit(Request $request){
    $directorate_id=Auth::user()->directorate_id;
    $plan_id =$request->plan_id; 
    $zerfe_id =$request->type;
    $status='Pending';
    $today=date('Y-m-d');
    $description=$request->description;
    $file=$request->myfile;
    $filename=$_FILES['myfile']['name'];
    $size = $_FILES['myfile']['size'];
    $request->myfile->move('Uploads',$filename);

$plan_query=DB::select('select * from directorate_plans where plan_id = ? AND directorate_id=?', [$plan_id,$directorate_id]);
if($plan_query){
Alert::error('error', 'The plan already exist', 'Try again');
return redirect()->back();
}else{
    DB::insert('insert into directorate_plans(plan_id,directorate_id,zerfe_id,size,description,filename,prepared_date,status) values (?, ?,?,?,?,?,?,?)', [$plan_id,$directorate_id,$zerfe_id,$size,$description,$filename,$today,$status]);
   
Alert::success('You  Submitted the plan successfully', 'Congratulation', 'Success');
return redirect()->back();  
}

}

   function plan_delete(Request $request){
   
   $id = $request->selector;
    if(value($id)==null){
        return redirect()->back()->with('error','please select the check box?','Warnning!');  
    }
    else{
        $N = count($id);
    }
   
    for ($i = 0; $i < $N; $i++) {
        $result=DB::delete('DELETE FROM directorate_plans where directorate_plan_id= ?', [$id[$i]]);
       }
       return redirect()->back()->with('message','Deleted Successfully');   
   
}
function update_plan_form($id){
    $auth_user = Auth::user()->id;
    $message_unread=message::where('reciever_id','=',$auth_user)->where('message_status','!=','read')->orderBy('created_at','desc')->get();
         ////directorate
     $auth_directorate_id = Auth::user()->directorate_id;
     $d_query=DB::table('users')->join('directorates','directorates.directorate_id','=','users.directorate_id')->select('directorates.directorate_name')->where('users.directorate_id',$auth_directorate_id)->get();
        ///plan
     $plan_query=DB::table('plans')->select('*')->where('plans.status','New')->get(); 
           //zerfe query
  $z_query =DB::table('zerfes')->select('*')->where('zerfe_name','!=','Unknown')->get();
     //directorate_plan
  $directorate_plan=DB::table('directorate_plans')->join('plans','directorate_plans.plan_id','=','plans.plan_id')->join('zerfes','zerfes.zerfe_id','=','directorate_plans.zerfe_id')
  ->select('directorate_plans.directorate_plan_id','directorate_plans.filename','directorate_plans.size','directorate_plans.description','directorate_plans.status','directorate_plans.prepared_date','zerfes.zerfe_name',
  'plans.year','plans.plan_type')->where('directorate_plans.directorate_plan_id',$id)->get();
return view('@pages_all.directorate_page.update_plan', compact( 'message_unread','d_query','plan_query','z_query','directorate_plan'));

}
function update_plan(Request $request, $id){
 $plan_id =$request->plan_id;
 $description =$request->description;
 $status = 'Pending'; //add
 $file=$request->myfile;
 $filename=$_FILES['myfile']['name'];
 $size = $_FILES['myfile']['size'];
 $request->myfile->move('Uploads',$filename);

$query=DB::table('directorate_plans')->select('*')->where('directorate_plan_id',$id)->where('status','Signed')->get();
if($query->count()>0){
    Alert::error('error', 'The plan was Signed', 'Try again');
return redirect()->back();

}else{
    DB::update('update directorate_plans set plan_id =?,filename=?,size=?,description=?,status=? where directorate_plan_id = ?', [$plan_id,$filename, $size,$description,$status,$id]);
    Alert::success('You  updated the plan successfully', 'Congratulation', 'Success');
    return redirect()->back();  
}
}
function annual_plan(){
        
    $auth_user = Auth::user()->id;
    
    $message_unread=message::where('reciever_id','=',$auth_user)->where('message_status','!=','read')->orderBy('created_at','desc')->get();
    $plans=DB::select('select * from plans where status=? order by plan_id asc',['New']);
    ///v
    $auth_directorate_id = Auth::user()->directorate_id;
    $d_query=DB::table('users')->join('directorates','directorates.directorate_id','=','users.directorate_id')->select('directorates.directorate_name')->where('users.directorate_id',$auth_directorate_id)->get();
    ///zerfe_plan
    $auth_zerfe_id=Auth::user()->zerfe_id;
    $zerfe_Plan_query=DB::table('zerfe_plans')->join('zerfes','zerfe_plans.zerfe_id','=','zerfes.zerfe_id' )->join('plans','zerfe_plans.plan_id','=','plans.plan_id')
    ->select('zerfe_plans.zerfe_plan_id','zerfe_plans.filename','zerfe_plans.size','zerfe_plans.description','zerfe_plans.date','zerfe_plans.status','zerfes.zerfe_name','plans.plan_type','plans.year')
    ->where('zerfe_plans.status','New')->where('zerfe_plans.zerfe_id',$auth_zerfe_id)->get();
    return view('@pages_all.directorate_page.annual_plan_download', compact( 'message_unread','plans','d_query','zerfe_Plan_query'));
}
function download_file($id){
    $file=zerfeplan::Where('zerfe_plan_id','=',$id)->value('filename');
   $pathToFile = public_path( 'uploads' . DIRECTORY_SEPARATOR . $file );
    return Response::download($pathToFile);
   
}
}
