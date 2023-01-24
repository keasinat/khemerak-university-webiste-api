@extends('layouts.app')
@push('before-styles')
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="{{ asset('vendor/file-manager/css/file-manager.css') }}">
@endpush
@section('content')
<div id="fm" style="height: 600px;"></div>
@endsection
@push('after-scripts')
<script src="{{ asset('vendor/file-manager/js/file-manager.js') }}"></script>
@endpush