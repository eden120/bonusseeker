@extends('admin.layout.master')

@section('title', 'All Operators')

@section('content')
    <div class="panel panel-default primary-container">
        <div class="panel-heading"><i class="ti-medall"></i> All Operators</div>

        <div class="panel-body">
            @if (session('casinoDeleted'))
                <div class="alert alert-success" role="alert">
                    <strong>{{ session('casinoDeleted') }}</strong>
                </div>
            @endif

            @if (session('casinoLogoUpdated'))
                <div class="alert alert-success" role="alert">
                    <strong>{{ session('casinoLogoUpdated') }}</strong>
                </div>
            @endif

            <div class="row">
                <div class="col-md-6">
                    <a href="{{ route('admin.casinos.index') }}" class="btn btn-primary"><i class="ti-medall"></i> All
                        Operators</a>

                    <a href="{{ route('admin.casinos.create') }}" class="btn btn-success"><i class="ti-medall"></i> Add
                        New</a>
                </div>

                <div class="col-md-6">
                    <div class="form-group pull-right">
                        <input type="text" class="search form-control" placeholder="Search Operators...">
                    </div>
                    <span class="table-search-counter pull-right"></span>
                </div>
            </div>

            <table class="table table-bordered table-striped table-hover table-responsive table-search"
                   id="casinosTable">
                <thead>
                <tr>
                    <th class="text-center">Status</th>
                    <th class="text-center">Operator Name</th>
                    <th class="text-center">Logo</th>
                    <th class="text-center">Sort By</th>
                    <th class="text-center">Market</th>
                    <th class="text-center">Rating</th>
                    <th class="text-center"><i class="ti-world"></i></th>
                </tr>
                </thead>
                <tbody>

                @unless(empty($casinos))
                    @foreach($casinos as $casino)
                        <tr style="height: 60px;">
                            <td class="text-center" style="width: 10%;">
                                @if($casino->is_active === 1)
                                    <span class="btn btn-success">Published</span>
                                @elseif($casino->is_active === 0)
                                    <span class="btn btn-warning">Drafted</span>
                                @endif
                            </td>

                            <td class="text-center"><a
                                        href="{{ route('admin.casinos.edit', ['uuid' => $casino->uuid]) }}">{{ $casino->name }}</a>
                            </td>

                            <td class="text-center" style="width: 120px; height: 60px;"><img
                                        src="{{ Image::url(Storage::url($casino->logo), 120, 60) }}"
                                        alt="{{ $casino->name }}"></td>

                            <td class="text-center">{{ $casino->sort_by }}</td>

                            <td class="text-center"><a
                                        href="{{ route('admin.regions.edit', ['slug' => $casino->region->slug]) }}">{{ $casino->region->name }}</a>
                            </td>

                            <td class="text-center">@php $ratings = [$casino->editors_review_casino_bonus, $casino->editors_review_game_selection, $casino->editors_review_support, $casino->editors_review_banking]; @endphp
                                {{ round(array_sum($ratings) / 4, 2) }}</td>

                            <td class="text-center"><a
                                        href="{{ route('front-end.show-casino', ['region' => $casino->region->slug, 'slug' => $casino->slug]) }}"
                                        class="btn btn-info" target="_blank"><i class="ti-world"></i></a></td>
                        </tr>

                    @endforeach
                @endunless

                </tbody>
            </table>

            {{-- Pagination --}}
            {{ $casinos->links('vendor/pagination/bootstrap-4') }}

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