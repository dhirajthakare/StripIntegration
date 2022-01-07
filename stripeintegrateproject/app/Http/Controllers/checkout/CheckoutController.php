<?php

namespace App\Http\Controllers\checkout;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\VarDumper\Cloner\Data;

class CheckoutController extends Controller
{

    // Example 1
    public function checkout1()
    {   
        // Enter Your Stripe Secret
        \Stripe\Stripe::setApiKey('sk_test_51J00IdSI2FKZNGlQFJ0yeEbxl5P2MLhXRIlGvIlXh6AH2mikdf1lSHrmGpxX0HnTqxJMyyTnW6FCQvb25knSUZCe00HFUVOLfV');
        // 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
		$amount = 2;
		$amount *= 100;
        $amount = (int) $amount;
        
        $payment_intent = \Stripe\PaymentIntent::create([
			'description' => 'Stripe Test Payment',
            // 'customer'=>'dhiraj',
            'receipt_email'=>"dhiraj9900@gmail.com",
			'amount' => $amount,
			'currency' => 'INR',
			'description' => 'Test stripe in project ',
			'payment_method_types' => ['card'],
		]);
		$intent = $payment_intent;
            // dd($intent);
		return view('checkout.credit-card',compact('intent'));

    }


    // Example 2
    public function checkout()
    {   
        // Enter Your Stripe Secret
        \Stripe\Stripe::setApiKey('sk_test_51J00IdSI2FKZNGlQFJ0yeEbxl5P2MLhXRIlGvIlXh6AH2mikdf1lSHrmGpxX0HnTqxJMyyTnW6FCQvb25knSUZCe00HFUVOLfV');
        // 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
		$amount = 2;
		$amount *= 100;
        $amount = (int) $amount;
        
        $payment_intent = \Stripe\PaymentIntent::create([
			'description' => 'Stripe Test Payment',
            // 'customer'=>'dhiraj',
            'receipt_email'=>"dhiraj9900@gmail.com",
			'amount' => $amount,
			'currency' => 'INR',
			'description' => 'Test stripe in project ',
			'payment_method_types' => ['card'],
		]);
		$intent = $payment_intent;
            // dd($intent);
		return view('checkout.credit-card2',compact('intent'));

    }

    // Example 3

    public function checkout3(Request $request){

        $Data = $request->input();
        // dd($Data);

        $request->validate([
            "name"=>"required",
            'email'=>'required|email',
            'address'=>'required',
            'postalCode'=>'required',
            'phone'=>'required|regex:/^[7-9][0-9]{9}$/',
            'city'=>'required',
            'state'=>'required',
            'amount'=>'required|numeric|gte:1',
        ]);

        // Enter Your Stripe Secret
        \Stripe\Stripe::setApiKey('sk_test_51J00IdSI2FKZNGlQFJ0yeEbxl5P2MLhXRIlGvIlXh6AH2mikdf1lSHrmGpxX0HnTqxJMyyTnW6FCQvb25knSUZCe00HFUVOLfV');
        // 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
		$amount = $request->input('amount');
		$amount *= 100;
        $amount = (int) $amount;
        
        $payment_intent = \Stripe\PaymentIntent::create([
			'description' => 'Stripe Test Payment',
            // 'customer'=>'dhiraj',
            'receipt_email'=>"dhiraj9900@gmail.com",
			'amount' => $amount,
			'currency' => 'INR',
			'description' => 'Test stripe in project ',
			'payment_method_types' => ['card'],
		]);
		$intent = $payment_intent;
            // dd($intent);
        return view('checkout.credit-card3' ,compact('Data','intent'));

    }

    public function afterPayment(Request $request)
    {
        return redirect('payments')->with('success','Your Payment done successfully ');
    }
}
