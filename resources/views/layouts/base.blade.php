<!DOCTYPE html>
<!--
App Name: Laravel Stripe - Elegant Themes
Author: fgbsUK
Website: https://fgbsltd.co.uk/
Contact: aps@fgbsltd.co.uk
License: The UnLicense
-->
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="{{ $dark_mode ? 'dark' : '' }}">
<!-- BEGIN: Head -->
<head>
    <meta charset="utf-8">
    <link href="{{ asset('dist/images/logo.svg') }}" rel="shortcut icon">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Laravel implementation of Stripe payments, checkout and subscriptions">
    <meta name="keywords" content="Laravel, Cashier, Stripe, stripe checkout, stripe subscriptions, cashier subscriptions">
    <meta name="author" content="@fgbsUK">


    @yield('head')

    <script>
            window.loggedIn =  {{ auth()->check() ? 'true' : 'false' }};
            window.current_user = {{ (Auth::user()) ? Auth::user()->id : 0 }};
        </script>

    <!-- BEGIN: CSS Assets-->
    <link rel="stylesheet" href="{{ mix('dist/css/app.css') }}" />
    <!-- END: CSS Assets-->
</head>
<!-- END: Head -->

@yield('body')

</html>
 