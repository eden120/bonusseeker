@extends('admin.layout.master')

@section('title', 'All Markets')

@section('content')
    <div class="panel panel-default primary-container">
        <div class="panel-heading">All Markets</div>

        <div class="panel-body">

            @if (session('regionCreated'))
                <div class="alert alert-success" role="alert">
                    <strong>{{ session('regionCreated') }}</strong>
                </div>
            @endif

            @if (session('regionUpdated'))
                <div class="alert alert-success" role="alert">
                    <strong>{{ session('regionUpdated') }}</strong>
                </div>
            @endif

            @if (session('regionDeleted'))
                <div class="alert alert-success" role="alert">
                    <strong>{{ session('regionDeleted') }}</strong>
                </div>
            @endif

            <div class="row">
                <div class="col-md-6">
                    <a href="{{ route('admin.regions.index') }}" class="btn btn-primary"><i class="ti-world"></i> All
                        Markets</a>

                    <a href="{{ route('admin.regions.create') }}" class="btn btn-success"><i class="ti-world"></i> Add
                        New</a>
                </div>

                <div class="col-md-6">
                    <div class="form-group pull-right">
                        <input type="text" class="search form-control" placeholder="Search Markets...">
                    </div>
                    <span class="table-search-counter pull-right"></span>
                </div>
            </div>

            <table class="table table-bordered table-striped table-hover table-responsive table-search"
                   id="regionsTable">
                <thead>
                <tr>
                    <th class="text-center">Status</th>
                    <th class="text-center">Market Name</th>
                    <th class="text-center">URL Slug</th>
                    <th class="text-center"><i class="ti-settings"></i></th>
                </tr>
                </thead>
                <tbody>

                @unless(empty($regions))
                    @foreach($regions as $region)

                        <tr>
                            <td class="text-center" style="width: 10%;">
                                @if($region->is_active === 1)
                                    <span class="btn btn-success">Published</span>
                                @elseif($region->is_active === 0)
                                    <span class="btn btn-warning">Drafted</span>
                                @endif
                            </td>
                            <td class="text-center"><a
                                        href="{{ route('admin.regions.edit', ['slug' => $region->slug]) }}">{{ $region->name }}</a>
                            </td>
                            <td class="text-center">{{ $region->slug }}</td>
                            <td class="text-center">
                                <a href="{{ route('front-end.show-parent-post', ['region' => $region->slug]) }}"
                                   class="btn btn-success" target="_blank"><i class="ti-world"></i></a>
                                <a href="{{ route('admin.regions.edit', ['slug' => $region->slug]) }}"
                                   class="btn btn-info"><i class="ti-pencil"></i></a>
                            </td>
                        </tr>

                    @endforeach
                @endunless

                </tbody>
            </table>

            {{-- Pagination --}}
            {{ $regions->links('vendor/pagination/bootstrap-4') }}

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
@endsection