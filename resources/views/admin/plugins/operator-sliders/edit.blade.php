@extends('admin.layout.master')

@section('title', $slider->name)

@section('customCSS')
    <link rel="stylesheet" href="{{ asset('css/fileinput.min.css') }}">
    <link href="{{ asset('css/bootstrap-select.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    @if (session('operatorSliderCreated'))
        <div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="ti-close"></i></span></button>
            <strong>Success! </strong> Operator Slider:
            <strong>{{ session('operatorSliderCreated') }}</strong> has been created!
        </div>
    @endif

    @if (session('operatorSliderUpdated'))
        <div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="ti-close"></i></span></button>
            <strong>Success! </strong> Operator Slider:
            <strong>{{ session('operatorSliderUpdated') }}</strong> has been updated!
        </div>
    @endif

    @if (session('OperatorSliderImageUpdated'))
        <div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="ti-close"></i></span></button>
            <strong>Success! </strong> Operator Slider Image for:
            <strong>{{ session('OperatorSliderImageUpdated') }}</strong> has been updated!
        </div>
    @endif

    <div class="panel panel-default primary-container">
        <div class="panel-heading">
            {{ $slider->name }}
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-9">
                    <strong>ID:</strong> {{ $slider->id }} <i class="ti-shift-right-alt"></i>
                    <strong>Created At:</strong> {{ $slider->created_at->format('M d, Y - g:i:s A') }}
                    <i class="ti-shift-right-alt"></i>
                    <strong>Updated At:</strong> {{ $slider->updated_at->format('M d, Y - g:i:s A') }}
                </div>

                <div class="text-right col-md-3">
                    <a href="{{ route('admin.operator-slider.index') }}" class="btn btn-success"><i class="ti-back-left"></i> Back</a>

                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirmDelete" title="Delete">
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
                    <h4 class="modal-title" id="myModalLabel">Delete: {{ $slider->name }}</h4>
                </div>
                <div class="modal-body">
                    <strong>Are you sure?</strong> This action is irreversible!
                </div>
                <div class="modal-footer">
                    <form action="{{ route('admin.operator-slider.destroy', ['uuid' => $slider->uuid]) }}" method="post" id="deleteLogo">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                    </form>

                    <button type="submit" class="btn btn-danger" form="deleteLogo">
                        <i class="ti-trash"></i> Delete: {{ $slider->name }}
                    </button>

                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        <i class="ti-back-left"></i> Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="panel panel-default primary-container">
        <div class="panel-heading">
            <i class="ti-pencil-alt"></i> Edit: {{ $slider->name }}
        </div>
        <div class="panel-body">
            <form action="{{ route('admin.operator-slider.update', ['uuid' => $slider->uuid]) }}" method="post">
                <div class="row">
                    <div class="form-group{{ $errors->has('casino_id') ? ' has-error' : '' }} col-md-6">
                        <label for="casino_id">Operator Name</label>
                        <select class="form-control selectpicker" id="casino_id" name="casino_id" data-live-search="true" title="Select Operator Name" required="required">

                            <option value="{{ $slider->casino->id }}" selected="selected">{{ $slider->casino->name }}</option>

                            <option disabled>----------</option>

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

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} col-md-6">
                        <label for="name">Slider Image Name (Optional)</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') ?: $slider->name }}" placeholder="Slider Image Name">

                        @if ($errors->has('name'))
                            <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('is_active') ? ' has-error' : '' }} col-md-6">
                        <label for="is_active">Action</label>

                        <select class="selectpicker form-control" name="is_active" id="is_active">
                            @if($slider->is_active === 1)
                                <option value="1" selected="selected">Publish</option>
                            @elseif($slider->is_active === 0)
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
                        <button type="submit" class="btn btn-success"><i class="ti-save"></i> Save Changes</button>
                    </div>
                </div>
            </form>

            <hr>

            <div class="m-t-15">
                <form action="{{ route('admin.operator-slider.update.slider-image', ['uuid' => $slider->uuid]) }}" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="thumbnail">
                                <img src="{{ Image::url(Storage::url($slider->slider_image), 300, 150) }}" alt="{{ $slider->name }}">
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('slider_image') ? ' has-error' : '' }} col-md-6">
                            <label for="slider_image">Slider Image</label>
                            <input type="file" class="form-control" id="slider_image" name="slider_image" value="{{ old('slider_image') }}" required="required">

                            @if ($errors->has('slider_image'))
                                <span class="help-block">
                                <strong>{{ $errors->first('slider_image') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <input type="hidden" name="casino_id" value="{{ $slider->casino->id }}">

                    {{ method_field('PUT') }}
                    {{ csrf_field() }}

                    <div class="row">
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-success"><i class="ti-image"></i> Upload New Slider Image</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('customJS')
    <script>
        $(document).ready(function () {
            $(".search").keyup(function () {
                var searchTerm = $(".search").val();
                var listItem = $('.table-search tbody').children('tr');
                var searchSplit = searchTerm.replace(/ /g, "'):containsi('");

                $.extend($.expr[':'], {
                    'containsi': function (elem, i, match, array) {
                        return (elem.textContent || elem.innerText || '').toLowerCase().indexOf((match[3] || "").toLowerCase()) >= 0;
                    }
                });

                $(".table-search tbody tr").not(":containsi('" + searchSplit + "')").each(function (e) {
                    $(this).attr('visible', 'false');
                });

                $(".table-search tbody tr:containsi('" + searchSplit + "')").each(function (e) {
                    $(this).attr('visible', 'true');
                });

                var jobCount = $('.table-search tbody tr[visible="true"]').length;
                $('.table-search-counter').text(jobCount + ' item');

                if (jobCount == '0') {
                    $('.table-search-no-result').show();
                }
                else {
                    $('.table-search-no-result').hide();
                }
            });
        });
    </script>

    <script src="{{ asset('js/bootstrap-select.min.js') }}"></script>

    <script src="{{ asset('js/fileinput.min.js') }}"></script>
    <script>
        $("#slider_image").fileinput({'showUpload': false, 'showRemove': false, 'previewFileType': 'any'});
    </script>
@endsection