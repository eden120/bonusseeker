<div class="nj-online-games" id="index-page-online-games">
    <h2 class="intro-text text-center">
        <a href="{{ route('front-end.section.games', ['region' => $region_slug[0]['slug']]) }}">LEGAL NJ ONLINE CASINO GAMES</a>
    </h2>

    <div class="game-nav-tabs m-t-10 m-b-10" style="background-color: #ffffff;">
        <ul class="nav nav-tabs nav-justified">
            <li class="active"><a href="#featured-games" data-toggle="tab">Featured</a></li>
            <li><a href="#slots" data-toggle="tab">Slots</a></li>
            <li><a href="#table-games" data-toggle="tab">Table Games</a></li>
            <li><a href="#video-poker" data-toggle="tab">Video Poker</a></li>
            <li><a href="#live-dealer" data-toggle="tab">Live Dealer</a></li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane active" id="featured-games">
                <div class="row" style="margin: 10px;">
                    @unless(empty($featuredGames))
                        @foreach($featuredGames as $featuredGame)
                            <div class="col-xs-12 col-sm-4 col-md-5ths games-card-with-thumbnail">
                                <div class="games-card-content">
                                    <a href="{{ route('front-end.section.show-game', ['slug' => $featuredGame->slug]) }}">
                                        <img src="{{ Image::url(Storage::url($featuredGame->logo), 240, 160, ['crop']) }}" alt="{{ $featuredGame->name }}" class="img-responsive"></a>
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
                </div>
            </div>
            <div class="tab-pane" id="slots">
                <div class="row" style="margin: 10px;">
                    @unless(empty($allSlotsGames))
                        @foreach($allSlotsGames as $allSlotsGame)
                            <div class="col-xs-12 col-sm-4 col-md-5ths games-card-with-thumbnail">
                                <div class="games-card-content">
                                    <a href="{{ route('front-end.section.show-game', ['slug' => $allSlotsGame->slug]) }}">
                                        <img src="{{ Image::url(Storage::url($allSlotsGame->logo), 240, 160, ['crop']) }}" alt="{{ $allSlotsGame->name }}" class="img-responsive"></a>
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
                </div>
            </div>

            <div class="tab-pane" id="table-games">
                <div class="row" style="margin: 10px;">
                    @unless(empty($allTableGames))
                        @foreach($allTableGames as $allTableGame)
                            <div class="col-xs-12 col-sm-4 col-md-5ths games-card-with-thumbnail">
                                <div class="games-card-content">
                                    <a href="{{ route('front-end.section.show-game', ['slug' => $allTableGame->slug]) }}">
                                        <img src="{{ Image::url(Storage::url($allTableGame->logo), 240, 160, ['crop']) }}" alt="{{ $allTableGame->name }}" class="img-responsive"></a>
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
                </div>
            </div>

            <div class="tab-pane" id="video-poker">
                <div class="row" style="margin: 10px;">
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
                </div>
            </div>

            <div class="tab-pane" id="live-dealer">
                <div class="row" style="margin: 10px;">
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
                </div>
            </div>
        </div>
    </div>

    <h3 class="index-page-games-footer-title text-center">SEE ALL
        <a href="{{ route('front-end.section.games', ['region' => $region_slug[0]['slug']]) }}" class="btn-large">NJ ONLINE CASINO GAMES</a>
    </h3>
</div>