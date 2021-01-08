@extends('layouts.backend')
@section('stlye')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
<link rel="stylesheet" href="{{ asset('vendor/file-manager/css/file-manager.css') }}">    
@endsection
@section('content')
<div style="height: 800px;">
    <div id="fm"></div>
</div>
@stop
@section('script')
<script src="{{ asset('vendor/file-manager/js/file-manager.js') }}"></script>    
@endsection
