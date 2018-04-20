<!doctype html>
<html amp>
<head>
    <meta charset="utf-8">
    <title>NJ Online Casino News</title>
    <?php $region_slug = \App\Region::where('id', 1)->get(); ?>
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
    <style amp-custom>
        body {
            font-family: helvetica,arial,sans-serif;
        }

        h1 {
            color: #2e4053;
            font-size: 20px;
            font-weight: bold;
            margin: 0;
            padding: 0;
        }

        p {
            font-size: 15px;
            margin-bottom: 0;
            line-height: 22px;
        }

        .container {
            padding: 10px;
            margin: 10px;
            -webkit-box-shadow: 1.3px 1.3px 4px 0 rgba(0, 0, 0, 0.3);
            -moz-box-shadow: 1.3px 1.3px 4px 0 rgba(0, 0, 0, 0.3);
            box-shadow: 1.3px 1.3px 4px 0 rgba(0, 0, 0, 0.3);
            background-color: #ffffff;
        }

        .heading {
            padding: 10px;
            background: #00aeef;
            font-size: 18px;
            font-weight: bold;
            color: #ffffff;
            border-radius: 2px;
            margin-bottom: 15px;
        }

        .news-section {
            -webkit-box-shadow: 1.3px 1.3px 4px 0 rgba(0, 0, 0, 0.3);
            -moz-box-shadow: 1.3px 1.3px 4px 0 rgba(0, 0, 0, 0.3);
            box-shadow: 1.3px 1.3px 4px 0 rgba(0, 0, 0, 0.3);
            background-color: #ffffff;
            padding: 10px;
            margin: 10px 0 15px 0;
        }

        .image-frame {
            margin: 10px -10px 10px -10px;
        }

        a {
            color: #2e4053;
            text-decoration: none;
        }

        a:hover, a:focus {
            color: #00aeef;
        }

        a:visited {
            color: #2e4053;
        }
    </style>
    @unless(empty($published_news))
        @foreach($published_news as $news)
            <script type="application/ld+json">
    {
      "@context": "http://schema.org",
      "@type": "NewsArticle",
      "mainEntityOfPage": "{{ route('front-end.show-news', ['region' => \App\News::findOrFail($news->id)->region->slug, 'slug' => $news->slug]) }}",
      "headline": "{{ $news->name }}",
      "image": {
        "@type": "ImageObject",
        "url": "{{ url(Storage::url($news->featured_image)) }}",
        "width": 850,
        "height": 480
      },
      "author": {
        "@type": "Person",
        "name": "{{ $settings->name }}"
        {{--"sameAs": "https://plus.google.com/114108465800532712602"--}}
                },
              "publisher": {
              "@type": "Organization",
              "name": "{{ $settings->name }}",
      "logo": {
        "@type": "ImageObject",
        "url": "{{ asset('img/logo-for-amp.png') }}",
        "width": 600,
        "height": 60
        }
    },
      "url": "{{ route('front-end.show-news', ['region' => \App\News::findOrFail($news->id)->region->slug, 'slug' => $news->slug]) }}",
      "datePublished": "{{ \Carbon\Carbon::parse($news->created_at)->toAtomString() }}",
      "dateModified": "{{ \Carbon\Carbon::parse($news->created_at)->toAtomString() }}"
    }
            </script>
        @endforeach
    @endunless
    <script async custom-element="amp-carousel" src="https://cdn.ampproject.org/v0/amp-carousel-0.1.js"></script>
    <style amp-boilerplate>body {
            -webkit-animation: -amp-start 8s steps(1, end) 0s 1 normal both;
            -moz-animation: -amp-start 8s steps(1, end) 0s 1 normal both;
            -ms-animation: -amp-start 8s steps(1, end) 0s 1 normal both;
            animation: -amp-start 8s steps(1, end) 0s 1 normal both
        }

        @-webkit-keyframes -amp-start {
            from {
                visibility: hidden
            }
            to {
                visibility: visible
            }
        }

        @-moz-keyframes -amp-start {
            from {
                visibility: hidden
            }
            to {
                visibility: visible
            }
        }

        @-ms-keyframes -amp-start {
            from {
                visibility: hidden
            }
            to {
                visibility: visible
            }
        }

        @-o-keyframes -amp-start {
            from {
                visibility: hidden
            }
            to {
                visibility: visible
            }
        }

        @keyframes -amp-start {
            from {
                visibility: hidden
            }
            to {
                visibility: visible
            }
        }</style>
    <noscript>
        <style amp-boilerplate>body {
                -webkit-animation: none;
                -moz-animation: none;
                -ms-animation: none;
                animation: none
            }</style>
    </noscript>
    <script async src="https://cdn.ampproject.org/v0.js"></script>
</head>

<body>
<div class="container">
    <div class="heading">NJ Online Casino News</div>
    @unless(empty($published_news))
        @foreach($published_news as $news)
            <div class="news-section">
                <h1><a href="{{ route('amp.show-news', ['region' => \App\News::findOrFail($news->id)->region->slug, 'slug' => $news->slug]) }}">{{ $news->name }}</a></h1>

                <div class="image-frame">
                    <a href="{{ route('amp.show-news', ['slug' => $news->slug]) }}">
                        <amp-img src={{ Image::url(Storage::url($news->featured_image), 640, 320) }} width=640
                                 height=320
                                 layout="responsive" alt="{{ $news->name }}"></amp-img>
                    </a>
                </div>

                <p>
                    <a href="{{ route('amp.show-news', ['region' => \App\News::findOrFail($news->id)->region->slug, 'slug' => $news->slug]) }}">{!! str_limit($news->seo_description, 160) !!}</a>
                </p>
            </div>
        @endforeach
    @endunless
</div>

</body>
</html>