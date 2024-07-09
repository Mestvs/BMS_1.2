<?php

namespace App\Http\Controllers\FinanceManager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use DB;
use Carbon\Carbon;
use App\Models\Message;
use RealRashid\SweetAlert\Facades\Alert;
class PaymentController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }
    //
    function payment(){
        
        $auth_user = Auth::user()->id;
        $message_unread=message::where('reciever_id','=',$auth_user)->where('message_status','!=','read')->orderBy('created_at','desc')->get();
        //payment_request_query
        $payment_request_query=DB::table('payment_requests')->join('payments','payment_requests.request_id','=','payments.request_id')->
        join('payment_approval_details','payment_requests.request_id','=','payment_approval_details.request_id')
        ->join('payment_authorize_details','payment_requests.request_id','=','payment_authorize_details.request_id')
        ->where('payment_requests.pay_status','paid')->get();
        return view('@pages_all.Finance_Manager_page.payment', compact( 'message_unread','payment_request_query'));

    }
    function payment_requests(){
        $auth_user = Auth::user()->id;
        $message_unread=message::where('reciever_id','=',$auth_user)->where('message_status','!=','read')->orderBy('created_at','desc')->get();
       $payment_request=DB::table('payment_requests')->join('directorates','payment_requests.directorate_id','=','directorates.directorate_id')
       ->join('budget_categories','budget_categories.category_id','=','payment_requests.category_id')
        ->where('payment_requests.signature','!=','rejected' )->where('payment_requests.pay_status','!=','paid')->get();
        return view('@pages_all.Finance_Manager_page.payment_request_list', compact( 'message_unread','payment_request'));
  
    }
    function payment_approve($id){
      
        $auth_user = Auth::user()->id;
        $message_unread=message::where('reciever_id','=',$auth_user)->where('message_status','!=','read')->orderBy('created_at','desc')->get();
        $payment_request_selected=DB::table('payment_requests')->join('directorates','payment_requests.directorate_id','=','directorates.directorate_id')
        ->where('payment_requests.request_id',$id )->get();
        return view('@pages_all.Finance_Manager_page.payment_approve', compact( 'message_unread','payment_request_selected'));
  
    }
    function approve(Request $request, $id){
        $signer =$request->signer; 
        $sign = $request->sign;
        $Today = date('y:m:d');
        if ($sign == "[rejected]") {
      DB::update('update payment_requests set approval=?,updated_at=? where request_id= ?', ['rejected',carbon::now(),$id]);
      Alert::success('Request  is Rejected!', "Congratulation", 'success');
      return redirect()->back();  
        }else{
            $query=DB::table('payment_approval_details')->select('*')->where('request_id',$id)->get();
            if($query->count()>0){
                DB::update('update payment_requests set approval=?,updated_at=? where request_id= ?', ['Approved',carbon::now(),$id]);
                DB::update('update payment_approval_details set approver_name=?,signature_sign=?,approved_date=? where request_id= ?', [$signer,$sign,$Today,$id]);
                Alert::success('Request Successfully Signed!', "Congratulation", 'success');
                return redirect()->back();  
  }else{
    DB::update('update payment_requests set approval=?,updated_at=? where request_id= ?', ['Approved',carbon::now(),$id]);
    DB::insert('insert into payment_approval_details (request_id,approver_name,signature_sign,approved_date) values (?,?,?,?)', [$id,$signer,$sign,$Today]);
    Alert::success('Request Successfully Signed!', "Congratulation", 'success');
    return redirect()->back();  
 }//
            
        }
       
    }
   function approve_detail($id){
    $auth_user = Auth::user()->id;
    $message_unread=message::where('reciever_id','=',$auth_user)->where('message_status','!=','read')->orderBy('created_at','desc')->get();
    $payment_approval=DB::table('payment_approval_details')->join('payment_requests','payment_approval_details.request_id','=', 'payment_requests.request_id' )->where('payment_requests.request_id',$id)->get();
    $payment_request_selected=DB::table('payment_requests')->join('directorates','payment_requests.directorate_id','=','directorates.directorate_id')
    ->where('payment_requests.request_id',$id )->get();
    return view('@pages_all.Finance_Manager_page.payment_approve_detail', compact( 'message_unread','payment_request_selected','payment_approval'));


   }
    
}
