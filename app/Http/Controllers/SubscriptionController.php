<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Laravel\Cashier\Cashier;
use Laravel\Cashier\subscription;

use App\Models\Subscription as StripeSubscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    private String $secret;
    private \Stripe\StripeClient $stripe;


    /**
     * Class constructor
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->secret = env('STRIPE_SECRET');
        $this->stripe = new \Stripe\StripeClient($this->secret);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function checkoutSubscription(Request $request) { 
        $subsPlans = [];
        $user = Auth::user();
        try { 
            $customer = $user->createOrGetStripeCustomer(); 
            $user->save();
        }catch(Exception $e) { 
            dd($e);
        }
        
        $selectedPlanDetails = null;
        $plans = $this->subscriptionPlans();

        foreach($plans as $plan) { 
            if(substr($plan->product->name, 0,3) == "PHV") continue;
            $links[$plan->id] = '/subscribe/?plan='.$plan->id;
            if($plan->id == $request->plan || $plan->id == 'price_1KlDCzLSkjcgSLv0Vb6lJ23q') { 
                $selectedPlanDetails = $plan;
            }
            $subsPlans[] = $plan;
        }
        

        $paymentMethods = $this->stripe->customers->allPaymentMethods(
            $customer->id,
            ['type' => 'card']
          );
        //dd($paymentMethods);
        return view('_subscriptions.subscription-checkout', [
            'dark_mode' => session()->has('dark_mode') ? !session()->get('dark_mode') : false,
            'layout' => 'scaffold',
            'customer' => $customer,
            'plans' => $subsPlans,
            'selectedPlan' => $selectedPlanDetails,
            'payment_methods' => $paymentMethods->data,
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function show(Subscription $subscription)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function edit(Subscription $subscription)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subscription $subscription)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subscription $subscription)
    {
        //
    }
}
