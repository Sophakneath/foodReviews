@extends('adminMaster')

@section('title', 'Advertisement')

@section('content')

<div class="container">
    <div class="alert alert-danger" role="alert" style="margin-top:400px; margin-bottom:400px;">
        <h4 class="alert-heading">Message Alert!</h4>
            <p>Sorry, This page can be operated only by <strong>{{$role}}</strong>.</p>
        <hr>
            <p class="mb-0">Please Login as <strong>{{$role}}</strong> for operation.</p>
    </div>
</div>
@endsection