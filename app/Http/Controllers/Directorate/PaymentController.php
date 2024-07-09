<?php

namespace App\Http\Controllers\Directorate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use DB;
use APP\Models\User;
use App\Models\News;
use App\Models\Message;
use App\Models\PaymentRequest;
use RealRashid\SweetAlert\Facades\Alert;
class PaymentController extends Controller
{
    //
    public function __construct()
    {
    	$this->middleware('auth');
    }
    function payment(){
        $auth_user = Auth::user()->id;
        $message_unread=message::where('reciever_id','=',$auth_user)->where('message_status','!=','read')->orderBy('created_at','desc')->get();
        ////d
        $auth_directorate_id = Auth::user()->directorate_id;
        $d_query=DB::table('users')->join('directorates','directorates.directorate_id','=','users.directorate_id')->select('directorates.directorate_name')->where('users.directorate_id',$auth_directorate_id)->get();
        ///
       
        $p_request_query=DB::table('payment_requests')->join('budget_categories','payment_requests.category_id','=','budget_categories.category_id')->join('directorates','directorates.directorate_id','=','payment_requests.directorate_id')
        ->select('*')->where('payment_requests.directorate_id',$auth_directorate_id)->where('payment_requests.pay_status','Not Paid')->get();
        return view('@pages_all.directorate_page.payment', compact( 'message_unread','d_query','p_request_query'));
    }
    function request_payment(){
        $auth_user = Auth::user()->id;
        $message_unread=message::where('reciever_id','=',$auth_user)->where('message_status','!=','read')->orderBy('created_at','desc')->get();
        
        ////d
        $auth_directorate_id = Auth::user()->directorate_id;
        $d_query=DB::table('users')->join('directorates','directorates.directorate_id','=','users.directorate_id')->select('directorates.directorate_name')->where('users.directorate_id',$auth_directorate_id)->get();
        ///
        $budget_category=DB::table('budget_categories')->select('*')->get();
        return view('@pages_all.directorate_page.payment_request_form', compact( 'message_unread','d_query','budget_category'));
      
    }
    function submit_request(Request $request){
        $title = $request->title;
        $amount =$request-> amount;
        $category = $request->b_category;
        $description =$request-> description;
        $Today = date('y:m:d');

    
        $z_query=DB::table('zerfes')->join('budget_categories','zerfes.zerfe_id','=','budget_categories.zerfe_id')->select('zerfes.zerfe_id')->where('budget_categories.category_id',$category)->get();
    foreach($z_query as $zerfe){
        $z_id = $zerfe->zerfe_id;
    }
 $directorate_id =Auth::user()->directorate_id; 
 $fname =Auth::user()->first_name; 
 $lname =Auth::user()->last_name; 
 $fullname=$fname.' '.$lname;
 $queryd=DB::table('directorates')->select('directorate_name')->where('directorate_id',$directorate_id)->get();
    foreach($queryd as $query){
        $d_name=$query->directorate_name;
    }

    DB::insert('insert into payment_requests (category_id,title,amount,description,zerfe_id,directorate_id,request_date,requester_name,signature,approval) values (?, ?,?,?,?,?,?,?,?,?)', 
    [$category,$title,$amount,$description,$z_id,$directorate_id, $Today, $fullname,'Pending' ,'Not Approved']);
Alert::success('You  Submitted the request successfully', 'Congratulation', 'Success');
return redirect()->back();  


}
function edit_payment_form($id){
    $auth_user = Auth::user()->id;
    $message_unread=message::where('reciever_id','=',$auth_user)->where('message_status','!=','read')->orderBy('created_at','desc')->get();
    ////d
    $auth_directorate_id = Auth::user()->directorate_id;
    $d_query=DB::table('users')->join('directorates','directorates.directorate_id','=','users.directorate_id')->select('directorates.directorate_name')->where('users.directorate_id',$auth_directorate_id)->get();
    ///
    $payment_query_selected =DB::table('payment_requests')->select('*')->where('request_id',$id)->get();
    ///
    $b_category_query=DB::table('budget_categories')->select('*')->get();
    ////
    $p_request_query=DB::table('payment_requests')->join('budget_categories','payment_requests.category_id','=','budget_categories.category_id')->join('directorates','directorates.directorate_id','=','payment_requests.directorate_id')
    ->select('*')->where('payment_requests.directorate_id',$auth_directorate_id)->where('payment_requests.pay_status','Not Paid')->get();
    return view('@pages_all.directorate_page.edit_payment', compact( 'message_unread','d_query','p_request_query','payment_query_selected','b_category_query'));

}
function edit_payment(Request $request,$id){
    $title =$request->title; 
    $amount =$request->amount; 
    $category =$request->b_category; 
    $description =$request->description;
    $row_p_request=DB::table('payment_requests')->select('*')->where('request_id',$id)->get();
    foreach($row_p_request as $row_p){
        $status = $row_p->signature;
    }
    if ($status != 'Signed') {
        DB::update('update payment_requests set title = ?, amount= ?, category_id = ? , description =? where request_id =?', [$title,$amount,$category,$description,$id]);
        Alert::success('You  updated the payment successfully', 'Congratulation', 'Success');
        return redirect()->back(); 
    }
    else{
        Alert::error('Your payment signed', "you can't update it", 'error');
        return redirect()->back();  
    }
   
}
function truckPayment($request_id){
$payment_request_query=DB::table('payment_requests')->join('zerfes','zerfes.zerfe_id','=','payment_requests.zerfe_id')->where('request_id',$request_id)->get();
foreach($payment_request_query as $payment_request){
$approval=$payment_request->approval;
$signature=$payment_request->signature;
$pay_status=$payment_request->pay_status;
$zerfe_name=$payment_request->zerfe_name;
$updated_at=$payment_request->updated_at;
$back='true';
}
return redirect()->back()->with('zerfe_name',$zerfe_name)->with([
    'approval'=>$approval,'pay_staus'=>$pay_status,'signature'=>$signature,'back'=>$back,
    'updated_at'=>$updated_at
]);
}
function payment_delete(Request $request){
   
    $id = $request->selector;
     if(value($id)==null){
         return redirect()->back()->with('error','please select the check box?','Warnning!');  
     }
     else{
         $N = count($id);
     }
    
     for ($i = 0; $i < $N; $i++) {
         $result=DB::delete('DELETE FROM payment_requests where request_id= ? AND signature!=?  ', [$id[$i],'Signed']);
        }
        return redirect()->back()->with('message','Deleted Successfully');   
    
 }
}




 