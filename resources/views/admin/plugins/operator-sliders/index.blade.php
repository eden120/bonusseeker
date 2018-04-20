@extends('admin.layout.master')

@section('title', 'All Operator Sliders')

@section('customCSS')
    <link rel="stylesheet" href="{{ asset('css/fileinput.min.css') }}">
    <link href="{{ asset('css/bootstrap-select.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    @if (session('OperatorSliderDeleted'))
        <div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="ti-close"></i></span></button>
            <strong>Success! </strong> Operator Slider:
            <strong>{{ session('OperatorSliderDeleted') }}</strong> has been deleted!
        </div>
    @endif

    <div class="panel panel-default primary-container">
        <div class="panel-heading">
            <i class="ti-plus"></i> New Operator Slider
        </div>
        <div class="panel-body">
            <form action="{{ route('admin.operator-slider.store') }}" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="form-group{{ $errors->has('casino_id') ? ' has-error' : '' }} col-md-6">
                        <label for="casino_id">Operator Name</label>
                        <select class="form-control selectpicker" id="casino_id" name="casino_id" data-live-search="true" title="Select Operator Name" required="required">

                            @foreach($casinos as $casino)
                                <option value="{{ $casino->id }}">{{ $casino->name }}</option>
                            @endforeach

                            @if(old('casino_id') == TRUE)
                                <option value="{{ $casino->id }}" selected="selected">{{ $casino->name }}</option>
                            @endif
                        </select>

                        @if ($errors->has('casino_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('casino_id') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} col-md-6">
                        <label for="name">Slider Image Name (Optional)</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="Slider Image Name">

                        @if ($errors->has('name'))
                            <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @endif
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

                {{ csrf_field() }}

                <div class="row">
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-success"><i class="ti-save"></i> Save Changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <div class="panel panel-default primary-container">
        <div class="panel-heading"><i class="ti-layout-slider"></i> All Operator Sliders</div>

        <div class="panel-body">

            <div class="row">
                <div class="col-md-6">
                    <a href="{{ route('admin.operator-slider.index') }}" class="btn btn-primary"><i class="ti-layout-slider"></i> All Operator Sliders</a>
                </div>

                <div class="col-md-6">
                    <div class="form-group pull-right">
                        <input type="text" class="search form-control" placeholder="Search Operator Sliders...">
                    </div>
                    <span class="table-search-counter pull-right"></span>
                </div>
            </div>

            <table class="table table-bordered table-striped table-hover table-responsive table-search" id="OperatorSliderTable">
                <thead>
                <tr>
                    <th class="text-center">Status</th>
                    <th class="text-center">
                        <abbr data-toggle="tooltip" data-placement="top" title="Operator">O</abbr> ID
                    </th>
                    <th class="text-center">Slider Image</th>
                    <th class="text-center">Slider Name</th>
                    <th class="text-center" style="width: 15%;">Edit</th>
                </tr>
                </thead>
                <tbody>

                @unless(empty($operator_sliders))
                    @foreach($operator_sliders as $operator_slider)
                        <tr>
                            <td class="text-center" style="width: 10%;">
                                @if($operator_slider->is_active === 1)
                                    <span class="btn btn-success">Published</span>
                                @elseif($operator_slider->is_active === 0)
                                    <span class="btn btn-warning">Drafted</span>
                                @endif
                            </td>

                            <td class="text-center">
                                <span data-toggle="tooltip" data-placement="top" title="{{ $operator_slider->casino->name }}">{{ $operator_slider->casino->id }}</span>
                            </td>

                            <td class="text-center">
                                <a href="{{ route('admin.operator-slider.edit', ['uuid' => $operator_slider->uuid]) }}"><img src="{{ Image::url(Storage::url($operator_slider->slider_image), 150, 75) }}" alt="{{ $operator_slider->name }}"></a>
                            </td>

                            <td class="text-center">
                                <a href="{{ route('admin.operator-slider.edit', ['uuid' => $operator_slider->uuid]) }}">{{ $operator_slider->name }}</a>
                            </td>

                            <td class="text-center">
                                <a href="{{ route('admin.operator-slider.edit', ['uuid' => $operator_slider->uuid]) }}" class="btn btn-primary"><i class="ti-pencil-alt"></i></a>
                            </td>
                        </tr>
                    @endforeach
                @endunless

                </tbody>
            </table>

            {{-- Pagination --}}
            {{ $operator_sliders->links('vendor/pagination/bootstrap-4') }}

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

    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
@endsection