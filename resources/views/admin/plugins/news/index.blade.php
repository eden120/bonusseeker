@extends('admin.layout.master')

@section('title', 'All News')

@section('content')
    <div class="panel panel-default primary-container">
        <div class="panel-heading"><i class="ti-book"></i> All News</div>

        <div class="panel-body">

            @if (session('newsCreated'))
                <div class="alert alert-success" role="alert">
                    <strong>{{ session('newsCreated') }}</strong>
                </div>
            @endif

            @if (session('newsUpdated'))
                <div class="alert alert-success" role="alert">
                    <strong>{{ session('newsUpdated') }}</strong>
                </div>
            @endif

            @if (session('newsDeleted'))
                <div class="alert alert-success" role="alert">
                    <strong>{{ session('newsDeleted') }}</strong>
                </div>
            @endif

            @if (session('newsFeaturedImageUpdated'))
                <div class="alert alert-success" role="alert">
                    <strong>{{ session('newsFeaturedImageUpdated') }}</strong>
                </div>
            @endif

            <div class="row">
                <div class="col-md-6">
                    <a href="{{ route('admin.news.index') }}" class="btn btn-primary"><i class="ti-book"></i> All
                        News</a>

                    <a href="{{ route('admin.news.create') }}" class="btn btn-success"><i class="ti-book"></i>
                        Add
                        New</a>
                </div>

                <div class="col-md-6">
                    <div class="form-group pull-right">
                        <input type="text" class="search form-control" placeholder="Search News...">
                    </div>
                    <span class="table-search-counter pull-right"></span>
                </div>
            </div>

            <table class="table table-bordered table-striped table-hover table-responsive table-search" id="newsTable">
                <thead>
                <tr>
                    <th class="text-center">Status</th>
                    <th class="text-center">News Title</th>
                    <th class="text-center">Featured Image</th>
                    <th class="text-center">News Category</th>
                    <th class="text-center">Market</th>
                    <th class="text-center"><abbr title="Know Before You Play">KBYP</abbr></th>
                    <th class="text-center"><abbr title="Trending Now">TN</abbr></th>
                    <th class="text-center"><i class="ti-world"></i></th>
                </tr>
                </thead>
                <tbody>

                @unless(empty($allNews))
                    @foreach($allNews as $news)
                        <tr style="height: 80px;">
                            <td class="text-center">
                                @if($news->is_active === 1)
                                    <span class="btn btn-success" title="Published">P</span>
                                @elseif($news->is_active === 0)
                                    <span class="btn btn-warning" title="Drafted">D</span>
                                @endif
                            </td>

                            <td class="text-center">
                                <a href="{{ route('admin.news.edit', ['slug' => $news->slug]) }}">{{ $news->name }}</a>
                            </td>

                            <td class="text-center" style="width: 80px;">
                                <img src="{{ Image::url(Storage::url($news->featured_image), 80, 80) }}"
                                     alt="{{ $news->name }}">
                            </td>

                            <td class="text-center">
                                <a href="{{ route('admin.news-categories.edit', ['slug' => \App\News::findOrFail($news->id)->categoryId->slug]) }}">{{ \App\News::findOrFail($news->id)->categoryId->name }}</a>
                            </td>

                            <td class="text-center">
                                <a href="{{ route('admin.regions.edit', ['slug' => \App\News::findOrFail($news->id)->region->slug]) }}">{{ \App\News::findOrFail($news->id)->region->name }}</a>
                            </td>

                            <td class="text-center">@if($news->know_before_you_play === 1)
                                    <span style="font-weight: bold; color: limegreen;">Yes</span>
                                @elseif($news->know_before_you_play === 0)
                                    <span style="font-weight: bold; color: orangered;">No</span>
                                @endif
                            </td>

                            <td class="text-center">@if($news->is_trending === 1)
                                    <span style="font-weight: bold; color: limegreen;">Yes</span>
                                @elseif($news->is_trending === 0)
                                    <span style="font-weight: bold; color: orangered;">No</span>
                                @endif
                            </td>

                            <td class="text-center"><a href="{{ route('front-end.show-news', ['region' => \App\News::findOrFail($news->id)->region->slug, 'slug' => $news->slug]) }}" class="btn btn-info" target="_blank"><i class="ti-world"></i></a></td>
                        </tr>

                    @endforeach
                @endunless

                </tbody>
            </table>

            {{-- Pagination --}}
            {{ $allNews->links('vendor/pagination/bootstrap-4') }}

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