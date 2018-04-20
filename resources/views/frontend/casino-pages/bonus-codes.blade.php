@extends('frontend.layout.master')

@section('title', 'Best NJ Online Casino Bonus Codes - ')

@section('headTag')
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
      "name": "Best NJ Online Casino Bonus Codes",
      "image": "{{ asset('img/default-logo-for-sharing.jpg') }}"
    }
  }]
}
    </script>
@endsection

@section('content')
    <?php $agent = new Jenssegers\Agent\Agent(); ?>
    @if(!$agent->isMobile())
        <div class="row">
            <div class="col-xs-12 col-md-6 m-t-20">
                <ol class="breadcrumb m-b-0">
                    <li><a href="{{ route('front-end.section.index') }}">Legal Online Gambling</a></li>
                    <li class="active">Best NJ Online Casino Bonus Codes</li>
                </ol>
            </div>
        </div>
    @endif

    <div class="online-casino-bonuses">

        <div class="headline-section">
            <h1 class="intro-text text-center">BEST NJ ONLINE CASINO BONUS CODES</h1>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="intro-description">If you&#039;re looking to join a new online casino in New Jersey, you&#039;ve come to the right place! Check below to see the best no deposit signup bonuses and first deposit bonuses available at all of the legal NJ online casinos. Claim as many no deposit bonuses right away before they go away!
                    </div>
                </div>
            </div>
        </div>

        <div class="row m-b-15">
            <div class="online-casino-bonus-codes col-md-9">
                @unless(empty($casinosWhereIn))
                    @foreach($casinosWhereIn as $casino)
                        <div class="row online-casino-bonus-codes-page m-t-15">
                            <div class="col-md-2 bonus-codes-col-1" data-mh="bonus-codes-col-match-height">
                                <div class="m-t-10">
                                    <a href="{{ route('front-end.show-casino', ['region' => \App\Casino::findOrFail($casino->id)->region->slug, 'casino' => $casino->slug]) }}"><img src="{{ Image::url(Storage::url($casino->logo), 100, 50, ['crop']) }}" class="img-responsive" alt="{{ $casino->name }} Logo"></a>
                                </div>
                            </div>

                            <div class="col-md-2 bonus-codes-col-2 text-center" data-mh="bonus-codes-col-match-height" style="padding-left: 0; padding-right: 0;">
                                <div class="dark-gray-title">Signup &amp; Get</div>

                                <div class="green-bonus-amount">{{ $casino->no_deposit_bonus }}</div>
                            </div>

                            <div class="col-md-3 bonus-codes-col-3 text-center" data-mh="bonus-codes-col-match-height" style="padding-left: 0; padding-right: 0;">
                                <div class="dark-gray-title">Deposit &amp; Get</div>

                                <div class="green-bonus-amount">{{ $casino->first_deposit_bonus }}</div>
                            </div>

                            <div class="col-md-3 bonus-codes-col-4 text-center">
                                <div class="use-code-new">
                                    <span class="top-signup-offer-text">ENTER CODE ON SIGNUP</span>
                                    {{ $casino->no_deposit_bonus_code }}
                                </div>
                            </div>

                            <div class="col-md-2 bonus-codes-col-5 text-center" data-mh="bonus-codes-col-match-height">
                                <?php $explode_permalink = explode(',', $casino->permalink); ?>
                                <a href="{{ route('front-end.visit-external', ['region' => \App\Casino::findOrFail(\App\PromoCode::findOrFail($casino->id)->casino->id)->region->slug, 'permalink' => $explode_permalink[2]]) }}"
                                        target="_blank" class="btn btn-primary">CLICK HERE TO REDEEM</a>
                            </div>
                        </div>
                    @endforeach
                @endunless

                @unless(empty($casinosWhereNotIn))
                    @foreach($casinosWhereNotIn as $casino)
                        <div class="row online-casino-bonus-codes-page m-t-15">
                            <div class="col-md-2 bonus-codes-col-1" data-mh="bonus-codes-col-match-height">
                                <div class="m-t-10">
                                    <a href="{{ route('front-end.show-casino', ['region' => \App\Casino::findOrFail($casino->id)->region->slug, 'casino' => $casino->slug]) }}"><img src="{{ Image::url(Storage::url($casino->logo), 100, 50, ['crop']) }}" class="img-responsive" alt="{{ $casino->name }} Logo"></a>
                                </div>
                            </div>

                            <div class="col-md-2 bonus-codes-col-2 text-center" data-mh="bonus-codes-col-match-height" style="padding-left: 0; padding-right: 0;">
                                <div class="dark-gray-title">Signup &amp; Get</div>

                                <div class="green-bonus-amount">{{ $casino->no_deposit_bonus }}</div>
                            </div>

                            <div class="col-md-3 bonus-codes-col-3 text-center" data-mh="bonus-codes-col-match-height" style="padding-left: 0; padding-right: 0;">
                                <div class="dark-gray-title">Deposit &amp; Get</div>

                                <div class="green-bonus-amount">{{ $casino->first_deposit_bonus }}</div>
                            </div>

                            <div class="col-md-3 bonus-codes-col-4 text-center">
                                <div class="use-code-new">
                                    <span class="top-signup-offer-text">ENTER CODE ON SIGNUP</span>
                                    {{ $casino->no_deposit_bonus_code }}
                                </div>
                            </div>

                            <div class="col-md-2 bonus-codes-col-5 text-center" data-mh="bonus-codes-col-match-height">
                                <?php $explode_permalink = explode(',', $casino->permalink); ?>
                                <a href="{{ route('front-end.visit-external', ['region' => \App\Casino::findOrFail(\App\PromoCode::findOrFail($casino->id)->casino->id)->region->slug, 'permalink' => $explode_permalink[2]]) }}"
                                        target="_blank" class="btn btn-primary">CLICK HERE TO REDEEM</a>
                            </div>
                        </div>
                    @endforeach
                @endunless
            </div>

            <div class="col-xs-12 col-md-3 right-sidebar-col">
                <div class="m-b-15">
                    @php $videoId = Youtube::parseVidFromURL('https://www.youtube.com/watch?v=IuI_ena2IdQ') @endphp
                    <iframe src="https://www.youtube.com/embed/{{ $videoId }}?rel=0&amp;controls=1&amp;showinfo=0" frameborder="0" allowfullscreen onload="resizeYouTubeIframe(this);" height="200" width="100%"></iframe>
                </div>

                <div class="span-larger-text">More Information</div>
                <div class="list-group">
                    @php $region_slug = \App\Region::where('id', 1)->get() @endphp
                    <a href="{{ route('front-end.show-parent-post', ['region' => $region_slug[0]['slug']]) }}" class="list-group-item">NJ Online Casino Reviews</a>
                    <a href="{{ route('front-end.bonus-codes', ['region' => $region_slug[0]['slug']]) }}" class="list-group-item">NJ Online Casino No Deposit Bonus Codes</a>
                    <a href="{{ route('front-end.bonus-codes', ['region' => $region_slug[0]['slug']]) }}" class="list-group-item">NJ Online Casino First Deposit Bonus Codes</a>
                    <a href="{{ route('front-end.promo-codes', ['region' => $region_slug[0]['slug']]) }}" class="list-group-item">NJ Online Casino Promo Codes</a>
                    <a href="{{ route('front-end.section.games', ['region' => $region_slug[0]['slug']]) }}" class="list-group-item">NJ Online Casino Games</a>
                    <a href="{{ route('front-end.news', ['region' => $region_slug[0]['slug']]) }}" class="list-group-item">NJ Online Casino News</a>
                </div>

                <div id="sidebar-scroll">
                    <div class="hidden-xs hidden-sm" data-spy="affix" data-offset-top="150" id="sidebar-scroll-affix">
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

                <div class="hidden-md hidden-lg">
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
        </div>

        <div class="plugin-description">
            @unless(empty($page_modules))
                @foreach($page_modules as $page_module)
                    {!! $page_module->contents !!}
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