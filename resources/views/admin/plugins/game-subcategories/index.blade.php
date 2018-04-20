@extends('admin.layout.master')

@section('title', 'All Game Subcategories')

@section('customCSS')
    <link href="{{ asset('css/bootstrap-select.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    @if (session('gameSubcategoryCreated'))
        <div class="alert alert-success" role="alert">
            <strong>{{ session('gameSubcategoryCreated') }}</strong>
        </div>
    @endif

    @if (session('gameSubcategoryUpdated'))
        <div class="alert alert-success" role="alert">
            <strong>{{ session('gameSubcategoryUpdated') }}</strong>
        </div>
    @endif

    @if (session('gameSubcategoryDeleted'))
        <div class="alert alert-success" role="alert">
            <strong>{{ session('gameSubcategoryDeleted') }}</strong>
        </div>
    @endif

    <div class="panel panel-default primary-container">
        <div class="panel-heading">
            <i class="ti-plus"></i> Create Game Subcategory
        </div>
        <div class="panel-body">
            <form action="{{ route('admin.game-subcategories.store') }}" method="post">
                <div class="row">
                    <div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }} col-md-6">
                        <label for="category_id">Game Category Name</label>
                        <select class="form-control selectpicker" id="category_id" name="category_id"
                                data-live-search="true" title="Select Game Category">
                            <?php $game_categories = \App\GameCategory::where('is_active', '>=', 1)->get(); ?>
                            @foreach($game_categories as $game_category)
                                <option value="{{ $game_category->id }}">{{ $game_category->name }}</option>
                            @endforeach
                        </select>

                        @if ($errors->has('category_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('category_id') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} col-md-6">
                        <label for="name">Game Subcategory Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}"
                               placeholder="Game Subcategory Name" maxlength="255" data-max="255">

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

                    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }} col-md-6">
                        <label for="description">Game Subcategory Description</label>
                        <textarea class="form-control" name="description" id="description" rows="2" maxlength="255"
                                  data-max="255">{{ old('description') }}</textarea>

                        <p class="help-block char-max-alert"></p>

                        @if ($errors->has('description'))
                            <span class="help-block">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('seo_title') ? ' has-error' : '' }} col-md-6">
                        <label for="seo_title">SEO Title</label>
                        <input type="text" class="form-control" id="seo_title" name="seo_title"
                               value="{{ old('seo_title') }}" placeholder="SEO Title" maxlength="255" data-max="255">

                        <p class="help-block char-max-alert"></p>

                        @if ($errors->has('seo_title'))
                            <span class="help-block">
                                <strong>{{ $errors->first('seo_title') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="form-group{{ $errors->has('seo_description') ? ' has-error' : '' }} col-md-6">
                        <label for="seo_description">SEO Description</label>
                        <textarea class="form-control" name="seo_description" id="seo_description" rows="2"
                                  maxlength="255" data-max="255">{{ old('seo_description') }}</textarea>

                        <p class="help-block char-max-alert"></p>

                        @if ($errors->has('seo_description'))
                            <span class="help-block">
                                <strong>{{ $errors->first('seo_description') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('seo_keywords') ? ' has-error' : '' }} col-md-6">
                        <label for="seo_keywords">SEO Keywords</label>
                        <textarea class="form-control" name="seo_keywords" id="seo_keywords" rows="2" maxlength="255"
                                  data-max="255">{{ old('seo_keywords') }}</textarea>

                        <p class="help-block char-max-alert"></p>

                        @if ($errors->has('seo_keywords'))
                            <span class="help-block">
                                <strong>{{ $errors->first('seo_keywords') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

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

                {{ csrf_field() }}
            </form>
        </div>
    </div>

    <div class="panel panel-default primary-container">
        <div class="panel-heading"><i class="ti-tag"></i> All Game Subcategories</div>

        <div class="panel-body">

            <div class="row">
                <div class="col-md-7">
                    <a href="{{ route('admin.game-categories.index') }}" class="btn btn-primary"><i class="ti-tag"></i>
                        All Game Categories</a>

                    <a href="{{ route('admin.game-subcategories.index') }}" class="btn btn-primary"><i
                                class="ti-tag"></i>
                        All Game Subcategories</a>
                </div>

                <div class="col-md-5">
                    <div class="form-group pull-right">
                        <input type="text" class="search form-control" placeholder="Search Game Subcategories...">
                    </div>
                    <span class="table-search-counter pull-right"></span>
                </div>
            </div>

            <table class="table table-bordered table-striped table-hover table-responsive table-search"
                   id="gameCategoriesTable">
                <thead>
                <tr>
                    <th class="text-center">Status</th>
                    <th class="text-center">Game Subcategory Name</th>
                    <th class="text-center">Parent Category</th>
                    <th class="text-center" style="width: 15%;">Edit</th>
                </tr>
                </thead>
                <tbody>

                @unless(empty($game_subcategories))
                    @foreach($game_subcategories as $game_subcategory)
                        <tr>
                            <td class="text-center" style="width: 10%;">
                                @if($game_subcategory->is_active === 1)
                                    <span class="btn btn-success">Published</span>
                                @elseif($game_subcategory->is_active === 0)
                                    <span class="btn btn-warning">Drafted</span>
                                @endif
                            </td>

                            <td class="text-center"><a
                                        href="{{ route('admin.game-subcategories.edit', ['slug' => $game_subcategory->slug]) }}">{{ $game_subcategory->name }}</a>
                            </td>

                            <td class="text-center"><a
                                        href="{{ route('admin.game-categories.edit', ['slug' => \App\GameSubcategory::findOrFail($game_subcategory->id)->gameCategory->slug]) }}">{{ \App\GameSubcategory::findOrFail($game_subcategory->id)->gameCategory->name }}</a>
                            </td>

                            <td class="text-center">
                                <a href="{{ route('admin.game-subcategories.edit', ['slug' => $game_subcategory->slug]) }}"
                                   class="btn btn-primary"><i class="ti-pencil-alt"></i></a>
                            </td>
                        </tr>

                    @endforeach
                @endunless

                </tbody>
            </table>

            {{-- Pagination --}}
            {{ $game_subcategories->links('vendor/pagination/bootstrap-4') }}

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