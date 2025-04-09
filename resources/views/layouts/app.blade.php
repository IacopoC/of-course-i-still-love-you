<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="@yield('description')">
    <meta name="author" content="IacopoC">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css">
    <script src="{{asset('js/location.js')}}"></script>
    <x-head.tinymce-config/>
</head>
<body>
    <div id="app">
            @include('layouts.navigation')
        <main class="py-4">
            @yield('content')
        </main>
        <div class="container">
            <footer class="text-body-secondary py-5">
                <div class="container">
                    <p class="float-end mb-1">
                        <a href="#">Back to top</a>
                    </p>
                    <p class="mb-1">{{ date('Y') }} - Of Course I Still Love you</p>
                    <a href="https://www.iubenda.com/privacy-policy/{{ env('IUBENDA_KEY') }}" class="iubenda-black iubenda-noiframe iubenda-embed iubenda-noiframe " title="Privacy Policy ">Privacy Policy</a><script type="text/javascript">(function (w,d) {var loader = function () {var s = d.createElement("script"), tag = d.getElementsByTagName("script")[0]; s.src="https://cdn.iubenda.com/iubenda.js"; tag.parentNode.insertBefore(s,tag);}; if(w.addEventListener){w.addEventListener("load", loader, false);}else if(w.attachEvent){w.attachEvent("onload", loader);}else{w.onload = loader;}})(window, document);</script>
                    <a href="https://www.iubenda.com/privacy-policy/{{ env('IUBENDA_KEY') }}/cookie-policy" class="iubenda-black iubenda-noiframe iubenda-embed iubenda-noiframe " title="Cookie Policy ">Cookie Policy</a><script type="text/javascript">(function (w,d) {var loader = function () {var s = d.createElement("script"), tag = d.getElementsByTagName("script")[0]; s.src="https://cdn.iubenda.com/iubenda.js"; tag.parentNode.insertBefore(s,tag);}; if(w.addEventListener){w.addEventListener("load", loader, false);}else if(w.attachEvent){w.attachEvent("onload", loader);}else{w.onload = loader;}})(window, document);</script>
                </div>
            </footer>
        </div>
    </div>
    <script>
        window.google_api_key = "{{ env('GOOGLE_LOCATION_KEY') }}";
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script type="text/javascript">
        var _iub = _iub || [];
        _iub.csConfiguration = {"askConsentAtCookiePolicyUpdate":true,"cookiePolicyInOtherWindow":true,"enableFadp":true,"enableLgpd":true,"enableUspr":true,"fadpApplies":true,"floatingPreferencesButtonDisplay":"bottom-right","lang":"en-GB","perPurposeConsent":true,"siteId":3619398,"usprApplies":true,"whitelabel":false,"cookiePolicyId":{{ env('IUBENDA_KEY') }}, "banner":{ "acceptButtonDisplay":true,"closeButtonDisplay":false,"customizeButtonDisplay":true,"explicitWithdrawal":true,"listPurposes":true,"position":"bottom","rejectButtonDisplay":true,"showTitle":false }};
    </script>
    <script type="text/javascript" src="https://cs.iubenda.com/autoblocking/3619398.js"></script>
    <script type="text/javascript" src="//cdn.iubenda.com/cs/gpp/stub.js"></script>
    <script type="text/javascript" src="//cdn.iubenda.com/cs/iubenda_cs.js" charset="UTF-8" async></script>
</body>
</html>
