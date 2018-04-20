@extends('frontend.layout.master')

@section('title')
    {{ 'New Jersey Online Casinos - ' }}
@endsection

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
    }, {
        "@type": "ListItem",
        "position": 2,
        "item": {
            "@id": "{{ url()->current() }}",
            "name": "Legal Online Gambling",
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
            <div class="col-md-6 m-t-20">
                <ol class="breadcrumb m-b-0">
                    <li><a href="{{ route('front-end.section.index') }}">Legal Online Gambling</a></li>
                    <li class="active">Legal Online Gambling</li>
                </ol>
            </div>
        </div>
    @endif

    <div class="online-casinos">
        <div class="intro-text-and-description">
            <h1 class="intro-text text-center">NEW JERSEY ONLINE CASINOS</h1>

            <div class="intro-description text-center m-t-10" style="font-size: 110%; font-weight: 600;">We have reviewed and ranked all online casinos in New Jersey based primarily on their available games, cash offers to new players AND rewards available to existing players.
            </div>
        </div>
    </div>

    <div class="row index-page-best-online-casinos p-t-15 m-b-15">
        @unless(empty($casinos))
            @foreach($casinos as $casino)
                <div class="row index-page-best-online-casino-card">
                    <div
                            class="col-xs-12 col-sm-4 col-md-2 index-page-best-online-casino-col-1 text-center" data-mh="best-online-casino-match-height"
                    >
                        <span class="rating-badge">{{ $casino->sort_by }}</span>
                        <a href="{{ route('front-end.show-casino', ['region' => \App\Casino::findOrFail($casino->id)->region->slug, 'casino' => $casino->slug]) }}"><img
                                    src="{{ Image::url(Storage::url($casino->logo), 150, 75, ['crop']) }}" alt="{{ $casino->name }} Logo" width="150" height="75"
                            ></a>

                        <div class="m-t-10">
                            <?php $explode_permalink = explode(',', $casino->permalink); ?>
                            <a
                                    href="{{ route('front-end.visit-external', ['region' => \App\Casino::findOrFail($casino->id)->region->slug, 'permalink' => $explode_permalink[0]]) }}" class="visit-site" target="_blank"
                            >Visit Site</a>
                        </div>
                    </div>

                    <div
                            class="col-xs-12 col-sm-4 col-md-2 index-page-best-online-casino-col-2 text-center" data-mh="best-online-casino-match-height"
                    >
                        <strong>RATING</strong><br>
                        <div class="item-rating-title"><span class="item-rating-description" style="color: #2e4053">
                                <?php $ratings = [$casino->editors_review_casino_bonus, $casino->editors_review_game_selection, $casino->editors_review_support, $casino->editors_review_banking]; ?>
                                {{ round(array_sum($ratings) / 4, 2) }}
                            </span> / 5<br>
                        </div>
                        <input
                                title="{{ round(array_sum($ratings) / 4, 2) }}" value="{{ round(array_sum($ratings) / 4, 2) }}" class="rating" data-min="0" data-max="5" data-step="0.1" data-display-only="true" data-size="xs"
                        >
                    </div>

                    <div
                            class="col-xs-12 col-sm-4 col-md-3 index-page-best-online-casino-col-3" data-mh="best-online-casino-match-height"
                    >
                        <div class="bold-600">SPECIAL FEATURES</div>
                        {!! $casino->special_features !!}
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

                    <div class="col-xs-12 col-sm-4 col-md-2 index-page-best-online-casino-col-4 text-center" data-mh="best-online-casino-match-height">
                        <strong>FREE PLAY</strong><br>
                        <span class="bonus-code-amount-green">@if(!empty($casino->no_deposit_bonus_amount)){{ $casino->no_deposit_bonus_amount }}</span> Free @endif

                        <div class="use-code-section">
                            <div class="use-code-new">
                                <span class="top-signup-offer-text">ENTER CODE ON SIGNUP</span>
                                {{ $casino->no_deposit_bonus_code }}
                            </div>
                        </div>
                    </div>

                    <div
                            class="col-xs-12 col-sm-4 col-md-3 index-page-best-online-casino-col-5 text-center" data-mh="best-online-casino-match-height"
                    >
                        <div class="show-casino-anchored-name">
                            <a href="{{ route('front-end.show-casino', ['region' => \App\Casino::findOrFail($casino->id)->region->slug, 'casino' => $casino->slug]) }}">{{ $casino->name }}
                                Review</a>
                        </div>

                        <div class="play-now-button">
                            <?php $explode_permalink = explode(',', $casino->permalink); ?>
                            <a href="{{ route('front-end.visit-external', ['region' => \App\Casino::findOrFail($casino->id)->region->slug, 'permalink' => $explode_permalink[14]]) }}" class="btn btn-primary" target="_blank">PLAY NOW</a>
                        </div>
                    </div>
                </div>
            @endforeach
        @endunless
    </div>

    <div class="plugin-description">
        @unless(empty($page_modules))
            @foreach($page_modules as $page_module)
                {!! $page_module->contents !!}
            @endforeach
        @endunless
    </div>
@endsection

@section('customJS')
    <script>
        $(function () {
            $('.best-online-casino-match-height').matchHeight();
        });
    </script>
@endsection