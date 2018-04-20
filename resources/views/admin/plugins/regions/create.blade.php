@extends('admin.layout.master')

@section('title', 'Create Market')

@section('customCSS')
    <link href="{{ asset('css/bootstrap-select.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="panel panel-default primary-container">
        <div class="panel-heading"><i class="ti-world"></i> Create Market</div>

        <div class="panel-body">

            <form action="{{ route('admin.regions.store') }}" method="post" id="regionCreate">

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name">Market Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}"
                           placeholder="Market Name" onkeyup="getName()">

                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('slug') ? ' has-error' : '' }}">
                    <label for="slug">URL Slug</label>
                    <input type="text" class="form-control" id="slug" name="slug" value="{{ old('slug') }}"
                           placeholder="URL Slug">

                    @if ($errors->has('slug'))
                        <span class="help-block">
                            <strong>{{ $errors->first('slug') }}</strong>
                        </span>
                    @endif
                </div>

                {{-- Include Casino Operator Modal --}}
                @include('admin.plugins.00-snippets.casino-operator-modal')

                <div class="form-group{{ $errors->has('region_contents_top') ? ' has-error' : '' }}">
                    <label for="region_contents_top">Market Intro Text</label>
                    <textarea class="form-control" name="region_contents_top" id="region_contents_top"
                              rows="3">{{ old('region_contents_top') }}</textarea>

                    @if ($errors->has('region_contents_top'))
                        <span class="help-block">
                            <strong>{{ $errors->first('region_contents_top') }}</strong>
                        </span>
                    @endif
                </div>

                {{-- Include Casino Operator Modal --}}
                @include('admin.plugins.00-snippets.casino-operator-modal')

                <div class="form-group{{ $errors->has('region_contents') ? ' has-error' : '' }}">
                    <label for="region_contents">Market Body Text</label>
                    <textarea class="form-control" name="region_contents" id="region_contents"
                              rows="3">{{ old('region_contents') }}</textarea>

                    @if ($errors->has('region_contents'))
                        <span class="help-block">
                            <strong>{{ $errors->first('region_contents') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingOne">
                            <h3 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne"
                                   aria-expanded="true" aria-controls="collapseOne"><i class="ti-angle-down"></i>
                                    Markets Meta</a>
                            </h3>
                        </div>

                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel"
                             aria-labelledby="headingOne">
                            <div class="panel-body">

                                <div class="form-group{{ $errors->has('seo_title') ? ' has-error' : '' }}">
                                    <label for="seo_title">SEO Title</label>
                                    <input type="text" class="form-control" id="seo_title" name="seo_title"
                                           value="{{ old('seo_title') }}" placeholder="SEO Title">

                                    @if ($errors->has('seo_title'))
                                        <span class="help-block">
                                    <strong>{{ $errors->first('seo_title') }}</strong>
                                </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('seo_description') ? ' has-error' : '' }}">
                                    <label for="seo_description">SEO Description</label>
                                    <textarea class="form-control" name="seo_description" id="seo_description"
                                              rows="3">{{ old('seo_description') }}</textarea>

                                    @if ($errors->has('seo_description'))
                                        <span class="help-block">
                            <strong>{{ $errors->first('seo_description') }}</strong>
                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('seo_keywords') ? ' has-error' : '' }}">
                                    <label for="seo_keywords">SEO Keywords</label>
                                    <textarea class="form-control" name="seo_keywords" id="seo_keywords"
                                              rows="3">{{ old('seo_keywords') }}</textarea>

                                    @if ($errors->has('seo_keywords'))
                                        <span class="help-block">
                                    <strong>{{ $errors->first('seo_keywords') }}</strong>
                                </span>
                                    @endif
                                </div>

                            </div>
                        </div>
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
                        <button type="submit" class="btn btn-success" form="regionCreate"><i class="ti-plus"></i> Create
                            Market
                        </button>
                    </div>
                </div>

            </form>

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

    <script>
        function getName() {
            var getName = document.getElementById("name").value;
            document.getElementById("seo_title").value = getName;
        }
    </script>

    <script src="{{ asset('vendor/tinymce/tinymce.min.js') }}"></script>
    <script>
        tinymce.init({
            selector: 'textarea#region_contents,textarea#region_contents_top',
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

    <script src="{{ asset('js/bootstrap-select.min.js') }}"></script>

    {{-- Include Casino Operator JS --}}
    @include('admin.plugins.00-snippets.casino-operator-js')
@endsection