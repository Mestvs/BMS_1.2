<?php

namespace App\Http\Controllers\Finance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use DB;
use App\Models\Message;
use RealRashid\SweetAlert\Facades\Alert;
class PaymentController extends Controller
{
    //
    public function __construct()
    {
    	$this->middleware('auth');
    }
    //
    function payment(){
        //query to display paid information
$payment_query =DB::table('payment_requests')->join('payments','payment_requests.request_id','=','payments.request_id')
    ->join('payment_approval_details','payment_requests.request_id','=','payment_approval_details.request_id') 
    ->join('payment_authorize_details','payment_requests.request_id','=','payment_authorize_details.request_id')
    ->where('payment_requests.pay_status','paid') ->get(); 

        $auth_user = Auth::user()->id;
        $message_unread=message::where('reciever_id','=',$auth_user)->where('message_status','!=','read')->orderBy('created_at','desc')->get();
        return view('@pages_all.Finance_page.payment', compact( 'message_unread','payment_query'));

    }
    function payment_requests(){
        $auth_user = Auth::user()->id;
        $message_unread=message::where('reciever_id','=',$auth_user)->where('message_status','!=','read')->orderBy('created_at','desc')->get();
       $payment_request=DB::table('payment_requests')->join('directorates','payment_requests.directorate_id','=','directorates.directorate_id')
        ->where('payment_requests.signature','!=','rejected' )->where('payment_requests.pay_status','!=','paid')->get();
        return view('@pages_all.Finance_page.payment_request_list', compact( 'message_unread','payment_request'));
  
    }
    function approve_detail($id){
        $auth_user = Auth::user()->id;
        $message_unread=message::where('reciever_id','=',$auth_user)->where('message_status','!=','read')->orderBy('created_at','desc')->get();
        $payment_approval=DB::table('payment_approval_details')->join('payment_requests','payment_approval_details.request_id','=', 'payment_requests.request_id' )->where('payment_requests.request_id',$id)->get();
        $payment_request_selected=DB::table('payment_requests')->join('directorates','payment_requests.directorate_id','=','directorates.directorate_id')
        ->where('payment_requests.request_id',$id )->get();
        
        return view('@pages_all.Finance_page.payment_approve_detail', compact( 'message_unread','payment_request_selected','payment_approval'));
        
       }
       function payment_add_list(){
        $auth_user = Auth::user()->id;
        $message_unread=message::where('reciever_id','=',$auth_user)->where('message_status','!=','read')->orderBy('created_at','desc')->get();
       $payment_request=DB::table('payment_requests')->join('directorates','payment_requests.directorate_id','=','directorates.directorate_id')
        ->where('payment_requests.signature','signed' )->where('payment_requests.approval','Approved')->where('payment_requests.pay_status','Not Paid')->get();
        return view('@pages_all.Finance_page.payment_add_request_list', compact( 'message_unread','payment_request'));
  
    }
   function payment_add_form($id){
    $auth_user = Auth::user()->id;
    $message_unread=message::where('reciever_id','=',$auth_user)->where('message_status','!=','read')->orderBy('created_at','desc')->get();
   //query for zerfe id
   $z_query=DB::table('payment_requests')->join('directorates','payment_requests.directorate_id','=','directorates.directorate_id')
   ->join('budget_categories', 'payment_requests.category_id','=','budget_categories.category_id')->select('*')->where('payment_requests.request_id',$id)->get();
    foreach($z_query as $zerfe){
        $zz_id=$zerfe->zerfe_id;
    }
   //query for account code
$account_query  = DB::table('zerfe_accounts')->join('zerfes','zerfe_accounts.zerfe_id','=','zerfes.zerfe_id')->join('account_categories','zerfe_accounts.account_id','=','account_categories.account_id')->where('zerfes.zerfe_id',$zz_id)->get();
//query for approal detail
$pa_query =DB::table('payment_approval_details')->select('*')->where('request_id',$id)->get();

    return view('@pages_all.Finance_page.payment_add_form', compact( 'message_unread','account_query','pa_query','z_query'));
  
   }
   function Add_payment(Request $request,$id){
     //query for category id
   $z_query=DB::table('payment_requests')->join('directorates','payment_requests.directorate_id','=','directorates.directorate_id')
   ->join('budget_categories', 'payment_requests.category_id','=','budget_categories.category_id')->select('*')->where('payment_requests.request_id',$id)->get();
    foreach($z_query as $zerfe){
        $c_id=$zerfe->category_id;
    }
    $amount =$request->amount; 
    $payee =$request->payee; 
    $payer_fname =Auth::user()->first_name; 
    $payer_lname =Auth::user()->last_name;
    $payer_fullname=$payer_fname.' '.$payer_lname;
    $payer_sign = Auth::user()->signature;
    $category_id =$c_id;
    $category =$request->category; 
    $account_name =$request->account_name;
    $account_code =$request->account_code; 
    $ref_no =$request->reference; 
    $payment_mode =$request->mode; 
    $description =$request->description;
    $Today = date('y:m:d');
    $bstatus = 'Approved';
    //the query for account code
 $queryacc =DB::table('budget_details')->join('account_categories','budget_details.account_id','=','account_categories.account_id')->where('account_categories.account_code',$account_code)->get(); 
if($queryacc->count()>0){
    foreach( $queryacc as $rowacc ){
        $acc_id= $rowacc->account_id;
       }
   }else{
    Alert::error('This account code is not categorized!', "Try again", 'error');
    return redirect()->back(); 
   }
 //query for budget
 $queryb = DB::table('budgets')->join('budget_categories','budgets.category_id','=','budget_categories.category_id')->where('budgets.category_id',$category_id)->where('status','!=','Expired')->get();
 foreach($queryb as $budget){
    $remain =$budget->remain_amount-$amount;
    $budget_id=$budget->budget_id;

 }
 //query for budget detail
 $querybb = DB::table('budget_details')->where('budget_id',$budget_id)->where('account_id',$acc_id)->get();
 if($querybb->count()>0){
    foreach ($querybb as $rowbb){
        $current_account_amount=$rowbb->amount; 
        //$remainb = $rowbb->amount - $amount;
     }
     if($current_account_amount< $amount){
        Alert::error('The amount is less on this account code!', "{{$current_account_amount}}", 'error');
        return redirect()->back(); 
     }else{
        $remainb =$current_account_amount-$amount; 
     }
    
 }
 else{
    Alert::error('There is no money on this account code!', "Try again", 'error');
    return redirect()->back(); 
   }
 //query for payment request
 $queryp = DB::table('payment_requests')->select('*')->where('request_id',$id)->get();
 foreach($queryp as $rowp){
    $cstatus=$rowp->approval;
 }
 $payment=DB::table('payments')->select('*')->where('request_id',$id)->get();
 if($payment->count()<=0){


 //check wheter the request is approved or not
 if ($cstatus == 'Approved') {
    DB::insert('insert into payments (request_id,account_id,amount,payment_mode,reference_no,paid_to,debit,paid_date,status) values (?,?,?,?,?,?,?,?,?)', [$id,$acc_id,$amount,$payment_mode,$ref_no,$payee,$amount,$Today,'Pending']);
    DB::insert('insert into payment_authorize_details (request_id,authorizer_name,signature,authorized_date) values (?,?,? ,?)', [$id,$payer_fullname ,$payer_sign,$Today]);
   DB::update('update budget_details set amount= ? where budget_id= ? AND account_id=?', [$remainb,$budget_id,$acc_id]);
   DB::update('update payment_requests set pay_status=? where request_id = ?', ['paid',$id]);
   DB::update('update budgets set remain_amount= ? where budget_id= ?', [$remain,$budget_id]);
   Alert::success('The payment recorded successfuly!', "Congratulation", 'success');
   return redirect()->back(); 

}else{
    Alert::error('The payment is not approved!', "wait for approval {{$cstatus}}", 'error');
    return redirect()->back(); 
  
}
}
else{
    Alert::success('The request has been paid!', "Congratulation", 'success');
    return redirect()->back(); 
    
} 
}
function printVoucherForm($id){
     //query for category id
   $payment_request=DB::table('payment_requests')->join('directorates','payment_requests.directorate_id','=','directorates.directorate_id')
   ->join('budget_categories', 'payment_requests.category_id','=','budget_categories.category_id')->select('*')->where('payment_requests.request_id',$id)->get();
   //payment approval query

   $pa_query=DB::table('payment_approval_details')->select('*')->where('request_id',$id)->get();
     //payment_query
     $payment_query =DB::table('payments')->join('account_categories','payments.account_id','=','account_categories.account_id')->where('payments.request_id',$id)->get();
     $auth_user = Auth::user()->id;
     $message_unread=message::where('reciever_id','=',$auth_user)->where('message_status','!=','read')->orderBy('created_at','desc')->get();
     
     if($payment_query->count()>0){
        return view('@pages_all.Finance_page.print_voucher_form', compact( 'message_unread','payment_request','pa_query','payment_query'));
 
       }
       else{
        Alert::error('Warnning!', "please record the payment", 'error');
       return redirect()->back(); 
    
       }
   
}
function editPaymentForm($request_id){
    $auth_user = Auth::user()->id;
    $message_unread=message::where('reciever_id','=',$auth_user)->where('message_status','!=','read')->orderBy('created_at','desc')->get();
    //payment query
    $payment_query=DB::table('payments')->join('account_categories','payments.account_id','=','account_categories.account_id')->select('*')
    ->where('payments.request_id',$request_id)->get();
    //request
    $payment_request=DB::table('payment_requests')->join('directorates','payment_requests.directorate_id','=','directorates.directorate_id')->join('budget_categories','payment_requests.category_id','=','budget_categories.category_id')->where('payment_requests.request_id',$request_id)->get();
    //$d_query=
    //approval
    $pa_query=DB::table('payment_approval_details')->where('request_id',$request_id)->get();
   //authorize
    $authrizer_query=DB::table('payment_authorize_details')->where('request_id',$request_id)->get();
    return view('@pages_all.Finance_page.edit_payment_form', compact( 'message_unread','pa_query','authrizer_query','payment_request','payment_query'));

}
function editPayment(Request $request,$p_id){
    $amount =$request->amount;
    $credit =$request->credit;
    $debit = $request->debit;
    $posted = $debit - $credit;
    $category = $request->category;
    $account_name = $request->account_name;
    $account_code = $request->account_code;
    $Today = date('y:m:d');
    //request
    $payment_request=DB::table('payments')->join('payment_requests','payments.request_id','=','payment_requests.request_id')->where('payments.payment_id',$p_id)->get();
   // $payment_request=DB::table('payment_requests')->join('directorates','payment_requests.directorate_id','=','directorates.directorate_id')->join('budget_categories','payment_requests.category_id','=','budget_categories.category_id')->where('payments.payment_id',$p_id)->get();
    foreach($payment_request as $request){
$category_id = $request->category_id;
    }
    
    //budget detail
    $queryacc =DB::table('budget_details')->join('account_categories','budget_details.account_id','=','account_categories.account_id')->where('account_categories.account_code', $account_code)->get();
   foreach( $queryacc as $rowacc ){
    $acc_id= $rowacc->account_id;
   }
   $queryb=DB::table('budgets')->join('budget_categories','budgets.category_id','=','budget_categories.category_id')->where('budgets.category_id',$category_id)->where('budgets.status','!=','Expired')->get();
foreach($queryb as $rowb ){
    $remain = $rowb->remain_amount+ $posted;
    $budget_id = $rowb->budget_id;
   
}
//budget detail
$querybb=DB::table('budget_details')->where('budget_id',$budget_id )->where('account_id',$acc_id)->get();
foreach($querybb as $rowbb ){
    $remainb=$rowbb->amount+ $posted;
}
//payment
$queryp=DB::table('payments')->where('payment_id',$p_id)->where('status','!=','balanced')->get();
foreach($queryp as $rowp){
    $cstatus = $rowp->status;
}
if ($cstatus == 'Pending') {
    DB::update('update budget_details set amount= ? where budget_id=? AND account_id=?', [$remainb,$budget_id,$acc_id]);
    DB::update('update payments set debit= ?,credit=?,posted=?,status=? where payment_id=?', [$debit,$credit,$posted,'balanced',$p_id]);
    DB::update('update budgets set remain_amount= ? where budget_id= ?', [$remain,$budget_id]);
    Alert::success('The payment updated successfuly!', "Congratulation", 'success');
    return redirect()->back(); 
}
else{
    Alert::error('The payment is not approved!', "wait for approval {{$cstatus}}", 'error');
    return redirect()->back(); 
}


}
function printPayment($p_id){
    $auth_user = Auth::user()->id;
    $message_unread=message::where('reciever_id','=',$auth_user)->where('message_status','!=','read')->orderBy('created_at','desc')->get();
    //payment query
    $payment_query=DB::table('payments')->join('account_categories','payments.account_id','=','account_categories.account_id')
    ->where('payments.payment_id',$p_id)->get();
    foreach( $payment_query as $payment ){
        $request_id= $payment->request_id;
    }
    $back='no';
    //request
    $payment_request=DB::table('payment_requests')->join('directorates','payment_requests.directorate_id','=','directorates.directorate_id')->join('budget_categories','payment_requests.category_id','=','budget_categories.category_id')->where('payment_requests.request_id',$request_id)->get();
    //$d_query=
    //approval
    $pa_query=DB::table('payment_approval_details')->where('request_id',$request_id)->get();
   //authorize
    $authrizer_query=DB::table('payment_authorize_details')->where('request_id',$request_id)->get();
    return view('@pages_all.Finance_page.edit_payment', compact( 'message_unread','pa_query','authrizer_query','payment_request','payment_query','back'));
 
}
}


 
