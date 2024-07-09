<?php

namespace App\Http\Controllers\Limatekid;

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
    //
     function viewBudget(){
        
        $auth_user = Auth::user()->id;
        $message_unread=message::where('reciever_id','=',$auth_user)->where('message_status','!=','read')->orderBy('created_at','desc')->get();
        //this query is used to display the the new annual budget of the organization
        $budget_query=DB::table('budgets')->join('zerfes','budgets.zerfe_id','=','zerfes.zerfe_id')->where('budgets.status','!=','Expired')->get();
        return view('@pages_all.limatekid_page.budget', compact( 'message_unread','budget_query'));

}
function showBudgetCategorySelection(){
    //this query is used to display the the new annual budget of the organization
    $b_query1 =DB::table('budgets')->join('zerfes','budgets.zerfe_id','=','zerfes.zerfe_id')->where('budgets.status','!=','Expired')->where('zerfes.zerfe_name','=','Admin_&_Finance')->get();
    if($b_query1->count()>0){
        foreach($b_query1 as $row1){
            $id1=$row1->budget_id;
        }
        }
        else{
            $id1=0;
        }
       
    $b_query2 =DB::table('budgets')->join('zerfes','budgets.zerfe_id','=','zerfes.zerfe_id')->where('budgets.status','!=','Expired')->where('zerfes.zerfe_name','=','ICT')->get();    
    if($b_query2->count()>0){
        foreach($b_query2 as $row2){
            $id2=$row2->budget_id;
        }
        }
        else{
            $id2=0;
        }
    $b_query3=DB::table('budgets')->join('zerfes','budgets.zerfe_id','=','zerfes.zerfe_id')->where('budgets.status','!=','Expired')->where('zerfes.zerfe_name','=','Top_Management')->get();
    if($b_query3->count()>0){
        foreach($b_query3 as $row3){
            $id3=$row3->budget_id;
        }
        }
        else{
            $id3=0;
        }
    $b_query4 =DB::table('budgets')->join('zerfes','budgets.zerfe_id','=','zerfes.zerfe_id')->where('budgets.status','!=','Expired')->where('zerfes.zerfe_name','=','Science_&_Technology')->get();
    if($b_query1->count()>0){
        foreach($b_query4 as $row4){
            $id4=$row4->budget_id;
        }
        }
        else{
            $id4=0;
        }
    $auth_user = Auth::user()->id;
        $message_unread=message::where('reciever_id','=',$auth_user)->where('message_status','!=','read')->orderBy('created_at','desc')->get();
        return view('@pages_all.limatekid_page.budget_category_select', compact( 'message_unread','id1','id2','id3','id4'));
}
function showBudgetAdjustForm($category,$bd_id){
    if($category==0){
      Alert::error('Warnning!','Budget not exist','error');
      return redirect()->back(); 
    }
    else{
//this query is used to display the detail budget
$budget_detail_query=DB::table('budget_details')->join('budgets','budget_details.budget_id','=','budgets.budget_id')->join('account_categories','budget_details.account_id','=','account_categories.account_id')
->where('budget_details.budget_id',$category)->get();
$budget_detail=DB::table('budget_details')->where('budget_id',$category)->get();
$total=0;
foreach($budget_detail as $detail){
    $total = $total + $detail->amount;
}
//this query is to display the budget
$budget_query=DB::table('budgets')->join('budget_categories','budgets.category_id','=','budget_categories.category_id')->where('budgets.budget_id',$category)->get();
foreach($budget_query as $budget){
    $remain_amount = $budget->remain_amount;
    $category_code = $budget->category_code;
}
$remain = $remain_amount - $total;
//for selected budget
$budget_selected=DB::table('budgets')->join('zerfes','budgets.zerfe_id','=','zerfes.zerfe_id')->join('budget_categories','budgets.category_id','=','budget_categories.category_id')->where('budgets.status','!=','Expired')->where('budgets.budget_id',$category)->get();
//<!--query from budet detail to display on fields-->
$budget_detail_selected=DB::table('budget_details')->join('account_categories','budget_details.account_id','=','account_categories.account_id')
->where('budget_details.budget_detail_id',$bd_id)->get();
///for account 
$account_query  = DB::table('budget_details')->join('account_categories','budget_details.account_id','=','account_categories.account_id')
->where('budget_id',$category)->where('budget_details.budget_detail_id','!=',$bd_id)->get();

$auth_user = Auth::user()->id;
$message_unread=message::where('reciever_id','=',$auth_user)->where('message_status','!=','read')->orderBy('created_at','desc')->get();
return view('@pages_all.limatekid_page.budget_adjust', compact( 'message_unread','budget_detail_query','category_code','category','remain','remain_amount','total','budget_selected','budget_detail_selected','account_query'));

    }
    
}
function adjustBudget(Request $request,$category,$bd_id){
    //$budget_category = $request->category;
    //$title = $request->title;
    $amount = $request->amount;
    $account_id = $request->account_code;
    $budget_detail_query=DB::table('budget_details')->where('budget_detail_id',$bd_id)->get();
    $budget_detail_query2=DB::table('budget_details')->join('budgets','budgets.budget_id','=','budget_details.budget_id')
    ->where('budget_details.budget_id',$category)->where('budget_details.account_id',$account_id )->get();
    foreach($budget_detail_query2 as $budget_detail2){
        $remain_amount2= $budget_detail2->amount;
        $bd_id2=$budget_detail2->budget_detail_id;
    }
    foreach($budget_detail_query as $budget_detail){
        $remain_amount = $budget_detail->amount;
    }
    if( $amount>$remain_amount){
        Alert::error('The amount of money you add  is high', "remain_amount={{ $remain_amount}}", 'error');
        return redirect()->back();
    }else{
        $remain_amount= $remain_amount-$amount;
        $remain_amount2=$remain_amount2+$amount;
        DB::update('update budget_details set amount = ? where budget_detail_id = ?', [ $remain_amount,$bd_id]);
        DB::update('update budget_details set amount = ? where budget_detail_id = ?', [ $remain_amount2,$bd_id2]);
        Alert::success('The budget is adjusted successfully', "Congratulation", 'success');
        return redirect()->back();
    }

   
}
}
