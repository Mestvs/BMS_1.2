<?php

namespace App\Http\Controllers\Finance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use DB;
use App\Models\Message;
class ReportController extends Controller
{
    //
    public function __construct()
    {
    	$this->middleware('auth');
    }
    //
    function viewReport(){ 
        $auth_user = Auth::user()->id;
        $message_unread=message::where('reciever_id','=',$auth_user)->where('message_status','!=','read')->orderBy('created_at','desc')->get();
        //report
$payment_year_query=DB::select('select distinct YEAR(paid_date) as year from payments order by year asc');
$report='no';  
$payment_query=DB::table('payment_requests')->join('zerfes','payment_requests.zerfe_id','=','zerfes.zerfe_id')->join('directorates','payment_requests.directorate_id','=','directorates.directorate_id')->join('payments','payments.request_id','=','payment_requests.request_id')->get();
//months
$jan=0;$feb=0;$mar=0;$apri=0;$may=0;$jun=0;$jul=0;$aug=0;$sep=0;$oct=0;$nov=0;$dec=0;     
return view('@pages_all.Finance_page.generate_report', compact( 'message_unread','payment_year_query','payment_query','report','jan','feb','mar','apri','may','jun','jul','aug','sep','oct','nov','dec'));

    }
    function generateReport(Request $request){
        $year=$request->years;
        $auth_user = Auth::user()->id;
        $message_unread=message::where('reciever_id','=',$auth_user)->where('message_status','!=','read')->orderBy('created_at','desc')->get();
        //report
$payment_year_query=DB::select('select distinct YEAR(paid_date) as year from payments order by year asc');
      

        /// month query
        $jan=0;$feb=0;$mar=0;$apri=0;$may=0;$jun=0;$jul=0;$aug=0;$sep=0;$oct=0;$nov=0;$dec=0;
        $Jan_query=DB::select('select * from payments where MONTH(paid_date)=? AND YEAR(paid_date)=?', ['01',$year]); 
        foreach($Jan_query as $rowJan ){
            $jan =$jan+$rowJan->amount;
        }
        $Feb_query=DB::select('select * from payments where MONTH(paid_date)=? AND YEAR(paid_date)=?', ['02',$year]); 
        foreach($Feb_query as $rowFeb  ){
            $feb =$feb+$rowFeb ->amount;
        }
        $Mar_query=DB::select('select * from payments where MONTH(paid_date)=? AND YEAR(paid_date)=?', ['03',$year]); 
        foreach($Mar_query as $rowMar ){
            $mar =$mar+$rowMar ->amount;
        }
        
        $Apri_query=DB::select('select * from payments where MONTH(paid_date)=? AND YEAR(paid_date)=?', ['04',$year]); 
        foreach($Apri_query as $rowApri ){
            $apri =$apri+$rowApri ->amount;
        }
        $May_query =DB::select('select * from payments where MONTH(paid_date)=? AND YEAR(paid_date)=?', ['05',$year]); 
        foreach($May_query  as $rowMay  ){
            $may =$may+$rowMay ->amount;
        }
        $Jun_query =DB::select('select * from payments where MONTH(paid_date)=? AND YEAR(paid_date)=?', ['06',$year]); 
        foreach($Jun_query  as $rowJun  ){
            $jun =$jun+$rowJun ->amount;
        }
        $Jul_query =DB::select('select * from payments where MONTH(paid_date)=? AND YEAR(paid_date)=?', ['07',$year]); 
        foreach($Jul_query  as $rowJul  ){
            $jul =$jul+$rowJul ->amount;
        }
        $Aug_query =DB::select('select * from payments where MONTH(paid_date)=? AND YEAR(paid_date)=?', ['08',$year]); 
        foreach($Aug_query  as $rowAug  ){
            $aug =$aug+$rowAug ->amount;
        }
        $Seb_query  =DB::select('select * from payments where MONTH(paid_date)=? AND YEAR(paid_date)=?', ['09',$year]); 
        foreach($Seb_query   as $rowSeb  ){
            $sep =$sep+$rowSeb ->amount;
        }
        $Oct_query =DB::select('select * from payments where MONTH(paid_date)=? AND YEAR(paid_date)=?', ['10',$year]); 
        foreach($Oct_query  as $rowOct  ){
            $oct =$oct+$rowOct ->amount;
        }
        
        $Nov_query =DB::select('select * from payments where MONTH(paid_date)=? AND YEAR(paid_date)=?', ['11',$year]); 
        foreach($Nov_query  as $rowNov  ){
            $nov =$nov+$rowNov ->amount;
        }
        $Dec_query =DB::select('select * from payments where MONTH(paid_date)=? AND YEAR(paid_date)=?', ['11',$year]); 
        foreach($Dec_query  as $rowDec  ){
            $dec =$dec+$rowDec ->amount;
        }
        //payment_query
        $payment_query=DB::select('select * from payment_requests INNER JOIN zerfes ON payment_requests.zerfe_id=zerfes.zerfe_id INNER JOIN directorates ON payment_requests.directorate_id=directorates.directorate_id
        INNER JOIN payments ON payments.request_id=payment_requests.request_id where YEAR(payments.paid_date)=?', [$year]);
        //DB::table('payment_requests')->join('zerfes','payment_requests.zerfe_id','=','zerfes.zerfe_id')->join('directorates','payment_requests.directorate_id','=','directorates.directorate_id')->join('payments','payments.request_id','=','payment_requests.request_id')->where('YEAR(payments.paid_date)',$year)->get();
        $report='yes';
        return view('@pages_all.Finance_page.generate_report', compact( 'message_unread','payment_year_query','payment_query','report','jan','feb','mar','apri','may','jun','jul','aug','sep','oct','nov','dec'));

    }
}