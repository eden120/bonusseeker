@extends('admin.layout.master')

@section('title')
    @unless(empty($editPageModule))
        @foreach($editPageModule as $page_module)
            Edit {{ $page_module->title }}
        @endforeach
    @endunless
@endsection

@section('customCSS')
    <link href="{{ asset('css/bootstrap-select.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-select.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    @unless(empty($editPageModule))
        @foreach($editPageModule as $page_module)

            <div class="row">
                <div class="text-right col-md-3 col-md-offset-9 m-b-20">
                    <a href="{{ route('admin.page-modules.index') }}" class="btn btn-success"><i
                                class="ti-back-left"></i> Back</a>
                </div>
            </div>

            <div class="panel panel-default primary-container">
                <div class="panel-heading">Edit: {{ $page_module->title }} @if($page_module->is_active === 1)
                        <span class="btn btn-success">Published</span>
                    @elseif($page_module->is_active === 0)
                        <span class="btn btn-warning">Drafted</span>
                    @endif</div>

                <div class="panel-body">
                    <form action="{{ route('admin.page-modules.update', ['id' => $page_module->id]) }}" method="post"
                          id="pageModuleEdit">

                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="title">Page Module Title</label>
                            <input type="text" class="form-control" id="title" name="title"
                                   value="{{ $page_module->title }}"
                                   placeholder="Page Module Title" onkeyup="getName()">

                            @if ($errors->has('title'))
                                <span class="help-block">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('contents') ? ' has-error' : '' }}">
                            <label for="contents">Module Contents</label>
                            <textarea class="form-control" name="contents" id="contents"
                                      rows="3">{!! $page_module->contents !!}</textarea>

                            @if ($errors->has('contents'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('contents') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Page Modules Meta</h3>
                            </div>
                            <div class="panel-body">

                                <div class="form-group{{ $errors->has('seo_title') ? ' has-error' : '' }}">
                                    <input type="text" class="form-control" id="seo_title" name="seo_title"
                                           value="{{ $page_module->seo_title }}" placeholder="SEO Title">

                                    @if ($errors->has('seo_title'))
                                        <span class="help-block">
                                    <strong>{{ $errors->first('seo_title') }}</strong>
                                </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('seo_description') ? ' has-error' : '' }}">
                                    <label for="seo_description">SEO Description</label>
                                    <textarea class="form-control" name="seo_description" id="seo_description"
                                              rows="3">{{ $page_module->seo_description }}</textarea>

                                    @if ($errors->has('seo_description'))
                                        <span class="help-block">
                            <strong>{{ $errors->first('seo_description') }}</strong>
                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('seo_keywords') ? ' has-error' : '' }}">
                                    <label for="seo_keywords">SEO Keywords</label>
                                    <textarea class="form-control" name="seo_keywords" id="seo_keywords"
                                              rows="3">{{ $page_module->seo_keywords }}</textarea>

                                    @if ($errors->has('seo_keywords'))
                                        <span class="help-block">
                                    <strong>{{ $errors->first('seo_keywords') }}</strong>
                                </span>
                                    @endif
                                </div>

                            </div>
                        </div>

                        {{ method_field('PUT') }}

                        {{ csrf_field() }}

                        <div class="row">

                            <div class="form-group{{ $errors->has('page_id') ? ' has-error' : '' }} col-md-4">
                                <label for="page_id">Page Name</label>
                                <select class="form-control selectpicker" id="page_id" name="page_id"
                                        data-live-search="true" title="Select Page Name">

                                    <option value="{{ $page_module->page->id }}"
                                            selected="selected">{{ $page_module->page->name }} (Current)
                                    </option>

                                    <option disabled>------------</option>

                                    <?php $pages = \App\Page::where('is_active', '>=', 1)->get(); ?>
                                    @foreach($pages as $page)
                                        <option value="{{ $page->id }}">{{ $page->name }} ({{ $page->region->name }})
                                        </option>
                                    @endforeach
                                </select>

                                @if ($errors->has('page_id'))
                                    <span class="help-block">
                                <strong>{{ $errors->first('page_id') }}</strong>
                            </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('sort_by') ? ' has-error' : '' }} col-md-4">
                                <label for="sort_by">Sort By</label>
                                <input type="text" class="form-control" id="sort_by" name="sort_by"
                                       value="{{ $page_module->sort_by }}" placeholder="Sort By">

                                @if ($errors->has('sort_by'))
                                    <span class="help-block">
                                <strong>{{ $errors->first('sort_by') }}</strong>
                            </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('is_active') ? ' has-error' : '' }} col-md-4">
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

                        <button type="submit" class="btn btn-success" form="pageModuleEdit"><i class="ti-save"></i> Save
                            Changes
                        </button>
                    </form>

                    @endforeach
                    @endunless

                </div>
            </div>
@endsection

@section('customJS')
    <script>
        function getName() {
            var getName = document.getElementById("title").value;
            document.getElementById("seo_title").value = getName;
        }
    </script>

    <script src="{{ asset('js/bootstrap-select.min.js') }}"></script>

    <script src="{{ asset('vendor/tinymce/tinymce.min.js') }}"></script>
    <script>
        tinymce.init({
            selector: 'textarea#contents',
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
@endsection