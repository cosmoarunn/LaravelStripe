<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Cashier\Cashier;
use Laravel\Cashier\subscription;


class HomeController extends Controller
{
    private $domain = 'http://localhost:5005';
    private String $secret;
    private \Stripe\StripeClient $stripe;


    /**
     * Class constructor
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth'); // dd(env('STRIPE_SECRET'));
        $this->secret = env('STRIPE_SECRET');
        $this->stripe = new \Stripe\StripeClient($this->secret);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      // dd($this->subscriptionPlans());
        return view('home', [
            'dark_mode' => session()->has('dark_mode') ? !session()->get('dark_mode') : false,
            'plans' => $this->subscriptionPlans(),  //dd($plans);
            'user' => Auth::user(),
            'layout' => 'generic',
        ]);
    }

    /**
     * Return a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private function subscriptionPlans() {
        //$key = \config('services.stripe.secret');
        $stripe = new \Stripe\StripeClient($this->secret);
        $plansraw = $stripe->plans->all();
        $plans = $plansraw->data;
       
       foreach($plans as $plan) {
           $prod = $stripe->products->retrieve(
               $plan->product,[]
           );
           $plan->product = $prod;
       } 
       return $plans;
    }

    /**
     * Process Checkout
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function checkout(Request $request) { 
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $checkout_session = \Stripe\Checkout\Session::create([
            'line_items' => [[
              # Provide the exact Price ID (e.g. pr_1234) of the product you want to sell
              'price' => 'price_1LsIfbLSkjcgSLv0UKNWDFaf',
              'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' =>   'http://localhost:5005/success',
            'cancel_url' => 'http://localhost:5005/cancel',
          ]);
          
          if($checkout_session)
            return redirect($checkout_session->url); 

    }    
    
}
