@extends('frontend.layout.master-for-single-page')

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
      "name": "The Best Online Casino Games",
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
                <ol class="breadcrumb">
                    <li><a href="{{ route('front-end.section.index') }}">Legal Online Gambling</a></li>
                    <li class="active">The Best Online Casino Games</li>
                </ol>
            </div>
        </div>
    @endif

    <h1 class="intro-text text-center">The Best Online Casino Games</h1>

    <div class="row game-search-section">
        <div class="col-xs-12 col-sm-4 col-sm-offset-2 game-search-bar">
            <select class="selectpicker" data-live-search="true" title="Search" onchange="location = this.value;">
                @unless(empty($games))
                    @foreach($games as $game)
                        <option value="{{ route('front-end.section.show-game', ['slug' => $game->slug]) }}">{{ $game->name }}</option>
                    @endforeach
                @endunless
            </select>
        </div>

        <div class="col-xs-12 col-sm-4 game-category-and-providers">
            <select class="selectpicker" data-live-search="true" title="Providers" onchange="location = this.value;">
                @unless(empty($providers))
                    @foreach($providers as $provider)
                        <option value="{{ route('front-end.section.game-providers', ['slug' => $provider->slug]) }}">{{ $provider->name }}</option>
                    @endforeach
                @endunless
            </select>
        </div>
    </div>

    <div class="nj-online-games m-t-0">
        <div class="game-nav-tabs m-t-10 m-b-20" style="background-color: #ffffff;">
            <ul class="nav nav-tabs nav-justified">
                <li class="active"><a href="#featured-games" data-toggle="tab">Featured</a></li>
                <li><a href="#slots" data-toggle="tab">Slots</a></li>
                <li><a href="#table-games" data-toggle="tab">Table Games</a></li>
                <li><a href="#video-poker" data-toggle="tab">Video Poker</a></li>
                <li><a href="#live-dealer" data-toggle="tab">Live Dealer</a></li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane active" id="featured-games">
                    <div class="row p-t-5" style="margin: 10px;">
                        @unless(empty($featuredGames))
                            @foreach($featuredGames as $featuredGame)
                                <div class="col-xs-12 col-sm-4 col-md-5ths games-card-with-thumbnail">
                                    <div class="games-card-content">
                                        <a href="{{ route('front-end.section.show-game', ['slug' => $featuredGame->slug]) }}">
                                            <img src="{{ Image::url(Storage::url($featuredGame->logo), 240, 160, ['crop']) }}" alt="{{ $featuredGame->name }}" class="img-responsive">
                                        </a>

                                        <div class="play-game-anchor">
                                            <a href="{{ route('front-end.section.show-game', ['slug' => $featuredGame->slug]) }}">
                                                {{ $featuredGame->name }}
                                            </a>
                                        </div>

                                        <div class="games-hover-card">
                                            <div style="margin-top: 25%;"></div>
                                            <a href="{{ route('front-end.section.show-game', ['slug' => $featuredGame->slug]) }}" class="btn btn-default m-b-10" rel="tooltip">DEMO PLAY</a>
                                            <a href="{{ $featuredGame->providerId->cta_link }}" class="btn btn-primary" rel="tooltip" target="_blank">PLAY FOR CASH</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endunless

                        {{ $featuredGames->links('vendor/pagination/bootstrap-4') }}
                    </div>
                </div>
                <div class="tab-pane" id="slots">
                    <div class="row p-t-5" style="margin: 10px;">
                        @unless(empty($allSlotsGames))
                            @foreach($allSlotsGames as $allSlotsGame)
                                <div class="col-xs-12 col-sm-4 col-md-5ths games-card-with-thumbnail">
                                    <div class="games-card-content">
                                        <a href="{{ route('front-end.section.show-game', ['slug' => $allSlotsGame->slug]) }}">
                                            <img src="{{ Image::url(Storage::url($allSlotsGame->logo), 240, 160, ['crop']) }}" alt="{{ $allSlotsGame->name }}" class="img-responsive">
                                        </a>

                                        <div class="play-game-anchor">
                                            <a href="{{ route('front-end.section.show-game', ['slug' => $allSlotsGame->slug]) }}">
                                                {{ $allSlotsGame->name }}
                                            </a>
                                        </div>

                                        <div class="games-hover-card">
                                            <div style="margin-top: 25%;"></div>
                                            <a href="{{ route('front-end.section.show-game', ['slug' => $allSlotsGame->slug]) }}" class="btn btn-default m-b-10" rel="tooltip">DEMO PLAY</a>
                                            <a href="{{ $allSlotsGame->providerId->cta_link }}" class="btn btn-primary" rel="tooltip" target="_blank">PLAY FOR CASH</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endunless

                        {{ $allSlotsGames->links('vendor/pagination/bootstrap-4') }}
                    </div>
                </div>

                <div class="tab-pane" id="table-games">
                    <div class="row p-t-5" style="margin: 10px;">
                        @unless(empty($allTableGames))
                            @foreach($allTableGames as $allTableGame)
                                <div class="col-xs-12 col-sm-4 col-md-5ths games-card-with-thumbnail">
                                    <div class="games-card-content">
                                        <a href="{{ route('front-end.section.show-game', ['slug' => $allTableGame->slug]) }}">
                                            <img src="{{ Image::url(Storage::url($allTableGame->logo), 240, 160, ['crop']) }}" alt="{{ $allTableGame->name }}" class="img-responsive">
                                        </a>

                                        <div class="play-game-anchor">
                                            <a href="{{ route('front-end.section.show-game', ['slug' => $allTableGame->slug]) }}">
                                                {{ $allTableGame->name }}
                                            </a>
                                        </div>

                                        <div class="games-hover-card">
                                            <div style="margin-top: 25%;"></div>
                                            <a href="{{ route('front-end.section.show-game', ['slug' => $allTableGame->slug]) }}" class="btn btn-default m-b-10" rel="tooltip">DEMO PLAY</a>
                                            <a href="{{ $allTableGame->providerId->cta_link }}" class="btn btn-primary" rel="tooltip" target="_blank">PLAY FOR CASH</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endunless

                        {{ $allTableGames->links('vendor/pagination/bootstrap-4') }}
                    </div>
                </div>

                <div class="tab-pane" id="video-poker">
                    <div class="row p-t-5" style="margin: 10px;">
                        @unless(empty($allVideoPokerGames))
                            @foreach($allVideoPokerGames as $allVideoPokerGame)
                                <div class="col-xs-12 col-sm-4 col-md-5ths games-card-with-thumbnail">
                                    <div class="games-card-content">
                                        <a href="{{ route('front-end.section.show-game', ['slug' => $allVideoPokerGame->slug]) }}">
                                            <img src="{{ Image::url(Storage::url($allVideoPokerGame->logo), 240, 160, ['crop']) }}" alt="{{ $allVideoPokerGame->name }}" class="img-responsive">
                                        </a>

                                        <div class="play-game-anchor">
                                            <a href="{{ route('front-end.section.show-game', ['slug' => $allVideoPokerGame->slug]) }}">
                                                {{ $allVideoPokerGame->name }}
                                            </a>
                                        </div>

                                        <div class="games-hover-card">
                                            <div style="margin-top: 25%;"></div>
                                            <a href="{{ route('front-end.section.show-game', ['slug' => $allVideoPokerGame->slug]) }}" class="btn btn-default m-b-10" rel="tooltip">DEMO PLAY</a>
                                            <a href="{{ $allVideoPokerGame->providerId->cta_link }}" class="btn btn-primary" rel="tooltip" target="_blank">PLAY FOR CASH</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endunless

                        {{ $allVideoPokerGames->links('vendor/pagination/bootstrap-4') }}
                    </div>
                </div>

                <div class="tab-pane" id="live-dealer">
                    <div class="row p-t-5" style="margin: 10px;">
                        @unless(empty($liveDealerGames))
                            @foreach($liveDealerGames as $liveDealerGame)
                                <div class="col-xs-12 col-sm-4 col-md-5ths games-card-with-thumbnail">
                                    <div class="games-card-content">
                                        <a href="{{ route('front-end.section.show-game', ['slug' => $liveDealerGame->slug]) }}">
                                            <img src="{{ Image::url(Storage::url($liveDealerGame->logo), 240, 160, ['crop']) }}" alt="{{ $liveDealerGame->name }}" class="img-responsive">
                                        </a>

                                        <div class="play-game-anchor">
                                            <a href="{{ route('front-end.section.show-game', ['slug' => $liveDealerGame->slug]) }}">
                                                {{ $liveDealerGame->name }}
                                            </a>
                                        </div>

                                        <div class="games-hover-card">
                                            <div style="margin-top: 25%;"></div>
                                            <a href="{{ route('front-end.section.show-game', ['slug' => $liveDealerGame->slug]) }}" class="btn btn-default m-b-10" rel="tooltip">DEMO PLAY</a>
                                            <a href="{{ $liveDealerGame->providerId->cta_link }}" class="btn btn-primary" rel="tooltip" target="_blank">PLAY FOR CASH</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endunless

                        {{ $liveDealerGames->links('vendor/pagination/bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('customJS')
    <script>
        $(function() {
            $('.games-card-content').hover(
                function() {
                    $(this).find('.games-hover-card').slideDown(250); //.fadeIn(250)
                },
                function() {
                    $(this).find('.games-hover-card').slideUp(250); //.fadeOut(205)
                }
            );
        })
    </script>

    <script>
        $(function() {
            $('.games-card-with-thumbnail').matchHeight();
        });
    </script>
@endsection