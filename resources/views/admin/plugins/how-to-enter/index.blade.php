@extends('admin.layout.master')

@section('title', 'All How To Enter')

@section('customCSS')
    <link href="{{ asset('css/bootstrap-select.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    @if (session('promoEntryCreated'))
        <div class="alert alert-success" role="alert">
            <strong>{{ session('promoEntryCreated') }}</strong>
        </div>
    @endif

    @if (session('promoEntryUpdated'))
        <div class="alert alert-success" role="alert">
            <strong>{{ session('promoEntryUpdated') }}</strong>
        </div>
    @endif

    @if (session('promoEntryDeleted'))
        <div class="alert alert-success" role="alert">
            <strong>{{ session('promoEntryDeleted') }}</strong>
        </div>
    @endif

    <div class="panel panel-default primary-container">
        <div class="panel-heading">
            <i class="ti-plus"></i> Create How To Enter
        </div>
        <div class="panel-body">
            <form action="{{ route('admin.how-to-enter.store') }}" method="post">
                <div class="row">
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} col-md-6">
                        <label for="name">How To Enter Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}"
                               placeholder="How To Enter Name">

                        @if ($errors->has('name'))
                            <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('slug') ? ' has-error' : '' }} col-md-6">
                        <label for="slug">URL Slug</label>
                        <input type="text" class="form-control" id="slug" name="slug" value="{{ old('slug') }}"
                               placeholder="URL Slug">

                        @if ($errors->has('slug'))
                            <span class="help-block">
                                <strong>{{ $errors->first('slug') }}</strong>
                            </span>
                        @endif
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
                        <button type="submit" class="btn btn-success"><i class="ti-save"></i> Save Changes
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <div class="panel panel-default primary-container">
        <div class="panel-heading"><i class="ti-gift"></i> All How To Enter</div>

        <div class="panel-body">

            <div class="row">
                <div class="col-md-6">
                    <a href="{{ route('admin.how-to-enter.index') }}" class="btn btn-primary"><i class="ti-gift"></i>
                        All
                        How To Enter</a>
                </div>

                <div class="col-md-6">
                    <div class="form-group pull-right">
                        <input type="text" class="search form-control" placeholder="Search How To Enter...">
                    </div>
                    <span class="table-search-counter pull-right"></span>
                </div>
            </div>

            <table class="table table-bordered table-striped table-hover table-responsive table-search"
                   id="promoEntryTable">
                <thead>
                <tr>
                    <th class="text-center">Status</th>
                    <th class="text-center">How To Enter Name</th>
                    <th class="text-center" style="width: 15%;">Edit</th>
                </tr>
                </thead>
                <tbody>

                @unless(empty($promoEntryInstruction))
                    @foreach($promoEntryInstruction as $promo_entry)
                        <tr>
                            <td class="text-center" style="width: 10%;">
                                @if($promo_entry->is_active === 1)
                                    <span class="btn btn-success">Published</span>
                                @elseif($promo_entry->is_active === 0)
                                    <span class="btn btn-warning">Drafted</span>
                                @endif
                            </td>

                            <td class="text-center"><a
                                        href="{{ route('admin.how-to-enter.edit', ['slug' => $promo_entry->slug]) }}">{{ $promo_entry->name }}</a>
                            </td>

                            <td class="text-center">
                                <a href="{{ route('admin.how-to-enter.edit', ['slug' => $promo_entry->slug]) }}"
                                   class="btn btn-primary"><i class="ti-pencil-alt"></i></a>
                            </td>
                        </tr>

                    @endforeach
                @endunless

                </tbody>
            </table>

            {{-- Pagination --}}
            {{ $promoEntryInstruction->links('vendor/pagination/bootstrap-4') }}

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

    <script src="{{ asset('js/bootstrap-select.min.js') }}"></script>

    <script>
        $(document).ready(function () {
            $(".search").keyup(function () {
                var searchTerm  = $(".search").val();
                var listItem    = $('.table-search tbody').children('tr');
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
@endsection