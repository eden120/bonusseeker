<nav class="navbar navbar-default">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                data-target="#admin-navbar-collapse" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{ route('admin.dashboard') }}">{{ config('app.name') }}</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="admin-navbar-collapse">
        <ul class="nav navbar-nav">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Operators
                    <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="{{ route('admin.casinos.index') }}">All Operators</a></li>
                    <li><a href="{{ route('admin.casinos.create') }}">Add Operator</a></li>
                    <li><a href="{{ route('admin.operator-slider.index') }}">Operator Sliders</a></li>
                </ul>
            </li>

            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Promo Codes
                    <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="{{ route('admin.promo-codes.index')  }}">All Promo Codes</a></li>
                    <li><a href="{{ route('admin.promo-codes.create') }}">Add Promo Code</a></li>
                    <li><a href="{{ route('admin.promo-types.index') }}">Promo Types</a></li>
                    <li><a href="{{ route('admin.how-to-enter.index') }}">How To Enter?</a></li>
                </ul>
            </li>

            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Games
                    <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="{{ route('admin.games.index') }}">All Games</a></li>
                    <li><a href="{{ route('admin.games.create') }}">Add Game</a></li>
                    <li><a href="{{ route('admin.game-providers.index') }}">Game Providers</a></li>
                    <li><a href="{{ route('admin.game-categories.index') }}">Game Categories</a></li>
                </ul>
            </li>

            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">News
                    <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="{{ route('admin.news.index') }}">All News</a></li>
                    <li><a href="{{ route('admin.news.create') }}">Add News</a></li>
                    <li><a href="{{ route('admin.news-categories.index') }}">Categories</a></li>
                </ul>
            </li>

            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Newsletter
                    <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="{{ route('admin.newsletter.index') }}">Subscribers</a></li>
                    <li><a href="{{ route('admin.newsletter.archived') }}">Archived Subscribers</a></li>
                </ul>
            </li>
        </ul>

        <ul class="nav navbar-nav navbar-right">
            <li>
                <a href="{{ route('front-end.section.index') }}" target="_blank" title="View Site"><i class="ti-world"></i></a>
            </li>

            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::guard('admin')->user()->name }}
                    <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="#"><i class="ti-user"></i>&nbsp; Profile</a></li>
                    <li><a href="#"><i class="ti-stats-up"></i>&nbsp; Stats</a></li>
                    <li><a href="#"><i class="ti-settings"></i>&nbsp; Settings</a></li>
                    <li role="separator" class="divider"></li>
                    <li>
                        <a href="{{ route('admin.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="ti-power-off"></i>&nbsp; Logout</a>

                        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </div><!-- /.navbar-collapse -->
</nav>