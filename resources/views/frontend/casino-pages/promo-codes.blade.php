@extends('frontend.layout.master')

@section('title', 'Best NJ Online Casino Promo Codes - ')

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
      "name": "Best NJ Online Casino Promo Codes",
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
                    <li class="active">Best NJ Online Casino Promo Codes</li>
                </ol>
            </div>
        </div>
    @endif

    <div class="online-casino-promos">
        <h1 class="intro-text text-center">BEST NJ ONLINE CASINO PROMO CODES</h1>

        <?php $region_slug = \App\Region::where('id', 1)->get(); ?>

        <div class="col-md-12 m-b-15 text-center" style="background-color: #f4f6f7; padding: 10px; font-size: 15px; font-weight: 600; border-radius: 2px;">
            <p class="m-b-5">Looking for a free cash signup bonus? You're on the wrong page. If you want $10, $20 or more FREE click here to see all
                <a href="{{ route('front-end.bonus-codes', ['region' => $region_slug[0]['slug']]) }}">NJ Online Casino Bonus Codes</a>
            </p>

            <p class="m-b-5">The best casino to play at changes every day. Check this list daily to see where you can get the most value for your dollar in cash back, reload bonuses, giveaways, sweepstakes, and more.</p>
        </div>

        <div class="row m-t-15">
            <div class="col-md-9 casino-promos-section">
                @unless(empty($runningPromoCodes))
                    @if($runningPromoCodes->total() > 0)
                        @foreach($runningPromoCodes as $runningPromoCode)
                            @if($runningPromoCode->end_date > \Carbon\Carbon::now())
                                <div class="col-xs-12 col-md-12 online-casino-promo-codes-col-2">
                                    <div class="col-xs-6 col-sm-6 col-md-3 promo-code-thumbnail">
                                        <div class="promo-code-img-thumb">
                                            <a href="{{ route('front-end.show-promo', ['region' => \App\Casino::findOrFail(\App\PromoCode::findOrFail($runningPromoCode->id)->casino->id)->region->slug, 'slug' => $runningPromoCode->slug]) }}"><img src="{{ Image::url(Storage::url($runningPromoCode->banner), 174, 130) }}" alt="{{ $runningPromoCode->name }}"></a>
                                        </div>

                                        <div class="promo-code-type">{{ \App\PromoCode::findOrFail($runningPromoCode->id)->promoType->name }}</div>
                                    </div>

                                    <div class="col-xs-12 col-md-9 promo-code-description">
                                        <div class="row promo-code-duration">
                                            <div class="col-md-9">
                                                <div class="promo-name">
                                                    <h2>
                                                        <a href="{{ route('front-end.show-promo', ['region' => \App\Casino::findOrFail(\App\PromoCode::findOrFail($runningPromoCode->id)->casino->id)->region->slug, 'slug' => $runningPromoCode->slug]) }}">{{ $runningPromoCode->name }}</a>
                                                    </h2>
                                                </div>

                                                <div class="row promo-code-name-and-expiry">
                                                    <div class="col-xs-12 col-md-8">
                                                        <p>
                                                            Starts: {{ \Carbon\Carbon::parse($runningPromoCode->start_date)->format('d M, Y') }}</p>

                                                        <p>
                                                            Expires: <?php $startDate = \Carbon\Carbon::parse($runningPromoCode->start_date); $endDate = \Carbon\Carbon::parse($runningPromoCode->end_date); $daysLeft = $endDate->diffInDays($startDate); ?> {{ \Carbon\Carbon::parse($runningPromoCode->end_date)->format('d M, Y') }}</p>
                                                        <p>
                                                            <a href="{{ route('front-end.show-casino', ['region' => \App\Casino::findOrFail(\App\PromoCode::findOrFail($runningPromoCode->id)->casino->id)->region->slug, 'casino' => \App\PromoCode::findOrFail($runningPromoCode->id)->casino->slug]) }}"
                                                               style="font-style: italic;">{{ \App\PromoCode::findOrFail($runningPromoCode->id)->casino->name }}
                                                                Promo Codes</a>
                                                        </p>
                                                    </div>

                                                    <div class="col-xs-12 col-md-4 text-right">
                                                        <h3 class="promo-prize-amount">
                                                            <span><i class="ti-gift"></i> Prize</span> {{ $runningPromoCode->max_promo_amount }}
                                                        </h3>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-3 text-center">
                                                <a href="{{ route('front-end.show-casino', ['region' => \App\Casino::findOrFail(\App\PromoCode::findOrFail($runningPromoCode->id)->casino->id)->region->slug, 'casino' => \App\PromoCode::findOrFail($runningPromoCode->id)->casino->slug]) }}"><img
                                                            src="{{ Image::url(Storage::url(\App\PromoCode::findOrFail($runningPromoCode->id)->casino->logo), 120, 60, ['crop']) }}"
                                                            alt="{{ \App\PromoCode::findOrFail($runningPromoCode->id)->casino->name }}"
                                                            style="padding: 0 0 6px 0;"></a>

                                                <a href="{{ route('front-end.show-promo', ['region' => \App\Casino::findOrFail(\App\PromoCode::findOrFail($runningPromoCode->id)->casino->id)->region->slug, 'slug' => $runningPromoCode->slug]) }}"
                                                   class="btn btn-primary">GET PROMO CODE</a>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                @if($runningPromoCode->id %3 === 0)
                                    <div class="col-xs-12 col-md-12" style="padding-left: 0; padding-right: 0;">
                                        @unless(empty($casinos))
                                            @foreach($casinos as $casino)
                                                <div class="get-exclusive-bonus-codes-new-card"
                                                     style="margin-top: 0 !important;">
                                                    <div class="exclusive-new-player-offer">Get our exclusive new player
                                                        offer now!</div>
                                                    <h3 class="casino-bonus-codes">{{ $casino->name }} Bonus Codes</h3>

                                                    <div class="row online-casino-bonus-codes-page m-t-15">
                                                        <div class="col-xs-12 col-md-2 bonus-codes-col-1"
                                                             data-mh="bonus-codes-col-match-height">
                                                            <div class="m-t-10">
                                                                <a href="{{ route('front-end.show-casino', ['region' => \App\Casino::findOrFail($casino->id)->region->slug, 'casino' =>  $casino->slug]) }}"><img
                                                                            src="{{ Image::url(Storage::url($casino->logo), 100, 50, ['crop']) }}"
                                                                            class="img-responsive"
                                                                            alt="{{ $casino->name }} Logo"></a>
                                                            </div>
                                                        </div>

                                                        <div class="col-xs-12 col-md-2 bonus-codes-col-2 text-center"
                                                             data-mh="bonus-codes-col-match-height"
                                                             style="padding-left: 0; padding-right: 0;">
                                                            <div class="dark-gray-title">Signup &amp;
                                                                Get
                                                            </div>

                                                            <div class="green-bonus-amount">{{ $casino->no_deposit_bonus }}</div>
                                                        </div>

                                                        <div class="col-xs-12 col-md-3 bonus-codes-col-3 text-center"
                                                             data-mh="bonus-codes-col-match-height"
                                                             style="padding-left: 0; padding-right: 0;">
                                                            <div class="dark-gray-title">Deposit &amp;
                                                                Get
                                                            </div>

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
                                                            <?php $explode_permalink = explode(',', $casino->permalink); ?>
                                                            <a href="{{ route('front-end.visit-external', ['region' => \App\Casino::findOrFail(\App\PromoCode::findOrFail($casino->id)->casino->id)->region->slug, 'permalink' => $explode_permalink[14]]) }}"
                                                               target="_blank" class="btn btn-primary">CLICK HERE TO
                                                                REDEEM</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endunless
                                    </div>
                                @endif
                            @endif
                        @endforeach
                    @endif
                @endunless

                <h3 class="text-center intro-text" style="font-size: 30px; margin-bottom: 0">COMING UP</h3>
                @unless(empty($comingUpPromoCodes))
                    @if($comingUpPromoCodes->total() > 0)
                        @foreach($comingUpPromoCodes as $comingUpPromoCode)
                            @if($comingUpPromoCode->start_date && $comingUpPromoCode->end_date > \Carbon\Carbon::now())
                                <div class="col-xs-12 col-md-12 online-casino-promo-codes-col-2">
                                    <div class="col-xs-6 col-sm-6 col-md-3 promo-code-thumbnail">
                                        <div class="promo-code-img-thumb">
                                            <a href="{{ route('front-end.show-promo', ['region' => \App\Casino::findOrFail(\App\PromoCode::findOrFail($comingUpPromoCode->id)->casino->id)->region->slug, 'slug' => $comingUpPromoCode->slug]) }}"><img
                                                        src="{{ Image::url(Storage::url($comingUpPromoCode->banner), 174, 130) }}"
                                                        alt="{{ $comingUpPromoCode->name }}"></a>
                                        </div>

                                        <div class="promo-code-type">{{ \App\PromoCode::findOrFail($comingUpPromoCode->id)->promoType->name }}</div>
                                    </div>

                                    <div class="col-xs-12 col-md-9 promo-code-description">
                                        <div class="row promo-code-duration">
                                            <div class="col-md-9">
                                                <div class="promo-name">
                                                    <h2>
                                                        <a href="{{ route('front-end.show-promo', ['region' => \App\Casino::findOrFail(\App\PromoCode::findOrFail($comingUpPromoCode->id)->casino->id)->region->slug, 'slug' => $comingUpPromoCode->slug]) }}">{{ $comingUpPromoCode->name }}</a>
                                                    </h2>
                                                </div>

                                                <div class="row promo-code-name-and-expiry">
                                                    <div class="col-xs-12 col-md-8">
                                                        <p>
                                                            Starts: {{ \Carbon\Carbon::parse($comingUpPromoCode->start_date)->format('d M, Y') }}</p>

                                                        <p>
                                                            Expires: <?php $startDate = \Carbon\Carbon::parse($comingUpPromoCode->start_date); $endDate = \Carbon\Carbon::parse($comingUpPromoCode->end_date); $daysLeft = $endDate->diffInDays($startDate); ?> {{ \Carbon\Carbon::parse($comingUpPromoCode->end_date)->format('d M, Y') }}</p>
                                                        <p>
                                                            <a href="{{ route('front-end.show-casino', ['region' => \App\Casino::findOrFail(\App\PromoCode::findOrFail($comingUpPromoCode->id)->casino->id)->region->slug, 'casino' => \App\PromoCode::findOrFail($comingUpPromoCode->id)->casino->slug]) }}"
                                                               style="font-style: italic;">{{ \App\PromoCode::findOrFail($comingUpPromoCode->id)->casino->name }}
                                                                Promo Codes</a>
                                                        </p>
                                                    </div>

                                                    <div class="col-xs-12 col-md-4 text-right">
                                                        <h3 class="promo-prize-amount">
                                                            <span><i class="ti-gift"></i> Prize</span> {{ $comingUpPromoCode->max_promo_amount }}
                                                        </h3>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="col-md-3 text-center">
                                                <a href="{{ route('front-end.show-casino', ['region' => \App\Casino::findOrFail(\App\PromoCode::findOrFail($comingUpPromoCode->id)->casino->id)->region->slug, 'casino' => \App\PromoCode::findOrFail($comingUpPromoCode->id)->casino->slug]) }}"><img
                                                            src="{{ Image::url(Storage::url(\App\PromoCode::findOrFail($comingUpPromoCode->id)->casino->logo), 120, 60, ['crop']) }}"
                                                            alt="{{ \App\PromoCode::findOrFail($comingUpPromoCode->id)->casino->name }}"
                                                            style="padding: 0 0 6px 0;"></a>

                                                <a href="{{ route('front-end.show-promo', ['region' => \App\Casino::findOrFail(\App\PromoCode::findOrFail($comingUpPromoCode->id)->casino->id)->region->slug, 'slug' => $comingUpPromoCode->slug]) }}"
                                                   class="btn btn-primary">GET PROMO CODE</a>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                @if($comingUpPromoCode->id %3 === 0)
                                    <div class="col-xs-12 col-md-12" style="padding-left: 0; padding-right: 0;">
                                        @unless(empty($casinos))
                                            @foreach($casinos as $casino)
                                                <div class="get-exclusive-bonus-codes-new-card"
                                                     style="margin-top: 0 !important;">
                                                    <div class="exclusive-new-player-offer">Get our exclusive new player
                                                        offer now!</div>
                                                    <h3 class="casino-bonus-codes">{{ $casino->name }} Bonus Codes</h3>

                                                    <div class="row online-casino-bonus-codes-page m-t-15">
                                                        <div class="col-xs-12 col-md-2 bonus-codes-col-1"
                                                             data-mh="bonus-codes-col-match-height">
                                                            <div class="m-t-10">
                                                                <a href="{{ route('front-end.show-casino', ['region' => \App\Casino::findOrFail($casino->id)->region->slug, 'casino' => $casino->slug]) }}"><img
                                                                            src="{{ Image::url(Storage::url($casino->logo), 100, 50, ['crop']) }}"
                                                                            class="img-responsive"
                                                                            alt="{{ $casino->name }} Logo"></a>
                                                            </div>
                                                        </div>

                                                        <div class="col-xs-12 col-md-2 bonus-codes-col-2 text-center"
                                                             data-mh="bonus-codes-col-match-height"
                                                             style="padding-left: 0; padding-right: 0;">
                                                            <div class="dark-gray-title">Signup &amp;
                                                                Get
                                                            </div>

                                                            <div class="green-bonus-amount">{{ $casino->no_deposit_bonus }}</div>
                                                        </div>

                                                        <div class="col-xs-12 col-md-3 bonus-codes-col-3 text-center"
                                                             data-mh="bonus-codes-col-match-height"
                                                             style="padding-left: 0; padding-right: 0;">
                                                            <div class="dark-gray-title">Deposit &amp;
                                                                Get
                                                            </div>

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
                                                            <?php $explode_permalink = explode(',', $casino->permalink); ?>
                                                            <a href="{{ route('front-end.visit-external', ['region' => \App\Casino::findOrFail(\App\PromoCode::findOrFail($casino->id)->casino->id)->region->slug,'permalink' => $explode_permalink[0]]) }}"
                                                               target="_blank" class="btn btn-primary">CLICK HERE TO
                                                                REDEEM</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endunless
                                    </div>
                                @endif
                            @endif
                        @endforeach
                    @endif
                @endunless

                <h3 class="text-center intro-text" style="font-size: 30px; margin-bottom: 0">ENDED PROMO CODES</h3>
                @unless(empty($endedPromoCodes))
                    @if($endedPromoCodes->total() > 0)
                        @foreach($endedPromoCodes as $endedPromoCode)
                            @if($endedPromoCode->end_date < \Carbon\Carbon::now())
                                <div class="col-xs-12 col-md-12 online-casino-promo-codes-col-2">
                                    <div class="col-xs-6 col-sm-6 col-md-3 promo-code-thumbnail">
                                        <div class="promo-code-img-thumb">
                                            <a href="{{ route('front-end.show-promo', ['region' => \App\Casino::findOrFail(\App\PromoCode::findOrFail($endedPromoCode->id)->casino->id)->region->slug, 'slug' => $endedPromoCode->slug]) }}"><img
                                                        src="{{ Image::url(Storage::url($endedPromoCode->banner), 174, 130) }}"
                                                        alt="{{ $endedPromoCode->name }}"></a>
                                        </div>

                                        <div class="promo-code-type">{{ \App\PromoCode::findOrFail($endedPromoCode->id)->promoType->name }}</div>
                                    </div>

                                    <div class="col-xs-12 col-md-9 promo-code-description">
                                        <div class="row promo-code-duration">
                                            <div class="col-md-9">
                                                <div class="promo-name">
                                                    <h2>
                                                        <a href="{{ route('front-end.show-promo', ['region' => \App\Casino::findOrFail(\App\PromoCode::findOrFail($endedPromoCode->id)->casino->id)->region->slug, 'slug' => $endedPromoCode->slug]) }}">{{ $endedPromoCode->name }}</a>
                                                    </h2>
                                                </div>

                                                <div class="row promo-code-name-and-expiry">
                                                    <div class="col-xs-12 col-md-8">
                                                        <p>
                                                            Starts: {{ \Carbon\Carbon::parse($endedPromoCode->start_date)->format('d M, Y') }}</p>

                                                        <p>
                                                            Expires: <?php $startDate = \Carbon\Carbon::parse($endedPromoCode->start_date); $endDate = \Carbon\Carbon::parse($endedPromoCode->end_date); $daysLeft = $endDate->diffInDays($startDate); ?> {{ \Carbon\Carbon::parse($endedPromoCode->end_date)->format('d M, Y') }}</p>
                                                        <p>
                                                            <a href="{{ route('front-end.show-casino', ['region' => \App\Casino::findOrFail(\App\PromoCode::findOrFail($endedPromoCode->id)->casino->id)->region->slug, 'casino' => \App\PromoCode::findOrFail($endedPromoCode->id)->casino->slug]) }}"
                                                               style="font-style: italic;">{{ \App\PromoCode::findOrFail($endedPromoCode->id)->casino->name }}
                                                                Promo Codes</a>
                                                        </p>
                                                    </div>

                                                    <div class="col-xs-12 col-md-4 text-right">
                                                        <h3 class="promo-prize-amount">
                                                            <span><i class="ti-gift"></i> Prize</span> {{ $endedPromoCode->max_promo_amount }}
                                                        </h3>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="col-md-3 text-center">
                                                <a href="{{ route('front-end.show-casino', ['region' => \App\Casino::findOrFail(\App\PromoCode::findOrFail($endedPromoCode->id)->casino->id)->region->slug, 'casino' => \App\PromoCode::findOrFail($endedPromoCode->id)->casino->slug]) }}"><img
                                                            src="{{ Image::url(Storage::url(\App\PromoCode::findOrFail($endedPromoCode->id)->casino->logo), 120, 60, ['crop']) }}"
                                                            alt="{{ \App\PromoCode::findOrFail($endedPromoCode->id)->casino->name }}"
                                                            style="padding: 0 0 6px 0;"></a>

                                                <a href="{{ route('front-end.show-promo', ['region' => \App\Casino::findOrFail(\App\PromoCode::findOrFail($endedPromoCode->id)->casino->id)->region->slug, 'slug' => $endedPromoCode->slug]) }}"
                                                   class="btn btn-ended">GET PROMO CODE</a>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                @if(($endedPromoCode->id) %4 === 0)
                                    <div class="col-xs-12 col-md-12" style="padding-left: 0; padding-right: 0;">
                                        @unless(empty($casinos))
                                            @foreach($casinos as $casino)
                                                <div class="get-exclusive-bonus-codes-new-card"
                                                     style="margin-top: 0 !important;">
                                                    <div class="exclusive-new-player-offer">Get our exclusive new player
                                                        offer now!</div>
                                                    <h3 class="casino-bonus-codes">{{ $casino->name }} Bonus Codes</h3>

                                                    <div class="row online-casino-bonus-codes-page m-t-15">
                                                        <div class="col-xs-12 col-md-2 bonus-codes-col-1"
                                                             data-mh="bonus-codes-col-match-height">
                                                            <div class="m-t-10">
                                                                <a href="{{ route('front-end.show-casino', ['region' => \App\Casino::findOrFail($casino->id)->region->slug, 'casino' => $casino->slug]) }}"><img
                                                                            src="{{ Image::url(Storage::url($casino->logo), 100, 50, ['crop']) }}"
                                                                            class="img-responsive"
                                                                            alt="{{ $casino->name }} Logo"></a>
                                                            </div>
                                                        </div>

                                                        <div class="col-xs-12 col-md-2 bonus-codes-col-2 text-center"
                                                             data-mh="bonus-codes-col-match-height"
                                                             style="padding-left: 0; padding-right: 0;">
                                                            <div class="dark-gray-title">Signup &amp;
                                                                Get
                                                            </div>

                                                            <div class="green-bonus-amount">{{ $casino->no_deposit_bonus }}</div>
                                                        </div>

                                                        <div class="col-xs-12 col-md-3 bonus-codes-col-3 text-center"
                                                             data-mh="bonus-codes-col-match-height"
                                                             style="padding-left: 0; padding-right: 0;">
                                                            <div class="dark-gray-title">Deposit &amp;
                                                                Get
                                                            </div>

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
                                                            <?php $explode_permalink = explode(',', $casino->permalink); ?>
                                                            <a href="{{ route('front-end.visit-external', ['region' => \App\Casino::findOrFail(\App\PromoCode::findOrFail($casino->id)->casino->id)->region->slug, 'permalink' => $explode_permalink[1]]) }}"
                                                               target="_blank" class="btn btn-primary">CLICK HERE TO
                                                                REDEEM</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endunless
                                    </div>
                                @endif
                            @endif
                        @endforeach
                    @endif
                @endunless
            </div>

            <div class="col-xs-12 col-md-3 right-sidebar-col">
                <div class="m-b-15">
                    <?php $videoId = Youtube::parseVidFromURL('https://www.youtube.com/watch?v=6bZjWoyA-j4'); ?>
                        <iframe src="https://www.youtube.com/embed/{{ $videoId }}?rel=0&amp;controls=1&amp;showinfo=0"
                                frameborder="0" allowfullscreen onload="resizeYouTubeIframe(this);" height="200"
                                width="100%"></iframe>
                </div>

                <div class="span-larger-text">More Information</div>
                <div class="list-group">
                    <a href="{{ route('front-end.show-parent-post', ['region' => $region_slug[0]['slug']]) }}"
                       class="list-group-item">NJ Online Casino Reviews</a>
                    <a href="{{ route('front-end.bonus-codes', ['region' => $region_slug[0]['slug']]) }}"
                       class="list-group-item">NJ Online Casino No Deposit
                        Bonus Codes</a>
                    <a href="{{ route('front-end.bonus-codes', ['region' => $region_slug[0]['slug']]) }}"
                       class="list-group-item">NJ Online Casino First Deposit
                        Bonus Codes</a>
                    <a href="{{ route('front-end.promo-codes', ['region' => $region_slug[0]['slug']]) }}"
                       class="list-group-item">NJ Online Casino Promo
                        Codes</a>
                    <a href="{{ route('front-end.section.games', ['region' => $region_slug[0]['slug']]) }}"
                       class="list-group-item">NJ Online Casino Games</a>
                    <a href="{{ route('front-end.news', ['region' => $region_slug[0]['slug']]) }}"
                       class="list-group-item">NJ Online Casino News</a>
                </div>

                <div id="sidebar-scroll">
                    <div class="hidden-xs hidden-sm" data-spy="affix" data-offset-top="150" id="sidebar-scroll-affix">
                        <div class="span-larger-text">Special Offers</div>

                        @unless(empty($casinoSpecialOffers))
                            @foreach($casinoSpecialOffers as $casinoSpecialOffer)
                                <div class="media right-sidebar-offered-casinos">
                                    <div class="media-left media-middle">
                                        <a href="{{ $casinoSpecialOffer->cta_link }}" target="_blank">
                                            <img class="media-object"
                                                 src="{{ Image::url(Storage::url($casinoSpecialOffer->logo), 60) }}"
                                                 alt="{{ $casinoSpecialOffer->cta_text }}">
                                        </a>
                                    </div>
                                    <div class="media-body media-middle">
                                        <div class="media-heading">
                                            <a href="{{ $casinoSpecialOffer->cta_link }}"
                                               target="_blank">{{ $casinoSpecialOffer->cta_text }}</a>
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
                                        <img class="media-object"
                                             src="{{ Image::url(Storage::url($casinoSpecialOffer->logo), 60) }}"
                                             alt="{{ $casinoSpecialOffer->cta_text }}">
                                    </a>
                                </div>
                                <div class="media-body media-middle">
                                    <div class="media-heading">
                                        <a href="{{ $casinoSpecialOffer->cta_link }}"
                                           target="_blank">{{ $casinoSpecialOffer->cta_text }}</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endunless
                </div>
            </div>
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