@extends('../layouts/base')

@section('body')
    <body class="">
        @yield('content')
        @include('../layouts/components/dark-mode-switcher')

        <!-- BEGIN: JS Assets-->
        <script src="{{ mix('dist/js/app.js') }}"></script>
        <!-- END: JS Assets-->

        @yield('script')
    </body>
@endsection
