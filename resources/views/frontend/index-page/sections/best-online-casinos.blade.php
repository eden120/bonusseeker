<div class="row index-page-best-online-casinos" id="index-page-best-online-casinos">
    <?php $agent = new Jenssegers\Agent\Agent(); ?>
    @if(!$agent->isMobile())
        <div class="row index-page-best-online-casino-card-header-2 bold-700">
            <div class="col-xs-12 col-sm-4 col-md-3 index-page-best-online-casino-col-1 text-center">Casino</div>

            <div class="col-xs-12 col-sm-4 col-md-2 index-page-best-online-casino-col-2 text-center">Rating</div>

            <div class="col-xs-12 col-sm-4 col-md-2 index-page-best-online-casino-col-3">Bonus</div>

            <div class="col-xs-12 col-sm-4 col-md-2 index-page-best-online-casino-col-4 text-center">Code</div>

            <div class="col-xs-12 col-sm-4 col-md-3 index-page-best-online-casino-col-5 text-center">Play</div>
        </div>

        @unless(empty($best_online_casinos))
            @foreach($best_online_casinos as $best_online_casino)
                <div class="row index-page-best-online-casino-card2">
                    <div class="col-xs-12 col-sm-4 col-md-3 index-page-best-online-casino-col-1 text-center" data-mh="best-online-casino-match-height">
                        <span class="rating-badge">{{ $loop->iteration }}</span>
                        <a href="{{ route('front-end.show-casino', ['region' => $best_online_casino->region->slug, 'casino' => $best_online_casino->slug]) }}"><img src="{{ Image::url(Storage::url($best_online_casino->logo), 150, 75, ['crop']) }}" alt="{{ $best_online_casino->name }} Logo" width="150" height="75"></a>

                        <div class="show-casino-anchored-name">
                            <a href="{{ route('front-end.show-casino', ['region' => $best_online_casino->region->slug, 'casino' => $best_online_casino->slug]) }}">{{ $best_online_casino->name }} Review</a>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-4 col-md-2 index-page-best-online-casino-col-2 text-center">
                        <div class="item-rating-title"><span class="item-rating-description" style="color: #2e4053">
                                @php $ratings = [$best_online_casino->editors_review_casino_bonus, $best_online_casino->editors_review_game_selection, $best_online_casino->editors_review_support, $best_online_casino->editors_review_banking]; @endphp
                                {{ round(array_sum($ratings) / 4, 2) }}
                            </span> / 5<br>
                        </div>
                        <input title="{{ round(array_sum($ratings) / 4, 2) }}" value="{{ round(array_sum($ratings) / 4, 2) }}" class="rating" data-min="0" data-max="5" data-step="0.1" data-display-only="true" data-size="xs">
                    </div>

                    <div class="col-xs-12 col-sm-4 col-md-2 index-page-best-online-casino-col-3">
                        <span class="bonus-code-amount-green">@if(!empty($best_online_casino->no_deposit_bonus_amount)){{ $best_online_casino->no_deposit_bonus_amount }}</span>&nbsp;Free @endif
                    </div>

                    <div class="col-xs-12 col-sm-4 col-md-3 app-download-badge" data-mh="best-online-casino-match-height">
                        <div class="row text-center">
                            <div class="col-xs-6">
                                @unless(empty($best_online_casino->ios_link))
                                    <a href="{{ $best_online_casino->ios_link }}"><img src="{{ Cdn::asset('img/app-store.png') }}" alt="App Store Badge" class="img-responsive"></a>
                                @endunless
                            </div>

                            <div class="col-xs-6">
                                @unless(empty($best_online_casino->play_store_link))
                                    <a href="{{ $best_online_casino->play_store_link }}"><img src="{{ Cdn::asset('img/google-play-badge.png') }}" alt="Google Play Badge" class="img-responsive"></a>
                                @endunless
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-4 col-md-2 index-page-best-online-casino-col-4 text-center">
                        <div class="use-code-section">
                            <div class="use-code-new">
                                <span class="top-signup-offer-text">ENTER CODE ON SIGNUP</span>
                                {{ $best_online_casino->no_deposit_bonus_code }}
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-4 col-md-3 index-page-best-online-casino-col-5 text-center">
                        <div class="play-now-button">
                            @php $explode_permalink = explode(',', $best_online_casino->permalink) @endphp
                            <a href="{{ route('front-end.visit-external', ['region' => $best_online_casino->region->slug, 'permalink' => $explode_permalink[1]]) }}" class="btn btn-primary" target="_blank">GET BONUS</a>
                        </div>
                    </div>
                </div>
            @endforeach
        @endunless
    @endif

    @if($agent->isMobile())
        <div class="m-t-10"></div>

        @unless(empty($best_online_casinos))
            @foreach($best_online_casinos as $best_online_casino)
                <div class="casino-tbl-brand-container">
                    <div class="casino-tbl-logo-left-container">
                        <div class="casino-tbl-logo-wrapper">
                            <a class="casino-tbl-logo-box" target="_blank" href="{{ route('front-end.show-casino', ['region' => $best_online_casino->region->slug, 'casino' => $best_online_casino->slug]) }}"><img src="{{ Image::url(Storage::url($best_online_casino->logo), 262) }}" alt="{{ $best_online_casino->name }} Logo" height="75"></a>
                        </div>

                        <a target="_blank" href="{{ route('front-end.show-casino', ['region' => $best_online_casino->region->slug, 'casino' => $best_online_casino->slug]) }}">
                            <div class="brand-info">
                                <div class="new-stars">@php $ratings = [$best_online_casino->editors_review_casino_bonus, $best_online_casino->editors_review_game_selection, $best_online_casino->editors_review_support, $best_online_casino->editors_review_banking]; @endphp
                                    <span class="casino-tbl-rating-badge">{{ $best_online_casino->sort_by }}</span> {{ round(array_sum($ratings) / 4, 2) }}
                                    <input title="{{ round(array_sum($ratings) / 4, 2) }}" value="{{ round(array_sum($ratings) / 4, 2) }}" class="rating" data-min="0" data-max="5" data-step="0.1" data-display-only="true" data-size="xs">
                                </div>

                                <span class="review">{{ $best_online_casino->name }} Review</span></div>
                        </a>
                    </div>

                    <div class="logo-right-container">
                        <p class="logo-right-t2">@if(!empty($best_online_casino->no_deposit_bonus_amount)){{ $best_online_casino->no_deposit_bonus_amount }}
                            <span>Free</span> @endif </p>
                        <div class="bonus-codes">
                            <div class="top-signup-offer-text m-b-5">Use Code:</div>
                            <div class="casino-tbl-use-code-new">{{ $best_online_casino->no_deposit_bonus_code }}</div>
                        </div>

                        <div class="merge-btn">
                            @php $explode_permalink = explode(',', $best_online_casino->permalink); @endphp
                            <a target="_blank" href="{{ route('front-end.visit-external', ['region' => $best_online_casino->region->slug, 'permalink' => $explode_permalink[1]]) }}" class="casino-tbl-cta-btn merge-left">Get Bonus</a><a target="_blank" href="{{ route('front-end.visit-external', ['region' => $best_online_casino->region->slug, 'permalink' => $explode_permalink[1]]) }}" class="merge-right"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            @endforeach
        @endunless

        <div class="m-b-20"></div>
    @endif

    <div class="text-center col-xs-12 m-b-15">
        SEE ALL
        <a href="{{ route('front-end.show-parent-post', ['region' => $region_slug[0]['slug']]) }}" class="btn-large">LEGAL ONLINE CASINOS IN NEW JERSEY</a>
    </div>
</div>