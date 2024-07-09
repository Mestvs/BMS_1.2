<?php

namespace App\Http\Controllers;
use App\Models\RegisterActivation;
use DB;
use Illuminate\Http\Request;

class home_page extends Controller
{
    function home(){
        $activations=DB::select('select * from register_activations');
        $Today = date("Y-m-d");
        $fdate =RegisterActivation::select()->value('end_date');
        if( $Today>= $fdate){
        $register_update=DB::update('update register_activations set status = ?', ['Deactivated']);
        $status =RegisterActivation::select()->value('status');
        return view('home_page.index', compact('status'));
      
        }else {
            $status =RegisterActivation::select()->value('status');
            return view('home_page.index', compact('status'));  
        }

        
    }
    function about(){
        return view('home_page.about');
    }
    function developers(){
        
        return view('home_page.developers');
    }
    function contactUs(){
        
        return view('home_page.contactus');
    }
    function showLoginForm(){
        
        return view('home_page.login_form');
    }
    function showRegisterationForm(){
        $user=0;
        $status =RegisterActivation::select()->value('status');
        if($status=='Deactivated'){
            return redirect()->back()->with('status',$status);
        }else{
            return view('home_page.register',compact('user'));
        }
       
    }
    function help(){
        return view('home_page.help');
    }
    function showrotation(){
        return view('home_page.rotation');
    }
}
