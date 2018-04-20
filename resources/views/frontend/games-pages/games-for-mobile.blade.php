@extends('frontend.layout.master')

@section('title', 'Online Casino Games for Mobile - ')

@section('content')
    <?php $agent = new Jenssegers\Agent\Agent(); ?>
    @if(!$agent->isMobile())
        <div class="row">
            <div class="col-xs-12 col-md-6 m-t-20">
                <ol class="breadcrumb">
                    <li><a href="{{ route('front-end.section.index') }}">Legal Online Gambling</a></li>
                    <li class="active">Online Casino Games</li>
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

    <div class="row all-games-section">
        @unless(empty($publishedGames))
            @foreach($publishedGames as $publishedGame)
                <div class="col-sm-4 col-md-3 game-card">
                    <div class="thumbnail">
                        <a href="{{ route('front-end.section.show-game', ['slug' => $publishedGame->slug]) }}"><img src="{{ Image::url(Storage::url($publishedGame->logo), 240, 160, ['crop']) }}"
                                    alt="{{ $publishedGame->name }}" class="img-rounded" height="160"></a>
                        <div class="caption">
                            <div class="text-center game-link">
                                <a href="{{ route('front-end.section.show-game', ['slug' => $publishedGame->slug]) }}">{{ $publishedGame->name }}</a>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <a href="{{ route('front-end.section.show-game', ['slug' => $publishedGame->slug]) }}" class="btn btn-primary">Play Now</a>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <p class="text-right game-provider">{{ \App\Game::findOrFail($publishedGame->id)->providerId->name }}</p>
                                    <p class="text-right game-category">{{ \App\Game::findOrFail($publishedGame->id)->categoryId->name }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endunless
    </div>

    {{ $publishedGames->links('vendor/pagination/bootstrap-4') }}
@endsection