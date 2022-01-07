<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\plan;
use Illuminate\Foundation\Auth\User;

class PlanController extends Controller
{   
    /**
     * Create a new controller instance.
     *
     * @return void
    */
    public function index()
    {
        $plans = Plan::all();
        // dd($plans);
        return view('plans.index', compact('plans'));
    }

    /**
     * Show the Plan.
     *
     * 
     */
    public function show(Plan $plan, Request $request)
    {   
        // dd($request->user()->createSetupIntent(),$plan);
        // $paymentMethods = $request->user()->paymentMethods();
        // $user = User::where('id',1)->first();
        $intent = $request->user()->createSetupIntent();
        
        return view('plans.show', compact('plan', 'intent'));
    }
}