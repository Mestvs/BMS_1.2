<?php
namespace App\Http\Controllers\Limatekid;
use App\Http\Controllers\Controller;
use Auth;
use DB;
use App\Models\User;
use App\Models\Message;
use App\Models\MessageSent;
use App\Models\Plan;
use App\Models\News;
use Illuminate\Http\Request;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;
class LimatekidController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }
    //
     function home(){
        $today=date('Y-m-d');
        $auth_user = Auth::user()->id;
        $message_unread=message::where('reciever_id','=',$auth_user)->where('message_status','!=','read')->orderBy('created_at','desc')->get();
        $total_user = User::get()->count();
        $news=news::where('date','=',$today)->get();
        return view('@pages_all.limatekid_page.home', compact( 'message_unread','total_user','news'));

        
    }
    function show_budget_code(){
        $auth_user = Auth::user()->id;
        $message_unread=message::where('reciever_id','=',$auth_user)->where('message_status','!=','read')->orderBy('created_at','desc')->get();
        $b_code_query=DB::table('budget_categories')->join('zerfes','budget_categories.zerfe_id', '=','zerfes.zerfe_id' )->select('*')->orderBy('budget_categories.category_id')->get();
        return view('@pages_all.limatekid_page.budget_codes', compact( 'message_unread','b_code_query'));
  
    }
    function add_budget_category_form(){
        $auth_user = Auth::user()->id;
        $message_unread=message::where('reciever_id','=',$auth_user)->where('message_status','!=','read')->orderBy('created_at','desc')->get();
       $zerfe_query=DB::table('Zerfes')->where('zerfe_name','!=','Unknown')->get();
        return view('@pages_all.limatekid_page.add_budget_category', compact( 'message_unread','zerfe_query'));
  
    }

function add_budget_category(Request $request){
        $category =$request->category;
        $zerfe_id = $request->type; 
        $queryz=DB::table('budget_categories')->select('*')->where('category_code',$category)->get();
if($queryz->count()>0){
    Alert::error('Category code alreday exist','please try again','error');
 return redirect()->back();

}else{
    DB::insert('insert into budget_categories (category_code,zerfe_id) values (?, ?)', [$category, $zerfe_id]);
    Alert::success('Budget Category Successfully added!','Congratulation!','success');
    return redirect()->back();
}
    }
    function show_account_code(){
        $auth_user = Auth::user()->id;
        $message_unread=message::where('reciever_id','=',$auth_user)->where('message_status','!=','read')->orderBy('created_at','desc')->get();
        $acc_code_query=DB::table('account_categories')->orderBy('account_id')->get();
        return view('@pages_all.limatekid_page.account_codes', compact( 'message_unread','acc_code_query'));
  
    }
    function add_account_code_form(){
        $auth_user = Auth::user()->id;
        $message_unread=message::where('reciever_id','=',$auth_user)->where('message_status','!=','read')->orderBy('created_at','desc')->get();
        return view('@pages_all.limatekid_page.add_account_code', compact( 'message_unread'));
  
    }
    function budget_code_delete(Request $request){
    
        $id = $request->selector;
        if(value($id)==null){
            return redirect()->back()->with('error','please select the check box?');  
        }
        else{
            $N = count($id);
            for ($i = 0; $i < $N; $i++) {
                $result=DB::delete('DELETE FROM budget_categories where category_id= ?', [$id[$i]]);
               }
               return redirect()->back()->with('message','Deleted Successfully');
        }
       
       
    }

    
function add_account_code(Request $request){
    $acc_name =$request->acc_name;
    $acc_code = $request->acc_code; 
    $query_acc_category=DB::table('account_categories')->select('*')->where('account_code',$acc_code)->orwhere('account_name',$acc_name)->get();
if($query_acc_category->count()>0){
Alert::error('Account code alreday exist','please try again','error');
return redirect()->back();

}else{
DB::insert('insert into account_categories (account_name,account_code) values (?, ?)', [$acc_name, $acc_code]);
Alert::success('Account code Successfully added!','Congratulation!','success');
return redirect()->back();
}
}
function acc_code_delete(Request $request){
    
    $id = $request->selector;
    if(value($id)==null){
        return redirect()->back()->with('error','please select the check box?','Warnning!');  
    }
    else{
        $N = count($id);
    }
   
    for ($i = 0; $i < $N; $i++) {
        $result=DB::delete('DELETE FROM account_categories where account_id= ?', [$id[$i]]);
       }
       return redirect()->back()->with('message','Deleted Successfully');
}

function show_account_code_list(){
    $auth_user = Auth::user()->id;
    $message_unread=message::where('reciever_id','=',$auth_user)->where('message_status','!=','read')->orderBy('created_at','desc')->get();
    $acc_cat_query=DB::table('account_categories')->get();
    $zerfe_query=DB::table('zerfes')->where('zerfe_name','!=','Unknown')->get();
    $zerfe_acc_query=DB::table('zerfe_accounts')->join('account_categories','zerfe_accounts.account_id','=','account_categories.account_id')->join('zerfes','zerfe_accounts.zerfe_id','=','zerfes.zerfe_id')->select('*')->orderBy('zerfe_accounts.zerfe_account_id')->get();
    return view('@pages_all.limatekid_page.account_code_list', compact( 'message_unread','zerfe_acc_query','acc_cat_query','zerfe_query'));

}
function account_code_adjust(Request $request){
    $acc_id =$request->acc_category;
    $zerfe_id = $request->type; 
    $query_zerfe_acc=DB::table('zerfe_accounts')->where('account_id',$acc_id)->where('zerfe_id',$zerfe_id)->get();
if($query_zerfe_acc->count()>0){
Alert::error('Account code alreday exist','please try again','error');
return redirect()->back();

}else{
DB::insert('insert into zerfe_accounts (account_id,zerfe_id) values (?, ?)', [$acc_id, $zerfe_id]);
Alert::success('Account Code Successfully adjusted!','Congratulation!','success');
return redirect()->back();
}
}
function update_zerfe_account_form($id){
    $auth_user = Auth::user()->id;
    $message_unread=message::where('reciever_id','=',$auth_user)->where('message_status','!=','read')->orderBy('created_at','desc')->get();
    $acc_cat_query=DB::table('account_categories')->select('*')->get();
    $zerfe_query=DB::table('zerfes')->where('zerfe_name','!=','Unknown')->get();
    $zerfe_acc_query=DB::table('zerfe_accounts')->join('account_categories','zerfe_accounts.account_id','=','account_categories.account_id')->join('zerfes','zerfe_accounts.zerfe_id','=','zerfes.zerfe_id')->select('*')->where('zerfe_accounts.zerfe_account_id',$id)->orderBy('zerfe_accounts.zerfe_account_id')->get();
    return view('@pages_all.limatekid_page.update_zerfe_account', compact( 'message_unread','zerfe_acc_query','acc_cat_query','zerfe_query'));
  
}
function update_zerfe_account(Request $request,$id){
    $acc_id =$request->acc_category;
    $zerfe_id = $request->type; 
    $query_zerfe_acc=DB::table('zerfe_accounts')->where('account_id',$acc_id)->where('zerfe_id',$zerfe_id)->get();
if($query_zerfe_acc->count()>0){
Alert::error('Account code alreday exist','please try again','error');
return redirect()->back();

}else{
DB::insert('update account_categories set zerfe_id =? , account_id =? where zerfe_account_id=? ', [ $acc_category,$zerfe_id,$id]);
Alert::success('Account Successfully Updated!','Congratulation!','success');
return redirect()->back();
}
}
//message
public function message(){
    $auth_user = Auth::user()->id;
    $user=user::where ('id', '!=',$auth_user)->get();
   $message_unread=message::where('reciever_id','=',$auth_user)->where('message_status','!=','read')->orderBy('created_at','desc')->get();
    $messages=message::where('reciever_id','=',$auth_user)->orderBy('created_at','desc')->get();
     ////d
     $auth_directorate_id = Auth::user()->directorate_id;
     $d_query=DB::table('users')->join('directorates','directorates.directorate_id','=','users.directorate_id')->select('directorates.directorate_name')->where('users.directorate_id',$auth_directorate_id)->get();
     
    return view('@pages_all.limatekid_page.user_message',compact('user','messages','message_unread','d_query'));  

}
public function sent_message(){
    $auth_user = Auth::user()->id;
    $user=user::where ('id', '!=',$auth_user)->get();
    $message_unread=message::where('reciever_id','=',$auth_user)->where('message_status','!=','read')->orderBy('created_at','desc')->get();
    $recievers=messagesent::where('sender_id','=',$auth_user)->orderBy('created_at','desc')->get();
     ////d
     $auth_directorate_id = Auth::user()->directorate_id;
     $d_query=DB::table('users')->join('directorates','directorates.directorate_id','=','users.directorate_id')->select('directorates.directorate_name')->where('users.directorate_id',$auth_directorate_id)->get();
     
    return view('@pages_all.limatekid_page.sent_message',compact('recievers','user','message_unread','d_query'));


}
public function  view_news(){
    $auth_user = Auth::user()->id;
    $user=user::where ('id', '!=',$auth_user)->get();
    $message_unread=message::where('reciever_id','=',$auth_user)->where('message_status','!=','read')->orderBy('created_at','desc')->get();
    $recievers=messagesent::where('sender_id','=',$auth_user)->orderBy('created_at','desc')->get();
   $news=DB::select('select * from news');
    return view('@pages_all.limatekid_page.view_news',compact('recievers','user','message_unread','news'));


}
}
///

///