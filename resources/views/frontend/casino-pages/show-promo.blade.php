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
      "@id": "{{ route('front-end.promo-codes', ['region' => $region_slug[0]['slug']]) }}",
      "name": "Best NJ Online Casino Promo Codes",
      "image": "{{ asset('img/default-logo-for-sharing.jpg') }}"
    }
  }]
}

    </script>
@endsection

@section('content')
    @unless(empty($promoCode))
        @foreach($promoCode as $promo)

            <?php $agent = new Jenssegers\Agent\Agent(); ?>
            @if(!$agent->isMobile())
                <div class="row">
                    <div class="col-xs-12 col-md-12 m-t-20">
                        <ol class="breadcrumb">
                            <li><a href="{{ route('front-end.section.index', ['region' => $region_slug[0]['slug']]) }}">New
                                    Jersey Online Casinos</a></li>
                            <li><a href="{{ route('front-end.promo-codes', ['region' => $region_slug[0]['slug']]) }}">Best
                                    NJ Online Casino Promo Codes</a></li>
                            <li class="active">{{ $promo->name }}</li>
                        </ol>
                    </div>
                </div>
            @endif

            <div class="row">
                <div class="col-md-9 show-promo-details">
                    <div class="promo-code-banner">
                        <img src="{{ Image::url(Storage::url($promo->banner), 850) }}" alt="{{ $promo->casino->name }}"
                             class="thumbnail img-responsive">
                    </div>

                    <div class="promo-details">
                        <div class="get-exclusive-bonus-codes-new-card" id="claim-bonuses">
                            <div class="exclusive-new-player-offer">Get our exclusive new player offer now!</div>
                            <h3 class="casino-bonus-codes">{{ $promo->casino->name }} Bonus Codes</h3>

                            <div class="row online-casino-bonus-codes-page m-t-15">
                                <div class="col-xs-12 col-md-2 bonus-codes-col-1"
                                     data-mh="bonus-codes-col-match-height">
                                    <div class="m-t-10">
                                        <a href="{{ route('front-end.show-casino', ['region' => \App\Casino::findOrFail(\App\PromoCode::findOrFail($promo->id)->casino->id)->region->slug, 'slug' => $promo->casino->slug]) }}"><img
                                                    src="{{ Image::url(Storage::url($promo->casino->logo), 100, 50, ['crop']) }}"
                                                    class="img-responsive" alt="{{ $promo->casino->name }} Logo"></a>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-md-2 bonus-codes-col-2 text-center"
                                     data-mh="bonus-codes-col-match-height" style="padding-left: 0; padding-right: 0;">
                                    <div class="dark-gray-title">Signup &amp; Get</div>

                                    <div class="green-bonus-amount">{{ $promo->casino->no_deposit_bonus }}</div>
                                </div>

                                <div class="col-xs-12 col-md-3 bonus-codes-col-3 text-center"
                                     data-mh="bonus-codes-col-match-height" style="padding-left: 0; padding-right: 0;">
                                    <div class="dark-gray-title">Deposit &amp; Get</div>

                                    <div class="green-bonus-amount">{{ $promo->casino->first_deposit_bonus }}</div>
                                </div>

                                <div class="col-xs-12 col-md-3 bonus-codes-col-4 text-center">
                                    <div class="use-code-new">
                                        <span class="top-signup-offer-text">ENTER CODE ON SIGNUP</span>
                                        {{ $promo->casino->no_deposit_bonus_code }}
                                    </div>
                                </div>

                                <div class="col-xs-12 col-md-2 bonus-codes-col-5 text-center"
                                     data-mh="bonus-codes-col-match-height">
                                    <?php $explode_permalink = explode(',', $promo->casino->permalink); ?>
                                    <a href="{{ route('front-end.visit-external', ['region' => \App\Casino::findOrFail(\App\PromoCode::findOrFail($promo->id)->casino->id)->region->slug, 'permalink' => $explode_permalink[10]]) }}"
                                       target="_blank" class="btn btn-primary">CLICK HERE TO REDEEM</a>
                                </div>
                            </div>
                        </div>

                        <div class="promo-description">
                            <h1 class="promo-code-title">{{ $promo->casino->name }} Promo Code</h1>

                            <h3 class="max-promo-amount">Promo Amount: {{ $promo->max_promo_amount }}</h3>

                            <div class="single-page-promo-code-description">{!! $promo->description !!}</div>
                        </div>

                        <table class="table table-striped table-responsive table-bordered">
                            <tbody>
                            <tr>
                                <td>Starts On</td>
                                <td>{{ \Carbon\Carbon::parse($promo->start_date)->format('d M, Y') }}</td>
                            </tr>

                            <tr>
                                <td>Expires On</td>
                                <td>{{ \Carbon\Carbon::parse($promo->end_date)->format('d M, Y') }}</td>
                            </tr>

                            <tr>
                                <td>Time Remaining</td>
                                <td><?php $startDate = \Carbon\Carbon::parse($promo->start_date); $endDate = \Carbon\Carbon::parse($promo->end_date); $daysLeft = $endDate->diffForHumans($startDate); ?> {{ $daysLeft }}</td>
                            </tr>

                            <tr>
                                <td>Promo Type</td>
                                <td>{{ $promo->promoType->name }}</td>
                            </tr>

                            <tr>
                                <td>Online Casino</td>
                                <td>
                                    <a href="{{ route('front-end.show-casino', ['region' => \App\Casino::findOrFail(\App\PromoCode::findOrFail($promo->id)->casino->id)->region->slug, 'slug' => $promo->casino->slug]) }}">{{ $promo->casino->name }}</a>
                                </td>
                            </tr>

                            <tr>
                                <td>How To Enter</td>
                                <td>{{ $promo->promoEntry->name }}</td>
                            </tr>

                            <tr>
                                <td>Promo Code</td>
                                <td>{{ $promo->promo_code }}</td>
                            </tr>

                            <tr>
                                <td>Play Now</td>
                                <td>
                                    <?php $explode_permalink2 = explode(',', $promo->casino->permalink); ?>
                                    <a href="{{ route('front-end.visit-external', ['region' => \App\Casino::findOrFail(\App\PromoCode::findOrFail($promo->id)->casino->id)->region->slug, 'permalink' => $explode_permalink2[11]]) }}"
                                       class="btn btn-primary" target="_blank">PLAY NOW</a>
                                </td>
                            </tr>
                            </tbody>
                        </table>

                        <div class="get-exclusive-bonus-codes-new-card" id="claim-bonuses">
                            <div class="exclusive-new-player-offer">Get our exclusive new player offer now!</div>
                            <h3 class="casino-bonus-codes">{{ $promo->casino->name }} Bonus Codes</h3>

                            <div class="row online-casino-bonus-codes-page m-t-15">
                                <div class="col-xs-12 col-md-2 bonus-codes-col-1"
                                     data-mh="bonus-codes-col-match-height">
                                    <div class="m-t-10">
                                        <a href="{{ route('front-end.show-casino', ['region' => \App\Casino::findOrFail(\App\PromoCode::findOrFail($promo->id)->casino->id)->region->slug, 'slug' => $promo->casino->slug]) }}"><img
                                                    src="{{ Image::url(Storage::url($promo->casino->logo), 100, 50, ['crop']) }}"
                                                    class="img-responsive" alt="{{ $promo->casino->name }} Logo"></a>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-md-2 bonus-codes-col-2 text-center"
                                     data-mh="bonus-codes-col-match-height" style="padding-left: 0; padding-right: 0;">
                                    <div class="dark-gray-title">Signup &amp; Get</div>

                                    <div class="green-bonus-amount">{{ $promo->casino->no_deposit_bonus }}</div>
                                </div>

                                <div class="col-xs-12 col-md-3 bonus-codes-col-3 text-center"
                                     data-mh="bonus-codes-col-match-height" style="padding-left: 0; padding-right: 0;">
                                    <div class="dark-gray-title">Deposit &amp; Get</div>

                                    <div class="green-bonus-amount">{{ $promo->casino->first_deposit_bonus }}</div>
                                </div>

                                <div class="col-xs-12 col-md-3 bonus-codes-col-4 text-center">
                                    <div class="use-code-new">
                                        <span class="top-signup-offer-text">ENTER CODE ON SIGNUP</span>
                                        {{ $promo->casino->no_deposit_bonus_code }}
                                    </div>
                                </div>

                                <div class="col-xs-12 col-md-2 bonus-codes-col-5 text-center"
                                     data-mh="bonus-codes-col-match-height">
                                    <?php $explode_permalink3 = explode(',', $promo->casino->permalink); ?>
                                    <a href="{{ route('front-end.visit-external', ['region' => \App\Casino::findOrFail(\App\PromoCode::findOrFail($promo->id)->casino->id)->region->slug, 'permalink' => $explode_permalink3[12]]) }}"
                                       target="_blank" class="btn btn-primary">CLICK HERE TO REDEEM</a>
                                </div>
                            </div>
                        </div>


                        <div class="terms-and-conditions">
                            <h4>Terms and Conditions:</h4>
                            {!! $promo->terms_and_conditions !!}
                        </div>
                    </div>
                </div>

                <div class="col-md-3 get-the-most-free-cash">
                    <div class="span-larger-text">More Information</div>
                    <div class="list-group">
                        <a href="{{ route('front-end.show-parent-post', ['region' => $region_slug[0]['slug']]) }}"
                           class="list-group-item">NJ Online Casino Reviews</a>
                        <a href="{{ route('front-end.bonus-codes', ['region' => $region_slug[0]['slug']]) }}"
                           class="list-group-item">NJ Online Casino No
                            Deposit Bonus Codes</a>
                        <a href="{{ route('front-end.bonus-codes', ['region' => $region_slug[0]['slug']]) }}"
                           class="list-group-item">NJ Online Casino First
                            Deposit Bonus Codes</a>
                        <a href="{{ route('front-end.promo-codes', ['region' => $region_slug[0]['slug']]) }}"
                           class="list-group-item">NJ Online Casino Promo
                            Codes</a>
                        <a href="{{ route('front-end.section.games', ['region' => $region_slug[0]['slug']]) }}"
                           class="list-group-item">NJ Online Casino Games</a>
                        <a href="{{ route('front-end.news', ['region' => $region_slug[0]['slug']]) }}"
                           class="list-group-item">NJ Online Casino News</a>
                    </div>

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
                                    <div class="media-heading"><a href="{{ $casinoSpecialOffer->cta_link }}"
                                                                  target="_blank">{{ $casinoSpecialOffer->cta_text }}</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endunless
                </div>
            </div>
        @endforeach
    @endunless
@endsection

@section('customJS')
    <script>
        $(function () {
            $('.bonus-codes-col-match-height').matchHeight();
        });
    </script>
@endsection