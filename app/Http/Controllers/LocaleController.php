<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//new
//use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class LocaleController extends Controller
{
    //
     /**
     * @param $locale
     * @return \Illuminate\Http\RedirectResponse
     */
   public function change($locale)
    {
        app()->setLocale($locale);

       Session::put('applocale', $locale);

        return redirect()->back();
    }
   
}
