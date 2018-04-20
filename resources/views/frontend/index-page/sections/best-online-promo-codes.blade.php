<div class="featured-casino-promo-codes">
    <div class="how-to-use-this-site-video-section">
        <div class="row">
            <div class="col-md-12 text-center" style="margin-bottom: 20px;">
                <h2 class="intro-text" style="font-size: 38px; font-weight: 600; padding: 0; margin-top: 10px;">NJ ONLINE CASINO PROMO CODES</h2>
            </div>

            <div class="col-md-6">
                @php $videoId = Youtube::parseVidFromURL('https://www.youtube.com/watch?v=6bZjWoyA-j4') @endphp
                <iframe src="https://www.youtube.com/embed/{{ $videoId }}?rel=0&amp;controls=1&amp;showinfo=0" frameborder="0" allowfullscreen onload="resizeYouTubeIframe(this);" height="250" width="100%"></iframe>
            </div>

            <div class="col-md-6 video-description">
                <p>The best casino to play at changes every day. Check this list daily to see where you can get the most value for your dollar in cash back, reload bonuses, giveaways, sweepstakes, and more.</p>

                <ul>
                    <li>Get the most value for the money you spend at online casinos in New Jersey</li>
                    <li>Earn cashback, reload bonuses, prizes, or bonus loyalty points RIGHT NOW</li>
                    <li>You just need the right promo codes - and we have all of them below</li>
                    <li>Bookmark this page &amp; check it every day BEFORE you decide where to play</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row promo-cards">
        <div class="col-md-12">
            <h3 class="index-page-promo-codes-headline text-center">
                <a href="{{ route('front-end.promo-codes', ['region' => $region_slug[0]['slug']]) }}">BEST NJ ONLINE CASINO PROMO CODES</a>
            </h3>

            <h3 class="index-page-promo-codes-headline text-center" style="font-size: 18px;">
                <a data-toggle="collapse" data-parent="#accordion" href="#promoCodesCollapse" aria-expanded="true" aria-controls="promoCodesCollapse">Click Here to See all Promo Codes</a>
            </h3>

            <div id="accordion" role="tablist" aria-multiselectable="true">
                <div id="promoCodesCollapse" class="panel-collapse collapse" role="tabpanel" aria-labelledby="promoCodesHeading">

                    @unless(empty($casinoPromoCodes))
                        @foreach($casinoPromoCodes as $casinoPromoCode)
                            <div class="col-xs-12 col-md-12 online-casino-promo-codes-col-1">

                                <div class="col-xs-6 col-sm-6 col-md-3 promo-code-thumbnail">
                                    <div class="promo-code-img-thumb">
                                        <a href="{{ route('front-end.show-promo', ['region' => $casinoPromoCode->casino->region->slug, 'slug' => $casinoPromoCode->slug]) }}"><img src="{{ Image::url(Storage::url($casinoPromoCode->banner), 270, 135) }}" alt="{{ $casinoPromoCode->name }}"></a>
                                    </div>

                                    <div class="promo-code-type">{{ $casinoPromoCode->promoType->name }}</div>
                                </div>

                                <div class="col-xs-12 col-md-9 promo-code-description">
                                    <div class="row promo-code-duration">
                                        <div class="col-md-9">
                                            <div class="promo-name">
                                                <h2>
                                                    <a href="{{ route('front-end.show-promo', ['region' => $casinoPromoCode->casino->region->slug, 'slug' => $casinoPromoCode->slug]) }}">{{ $casinoPromoCode->name }}</a>
                                                </h2>
                                            </div>

                                            <div class="row promo-code-name-and-expiry">
                                                <div class="col-xs-12 col-md-8">
                                                    <p>
                                                        Starts: {{ \Carbon\Carbon::parse($casinoPromoCode->start_date)->format('d M, Y') }}</p>

                                                    <p>
                                                        Expires: <?php $startDate = \Carbon\Carbon::parse($casinoPromoCode->start_date); $endDate = \Carbon\Carbon::parse($casinoPromoCode->end_date); $daysLeft = $endDate->diffInDays($startDate); ?> {{ \Carbon\Carbon::parse($casinoPromoCode->end_date)->format('d M, Y') }}</p>

                                                    <p>
                                                        <a href="{{ route('front-end.show-promo', ['region' => $casinoPromoCode->casino->region->slug, 'slug' => $casinoPromoCode->slug]) }}" style="font-style: italic;">{{ $casinoPromoCode->casino->name }} Promo Codes</a>
                                                    </p>
                                                </div>

                                                <div class="col-xs-12 col-md-4 text-right">
                                                    <h3 class="promo-prize-amount">
                                                        <span><i class="ti-gift"></i> Prize</span> {{ $casinoPromoCode->max_promo_amount }}
                                                    </h3>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-md-3 text-center">
                                            <a href="{{ route('front-end.show-casino', ['region' => $casinoPromoCode->casino->region->slug, 'slug' => $casinoPromoCode->casino->slug]) }}"><img src="{{ Image::url(Storage::url($casinoPromoCode->casino->logo), 120, 60, ['crop']) }}" alt="{{ $casinoPromoCode->casino->name }}" style="padding: 0 0 6px 0;"></a>

                                            <a href="{{ route('front-end.show-promo', ['region' => $casinoPromoCode->casino->region->slug, 'slug' => $casinoPromoCode->slug]) }}" class="btn btn-primary">GET PROMO CODE</a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        @endforeach
                    @endunless

                    <h3 class="index-page-promo-codes-footer-title text-center">SEE ALL
                        <a href="{{ route('front-end.promo-codes', ['region' => $region_slug[0]['slug']]) }}" class="btn-large">NJ CASINO PROMO CODES</a>
                    </h3>
                </div>

            </div>
        </div>

    </div>
</div>