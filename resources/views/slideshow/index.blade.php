@extends('layouts.app')

@push('before-styles')
@include('layouts.partials.style-data-table')
@endpush

@section('content')
<x-card>
    <x-slot name="header">
        {{ __('dashboard.slideshow_management') }}
    </x-slot>
    @can('slideshow-create')
    <x-slot name="headerAction">
        <a href="{{ route('admin.slideshow.create') }}" class="btn btn-success">{{ __('dashboard.create_new') }}</a>
    </x-slot>
    @endcan
    <x-slot name="body">
        <table class="table table-bordered text-center table-striped" id="slideshow">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Thumbnail</th>
                    <th>Headline</th>
                    <th>Content</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($slideshows as $k => $slideshow)
                <tr>
                    <td>{{ ++$k }}</td>
                    <td><img src="{{$slideshow->thumbnail}}" alt="" width="70"></td>
                    <td>{{ $slideshow->headline }}</td>
                    <td>{{ $slideshow->content}}</td>
                    <td>
                        @foreach (pulishedOpt() as $k => $status)
                            @if ($slideshow->is_published == $k)
                            <span class="badge {{ $k == 1 ? 'badge-success' : 'badge-danger' }}">{{ $status }}</span>
                            @endif
                        @endforeach
                    </td>
                    <td>
                        @include('slideshow.actions')
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </x-slot>
</x-card>
@endsection
@push('after-scripts')
@include('layouts.partials.script-data-table')
<script>
     $('div.alert').delay(1000).slideUp(300);
    $(function () {
        $('#slideshow').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>

@endpush
