<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentControler extends Controller
{
    //

    public function payment(){
        return view('payment');
    }
}
