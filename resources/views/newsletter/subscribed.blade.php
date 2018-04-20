<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel=icon type="image/vnd.microsoft.icon" href="{{ asset('favicon.ico') }}"/>
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}"/>
    <link rel="shortcut icon" href="{{ asset('icon.png') }}"/>
    <title>Thank you for subscribing! - {{ $settings->name }}</title>
    <link rel="stylesheet" href="{{ asset('css/bs-4/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/newsletter.css') }}">
    <script>window.Laravel = <?php echo json_encode(['csrfToken' => csrf_token(),]); ?></script>
    <script type="text/javascript">
        var formData = function() {
            var query_string = (location.search) ? ((location.search.indexOf('#') != -1) ? location.search.substring(1, location.search.indexOf('#')) : location.search.substring(1)) : '';
            var elements = [];
            if(query_string) {
                var pairs = query_string.split("&");
                for(i in pairs) {
                    if(typeof pairs[i] == 'string') {
                        var tmp = pairs[i].split("=");
                        var queryKey = unescape(tmp[0]);
                        queryKey = (queryKey.charAt(0) == 'c') ? queryKey.replace(/\s/g, "_") : queryKey;
                        elements[queryKey] = unescape(tmp[1]);
                    }
                }
            }
            return {
                display: function(key) {
                    if(elements[key]) {
                        document.write(elements[key]);
                    }
                    else {
                        document.write("<!--If desired, replace everything between these quotes with a default in case there is no data in the query string.-->");
                    }
                }
            }
        }
        ();
    </script>
</head>

<body>

<div class="container">
    <div class="col-6 offset-3 mt-5">
        <div class="card">
            <div class="card-body">
                <div class="text-center">
                    <i class="far fa-envelope-open fa-8x mb-4"></i>

                    <h3 class="card-title">Thank you for subscribing!</h3>
                </div>

                <p class="card-text"><strong>
                        <script type="text/javascript">formData.display("email")</script>
                    </strong>
                </p>

                <p class="card-text">You have confirmed your newsletter subscription. Thank you for joining
                    <strong>{{ $settings->name }}</strong> newsletter.</p>

                <div class="text-center">
                    <a href="{{ route('front-end.section.index') }}" class="card-link">Return to the Homepage</a>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>