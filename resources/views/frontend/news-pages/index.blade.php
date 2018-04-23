@extends('frontend.layout.master-for-single-page')

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
      "@id": "{{ url()->current() }}",
      "name": "New Jersey Online Casino News",
      "image": "{{ asset('img/default-logo-for-sharing.jpg') }}"
    }
  }]
}
    </script>
@endsection

@section('content')
    @php $agent = new Jenssegers\Agent\Agent(); @endphp
    @if(!$agent->isMobile())
        <div class="row">
            <div class="col-xs-12 col-md-6 m-t-20">
                <ol class="breadcrumb">
                    <li><a href="{{ route('front-end.section.index') }}">Legal Online Gambling</a></li>
                    <li class="active">NJ Online Casino News</li>
                </ol>
            </div>
        </div>
    @endif

    <div class="row">
        <div class="col-md-9 published-news">
            <div class="row">

                <div class="col-md-12 hot-news">
                    <h2>What&#039;s Hot</h2>
                </div>

                @unless(empty($featuredNews))
                    @foreach($featuredNews as $featured_news)
                        <div class="col-xs-12 col-md-6">
                            <div class="well well-sm featured-news-article">

                                <a href="{{ route('front-end.show-news', ['region' => $featured_news->region->slug, 'slug' => $featured_news->slug]) }}"><img src="{{ Image::url(Storage::url($featured_news->featured_image), 420, 250, ['crop']) }}" alt="{{ $featured_news->name }}" class="img-responsive"></a>

                                <h1 class="news-headline">
                                    <a href="{{ route('front-end.show-news', ['region' => $featured_news->region->slug, 'slug' => $featured_news->slug]) }}">{{ $featured_news->name }}</a>
                                </h1>

                                <div class="publication-info">
                                    <i class="ti-tag"></i> {{ $featured_news->category->name }}
                                    &nbsp;<i class="ti-time"></i> {{ \Carbon\Carbon::parse($featured_news->updated_at)->format('M d, Y') }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endunless
            </div>

            <div class="row">
                <div class="col-md-12 current-nj-online-casino-news">
                    <h2>Current NJ Online Casino News</h2>
                </div>
            </div>

            <div class="col-xs-12 col-md-12">
                @unless(empty($publishedNews))
                    @if($publishedNews->total() > 0)
                        @foreach($publishedNews as $news)
                            <div class="row published-news-articles">
                                <div class="col-xs-12 col-md-3 news-featured-image">
                                    <a href="{{ route('front-end.show-news', ['region' => $news->region->slug, 'slug' => $news->slug]) }}"><img src="{{ Image::url(Storage::url($news->featured_image), 230, 160, ['crop']) }}" alt="{{ $news->name }}"></a>
                                </div>

                                <div class="col-xs-12 col-md-9 news-descriptions">
                                    <h2>
                                        <a href="{{ route('front-end.show-news', ['region' => $news->region->slug, 'slug' => $news->slug]) }}">{{ $news->name }}</a>
                                    </h2>

                                    <div class="publication-info m-t-15">
                                        <i class="ti-tag"></i> {{ $news->category->name }} &nbsp;
                                        <i class="ti-time"></i> {{ \Carbon\Carbon::parse($news->updated_at)->format('M d, Y') }}
                                    </div>
                                </div>
                            </div>

                            @if($news->id % 6 === 0)
                                <?php $casinoCode = \App\Casino::with('region')->where('id', 10)->get(); ?>
                                <div class="row">
                                    @unless(empty($casinoCode))
                                        @foreach($casinoCode as $casino)
                                            <div class="get-exclusive-bonus-codes-new-card" id="claim-bonuses">
                                                <div class="exclusive-new-player-offer">Get our exclusive new player offer now!</div>
                                                <h3 class="casino-bonus-codes">{{ $casino->name }} Bonus Codes</h3>

                                                <div class="row online-casino-bonus-codes-page m-t-15">
                                                    <div class="col-xs-12 col-md-2 bonus-codes-col-1" data-mh="bonus-codes-col-match-height">
                                                        <div class="m-t-10">
                                                            <a href="{{ route('front-end.show-casino', ['region' => $casino->region->slug, 'casino' => $casino->slug]) }}"><img src="{{ Image::url(Storage::url($casino->logo), 100, 50, ['crop']) }}" class="img-responsive" alt="{{ $casino->name }} Logo"></a>
                                                        </div>
                                                    </div>

                                                    <div class="col-xs-12 col-md-2 bonus-codes-col-2 text-center" data-mh="bonus-codes-col-match-height" style="padding-left: 0; padding-right: 0;">
                                                        <div class="dark-gray-title">Signup &amp; Get</div>

                                                        <div class="green-bonus-amount">{{ $casino->no_deposit_bonus }}</div>
                                                    </div>

                                                    <div class="col-xs-12 col-md-3 bonus-codes-col-3 text-center" data-mh="bonus-codes-col-match-height" style="padding-left: 0; padding-right: 0;">
                                                        <div class="dark-gray-title">Deposit &amp; Get</div>

                                                        <div class="green-bonus-amount">{{ $casino->first_deposit_bonus }}</div>
                                                    </div>

                                                    <div class="col-xs-12 col-md-3 bonus-codes-col-4 text-center">
                                                        <div class="use-code-new">
                                                            <span class="top-signup-offer-text">ENTER CODE ON SIGNUP</span>
                                                            {{ $casino->no_deposit_bonus_code }}
                                                        </div>
                                                    </div>

                                                    <div class="col-xs-12 col-md-2 bonus-codes-col-5 text-center" data-mh="bonus-codes-col-match-height">
                                                        <?php $explode_permalink = explode(',', $casino->permalink); ?>
                                                        <a href="{{ route('front-end.visit-external', ['region' => $casino->region->slug, 'permalink' => $explode_permalink[13]]) }}" target="_blank" class="btn btn-primary">CLICK HERE TO REDEEM</a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endunless
                                </div>
                            @endif
                        @endforeach
                    @endif
                @endunless
            </div>

            {{-- Pagination --}}
            {{ $publishedNews->links('vendor/pagination/bootstrap-4') }}
        </div>

        <div class="col-xs-12 col-md-3 news-categories">
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

@section('customJS')
    <script>
        $(function () {
            $('.bonus-codes-col-match-height').matchHeight();
        });
    </script>
@endsection