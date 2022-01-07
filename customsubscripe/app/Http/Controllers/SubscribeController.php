<?php

namespace App\Http\Controllers;

use App\Models\User;
use Stripe\StripeClient;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class SubscribeController extends Controller
{

    protected $stripe;

    public function __construct() 
    {
        $this->stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
    }

        public function get(){
            return view('shows');
        }
    //
    
    public function show(Request $request)
    {   
        // dd($request,$request->user());
        // dd($request->user()->createSetupIntent());
        // $paymentMethods = $request->user()->paymentMethods();

        $user = User::where('id',1)->first();
        // dd($user,$request->User());
        $intent = $user->createSetupIntent();
        
        return view('shows',compact('intent'));
    }
    public function create(Request $request ){

        // dd($request->Input());
        $user = $request->user();
        $paymentMethod = $request->paymentMethod;
        // dd($user);
        $user->createOrGetStripeCustomer();
        $user->updateDefaultPaymentMethod($paymentMethod);
        $user->newSubscription('default', 'plan_JgM4nvG0P2j93t')
            ->create($paymentMethod, [
                // 'email' => $user->email,
            ]);

            return redirect('home')->with('success',"Subscription Successfull ");
    }

    public function createPlan(){
        return view('createplan');
    }

    public function storePlan(Request $request)
    {   
        $data = $request->except('_token');
        // dd($request->input());
        // dd($data);

        // $data['slug'] = strtolower($data['name']);
        // dd($data);
        $price = $data['cost'] *100; 

        //create stripe product
        $stripeProduct = $this->stripe->product->create([
            'name' => $data['name'],
        ]);

        //Stripe Plan Creation
        $stripePlanCreation = $this->stripe->plans->create([
            'amount' => $price,
            'currency' => 'inr',
            'interval' => 'month', //  it can be day,week,month or year
            'product' => $stripeProduct->id,
        ]);
        // dd($stripePlanCreation);
        $data['stripe_plan'] = $stripePlanCreation->id;
        // dd($data);

        echo 'plan has been created';
    }

}
