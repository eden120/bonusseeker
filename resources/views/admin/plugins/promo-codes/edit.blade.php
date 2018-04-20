@extends('admin.layout.master')

@section('title')
    @unless(empty($editPromo))
        @foreach($editPromo as $promo)
            Edit {{ $promo->name }}
        @endforeach
    @endunless
@endsection

@section('customCSS')
    <link href="{{ asset('css/bootstrap-select.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/fileinput.min.css') }}">
    <link href="{{ asset('css/star-rating.min.css') }}" rel="stylesheet"/>
    <link rel="stylesheet" href="{{ asset('css/bootstrap-datetimepicker.min.css') }}">
@endsection

@section('content')
    @unless(empty($editPromo))
        @foreach($editPromo as $promo)

            <div class="panel panel-default primary-container">
                <div class="panel-heading">
                    {{ $promo->name }}
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-9">
                            <strong>ID:</strong> {{ $promo->id }} <i class="ti-shift-right-alt"></i> <strong>Is
                                Featured Promo Code?</strong> @if($promo->is_featured === 1)
                                Yes @elseif($promo->is_featured === 0) No @endif <i class="ti-shift-right-alt"></i>
                            <strong>Sort By:</strong> @if($promo->sort_by === NULL)
                                NULL @else {{ $promo->sort_by }} @endif <i class="ti-shift-right-alt"></i> <strong>Created
                                At:</strong> {{ $promo->created_at->format('M d, Y - g:i:s A') }} <i
                                    class="ti-shift-right-alt"></i> <strong>Updated
                                At:</strong> {{ $promo->updated_at->format('M d, Y - g:i:s A') }} <i
                                    class="ti-shift-right-alt"></i> <strong>Created
                                By:</strong> {{ $promo->createdBy->name }} <i class="ti-shift-right-alt"></i> <strong>Updated
                                By:</strong> {{ $promo->updatedBy->name }}
                        </div>

                        <div class="text-right col-md-3">
                            <a href="{{ route('admin.promo-codes.index') }}"
                               class="btn btn-success"><i class="ti-back-left"></i> Back</a>

                            <a href="{{ route('front-end.show-promo', ['region' => \App\Casino::findOrFail(\App\PromoCode::findOrFail($promo->id)->casino->id)->region->slug, 'slug' => $promo->slug]) }}"
                               class="btn btn-info" target="_blank"><i class="ti-world"></i></a>

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
                            <h4 class="modal-title" id="myModalLabel">Delete: {{ $promo->name }}</h4>
                        </div>
                        <div class="modal-body">
                            <strong>Are you sure?</strong> This action is irreversible!
                        </div>
                        <div class="modal-footer">
                            <form action="{{ route('admin.promo-codes.destroy', ['id' => $promo->id]) }}"
                                  method="post" id="deleteLogo">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                            </form>

                            <button type="submit" class="btn btn-danger" form="deleteLogo"><i
                                        class="ti-trash"></i>
                                Delete: {{ $promo->name }}
                            </button>

                            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                <i class="ti-back-left"></i> Cancel
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel panel-default primary-container">
                <div class="panel-heading">Edit: {{ $promo->name }} @if($promo->is_active === 1)
                        <strong>(Published)</strong>
                    @elseif($promo->is_active === 0)
                        <strong>(Drafted)</strong>
                    @endif
                </div>

                <div class="panel-body">

                    <form action="{{ route('admin.promo-codes.update', ['id' => $promo->id]) }}" method="post"
                          id="promoCodeEdit">

                        <div class="row">
                            <div class="form-group{{ $errors->has('casino_id') ? ' has-error' : '' }} col-md-6">
                                <label for="casino_id">Operator Name</label>
                                <select class="form-control selectpicker" id="casino_id" name="casino_id"
                                        data-live-search="true" title="Select Operator Name">

                                    <option value="{{ $promo->casino->id }}"
                                            selected="selected">{{ $promo->casino->name }}</option>

                                    <option disabled>----------</option>

                                    <?php $casinos = \App\Casino::where('is_active', '>=', 1)->get(); ?>
                                    @foreach($casinos as $casino)
                                        <option value="{{ $casino->id }}">{{ $casino->name }}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('casino_id'))
                                    <span class="help-block">
                                <strong>{{ $errors->first('casino_id') }}</strong>
                            </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('promo_type_id') ? ' has-error' : '' }} col-md-6">
                                <label for="promo_type_id">Promo Type</label>

                                <select name="promo_type_id" id="promo_type_id" class="form-control selectpicker"
                                        data-live-search="true" title="Select Promo Type">

                                    <option value="{{ $promo->promoType->id }}"
                                            selected="selected">{{ $promo->promoType->name }}</option>

                                    <option disabled>----------</option>

                                    <?php $promoTypes = \App\PromoType::where('is_active', '>=', 1)->get(); ?>
                                    @foreach($promoTypes as $promoType)
                                        <option value="{{ $promoType->id }}">{{ $promoType->name }}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('promo_type_id'))
                                    <span class="help-block">
                                <strong>{{ $errors->first('promo_type_id') }}</strong>
                            </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('entry_instruction_id') ? ' has-error' : '' }} col-md-6">
                                <label for="entry_instruction_id">How To Enter?</label>

                                <select name="entry_instruction_id" id="entry_instruction_id"
                                        class="form-control selectpicker"
                                        data-live-search="true" title="Select How To Enter">

                                    <option value="{{ $promo->promoEntry->id }}"
                                            selected="selected">{{ $promo->promoEntry->name }}</option>

                                    <option disabled>----------</option>

                                    <?php $promoEntries = \App\PromoEntryInstruction::where('is_active', '>=', 1)->get(); ?>
                                    @foreach($promoEntries as $promoEntry)
                                        <option value="{{ $promoEntry->id }}">{{ $promoEntry->name }}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('entry_instruction_id'))
                                    <span class="help-block">
                                <strong>{{ $errors->first('entry_instruction_id') }}</strong>
                            </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('is_featured') ? ' has-error' : '' }} col-md-6">
                                <label for="is_featured">Is Featured?</label>

                                <select class="selectpicker form-control" id="is_featured" name="is_featured">

                                    @if($promo->is_featured === 1)
                                        <option value="1" selected="selected">Yes</option>
                                    @elseif($promo->is_featured === 0)
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
                        </div>

                        <div class="row">
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} col-md-6">
                                <label for="name">Promo Code Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                       value="{{ old('name') ?: $promo->name }}" placeholder="Promo Code Name"
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
                                       value="{{ old('slug') ?: $promo->slug }}" placeholder="URL Slug" maxlength="255"
                                       data-max="255">

                                <p class="help-block char-max-alert"></p>

                                @if ($errors->has('slug'))
                                    <span class="help-block">
                            <strong>{{ $errors->first('slug') }}</strong>
                        </span>
                                @endif
                            </div>
                        </div>

                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="promoCodeHeading">
                                    <h4 class="panel-title">
                                        <a role="button" data-toggle="collapse" data-parent="#accordion"
                                           href="#promoCodeCollapse" aria-expanded="true"
                                           aria-controls="promoCodeCollapse">
                                            <i class="ti-angle-down"></i> Promo Code Details
                                        </a>
                                    </h4>
                                </div>

                                <div id="promoCodeCollapse" class="panel-collapse collapse in" role="tabpanel"
                                     aria-labelledby="promoCodeHeading">
                                    <div class="panel-body">
                                        <div class="row">

                                            <div class="form-group{{ $errors->has('promo_code') ? ' has-error' : '' }} col-md-6">
                                                <label for="promo_code">Promo Code</label>
                                                <input type="text" class="form-control" id="promo_code"
                                                       name="promo_code"
                                                       value="{{ old('promo_code') ?: $promo->promo_code }}"
                                                       placeholder="Promo Code" maxlength="50" data-max="50">

                                                <p class="help-block char-max-alert"></p>

                                                @if ($errors->has('promo_code'))
                                                    <span class="help-block">
                                                <strong>{{ $errors->first('promo_code') }}</strong>
                                            </span>
                                                @endif
                                            </div>

                                            <div class="form-group{{ $errors->has('max_promo_amount') ? ' has-error' : '' }} col-md-6">
                                                <label for="max_promo_amount">Max Promo Amount</label>
                                                <input type="text" class="form-control" id="max_promo_amount"
                                                       name="max_promo_amount"
                                                       value="{{ old('max_promo_amount') ?: $promo->max_promo_amount }}"
                                                       placeholder="Max Promo Amount" maxlength="30" data-max="30">

                                                <p class="help-block char-max-alert"></p>

                                                @if ($errors->has('max_promo_amount'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('max_promo_amount') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group{{ $errors->has('start_date') ? ' has-error' : '' }} col-md-6">
                                                <label for="start_date">Start Date</label>
                                                <input type="text" class="form-control" id="start_date" name="start_date" value="{{ old('start_date') ?: $promo->start_date }}">

                                                @if ($errors->has('start_date'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('start_date') }}</strong>
                                                    </span>
                                                @endif
                                            </div>

                                            <div class="form-group{{ $errors->has('end_date') ? ' has-error' : '' }} col-md-6">
                                                <label for="end_date">End Date</label>
                                                <input type="text" class="form-control" id="end_date" name="end_date" value="{{ old('end_date') ?: $promo->end_date }}">

                                                @if ($errors->has('end_date'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('end_date') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingOne">
                                    <h4 class="panel-title">
                                        <a role="button" data-toggle="collapse" data-parent="#accordion"
                                           href="#collapseOne"
                                           aria-expanded="true" aria-controls="collapseOne">
                                            <i class="ti-angle-down"></i> Descriptions
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel"
                                     aria-labelledby="headingOne">
                                    <div class="panel-body">
                                        {{-- Include Casino Operator Modal --}}
                                        @include('admin.plugins.00-snippets.casino-operator-modal')

                                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                            <label for="description">Description</label>
                                            <textarea class="form-control" name="description" id="description"
                                                      rows="3">{!! old('description') ?: $promo->description !!}</textarea>

                                            @if ($errors->has('description'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('description') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        {{-- Include Casino Operator Modal --}}
                                        @include('admin.plugins.00-snippets.casino-operator-modal')

                                        <div class="form-group{{ $errors->has('terms_and_conditions') ? ' has-error' : '' }}">
                                            <label for="terms_and_conditions">Terms and Conditions</label>
                                            <textarea class="form-control" name="terms_and_conditions"
                                                      id="terms_and_conditions"
                                                      rows="3">{!! old('terms_and_conditions') ?: $promo->terms_and_conditions !!}</textarea>

                                            @if ($errors->has('terms_and_conditions'))
                                                <span class="help-block">
                                <strong>{{ $errors->first('terms_and_conditions') }}</strong>
                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="promoCodesSeoHeading">
                                    <h3 class="panel-title"><a role="button" data-toggle="collapse"
                                                               data-parent="#accordion" href="#promoCodesSeoCollapse"
                                                               aria-expanded="true"
                                                               aria-controls="promoCodesSeoCollapse"><i
                                                    class="ti-angle-down"></i> Casinos SEO Meta</a></h3>
                                </div>

                                <div id="promoCodesSeoCollapse" class="panel-collapse collapse in" role="tabpanel"
                                     aria-labelledby="promoCodesSeoHeading">
                                    <div class="panel-body">

                                        <div class="form-group{{ $errors->has('seo_title') ? ' has-error' : '' }}">
                                            <label for="seo_title">SEO Title</label>
                                            <input type="text" class="form-control" id="seo_title" name="seo_title"
                                                   value="{{ old('seo_title') ?: $promo->seo_title }}"
                                                   placeholder="SEO Title" maxlength="255" data-max="255">

                                            <p class="help-block char-max-alert"></p>

                                            @if ($errors->has('seo_title'))
                                                <span class="help-block">
                                    <strong>{{ $errors->first('seo_title') }}</strong>
                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group{{ $errors->has('seo_description') ? ' has-error' : '' }}">
                                            <label for="seo_description">SEO Description</label>
                                            <textarea class="form-control" name="seo_description" id="seo_description"
                                                      rows="3" maxlength="255"
                                                      data-max="255">{{ old('seo_description') ?: $promo->seo_description }}</textarea>

                                            <p class="help-block char-max-alert"></p>

                                            @if ($errors->has('seo_description'))
                                                <span class="help-block">
                            <strong>{{ $errors->first('seo_description') }}</strong>
                        </span>
                                            @endif
                                        </div>

                                        <div class="form-group{{ $errors->has('seo_keywords') ? ' has-error' : '' }}">
                                            <label for="seo_keywords">SEO Keywords</label>
                                            <textarea class="form-control" name="seo_keywords" id="seo_keywords"
                                                      rows="3" maxlength="255"
                                                      data-max="255">{{ old('seo_keywords') ?: $promo->seo_keywords }}</textarea>

                                            <p class="help-block char-max-alert"></p>

                                            @if ($errors->has('seo_keywords'))
                                                <span class="help-block">
                                    <strong>{{ $errors->first('seo_keywords') }}</strong>
                                </span>
                                            @endif
                                        </div>

                                    </div>
                                </div>
                            </div>{{-- SEO Meta --}}

                        </div>

                        <div class="row">
                            <div class="form-group{{ $errors->has('sort_by') ? ' has-error' : '' }} col-md-6">
                                <label for="sort_by">Sort By</label>
                                <input type="text" class="form-control" id="sort_by" name="sort_by"
                                       value="{{ old('sort_by') ?: $promo->sort_by }}" placeholder="Sort By"
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

                                    @if($promo->is_active === 1)
                                        <option value="1" selected="selected">Publish</option>
                                    @elseif($promo->is_active === 0)
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

                        <input type="hidden" name="permalink" value="{{ $promo->permalink }}">

                        {{ method_field('PUT') }}

                        {{ csrf_field() }}

                        <div class="row">

                            <div class="col-md-6">
                                <button type="submit" class="btn btn-success" form="promoCodeEdit"><i
                                            class="ti-save"></i>
                                    Save Changes
                                </button>
                            </div>
                        </div>

                    </form>

                    <div class="panel panel-default m-t-20">
                        <div class="panel-heading">
                            <h3 class="panel-title">Promo Code Banner Section</h3>
                        </div>
                        <div class="panel-body">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="thumbnail">
                                        <img src="{{ Image::url(Storage::url($promo->banner), 150, 150) }}"
                                             alt="{{ $promo->name }}">
                                    </div>
                                </div>
                            </div>

                            <form action="{{ route('admin.promo-codes.update-banner', ['id' => $promo->id]) }}"
                                  method="post" enctype="multipart/form-data" id="promoCodeEditBanner">

                                <div class="row">
                                    <div class="form-group{{ $errors->has('banner') ? ' has-error' : '' }} col-md-6">
                                        <label for="banner">Promo Code Banner</label>
                                        <input type="file" class="form-control" id="banner" name="banner"
                                               value="{{ old('banner') }}">

                                        @if ($errors->has('banner'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('banner') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    {{ method_field('PUT') }}

                                    {{ csrf_field() }}
                                </div>

                                <button type="submit" class="btn btn-success" form="promoCodeEditBanner"><i
                                            class="ti-image"></i> Change Banner
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
        $("#banner").fileinput({'showUpload': false, 'showRemove': false, 'previewFileType': 'any'});
    </script>

    <script src="{{ asset('vendor/tinymce/tinymce.min.js') }}"></script>
    <script>
        tinymce.init({
            selector: 'textarea#description, textarea#terms_and_conditions',
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

    <script src="{{ asset('js/star-rating.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/bootstrap-datetimepicker.min.js') }}"></script>
    <script>
        $('#start_date').datetimepicker({
            format: 'yyyy-mm-dd hh:ii:ss',
            autoclose: true,
            startView: 2,
            todayBtn: true,
            minView: 2
        }).find("input").val();
    </script>

    <script>
        $('#end_date').datetimepicker({
            format: 'yyyy-mm-dd hh:ii:ss',
            autoclose: true,
            startView: 2,
            todayBtn: true,
            minView: 2
        }).find("input").val();
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