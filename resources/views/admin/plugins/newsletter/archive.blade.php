@extends('admin.layout.master')

@section('title', 'Archived Subscribers')

@section('customCSS')
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap.min.css') }}">
@endsection

@section('content')
    @if (session('subscriberArchived'))
        <div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="ti-close"></i></span></button>
            <strong>Success! </strong> Newsletter Subscriber
            <strong>{{ session('subscriberArchived') }}</strong> has been updated!
        </div>
    @endif

    <div class="panel panel-default primary-container">
        <div class="panel-heading"><i class="ti-archive"></i> Archived Subscribers</div>

        <div class="panel-body">
            <div class="text-right m-b-15">
                <a href="{{ route('admin.newsletter.index') }}" class="btn btn-success"><i class="ti-user"></i> Active Subscribers ({{ \App\Newsletter::whereIsActive(1)->count() }})</a>
            </div>

            <table class="table table-bordered" id="newsletter-subscribers">
                <thead>
                <tr>
                    <th class="text-center">Id</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">IP Address</th>
                    <th class="text-center">Subscribed At</th>
                    <th class="text-center"><i class="ti-user"></i></th>
                </tr>
                </thead>
                <tbody>
                @unless(empty($subscribers))
                    @foreach($subscribers as $subscriber)
                        <tr>
                            <td class="text-center">{{ $subscriber->id }}</td>
                            <td class="text-center">
                                <a href="mailto:{{ $subscriber->email }}">{{ $subscriber->email }}</a></td>
                            <td class="text-center">
                                <a href="https://myip.ms/info/whois/{{ $subscriber->ip_address }}" target="_blank" data-toggle="tooltip" data-placement="top" title="Whois IP Result for {{ $subscriber->ip_address }}">{{ $subscriber->ip_address }}</a>
                            </td>
                            <td class="text-center">
                                <span data-toggle="tooltip" data-placement="top" title="{{ Carbon\Carbon::parse($subscriber->created_at)->toDayDateTimeString() }}">{{ Carbon\Carbon::parse($subscriber->created_at)->diffForHumans() }}</span>
                            </td>

                            <td class="text-center">
                                <a href="{{ route('admin.newsletter.archive', ['id' => $subscriber->id]) }}" onclick="event.preventDefault();document.getElementById('active-form-{{ $subscriber->id }}').submit();" data-toggle="tooltip" data-placement="top" title="Active Subscriber #{{ $subscriber->id }}"><i class="ti-user"></i></a>

                                <form id="active-form-{{ $subscriber->id }}" action="{{ route('admin.newsletter.archive', ['id' => $subscriber->id]) }}" method="POST" style="display: none;">
                                    <input type="hidden" name="is_active" value="{{ encrypt(TRUE) }}">
                                    {{ method_field('PUT') }}
                                    {{ csrf_field() }}
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @endunless
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('customJS')
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap.min.js') }}"></script>

    <script>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>

    <script>
        $(document).ready(function() {
            $('#newsletter-subscribers').DataTable({
                "aoColumns": [{"bSortable": false}, null, null, null, null],
                "aaSorting": [[0, 'desc']],
                "lengthMenu": [[50, 100, 250, -1], [50, 100, 250, "All"]]
            });
        });
    </script>
@endsection