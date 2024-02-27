@extends('layouts.app')
@push('before-styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
<link rel="stylesheet" href="{{ asset('vendor/file-manager/css/file-manager.css') }}">
@endpush

@section('content')
<div id="fm" style="height: 100vh;"></div>
@endsection
@push('after-scripts')
<script src="{{ asset('vendor/file-manager/js/file-manager.js') }}"></script>
@endpush