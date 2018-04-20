@extends('frontend.layout.master')

@section('headTag')
    <?php $region_slug = \App\Region::where('id', 1)->get(); ?>
    <script type="application/ld+json">
{
  "@context": "http://schema.org",
  "@type": "BreadcrumbList",
  "itemListElement": [{
    "@type": "ListItem",
    "position": 1,
    "item": {
      "@id": "{{ url('/') }}",
      "name": "{{ $settings->name }}",
      "image": "{{ asset('img/default-logo-for-sharing.jpg') }}"
    }
  },{
    "@type": "ListItem",
    "position": 2,
    "item": {
      "@id": "{{ route('front-end.news', ['region' => $region_slug[0]['slug']]) }}",
      "name": "New Jersey Online Casino News",
      "image": "{{ asset('img/default-logo-for-sharing.jpg') }}"
    }
  }]
}
    </script>
@endsection

@section('content')
    @unless(empty($news))
        @php $agent = new Jenssegers\Agent\Agent() @endphp
        @if(!$agent->isMobile())
            <div class="row">
                <div class="col-md-12 m-t-20">
                    <ol class="breadcrumb">
                        <li><a href="{{ route('front-end.section.index') }}">Legal Online Gambling</a></li>
                        <li>
                            <a href="{{ route('front-end.news', ['region' => $region_slug[0]['slug']]) }}">NJ Online Casino News</a>
                        </li>
                        <li class="active">{{ $news->name }}</li>
                    </ol>
                </div>
            </div>
        @endif

        <div class="row">
            <div class="col-md-9 show-news-article">
                <div class="publication-info">
                    <i class="ti-tag"></i> {{ $news->category->name }}
                </div>

                <div class="m-b-15 featured-image">
                    <img src="{{ Image::url(Storage::url($news->featured_image), 850, 480, ['crop']) }}"
                            alt="{{ $news->name }}">
                </div>

                <div class="page-headline">
                    <h1>{{ $news->name }}</h1>
                </div>

                <div class="publication-info m-t-10">
                    <i class="ti-time"></i> {{ \Carbon\Carbon::parse($news->updated_at)->format('M d, Y') }}
                </div>

                <div class="news-contents">
                    {!! $news->news_content !!}
                </div>
            </div>
            @endunless

            <div class="col-md-3 news-categories">
                <div class="span-larger-text">News Categories</div>

                <div class="list-group">
                    @unless(empty($categories))
                        @foreach($categories as $category)
                            <a href="{{ route('front-end.news', ['region' => $region_slug[0]['slug']]) }}" class="list-group-item">{{ $category }}</a>
                        @endforeach
                    @endunless
                </div>

                <div class="span-larger-text">More Information</div>
                <div class="list-group">
                    <a href="{{ route('front-end.show-parent-post', ['region' => $region_slug[0]['slug']]) }}" class="list-group-item">NJ Online Casino Reviews</a>
                    <a href="{{ route('front-end.bonus-codes', ['region' => $region_slug[0]['slug']]) }}" class="list-group-item">NJ Online Casino No Deposit Bonus Codes</a>
                    <a href="{{ route('front-end.bonus-codes', ['region' => $region_slug[0]['slug']]) }}" class="list-group-item">NJ Online Casino First Deposit Bonus Codes</a>
                    <a href="{{ route('front-end.promo-codes', ['region' => $region_slug[0]['slug']]) }}" class="list-group-item">NJ Online Casino Promo Codes</a>
                    <a href="{{ route('front-end.section.games', ['region' => $region_slug[0]['slug']]) }}" class="list-group-item">NJ Online Casino Games</a>
                    <a href="{{ route('front-end.news', ['region' => $region_slug[0]['slug']]) }}" class="list-group-item">NJ Online Casino News</a>
                </div>

                <div class="span-larger-text">Special Offers</div>

                @unless(empty($casinoSpecialOffers))
                    @foreach($casinoSpecialOffers as $casinoSpecialOffer)
                        <div class="media right-sidebar-offered-casinos">
                            <div class="media-left media-middle">
                                <a href="{{ $casinoSpecialOffer->cta_link }}" target="_blank">
                                    <img class="media-object" src="{{ Image::url(Storage::url($casinoSpecialOffer->logo), 60) }}" alt="{{ $casinoSpecialOffer->cta_text }}">
                                </a>
                            </div>
                            <div class="media-body media-middle">
                                <div class="media-heading">
                                    <a href="{{ $casinoSpecialOffer->cta_link }}" target="_blank">{{ $casinoSpecialOffer->cta_text }}</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endunless
            </div>
        </div>
@endsection