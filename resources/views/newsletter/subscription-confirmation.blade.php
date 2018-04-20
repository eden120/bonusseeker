<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel=icon type="image/vnd.microsoft.icon" href="{{ asset('favicon.ico') }}"/>
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}"/>
    <link rel="shortcut icon" href="{{ asset('icon.png') }}"/>
    <title>Already Subscribed - {{ $settings->name }}</title>
    <link rel="stylesheet" href="{{ asset('css/bs-4/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/newsletter.css') }}">
    <script>window.Laravel = <?php echo json_encode(['csrfToken' => csrf_token(),]); ?></script>
</head>

<body>

<div class="container">
    <div class="col-6 offset-3 mt-5">
        <div class="card">
            <div class="card-body">
                <div class="text-center mb-3">
                    <i class="far fa-envelope mb-2 fa-8x"></i>

                    <h3 class="card-title">Already Subscribed</h3>

                    <p class="card-text">You are already subscribed to our newsletter.</p>
                </div>
                <div class="text-center">
                    <a href="{{ route('front-end.section.index') }}" class="card-link">Return to the Homepage</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    setTimeout(function() {
        window.location.href = '{{ route('front-end.section.index') }}';

    }, 3000);
</script>

</body>
</html>