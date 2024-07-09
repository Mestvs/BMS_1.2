<?php

namespace App\Http\Controllers\Limatekid;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use DB;
use App\Models\User;
use App\Models\Message;
use App\Models\MessageSent;
use App\Models\Plan;
use App\Models\ZerfePlanSent;
use App\Models\PlanApprovalDetail;
use Illuminate\Support\Facades\Response;
use RealRashid\SweetAlert\Facades\Alert;
class PlanController extends Controller
{
    //
    public function __construct()
    {
    	$this->middleware('auth');
    }
    function plan(){
        $auth_user = Auth::user()->id;
        $z_plan_query=DB::table('zerfe_plan_sents')->join('plans','zerfe_plan_sents.plan_id','=','plans.plan_id')->join('zerfes','zerfe_plan_sents.zerfe_id','=','zerfes.zerfe_id')
        ->select('zerfe_plan_sents.zerfe_sent_id','zerfe_plan_sents.filename','zerfe_plan_sents.description','zerfe_plan_sents.status','zerfe_plan_sents.sent_date','zerfes.zerfe_name','plans.plan_type','plans.year')->get();
        $message_unread=message::where('reciever_id','=',$auth_user)->where('message_status','!=','read')->orderBy('created_at','desc')->get();
        return view('@pages_all.limatekid_page.plan', compact( 'message_unread','z_plan_query'));

        
    }
    function plan_form(){
        //$today=date('Y-m-d');
        $auth_user = Auth::user()->id;
        $message_unread=message::where('reciever_id','=',$auth_user)->where('message_status','!=','read')->orderBy('created_at','desc')->get();
        //$total_user = User::get()->count();
        //$news=DB::select('select * from news where date=?',[$today]);
        
        return view('@pages_all.limatekid_page.plan_prepare_form', compact( 'message_unread'));

        
    }
    function plan_submit(Request $request){
        $plan=new plan;
        $status='New';
        $today=date('Y-m-d');
        $file=$request->myfile;
        $year=$request->year;
        $plan_type=$request->p_type;
        $filename=$_FILES['myfile']['name'];
        $size = $_FILES['myfile']['size'];
        $request->myfile->move('Uploads',$filename);
        $plan->plan_type=$plan_type;
        $plan->year=$year;
        $plan->size=$size;
        $plan->description=$request->description;
        $plan->filename=$filename;
        $plan->sent_date=$today;
        $plan->status=$status;
$plan_query=DB::select('select * from plans where year = ? AND plan_type=? AND status=?', [$year,$plan_type,$status]);
if($plan_query){
    Alert::error('error', 'The plan already exist', 'Try again');
    return redirect()->back();
}else{
    $plan->save();
    DB::update('update plans set status =? where year != ?', ['Previous',$year]);
    Alert::success('You  Submitted the plan successfully', 'Congratulation', 'Success');
    return redirect()->back();  
}
   
    
}
function plan_edit_form($id){
    $auth_user = Auth::user()->id;
    $message_unread=message::where('reciever_id','=',$auth_user)->where('message_status','!=','read')->orderBy('created_at','desc')->get();
    //$plan_query=DB::select('select * from plans where status=? order by plan_id asc',['New']);
    $auth_zerfe_id=Auth::user()->zerfe_id;
    $zerfe=DB::table('zerfes')->select('zerfe_name')->where('zerfe_id',$auth_zerfe_id)->get();
    ///zerfe_plan_sent
    $z_plan_query=DB::table('zerfe_plan_sents')->join('plans','zerfe_plan_sents.plan_id','=','plans.plan_id')->join('zerfes','zerfe_plan_sents.zerfe_id','=','zerfes.zerfe_id')
    ->select('zerfe_plan_sents.zerfe_sent_id','zerfe_plan_sents.filename','zerfe_plan_sents.size','zerfe_plan_sents.description','zerfe_plan_sents.status','zerfe_plan_sents.sent_date','zerfes.zerfe_name','plans.plan_type','plans.year')->get();
   $plan_query_selected=DB::table('zerfe_plan_sents')->join('plans','plans.plan_id','=','zerfe_plan_sents.plan_id')->join('zerfes','zerfes.zerfe_id','=','zerfe_plan_sents.zerfe_id')
   ->select('zerfe_plan_sents.zerfe_sent_id','zerfe_plan_sents.filename','zerfe_plan_sents.size','zerfe_plan_sents.description','zerfe_plan_sents.status','zerfe_plan_sents.sent_date','zerfes.zerfe_name','plans.plan_type','plans.year')->where('zerfe_sent_id',$id)->get();

    return view('@pages_all.limatekid_page.plan_edit', compact( 'message_unread','z_plan_query','zerfe','plan_query_selected'));
}
function plan_edit(Request $request, $id){
    $sign =Auth::user()->signature; 
 $fname =Auth::user()->first_name; 
 $lname =Auth::user()->last_name; 
 $fullname=$fname.' '.$lname;
 $Today = date('y:m:d');
 $status =$request->status;

$dp_query=DB::table('zerfe_plan_sents')->select('status')->where('zerfe_sent_id',$id)->get();
foreach($dp_query as $query){
$exist_status=$query->status;
}
if($exist_status=='Approved'){
Alert::error('Your plan is approved!', "You Don't update it", 'Try again');
return redirect()->back();  
}
else if ($exist_status == 'Not Approved') {
    $plan=new planapprovaldetail;
    $plan->zerfe_sent_id=$id;
    $plan->approver_name=$fullname;
    $plan->signature=$sign;
    $plan->approved_date=$Today;
    $plan->save();
    DB::update(' update zerfe_plan_sents set status=? where zerfe_sent_id = ?', [$status,$id]);
    Alert::success('You Approved plan Successfully!', 'Congratulation', 'Success');
    return redirect()->back(); 
}
else if ( $exist_status == 'rejected') {
DB::update('update zerfe_plan_sents  set status=? where zerfe_sent_id =?', [$status,$id]);
DB::update('update plan_approval_details  set zerfe_sent_id=? ,set approver_name=?, set signature=?,set approved_date=? where zerfe_sent_id =?', [$id,$fullname ,$sign,$Today,$id]);
Alert::success('plan Successfully Updated!', 'Congratulation', 'Success');
return redirect()->back(); 
}
}
function download_file($id){
    $file=zerfeplansent::Where('zerfe_sent_id','=',$id)->value('filename');
   $pathToFile = public_path( 'uploads' . DIRECTORY_SEPARATOR . $file );
    return Response::download($pathToFile);
   
}
}