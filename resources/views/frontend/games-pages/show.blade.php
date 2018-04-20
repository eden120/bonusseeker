@extends('frontend.layout.master-for-single-page')

@section('headTag')
    @php $region_slug = \App\Region::where('id', 1)->get() @endphp
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
      "@id": "{{ route('front-end.section.games', ['region' => $region_slug[0]['slug']]) }}",
      "name": "The Best Online Casino Games",
      "image": "{{ asset('img/default-logo-for-sharing.jpg') }}"
    }
  }]
}
    </script>
@endsection

@section('content')
    @unless(empty($game))
        @php $agent = new Jenssegers\Agent\Agent() @endphp
        @if(!$agent->isMobile())
            <div class="row">
                <div class="col-md-6 m-t-20">
                    <ol class="breadcrumb">
                        <li>
                            <a href="{{ route('front-end.section.index', ['region' => $region_slug[0]['slug']]) }}">Legal Online Gambling</a>
                        </li>
                        <li>
                            <a href="{{ route('front-end.section.games', ['region' => $region_slug[0]['slug']]) }}">Online Casino Games</a>
                        </li>
                        <li class="active">{{ $game->name }}</li>
                    </ol>
                </div>
            </div>
        @endif

        <div class="row show-game">
            <div class="col-md-9">
                <h1>{{ $game->name }}</h1>

                @if(!empty($game->url))
                    <iframe id="game" src="{{ $game->url }}" style="min-width: 100%; max-width: 100%; border:none; overflow: hidden; height: 70vh;" frameborder="0" scrolling="yes" onload="resizeIframe(this);" height="100%" width="100%"></iframe>

                    <script language="javascript" type="text/javascript">
                        function resizeIframe(obj) {
                            obj.style.height = obj.contentWindow.document.body.scrollHeight + 'px';
                        }
                    </script>
                @endif

                @if($game->providerId->id === 16)
                    @php $casino = \App\Casino::whereId(8)->first() @endphp
                    @unless(empty($casino))
                        <div class="get-exclusive-bonus-codes-new-card" id="claim-bonuses">
                            <div class="exclusive-new-player-offer">Get our exclusive new player offer now!</div>
                            <h3 class="casino-bonus-codes">{{ $casino->name }} Bonus Codes</h3>

                            <div class="row online-casino-bonus-codes-page m-t-15">
                                <div class="col-xs-12 col-md-2 bonus-codes-col-1"
                                     data-mh="bonus-codes-col-match-height">
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
                                    <a href="{{ route('front-end.visit-external', ['region' => $region_slug[0]['slug'], 'permalink' => $explode_permalink[10]]) }}" target="_blank" class="btn btn-primary">CLICK HERE TO REDEEM</a>
                                </div>
                            </div>
                        </div>
                    @endunless

                @elseif($game->providerId->id === 15)
                    @php $casino = \App\Casino::where('id', 8)->first() @endphp
                    @unless(empty($casino))
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

                                <div class="col-xs-12 col-md-2 bonus-codes-col-5 text-center"
                                     data-mh="bonus-codes-col-match-height">
									<?php $explode_permalink2 = explode(',', $casino->permalink); ?>
                                    <a href="{{ route('front-end.visit-external', ['region' => $region_slug[0]['slug'], 'permalink' => $explode_permalink2[10]]) }}" target="_blank" class="btn btn-primary">CLICK HERE TO REDEEM</a>
                                </div>
                            </div>
                        </div>
                    @endunless

                @elseif(!$game->providerId->id === 15 || 16)
                    @php $casino = \App\Casino::where('id', 8)->first() @endphp
                    @unless(empty($casino))
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
									<?php $explode_permalink3 = explode(',', $casino->permalink); ?>
                                    <a href="{{ route('front-end.visit-external', ['region' => $region_slug[0]['slug'], 'permalink' => $explode_permalink3[10]]) }}" target="_blank" class="btn btn-primary">CLICK HERE TO REDEEM</a>
                                </div>
                            </div>
                        </div>
                    @endunless
                @endif

                <h4 class="bold-700">{{ $game->name }} Game Description:</h4>
                {!! $game->description !!}
            </div>

            <div class="col-md-3 right-sidebar-col">
                <ul class="list-group">
                    <li class="list-group-item bold-700">{{ $game->name }}</li>
                    <li class="list-group-item text-center">
                        <img src="{{ Image::url(Storage::url($game->logo), 240, 160) }}" alt="{{ $game->name }} Logo" class="img-rounded">
                    </li>
                    <li class="list-group-item"><strong>Provider:</strong> {{ $game->providerId->name }}
                    </li>
                    <li class="list-group-item">
                        <strong>Game Category:</strong> {{ $game->categoryId->name }}</li>
                    <li class="list-group-item">
                        <strong>Game Subcategory:</strong> {{ $game->subcategoryId->name }}</li>
                    <li class="list-group-item">
                        <strong>Status:</strong> @if($game->is_active === 1) {{ 'Active' }} @endif</li>
                </ul>

                <div class="m-b-15">
                    <select class="selectpicker" data-live-search="true" title="Search Games" onchange="location = this.value;">
                        @unless(empty($games))
                            @foreach($games as $game)
                                <option value="{{ route('front-end.section.show-game', ['slug' => $game->slug]) }}">{{ $game->name }}</option>
                            @endforeach
                        @endunless
                    </select>
                </div>

                <div class="m-b-15">
                    <select class="selectpicker" data-live-search="true" title="Game Categories" onchange="location = this.value;">
                        @unless(empty($categories))
                            @foreach($categories as $category)
                                <option value="{{ route('front-end.section.game-categories', ['slug' => $category->slug])  }}">{{ $category->name }}</option>
                            @endforeach
                        @endunless
                    </select>
                </div>

                <div class="m-b-15">
                    <select class="selectpicker" data-live-search="true" title="Game Providers" onchange="location = this.value;">
                        @unless(empty($providers))
                            @foreach($providers as $provider)
                                <option value="{{ route('front-end.section.game-providers', ['slug' => $provider->slug]) }}">{{ $provider->name }}</option>
                            @endforeach
                        @endunless
                    </select>
                </div>

                <div class="right-sidebar-h1 span-larger-text">More Information</div>
                <div class="list-group">
                    <a href="{{ route('front-end.show-parent-post', ['region' => $region_slug[0]['slug']]) }}" class="list-group-item">NJ Online Casino Reviews</a>
                    <a href="{{ route('front-end.bonus-codes', ['region' => $region_slug[0]['slug']]) }}" class="list-group-item">NJ Online Casino No Deposit Bonus Codes</a>
                    <a href="{{ route('front-end.bonus-codes', ['region' => $region_slug[0]['slug']]) }}" class="list-group-item">NJ Online Casino First Deposit Bonus Codes</a>
                    <a href="{{ route('front-end.promo-codes', ['region' => $region_slug[0]['slug']]) }}" class="list-group-item">NJ Online Casino Promo Codes</a>
                    <a href="{{ route('front-end.section.games', ['region' => $region_slug[0]['slug']]) }}" class="list-group-item">NJ Online Casino Games</a>

                    <a href="{{ route('front-end.news', ['region' => $region_slug[0]['slug']]) }}" class="list-group-item">NJ Online Casino News</a>
                </div>

                <div class="right-sidebar-h1 span-larger-text">Special Offers</div>

                @unless(empty($casinoSpecialOffers))
                    @foreach($casinoSpecialOffers as $casinoSpecialOffer)
                        <div class="media right-sidebar-offered-casinos">
                            <div class="media-left media-middle">
                                <a href="{{ $casinoSpecialOffer->cta_link }}" target="_blank">
                                    <img class="media-object" src="{{ Image::url(Storage::url($casinoSpecialOffer->logo), 60) }}" alt="{{ $casinoSpecialOffer->cta_text }}"></a>
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
    @endunless

    <div class="row footer-game-collections">
        <div class="play-all-games-footer text-center">Click Any Game To Play Now For Free</div>

        @unless(empty($games))
            @foreach($games as $game)
                <div class="col-sm-3">
                    <div class="list-group">
                        <a href="{{ route('front-end.section.show-game', ['slug' => $game->slug]) }}" class="list-group-item" style="font-size: .825em;">{{ $game->name }}</a>
                    </div>
                </div>
            @endforeach
        @endunless
    </div>
@endsection

@section('customJS')
    <script>
        $(function() {
            $('.bonus-codes-col-match-height').matchHeight();
        });
    </script>
@endsection