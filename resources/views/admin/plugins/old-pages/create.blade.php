@extends('admin.layout.master')

@section('title', 'Create Old Page')

@section('customCSS')
    <link href="{{ asset('css/bootstrap-select.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/fileinput.min.css') }}">
@endsection

@section('content')
    <div class="panel panel-default primary-container">
        <div class="panel-heading"><i class="ti-write"></i> Create Old Page</div>

        <div class="panel-body">

            <form action="{{ route('admin.old-pages.store') }}" method="post" enctype="multipart/form-data"
                  id="pageCreate">

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name">Page Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}"
                           placeholder="Page Name" onkeyup="getName()" maxlength="255" data-max="255">

                    <p class="help-block char-max-alert"></p>

                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('slug') ? ' has-error' : '' }}">
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

                {{-- Include Casino Operator Modal --}}
                @include('admin.plugins.00-snippets.casino-operator-modal')

                <div class="form-group{{ $errors->has('page_contents') ? ' has-error' : '' }}">
                    <label for="page_contents">Page Contents</label>
                    <textarea class="form-control" name="page_contents" id="page_contents"
                              rows="3">{{ old('page_contents') }}</textarea>

                    @if ($errors->has('page_contents'))
                        <span class="help-block">
                            <strong>{{ $errors->first('page_contents') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingOne">
                            <h3 class="panel-title"><a role="button" data-toggle="collapse" data-parent="#accordion"
                                                       href="#collapseOne" aria-expanded="true"
                                                       aria-controls="collapseOne"><i
                                            class="ti-angle-down"></i> Page&#039;s Meta</a></h3>
                        </div>

                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel"
                             aria-labelledby="headingOne">
                            <div class="panel-body">

                                <div class="form-group{{ $errors->has('seo_title') ? ' has-error' : '' }}">
                                    <label for="seo_title">SEO Title</label>
                                    <input type="text" class="form-control" id="seo_title" name="seo_title"
                                           value="{{ old('seo_title') }}" placeholder="SEO Title" maxlength="255"
                                           data-max="255">

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
                                              maxlength="255" data-max="255">{{ old('seo_description') }}</textarea>

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
                                              maxlength="255" data-max="255">{{ old('seo_keywords') }}</textarea>

                                    <p class="help-block char-max-alert"></p>

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
                    <div class="form-group{{ $errors->has('sort_by') ? ' has-error' : '' }} col-md-6">
                        <label for="sort_by">Sort By</label>
                        <input type="text" class="form-control" id="sort_by" name="sort_by" value="{{ old('sort_by') }}"
                               placeholder="Sort By" maxlength="10" data-max="10">

                        <p class="help-block char-max-alert"></p>

                        @if ($errors->has('sort_by'))
                            <span class="help-block">
                                <strong>{{ $errors->first('sort_by') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('featured_image') ? ' has-error' : '' }} col-md-6">
                        <label for="featured_image">Featured Image</label>
                        <input type="file" class="form-control" id="featured_image" name="featured_image"
                               value="{{ old('featured_image') }}">

                        @if ($errors->has('featured_image'))
                            <span class="help-block">
                                <strong>{{ $errors->first('featured_image') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('is_active') ? ' has-error' : '' }} col-md-6">
                        <label for="is_active">Action</label>

                        <select class="selectpicker form-control" name="is_active" id="is_active">
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

                <button type="submit" class="btn btn-success" form="pageCreate"><i class="ti-plus"></i> Create
                    Page
                </button>
            </form>

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

    <script src="{{ asset('js/fileinput.min.js') }}"></script>
    <script>
        $("#featured_image").fileinput({'showUpload': false, 'showRemove': false, 'previewFileType': 'any'});
    </script>

    <script src="{{ asset('js/bootstrap-select.min.js') }}"></script>

    <script src="{{ asset('vendor/tinymce/tinymce.min.js') }}"></script>
    <script>
        tinymce.init({
            selector: 'textarea#page_contents',
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

    {{-- Include Casino Operator JS --}}
    @include('admin.plugins.00-snippets.casino-operator-js')
@endsection