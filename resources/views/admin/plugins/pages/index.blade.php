@extends('admin.layout.master')

@section('title', 'All Pages')

@section('content')
    <div class="panel panel-default primary-container">
        <div class="panel-heading"><i class="ti-files"></i> All Pages</div>

        <div class="panel-body">

            @if (session('pageCreated'))
                <div class="alert alert-success" role="alert">
                    <strong>{{ session('pageCreated') }}</strong>
                </div>
            @endif

            @if (session('pageUpdated'))
                <div class="alert alert-success" role="alert">
                    <strong>{{ session('pageUpdated') }}</strong>
                </div>
            @endif

            @if (session('pageDeleted'))
                <div class="alert alert-success" role="alert">
                    <strong>{{ session('pageDeleted') }}</strong>
                </div>
            @endif

            <div class="row">
                <div class="col-md-6">
                    <a href="{{ route('admin.pages.index') }}" class="btn btn-primary"><i class="ti-files"></i> All
                        Pages</a>

                    <a href="{{ route('admin.pages.create') }}" class="btn btn-success"><i class="ti-files"></i> Add
                        New</a>
                </div>

                <div class="col-md-6">
                    <div class="form-group pull-right">
                        <input type="text" class="search form-control" placeholder="Search Pages...">
                    </div>
                    <span class="table-search-counter pull-right"></span>
                </div>
            </div>

            <table class="table table-bordered table-striped table-hover table-responsive table-search"
                   id="pagesTable">
                <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Page Name</th>
                    <th class="text-center">Region</th>
                    <th class="text-center">Updated At</th>
                    <th class="text-center">Manage</th>
                </tr>
                </thead>
                <tbody>

                @unless(empty($pages))
                    @foreach($pages as $page)
                        <tr>
                            <td class="text-center">{{ $page->id }}</td>
                            <td class="text-center" style="width: 10%;">
                                @if($page->is_active === 1)
                                    <span class="btn btn-success">Published</span>
                                @elseif($page->is_active === 0)
                                    <span class="btn btn-warning">Drafted</span>
                                @endif
                            </td>

                            <td class="text-center"><a href="{{ route('admin.pages.edit', ['slug' => $page->slug]) }}">{{ $page->name }}</a>
                            </td>

                            <td class="text-center"><a href="{{ route('admin.regions.edit', ['slug' => \App\Page::findOrFail($page->id)->region->slug]) }}">{{ \App\Page::findOrFail($page->id)->region->name }}</a>
                            </td>

                            <td class="text-center">{{ \Carbon\Carbon::parse($page->updated_at)->diffForHumans() }}</td>

                            <td class="text-center" style="width: 15%;">
                                <a href="{{ route('admin.pages.edit', ['slug' => $page->slug]) }}"
                                   class="btn btn-info"><i class="ti-pencil"></i></a>
                            </td>
                        </tr>

                    @endforeach
                @endunless

                </tbody>
            </table>

            {{-- Pagination --}}
            {{ $pages->links('vendor/pagination/bootstrap-4') }}

        </div>
    </div>
@endsection

@section('customJS')
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