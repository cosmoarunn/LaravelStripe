@extends('../layouts/' . $layout)

@section('subhead')
    <title>StocksOnFire | Home </title>
@endsection

@section('content')
    <div class="container">

        <div class="grid grid-cols-12 gap-0 mt-5 mb-10">
            <div class="col-span-12 lg:col-span-6 2xl:col-span-5 flex lg:block flex-col-reverse h-screen ">
                <div class="intro-y  bg-theme-26 dark:bg-dark-5 px-10 py-2 sm:py-10 mt-6 px-15 ">
                    <div class="col-span-12 md:col-span-6 xl:col-span-4 xxl:col-span-12 px-10  mt-3">
                            
                            <div class="intro-x flex items-center h-10">
                                <div class="w-10 h-10 mr-2 flex-none image-fit rounded-full overflow-hidden">
                                    <img alt="JD" src="{{ asset('dist/images/fgbs-logo.png') }}">
                                </div>
                                <h2 class="text-lg text-white font-medium truncate mr-5 ">JustDrive&trade;</h2>
                                
                            </div>
                            <div class=" mt-5 font-sans relative">
                                    <h5 class="font-bold text-white-100"> Try the Subscription </h5>
                                    <h1 class="text-4xl font-bold font-serif text-white"> 30 days free </h1>
                                    <h5 class="font-bold text-lg font-serif text-white"> Then £{{$selectedPlan->amount/100}}/<spanc class="text-xs">{{ $selectedPlan->interval }}</span> </h5>
                                    <h4 class=" text-base text-white font-serif">  {{$selectedPlan->product->name}} plan : {{$selectedPlan->product->description}} </h4>
                                    <div id="" class="bg-theme-25  border-t border-grey-900 rounded-t box px-4 py-4 mt-10  flex items-center zoom-in">
                                        <div class="w-10 h-10 flex-none image-fit rounded-md overflow-hidden">
                                            <img alt="plan" src="{{ asset('dist/images/preview-1.jpg') }}">
                                        </div>
                                        <div class="ml-4 mr-auto">
                                            <div class="text-white font-medium">{{$selectedPlan->product->name}}'s </span></div>
                                            <div class="text-white font-bold text-xs mt-0.5">Qty 1 </div>
                                        </div>
                                        <div class="py-1 px-2  text-xs  text-white cursor-pointer font-medium ">
                                            <div><span class="font-medium text-2xl">30 days</span><span class="text-xs lowercase"> free</span></div>
                                            <div class="text-white font-bold text-xs mt-0.5">£{{$selectedPlan->amount/100}}/ <spanc class="text-xs">{{ $selectedPlan->interval }}</span> after</div>
                                        </div> 
                                    </div>
                                    <div class="flex items-center px-3 py-2 mb-10 border border-md border-grey-100 bg-blue-800 dark:bg-dark-1 font-medium">
                                        <input id="checkbox-switch-7" class="form-check-switch border-theme-24" type="checkbox">
                                        <label class="form-check-label " for="checkbox-switch-7">
                                            <span class="text-white">Save with annual billing  <mark class="p-1 bg-yellow-200 rounded-md"> 30% off</mark></span></label>
                                            <div class="text-white text-right font-bold text-xs mt-0.5 mr-2 ml-20">£  {{10 * $selectedPlan->amount/100}} / year</div>
                                        
                                    </div>
                                    <div class="flex items-center px-3 py-2 mt-20 border-b border-grey-300 bg-blue-800 dark:bg-dark-5 font-medium">
                                        <div class="w-3/4">Subtotal</div>
                                        <div class="text-white text-right font-normal text-lg mt-0.5 mr-auto ml-5">£ {{$selectedPlan->amount/100}}</div>
                                    </div>
                                    <div class="flex items-center px-3 py-2 mt-2  border-b border-grey-200 bg-blue-800 dark:bg-dark-5 font-normal">
                                        <div class="w-3/4">VAT (20%)</div>
                                        <div class="text-white text-right font-normal text-lg mt-0.5 mr-auto ml-5">£ {{ number_format(0.2 * $selectedPlan->amount /100, 2) }}</div>
                                    </div>
                                    <div class="flex items-center px-3 py-2 mt-2 border-b border-grey-200 bg-blue-800 dark:bg-dark-5 font-normal">
                                        <div class="w-3/4">Total after trial</div>
                                        <div class="text-white text-right font-bold text-lg mt-0.5 mr-auto ml-5">£ {{ number_format(($selectedPlan->amount + (0.2 * $selectedPlan->amount))    /100, 2) }}</div>
                                    </div>
                                    <div class="flex items-center px-3 py-2 mt-2  bg-blue-800 dark:bg-dark-5 font-normal text-xl">
                                        <div class="w-3/4">Total due today</div>
                                        <div class="text-white text-right font-bold text-xl mt-0.5 mr-auto ml-5">£ 0.00</div>
                                    </div>
                            </div>
                            
                    </div>
                    <div class="flex items-center bg-theme-34 rounded-full dark:bg-dark-3 mt-2"> 
                        <button class="btn btn-link border-none mr-20"> 
                                <i class="w-6 h-6 ml-10 mr-5" data-feather="corner-up-left"> </i>
                                Return to Merchant 
                        </button>
                        <div class="text-right "><a class="Link Link--primary " target="_blank" rel="noopener"><span class="Text Text-color--gray400 Text-fontSize--12 Text-fontWeight--400">Powered by <svg class="InlineSVG Icon Footer-PoweredBy-Icon Icon--md" focusable="false" width="33" height="15" role="img" aria-labelledby="stripe-title"><title id="stripe-title">Stripe</title><g fill-rule="evenodd"><path d="M32.956 7.925c0-2.313-1.12-4.138-3.261-4.138-2.15 0-3.451 1.825-3.451 4.12 0 2.719 1.535 4.092 3.74 4.092 1.075 0 1.888-.244 2.502-.587V9.605c-.614.307-1.319.497-2.213.497-.876 0-1.653-.307-1.753-1.373h4.418c0-.118.018-.588.018-.804zm-4.463-.859c0-1.02.624-1.445 1.193-1.445.55 0 1.138.424 1.138 1.445h-2.33zM22.756 3.787c-.885 0-1.454.415-1.77.704l-.118-.56H18.88v10.535l2.259-.48.009-2.556c.325.235.804.57 1.6.57 1.616 0 3.089-1.302 3.089-4.166-.01-2.62-1.5-4.047-3.08-4.047zm-.542 6.225c-.533 0-.85-.19-1.066-.425l-.009-3.352c.235-.262.56-.443 1.075-.443.822 0 1.391.922 1.391 2.105 0 1.211-.56 2.115-1.39 2.115zM18.04 2.766V.932l-2.268.479v1.843zM15.772 3.94h2.268v7.905h-2.268zM13.342 4.609l-.144-.669h-1.952v7.906h2.259V6.488c.533-.696 1.436-.57 1.716-.47V3.94c-.289-.108-1.346-.307-1.879.669zM8.825 1.98l-2.205.47-.009 7.236c0 1.337 1.003 2.322 2.34 2.322.741 0 1.283-.135 1.581-.298V9.876c-.289.117-1.716.533-1.716-.804V5.865h1.716V3.94H8.816l.009-1.96zM2.718 6.235c0-.352.289-.488.767-.488.687 0 1.554.208 2.241.578V4.202a5.958 5.958 0 0 0-2.24-.415c-1.835 0-3.054.957-3.054 2.557 0 2.493 3.433 2.096 3.433 3.17 0 .416-.361.552-.867.552-.75 0-1.708-.307-2.467-.723v2.15c.84.362 1.69.515 2.467.515 1.879 0 3.17-.93 3.17-2.548-.008-2.692-3.45-2.213-3.45-3.225z"></path></g></svg></span></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-span-12 lg:col-span-6 2xl:col-span-5 flex lg:block flex-col-reverse mt-5 h-min-screen overflow-y-scroll	">
                <div class="intro-y  bg-theme-10  sm:py-10 mt-1 px-5">
                    <div class="col-span-12 md:col-span-6 xl:col-span-4 xxl:col-span-12  ">
                        <div class="intro-x flex items-center ">
                            <div class="p-5   dark:bg-dark-3 ">
                                <!-- BEGIN: CONTACT INFO -->
                                <div class="flex items-center px-3  mt-2 border-b border-grey-200 bg-blue-800 dark:bg-dark-1 font-normal">
                                    <div class="w-3/4 uppercase font-bold">Contact Information</div>
                                    <div class="hidden text-white text-right font-normal text-lg mt-0.5 mr-auto ml-5">£ 179.99</div>
                                </div>
                                <div class="px-5 py-5 text-left">
                    
                                    <div class="flex items-center   border-b  bg-blue-800 dark:bg-dark-1 font-medium dark:bg-dark-3 dark:text-white">
                                        <input id="contact-email" class="form-input border-none rounded-t-2xl w-full py-2 px-20 text-lg dark:bg-dark-5 dark:text-white" type="text" value="{{$customer->email}}" placeholder="john@doe.com">
                                        <div class="absolute w-4 h-4 text-grey-300 mb-0.5"> <i class="w-6 h-6 ml-10" data-feather="mail"></i> </div>
                                    </div>
                                    <div class="flex items-center   border-none  bg-blue-800 dark:bg-dark-1 font-medium dark:bg-dark-3 dark:text-white">
                                        <input id="contact-phone" class="form-input border-none rounded-b-2xl w-full py-2 px-20 text-lg dark:bg-dark-5 dark:text-white" type="text" value="{{$customer->phone}}" placeholder="0765432100" >
                                        <div class="absolute w-4 h-4 mb-0.5"> <i class="w-6 h-6 ml-10" data-feather="phone"></i> </div>
                                    </div>
                                    
                                </div>
                                <!-- END: CONTACT INFO -->

                                <!-- BEGIN: CURRENT PLAN -->
                                <div class="flex items-center px-3 py-2 mt-2 border-b border-grey-200 bg-blue-800 dark:bg-dark-1 font-normal">
                                    <div class="w-3/4 uppercase font-bold">Current Plan</div>
                                    <div class="hidden text-white text-right font-normal text-lg mt-0.5 mr-auto ml-5">£ 179.99</div>
                                </div>  
                                <div class="px-5 py-5 text-left"> 
                                    <div class="flex ml-2"> 
                                        <div class="items-center text-left mr-20 w-3/4">
                                            <h2 class="text-2xl font-bold font-serif"> Fleet Owners Plan </h2>
                                            <h4 class=" text-base font-serif">  Renews on {{\Carbon\Carbon::now()->addYear()}} </h4>
                                        </div>
                                        <div class="items-center text-right">
                                            <div class="mb-0.5 mx-auto"><button class="btn btn-elevated-success bg-theme-20 w-40 mr-1 mb-2">Update Plan</button></div>
                                            <div class="mb-2 hidden"><button class="btn btn-elevated-secondary w-40 mr-1 mb-2">Cancel Plan</button></div>
                                        </div>
                                    </div> 
                                    
                                </div>
                                <!-- END: CURRENT PLAN -->

                                <!-- BEGIN: PAYMENT METHODS -->
                                <div class="flex items-center px-3 py-2 mt-2 border-b border-grey-200 bg-blue-800 dark:bg-dark-1 font-normal">
                                    <div class="w-3/4 uppercase font-bold">Payment Methods</div>
                                    <div class="hidden text-white text-right font-normal text-lg mt-0.5 mr-auto ml-5">£ 179.99</div>
                                </div>
                                <div class="px-5 py-5 text-left">
                                    @if(count($payment_methods) > 0 ) 
                                    <div class="bg-grey-200 items-center px-5 py-1 border-b border-gray-200 dark:border-dark-5 h-100 overflow-y-scroll" style="height:120px">
                                        @foreach($payment_methods as $pm)
                                        <div data-pmid="{{$pm->id}}" class="checkout-pm border-theme-20 rounded-t box px-4 py-0 mt-2 flex items-center bg-grey-600 cursor-pointer">
                                            <div class="w-10 h-10 flex-none image-fit rounded-md overflow-hidden">
                                                <img alt="plan" src="{{ asset('dist/images/checkout/'.$pm->card->brand.'.png') }}">
                                            </div>
                                            <div class="ml-4 mr-auto">
                                                <div class=" font-bold">.... {{$pm->card->last4 }}</span></div>
                                            </div>
                                            <div class="font-normal text-xs mt-0.5">{{$pm->card->exp_month}}/{{$pm->card->exp_year}}</div>
                                            <div class="py-1 px-2  text-xs  cursor-pointer font-medium ">
                                            <div>
                                                <span class="font-medium ">CVC:</span>
                                                <span class="text-md lowercase">
                                                    <input type="text" class="border-b border-dotted ml-4 p-2" size="3" placeholder="123" /></span>
                                            </div>
                                                
                                            </div> 
                                        </div>
                                        @endforeach
                                    </div>
                                    @else
                                    <div class="bg-grey-200 items-center px-5 py-1 border-b border-gray-200 dark:border-dark-5 h-100 overflow-y-scroll" style="height:120px">
                                        <div class="text-md">No payment method available for this account.</div>
                                    </div>
                                    @endif
                                    <button id="add-pmnt-method" class="btn p-1 border-none text-xs text-normal"> 
                                        <i class="w-4 h-4 ml-2 mr-5" data-feather="plus-square"> </i>
                                        Add payment method 
                                    </button>
                                </div>
                                <!-- END: PAYMENT METHODS -->
                                <div class="flex items-center px-3 py-2 mt-2 border-b border-grey-200 bg-blue-800 dark:bg-dark-1 font-normal">
                                    <div class="w-3/4 uppercase font-bold">Billing &amp; Shipping Information</div>
                                    <div class="hidden text-white text-right font-normal text-lg mt-0.5 mr-auto ml-5">£ 179.99</div>
                                </div>
                                <div class="px-5 py-5 text-left"> 
                                <button class="billing-info btn p-1 border-none text-xs text-normal"> 
                                            ...<i class="w-4 h-4 ml-2 mr-5" data-feather="edit-3"> </i>
                                            Edit Information
                                    </button>
                                </div>
                                <div class="flex items-center px-3 py-2 mt-2 border-b border-grey-200 bg-blue-800 dark:bg-dark-1 font-normal">
                                    <div class="w-3/4 uppercase font-bold">Invoice History</div>
                                    <div class="hidden text-white text-right font-normal text-lg mt-0.5 mr-auto ml-5">£ 179.99</div>
                                </div>
                                <div class="px-5 py-5 text-left"></div>
                            
                                <div class="my-10 mx-auto items-center"><button class="btn btn-xl btn-elevated-rounded-success bg-theme-20 w-40 mr-1 mb-2">Start Trial</button></div>

                            </div>               
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


      
@endsection
