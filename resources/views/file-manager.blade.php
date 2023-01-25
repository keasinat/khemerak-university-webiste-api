@extends('layouts.app')
@push('before-styles')
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
<link rel="stylesheet" href="{{ asset('vendor/file-manager/css/file-manager.css') }}">
@endpush
@section('content')
<div id="fm" style="height: 100vh;"></div>
@endsection
@push('after-scripts')
<script src="{{ asset('vendor/file-manager/js/file-manager.js') }}"></script>
@endpush