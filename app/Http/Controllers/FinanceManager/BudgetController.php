<?php

namespace App\Http\Controllers\FinanceManager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use DB;
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
        $message_unread=message::where('reciever_id','=',$auth_user)->where('message_status','!=','read')->orderBy('created_at','desc')->get();
        $budget_query=DB::table('budgets')->join('zerfes','budgets.zerfe_id','=','zerfes.zerfe_id')->get();
        //budget_request_query
        $budget_request_query=DB::table('budget_requests')->where('status','!=','Approved')->get();
        $budget_total=DB::table('budgets')->where('status','!=','Expired')->get();
        $total=0;
        $back='false';
        foreach($budget_total as $row){
            $total = $total + $row->budget_amount;
        }
        return view('@pages_all.Finance_Manager_page.budget', compact( 'message_unread','budget_query','budget_request_query','total','back'));

    }
    function showBudgetRequest(){
        $auth_user = Auth::user()->id;
        $message_unread=message::where('reciever_id','=',$auth_user)->where('message_status','!=','read')->orderBy('created_at','desc')->get();
        //budget_request_query
        $budget_request_query=DB::table('budget_requests')->get();
        return view('@pages_all.Finance_Manager_page.budget_request_list', compact( 'message_unread','budget_request_query'));

    }
    function showBudgetRequestApproveForm($b_request_id){
        $auth_user = Auth::user()->id;
        $message_unread=message::where('reciever_id','=',$auth_user)->where('message_status','!=','read')->orderBy('created_at','desc')->get();
        //budget_request_query
        $budget_request_query=DB::table('budget_requests')->where('b_request_id',$b_request_id)->get();
        return view('@pages_all.Finance_Manager_page.budget_approve', compact( 'message_unread','budget_request_query'));
   
    }
    
    function approveBudget(Request $request,$b_request_id){
        $signer = $request->signer;
        $sign = $request->sign;
        $Today = date('y:m:d');
        if ($sign == "[rejected]") {
            DB::update('update budget_requests set status=? where b_request_id = ?', ['Rejected',$b_request_id]);
            Alert::success('Request  is Rejected!','Congratuation','success');
             return redirect()->back();
        }
        else{
            $approval_query =DB::table('budget_approval_details') ->where('b_request_id',$b_request_id)->get(); 
            if ($approval_query->count()> 0) {
                DB::update('update budget_approval_details set approver_name=?, signature=?, approved_date=? where b_request_id = ?', [$signer,$sign,$Today,$b_request_id]);
                DB::update('update budget_requests set status=? where b_request_id = ?', ['Approved',$b_request_id]);
               }
               else {
                DB::insert('insert into budget_approval_details (b_request_id,approver_name,signature,approved_date) values (?, ?,?,?)', [$b_request_id,$signer,$sign,$Today]);
                DB::update('update budget_requests set status=? where b_request_id = ?', ['Approved',$b_request_id]);
               
               }
               Alert::success('Request Successfully Approved!','Congratulation!', 'success');
               return redirect()->back();
        }

    }
    function getDetailInfo($id){
        $back='true';
        $budget_request_query=DB::table('budget_requests')->where('b_request_id',$id)->get();
        foreach($budget_request_query as $query){
$request=$query->zerfe_name;
$status=$query->status;
        }
        $budget_approval_query=DB::table('budget_approval_details')->where('b_request_id',$id)->get();
        foreach($budget_approval_query as $approval ){
$approver=$approval->approver_name;
$approved_date=$approval->approved_date;
$signature=$approval->signature;
        }
return redirect()->back()->with('back',$back)->with('request',$request)->with([
    'approver'=>$approver,'approved_date'=>$approved_date,'signature'=>$signature,'status'=>$status
]);
    }
}
