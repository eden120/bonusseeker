@extends('admin.layout.master')

@section('title')
    @unless(empty($editGame))
        @foreach($editGame as $game)
            Edit {{ $game->name }}
        @endforeach
    @endunless
@endsection

@section('customCSS')
    <link href="{{ asset('css/bootstrap-select.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/fileinput.min.css') }}">
@endsection

@section('content')
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @unless(empty($editGame))
        @foreach($editGame as $game)

            <div class="panel panel-default primary-container">
                <div class="panel-heading">
                    {{ $game->name }}
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-9">
                            <strong>ID:</strong> {{ $game->id }} <i class="ti-shift-right-alt"></i> <strong>Is
                                Featured Game?</strong> @if($game->is_featured === 1)
                                Yes @elseif($game->is_featured === 0) No @endif <i class="ti-shift-right-alt"></i>
                            <strong>Sort By:</strong> @if($game->sort_by === NULL)
                                NULL @else {{ $game->sort_by }} @endif <i class="ti-shift-right-alt"></i> <strong>Created
                                At:</strong> {{ $game->created_at->format('M d, Y - g:i:s A') }} <i
                                    class="ti-shift-right-alt"></i> <strong>Updated
                                At:</strong> {{ $game->updated_at->format('M d, Y - g:i:s A') }}
                        </div>

                        <div class="text-right col-md-3">
                            <a href="{{ route('admin.games.index') }}"
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
                            <h4 class="modal-title" id="myModalLabel">Delete: {{ $game->name }}</h4>
                        </div>
                        <div class="modal-body">
                            <strong>Are you sure?</strong> This action is irreversible!
                        </div>
                        <div class="modal-footer">
                            <form action="{{ route('admin.games.destroy', ['id' => $game->id]) }}"
                                  method="post" id="deleteLogo">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                            </form>

                            <button type="submit" class="btn btn-danger" form="deleteLogo"><i
                                        class="ti-trash"></i>
                                Delete: {{ $game->name }}
                            </button>

                            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                <i class="ti-back-left"></i> Cancel
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel panel-default primary-container">
                <div class="panel-heading">Edit: {{ $game->name }} @if($game->is_active === 1)
                        <strong>(Published)</strong>
                    @elseif($game->is_active === 0)
                        <strong>(Drafted)</strong>
                    @endif
                </div>

                <div class="panel-body">

                    <form action="{{ route('admin.games.update', ['id' => $game->id]) }}" method="post" id="gameEdit">

                        <div class="row">
                            <div class="form-group{{ $errors->has('provider_id') ? ' has-error' : '' }} col-md-6">
                                <label for="provider_id">Game Provider Name</label>
                                <select class="form-control selectpicker" id="provider_id" name="provider_id"
                                        data-live-search="true" title="Select Game Provider">

                                    <option value="{{ $game->providerId->id }}"
                                            selected="selected">{{ $game->providerId->name }}</option>

                                    <option disabled>----------</option>

                                    <?php $game_providers = \App\GameProvider::where('is_active', '>=', 1)->get(); ?>
                                    @foreach($game_providers as $game_provider)
                                        <option value="{{ $game_provider->id }}">{{ $game_provider->name }}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('provider_id'))
                                    <span class="help-block">
                                <strong>{{ $errors->first('provider_id') }}</strong>
                            </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }} col-md-6">
                                <label for="category_id">Game Category</label>

                                <select name="category_id" id="category_id" class="form-control selectpicker"
                                        data-live-search="true" title="Select Game Category">

                                    <option value="{{ $game->categoryId->id }}"
                                            selected="selected">{{ $game->categoryId->name }}</option>

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

                            <div class="form-group{{ $errors->has('subcategory_id') ? ' has-error' : '' }} col-md-6">
                                <label for="subcategory_id">Game Subcategory</label>

                                <select name="subcategory_id" id="subcategory_id" class="form-control selectpicker"
                                        data-live-search="true" title="Select Game Subcategory">

                                    <option value="{{ $game->subcategoryId->id }}"
                                            selected="selected">{{ $game->subcategoryId->name }}</option>

                                    <option disabled>----------</option>

                                    <?php $game_subcategories = \App\GameSubcategory::where('is_active', '>=', 1)->get(); ?>
                                    @foreach($game_subcategories as $game_subcategory)
                                        <option value="{{ $game_subcategory->id }}">{{ $game_subcategory->name }}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('subcategory_id'))
                                    <span class="help-block">
                                <strong>{{ $errors->first('subcategory_id') }}</strong>
                            </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('is_featured') ? ' has-error' : '' }} col-md-6">
                                <label for="is_featured">Is Featured?</label>

                                <select class="selectpicker form-control" id="is_featured" name="is_featured">
                                    @if($game->is_featured === 1)
                                        <option value="1" selected="selected">Brand New</option>
                                    @elseif($game->is_featured === 2)
                                        <option value="2" selected="selected">Most Popular</option>
                                    @elseif($game->is_featured === 3)
                                        <option value="3" selected="selected">Big Jackpot</option>
                                    @else
                                        <option value="0" selected="selected">Not Featured Yet</option>
                                    @endif

                                    <option disabled>----------</option>

                                    <option value="1">Brand New</option>
                                    <option value="2">Most Popular</option>
                                    <option value="3">Big Jackpot</option>
                                </select>

                                @if ($errors->has('is_featured'))
                                    <span class="help-block">
                                <strong>{{ $errors->first('is_featured') }}</strong>
                            </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('is_html5') ? ' has-error' : '' }} col-md-6">
                                <label for="is_html5">Is HTML5 Ready?</label>

                                <select class="selectpicker form-control" id="is_html5" name="is_html5">

                                    @if($game->is_html5 === 1)
                                        <option value="1" selected="selected">Yes</option>
                                    @elseif($game->is_html5 === 0)
                                        <option value="0" selected="selected">No</option>
                                    @endif

                                    <option disabled>----------</option>

                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>

                                @if ($errors->has('is_html5'))
                                    <span class="help-block">
                                <strong>{{ $errors->first('is_html5') }}</strong>
                            </span>
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} col-md-6">
                                <label for="name">Game Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                       value="{{ old('name') ?: $game->name }}" placeholder="Game Name"
                                       onkeyup="getName()" maxlength="255" data-max="255">

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
                                       value="{{ old('slug') ?: $game->slug }}" placeholder="URL Slug" maxlength="255"
                                       data-max="255">

                                <p class="help-block char-max-alert"></p>

                                @if ($errors->has('slug'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('slug') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description">Description</label>
                            <textarea class="form-control" name="description" id="description"
                                      rows="3">{!! old('description') ?: $game->description !!}</textarea>

                            @if ($errors->has('description'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('url') ? ' has-error' : '' }}">
                            <label for="url">Game Play URL</label>
                            <input type="text" class="form-control" id="url" name="url"
                                   value="{{ old('url') ?: $game->url }}" placeholder="Game Play URL" maxlength="1024"
                                   data-max="1024">

                            <p class="help-block char-max-alert"></p>

                            @if ($errors->has('url'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('url') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('seo_title') ? ' has-error' : '' }}">
                            <label for="seo_title">SEO Title</label>
                            <input type="text" class="form-control" id="seo_title" name="seo_title"
                                   value="{{ old('seo_title') ?: $game->seo_title }}" placeholder="SEO Title"
                                   maxlength="255" data-max="255">

                            <p class="help-block char-max-alert"></p>

                            @if ($errors->has('seo_title'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('seo_title') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('seo_description') ? ' has-error' : '' }}">
                            <label for="seo_description">SEO Description</label>
                            <textarea class="form-control" name="seo_description" id="seo_description" rows="3"
                                      maxlength="255"
                                      data-max="255">{{ old('seo_description') ?: $game->seo_description }}</textarea>

                            <p class="help-block char-max-alert"></p>

                            @if ($errors->has('seo_description'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('seo_description') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('seo_keywords') ? ' has-error' : '' }}">
                            <label for="seo_keywords">SEO Keywords</label>
                            <textarea class="form-control" name="seo_keywords" id="seo_keywords" rows="3"
                                      maxlength="255"
                                      data-max="255">{{ old('seo_keywords') ?: $game->seo_keywords }}</textarea>

                            <p class="help-block char-max-alert"></p>

                            @if ($errors->has('seo_keywords'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('seo_keywords') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="row">
                            <div class="form-group{{ $errors->has('sort_by') ? ' has-error' : '' }} col-md-6">
                                <label for="sort_by">Sort By</label>
                                <input type="text" class="form-control" id="sort_by" name="sort_by"
                                       value="{{ old('sort_by') ?: $game->sort_by }}" placeholder="Sort By"
                                       maxlength="10" data-max="10">

                                <p class="help-block char-max-alert"></p>

                                @if ($errors->has('sort_by'))
                                    <span class="help-block">
                                <strong>{{ $errors->first('sort_by') }}</strong>
                            </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('is_active') ? ' has-error' : '' }} col-md-6">
                                <label for="is_active">Action</label>

                                <select class="selectpicker form-control" name="is_active" id="is_active">

                                    @if($game->is_active === 1)
                                        <option value="1" selected="selected">Publish</option>
                                    @elseif($game->is_active === 0)
                                        <option value="0" selected="selected">Draft</option>
                                    @endif

                                    <option disabled>----------</option>

                                    <option value="1">Publish</option>
                                    <option value="0">Draft</option>
                                </select>

                                @if ($errors->has('is_active'))
                                    <span class="help-block">
                            <strong>{{ $errors->first('is_active') }}</strong>
                        </span>
                                @endif
                            </div>
                        </div>

                        {{ method_field('PUT') }}

                        {{ csrf_field() }}

                        <div class="row">

                            <div class="col-md-6">
                                <button type="submit" class="btn btn-success" form="gameEdit"><i class="ti-save"></i>
                                    Save Changes
                                </button>
                            </div>
                        </div>

                    </form>

                    <div class="panel panel-default m-t-20">
                        <div class="panel-heading">
                            <h3 class="panel-title">Games Logo Section</h3>
                        </div>
                        <div class="panel-body">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="thumbnail">
                                        <img src="{{ Image::url(Storage::url($game->logo), 200, 200) }}"
                                             alt="{{ $game->name }}">
                                    </div>
                                </div>
                            </div>

                            <form action="{{ route('admin.games.update-logo', ['id' => $game->id]) }}"
                                  method="post" enctype="multipart/form-data" id="gameEditLogo">

                                <div class="row">
                                    <div class="form-group{{ $errors->has('logo') ? ' has-error' : '' }} col-md-6">
                                        <label for="logo">Game Logo</label>
                                        <input type="file" class="form-control" id="logo" name="logo"
                                               value="{{ old('logo') }}">

                                        @if ($errors->has('logo'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('logo') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <input type="hidden" name="slug" value="{{ $game->slug }}">

                                    {{ method_field('PUT') }}

                                    {{ csrf_field() }}
                                </div>

                                <button type="submit" class="btn btn-success" form="gameEditLogo"><i
                                            class="ti-image"></i> Change Logo
                                </button>

                            </form>
                        </div>
                    </div>

                    @endforeach
                    @endunless

                </div>
            </div>
@endsection

@section('customJS')
    <script>
        function getName() {
            var getName = document.getElementById("name").value;
            document.getElementById("seo_title").value = getName;
        }
    </script>

    <script src="{{ asset('js/bootstrap-select.min.js') }}"></script>

    <script src="{{ asset('js/fileinput.min.js') }}"></script>
    <script>
        $("#logo").fileinput({'showUpload': false, 'showRemove': false, 'previewFileType': 'any'});
    </script>

    <script src="{{ asset('vendor/tinymce/tinymce.min.js') }}"></script>
    <script>
        tinymce.init({
            selector: 'textarea#description',
            plugins: 'advlist autolink link image lists charmap print preview wordcount anchor autosave code contextmenu media hr imagetools paste searchreplace table visualblocks autoresize',
            contextmenu: "link image inserttable | cell row column deletetable",
            mediaembed_max_width: 450,
            autoresize_min_height: 250,
            menubar: 'edit insert view format table tools',
            file_browser_callback: function (field_name, url, type, win) {
                var w = window,
                    d = document,
                    e = d.documentElement,
                    g = d.getElementsByTagName('body')[0],
                    x = w.innerWidth || e.clientWidth || g.clientWidth,
                    y = w.innerHeight || e.clientHeight || g.clientHeight;

                var cmsURL = '{{ asset('vendor/file-browser/index-BS0uFniDw1vRuAhsMLs5f54qagb7aNYj.html') }}?&field_name=' + field_name;

                if (type === 'image') {
                    cmsURL = cmsURL + "&type=images";
                }

                tinyMCE.activeEditor.windowManager.open({
                    file: cmsURL,
                    title: 'File Manager',
                    width: x * 0.8,
                    height: y * 0.8,
                    resizable: "yes",
                    close_previous: "no"
                });
            }
        });
    </script>

    <script>
        $(document).ready(function () {
            $('*[data-max]').keyup(function () {
                // get the max chars for the input
                var text_max = $(this).data('max');
                // compute current length
                var text_length = $(this).val().length;
                // compute chars remaining
                var text_remaining = text_max - text_length;
                // display
                $(this).next('.char-max-alert').html(text_remaining + ' Characters Remaining');
            });
        });
    </script>
@endsection