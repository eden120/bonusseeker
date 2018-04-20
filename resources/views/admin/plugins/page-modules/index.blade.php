@extends('admin.layout.master')

@section('title', 'All Page Modules')

@section('content')
    <div class="panel panel-default primary-container">
        <div class="panel-heading"><i class="ti-plug"></i> All Page Modules</div>

        <div class="panel-body">

            @if (session('pageModuleCreated'))
                <div class="alert alert-success" role="alert">
                    <strong>{{ session('pageModuleCreated') }}</strong>
                </div>
            @endif

            @if (session('pageModuleUpdated'))
                <div class="alert alert-success" role="alert">
                    <strong>{{ session('pageModuleUpdated') }}</strong>
                </div>
            @endif

            @if (session('pageModuleDeleted'))
                <div class="alert alert-success" role="alert">
                    <strong>{{ session('pageModuleDeleted') }}</strong>
                </div>
            @endif

            <div class="row">
                <div class="col-md-6">
                    <a href="{{ route('admin.page-modules.index') }}" class="btn btn-primary"><i class="ti-plug"></i>
                        All
                        Page Modules</a>

                    <a href="{{ route('admin.page-modules.create') }}" class="btn btn-success"><i class="ti-plug"></i>
                        Add
                        New</a>
                </div>

                <div class="col-md-6">
                    <div class="form-group pull-right">
                        <input type="text" class="search form-control" placeholder="Search Page Modules...">
                    </div>
                    <span class="table-search-counter pull-right"></span>
                </div>
            </div>

            <table class="table table-bordered table-striped table-hover table-responsive table-search"
                    id="pageModulesTable">
                <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Module Title</th>
                    <th class="text-center">Page Name</th>
                    <th class="text-center">Sort By</th>
                    <th class="text-center">Updated At</th>
                    <th class="text-center">Manage</th>
                </tr>
                </thead>
                <tbody>

                @unless(empty($page_modules))
                    @foreach($page_modules as $page_module)
                        <tr>
                            <td class="text-center">{{ $page_module->id }}</td>
                            <td class="text-center" style="width: 10%;">
                                @if($page_module->is_active === 1)
                                    <span class="btn btn-success">Active</span>
                                @elseif($page_module->is_active === 0)
                                    <span class="btn btn-warning">Inactive</span>
                                @endif
                            </td>

                            <td class="text-center">
                                <a href="{{ route('admin.page-modules.edit', ['id' => $page_module->id]) }}">{{ $page_module->title }}</a>
                            </td>

                            <td class="text-center">
                                <a href="{{ route('admin.pages.edit', ['slug' => \App\PageModule::findOrFail($page_module->id)->page->slug]) }}">{{ \App\PageModule::findOrFail($page_module->id)->page->name }}</a>
                            </td>

                            <td class="text-center">{{ $page_module->sort_by }}</td>
                            <td class="text-center">{{ \Carbon\Carbon::parse($page_module->updated_at)->diffForHumans() }}</td>
                            <td class="text-center" style="width: 15%;">
                                <a href="{{ route('admin.page-modules.edit', ['id' => $page_module->id]) }}" class="btn btn-success"><i class="ti-eye"></i></a>
                                <a href="{{ route('admin.page-modules.edit', ['id' => $page_module->id]) }}" class="btn btn-info"><i class="ti-pencil"></i></a>
                            </td>
                        </tr>

                    @endforeach
                @endunless

                </tbody>
            </table>

            {{-- Pagination --}}
            {{ $page_modules->links('vendor/pagination/bootstrap-4') }}

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