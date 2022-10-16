@extends('layouts.app')

@section('content')
<x-card>
    <x-slot name="header">
        សកម្មភាពអាជីវកម្ម
    </x-slot>
    <x-slot name="headerAction">
        <a href="{{ route('admin.activity.create') }}" class="btn btn-primary">{{ __('dashboard.create_new') }}</a>
    </x-slot>
    <x-slot name="body">
        <livewire:activity-table/>
    </x-slot>
</x-card>

@endsection