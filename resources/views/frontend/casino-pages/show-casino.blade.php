@extends('frontend.layout.master-for-single-page')

@section('headTag')
    @unless(empty($getOperator))
        @php $ratings = [$getOperator->editors_review_casino_bonus, $getOperator->editors_review_game_selection, $getOperator->editors_review_support, $getOperator->editors_review_banking]; @endphp

        <script type="application/ld+json">
{
    "@context": "http://schema.org",
    "@type": "Review",
    "author": {
        "@type": "Person",
        "name": "{{ $settings->name }}" {{-- "sameAs": "https://plus.google.com/114108465800532712602"--}}
            },
            "url": "{{ route('front-end.show-casino', ['region' => $getOperator->region->slug, 'casino' => $getOperator->slug]) }}",
    "datePublished": "{{ $getOperator->created_at->toW3CString() }}",
    "publisher": {
        "@type": "Organization",
        "name": "{{ $settings->name }}",
        "sameAs": "{{ route('front-end.section.index') }}"
    },
    "description": "{{ $getOperator->seo_description }}",
    "inLanguage": "en",
    "itemReviewed": {
        "@type": "LocalBusiness",
        "name": "{{ $getOperator->name }}",
        "sameAs": "{{ $getOperator->website }}",
        "image": "{{ url(Storage::url($getOperator->logo)) }}",
        "priceRange": "$$$",
        "address":"@if(!empty($getOperator->website)){{ $getOperator->website }}@else{{ 'No address available.' }}@endif",
    "telephone":"@if(!empty($getOperator->phone)){{ $getOperator->phone }}@else{{ 0000000000 }}@endif"
    },
    "reviewRating": {
        "@type": "Rating",
        "worstRating":"1",
        "ratingValue": "@if(round(array_sum($ratings) / 4, 2) < 1) {{ 1 }}@else{{ round(array_sum($ratings) / 4, 2) }}@endif",
        "bestRating":"5"
    }
}
        </script>

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
    }, {
        "@type": "ListItem",
        "position": 2,
        "item": {
            "@id": "{{ route('front-end.show-parent-post', ['region' => $getOperator->region->slug]) }}",
            "name": "Legal Online Gambling",
            "image": "{{ asset('img/default-logo-for-sharing.jpg') }}"
        }
    }]
}, {
    "@type": "ListItem",
    "position": 3,
    "item": {
        "@id": "{{ route('front-end.show-casino', ['region' => $getOperator->region->slug, 'casino' => $getOperator->slug]) }}",
        "name": "{{ $getOperator->name }}",
        "image": "{{ url(Storage::url($getOperator->logo)) }}"
    }
}
        </script>
    @endunless
@endsection

@section('content')
    @unless(empty($getOperator))
        @php $agent = new Jenssegers\Agent\Agent(); @endphp
        @if(!$agent->isMobile())
            <div class="row">
                <div class="col-sm-12 col-md-9 m-t-15">
                    <ol class="breadcrumb m-b-10">
                        <li><a href="{{ route('front-end.section.index') }}">Legal Online Gambling</a></li>
                        <li>
                            <a href="{{ route('front-end.show-parent-post', ['region' => $getOperator->region->slug]) }}">{{ $getOperator->region->name }}</a>
                        </li>
                        <li class="active">{{ $getOperator->name }}</li>
                    </ol>
                </div>
            </div>
        @endif

        @php $explode_permalink = explode(',', $getOperator->permalink) @endphp

        @php $no_deposit_bonus = preg_replace('/free|Free|FREE/', '', $getOperator->no_deposit_bonus); $first_deposit_bonus = preg_replace('/free|Free|FREE/', '', $getOperator->first_deposit_bonus) @endphp

        @if(!$agent->isMobile())
            <div class="operator-top-floating-banner-anchor">
                <a href="{{ route('front-end.visit-external', ['region' => $getOperator->region->slug, 'permalink' => $explode_permalink[10]]) }}" target="_blank">
                    <div class="operator-top-floating-banner" data-spy="affix" data-offset-top="100">
                        <div class="row">
                            <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7" data-mh="floating-banner-col">
                                <div class="floating-banner-text-desktop">
                                    <div class="floating-banner-text-desktop-col-1">
                                        <img src="{{ Image::url(Storage::url($getOperator->logo), 166,87.5) }}" alt="{{ $getOperator->name }} Logo" class="img-circle operator-logo-rounded" height="70">&nbsp;&nbsp;&nbsp;

                                        <span>{{ $getOperator->name }}</span>
                                    </div>

                                    <div class="floating-banner-text-desktop-col-2">
                                        <img src="{{ Cdn::asset('img/os-icons.png') }}" alt="OS Icons" height="30">
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5 floating-banner-button-desktop text-center" data-mh="floating-banner-col">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 floating-banner-button-desktop-text" data-mh="floating-banner">
                                        {{ $getOperator->no_deposit_bonus_amount }} <span>Free Signup Bonus</span>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 floating-banner-desktop-cta-button" data-mh="floating-banner">
                                        <a href="{{ route('front-end.visit-external', ['region' => $getOperator->region->slug, 'permalink' => $explode_permalink[10]]) }}" class="btn btn-primary" target="_blank">Play Now
                                            &nbsp;<i class="ti-new-window"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endif

        <div class="single-page-operator-container">
            <div class="operator-container-top-section">
                <h1>{{ $getOperator->name }}</h1>

                <div class="row oc-col-12">
                    <div class="col-xs-12 col-sm-6 col-md-4 oc-col-first text-center">
                        <div class="oc-col-first-box">
                            <a href="{{ route('front-end.visit-external', ['region' => $getOperator->region->slug, 'permalink' => $explode_permalink[7]]) }}" target="_blank"><img src="{{ Image::url(Storage::url($getOperator->logo), 160) }}" alt="{{ $getOperator->name }} Logo"></a>

                            <div class="oc-divider"></div>

                            <div class="oc-col-first-bonus-text">Free Signup Bonus: <span>{{ $no_deposit_bonus }}</span>
                            </div>

                            <div class="oc-col-first-bonus-text">First Deposit Bonus:
                                <span>{{ $first_deposit_bonus }}</span></div>

                            <strong>USE CODE ON SIGNUP</strong>
                            <div class="operator-get-bonus-code">
                                <div class="casino-tbl-use-code-new">
                                    {{ $getOperator->no_deposit_bonus_code }}
                                </div>
                            </div>

                            <a href="{{ route('front-end.visit-external', ['region' => $getOperator->region->slug, 'permalink' => $explode_permalink[6]]) }}" class="oc-success-button" target="_blank">Play Now</a>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6 col-md-5 oc-col-second">
                        <strong>Here&#039;s Why We Like Them</strong>

                        <div class="special-features">
                            {!! $getOperator->special_features !!}
                        </div>

                        <div class="oc-divider"></div>

                        {{-- Available Payment Methods --}}
                        @include('frontend.casino-pages.show-single-operator.payment-methods')
                    </div>

                    <div class="col-xs-12 col-sm-6 col-md-3 oc-col-third">
                        @php $ratings = [$getOperator->editors_review_casino_bonus, $getOperator->editors_review_game_selection, $getOperator->editors_review_support, $getOperator->editors_review_banking] @endphp

                        <div class="oc-rating-box">
                            <div class="row oc-rating-box-row">
                                <div class="col-xs-12 col-md-7 oc-overall-rating">Overall Rating</div>

                                <div class="col-xs-12 col-md-5 oc-overall-rating-value">
                                    <span class="oc-overall-rating-amount">{{ round(array_sum($ratings) / 4, 2) }}
                                        <span>/ 5</span></span></div>
                            </div>
                        </div>

                        <div class="oc-rating-box">
                            <div class="row oc-rating-box-row">
                                <div class="col-xs-6 col-md-6">Casino Bonus</div>
                                <div class="col-xs-6 col-md-6 oc-rating-box-row-col-2">
                                    <input id="ratings" value="{{ $getOperator->editors_review_casino_bonus }}" class="rating" data-min="0" data-max="5" data-step="0.1" data-display-only="true" data-size="xs" title="{{ $getOperator->editors_review_casino_bonus }}">
                                </div>
                            </div>

                            <div class="row oc-rating-box-row">
                                <div class="col-xs-6 col-md-6">Game Selection</div>
                                <div class="col-xs-6 col-md-6 oc-rating-box-row-col-2">
                                    <input id="ratings" value="{{ $getOperator->editors_review_game_selection }}" class="rating" data-min="0" data-max="5" data-step="0.1" data-display-only="true" data-size="xs">
                                </div>
                            </div>

                            <div class="row oc-rating-box-row">
                                <div class="col-xs-6 col-md-6">Support</div>
                                <div class="col-xs-6 col-md-6 oc-rating-box-row-col-2">
                                    <input id="ratings" value="{{ $getOperator->editors_review_support }}" class="rating" data-min="0" data-max="5" data-step="0.1" data-display-only="true" data-size="xs">
                                </div>
                            </div>

                            <div class="row oc-rating-box-row">
                                <div class="col-xs-6 col-md-6">Banking</div>
                                <div class="col-xs-6 col-md-6 oc-rating-box-row-col-2">
                                    <input id="ratings" value="{{ $getOperator->editors_review_banking }}" class="rating" data-min="0" data-max="5" data-step="0.1" data-display-only="true" data-size="xs">
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Available Game Types --}}
                    @include('frontend.casino-pages.show-single-operator.game-types')
                </div>
            </div>
        </div>

        <div class="show-operator-container">
            <div class="row">
                <div class="col-md-9 left-operator-container" id="operator-short-description">
                    <div class="row m-b-15">
                        <div class="col-md-7">
                            <div id="slider">
                                <div class="row">
                                    <div class="col-md-12" id="carousel-bounding-box">
                                        <div class="carousel slide" id="myCarousel" data-ride="carousel" data-interval="86400" role="listbox">
                                            <div class="carousel-inner">
                                                <div class="item active" data-slide-number="0">
                                                    <div class="embed-responsive embed-responsive-4by3">
                                                        @if($getOperator->video !== NULL)
                                                            @php $videoId = Youtube::parseVidFromURL($getOperator->video) @endphp

                                                            <iframe width="560" height="315" src="https://www.youtube.com/embed/{{ $videoId }}?rel=0&amp;showinfo=0" frameborder="0"></iframe>
                                                        @endif
                                                    </div>
                                                </div>

                                                @unless(empty($operatorSliders))
                                                    @foreach($operatorSliders as $operatorSlider)
                                                        <div class="item" data-slide-number="{{ $loop->iteration }}">
                                                            <img src="{{ Image::url(Storage::url($operatorSlider->slider_image), 481, 279, ['crop']) }}" class="img-responsive">
                                                        </div>
                                                    @endforeach
                                                @endunless
                                            </div>
                                            <!-- Carousel nav -->
                                            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                                                <span class="glyphicon glyphicon-chevron-left"></span> </a>
                                            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                                                <span class="glyphicon glyphicon-chevron-right"></span> </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5" id="slider-thumbs">
                            <ul class="hide-bullets">
                                @if($getOperator->video !== NULL)
                                    @php $videoId = Youtube::parseVidFromURL($getOperator->video) @endphp
                                    <li class="col-xs-6 col-sm-4 col-md-6" data-target="#myCarousel" data-slide-to="0">
                                        <a id="carousel-selector-0">
                                            <img src="https://img.youtube.com/vi/{{ $videoId }}/default.jpg" height="100" class="img-thumbnail">
                                        </a>
                                    </li>
                                @endif

                                @unless(empty($operatorSliders))
                                    @foreach($operatorSliders as $operatorSlider)
                                        <li class="col-xs-6 col-sm-4 col-md-6" data-target="#myCarousel" data-slide-to="{{ $loop->iteration }}">
                                            <a id="carousel-selector-{{ $loop->iteration }}"><img class="img-thumbnail" src="{{ Image::url(Storage::url($operatorSlider->slider_image), 150, 100) }}"></a>
                                        </li>
                                    @endforeach
                                @endunless
                            </ul>
                        </div>
                    </div>

                    <div>
                        <a href="{{ route('front-end.visit-external', ['region' => $getOperator->region->slug, 'permalink' => $explode_permalink[6]]) }}" class="oc-success-button-large" target="_blank">Play at {{ $getOperator->name }} Now!</a>
                    </div>

                    <hr>

                    <div class="oc-summary">
                        <h2 class="operator-headline-section">{{ $getOperator->name }} Summary</h2>
                        {!! $getOperator->short_summary !!}

                        {!! $getOperator->summary !!}
                    </div>

                    {{-- Promo Codes --}}
                    <div class="operator-promo-codes" id="operator-promo-codes">
                        <h2>{{ $getOperator->name }} Promo Codes</h2>

                        @unless(empty($promoCodes))
                            @foreach($promoCodes as $promoCode)
                                @if($promoCode->end_date > \Carbon\Carbon::now())
                                    <div class="col-xs-12 col-sm-12 col-md-12 operator-promo-codes-col-2">
                                        <div class="col-xs-12 col-sm-6 col-md-3 operator-promo-code-thumbnail">
                                            <div class="operator-promo-code-img-thumb">
                                                <a href="{{ route('front-end.show-promo', ['region' => $promoCode->casino->region->slug, 'slug' => $promoCode->slug]) }}"><img src="{{ Image::url(Storage::url($promoCode->banner), 250, 125) }}" class="img-responsive" alt="{{ $promoCode->name }}"></a>
                                            </div>

                                            <div class="operator-promo-code-type">{{ $promoCode->promoType->name }}</div>
                                        </div>

                                        <div class="col-xs-12 col-sm-6 col-md-9 operator-promo-code-description">
                                            <div class="row operator-promo-code-duration">
                                                <div class="col-xs-12 col-md-7">
                                                    <div class="operator-promo-name">
                                                        <h3>
                                                            <a href="{{ route('front-end.show-promo', ['region' => $promoCode->casino->region->slug, 'slug' => $promoCode->slug]) }}">{{ $promoCode->name }}</a>
                                                        </h3>
                                                    </div>

                                                    <div class="row operator-promo-code-name-and-expiry">
                                                        <div class="col-xs-12 col-md-8">
                                                            <p>
                                                                Starts: {{ \Carbon\Carbon::parse($promoCode->start_date)->format('d M, Y') }}</p>

                                                            <p>
                                                                Expires: @php $startDate = \Carbon\Carbon::parse($promoCode->start_date); $endDate = \Carbon\Carbon::parse($promoCode->end_date); $daysLeft = $endDate->diffInDays($startDate); @endphp {{ \Carbon\Carbon::parse($promoCode->end_date)->format('d M, Y') }}</p>

                                                            <p>
                                                                <a href="{{ route('front-end.show-casino', ['region' => $promoCode->casino->region->slug, 'casino' => $promoCode->casino->slug]) }}" style="font-style: italic;">{{ $promoCode->casino->name }} Promo Codes</a>
                                                            </p>
                                                        </div>

                                                        <div class="col-xs-12 col-md-4 text-right">
                                                            <h2 class="operator-promo-prize-amount">
                                                                <span><i class="ti-gift"></i> Prize</span> {{ $promoCode->max_promo_amount }}
                                                            </h2>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-xs-12 col-md-5 operator-promo-codes-col-3 text-right">
                                                    <a href="{{ route('front-end.show-casino', ['region' => $promoCode->casino->region->slug, 'casino' => $promoCode->casino->slug]) }}"><img src="{{ Image::url(Storage::url($promoCode->casino->logo), 120, 60, ['crop']) }}" alt="{{ $promoCode->casino->name }}" style="padding: 0 0 6px 0;"></a>

                                                    <div class="merge-btn">
                                                        <a target="_blank" href="{{ route('front-end.show-promo', ['region' => $promoCode->casino->region->slug, 'slug' => $promoCode->slug]) }}" class="casino-tbl-cta-btn merge-left">GET PROMO CODE</a><a target="_blank" href="{{ route('front-end.show-promo', ['region' => $promoCode->casino->region->slug, 'slug' => $promoCode->slug]) }}" class="merge-right"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @endunless
                    </div>

                    <div class="row m-b-15"></div>

                    @unless(empty($getOperator->cont_software))
                        <h2 class="operator-headline-section">{{ $getOperator->name }} Software</h2>
                        <div class="operator-contents-container">{!! $getOperator->cont_software !!}</div>
                    @endunless

                    @unless(empty($getOperator->cont_mobile_app))
                        <h2 class="operator-headline-section">{{ $getOperator->name }} Mobile App</h2>

                        @if(NULL !== $getOperator->ios_link || NULL !== $getOperator->play_store_link)
                            <div class="row">
                                <div class="operator-contents-container col-md-10">{!! $getOperator->cont_mobile_app !!}</div>
                                <div class="col-md-2">
                                    @unless(empty($getOperator->ios_link))
                                        <div class="text-right m-b-10">
                                            <a href="{{ $getOperator->ios_link }}"><img src="{{ Cdn::asset('img/app-store.png') }}" alt="App Store Badge" class="img-responsive"></a>

                                        </div>
                                    @endunless

                                    @unless(empty($getOperator->play_store_link))
                                        <div class="text-right">
                                            <a href="{{ $getOperator->play_store_link }}"><img src="{{ Cdn::asset('img/google-play-badge.png') }}" alt="Google Play Badge" class="img-responsive"></a>
                                        </div>
                                    @endunless
                                </div>
                            </div>
                        @else
                            <div class="operator-contents-container">{!! $getOperator->cont_mobile_app !!}</div>
                        @endif
                    @endunless

                    @unless(empty($getOperator->cont_network_partners))
                        <h2 class="operator-headline-section">{{ $getOperator->name }} Network Partners</h2>

                        <div class="media">
                            <div class="media-body">
                                {!! $getOperator->cont_network_partners !!}
                            </div>
                            <div class="media-right">
                                <a href="{{ route('front-end.show-casino', ['region' => $getOperator->region->slug, 'casino' => $getOperator->slug]) }}">
                                    <img class="media-object" src="{{ Image::url(Storage::url($getOperator->logo)) }}" alt="{{ $getOperator->name }}" width="175">
                                </a>
                            </div>
                        </div>
                    @endunless

                    @unless(empty($getOperator->cont_game_selection))
                        <h2 class="operator-headline-section">{{ $getOperator->name }} Game Selection</h2>
                        <div class="operator-contents-container">{!! $getOperator->cont_game_selection !!}</div>
                    @endunless

                    @unless(empty($getOperator->cont_vip_program))
                        <h2 class="operator-headline-section">{{ $getOperator->name }} VIP Program</h2>
                        <div class="operator-contents-container">{!! $getOperator->cont_vip_program !!}</div>
                    @endunless

                    @unless(empty($getOperator->cont_deposit_methods))
                        <h2 class="operator-headline-section">{{ $getOperator->name }} Deposit Methods</h2>
                        <div class="operator-contents-container">{!! $getOperator->cont_deposit_methods !!}</div>
                    @endunless

                    @unless(empty($getOperator->cont_customer_support))
                        <h2 class="operator-headline-section">{{ $getOperator->name }} Customer Support</h2>
                        <div class="operator-contents-container">{!! $getOperator->cont_customer_support !!}</div>
                    @endunless

                    @unless(empty($getOperator->cont_background))
                        <h2 class="operator-headline-section">{{ $getOperator->name }} Background</h2>
                        <div class="operator-contents-container">{!! $getOperator->cont_background !!}</div>
                    @endunless

                    {{-- Casino Games --}}
                    <div class="games-available-for-operators" id="games-available-for-operators">
                        @php $getOperatorGames = \App\Game::where('provider_id', $getOperator->game_provider_id)->orderBy('updated_at', 'desc')->take(10)->get() @endphp
                        @unless(empty($getOperatorGames))

                            <h2>Popular Games at {{ $getOperator->name }}</h2>

                            @foreach($getOperatorGames as $getOperatorGame)
                                <div class="col-xs-12 col-md-6 games-container">
                                    <div class="row">
                                        <div class="col-xs-6 col-md-4 gc-col-first" data-mh="games-container">
                                            <a href="{{ route('front-end.section.show-game', ['slug' => $getOperatorGame->slug]) }}">
                                                <img src="{{ Image::url(Storage::url($getOperatorGame->logo), 130, 35, ['crop']) }}" alt="{{ $getOperatorGame->name }}"></a>
                                        </div>

                                        <div class="col-xs-6 col-md-8 gc-col-second" data-mh="games-container">
                                            <a href="{{ route('front-end.section.show-game', ['slug' => $getOperatorGame->slug]) }}">{{ $getOperatorGame->name }}</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endunless
                    </div>

                    <div class="operator-platform-review" id="operator-platform-review">
                        <h2>{{ $getOperator->name }} Platform Information</h2>

                        <table class="table table-bordered">
                            <tbody>
                            <tr>
                                <td>Established</td>
                                <td>{{ $getOperator->established }}</td>
                            </tr>

                            <tr>
                                <td>Software</td>
                                <td>{{ $getOperator->software }}</td>
                            </tr>

                            <tr>
                                <td>Awards</td>
                                <td>{{ $getOperator->awards }}</td>
                            </tr>

                            <tr>
                                <td>Deposit Methods</td>
                                <td>{{ $getOperator->cashiering_deposit_methods }}</td>
                            </tr>

                            <tr>
                                <td>Minimum Deposit</td>
                                <td>{{ $getOperator->cashiering_minimum_deposit }}</td>
                            </tr>

                            <tr>
                                <td>Withdrawal Methods</td>
                                <td>{{ $getOperator->cashiering_withdrawal_methods }}</td>
                            </tr>

                            <tr>
                                <td>Minimum Withdrawal</td>
                                <td>{{ $getOperator->cashiering_minimum_withdrawal }}</td>
                            </tr>

                            <tr>
                                <td>Live Chat</td>
                                <td>@if($getOperator->live_chat === 1)
                                        {{ 'Yes' }}
                                    @elseif($getOperator->live_chat === 0)
                                        {{ 'No' }}
                                    @endif
                                </td>
                            </tr>

                            <tr>
                                <td>E-Mail</td>
                                <td><a href="mailto:{{ $getOperator->email }}">{{ $getOperator->email }}</a>
                                </td>
                            </tr>

                            <tr>
                                <td>Phone</td>
                                <td>{{ $getOperator->phone }}</td>
                            </tr>

                            <tr>
                                <td>Website</td>
                                <td>@unless(empty($getOperator->website))
                                        <a href="{{ $getOperator->website }}" target="_blank">Visit Website</a> @endunless
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                    {{-- Operator Play Now --}}
                    <div class="text-center">
                        <a href="{{ route('front-end.visit-external', ['region' => $getOperator->region->slug, 'permalink' => $explode_permalink[7]]) }}" target="_blank"><img src="{{ Image::url(Storage::url($getOperator->logo), 262) }}" alt="{{ $getOperator->name }} Logo" height="100"></a>

                        <div class="merge-btn m-t-10">
                            <a target="_blank" href="{{ route('front-end.visit-external', ['region' => $getOperator->region->slug, 'permalink' => $explode_permalink[7]]) }}" class="casino-tbl-cta-btn merge-left">PLAY NOW</a><a target="_blank" href="{{ route('front-end.visit-external', ['region' => $getOperator->region->slug, 'permalink' => $explode_permalink[7]]) }}" class="merge-right"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
                        </div>
                    </div>

                </div>

                <div class="col-md-3 right-operator-container">
                    <div class="list-group">
                        <a href="#operator-short-description" class="list-group-item list-group-item-action">About {{ $getOperator->name }}</a>
                        <a href="#operator-promo-codes" class="list-group-item list-group-item-action">{{ $getOperator->name }} Promo Codes</a>
                        <a href="#games-available-for-operators" class="list-group-item list-group-item-action">{{ $getOperator->name }} Popular Games</a>
                        <a href="#operator-platform-review" class="list-group-item list-group-item-action">{{ $getOperator->name }} Platform Review</a>
                    </div>
                </div>
            </div>
        </div>

        @if($agent->isMobile())
            <div class="navbar navbar-fixed-bottom floating-banner-for-mobile">
                <div class="row text-center">
                    <div class="col-xs-7 floating-banner-text" data-mh="games-container">{{ $getOperator->no_deposit_bonus_amount }}
                        <span>Free Signup Bonus</span></div>

                    <div class="col-xs-5 floating-banner-button" data-mh="games-container">
                        <a href="{{ route('front-end.visit-external', ['region' => $getOperator->region->slug, 'permalink' => $explode_permalink[11]]) }}" class="btn btn-primary">Play Now
                            <i class="ti-new-window"></i></a></div>
                </div>
            </div>
        @endif
    @endunless
@endsection

@section('customJS')
    <script>
        $(function() {
            $('.games-container').matchHeight();
        });

        $(function() {
            $('.floating-banner-col').matchHeight();
        });

        $(function() {
            $('.floating-banner').matchHeight();
        });
    </script>
@endsection