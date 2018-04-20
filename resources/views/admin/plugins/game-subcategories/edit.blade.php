@extends('admin.layout.master')

@section('title')
    @unless(empty($editGameSubcategory))
        @foreach($editGameSubcategory as $game_subcategory)
            Edit {{ $game_subcategory->name }} - Game Subcategories
        @endforeach
    @endunless
@endsection

@section('customCSS')
    <link href="{{ asset('css/bootstrap-select.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    @unless(empty($editGameSubcategory))
        @foreach($editGameSubcategory as $game_subcategory)

            <div class="panel panel-default primary-container">
                <div class="panel-heading">
                    {{ $game_subcategory->name }}
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-9">
                            <strong>ID:</strong> {{ $game_subcategory->id }} <i class="ti-shift-right-alt"></i> <strong>Created
                                At:</strong> {{ $game_subcategory->created_at->format('M d, Y - g:i:s A') }} <i
                                    class="ti-shift-right-alt"></i> <strong>Updated
                                At:</strong> {{ $game_subcategory->updated_at->format('M d, Y - g:i:s A') }}
                        </div>

                        <div class="text-right col-md-3">
                            <a href="{{ route('admin.game-subcategories.index') }}"
                               class="btn btn-success"><i class="ti-back-left"></i> Back</a>

                            <button type="button" class="btn btn-danger" data-toggle="modal"
                                    data-target="#confirmDelete" title="Delete"><i class="ti-trash"></i></button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="confirmDelete" tabindex="-1" role="dialog"
                 aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"
                                    aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Delete: {{ $game_subcategory->name }}</h4>
                        </div>
                        <div class="modal-body">
                            <strong>Are you sure?</strong> This action is irreversible!
                        </div>
                        <div class="modal-footer">
                            <form action="{{ route('admin.game-subcategories.destroy', ['id' => $game_subcategory->id]) }}"
                                  method="post" id="deleteLogo">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                            </form>

                            <button type="submit" class="btn btn-danger" form="deleteLogo"><i
                                        class="ti-trash"></i>
                                Delete: {{ $game_subcategory->name }}
                            </button>

                            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                <i class="ti-back-left"></i> Cancel
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel panel-default primary-container">
                <div class="panel-heading">Edit: {{ $game_subcategory->name }} @if($game_subcategory->is_active === 1)
                        <strong>(Published)</strong>
                    @elseif($game_subcategory->is_active === 0)
                        <strong>(Drafted)</strong>
                    @endif
                </div>

                <div class="panel-body">

                    <form action="{{ route('admin.game-subcategories.update', ['id' => $game_subcategory->id]) }}"
                          method="post"
                          id="GameCategoryEdit">

                        <div class="row">

                            <div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }} col-md-6">
                                <label for="category_id">Game Category</label>
                                <select class="form-control selectpicker" id="category_id" name="category_id"
                                        data-live-search="true" title="Select Game Category">

                                    <option value="{{ $game_subcategory->gameCategory->id }}"
                                            selected="selected">{{ $game_subcategory->gameCategory->name }}</option>

                                    <option disabled>----------</option>

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
                                <input type="text" class="form-control" id="name" name="name"
                                       value="{{ old('name') ?: $game_subcategory->name }}"
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
                                <input type="text" class="form-control" id="slug" name="slug"
                                       value="{{ old('slug') ?: $game_subcategory->slug }}" placeholder="URL Slug"
                                       maxlength="255" data-max="255">

                                <p class="help-block char-max-alert"></p>

                                @if ($errors->has('slug'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('slug') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }} col-md-6">
                                <label for="description">Game Subcategory Description</label>
                                <textarea class="form-control" name="description" id="description" rows="3"
                                          maxlength="255"
                                          data-max="255">{{ old('description') ?: $game_subcategory->description }}</textarea>

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
                                       value="{{ old('seo_title') ?: $game_subcategory->seo_title }}"
                                       placeholder="SEO Title" maxlength="255" data-max="255">

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
                                          maxlength="255"
                                          data-max="255">{{ old('seo_description') ?: $game_subcategory->seo_description }}</textarea>

                                <p class="help-block char-max-alert"></p>

                                @if ($errors->has('seo_description'))
                                    <span class="help-block">
                                <strong>{{ $errors->first('seo_description') }}</strong>
                            </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('seo_keywords') ? ' has-error' : '' }} col-md-6">
                                <label for="seo_keywords">SEO Keywords</label>
                                <textarea class="form-control" name="seo_keywords" id="seo_keywords" rows="2"
                                          maxlength="255"
                                          data-max="255">{{ old('seo_keywords') ?: $game_subcategory->seo_keywords }}</textarea>

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
                                <button type="submit" class="btn btn-success"><i class="ti-save"></i> Save Changes
                                </button>
                            </div>
                        </div>

                        {{ method_field('PUT') }}
                        {{ csrf_field() }}
                    </form>

                    @endforeach
                    @endunless

                </div>
            </div>
@endsection

@section('customJS')
    <script src="{{ asset('js/bootstrap-select.min.js') }}"></script>

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