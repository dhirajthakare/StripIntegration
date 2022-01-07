<?php

namespace App\Http\Controllers\subscription;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    //
    public function index(){
        return view('subscript.subscription');
    }
}
