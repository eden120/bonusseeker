@extends('admin.layout.master')

@section('title')
    @unless(empty($editPage))
        @foreach($editPage as $page)
            Edit {{ $page->name }}
        @endforeach
    @endunless
@endsection

@section('customCSS')
    <link href="{{ asset('css/bootstrap-select.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    @unless(empty($editPage))
        @foreach($editPage as $page)

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
                    {{ $page->name }}
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-9">
                            <strong>ID:</strong> {{ $page->id }} <i class="ti-shift-right-alt"></i>
                            <strong>Created
                                At:</strong> {{ $page->created_at->format('M d, Y - g:i:s A') }} <i
                                    class="ti-shift-right-alt"></i> <strong>Updated
                                At:</strong> {{ $page->updated_at->format('M d, Y - g:i:s A') }}
                        </div>

                        <div class="text-right col-md-3">
                            <a href="{{ route('admin.pages.index') }}"
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
                            <h4 class="modal-title" id="myModalLabel">Delete: {{ $page->name }}</h4>
                        </div>
                        <div class="modal-body">
                            <strong>Are you sure?</strong> This action is irreversible!
                        </div>
                        <div class="modal-footer">
                            <form action="{{ route('admin.pages.destroy', ['id' => $page->id]) }}"
                                  method="post" id="deletePage">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                            </form>

                            <button type="submit" class="btn btn-danger" form="deletePage"><i
                                        class="ti-trash"></i>
                                Delete: {{ $page->name }}
                            </button>

                            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                <i class="ti-back-left"></i> Cancel
                            </button>
                        </div>
                    </div>
                </div>
            </div>{{----}}

            <div class="panel panel-default primary-container">
                <div class="panel-heading">Edit: {{ $page->name }} @if($page->is_active === 1)
                        <span class="btn btn-success">Published</span>
                    @elseif($page->is_active === 0)
                        <span class="btn btn-warning">Drafted</span>
                    @endif</div>

                <div class="panel-body">
                    <form action="{{ route('admin.pages.update', ['id' => $page->id]) }}" method="post"
                          id="pageEdit">

                        <div class="row">
                            <div class="form-group{{ $errors->has('region_id') ? ' has-error' : '' }} col-md-6">
                                <label for="region_id">Region Name</label>
                                <select class="form-control selectpicker" id="region_id" name="region_id"
                                        data-live-search="true">

                                    <option value="{{ $page->region->id }}"
                                            selected="selected">{{ $page->region->name }} (Current)
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
                            <label for="name">Page Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                   value="{{ $page->name }}"
                                   placeholder="Page Name" onkeyup="getName()">

                            @if ($errors->has('name'))
                                <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('slug') ? ' has-error' : '' }}">
                            <label for="slug">URL Slug</label>
                            <input type="text" class="form-control" id="slug" name="slug"
                                   value="{{ $page->slug }}"
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
                                      rows="3">{{ $page->description }}</textarea>

                            @if ($errors->has('description'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Page&#039;s Meta</h3>
                            </div>
                            <div class="panel-body">

                                <div class="form-group{{ $errors->has('seo_title') ? ' has-error' : '' }}">
                                    <label for="seo_title">SEO Title</label>
                                    <input type="text" class="form-control" id="seo_title" name="seo_title"
                                           value="{{ $page->seo_title }}" placeholder="SEO Title">

                                    @if ($errors->has('seo_title'))
                                        <span class="help-block">
                                    <strong>{{ $errors->first('seo_title') }}</strong>
                                </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('seo_description') ? ' has-error' : '' }}">
                                    <label for="seo_description">SEO Description</label>
                                    <textarea class="form-control" name="seo_description" id="seo_description"
                                              rows="3">{{ $page->seo_description }}</textarea>

                                    @if ($errors->has('seo_description'))
                                        <span class="help-block">
                            <strong>{{ $errors->first('seo_description') }}</strong>
                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('seo_keywords') ? ' has-error' : '' }}">
                                    <label for="seo_keywords">SEO Keywords</label>
                                    <textarea class="form-control" name="seo_keywords" id="seo_keywords"
                                              rows="3">{{ $page->seo_keywords }}</textarea>

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

                        <button type="submit" class="btn btn-success" form="pageEdit"><i class="ti-save"></i> Save
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
            var getName = document.getElementById("name").value;
            document.getElementById("seo_title").value = getName;
        }
    </script>

    <script src="{{ asset('js/bootstrap-select.min.js') }}"></script>
@endsection