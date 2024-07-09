<?php

namespace App\Http\Controllers\Zerfe;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use DB;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Message;
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
        $auth_zerfe_id=Auth::user()->zerfe_id;
        $zerfe=DB::table('zerfes')->select('zerfe_name')->where('zerfe_id',$auth_zerfe_id)->get();
        
        $message_unread=message::where('reciever_id','=',$auth_user)->where('message_status','!=','read')->orderBy('created_at','desc')->get();
        $total_user = User::get()->count();
        ///payment
          $p_request_query=DB::table('payment_requests')->join('budget_categories','payment_requests.category_id','=','budget_categories.category_id')->join('directorates','directorates.directorate_id','=','payment_requests.directorate_id')
        ->select('*')->where('payment_requests.zerfe_id',$auth_zerfe_id)->where('payment_requests.pay_status','Not Paid')->get();
       
        return view('@pages_all.zerfe_page.payment', compact( 'message_unread','total_user','zerfe','p_request_query'));

        
    }
   function sign_payment_form($id) {
    $auth_user = Auth::user()->id;
    $auth_zerfe_id=Auth::user()->zerfe_id;
    $zerfe=DB::table('zerfes')->select('zerfe_name')->where('zerfe_id',$auth_zerfe_id)->get();
    
    $message_unread=message::where('reciever_id','=',$auth_user)->where('message_status','!=','read')->orderBy('created_at','desc')->get();
    $total_user = User::get()->count();
    ///payment
    $p_request_selected=DB::table('payment_requests')->join('budget_categories','payment_requests.category_id','=','budget_categories.category_id')->join('directorates','directorates.directorate_id','=','payment_requests.directorate_id')
    ->select('*')->where('payment_requests.request_id',$id)->get();
   
      $p_request_query=DB::table('payment_requests')->join('budget_categories','payment_requests.category_id','=','budget_categories.category_id')->join('directorates','directorates.directorate_id','=','payment_requests.directorate_id')
    ->select('*')->where('payment_requests.zerfe_id',$auth_zerfe_id)->where('payment_requests.pay_status','Not Paid')->get();
   
    return view('@pages_all.zerfe_page.payment_sign', compact( 'message_unread','total_user','zerfe','p_request_query','p_request_selected'));


   }
   function sign_payment(Request $request,$id){
    $sign = $request->sign;
    if ($sign == "[rejected]") {
        DB::update('update payment_requests set signature =?,updated_at=? where request_id=?', ['rejected',carbon::now(),$id]);
        Alert::success('Request  is Rejected!', 'Congratulation', 'Success');
       return redirect()->back();  

    }else{
        DB::update('update payment_requests set signature =?,updated_at=? where request_id=?', ['Signed',carbon::now(),$id]);
        Alert::success('Request Successfully Signed!', 'Congratulation', 'Success');
        return redirect()->back();  
        
    }
   }
}
/*

<script src="sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="sweetalert.css">
</script> <?php

if (isset($_POST['update'])) {

 $sign = $_POST['sign'];

 if ($sign == "[rejected]") {
  mysqli_query($link, "update payment_request set signature ='rejected' where request_id = '$get_id' ") or die(mysqli_error());
?>
<script>
 swal("Request  is Rejected!", "Congratulation!", "success")
</script> <?php
 }
 else {
  mysqli_query($link, "update payment_request set signature='Signed' where request_id = '$get_id' ") or die(mysqli_error());
?>
<script>
 swal("Request Successfully Signed!", "Congratulation!", "success")
</script> <?php
 }


}
?>
 */