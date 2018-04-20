@extends('admin.layout.master')

@section('title', 'All Promo Codes')

@section('content')
    <div class="panel panel-default primary-container">
        <div class="panel-heading"><i class="ti-gift"></i> All Promo Codes</div>

        <div class="panel-body">

            @if (session('promoCodeCreated'))
                <div class="alert alert-success" role="alert">
                    <strong>{{ session('promoCodeCreated') }}</strong>
                </div>
            @endif

            @if (session('promoCodeUpdated'))
                <div class="alert alert-success" role="alert">
                    <strong>{{ session('promoCodeUpdated') }}</strong>
                </div>
            @endif

            @if (session('promoCodeDeleted'))
                <div class="alert alert-success" role="alert">
                    <strong>{{ session('promoCodeDeleted') }}</strong>
                </div>
            @endif

            @if (session('promoCodeBannerUpdated'))
                <div class="alert alert-success" role="alert">
                    <strong>{{ session('promoCodeBannerUpdated') }}</strong>
                </div>
            @endif

            <div class="row">
                <div class="col-md-6">
                    <a href="{{ route('admin.promo-codes.index') }}" class="btn btn-primary"><i class="ti-gift"></i> All
                        Promo Codes</a>

                    <a href="{{ route('admin.promo-codes.create') }}" class="btn btn-success"><i class="ti-gift"></i>
                        Add
                        New</a>
                </div>

                <div class="col-md-6">
                    <div class="form-group pull-right">
                        <input type="text" class="search form-control" placeholder="Search Promo Codes...">
                    </div>
                    <span class="table-search-counter pull-right"></span>
                </div>
            </div>

            <table class="table table-bordered table-striped table-hover table-responsive table-search"
                   id="promosTable">
                <thead>
                <tr>
                    <th class="text-center">Status</th>
                    <th class="text-center">Promo Name</th>
                    <th class="text-center">Casino</th>
                    <th class="text-center">Promo Type</th>
                    <th class="text-center">Expiry</th>
                    <th class="text-center"><i class="ti-world"></i></th>
                </tr>
                </thead>
                <tbody>

                @unless(empty($promos))
                    @foreach($promos as $promo)
                        <tr>
                            <td class="text-center" style="width: 10%;">
                                @if($promo->is_active === 1)
                                    <span class="btn btn-success">Published</span>
                                @elseif($promo->is_active === 0)
                                    <span class="btn btn-warning">Drafted</span>
                                @endif
                            </td>

                            <td class="text-center"><a
                                        href="{{ route('admin.promo-codes.edit', ['slug' => $promo->slug]) }}">{{ $promo->name }}</a>
                            </td>

                            <td class="text-center"><a
                                        href="{{ route('admin.casinos.edit', ['slug' => \App\PromoCode::findOrFail($promo->id)->casino->slug]) }}">{{ \App\PromoCode::findOrFail($promo->id)->casino->name }}</a>
                            </td>

                            <td class="text-center"><a
                                        href="{{ route('admin.promo-types.edit', ['slug' => \App\PromoCode::findOrFail($promo->id)->promoType->slug]) }}">{{ \App\PromoCode::findOrFail($promo->id)->promoType->name }}</a>
                            </td>

                            <td class="text-center">
                                <?php $startDate = \Carbon\Carbon::parse($promo->start_date);
                                $endDate = \Carbon\Carbon::parse($promo->end_date);
                                $daysLeft = $endDate->diffForHumans($startDate);
                                echo $daysLeft; ?>
                            </td>

                            <td class="text-center"><a
                                        href="{{ route('front-end.show-promo', ['region' => \App\Casino::findOrFail(\App\PromoCode::findOrFail($promo->id)->casino->id)->region->slug, 'slug' => $promo->slug]) }}"
                                        class="btn btn-info" target="_blank"><i class="ti-world"></i></a></td>
                        </tr>

                    @endforeach
                @endunless

                </tbody>
            </table>

            {{-- Pagination --}}
            {{ $promos->links('vendor/pagination/bootstrap-4') }}

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