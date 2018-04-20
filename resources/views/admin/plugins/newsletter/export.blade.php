@extends('admin.layout.master')

@section('title', 'Export Subscribers')

@section('content')
    <div class="panel panel-default primary-container">
        <div class="panel-heading"><i class="ti-export"></i> Export Subscribers</div>

        <div class="panel-body">
            <div class="text-right m-b-15">
                <a href="{{ route('admin.newsletter.index') }}" class="btn btn-success"><i class="ti-user"></i> Active Subscribers ({{ \App\Newsletter::whereIsActive(1)->count() }})</a>&nbsp;&nbsp;&nbsp;

                <a href="{{ route('admin.newsletter.archived') }}" class="btn btn-warning"><i class="ti-archive"></i> Archived Subscribers ({{ \App\Newsletter::whereIsActive(0)->count() }})</a>&nbsp;&nbsp;&nbsp;

                <a href="{{ route('admin.newsletter.export') }}" class="btn btn-success"><i class="ti-export"> Export Subscribers</i></a>
            </div>

            <textarea class="form-control" rows="20">@php if(!empty($subscribers)) { foreach($subscribers as $subscriber) {echo $subscriber->email ."\n";} } @endphp</textarea>
        </div>
    </div>
@endsection