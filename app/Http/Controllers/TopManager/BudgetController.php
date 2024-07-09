<?php

namespace App\Http\Controllers\TopManager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use App\Models\User;
use App\Models\Message;
use RealRashid\SweetAlert\Facades\Alert;
class BudgetController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }
    //
     function viewBudget(){
        
        $auth_user = Auth::user()->id;
        $message_unread=message::where('reciever_id','=',$auth_user)->where('message_status','!=','read')->orderBy('created_at','desc')->get();
        //this query is used to display the the new annual budget of the organization
        $budget_query=DB::table('budgets')->join('zerfes','budgets.zerfe_id','=','zerfes.zerfe_id')->where('budgets.status','!=','Expired')->get();
        return view('@pages_all.top_manager_page.budget', compact( 'message_unread','budget_query'));

} 
function showBudgetCategorySelection(){
    //this query is used to display the the new annual budget of the organization
    $z_query1 =DB::table('zerfes')->where('zerfe_name','=','Admin_&_Finance')->get();
    if($z_query1->count()>0){
        foreach($z_query1 as $row1){
            $id1=$row1->zerfe_id;
        }
        }
        else{
            $id1=0;
        }
        $z_query2 =DB::table('zerfes')->where('zerfe_name','=','ICT')->get();
        if($z_query2->count()>0){
            foreach($z_query2 as $row2){
                $id2=$row2->zerfe_id;
            }
            }
            else{
                $id2=0;
            }
            $z_query3 =DB::table('zerfes')->where('zerfe_name','=','Top_Management')->get();
            if($z_query3->count()>0){
                foreach($z_query1 as $row3){
                    $id3=$row3->zerfe_id;
                }
                }
                else{
                    $id3=0;
                }
       
                $z_query4 =DB::table('zerfes')->where('zerfe_name','=','Science_&_Technology')->get();
                if($z_query4->count()>0){
                    foreach($z_query4 as $row4){
                        $id4=$row4->zerfe_id;
                    }
                    }
                    else{
                        $id4=0;
                    }
           
   
    $auth_user = Auth::user()->id;
        $message_unread=message::where('reciever_id','=',$auth_user)->where('message_status','!=','read')->orderBy('created_at','desc')->get();
        return view('@pages_all.top_manager_page.budget_category_select', compact( 'message_unread','id1','id2','id3','id4'));
}
function viewBudgetReport($category){

    //query for year
$year_query=DB::select('select distinct year from budgets where zerfe_id=?', [$category]);
//query for zerfe
$z_query = DB::table('zerfes')->where('zerfe_id',$category)->get();

$auth_user = Auth::user()->id;
$message_unread=message::where('reciever_id','=',$auth_user)->where('message_status','!=','read')->orderBy('created_at','desc')->get();
return view('@pages_all.top_manager_page.budget_report_list', compact( 'message_unread','year_query','z_query','category'));

}
function viewBudgetReports(Request $request,$category){
    $year=$request->years;
      //query for year
$year_query=DB::select('select distinct year from budgets where zerfe_id=?', [$category]);
//query for zerfe
$z_query = DB::table('zerfes')->where('zerfe_id',$category)->get();

    //budget
$b_query1=DB::table('budgets')->where('zerfe_id',$category)->where('year',$year)->get();
foreach($b_query1 as $row1){
    $total = $row1->budget_amount;
    $remain = $row1->remain_amount;
    
}
    $used = $total - $remain;
    $percent_used = ($total - $remain) * 100 / $total;
    $percent_remains = 100 - $percent_used;
//budgets
$b_query2=DB::table('budgets')->where('year',$year)->get();
$annual=0;
foreach($b_query2 as $row2){ 
    $annual = $annual + $row2->budget_amount;
    $annual_percent = ($total / $annual) * 100;
}
//budget query
$budget_query=DB::table('budgets')->join('zerfes','budgets.zerfe_id','=','zerfes.zerfe_id')->where('budgets.zerfe_id',$category)->where('budgets.year',$year)->get();

$auth_user = Auth::user()->id;
$message_unread=message::where('reciever_id','=',$auth_user)->where('message_status','!=','read')->orderBy('created_at','desc')->get();
return view('@pages_all.top_manager_page.budget_report_list', compact( 'message_unread','year_query','z_query','budget_query','used','percent_used' ,'percent_remains','remain', 'annual','annual_percent','category','total'));

}
}
