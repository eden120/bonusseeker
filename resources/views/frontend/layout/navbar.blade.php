<div class="row main-navbar-section">
    <nav class="navbar navbar-default container navbar-fixed-top">
        @php $region_slug = \App\Region::where('id', 1)->select('slug')->first(); @endphp
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-navbar-collapse" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span>
                <span class="icon-bar"></span> <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ route('front-end.section.index') }}"><img src="@if($settings->logo === NULL){{ asset('img/logo.svg') }}@else{{ Storage::url($settings->logo) }}@endif" height="65" alt="{{ $settings->name }}"></a>
        </div>

        <div class="collapse navbar-collapse" id="bs-navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="{{ route('front-end.bonus-codes', ['region' => $region_slug]) }}">NJ Online Casino Bonus Codes</a>
                </li>

                <li class="dropdown mega-dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Mobile Casino Apps&nbsp;<span class="ti-angle-down"></span></a>

                    <ul class="dropdown-menu mega-dropdown-menu mega-dropdown-menu-2 row">
                        <li class="col-xs-12 col-sm-6 col-md-6">
                            <ul>
                                <li>
                                    <a href="{{ url('/new-jersey-online-casinos') }}">Real Money Casino Apps</a>
                                </li>
                                <li>
                                    <a href="{{ url('/daily-fantasy-sports-best-us-dfs-sites') }}">DFS Apps</a>
                                </li>
                                <li>
                                    <a href="{{ url('/mobile-casino-apps') }}">Free Slots Apps</a>
                                </li>

                                <li><a href="{{ url('/mobile-casino-apps') }}">See All &#62;&#62;&#62;</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <li class="dropdown mega-dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Legal Gambling Sites&nbsp;<span class="ti-angle-down"></span></a>

                    <ul class="dropdown-menu mega-dropdown-menu row">
                        <li class="col-xs-12 col-sm-4 col-md-2">
                            <ul>
                                <li class="dropdown-header" data-mh="dropdown-header">
                                    <a href="{{ url('/new-jersey-online-casinos') }}">NJ Online Casino Reviews</a></li>

                                <li>
                                    <a href="{{ url('/new-jersey-online-casinos/golden-nugget-online-casino-new-jersey') }}">Golden Nugget Casino</a>
                                </li>
                                <li>
                                    <a href="{{ url('/new-jersey-online-casinos/betfair-online-casino-new-jersey') }}">Betfair Casino</a>
                                </li>
                                <li>
                                    <a href="{{ url('/new-jersey-online-casinos/sugarhouse-online-casino-new-jersey') }}">Sugarhouse Casino</a>
                                </li>
                                <li>
                                    <a href="{{ url('/new-jersey-online-casinos/borgata-online-casino-new-jersey') }}">Borgata Casino</a>
                                </li>
                                <li>
                                    <a href="{{ url('/new-jersey-online-casinos/pala-casino-online-new-jersey') }}">Pala Casino</a>
                                </li>
                                <li><a href="{{ url('/new-jersey-online-casinos') }}">See All &#62;&#62;&#62;</a></li>
                            </ul>
                        </li>

                        <li class="col-xs-12 col-sm-4 col-md-2">
                            <ul>
                                <li class="dropdown-header" data-mh="dropdown-header">
                                    <a href="{{ url('/free-online-bingo-in-nj') }}">NJ Online Bingo Reviews</a></li>

                                <li>
                                    <a href="{{ url('/new-jersey-online-casinos/pala-casino-online-new-jersey') }}">Pala Casino</a>
                                </li>
                                <li>
                                    <a href="{{ url('/new-jersey-online-casinos/tropicana-online-casino-new-jersey') }}">Tropicana Casino</a>
                                </li>
                                <li>
                                    <a href="{{ url('/new-jersey-online-casinos/virgin-casino-online-new-jersey') }}">Virgin Casino</a>
                                </li>
                                <li><a href="{{ url('/free-online-bingo-in-nj') }}">See All &#62;&#62;&#62;</a></li>
                            </ul>
                        </li>

                        <li class="col-xs-12 col-sm-4 col-md-2">
                            <ul>
                                <li class="dropdown-header" data-mh="dropdown-header">
                                    <a href="{{ url('/new-jersey-online-poker') }}">NJ Online Poker Reviews</a></li>

                                <li>
                                    <a href="{{ url('/new-jersey-online-casinos/borgata-online-casino-new-jersey') }}">Borgata Poker</a>
                                </li>
                                <li>
                                    <a href="{{ url('/new-jersey-online-casinos/pala-casino-online-new-jersey') }}">Pala Poker</a>
                                </li>
                                <li>
                                    <a href="{{ url('/new-jersey-online-casinos/poker-stars-online-casino-new-jersey') }}">Poker Stars</a>
                                </li>
                                <li><a href="{{ url('/new-jersey-online-poker') }}">See All &#62;&#62;&#62;</a></li>
                            </ul>
                        </li>

                        <li class="col-xs-12 col-sm-4 col-md-2">
                            <ul>
                                <li class="dropdown-header" data-mh="dropdown-header">
                                    <a href="{{ url('/daily-fantasy-sports-best-us-dfs-sites') }}">Daily Fantasy Sports Site Reviews</a>
                                </li>

                                <li>
                                    <a href="{{ url('/daily-fantasy-sports-best-us-dfs-sites/fantasydraft') }}">Fantasy Draft</a>
                                </li>
                                <li>
                                    <a href="{{ url('/daily-fantasy-sports-best-us-dfs-sites/boom-fantasy') }}">Boom Fantasy</a>
                                </li>
                                <li><a href="{{ url('/daily-fantasy-sports-best-us-dfs-sites/fanduel') }}">Fan Duel</a>
                                </li>
                                <li><a href="{{ url('/daily-fantasy-sports-best-us-dfs-sites/fastpick') }}">Fastpick</a>
                                </li>
                                <li>
                                    <a href="{{ url('/daily-fantasy-sports-best-us-dfs-sites') }}">See All &#62;&#62;&#62;</a>
                                </li>
                            </ul>
                        </li>

                        <li class="col-xs-12 col-sm-4 col-md-2">
                            <ul>
                                <li class="dropdown-header" data-mh="dropdown-header">
                                    <a href="{{ url('/horse-racing-online-betting-sites-in-us') }}">Horse Racing Betting Sites</a>
                                </li>

                                <li>
                                    <a href="{{ url('/horse-racing-online-betting-sites-in-us/derby-jackpot') }}">DerbyJackpot</a>
                                </li>
                                <li><a href="{{ url('/horse-racing-online-betting-sites-in-us/tvg') }}">TVG</a></li>
                                <li>
                                    <a href="{{ url('/horse-racing-online-betting-sites-in-us/twinspires') }}">Twinspires</a>
                                </li>
                                <li>
                                    <a href="{{ url('/horse-racing-online-betting-sites-in-us') }}">See All &#62;&#62;&#62;</a>
                                </li>
                            </ul>
                        </li>

                        <li class="col-xs-12 col-sm-4 col-md-2">
                            <ul>
                                <li class="dropdown-header" data-mh="dropdown-header">
                                    <a href="{{ url('/online-casinos-in-pennsylvania') }}">Pennsylvania Online Gambling Reviews</a>
                                </li>

                                <li>
                                    <a href="{{ url('/online-casinos-in-pennsylvania/rivers-casino-online') }}">Rivers Casino</a>
                                </li>
                                <li>
                                    <a href="{{ url('/online-casinos-in-pennsylvania/parx-casino-online') }}">Parx Casino</a>
                                </li>
                                <li>
                                    <a href="{{ url('/online-casinos-in-pennsylvania/sands-casino-online') }}">Sands Casino</a>
                                </li>
                                <li>
                                    <a href="{{ url('/online-casinos-in-pennsylvania/harrahs-online-casino-pa') }}">Harrahs Casino</a>
                                </li>
                                <li><a href="{{ url('/online-casinos-in-pennsylvania') }}">See All &#62;&#62;&#62;</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="{{ route('front-end.section.games') }}">Free Games</a>
                </li>

                <li><a href="{{ route('front-end.news', ['region' => $region_slug]) }}">News</a></li>
            </ul>
        </div>
    </nav>
</div>