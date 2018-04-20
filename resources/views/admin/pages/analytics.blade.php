@extends('admin.layout.master')

@section('title', 'Site Stats')

@section('content')
    <div class="panel panel-default primary-container">
        <div class="panel-heading">Site Stats</div>

        <div class="panel-body">
            <h3 class="text-center">Visitors and Page Views in 30 Days</h3>
            <table class="table table-bordered table-responsive table-striped">
                <thead>
                <tr>
                    <th class="text-center">Date</th>
                    <th class="text-center">Visitors</th>
                    <th class="text-center">Page Title</th>
                    <th class="text-center">Page Views</th>
                </tr>
                </thead>
                <tbody>
                @foreach($fetch_visitors_and_page_views as $fetch_visitors_and_page_view)
                    <?php $collect_visitors_and_page_view = collect($fetch_visitors_and_page_view); ?>
                    <tr>
                        <td class="text-center"
                            style="width: 15%;">{{ \Carbon\Carbon::parse($collect_visitors_and_page_view['date'])->format('d M, Y') }}</td>
                        <td class="text-center">{{ $collect_visitors_and_page_view['visitors'] }}</td>
                        <td>{{ $collect_visitors_and_page_view['pageTitle'] }}</td>
                        <td class="text-center">{{ $collect_visitors_and_page_view['pageViews'] }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <h3 class="text-center">Total Visitors and Page Views in 30 Days</h3>
            <table class="table table-bordered table-responsive table-striped">
                <thead>
                <tr>
                    <th class="text-center">Date</th>
                    <th class="text-center">Visitors</th>
                    <th class="text-center">Page Views</th>
                </tr>
                </thead>
                <tbody>
                @foreach($fetch_total_visitors_and_page_views as $fetch_total_visitors_and_page_view)
                    <?php $collect_total_visitors_and_page_view = collect($fetch_total_visitors_and_page_view); ?>
                    <tr>
                        <td class="text-center">{{ \Carbon\Carbon::parse($collect_total_visitors_and_page_view['date'])->format('d M, Y') }}</td>
                        <td class="text-center">{{ $collect_total_visitors_and_page_view['visitors'] }}</td>
                        <td class="text-center">{{ $collect_total_visitors_and_page_view['pageViews'] }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <h3 class="text-center">Top Referrers in 30 Days</h3>
            <table class="table table-bordered table-responsive table-striped">
                <thead>
                <tr>
                    <th class="text-center">URL</th>
                    <th class="text-center">Page Views</th>
                </tr>
                </thead>
                <tbody>
                @foreach($fetch_top_referrers as $fetch_top_referrer)
                    <?php $collect_top_referrers = collect($fetch_top_referrer); ?>
                    <tr>
                        <td class="text-center">{{ $collect_top_referrers['url'] }}</td>
                        <td class="text-center">{{ $collect_top_referrers['pageViews'] }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <h3 class="text-center">Top Browsers in 30 Days</h3>
            <table class="table table-bordered table-responsive table-striped">
                <thead>
                <tr>
                    <th class="text-center">Browsers</th>
                    <th class="text-center">Sessions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($fetch_top_browsers as $fetch_top_browser)
                    <?php $collect_top_browsers = collect($fetch_top_browser); ?>
                    <tr>
                        <td class="text-center">{{ $collect_top_browsers['browser'] }}</td>
                        <td class="text-center">{{ $collect_top_browsers['sessions'] }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection