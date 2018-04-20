@extends('frontend.layout.master')

@section('headTag')
    @unless(empty($getRegion))
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
            "@id": "{{ url()->current() }}",
            "name": "{{ $getRegion->name }}",
            "image": "{{ asset('img/default-logo-for-sharing.jpg') }}"
        }
    }]
}
        </script>
    @endunless
@endsection

@section('content')
    @unless(empty($getRegion))
        <div class="row online-casinos">
            <div class="intro-text-and-description">
                <h1 class="intro-text text-center">{{ $getRegion->name }}</h1>
            </div>

            <div class="col-md-12">{!! $getRegion->region_contents_top !!}</div>
        </div>
    @endunless

    <div class="row index-page-best-online-casinos p-t-15 m-b-15">
        @php $agent = new Jenssegers\Agent\Agent(); @endphp
        @if(!$agent->isMobile())
            <div class="row index-page-best-online-casino-card-header-2 bold-700">
                <div class="col-xs-12 col-sm-4 col-md-3 index-page-best-online-casino-col-1 text-center">Casino</div>

                <div class="col-xs-12 col-sm-4 col-md-2 index-page-best-online-casino-col-2 text-center">Rating</div>

                <div class="col-xs-12 col-sm-4 col-md-2 index-page-best-online-casino-col-3">Bonus</div>

                <div class="col-xs-12 col-sm-4 col-md-2 index-page-best-online-casino-col-4 text-center">Code</div>

                <div class="col-xs-12 col-sm-4 col-md-3 index-page-best-online-casino-col-5 text-center">Play</div>
            </div>
        @endif

        @php $casinosForBingo = \App\Casino::with('region')->whereIn('id', [8, 4, 6])->orderByRaw('IF(id = 8, 4, 6)')->orderBy('id')->get();

        /* This is a custom modification for showing filtered casinos. The whereIn variable search and lists the casinos by custom filter. And the whereNotIn exclude the filtered casinos so that it will never repeat again. */
        $casinosWhereIn = App\Casino::with('region')->whereIn('id', [5, 10, 3, 8, 1])->orderByRaw(\Illuminate\Support\Facades\DB::raw('FIELD(id, 5, 10, 3, 8, 1)'))->where(['region_id' => 1, 'is_active' => 1])->orderBy('id')->get();

        $casinosWhereNotIn = App\Casino::with('region')->whereNotIn('id', [5, 10, 3, 8, 1])->orderBy('sort_by')->where(['region_id' => 1, 'is_active' => 1])->get();
        @endphp

        @if(Request::is('free-online-bingo-in-nj'))
            @if(!$agent->isMobile())
                @unless(empty($casinosForBingo))
                    @foreach($casinosForBingo as $casino_for_bingo)
                        <div class="row index-page-best-online-casino-card2">
                            <div class="col-xs-12 col-sm-4 col-md-3 index-page-best-online-casino-col-1 text-center" data-mh="best-online-casino-match-height">
                                <a href="{{ route('front-end.show-casino', ['region' => $casino_for_bingo->region->slug, 'casino' => $casino_for_bingo->slug]) }}"><img src="{{ Image::url(Storage::url($casino_for_bingo->logo), 262) }}" alt="{{ $casino_for_bingo->name }} Logo" height="75"></a>

                                <div class="show-casino-anchored-name">
                                    <a href="{{ route('front-end.show-casino', ['region' => $casino_for_bingo->region->slug, 'casino' => $casino_for_bingo->slug]) }}">{{ $casino_for_bingo->name }} Review</a>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-4 col-md-2 index-page-best-online-casino-col-2 text-center">
                                <div class="item-rating-title"><span class="item-rating-description" style="color: #2e4053">
                                @php $ratings = [$casino_for_bingo->editors_review_casino_bonus, $casino_for_bingo->editors_review_game_selection, $casino_for_bingo->editors_review_support, $casino_for_bingo->editors_review_banking]; @endphp
                                        {{ round(array_sum($ratings) / 4, 2) }}
                            </span> / 5<br>
                                </div>
                                <input
                                        title="{{ round(array_sum($ratings) / 4, 2) }}" value="{{ round(array_sum($ratings) / 4, 2) }}" class="rating" data-min="0" data-max="5" data-step="0.1" data-display-only="true" data-size="xs"
                                >
                            </div>

                            <div class="col-xs-12 col-sm-4 col-md-2 index-page-best-online-casino-col-3">
                                <span class="bonus-code-amount-green">@if(!empty($casino_for_bingo->no_deposit_bonus_amount)){{ $casino_for_bingo->no_deposit_bonus_amount }}</span>&nbsp;Free @endif
                            </div>

                            <div class="col-xs-12 col-sm-4 col-md-3 app-download-badge" data-mh="best-online-casino-match-height">
                                <div class="row text-center">
                                    <div class="col-xs-6">
                                        @unless(empty($casino_for_bingo->ios_link))
                                            <a href="{{ $casino_for_bingo->ios_link }}"><img src="{{ Cdn::asset('img/app-store.png') }}" alt="App Store Badge" class="img-responsive"></a>
                                        @endunless
                                    </div>

                                    <div class="col-xs-6">
                                        @unless(empty($casino_for_bingo->play_store_link))
                                            <a href="{{ $casino_for_bingo->play_store_link }}"><img src="{{ Cdn::asset('img/google-play-badge.png') }}" alt="Google Play Badge" class="img-responsive"></a>
                                        @endunless
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-4 col-md-2 index-page-best-online-casino-col-4 text-center">
                                <div class="use-code-section">
                                    <div class="use-code-new">
                                        <span class="top-signup-offer-text">ENTER CODE ON SIGNUP</span>
                                        {{ $casino_for_bingo->no_deposit_bonus_code }}
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-4 col-md-3 index-page-best-online-casino-col-5 text-center">
                                <div class="play-now-button">
                                    @php $explode_permalink = explode(',', $casino_for_bingo->permalink); @endphp
                                    <a href="{{ route('front-end.visit-external', ['region' => $casino_for_bingo->region->slug, 'permalink' => $explode_permalink[8]]) }}" class="btn btn-primary" target="_blank">GET BONUS</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endunless
            @endif

            @if($agent->isMobile())
                @unless(empty($casinosForBingo))
                    @foreach($casinosForBingo as $casino_for_bingo)
                        <div class="casino-tbl-brand-container">
                            <div class="casino-tbl-logo-left-container">
                                <div class="casino-tbl-logo-wrapper">
                                    <a class="casino-tbl-logo-box" target="_blank" href="{{ route('front-end.show-casino', ['region' => $casino_for_bingo->region->slug, 'casino' => $casino_for_bingo->slug]) }}"><img src="{{ Image::url(Storage::url($casino_for_bingo->logo), 262) }}" alt="{{ $casino_for_bingo->name }} Logo" height="75"></a>
                                </div>
                                <a target="_blank" href="{{ route('front-end.show-casino', ['region' => $casino_for_bingo->region->slug, 'casino' => $casino_for_bingo->slug]) }}">
                                    <div class="brand-info">
                                        <div class="new-stars">@php $ratings = [$casino_for_bingo->editors_review_casino_bonus, $casino_for_bingo->editors_review_game_selection, $casino_for_bingo->editors_review_support, $casino_for_bingo->editors_review_banking]; @endphp
                                            <span class="casino-tbl-rating-badge">{{ $casino_for_bingo->sort_by }}</span> {{ round(array_sum($ratings) / 4, 2) }}
                                            <input title="{{ round(array_sum($ratings) / 4, 2) }}" value="{{ round(array_sum($ratings) / 4, 2) }}" class="rating" data-min="0" data-max="5" data-step="0.1" data-display-only="true" data-size="xs">
                                        </div>

                                        <span class="review">{{ $casino_for_bingo->name }} Review</span></div>
                                </a>
                            </div>

                            <div class="logo-right-container">
                                <p class="logo-right-t2">@if($casino_for_bingo->no_deposit_bonus_amount !== NULL){{ $casino_for_bingo->no_deposit_bonus_amount }}
                                    <span>Free</span> @endif </p>
                                <div class="bonus-codes">
                                    <div class="top-signup-offer-text m-b-5">Use Code:</div>
                                    <div class="casino-tbl-use-code-new">{{ $casino_for_bingo->no_deposit_bonus_code }}</div>
                                </div>

                                <div class="merge-btn">
                                    @php $explode_permalink = explode(',', $casino_for_bingo->permalink); @endphp
                                    <a target="_blank" href="{{ route('front-end.visit-external', ['region' => $casino_for_bingo->region->slug, 'permalink' => $explode_permalink[1]]) }}" class="casino-tbl-cta-btn merge-left">Get Bonus</a><a target="_blank" href="{{ route('front-end.visit-external', ['region' => $casino_for_bingo->region->slug, 'permalink' => $explode_permalink[1]]) }}" class="merge-right"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endunless
            @endif
        @elseif(Request::is('new-jersey-online-casinos')){{-- Sorting casino listing by collecting url address by get method --}}
        @if(!$agent->isMobile())
            @unless(empty($casinosWhereIn))
                @foreach($casinosWhereIn as $casino)
                    <div class="row index-page-best-online-casino-card2">
                        <div class="col-xs-12 col-sm-4 col-md-3 index-page-best-online-casino-col-1 text-center" data-mh="best-online-casino-match-height">
                            <a href="{{ route('front-end.show-casino', ['region' => $casino->region->slug, 'casino' => $casino->slug]) }}"><img src="{{ Image::url(Storage::url($casino->logo), 262) }}" alt="{{ $casino->name }} Logo" height="75"></a>

                            <div class="show-casino-anchored-name">
                                <a href="{{ route('front-end.show-casino', ['region' => $casino->region->slug, 'casino' => $casino->slug]) }}">{{ $casino->name }} Review</a>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-4 col-md-2 index-page-best-online-casino-col-2 text-center">
                            <div class="item-rating-title"><span class="item-rating-description" style="color: #2e4053">
                                @php $ratings = [$casino->editors_review_casino_bonus, $casino->editors_review_game_selection, $casino->editors_review_support, $casino->editors_review_banking]; @endphp
                                    {{ round(array_sum($ratings) / 4, 2) }}
                            </span> / 5<br>
                            </div>
                            <input title="{{ round(array_sum($ratings) / 4, 2) }}" value="{{ round(array_sum($ratings) / 4, 2) }}" class="rating" data-min="0" data-max="5" data-step="0.1" data-display-only="true" data-size="xs">
                        </div>

                        <div class="col-xs-12 col-sm-4 col-md-2 index-page-best-online-casino-col-3">
                            <span class="bonus-code-amount-green">@unless(NULL === $casino->no_deposit_bonus_amount){{ $casino->no_deposit_bonus_amount }}</span>&nbsp;Free @endunless
                        </div>

                        <div class="col-xs-12 col-sm-4 col-md-3 app-download-badge" data-mh="best-online-casino-match-height">
                            <div class="row text-center">
                                <div class="col-xs-6">
                                    @unless(NULL === $casino->ios_link)
                                        <a href="{{ $casino->ios_link }}"><img src="{{ Cdn::asset('img/app-store.png') }}" alt="App Store Badge" class="img-responsive"></a>
                                    @endunless
                                </div>

                                <div class="col-xs-6">
                                    @unless(NULL === $casino->play_store_link)
                                        <a href="{{ $casino->play_store_link }}"><img src="{{ Cdn::asset('img/google-play-badge.png') }}" alt="Google Play Badge" class="img-responsive"></a>
                                    @endunless
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-4 col-md-2 index-page-best-online-casino-col-4 text-center">
                            <div class="use-code-section">
                                <div class="use-code-new">
                                    <span class="top-signup-offer-text">ENTER CODE ON SIGNUP</span>
                                    {{ $casino->no_deposit_bonus_code }}
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-4 col-md-3 index-page-best-online-casino-col-5 text-center">
                            <div class="play-now-button">
                                @php $explode_permalink = explode(',', $casino->permalink); @endphp
                                <a href="{{ route('front-end.visit-external', ['region' => $casino->region->slug, 'permalink' => $explode_permalink[8]]) }}" class="btn btn-primary" target="_blank">GET BONUS</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endunless

            @unless(empty($casinosWhereNotIn))
                @foreach($casinosWhereNotIn as $casino)
                    <div class="row index-page-best-online-casino-card2">
                        <div class="col-xs-12 col-sm-4 col-md-3 index-page-best-online-casino-col-1 text-center" data-mh="best-online-casino-match-height">
                            <a href="{{ route('front-end.show-casino', ['region' => $casino->region->slug, 'casino' => $casino->slug]) }}"><img src="{{ Image::url(Storage::url($casino->logo), 262) }}" alt="{{ $casino->name }} Logo" height="75"></a>

                            <div class="show-casino-anchored-name">
                                <a href="{{ route('front-end.show-casino', ['region' => $casino->region->slug, 'casino' => $casino->slug]) }}">{{ $casino->name }} Review</a>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-4 col-md-2 index-page-best-online-casino-col-2 text-center">
                            <div class="item-rating-title"><span class="item-rating-description" style="color: #2e4053">
                                @php $ratings = [$casino->editors_review_casino_bonus, $casino->editors_review_game_selection, $casino->editors_review_support, $casino->editors_review_banking]; @endphp
                                    {{ round(array_sum($ratings) / 4, 2) }}
                            </span> / 5<br>
                            </div>
                            <input title="{{ round(array_sum($ratings) / 4, 2) }}" value="{{ round(array_sum($ratings) / 4, 2) }}" class="rating" data-min="0" data-max="5" data-step="0.1" data-display-only="true" data-size="xs">
                        </div>

                        <div class="col-xs-12 col-sm-4 col-md-2 index-page-best-online-casino-col-3">
                            <span class="bonus-code-amount-green">@if(!empty($casino->no_deposit_bonus_amount)){{ $casino->no_deposit_bonus_amount }}</span>&nbsp;Free @endif
                        </div>

                        <div class="col-xs-12 col-sm-4 col-md-3 app-download-badge" data-mh="best-online-casino-match-height">
                            <div class="row text-center">
                                <div class="col-xs-6">
                                    @unless(empty($casino->ios_link))
                                        <a href="{{ $casino->ios_link }}"><img src="{{ Cdn::asset('img/app-store.png') }}" alt="App Store Badge" class="img-responsive"></a>
                                    @endunless
                                </div>

                                <div class="col-xs-6">
                                    @unless(empty($casino->play_store_link))
                                        <a href="{{ $casino->play_store_link }}"><img src="{{ Cdn::asset('img/google-play-badge.png') }}" alt="Google Play Badge" class="img-responsive"></a>
                                    @endunless
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-4 col-md-2 index-page-best-online-casino-col-4 text-center">
                            <div class="use-code-section">
                                <div class="use-code-new">
                                    <span class="top-signup-offer-text">ENTER CODE ON SIGNUP</span>
                                    {{ $casino->no_deposit_bonus_code }}
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-4 col-md-3 index-page-best-online-casino-col-5 text-center">
                            <div class="play-now-button">
                                @php $explode_permalink = explode(',', $casino->permalink); @endphp
                                <a href="{{ route('front-end.visit-external', ['region' => $casino->region->slug, 'permalink' => $explode_permalink[8]]) }}" class="btn btn-primary" target="_blank">GET BONUS</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endunless
        @endif

        @if($agent->isMobile())
            @unless(empty($casinosWhereIn))
                @foreach($casinosWhereIn as $casino)
                    <div class="casino-tbl-brand-container">
                        <div class="casino-tbl-logo-left-container">
                            <div class="casino-tbl-logo-wrapper">
                                <a class="casino-tbl-logo-box" target="_blank" href="{{ route('front-end.show-casino', ['region' => $casino->region->slug, 'casino' => $casino->slug]) }}"><img src="{{ Image::url(Storage::url($casino->logo), 262) }}" alt="{{ $casino->name }} Logo" height="75"></a>
                            </div>
                            <a target="_blank" href="{{ route('front-end.show-casino', ['region' => $casino->region->slug, 'casino' => $casino->slug]) }}">
                                <div class="brand-info">
                                    <div class="new-stars">@php $ratings = [$casino->editors_review_casino_bonus, $casino->editors_review_game_selection, $casino->editors_review_support, $casino->editors_review_banking]; @endphp
                                        <span class="casino-tbl-rating-badge">{{ $casino->sort_by }}</span> {{ round(array_sum($ratings) / 4, 2) }}
                                        <input title="{{ round(array_sum($ratings) / 4, 2) }}" value="{{ round(array_sum($ratings) / 4, 2) }}" class="rating" data-min="0" data-max="5" data-step="0.1" data-display-only="true" data-size="xs">
                                    </div>

                                    <span class="review">{{ $casino->name }} Review</span></div>
                            </a>
                        </div>

                        <div class="logo-right-container">
                            <p class="logo-right-t2">@if($casino->no_deposit_bonus_amount !== NULL){{ $casino->no_deposit_bonus_amount }}
                                <span>Free</span> @endif </p>
                            <div class="bonus-codes">
                                <div class="top-signup-offer-text m-b-5">Use Code:</div>
                                <div class="casino-tbl-use-code-new">{{ $casino->no_deposit_bonus_code }}</div>
                            </div>

                            <div class="merge-btn">
                                @php $explode_permalink = explode(',', $casino->permalink); @endphp
                                <a target="_blank" href="{{ route('front-end.visit-external', ['region' => $casino->region->slug, 'permalink' => $explode_permalink[1]]) }}" class="casino-tbl-cta-btn merge-left">Get Bonus</a><a target="_blank" href="{{ route('front-end.visit-external', ['region' => $casino->region->slug, 'permalink' => $explode_permalink[1]]) }}" class="merge-right"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endunless

            @unless(empty($casinosWhereNotIn))
                @foreach($casinosWhereNotIn as $casino)
                    <div class="casino-tbl-brand-container">
                        <div class="casino-tbl-logo-left-container">
                            <div class="casino-tbl-logo-wrapper">
                                <a class="casino-tbl-logo-box" target="_blank" href="{{ route('front-end.show-casino', ['region' => $casino->region->slug, 'casino' => $casino->slug]) }}"><img src="{{ Image::url(Storage::url($casino->logo), 262) }}" alt="{{ $casino->name }} Logo" height="75"></a>
                            </div>
                            <a target="_blank" href="{{ route('front-end.show-casino', ['region' => $casino->region->slug, 'casino' => $casino->slug]) }}">
                                <div class="brand-info">
                                    <div class="new-stars">@php $ratings = [$casino->editors_review_casino_bonus, $casino->editors_review_game_selection, $casino->editors_review_support, $casino->editors_review_banking]; @endphp
                                        <span class="casino-tbl-rating-badge">{{ $casino->sort_by }}</span> {{ round(array_sum($ratings) / 4, 2) }}
                                        <input title="{{ round(array_sum($ratings) / 4, 2) }}" value="{{ round(array_sum($ratings) / 4, 2) }}" class="rating" data-min="0" data-max="5" data-step="0.1" data-display-only="true" data-size="xs">
                                    </div>

                                    <span class="review">{{ $casino->name }} Review</span></div>
                            </a>
                        </div>

                        <div class="logo-right-container">
                            <p class="logo-right-t2">@if($casino->no_deposit_bonus_amount !== NULL){{ $casino->no_deposit_bonus_amount }}
                                <span>Free</span> @endif </p>
                            <div class="bonus-codes">
                                <div class="top-signup-offer-text m-b-5">Use Code:</div>
                                <div class="casino-tbl-use-code-new">{{ $casino->no_deposit_bonus_code }}</div>
                            </div>

                            <div class="merge-btn">
                                @php $explode_permalink = explode(',', $casino->permalink); @endphp
                                <a target="_blank" href="{{ route('front-end.visit-external', ['region' => $casino->region->slug, 'permalink' => $explode_permalink[1]]) }}" class="casino-tbl-cta-btn merge-left">Get Bonus</a><a target="_blank" href="{{ route('front-end.visit-external', ['region' => $casino->region->slug, 'permalink' => $explode_permalink[1]]) }}" class="merge-right"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endunless
        @endif
        @else
            @if(!$agent->isMobile())
                @unless(empty($casinos))
                    @foreach($casinos as $casino)
                        <div class="row index-page-best-online-casino-card2">
                            <div class="col-xs-12 col-sm-4 col-md-3 index-page-best-online-casino-col-1 text-center" data-mh="best-online-casino-match-height">
                                <span class="rating-badge">{{ $casino->sort_by }}</span>
                                <a href="{{ route('front-end.show-casino', ['region' => $casino->region->slug, 'casino' => $casino->slug]) }}"><img src="{{ Image::url(Storage::url($casino->logo), 262) }}" alt="{{ $casino->name }} Logo" height="75"></a>

                                <div class="show-casino-anchored-name">
                                    <a href="{{ route('front-end.show-casino', ['region' => $casino->region->slug, 'casino' => $casino->slug]) }}">{{ $casino->name }} Review</a>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-4 col-md-2 index-page-best-online-casino-col-2 text-center">
                                <div class="item-rating-title"><span class="item-rating-description" style="color: #2e4053">
                                @php $ratings = [$casino->editors_review_casino_bonus, $casino->editors_review_game_selection, $casino->editors_review_support, $casino->editors_review_banking]; @endphp
                                        {{ round(array_sum($ratings) / 4, 2) }}
                            </span> / 5<br>
                                </div>
                                <input title="{{ round(array_sum($ratings) / 4, 2) }}" value="{{ round(array_sum($ratings) / 4, 2) }}" class="rating" data-min="0" data-max="5" data-step="0.1" data-display-only="true" data-size="xs">
                            </div>

                            <div class="col-xs-12 col-sm-4 col-md-2 index-page-best-online-casino-col-3">
                                <span class="bonus-code-amount-green">@if(!empty($casino->no_deposit_bonus_amount)){{ $casino->no_deposit_bonus_amount }}</span>&nbsp;Free @endif
                            </div>

                            <div class="col-xs-12 col-sm-4 col-md-3 app-download-badge" data-mh="best-online-casino-match-height">
                                <div class="row text-center">
                                    <div class="col-xs-6">
                                        @unless(empty($casino->ios_link))
                                            <a href="{{ $casino->ios_link }}"><img src="{{ Cdn::asset('img/app-store.png') }}" alt="App Store Badge" class="img-responsive"></a>
                                        @endunless
                                    </div>

                                    <div class="col-xs-6">
                                        @unless(empty($casino->play_store_link))
                                            <a href="{{ $casino->play_store_link }}"><img src="{{ Cdn::asset('img/google-play-badge.png') }}" alt="Google Play Badge" class="img-responsive"></a>
                                        @endunless
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-4 col-md-2 index-page-best-online-casino-col-4 text-center">
                                <div class="use-code-section">
                                    <div class="use-code-new">
                                        <span class="top-signup-offer-text">ENTER CODE ON SIGNUP</span>
                                        {{ $casino->no_deposit_bonus_code }}
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-4 col-md-3 index-page-best-online-casino-col-5 text-center">
                                <div class="play-now-button">
                                    @php $explode_permalink = explode(',', $casino->permalink); @endphp
                                    <a href="{{ route('front-end.visit-external', ['region' => $casino->region->slug, 'permalink' => $explode_permalink[8]]) }}" class="btn btn-primary" target="_blank">GET BONUS</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endunless
            @endif

            @if($agent->isMobile())
                <div class="m-t-10"></div>

                @unless(empty($casinos))
                    @foreach($casinos as $casino)
                        <div class="casino-tbl-brand-container">
                            <div class="casino-tbl-logo-left-container">
                                <div class="casino-tbl-logo-wrapper">
                                    <a class="casino-tbl-logo-box" target="_blank" href="{{ route('front-end.show-casino', ['region' => $casino->region->slug, 'casino' => $casino->slug]) }}"><img src="{{ Image::url(Storage::url($casino->logo), 262) }}" alt="{{ $casino->name }} Logo" height="75"></a>
                                </div>
                                <a target="_blank" href="{{ route('front-end.show-casino', ['region' => $casino->region->slug, 'casino' => $casino->slug]) }}">
                                    <div class="brand-info">
                                        <div class="new-stars">@php $ratings = [$casino->editors_review_casino_bonus, $casino->editors_review_game_selection, $casino->editors_review_support, $casino->editors_review_banking]; @endphp
                                            <span class="casino-tbl-rating-badge">{{ $casino->sort_by }}</span> {{ round(array_sum($ratings) / 4, 2) }}
                                            <input title="{{ round(array_sum($ratings) / 4, 2) }}" value="{{ round(array_sum($ratings) / 4, 2) }}" class="rating" data-min="0" data-max="5" data-step="0.1" data-display-only="true" data-size="xs">
                                        </div>

                                        <span class="review">{{ $casino->name }} Review</span></div>
                                </a>
                            </div>

                            <div class="logo-right-container">
                                <p class="logo-right-t2">@if(!empty($casino->no_deposit_bonus_amount)){{ $casino->no_deposit_bonus_amount }}
                                    <span>Free</span> @endif </p>
                                <div class="bonus-codes">
                                    <div class="top-signup-offer-text m-b-5">Use Code:</div>
                                    <div class="casino-tbl-use-code-new">{{ $casino->no_deposit_bonus_code }}</div>
                                </div>

                                <div class="merge-btn">
                                    @php $explode_permalink = explode(',', $casino->permalink); @endphp
                                    <a target="_blank" href="{{ route('front-end.visit-external', ['region' => $casino->region->slug, 'permalink' => $explode_permalink[1]]) }}" class="casino-tbl-cta-btn merge-left">Get Bonus</a><a target="_blank" href="{{ route('front-end.visit-external', ['region' => $casino->region->slug, 'permalink' => $explode_permalink[1]]) }}" class="merge-right"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endunless

                <div class="m-b-20"></div>
            @endif
        @endif
    </div>

    <div class="plugin-description">
        @unless(empty($getRegion))
            {!! $getRegion->region_contents !!}
        @endunless
    </div>
@endsection