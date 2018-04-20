@extends('admin.layout.master')

@section('title')
    @unless(empty($editNews))
        @foreach($editNews as $news)
            Edit {{ $news->name }}
        @endforeach
    @endunless
@endsection

@section('customCSS')
    <link href="{{ asset('css/bootstrap-select.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/fileinput.min.css') }}">
@endsection

@section('content')
    @unless(empty($editNews))
        @foreach($editNews as $news)

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="panel panel-default primary-container">
                <div class="panel-heading">
                    {{ $news->name }}
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-9">
                            <strong>ID:</strong> {{ $news->id }} <i class="ti-shift-right-alt"></i>
                            <strong>Is Featured News?</strong> @if($news->is_featured === 1)
                                Yes @elseif($news->is_featured === 0) No @endif
                            <i class="ti-shift-right-alt"></i>
                            <strong>Is Trending News?</strong> @if($news->is_trending === 1)
                                Yes @elseif($news->is_trending === 0) No @endif
                            <i class="ti-shift-right-alt"></i>
                            <strong>Sort By:</strong> @if($news->sort_by === NULL)
                                NULL @else {{ $news->sort_by }} @endif <i class="ti-shift-right-alt"></i>
                            <strong>Created At:</strong> {{ $news->created_at->format('M d, Y - g:i:s A') }}
                            <i class="ti-shift-right-alt"></i>
                            <strong>Updated At:</strong> {{ $news->updated_at->format('M d, Y - g:i:s A') }}
                        </div>

                        <div class="text-right col-md-3">
                            <a href="{{ route('admin.news.index') }}" class="btn btn-success"><i
                                        class="ti-back-left"></i> Back</a>

                            <a href="{{ route('front-end.show-news', ['region' => $news->region->slug, 'slug' => $news->slug]) }}"
                               class="btn btn-info" target="_blank"><i class="ti-world"></i></a>

                            <button type="button" class="btn btn-danger" data-toggle="modal"
                                    data-target="#confirmDelete" title="Delete">
                                <i class="ti-trash"></i></button>
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
                            <h4 class="modal-title" id="myModalLabel">Delete: {{ $news->name }}</h4>
                        </div>
                        <div class="modal-body">
                            <strong>Are you sure?</strong> This action is irreversible!
                        </div>
                        <div class="modal-footer">
                            <form action="{{ route('admin.news.destroy', ['id' => $news->id]) }}"
                                  method="post" id="deleteNews">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                            </form>

                            <button type="submit" class="btn btn-danger" form="deleteNews"><i
                                        class="ti-trash"></i>
                                Delete: {{ $news->name }}
                            </button>

                            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                <i class="ti-back-left"></i> Cancel
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel panel-default primary-container">
                <div class="panel-heading">Edit: {{ $news->name }} @if($news->is_active === 1)
                        <strong>(Published)</strong>
                    @elseif($news->is_active === 0)
                        <strong>(Drafted)</strong>
                    @endif
                </div>

                <div class="panel-body">

                    <form action="{{ route('admin.news.update', ['id' => $news->id]) }}" method="post" id="newsEdit">

                        <div class="row">

                            <div class="form-group{{ $errors->has('region_id') ? ' has-error' : '' }} col-md-6">
                                <label for="region_id">Region Name</label>
                                <select class="form-control selectpicker" id="region_id" name="region_id"
                                        data-live-search="true">

                                    <option value="{{ $news->region->id }}"
                                            selected="selected">{{ $news->region->name }} (Current)
                                    </option>

                                    <option disabled>------------</option>

                                    <?php $regions = \App\Region::where('is_active', '>=', 1)->get(); ?>
                                    @foreach($regions as $region)
                                        <option value="{{ $region->id }}">{{ $region->name }}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('region_id'))
                                    <span class="help-block">
                                <strong>{{ $errors->first('region_id') }}</strong>
                            </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }} col-md-6">
                                <label for="category_id">News Category</label>
                                <select class="form-control selectpicker" id="category_id" name="category_id"
                                        data-live-search="true" title="Select News Category">

                                    <option value="{{ $news->categoryId->id }}"
                                            selected="selected">{{ $news->categoryId->name }}</option>

                                    <option disabled>----------</option>

                                    <?php $news_providers = \App\NewsCategory::where('is_active', '>=', 1)->get(); ?>
                                    @foreach($news_providers as $news_provider)
                                        <option value="{{ $news_provider->id }}">{{ $news_provider->name }}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('category_id'))
                                    <span class="help-block">
                                <strong>{{ $errors->first('category_id') }}</strong>
                            </span>
                                @endif
                            </div>


                            <div class="form-group{{ $errors->has('is_featured') ? ' has-error' : '' }} col-md-6">
                                <label for="is_featured">Is Featured?</label>

                                <select class="selectpicker form-control" id="is_featured" name="is_featured">
                                    @if($news->is_featured === 1)
                                        <option value="1" selected="selected">Yes</option>
                                    @elseif($news->is_featured === 0)
                                        <option value="0" selected="selected">No</option>
                                    @endif

                                    <option disabled>----------</option>

                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>

                                @if ($errors->has('is_featured'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('is_featured') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('know_before_you_play') ? ' has-error' : '' }} col-md-6">
                                <label for="know_before_you_play">Know Before You Play</label>

                                <select class="selectpicker form-control" id="know_before_you_play"
                                        name="know_before_you_play">
                                    @if($news->know_before_you_play === 1)
                                        <option value="1" selected="selected">Yes</option>
                                    @elseif($news->know_before_you_play === 0)
                                        <option value="0" selected="selected">No</option>
                                    @endif

                                    <option disabled>----------</option>

                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>

                                @if ($errors->has('know_before_you_play'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('know_before_you_play') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('is_trending') ? ' has-error' : '' }} col-md-6">
                                <label for="is_trending">Is Trending?</label>

                                <select class="selectpicker form-control" id="is_trending" name="is_trending">
                                    @if($news->is_trending === 1)
                                        <option value="1" selected="selected">Yes</option>
                                    @elseif($news->is_trending === 0)
                                        <option value="0" selected="selected">No</option>
                                    @endif

                                    <option disabled>----------</option>

                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>

                                @if ($errors->has('is_trending'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('is_trending') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} col-md-6">
                                <label for="name">News Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                       value="{{ old('name') ?: $news->name }}" placeholder="News Name"
                                       onkeyup="getName()">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('slug') ? ' has-error' : '' }} col-md-6">
                                <label for="slug">URL Slug</label>
                                <input type="text" class="form-control" id="slug" name="slug"
                                       value="{{ old('slug') ?: $news->slug }}"
                                       placeholder="URL Slug">

                                @if ($errors->has('slug'))
                                    <span class="help-block">
                            <strong>{{ $errors->first('slug') }}</strong>
                        </span>
                                @endif
                            </div>
                        </div>

                        {{-- Include Operator Modal --}}
                        @include('admin.plugins.00-snippets.casino-operator-modal')

                        <div class="form-group{{ $errors->has('news_content') ? ' has-error' : '' }}">
                            <label for="news_content">News Contents</label>
                            <textarea class="form-control" name="news_content" id="news_content"
                                      rows="3">{!! old('news_content') ?: $news->news_content !!}</textarea>

                            @if ($errors->has('news_content'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('news_content') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('seo_title') ? ' has-error' : '' }}">
                            <label for="seo_title">SEO Title</label>
                            <input type="text" class="form-control" id="seo_title" name="seo_title"
                                   value="{{ old('seo_title') ?: $news->seo_title }}" placeholder="SEO Title">

                            @if ($errors->has('seo_title'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('seo_title') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('seo_description') ? ' has-error' : '' }}">
                            <label for="seo_description">SEO Description</label>
                            <textarea class="form-control" name="seo_description" id="seo_description"
                                      rows="3">{{ old('seo_description') ?: $news->seo_description }}</textarea>

                            @if ($errors->has('seo_description'))
                                <span class="help-block">
                            <strong>{{ $errors->first('seo_description') }}</strong>
                        </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('seo_keywords') ? ' has-error' : '' }}">
                            <label for="seo_keywords">SEO Keywords</label>
                            <textarea class="form-control" name="seo_keywords" id="seo_keywords"
                                      rows="3">{{ old('seo_keywords') ?: $news->seo_keywords }}</textarea>

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
                                       value="{{ old('sort_by') ?: $news->sort_by }}"
                                       placeholder="Sort By">

                                @if ($errors->has('sort_by'))
                                    <span class="help-block">
                                <strong>{{ $errors->first('sort_by') }}</strong>
                            </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('is_active') ? ' has-error' : '' }} col-md-6">
                                <label for="is_active">Action</label>

                                <select class="selectpicker form-control" name="is_active" id="is_active">

                                    @if($news->is_active === 1)
                                        <option value="1" selected="selected">Publish</option>
                                    @elseif($news->is_active === 0)
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
                                <button type="submit" class="btn btn-success" form="newsEdit"><i
                                            class="ti-save"></i>
                                    Save Changes
                                </button>
                            </div>
                        </div>

                    </form>

                    <div class="panel panel-default m-t-20">
                        <div class="panel-heading">
                            <h3 class="panel-title">News Featured Image</h3>
                        </div>
                        <div class="panel-body">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="thumbnail">
                                        <img src="{{ Image::url(Storage::url($news->featured_image), 300, 300) }}"
                                             alt="{{ $news->name }}">
                                    </div>
                                </div>
                            </div>

                            <form action="{{ route('admin.news.update-featured-image', ['id' => $news->id]) }}"
                                  method="post" enctype="multipart/form-data" id="newsUpdateFeaturedImage">

                                <div class="row">
                                    <div class="form-group{{ $errors->has('featured_image') ? ' has-error' : '' }} col-md-6">
                                        <label for="featured_image">News Featured Image</label>
                                        <input type="file" class="form-control" id="featured_image"
                                               name="featured_image" value="{{ old('featured_image') }}">

                                        @if ($errors->has('featured_image'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('featured_image') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <input type="hidden" name="slug" value="{{ $news->slug }}">

                                    {{ method_field('PUT') }}

                                    {{ csrf_field() }}
                                </div>

                                <button type="submit" class="btn btn-success" form="newsUpdateFeaturedImage"><i
                                            class="ti-image"></i> Change Featured Image
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
        $("#featured_image").fileinput({'showUpload': false, 'showRemove': false, 'previewFileType': 'any'});
    </script>

    <script src="{{ asset('vendor/tinymce/tinymce.min.js') }}"></script>
    <script>
        tinymce.init({
            selector: 'textarea#news_content',
            plugins: 'advlist autolink link image lists charmap print preview wordcount anchor autosave code codemirror contextmenu media hr imagetools paste searchreplace table visualblocks autoresize',
            contextmenu: "link image inserttable | cell row column deletetable",
            mediaembed_max_width: 450,
            autoresize_min_height: 250,
            menubar: 'edit insert view format table tools',
            codemirror: {
                indentOnInit: true,
                path: '{{ asset('vendor/tinymce/plugins/codemirror/codemirror-4.8') }}',
                config: {
                    mode: 'application/x-httpd-php',
                    lineNumbers: true,
                    lineWrapping: true,
                    indentUnit: 4,
                    smartIndent: true
                },
                width: 1140,
                height: 650,
                saveCursorPosition: true,
                jsFiles: [
                    'mode/clike/clike.js',
                    'mode/php/php.js'
                ]
            },
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

    {{-- Include Casino Operator JS --}}
    @include('admin.plugins.00-snippets.casino-operator-js')
@endsection