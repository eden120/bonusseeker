<!DOCTYPE html>
<html>
<head>
    <title>Page Not Found</title>

    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">

    <style>
        html, body {
            height: 100%;
        }

        body {
            margin: 0;
            padding: 0;
            width: 100%;
            color: #2e4053;
            display: table;
            font-family: helvetica,arial,sans-serif;
        }

        .container {
            text-align: center;
            display: table-cell;
            vertical-align: middle;
        }

        .content {
            text-align: center;
            display: inline-block;
        }

        .title {
            font-size: 30px;
            font-weight: 600;
            margin-bottom: 40px;
        }

        .broken-url {
            padding: 10px 15px;
            background-color: #ecf0f1;
            border-radius: 2px;
        }

        .homepage-url {
            margin-top: 30px !important;
        }

        a {
            padding: 12px 15px;
            color: #ffffff;
            background-color: rgba(0, 171, 84, .85);
            border-radius: 2px;
            text-decoration: none;
        }

        a:hover, a:focus, a:active {
            background-color: rgba(0, 171, 84, 1);
        }
    </style>
</head>

<body>
<?php $region_slug = \App\Region::where('id', 1)->get(); ?>
<div class="container">
    <div class="content">
        <h1 class="title">Unfortunately, this page doesn&#039;t exist.</h1>
        <p class="broken-url">{{ $_SERVER['REQUEST_URI'] }}</p>
        <div class="homepage-url">
            <a href="{{ route('front-end.section.index', ['region' => $region_slug[0]['slug']]) }}">Back to Homepage</a>
        </div>
    </div>
</div>
</body>
</html>