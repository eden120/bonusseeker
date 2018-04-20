<!DOCTYPE html>
<html lang="en" prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# website: http://ogp.me/ns/website#">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel=icon type="image/vnd.microsoft.icon" href="{{ asset('favicon.ico') }}"/>
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}"/>
    <link rel="shortcut icon" href="{{ asset('icon.png') }}"/>
    @include('frontend.layout.meta')
    {{-- Styles --}}
    <link rel="stylesheet" href="{{ Cdn::mix('/css/vendor.css') }}">
    <link rel="stylesheet" href="{{ Cdn::mix('/css/app.css') }}">
    @yield('customCSS')
    {{-- Scripts --}}
    <script>window.Laravel = <?php echo json_encode(['csrfToken' => csrf_token(),]); ?></script>
    <script async>
        (function(s, u, m, o, j, v) {
            j = u.createElement(m);
            v = u.getElementsByTagName(m)[0];
            j.async = 1;
            j.src = o;
            j.dataset.sumoSiteId = '0b87e37b0f50e533360fc5efde7db403359948935b68fdf025abd89519d6ec28';
            v.parentNode.insertBefore(j, v)
        })(window, document, 'script', '//load.sumo.com/');
    </script>
    <!-- Facebook Pixel Code -->
    <script>
        !function(f, b, e, v, n, t, s) {
            if(f.fbq) return;
            n = f.fbq = function() {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if(!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window, document, 'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        ;
        fbq('init', '571478719682145');
        fbq('track', 'PageView');
        fbq('track', 'ViewContent');
    </script>
    <noscript><img height="1" width="1" src="https://www.facebook.com/tr?id=571478719682145&ev=PageView&noscript=1"/>
    </noscript>
    <!-- End Facebook Pixel Code -->
    @yield('headTag')
</head>

<body @yield('bodyTag')>

<script>
    (function(i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function() {
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
    {{-- Navbar --}}
    @include('frontend.layout.navbar')

    {{-- Email Subscription Success Message --}}
    @include('frontend.layout.email-subscription-message')

    @if($errors->any())
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-danger m-b-0 m-t-10">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true"><i class="fa fa-close"></i></span></button>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    @endif

    @yield('content')

    @include('frontend.layout.footer')
    @include('frontend.layout.disclaimer')
</div>

{{-- Scripts --}}
<script src="https://www.google-analytics.com/analytics.js"></script>
<script src="{{ Cdn::mix('/js/manifest.js') }}"></script>
<script src="{{ Cdn::mix('/js/vendor.js') }}"></script>
<script src="{{ Cdn::mix('/js/app.js') }}"></script>

<script>
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>

@yield('customJS')
<script type='text/javascript'>
    var _at = {};
    _at.domain = 'www.bonusseeker.com';
    _at.owner = 'c8c09e645e55';
    _at.idSite = '3757';
    _at.attributes = {};
    _at.webpushid = 'web.19.aimtell.com';
    (function() {
        var d = document, g = d.createElement('script'), s = d.getElementsByTagName('script')[0];
        g.type = 'text/javascript';
        g.async = true;
        g.defer = true;
        g.src = 'https://s3.amazonaws.com/cdn.aimtell.com/trackpush/trackpush.min.js';
        s.parentNode.insertBefore(g, s);
    })();
</script>

<script>
    $(function() {
        $('.site-footer-match-height').matchHeight();
    });
</script>

<script>
    jQuery(document).on('click', '.mega-dropdown', function(e) {
        e.stopPropagation()
    })
</script>

<script language="javascript" type="text/javascript">
    function resizeYouTubeIframe(obj) {
        obj.style.height = obj.contentWindow.document.body.scrollHeight + 'px';
    }
</script>

<script>
    $(function() {
        $('.dropdown-header').matchHeight();
    });

    $(function() {
        $('.email-newsletter-match-height').matchHeight();
    });
</script>

@include('frontend.layout.aweber')

</body>
</html>