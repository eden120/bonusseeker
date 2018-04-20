<div class="how-to-use-this-site" id="index-page-online-casino-bonuses">
    <div class="row intro-text-and-description">
        <div class="col-xs-12 col-md-12">
            <h2 class="intro-text text-center">NJ ONLINE CASINO BONUS CODES</h2>
        </div>
    </div>

    <div class="how-to-use-this-site-video-section">
        <div class="row">
            <div class="col-xs-12 col-md-6">
                <h3 class="intro-sub-text text-center">STEP 1: CLAIM NO-DEPOSIT SIGNUP BONUSES</h3>

                @php $videoId1 = Youtube::parseVidFromURL('https://www.youtube.com/watch?v=IuI_ena2IdQ') @endphp
                <iframe src="https://www.youtube.com/embed/{{ $videoId1 }}?rel=0&amp;controls=1&amp;showinfo=0" frameborder="0" allowfullscreen onload="resizeYouTubeIframe(this);" height="250" width="100%"></iframe>

                <p class="text-justify" style="font-size: 15px; margin-top: 15px;">It&#039;s uncommon to win a free spin jackpot, but they are FREE, so it&#039;s only to your advantage to spin them every day. Here is a list of all of the New Jersey Online Casinos that offer free spins to registered users. You get free spin bonuses WITHOUT making a deposit, so they are completely free. We recommend that you sign up for all of these online casinos right now and start claiming your free daily spins.</p>
            </div>

            <div class="col-xs-12 col-md-6">
                <h3 class="intro-sub-text text-center">STEP 2: CLAIM FIRST DEPOSIT BONUSES</h3>

                @php $videoId2 = Youtube::parseVidFromURL('https://www.youtube.com/watch?v=fEeu2z3sZG8') @endphp
                <iframe src="https://www.youtube.com/embed/{{ $videoId2 }}?rel=0&amp;controls=1&amp;showinfo=0" frameborder="0" allowfullscreen onload="resizeYouTubeIframe(this);" height="250" width="100%"></iframe>

                <p class="text-justify" style="font-size: 15px; margin-top: 15px;">Visit our list of New Jersey Online Casino Bonuses to see which casinos are offering the most to new players. These bonuses change all the time, so today might not be the best day to choice a certain casino you&#039;ve been thinking of. Check our site until the casino you want to join is in our Top 3 New Player Bonuses List. </p>
            </div>
        </div>
    </div>

    <div class="row" style="margin-top: 10px; padding: 10px 0 15px 0; background-color: white;">

        <div class="online-casino-bonus-codes col-md-12 col-xs-12">
            <h2 class="index-page-bonus-codes-headline text-center">
                <a href="{{ route('front-end.bonus-codes', ['region' => $region_slug[0]['slug']]) }}">BEST NJ ONLINE CASINO BONUS CODES</a>
            </h2>

            <h3 class="index-page-bonus-codes-headline text-center" style="font-size: 18px;">
                <a data-toggle="collapse" data-parent="#accordion" href="#bonusCodesCollapse" aria-expanded="true" aria-controls="bonusCodesCollapse">Click Here to See all Bonus Codes</a>
            </h3>

            <div id="accordion" role="tablist" aria-multiselectable="true">
                <div id="bonusCodesCollapse" class="panel-collapse collapse" role="tabpanel" aria-labelledby="bonusCodesHeading">

                    @unless(empty($casinos))
                        @foreach($casinos as $casino)
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

                                <div class="col-xs-12 col-md-2 bonus-codes-col-4 text-center">
                                    <div class="use-code-new">
                                        <span class="top-signup-offer-text">ENTER CODE ON SIGNUP</span>
                                        {{ $casino->no_deposit_bonus_code }}
                                    </div>
                                </div>

                                <div class="col-xs-12 col-md-3 bonus-codes-col-5 text-center" data-mh="bonus-codes-col-match-height">
                                    <?php $explode_permalink = explode(',', $casino->permalink); ?>
                                    <a href="{{ route('front-end.visit-external', ['region' => $casino->region->slug, 'permalink' => $explode_permalink[2]]) }}" target="_blank" class="btn btn-primary">CLICK HERE TO REDEEM</a>
                                </div>
                            </div>
                        @endforeach
                    @endunless

                    <h3 class="index-page-bonus-codes-footer-title text-center">SEE ALL
                        <a href="{{ route('front-end.bonus-codes', ['region' => $region_slug[0]['slug']]) }}" class="btn-large">NJ CASINO BONUS CODES</a>
                    </h3>
                </div>
            </div>
        </div>
    </div>
</div>