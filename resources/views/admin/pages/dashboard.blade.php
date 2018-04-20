@extends('admin.layout.master')

@section('title', 'Admin Dashboard')

@section('content')
    <div class="panel panel-default primary-container">
        <div class="panel-heading">Admin Dashboard</div>

        <div class="panel-body">
            You are logged in as {{ Auth::guard('admin')->user()->name }}!
        </div>
    </div>
@endsection