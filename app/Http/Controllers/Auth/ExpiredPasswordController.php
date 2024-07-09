<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
class ExpiredPasswordController extends Controller
{
    public function expired()
    {
      
        return view('auth.password_expired');
    }
    
    public function postExpired(Request $request)
    {
        // Checking current password
        if (!Hash::check($request->currentpassword, $request->user()->password)) {
            return redirect()->back()->withErrors(['currentpassword' => 'Current password is not correct']);
        }
        if($request->new_password!=$request->retype_password){
            return redirect()->back()->withErrors(['retype_password' => 'Password Mismatched']);
        
        }
        $request->user()->update([
            'password' => bcrypt($request->new_password),
            'password_changed_at' => Carbon::now()->toDateTimeString()
        ]);
        return redirect()->back()->with(['status' => 'Password changed successfully']);
    }
}
