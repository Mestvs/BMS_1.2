<?php

namespace App\Http\Controllers\Zerfe;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use DB;
use App\Models\User;
use App\Models\Plan;
use App\Models\ZerfePlanSent;
use App\Models\ZerfePlan;
use App\Models\Message;
use App\Models\DirectoratePlan;

use Illuminate\Support\Facades\Response;
use RealRashid\SweetAlert\Facades\Alert;
class PlanController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }
    //
    function plan(){
        $today=date('Y-m-d');
        $auth_user = Auth::user()->id;
        $auth_zerfe_id=Auth::user()->zerfe_id;
        $zerfe=DB::table('zerfes')->select('zerfe_name')->where('zerfe_id',$auth_zerfe_id)->get();
        
        $message_unread=message::where('reciever_id','=',$auth_user)->where('message_status','!=','read')->orderBy('created_at','desc')->get();
        $total_user = User::get()->count();
        $news=DB::select('select * from news where date=?',[$today]);
          ///pl
          $plan_query=DB::table('directorate_plans')->join('plans','plans.plan_id','=','directorate_plans.plan_id')->join('directorates','directorates.directorate_id','=','directorate_plans.directorate_id')
          ->join('zerfes','zerfes.zerfe_id','=','directorate_plans.zerfe_id')->select('directorate_plans.directorate_plan_id',
          'directorate_plans.filename','directorate_plans.size','directorate_plans.description','directorate_plans.status','directorate_plans.prepared_date','zerfes.zerfe_name','plans.year','plans.plan_type','directorates.directorate_name')->where('zerfes.zerfe_id',$auth_zerfe_id)->get();
         
        return view('@pages_all.zerfe_page.plan', compact( 'message_unread','total_user','news','zerfe','plan_query'));

        
    }
    function annual_plan(){
        
        $auth_user = Auth::user()->id;
        $message_unread=message::where('reciever_id','=',$auth_user)->where('message_status','!=','read')->orderBy('created_at','desc')->get();
        $plans=DB::select('select * from plans where status=? order by plan_id asc',['New']);
        $auth_zerfe_id=Auth::user()->zerfe_id;
        $zerfe=DB::table('zerfes')->select('zerfe_name')->where('zerfe_id',$auth_zerfe_id)->get();
        
        return view('@pages_all.zerfe_page.annual_plan_download', compact( 'message_unread','plans','zerfe'));
    }
    function download_file($id){
        $file=plan::Where('plan_id','=',$id)->value('filename');
       $pathToFile = public_path( 'uploads' . DIRECTORY_SEPARATOR . $file );
        return Response::download($pathToFile);
       
    }
    function d_download_file($id){
        $file=directorateplan::Where('directorate_plan_id','=',$id)->value('filename');
       $pathToFile = public_path( 'uploads' . DIRECTORY_SEPARATOR . $file );
        return Response::download($pathToFile);
       
    }
    function plan_submit_selection(){
        $auth_user = Auth::user()->id;
        $message_unread=message::where('reciever_id','=',$auth_user)->where('message_status','!=','read')->orderBy('created_at','desc')->get();
        $plans=DB::select('select * from plans where status=? order by plan_id asc',['New']);
        $auth_zerfe_id=Auth::user()->zerfe_id;
        $zerfe=DB::table('zerfes')->select('zerfe_name')->where('zerfe_id',$auth_zerfe_id)->get();
        
        return view('@pages_all.zerfe_page.plan_submit_select', compact( 'message_unread','plans','zerfe'));
       
    }

    function plan_form($category){
        $get_category=$category;
        $auth_user = Auth::user()->id;
        $message_unread=message::where('reciever_id','=',$auth_user)->where('message_status','!=','read')->orderBy('created_at','desc')->get();
        $plans=DB::select('select * from plans where status=? order by plan_id asc',['New']);
        $auth_zerfe_id=Auth::user()->zerfe_id;
        $zerfe=DB::table('zerfes')->select('zerfe_name')->where('zerfe_id',$auth_zerfe_id)->get();
        $year_query=DB::table('plans')->distinct('year')->select('year')->where('status','New')->get();
        return view('@pages_all.zerfe_page.plan_prepare_form', compact( 'message_unread','plans','zerfe','get_category','year_query'));
       
   
    }
    function plan_to_limatekid(Request $request){
        $plan_id =$request->plan_id; 
        $description =$request->description; 
        $Today = date('y:m:d');
        $status = 'Not Approved'; //add
        $auth_zerfe_id=Auth::user()->zerfe_id;
        $file=$request->myfile;
    $filename=$_FILES['myfile']['name'];
    $size = $_FILES['myfile']['size'];
    $request->myfile->move('Uploads',$filename);
    //insert
    $plan=new Zerfeplansent;
    $plan->zerfe_id=$auth_zerfe_id;
    $plan->plan_id=$plan_id;
    $plan->filename=$filename;
    $plan->size=$size;
    $plan->description=$description;
    $plan->sent_date=$Today;
    $plan->status=$status;

    $query=DB::table('zerfe_plan_sents')->select('*')->where('plan_id',$plan_id)->where('zerfe_id',$auth_zerfe_id)->get();
    if($query->count()>0){

    Alert::error('error', 'The plan already exist', 'Try again');
return redirect()->back();
}else{
$plan->save();
DB::update('update zerfe_plan_sents set status=? where zerfe_id=? AND plan_id !=?', ['Previous',$auth_zerfe_id,$plan_id]);
Alert::success('You  Submitted the plan successfully', 'Congratulation', 'Success');
return redirect()->back();  
}
    }
    function plan_to_directorate(Request $request){
        $plan_id =$request->plan_id; 
        $description =$request->description; 
        $Today = date('y:m:d');
        $status = 'New'; //add
        $auth_zerfe_id=Auth::user()->zerfe_id;
        $file=$request->myfile;
    $filename=$_FILES['myfile']['name'];
    $size = $_FILES['myfile']['size'];
    $request->myfile->move('Uploads',$filename);
    //check
 $query=DB::table('zerfe_plans')->select('*')->where('plan_id',$plan_id)->where('zerfe_id',$auth_zerfe_id)->get();
    if($query->count()>0){

    Alert::error('error', 'The plan already exist', 'Try again');
return redirect()->back();
}else{
DB::insert('insert into zerfe_plans (zerfe_id,plan_id,filename,size,description,date,status) values (?,?,?,?,?,?,?)', [$auth_zerfe_id,$plan_id,$filename,$size,$description,$Today,$status]);

DB::update('update zerfe_plans set status=? where zerfe_id=? AND plan_id !=?', ['Previous',$auth_zerfe_id,$plan_id]);
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
        ///directorate_plan
        $plan_query=DB::table('directorate_plans')->join('plans','plans.plan_id','=','directorate_plans.plan_id')->join('directorates','directorates.directorate_id','=','directorate_plans.directorate_id')
          ->join('zerfes','zerfes.zerfe_id','=','directorate_plans.zerfe_id')->select('directorate_plans.directorate_plan_id',
          'directorate_plans.filename','directorate_plans.size','directorate_plans.description','directorate_plans.status','directorate_plans.prepared_date','zerfes.zerfe_name','plans.year','plans.plan_type','directorates.directorate_name')->where('directorate_plans.zerfe_id',$auth_zerfe_id)->where('plans.status','New')->get();
       $plan_query_selected=DB::table('directorate_plans')->join('plans','plans.plan_id','=','directorate_plans.plan_id')->join('directorates','directorates.directorate_id','=','directorate_plans.directorate_id')
       ->join('zerfes','zerfes.zerfe_id','=','directorate_plans.zerfe_id')->select('directorate_plans.directorate_plan_id',
       'directorate_plans.filename','directorate_plans.size','directorate_plans.description','directorate_plans.status','directorate_plans.prepared_date','zerfes.zerfe_name','plans.year','plans.plan_type','directorates.directorate_name')->where('directorate_plan_id',$id)->get();
   
        return view('@pages_all.zerfe_page.plan_edit', compact( 'message_unread','plan_query','zerfe','plan_query_selected'));
       

    }
    function plan_edit(Request $request, $id){
        $status =$request->sign;
        
$dp_query=DB::table('directorate_plans')->select('status')->where('directorate_plan_id',$id)->get();
foreach($dp_query as $query){
$exist_status=$query->status;
}
if($exist_status=='Approved'){
    Alert::error('Your plan is approved!', "You Don't update it", 'Try again');
    return redirect()->back();  
}else if ($exist_status == 'Pending' || $exist_status == 'Signed' || $exist_status == 'rejected') {
   DB::update('update directorate_plans  set status=? where directorate_plan_id =?', [$status,$id]);
   Alert::success('plan Successfully Updated!', 'Congratulation', 'Success');
return redirect()->back(); 
}
    }

}


