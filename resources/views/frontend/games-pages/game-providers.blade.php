@extends('frontend.layout.master')

@section('content')
    @unless(empty($getGameProvider))
        @php $providerBasedGames = \App\Game::with(['providerId', 'categoryId'])->where([
                'is_active'   => 1,
                'provider_id' => $getGameProvider->id
            ])->get() @endphp
    @endunless

    <?php $agent = new Jenssegers\Agent\Agent(); ?>
    @if(!$agent->isMobile())
        <div class="row">
            <div class="col-xs-12 col-md-10 m-t-20">
                <ol class="breadcrumb">
                    <li><a href="{{ route('front-end.section.index') }}">Legal Online Gambling</a></li>
                    <li><a href="{{ url()->current() }}">Games developed by {{ $getGameProvider->name }}</a></li>
                    <li class="active">@unless(empty($providerBasedGames)) {{ $providerBasedGames->count() }}@endunless Games available in {{ $getGameProvider->name }}</li>
                </ol>
            </div>
        </div>
    @endif

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

    <div class="nj-online-games">
        <div class="game-nav-tabs m-t-10 m-b-20" style="background-color: #ffffff;">
            <div class="tab-content">
                <div class="tab-pane active" id="featured-games">
                    <div class="row p-t-15" style="margin: 10px;">
                        @unless(empty($providerBasedGames))
                            @foreach($providerBasedGames as $providerBasedGame)
                                <div class="col-xs-12 col-sm-4 col-md-5ths games-card-with-thumbnail">
                                    <div class="games-card-content">
                                        <a href="{{ route('front-end.section.show-game', ['slug' => $providerBasedGame->slug]) }}">
                                            <img src="{{ Image::url(Storage::url($providerBasedGame->logo), 240, 160, ['crop']) }}" alt="{{ $providerBasedGame->name }}" class="img-responsive">
                                        </a>
                                        <div class="play-game-anchor">
                                            <a href="{{ route('front-end.section.show-game', ['slug' => $providerBasedGame->slug]) }}">
                                                {{ $providerBasedGame->name }}
                                            </a>
                                        </div>

                                        <div class="games-hover-card">
                                            <div style="margin-top: 25%;"></div>
                                            <a href="{{ route('front-end.section.show-game', ['slug' => $providerBasedGame->slug]) }}" class="btn btn-default m-b-10" rel="tooltip">DEMO PLAY</a>
                                            <a href="{{ $providerBasedGame->providerId->cta_link }}" class="btn btn-primary" rel="tooltip" target="_blank">PLAY FOR CASH</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endunless
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
            )
        })
    </script>

    <script>
        $(function() {
            $('.games-card-with-thumbnail').matchHeight();
        });
    </script>
@endsection