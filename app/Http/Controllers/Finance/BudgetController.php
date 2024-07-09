<?php

namespace App\Http\Controllers\Finance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Message;
use App\Models\Budget;
use App\Models\Zerfes;
use App\Models\BudgetCategory;
use App\Models\User;
use Auth;
use DB;
class BudgetController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }
    function budget(){
        $auth_user = Auth::user()->id;
        $total=0;
        $amount_query=DB::table('budgets')->select('budget_amount')->where('status','Approved')->get();
        foreach ($amount_query as $total_amount ){
            
            $total=$total+$total_amount->budget_amount;
        }
        $budget_query=DB::table('budgets')->join('Zerfes','budgets.zerfe_id','=','zerfes.zerfe_id') ->select('*')
        ->orderBy('budget_id','asc') ->get();
       $message_unread=message::where('reciever_id','=',$auth_user)->where('message_status','!=','read')->orderBy('created_at','desc')->get();
        return view('@pages_all.Finance_page.budget', compact( 'message_unread','budget_query','total'));

        
    }
    function budget_category(){
        $auth_user = Auth::user()->id;
        $message_unread=message::where('reciever_id','=',$auth_user)->where('message_status','!=','read')->orderBy('created_at','desc')->get();
        return view('@pages_all.Finance_page.budget_category_select', compact( 'message_unread'));

        
    }
    function showBudgetAddForm($category_code){
      $auth_user = Auth::user()->id;
      $db_results=DB::table('budget_categories')->join('zerfes','budget_categories.zerfe_id','=','zerfes.zerfe_id')->where('budget_categories.category_code',$category_code)->get();
 foreach($db_results as $result){
  $category_id=$result->category_id;
 }
      $year_querys=DB::select('select distinct year from budgets where category_id=? order by year asc',[$category_id]);
      $message_unread=message::where('reciever_id','=',$auth_user)->where('message_status','!=','read')->orderBy('created_at','desc')->get();
        return view('@pages_all.Finance_page.budget_add_form', compact( 'message_unread','db_results','year_querys'));

        
    }
  function addBudget(Request $request, $category_id){
         
 $year = $request->year;
 $budget_category = $request->category;
 $amount = $request->amount;
 $intial_date = $request->i_date;
 $final_date = $request->f_date;
 $description = $request->description;
 $status = 'Approved';
 $Dept_id=Zerfes::select("zerfes.zerfe_id")->join("budget_categories","budget_categories.zerfe_id","=","Zerfes.Zerfe_id")->where('budget_categories.category_id',$category_id)->value('Zerfes.zerfe_id');
 $query =DB::select('select * from budgets where category_id =? AND year=?', [$category_id ,$year]);

if ($query) {
    Alert::error('The budget is already added', 'Try again', 'error');
    return redirect()->back();  
}else{
    $insert=DB::insert('insert into budgets (year,category_id,budget_amount,remain_amount,intial_date,final_date,budget_description,zerfe_id,status) values (?,?,?,?,?,?,?,?,?)', [$year,$category_id,$amount,$amount,$intial_date,$final_date,$description,$Dept_id,$status]);
   $update= DB::update('update budgets set status=? where category_id =? and  year!=?', ['Expired',$category_id,$year]);   
        Alert::Success('The budget added successfuly!', 'Catagorize it! ', 'success');
        return redirect()->back();
    }
}

function budget_detail_add(Request $request, $b_id){
    $amount=$request->amount;
    $acc_id=$request->account_code;
    $status='Approved';
    $budget_detail_tamount=0;
    $budet_detail_tamount2=0;
    $budget_query=DB::table('budgets')->select('remain_amount')->where('budget_id',$b_id)->get();
    foreach($budget_query as $r_amount){
        $get_amount=$r_amount->remain_amount;
    }
    
    $budget_detail_query=DB::table('budget_details')->where('budget_id',$b_id)->get();
    foreach($budget_detail_query as $bd_query){
        $budget_detail_tamount = $budget_detail_tamount + $bd_query->amount;   
    }
    $remain_amount = $get_amount - $budget_detail_tamount;
    $bd_check=DB::table('budget_details')->select('*')->where('budget_id',$b_id)->where('account_id',$acc_id)->get();
    if($bd_check->count()>0){
        Alert::error('The request is rejected', 'the account code is added!', 'error'); 
        return redirect()->back();
    }else if($amount>$get_amount){
        Alert::error('The amount of money you add  is high', "remain_amount= $remain_amount", 'error'); 
        return redirect()->back();
    }else{

DB::insert('insert into budget_details (budget_id,account_id,amount,status) values (?, ?,?,?)', [$b_id,$acc_id,$amount,$status]);
$budget_detail_query2=DB::table('budget_details')->select('*')->where('budget_id',$b_id)->get();
foreach($budget_detail_query2 as $bdq2){
    $budet_detail_tamount2 =$budet_detail_tamount2+$bdq2->amount; 
    $remain_amount2 = $get_amount - $budet_detail_tamount2;
}
Alert::success('The budget is added successfully', "remain_amount= $remain_amount2", 'success');  
return redirect()->back();
}
}
function budget_categorize_list(){
    $auth_user = Auth::user()->id;
    $message_unread=message::where('reciever_id','=',$auth_user)->where('message_status','!=','read')->orderBy('created_at','desc')->get();
    $budgets=DB::table('budgets')->join("Zerfes","zerfes.zerfe_id","=","budgets.Zerfe_id")->join("budget_categories","budget_categories.category_id","=","budgets.category_id")->where('status','Approved')->get();

    return view('@pages_all.Finance_page.budget_categorize', compact( 'message_unread','budgets'));

}
function budget_categorize_form($budget_id){
   
    $auth_user = Auth::user()->id;
    //needs exception
    $b_querys=DB::table('budgets')->where('budget_id',$budget_id)->get();
    foreach($b_querys as $b_query ){
            $b_c_id=$b_query->category_id;
            $r_amount=$b_query->remain_amount;
                }
$query=DB::table('budget_categories')->join('zerfes',"budget_categories.zerfe_id","=","Zerfes.Zerfe_id")->where('budget_categories.category_id',$b_c_id)->get();
  foreach($query as $z_query){
   $z_id=$z_query->zerfe_id;
    $z_name=$z_query->zerfe_name;
  
  }
  $c_query=BudgetCategory::select("budget_categories.category_code")->join("Zerfes","budget_categories.zerfe_id","=","Zerfes.Zerfe_id")->where('budget_categories.category_id',$b_c_id)->get();
  foreach($c_query as $category){
    $b_category=$category->category_code;
  }

  $budget_detail_query=DB::table('budget_details')->join('account_categories','budget_details.account_id','=','account_categories.account_id')->where('budget_details.budget_id','=',$budget_id)->get();
  //quey to retrive budget detail
  $b_details=DB::table('budget_details')->select('amount')->where('budget_id',$budget_id)->get();
 $total=0;
  foreach($b_details as $b_detail){
    $total=$total + $b_detail->amount;
  }
  
//query to retrive values from zerfes and account category
$db_results=DB::select('select * from zerfe_accounts INNER JOIN Zerfes ON zerfe_accounts.zerfe_id=zerfes.zerfe_id INNER JOIN account_categories on zerfe_accounts.account_id=account_categories.account_id
where zerfes.zerfe_id= ?', [$z_id]);
//query to retrive unread message 
  $message_unread=message::where('reciever_id','=',$auth_user)->where('message_status','!=','read')->orderBy('created_at','desc')->get();
    return view('@pages_all.Finance_page.budget_add_detail_list', compact( 'message_unread','db_results','z_name','b_category','total','r_amount','budget_detail_query','budget_id'));

}
function budget_categorize_update_form($budget_id){
    $auth_user = Auth::user()->id;
    //needs exception
    $b_querys=DB::table('budgets')->where('budget_id',$budget_id)->get();
    foreach($b_querys as $b_query ){
            $b_c_id=$b_query->category_id;
            $r_amount=$b_query->remain_amount;
                }
$query=DB::table('budget_categories')->join('zerfes',"budget_categories.zerfe_id","=","Zerfes.Zerfe_id")->where('budget_categories.category_id',$b_c_id)->get();
  foreach($query as $z_query){
   $z_id=$z_query->zerfe_id;
    $z_name=$z_query->zerfe_name;
  
  }
  $c_query=BudgetCategory::select("budget_categories.category_code")->join("Zerfes","budget_categories.zerfe_id","=","Zerfes.Zerfe_id")->where('budget_categories.category_id',$b_c_id)->get();
  foreach($c_query as $category){
    $b_category=$category->category_code;
  }

  $budget_detail_query=DB::table('budget_details')->join('account_categories','budget_details.account_id','=','account_categories.account_id')->where('budget_details.budget_id','=',$budget_id)->get();
  //quey to retrive budget detail
  $b_details=DB::table('budget_details')->select('amount')->where('budget_id',$budget_id)->get();
 $total=0;
  foreach($b_details as $b_detail){
    $total=$total + $b_detail->amount;
  }
  
//query to retrive values from zerfes and account category
$db_results=DB::select('select * from zerfe_accounts INNER JOIN Zerfes ON zerfe_accounts.zerfe_id=zerfes.zerfe_id INNER JOIN account_categories on zerfe_accounts.account_id=account_categories.account_id
where zerfes.zerfe_id= ?', [$z_id]);
   //query to retrive unread message 
  $message_unread=message::where('reciever_id','=',$auth_user)->where('message_status','!=','read')->orderBy('created_at','desc')->get();
  return view('@pages_all.Finance_page.budget_category_update', compact( 'message_unread','db_results','z_name','b_category','total','r_amount','budget_detail_query','budget_id'));

}
function budget_categorize_update_show($budget_detail_id){
    $auth_user = Auth::user()->id;
    $budget_detail_selected=DB::table('budget_details')->join('account_categories','budget_details.account_id','=','account_categories.account_id')->where('budget_details.budget_detail_id','=',$budget_detail_id)->get();
  foreach($budget_detail_selected as $budget_detail_b){
$budget_id=$budget_detail_b->budget_id;
  }
    //needs exception
    $b_querys=DB::table('budgets')->where('budget_id',$budget_id)->get();
    foreach($b_querys as $b_query ){
            $b_c_id=$b_query->category_id;
            $r_amount=$b_query->remain_amount;
                }
$query=DB::table('budget_categories')->join('zerfes',"budget_categories.zerfe_id","=","Zerfes.Zerfe_id")->where('budget_categories.category_id',$b_c_id)->get();
  foreach($query as $z_query){
   $z_id=$z_query->zerfe_id;
    $z_name=$z_query->zerfe_name;
  
  }
  $c_query=BudgetCategory::select("budget_categories.category_code")->join("Zerfes","budget_categories.zerfe_id","=","Zerfes.Zerfe_id")->where('budget_categories.category_id',$b_c_id)->get();
  foreach($c_query as $category){
    $b_category=$category->category_code;
  }

  $budget_detail_query=DB::table('budget_details')->join('account_categories','budget_details.account_id','=','account_categories.account_id')->where('budget_details.budget_id','=',$budget_id)->get();
  //quey to retrive budget detail
  $b_details=DB::table('budget_details')->select('amount')->where('budget_id',$budget_id)->get();
 $total=0;
  foreach($b_details as $b_detail){
    $total=$total + $b_detail->amount;
  }
  $remain=$r_amount-$total;
  
//query to retrive values from zerfes and account category
$db_results=DB::select('select * from zerfe_accounts INNER JOIN Zerfes ON zerfe_accounts.zerfe_id=zerfes.zerfe_id INNER JOIN account_categories on zerfe_accounts.account_id=account_categories.account_id
where zerfes.zerfe_id= ?', [$z_id]);
   //query to retrive unread message 
  $message_unread=message::where('reciever_id','=',$auth_user)->where('message_status','!=','read')->orderBy('created_at','desc')->get();
  return view('@pages_all.Finance_page.budget_category_update', compact( 'message_unread','db_results','z_name','b_category','total','remain','r_amount','budget_detail_query','budget_detail_selected','budget_id'));
  
}
function budget_categorize_update(Request $request,$budget_detail_id){
    $amount = $request->amount;
    $budget_detail_query=DB::table('budget_details')->where('budget_detail_id',$budget_detail_id)->get();
    foreach($budget_detail_query as $budget_detail){
        $remain_amount = $budget_detail->amount;
        $budget_id= $budget_detail->budget_id;
    }
    //need exception
    $b_querys=DB::table('budgets')->where('budget_id',$budget_id)->get();
    foreach($b_querys as $b_query ){
            $b_c_id=$b_query->category_id;
            $r_amount=$b_query->remain_amount;
                }

 $b_details=DB::table('budget_details')->select('amount')->where('budget_id',$budget_id)->get();
 $total=0;
  foreach($b_details as $b_detail){
    $total=$total + $b_detail->amount;
  }
  $total_value=$total+$amount;
  if($total_value> $r_amount){
    Alert::error('The budget available is less', "Remaining is{{$r_amount}}", 'success');
        return redirect()->back();
  }else{
    $remain_amount= $remain_amount+$amount;
    DB::update('update budget_details set amount = ? where budget_detail_id = ?', [ $remain_amount,$budget_detail_id]);
    Alert::success('The budget is adjusted successfully', "Remaining", 'success');
    return redirect()->back();
  }
       
}

function update_budget($id){
    $b_query=DB::table('budgets')->join('zerfes','budgets.zerfe_id','=','zerfes.zerfe_id')->join('budget_categories','budgets.category_id','=','budget_categories.category_id')->where('budgets.budget_id',$id)->get();
    $auth_user = Auth::user()->id;
    $message_unread=message::where('reciever_id','=',$auth_user)->where('message_status','!=','read')->orderBy('created_at','desc')->get();
    return view('@pages_all.Finance_page.budget_update', compact( 'message_unread','b_query'));

}
function update(Request $request,$id){
    $year =$request->year;
    $budget_category =$request->category;
    $amount =$request->amount;
    $r_amount =$request->r_amount;
    $intial_date =$request->i_date;
    $final_date =$request->f_date;
    $description =$request->description;
    DB::update('update budgets set year=?, budget_amount=?, remain_amount=?, intial_date=?,final_date=?,budget_description=? where budget_id = ?', [$year,$amount,$r_amount,$intial_date,$final_date,$description,$id]);
    Alert::success('The budget is updated successfully', "Congratulation", 'success');  
    return redirect()->back();
  
}

}
