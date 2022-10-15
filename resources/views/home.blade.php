@extends('layouts.scaffold')

@section('subhead')
    <title>Dashboard - Laravel Stripe Elegant</title>
@endsection


@section('content')

<div class="container sm:px-10">
        <div class="block xl:grid grid-cols-2 gap-4">
            <!-- BEGIN: Login Info -->
            <div class="hidden xl:flex flex-col mb-10 ">
                <a href="" class="-intro-x flex items-center pt-5">
                    <img alt="fgbsUK" class="w-20" src="{{ asset('dist/images/fgbs-logo.png') }}">
                    <span class="text-white text-lg ml-3">
                        FGBS<span class="ml-2 font-medium">Ltd</span>
                    </span>
                </a>
                
            </div>
            <!-- END: Home Info -->
           
        </div>

        <div class="grid grid-cols-12 gap-6 px-10">
    <div class="col-span-12 2xl:col-span-9">
        <div class="grid grid-cols-12 gap-6">
            
            <!-- BEGIN: Laravel Stripe Dash -->
            <div class="intro-y box col-span-12 2xl:col-span-6">
                <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
                    <h2 class="font-medium text-base mr-auto">Laravel Stripe</h2>
                    <div class="dropdown ml-auto">
                        <a class="dropdown-toggle w-5 h-5 block" href="javascript:;" aria-expanded="false">
                            <i data-feather="more-horizontal" class="w-5 h-5 text-gray-600 dark:text-gray-300"></i>
                        </a>
                        <div class="dropdown-menu w-40">
                            <div class="dropdown-menu__content box dark:bg-dark-1 p-2">
                                <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md">
                                    <i data-feather="edit-2" class="w-4 h-4 mr-2"></i> New Tab
                                </a>
                                <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md">
                                    <i data-feather="trash" class="w-4 h-4 mr-2"></i> Delete
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="p-5">
                    <div class="boxed-tabs nav nav-tabs flex-col justify-center sm:flex-row text-gray-700 dark:text-gray-300" role="tablist">
                        
                        <a id="checkout-tab" data-toggle="tab" data-target="#checkout" href="javascript:;" class="w-full sm:w-30 sm:h-30 mb-2 sm:mb-0 py-5 rounded-md box dark:bg-dark-5 text-center sm:mx-2 active" role="tab" aria-selected="false">
                            <i data-feather="inbox" class="block w-6 h-6 mb-2 mx-auto"></i> Checkout
                        </a>
                        <a id="subscriptions-tab" data-toggle="tab" data-target="#subscriptions" href="javascript:;" class="w-full sm:w-30 sm:h-30 mb-2 sm:mb-0 py-5 rounded-md box dark:bg-dark-5 text-center sm:mx-2" role="tab" aria-selected="false">
                            <i data-feather="activity" class="block w-6 h-6 mb-2 mx-auto"></i> Subscriptions
                        </a>
                        <a id="payments-tab" data-toggle="tab" data-target="#payments" href="javascript:;" class="w-full sm:w-30 sm:h-30 mb-2 sm:mb-0 py-5 rounded-md box dark:bg-dark-5 text-center sm:mx-2" role="tab" aria-selected="true">
                            <i data-feather="box" class="block w-6 h-6 mb-2 mx-auto"></i> Payments
                        </a>
                        
                    </div>
                    <!-- BEGIN : PAYMENTS -->
                    <div class="tab-content mt-8">
                        <div id="payments" class="tab-pane" role="tabpanel" aria-labelledby="payments-tab">
                            <div class="flex flex-col sm:flex-row items-center h-minscreen">
                                Payments Section
                            </div>
                            
                        </div>
                        <!-- END : PAYMENTS -->
                        
                        <!-- BEGIN : SUBSCRIPTION -->
                        <div id="subscriptions" class="tab-pane" role="tabpanel" aria-labelledby="payments-tab"> 
                            
                            <div class="flex items-center px-5 py-3 border-b border-gray-200 dark:border-dark-5">
                                <h2 class="font-medium text-base mr-auto">New Products</h2>
                                <button data-carousel="new-products" data-target="prev" class="tiny-slider-navigator btn btn-outline-secondary px-2 mr-2">
                                    <i data-feather="chevron-left" class="w-4 h-4"></i>
                                </button>
                                <button data-carousel="new-products" data-target="next" class="tiny-slider-navigator btn btn-outline-secondary px-2">
                                    <i data-feather="chevron-right" class="w-4 h-4"></i>
                                </button>
                            </div>

                            

                            @foreach($plans as $plan)
                            <div class="px-5 border-b pb-5">
                                
                                <div class="flex flex-col lg:flex-row items-center pb-14">
                                    <div class="flex flex-col sm:flex-row items-center pr-5 lg:border-r border-gray-200 dark:border-dark-5">
                                        <div class="sm:mr-5">
                                            <div class="w-20 h-20 image-fit">
                                                <img alt="plan" class="rounded-full" src="{{ count($plan->product->images)?$plan->product->images[0]:asset('dist/images/preview-1.jpg') }}">
                                            </div>
                                        </div>
                                        <div class="mr-auto text-center sm:text-left mt-3 sm:mt-0">
                                            <a href="" class="font-medium text-lg">{{ $plan->product->name }}</a>
                                            <div class="text-gray-600 mt-1 sm:mt-0">{{ $plan->product->id }}</div>
                                        </div>
                                    </div>
                                    <div class="w-full lg:w-auto mt-6 lg:mt-0 pt-4 lg:pt-0 flex-1 flex items-center justify-center px-5 border-t lg:border-t-0 border-gray-200 dark:border-dark-5">
                                        <div class="text-center rounded-md w-20 py-3">
                                            <div class="font-medium text-theme-25 dark:text-theme-22 text-xl">{{  '£' .  $plan->amount }}</div>
                                            <div class="text-gray-600">/ {{$plan->interval}}</div>
                                        </div>
                                        <div class="text-center rounded-md w-20 py-3">
                                            <div class="font-medium text-theme-25 dark:text-theme-22 text-xl">{{ intval($plan->amount/7) }}</div>
                                            <div class="text-gray-600">Purchases</div>
                                        </div>
                                        <div class="text-center rounded-md w-20 py-3">
                                            <div class="font-medium text-theme-25 dark:text-theme-22 text-xl">{{ intval($plan->amount/3) }}</div>
                                            <div class="text-gray-600">Reviews</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex flex-col sm:flex-row items-center border-t border-gray-200 dark:border-dark-5 pt-5">
                                    <div class="w-full sm:w-auto flex justify-center sm:justify-start items-center border-b sm:border-b-0 border-gray-200 dark:border-dark-5 pb-5 sm:pb-0">
                                        <div class="px-3 py-2 bg-theme-19 dark:bg-dark-5 dark:text-gray-300 text-theme-22 rounded font-medium mr-3">{{ date('m/d/Y H:i:s', $plan->product->updated) }}</div>
                                        <div class="text-gray-600">Last Updated</div>
                                    </div>
                                    <div class="flex sm:ml-auto mt-5 sm:mt-0">
                                        <button class="btn btn-elevated-rounded-secondary w-30 ml-auto">Preview</button>
                                        <button class="btn btn-elevated-rounded-secondary w-30 ml-2">Details</button>
                                        <button class="btn btn-elevated-rounded-primary w-30 ml-2" onclick="location.href='/subscription/checkout/?plan={{$plan->id}}'">Checkout</button>
                                    </div>
                                </div>
                            </div>
                            @endforeach


                        </div>
                        <!-- END : SUBSCRIPTION -->
                        <!-- BEGIN : CHECKOUT -->
                        <div id="checkout" class="tab-pane active" role="tabpanel" aria-labelledby="payments-tab"> 
                        <section>
                            <div class="relative h-minscreen place-items-center flex items-center">
                                <div class="w-12 h-12 flex-none image-fit">
                                    <img alt="pp-device" class="rounded-full" src="{{ asset('dist/images/pp-device.png')  }}">
                                </div>
                                <div class="ml-4 mr-auto">
                                    <a href="" class="font-medium">Paypoint Device</a>
                                    <div class="text-gray-600 mr-5 sm:mr-5">Excellent paypoint device available for purchase.</div>
                                </div>
                                <div class="font-medium text-gray-700 dark:text-gray-600">£19</div>
                            </div>
                            <form action="/checkout" method="POST">
                                {{csrf_field()}}
                                <button type="submit" class="btn btn-sm btn-primary-outline" id="checkout-button">Checkout</button>
                            </form>
                            </section>
                        </div>
                        <!-- END : CHECKOUT -->
                    </div>
                </div>
            </div>
            <!-- END: Laravel Stripe Dash -->
        </div>
    </div>
</div>
    </div>


@endsection
