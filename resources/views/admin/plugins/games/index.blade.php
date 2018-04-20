@extends('admin.layout.master')

@section('title', 'All Games')

@section('content')
    <div class="panel panel-default primary-container">
        <div class="panel-heading">&#127920; All Games</div>

        <div class="panel-body">

            @if (session('gameCreated'))
                <div class="alert alert-success" role="alert">
                    <strong>{{ session('gameCreated') }}</strong>
                </div>
            @endif

            @if (session('gameUpdated'))
                <div class="alert alert-success" role="alert">
                    <strong>{{ session('gameUpdated') }}</strong>
                </div>
            @endif

            @if (session('gameDeleted'))
                <div class="alert alert-success" role="alert">
                    <strong>{{ session('gameDeleted') }}</strong>
                </div>
            @endif

            @if (session('gameLogoUpdated'))
                <div class="alert alert-success" role="alert">
                    <strong>{{ session('gameLogoUpdated') }}</strong>
                </div>
            @endif

            <div class="row">
                <div class="col-md-6">
                    <a href="{{ route('admin.games.index') }}" class="btn btn-primary">&#127920; All
                        Games</a>

                    <a href="{{ route('admin.games.create') }}" class="btn btn-success">&#127920;
                        Add
                        New</a>
                </div>

                <div class="col-md-6">
                    <div class="form-group pull-right">
                        <input type="text" class="search form-control" placeholder="Search Games...">
                    </div>
                    <span class="table-search-counter pull-right"></span>
                </div>
            </div>

            <table class="table table-bordered table-striped table-hover table-responsive table-search"
                   id="gamesTable">
                <thead>
                <tr>
                    <th class="text-center">Status</th>
                    <th class="text-center">Game Name</th>
                    <th class="text-center">Logo</th>
                    <th class="text-center">Game Provider</th>
                    <th class="text-center">Game Category</th>
                </tr>
                </thead>
                <tbody>

                @unless(empty($games))
                    @foreach($games as $game)
                        <tr style="height: 80px;">
                            <td class="text-center" style="width: 10%;">
                                @if($game->is_active === 1)
                                    <span class="btn btn-success">Published</span>
                                @elseif($game->is_active === 0)
                                    <span class="btn btn-warning">Drafted</span>
                                @endif
                            </td>

                            <td class="text-center"><a
                                        href="{{ route('admin.games.edit', ['slug' => $game->slug]) }}">{{ $game->name }}</a>
                            </td>

                            <td class="text-center" style="width: 80px;"><img
                                        src="{{ Image::url(Storage::url($game->logo), 80, 80) }}"
                                        alt="{{ $game->name }}"></td>

                            <td class="text-center"><a
                                        href="{{ route('admin.game-providers.edit', ['slug' => \App\Game::findOrFail($game->id)->providerId->slug]) }}">{{ \App\Game::findOrFail($game->id)->providerId->name }}</a>
                            </td>

                            <td class="text-center">
                                <a href="{{ route('admin.game-categories.edit', ['slug' => \App\Game::findOrFail($game->id)->categoryId->slug]) }}">{{ \App\Game::findOrFail($game->id)->categoryId->name }}</a>
                            </td>
                        </tr>

                    @endforeach
                @endunless

                </tbody>
            </table>

            {{-- Pagination --}}
            {{ $games->links('vendor/pagination/bootstrap-4') }}

        </div>
    </div>
@endsection

@section('customJS')
    <script>
        $(document).ready(function () {
            $(".search").keyup(function () {
                var searchTerm  = $(".search").val();
                var listItem    = $('.table-search tbody').children('tr');
                var searchSplit = searchTerm.replace(/ /g, "'):containsi('");

                $.extend($.expr[':'], {
                    'containsi': function (elem, i, match, array) {
                        return (elem.textContent || elem.innerText || '').toLowerCase().indexOf((match[3] || "").toLowerCase()) >= 0;
                    }
                });

                $(".table-search tbody tr").not(":containsi('" + searchSplit + "')").each(function (e) {
                    $(this).attr('visible', 'false');
                });

                $(".table-search tbody tr:containsi('" + searchSplit + "')").each(function (e) {
                    $(this).attr('visible', 'true');
                });

                var jobCount = $('.table-search tbody tr[visible="true"]').length;
                $('.table-search-counter').text(jobCount + ' item');

                if (jobCount == '0') {
                    $('.table-search-no-result').show();
                }
                else {
                    $('.table-search-no-result').hide();
                }
            });
        });
    </script>
@endsection