@extends('admin.layout.master')

@section('title', 'All Game Providers')

@section('customCSS')
    <link href="{{ asset('css/bootstrap-select.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    @if (session('gameProviderCreated'))
        <div class="alert alert-success" role="alert">
            <strong>{{ session('gameProviderCreated') }}</strong>
        </div>
    @endif

    @if (session('gameProviderUpdated'))
        <div class="alert alert-success" role="alert">
            <strong>{{ session('gameProviderUpdated') }}</strong>
        </div>
    @endif

    @if (session('gameProviderDeleted'))
        <div class="alert alert-success" role="alert">
            <strong>{{ session('gameProviderDeleted') }}</strong>
        </div>
    @endif

    <div class="panel panel-default primary-container">
        <div class="panel-heading">
            <i class="ti-plus"></i> Create Game Provider
        </div>
        <div class="panel-body">
            <form action="{{ route('admin.game-providers.store') }}" method="post">
                <div class="row">
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} col-md-6">
                        <label for="name">Game Provider Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}"
                               placeholder="Game Provider Name" maxlength="255" data-max="255">

                        <p class="help-block char-max-alert"></p>

                        @if ($errors->has('name'))
                            <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('slug') ? ' has-error' : '' }} col-md-6">
                        <label for="slug">URL Slug</label>
                        <input type="text" class="form-control" id="slug" name="slug" value="{{ old('slug') }}"
                               placeholder="URL Slug" maxlength="255" data-max="255">

                        <p class="help-block char-max-alert"></p>

                        @if ($errors->has('slug'))
                            <span class="help-block">
                                <strong>{{ $errors->first('slug') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="form-group{{ $errors->has('cta_text') ? ' has-error' : '' }} col-md-6">
                        <label for="cta_text">CTA Text</label>
                        <input type="text" class="form-control" id="cta_text" name="cta_text"
                               value="{{ old('cta_text') }}" placeholder="CTA Text" maxlength="100" data-max="100">

                        <p class="help-block char-max-alert"></p>

                        @if ($errors->has('cta_text'))
                            <span class="help-block">
                                <strong>{{ $errors->first('cta_text') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('cta_link') ? ' has-error' : '' }} col-md-6">
                        <label for="cta_link">CTA Link</label>
                        <input type="text" class="form-control" id="cta_link" name="cta_link"
                               value="{{ old('cta_link') }}" placeholder="CTA Link" maxlength="1536" data-max="1536">

                        <p class="help-block char-max-alert"></p>

                        @if ($errors->has('cta_link'))
                            <span class="help-block">
                                <strong>{{ $errors->first('cta_link') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                {{ csrf_field() }}

                <div class="row">
                    <div class="form-group{{ $errors->has('is_active') ? ' has-error' : '' }} col-md-6">

                        <select class="selectpicker form-control" name="is_active" id="is_active">
                            <option value="1" selected="selected">Publish</option>
                            <option value="0">Draft</option>
                        </select>

                        @if ($errors->has('is_active'))
                            <span class="help-block">
                            <strong>{{ $errors->first('is_active') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="col-md-6">
                        <button type="submit" class="btn btn-success"><i class="ti-save"></i> Save Changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <div class="panel panel-default primary-container">
        <div class="panel-heading"><i class="ti-server"></i> All Game Providers</div>

        <div class="panel-body">

            <div class="row">
                <div class="col-md-6">
                    <a href="{{ route('admin.game-providers.index') }}" class="btn btn-primary"><i
                                class="ti-server"></i>
                        All
                        Game Providers</a>
                </div>

                <div class="col-md-6">
                    <div class="form-group pull-right">
                        <input type="text" class="search form-control" placeholder="Search Game Providers...">
                    </div>
                    <span class="table-search-counter pull-right"></span>
                </div>
            </div>

            <table class="table table-bordered table-striped table-hover table-responsive table-search"
                   id="gameProvidersTable">
                <thead>
                <tr>
                    <th class="text-center">Status</th>
                    <th class="text-center">Game Provider Name</th>
                    <th class="text-center" style="width: 15%;">Edit</th>
                </tr>
                </thead>
                <tbody>

                @unless(empty($game_providers))
                    @foreach($game_providers as $game_provider)
                        <tr>
                            <td class="text-center" style="width: 10%;">
                                @if($game_provider->is_active === 1)
                                    <span class="btn btn-success">Published</span>
                                @elseif($game_provider->is_active === 0)
                                    <span class="btn btn-warning">Drafted</span>
                                @endif
                            </td>

                            <td class="text-center"><a
                                        href="{{ route('admin.game-providers.edit', ['slug' => $game_provider->slug]) }}">{{ $game_provider->name }}</a>
                            </td>

                            <td class="text-center">
                                <a href="{{ route('admin.game-providers.edit', ['slug' => $game_provider->slug]) }}"
                                   class="btn btn-primary"><i class="ti-pencil-alt"></i></a>
                            </td>
                        </tr>

                    @endforeach
                @endunless

                </tbody>
            </table>

            {{-- Pagination --}}
            {{ $game_providers->links('vendor/pagination/bootstrap-4') }}

        </div>
    </div>
@endsection

@section('customJS')
    <script src="{{ asset('js/speakingurl.min.js') }}"></script>
    <script src="{{ asset('js/slugify.min.js') }}"></script>
    <script>
        jQuery(function ($) {
            $('#slug').slugify('#name');
        });
    </script>

    <script src="{{ asset('js/bootstrap-select.min.js') }}"></script>

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

    <script>
        $(document).ready(function () {
            $('*[data-max]').keyup(function () {
                // get the max chars for the input
                var text_max       = $(this).data('max');
                // compute current length
                var text_length    = $(this).val().length;
                // compute chars remaining
                var text_remaining = text_max - text_length;
                // display
                $(this).next('.char-max-alert').html(text_remaining + ' Characters Remaining');
            });
        });
    </script>
@endsection