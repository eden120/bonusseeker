<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') @unless(empty($settings)){{ '- ' . $settings->name }} {{ '- ' .  $settings->slogan }}@endunless</title>
    <link rel=icon type="image/vnd.microsoft.icon" href="{{ asset('favicon.ico') }}"/>
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}"/>
    <link rel="shortcut icon" href="{{ asset('icon.png') }}"/>
    {{-- Styles --}}
    <link href="{{ asset('/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/themify-icons.css') }}" rel="stylesheet">
    <link href="{{ mix('/css/admin-assets.css') }}" rel="stylesheet">
    @yield('customCSS')
    {{-- Scripts --}}
    <script>window.Laravel = <?php echo json_encode(['csrfToken' => csrf_token(),]); ?></script>
</head>

<body>

<script>
    (function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function () {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
        a = s.createElement(o),
            m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

    ga('create', '{{ $settings->google_analytics }}', 'auto');
    ga('send', 'pageview');
</script>

<div class="container">

    @include('admin.layout.navbar')

    <div class="row">
        @include('admin.layout.left-sidebar')

        <div class="col-md-9">
            @yield('content')
        </div>
    </div>

    <div class="panel panel-default text-center m-b-0">
        <div class="panel-body">
            &copy; Copyright {{ \Carbon\Carbon::now()->format('Y') }} -
            <a href="{{ route('front-end.section.index') }}">@unless(empty($settings)){{ $settings->name }}@endunless</a>. Developed by,
            <a href="https://github.com/shsbd" target="_blank" title="Sazzad Hossain Sharkar">Sharkar</a>.
        </div>
    </div>
</div>

{{-- Scripts --}}
<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('js/bootstrap.js') }}"></script>
@yield('customJS')

</body>
</html>