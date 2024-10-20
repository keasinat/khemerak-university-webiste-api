@extends('layouts.app')
@push('before-styles')
@include('layouts.partials.style-data-table')
@endpush
@section('content')
<x-card>
    <x-slot name="header">
        {{ __('dashboard.news_management') }}
    </x-slot>
    @can('news-create')
    <x-slot name="headerAction">
        <a href="{{ route('admin.news.create') }}" class="btn btn-success">{{ __('dashboard.create_new') }}</a>
    </x-slot>
    @endcan
    <x-slot name="body">

            <table class="table table-bordered text-center table-striped" id="news">
                <thead>
                    <tr>
                        <th>{{ __('dashboard.thumbnail') }}</th>
                        <th>{{ __('dashboard.title') }}</th>
                        <th>{{ __('dashboard.status') }}</th>
                        <th>{{ __('dashboard.action') }}</th>
                    </tr>
                </thead>
                <tbody>
                        @foreach ($newsList as $news)
                        <tr>
                            <td><img src="{{ asset($news->thumbnail) }}" width="70" height="50" /></td>
                            <td>{{ Str::limit($news->title_km,60) }}</td> <td>
                                @foreach (pulishedOpt() as $k => $status)
                                    @if ($news->is_published == $k)
                                    <span class="badge {{ $k == 1 ? 'badge-success' : 'badge-danger' }}">{{ $status }}</span>
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                @include('news.actions')
                            </td>
                        </tr>
                        @endforeach
                </tbody>
            </table>
        </div>
    </x-slot>
</x-card>
@endsection
@push('after-scripts')
@include('layouts.partials.script-data-table')
<script>
     $('div.alert').delay(1000).slideUp(300);
    $(function () {
        $('#news').DataTable({
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