@extends('admin.layout.master')

@section('title')
    @unless(empty($editVideo))
        @foreach($editVideo as $video)
            Edit {{ $video->name }}
        @endforeach
    @endunless
@endsection

@section('customCSS')
    <link href="{{ asset('css/bootstrap-select.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    @unless(empty($editVideo))
        @foreach($editVideo as $video)

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
                    {{ $video->name }}
                </div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-9">
                            <strong>ID:</strong> {{ $video->id }} <i class="ti-shift-right-alt"></i>
                            <strong>Created At:</strong> {{ $video->created_at->format('M d, Y - g:i:s A') }}
                            <i class="ti-shift-right-alt"></i>
                            <strong>Updated At:</strong> {{ $video->updated_at->format('M d, Y - g:i:s A') }}
                        </div>

                        <div class="text-right col-md-3">
                            <a href="{{ route('admin.videos.index') }}" class="btn btn-success"><i
                                        class="ti-back-left"></i> Back</a>

                            <button type="button" class="btn btn-danger" data-toggle="modal"
                                    data-target="#confirmDelete" title="Delete">
                                <i class="ti-trash"></i></button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="confirmDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Delete: {{ $video->name }}</h4>
                        </div>
                        <div class="modal-body">
                            <strong>Are you sure?</strong> This action is irreversible!
                        </div>
                        <div class="modal-footer">
                            <form action="{{ route('admin.videos.destroy', ['id' => $video->id]) }}" method="post"
                                  id="deleteVideo">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                            </form>

                            <button type="submit" class="btn btn-danger" form="deleteVideo"><i class="ti-trash"></i>
                                Delete: {{ $video->name }}
                            </button>

                            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                <i class="ti-back-left"></i> Cancel
                            </button>
                        </div>
                    </div>
                </div>
            </div>{{----}}

            <div class="panel panel-default primary-container">
                <div class="panel-heading">Edit: {{ $video->name }} @if($video->is_active === 1)
                        <span class="btn btn-success">Published</span>
                    @elseif($video->is_active === 0)
                        <span class="btn btn-warning">Drafted</span>
                    @endif</div>

                <div class="panel-body">
                    <form action="{{ route('admin.videos.update', ['id' => $video->id]) }}" method="post"
                          id="videoEdit">

                        <div class="row">
                            <div class="form-group{{ $errors->has('region_id') ? ' has-error' : '' }} col-md-6">
                                <label for="region_id">Region Name</label>
                                <select class="form-control selectpicker" id="region_id" name="region_id"
                                        data-live-search="true">
                                    <option value="{{ $video->region->id }}"
                                            selected="selected">{{ $video->region->name }} (Current)
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
                        </div>

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name">Video Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                   value="{{ old('name') ?: $video->name }}" placeholder="Video Name"
                                   onkeyup="getName()" maxlength="255" data-max="255">

                            <p class="help-block char-max-alert"></p>

                            @if ($errors->has('name'))
                                <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('slug') ? ' has-error' : '' }}">
                            <label for="slug">URL Slug</label>
                            <input type="text" class="form-control" id="slug" name="slug"
                                   value="{{ old('slug') ?: $video->slug }}" placeholder="URL Slug" maxlength="255"
                                   data-max="255">

                            <p class="help-block char-max-alert"></p>

                            @if ($errors->has('slug'))
                                <span class="help-block">
                            <strong>{{ $errors->first('slug') }}</strong>
                        </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('url') ? ' has-error' : '' }}">
                            <label for="url">Video URL (YouTube)</label>
                            <input type="text" class="form-control" id="url" name="url"
                                   value="{{ old('url') ?: $video->url }}" placeholder="Video URL (YouTube)"
                                   maxlength="1536" data-max="1536">

                            <p class="help-block char-max-alert"></p>

                            @if ($errors->has('url'))
                                <span class="help-block">
                            <strong>{{ $errors->first('url') }}</strong>
                        </span>
                            @endif
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Video&#039;s Meta</h3>
                            </div>

                            <div class="panel-body">

                                <div class="form-group{{ $errors->has('seo_title') ? ' has-error' : '' }}">
                                    <label for="seo_title">SEO Title</label>
                                    <input type="text" class="form-control" id="seo_title" name="seo_title"
                                           value="{{ old('seo_title') ?: $video->seo_title }}" placeholder="SEO Title"
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
                                              data-max="255">{{ old('seo_description') ?: $video->seo_description }}</textarea>
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
                                              data-max="255">{{ old('seo_keywords') ?: $video->seo_keywords }}</textarea>

                                    <p class="help-block char-max-alert"></p>

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
                            <div class="form-group{{ $errors->has('sort_by') ? ' has-error' : '' }} col-md-6">
                                <label for="sort_by">Sort By</label>
                                <input type="text" class="form-control" id="sort_by" name="sort_by"
                                       value="{{ old('sort_by') ?: $video->sort_by }}" placeholder="Sort By"
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
                                    @if($video->is_active === 1)
                                        <option value="1" selected="selected">Publish</option>
                                    @elseif($video->is_active === 0)
                                        <option value="0" selected="selected">Draft</option>
                                    @endif

                                    <option disabled="disabled">----------</option>

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

                        <button type="submit" class="btn btn-success" form="videoEdit">
                            <i class="ti-save"></i> Save Changes
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
            var getName = document.getElementById("name").value;
            document.getElementById("seo_title").value = getName;
        }
    </script>

    <script src="{{ asset('js/bootstrap-select.min.js') }}"></script>

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