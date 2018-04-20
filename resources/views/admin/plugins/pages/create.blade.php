@extends('admin.layout.master')

@section('title', 'Create Page')

@section('customCSS')
    <link href="{{ asset('css/bootstrap-select.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="panel panel-default primary-container">
        <div class="panel-heading"><i class="ti-files"></i> Create Page</div>

        <div class="panel-body">

            <form action="{{ route('admin.pages.store') }}" method="post" id="pageCreate">

                <div class="row">
                    <div class="form-group{{ $errors->has('region_id') ? ' has-error' : '' }} col-md-6">
                        <label for="region_id">Market Name</label>
                        <select class="form-control selectpicker" id="region_id" name="region_id"
                                data-live-search="true"
                                title="Select Region Name">
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
                    <label for="name">Page Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}"
                           placeholder="Page Name" onkeyup="getName()">

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

                <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                    <label for="description">Description</label>
                    <textarea class="form-control" name="description" id="description"
                              rows="3">{{ old('description') }}</textarea>

                    @if ($errors->has('description'))
                        <span class="help-block">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingOne">
                            <h3 class="panel-title"><a role="button" data-toggle="collapse" data-parent="#accordion"
                                                       href="#collapseOne" aria-expanded="true"
                                                       aria-controls="collapseOne"><i class="ti-angle-down"></i> Page&#039;s
                                    Meta</a></h3>
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

    <script src="{{ asset('js/bootstrap-select.min.js') }}"></script>
@endsection