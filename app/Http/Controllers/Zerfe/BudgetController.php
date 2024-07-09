<?php

namespace App\Http\Controllers\Zerfe;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use App\Models\User;
use App\Models\Message;
use RealRashid\SweetAlert\Facades\Alert;
class BudgetController extends Controller
{
    //
    public function __construct()
    {
    	$this->middleware('auth');
    }
    function viewBudget(){
        $auth_user = Auth::user()->id;
        $auth_zerfe_id=Auth::user()->zerfe_id;
        $zerfe=DB::table('zerfes')->select('zerfe_name')->where('zerfe_id',$auth_zerfe_id)->get();
        
        $message_unread=message::where('reciever_id','=',$auth_user)->where('message_status','!=','read')->orderBy('created_at','desc')->get();
        ///budget
        $budget_query=DB::table('budgets')->where('zerfe_id',$auth_zerfe_id)->where('status','!=','Expired')->get();
        $total=0;
        foreach($budget_query as $budget){
            $total = $total + $budget->budget_amount;
        }
        return view('@pages_all.zerfe_page.budget', compact( 'message_unread','zerfe','total','budget_query'));

        
    }
    function viewReport(){
        $auth_user = Auth::user()->id;
        $auth_zerfe_id=Auth::user()->zerfe_id;
        $zerfe=DB::table('zerfes')->select('zerfe_name')->where('zerfe_id',$auth_zerfe_id)->get();
        //invalid budget
        $invalid_budget_query=DB::select('select * from budgets where zerfe_id=?', [0]);
        //
        $message_unread=message::where('reciever_id','=',$auth_user)->where('message_status','!=','read')->orderBy('created_at','desc')->get();
        $year_query=DB::select('select distinct year from budgets where zerfe_id= ?', [$auth_zerfe_id]);
        return view('@pages_all.zerfe_page.budget_report_list', compact( 'message_unread','zerfe','year_query','invalid_budget_query'));

    }
    function viewReports(Request $request){
        $year=$request->years;
        $auth_zerfe_id=Auth::user()->zerfe_id;
        $auth_user = Auth::user()->id;
        //budget
        $budget_query=DB::table('budgets')->where('zerfe_id',$auth_zerfe_id)->where('year',$year)->get();
        foreach($budget_query as $budget){
            $total =$budget->budget_amount;
            $remain = $budget->remain_amount;
        }
        $used=$total-$remain;
        $percent_used = ($total - $remain) * 100 / $total;
        $percent_remains = 100 - $percent_used;
       //annual udget
$total_budget_query=DB::select('select * from budgets where year=?', [$year]);
$annual=0;
foreach($total_budget_query as $annual_budget){
    $annual = $annual + $annual_budget->budget_amount;
    $annual_percent = ($total / $annual) * 100; 
}
//invalid query
$invalid_budget_query=DB::select('select * from budgets where year=? AND zerfe_id=?', [$year,0]);
//queries
        $zerfe=DB::table('zerfes')->select('zerfe_name')->where('zerfe_id',$auth_zerfe_id)->get();
        $message_unread=message::where('reciever_id','=',$auth_user)->where('message_status','!=','read')->orderBy('created_at','desc')->get();
        $year_query=DB::select('select distinct year from budgets where zerfe_id= ?', [$auth_zerfe_id]);
        
return view('@pages_all.zerfe_page.budget_report_list', compact( 'message_unread','zerfe','total','remain','used','annual_percent','percent_used','percent_remains','year_query','budget_query','invalid_budget_query'));

    }
    function showBudgetDetail($budget_id,$direction){
        $auth_zerfe_id=Auth::user()->zerfe_id;
        $auth_user = Auth::user()->id;
        $zerfe=DB::table('zerfes')->select('zerfe_name')->where('zerfe_id',$auth_zerfe_id)->get();
        $message_unread=message::where('reciever_id','=',$auth_user)->where('message_status','!=','read')->orderBy('created_at','desc')->get();
        
//budget_detail
$budget_detail_query=DB::table('budget_details')->join('account_categories','budget_details.account_id','=','account_categories.account_id')->where('budget_details.budget_id',$budget_id)->get();
   //zerfe_query
   $zerfe_query=DB::table('zerfes')->join('budget_categories','zerfes.zerfe_id','=','budget_categories.zerfe_id')->where('zerfes.zerfe_id',$auth_zerfe_id)->get();    

   $budget_query=DB::table('budgets')->where('budget_id',$budget_id)->get();
   foreach($budget_query as $budget){
    $amount = $budget->budget_amount;
    
   }
   
//budget_detail_amount
$budget_detail_amount=DB::table('budget_details')->where('budget_id',$budget_id)->get();
$total=0;
foreach($budget_detail_amount as $detail_amount){
    $total = $total + $detail_amount->amount;
}

   return view('@pages_all.zerfe_page.budget_detail', compact( 'message_unread','zerfe','direction','zerfe_query','amount','total','budget_detail_query'));
   
    }
    function showBudgetRequestForm(){
        $auth_zerfe_id=Auth::user()->zerfe_id;
        $auth_user = Auth::user()->id;
        $zerfe=DB::table('zerfes')->select('zerfe_name')->where('zerfe_id',$auth_zerfe_id)->get();
        $message_unread=message::where('reciever_id','=',$auth_user)->where('message_status','!=','read')->orderBy('created_at','desc')->get();
        //budgte category
        $budget_category_query =DB::table('budget_categories')->where('zerfe_id',$auth_zerfe_id)->get();
        return view('@pages_all.zerfe_page.budget_request_form', compact( 'message_unread','zerfe','budget_category_query'));
     
    }
    function requestBudget(Request $request){
        $title = $request->title;
        $amount = $request->amount;
        $category = $request->category;
        $desc = $request->description;
        $Today=date('Y-m-d');
        //to get authenticated user full_name and their zerfe_id
        $auth_zerfe_id=Auth::user()->zerfe_id;
        $auth_f_name = Auth::user()->first_name;
        $auth_l_name = Auth::user()->last_name;
        $full_name=$auth_f_name.' '.$auth_l_name ;
        $zerfe=DB::table('zerfes')->select('zerfe_name')->where('zerfe_id',$auth_zerfe_id)->get();
        foreach($zerfe as  $rowz){
            $z_zerfe_name = $rowz->zerfe_name;
        }
        $budget_query=DB::table('budgets')->where('zerfe_id',$auth_zerfe_id)->where('status','!=','Expired')->get();
        foreach($budget_query as $row_b){
            $bamount = $row_b->budget_amount;
            $ramount = $row_b->remain_amount;
            $fdate = $row_b->final_date;
           
        }
       
 if ($amount > $ramount) {
    Alert::error('Warnning!',"Your remain amount is less! [ {{$ramount}}]", 'error');
    return redirect()->back();
 }else if($Today>$fdate){
    Alert::error('Warnning!',"Your budget date is expired! [ {{$Today}}]", 'error');
    return redirect()->back();
 }else{
    DB::insert('insert into budget_requests (category_id,b_request_title,b_request_date,b_request_amount,description,zerfe_name,status) values (?,?,?,?,?,?,?)', [$category,$title,$Today,$amount,$desc,$z_zerfe_name,'Pending']);
    Alert::success('Your request is successfuly sent!',"Congratulation", 'success');
   return redirect()->back();
    }
}
}
