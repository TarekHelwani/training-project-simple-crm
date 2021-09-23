<!DOCTYPE html>
<!--
* CoreUI - Free Bootstrap Admin Template
* @version v4.0.1
* @link https://coreui.io
* Copyright (c) 2021 creativeLabs Łukasz Holeczek
* Licensed under MIT (https://coreui.io/license)
-->
<!-- Breadcrumb-->
<html lang="en">
<head>
    <base href="./">
    <meta charset="utf-8">
    <meta
            http-equiv="X-UA-Compatible"
            content="IE=edge"
    >
    <meta
            name="viewport"
            content="width=device-width, initial-scale=1.0, shrink-to-fit=no"
    >
    <meta
            name="description"
            content="CoreUI - Open Source Bootstrap Admin Template"
    >
    <meta
            name="author"
            content="Łukasz Holeczek"
    >
    <meta
            name="keyword"
            content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard"
    >
    <title>CRM Training</title>
    <link
            rel="apple-touch-icon"
            sizes="57x57"
            href="assets/favicon/apple-icon-57x57.png"
    >
    <link
            rel="apple-touch-icon"
            sizes="60x60"
            href="assets/favicon/apple-icon-60x60.png"
    >
    <link
            rel="apple-touch-icon"
            sizes="72x72"
            href="assets/favicon/apple-icon-72x72.png"
    >
    <link
            rel="apple-touch-icon"
            sizes="76x76"
            href="assets/favicon/apple-icon-76x76.png"
    >
    <link
            rel="apple-touch-icon"
            sizes="114x114"
            href="assets/favicon/apple-icon-114x114.png"
    >
    <link
            rel="apple-touch-icon"
            sizes="120x120"
            href="assets/favicon/apple-icon-120x120.png"
    >
    <link
            rel="apple-touch-icon"
            sizes="144x144"
            href="assets/favicon/apple-icon-144x144.png"
    >
    <link
            rel="apple-touch-icon"
            sizes="152x152"
            href="assets/favicon/apple-icon-152x152.png"
    >
    <link
            rel="apple-touch-icon"
            sizes="180x180"
            href="assets/favicon/apple-icon-180x180.png"
    >
    <link
            rel="icon"
            type="image/png"
            sizes="192x192"
            href="assets/favicon/android-icon-192x192.png"
    >
    <link
            rel="icon"
            type="image/png"
            sizes="32x32"
            href="assets/favicon/favicon-32x32.png"
    >
    <link
            rel="icon"
            type="image/png"
            sizes="96x96"
            href="assets/favicon/favicon-96x96.png"
    >
    <link
            rel="icon"
            type="image/png"
            sizes="16x16"
            href="assets/favicon/favicon-16x16.png"
    >
    <link
            rel="manifest"
            href="{{ asset('assets/favicon/manifest.json') }}"
    >
    <meta
            name="msapplication-TileColor"
            content="#ffffff"
    >
    <meta
            name="msapplication-TileImage"
            content="assets/favicon/ms-icon-144x144.png"
    >
    <meta
            name="theme-color"
            content="#ffffff"
    >
    <!-- Vendors styles-->
    <link
            rel="stylesheet"
            href="{{asset('vendors/simplebar/css/simplebar.css')}}"
    >
    <link
            rel="stylesheet"
            href="{{asset('css/vendors/simplebar.css')}}"
    >
    <!-- Main styles for this application-->
    <link
            href="{{asset('css/style.css')}}"
            rel="stylesheet"
    >
    <!-- external libraries -->
    <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
            integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
    />
    <!-- We use those styles to show code examples, you should remove them in your application.-->
    <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/prismjs@1.23.0/themes/prism.css"
    >
    <link
            href="{{asset('css/examples.css')}}"
            rel="stylesheet"
    >
    <!-- Global site tag (gtag.js) - Google Analytics-->
    <script
            async=""
            src="https://www.googletagmanager.com/gtag/js?id=UA-118965717-3"
    ></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());
        // Shared ID
        gtag('config', 'UA-118965717-3');
        // Bootstrap ID
        gtag('config', 'UA-118965717-5');
    </script>
</head>
<body>
@include('dashboard.sidebar')
<div class="wrapper d-flex flex-column min-vh-100 bg-light">
    <header class="header header-sticky mb-4">
        <div class="container-fluid">
                <button
                        class="header-toggler px-md-0 me-md-3"
                        type="button"
                        onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()"
                >
                    <svg class="icon icon-lg">
                        <use xlink:href="{{asset('vendors/@coreui/icons/svg/free.svg#cil-menu')}}"></use>
                    </svg>
                </button>
            <a
                    class="header-brand d-md-none"
                    href="#"
            >
                <svg
                        width="118"
                        height="46"
                        alt="CoreUI Logo"
                >
                    <use xlink:href="assets/brand/coreui.svg#full"></use>
                </svg>
            </a>
            <ul class="header-nav ms-auto">
                <li class="nav-item">
                    <a
                            class="nav-link"
                            href="{{ route('notifications.index') }}"
                    >
                        <svg class="icon icon-lg">
                            <use xlink:href="{{asset('vendors/@coreui/icons/svg/free.svg#cil-bell')}}"></use>
                        </svg>
                        @if(auth()->user()->unreadNotifications->count())
                            <span class="badge rounded-pill bg-success" id="notificationCount">{{ auth()->user()->unreadNotifications->count() }}</span>
                        @endif
                    </a>
                </li>
            </ul>

            <x-user-dropdown/>
        </div>
    </header>
    <div class="body flex-grow-1 px-3">
        <div class="container-lg">
            @yield('content')
        </div>
    </div>
    <footer class="footer">
        <div>
            <a href="https://coreui.io">CoreUI</a>
            <a href="https://coreui.io">Bootstrap Admin Template</a>
            © 2021 creativeLabs.
        </div>
        <div class="ms-auto">Powered by&nbsp;<a href="https://coreui.io/bootstrap/ui-components/">CoreUI UI Components
            </a>
        </div>
    </footer>
</div>
<!-- CoreUI and necessary plugins-->
<script src="{{asset('vendors/@coreui/coreui/js/coreui.bundle.min.js')}}"></script>
<script src="{{asset('vendors/simplebar/js/simplebar.min.js')}}"></script>
<!-- We use those scripts to show code examples, you should remove them in your application.-->
<script src="https://cdn.jsdelivr.net/npm/prismjs@1.24.1/prism.js"></script>
<script src="https://cdn.jsdelivr.net/npm/prismjs@1.24.1/plugins/autoloader/prism-autoloader.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/prismjs@1.24.1/plugins/unescaped-markup/prism-unescaped-markup.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/prismjs@1.24.1/plugins/normalize-whitespace/prism-normalize-whitespace.js"></script>
<script>
</script>

<style>
    #notificationCount {
        padding: 0 5px;
        vertical-align: top;
        margin-left: -10px;
    }
</style>
</body>
</html>