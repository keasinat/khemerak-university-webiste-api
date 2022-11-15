@extends('layouts.app')
@push('before-styles')
@include('layouts.partials.style-data-table')
@endpush
@section('content')
    <x-card>
        <x-slot name="header">
            {{ __('dashboard.page_management') }}
        </x-slot>
        <x-slot name="headerAction">
            <a href="{{ route('admin.page.create') }}" class="btn btn-primary">{{ __('dashboard.create_new') }}</a>
        </x-slot>
        <x-slot name="body">
            <div class="table-responsive p-3">
                <table class="table table-bordered table-striped" id="pages">
                    <thead>
                        <tr>
                            <th>{{ __('dashboard.page_name') }}</th>
                            <th>{{ __('dashboard.status') }}</th>
                            <th>{{ __('dashboard.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($pages) > 0)
                        @foreach($pages as $page)
                        <tr>
                            <td>{{ $page->title_km }}</td>
                            <td>
                                @foreach (pulishedOpt() as $k => $item)
                                    @if ($page->is_published == $k)
                                        <span class="badge">{{ $item }}</span>
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                <x-utils.edit-button :href="route('admin.page.edit',  $page)" />
                                <x-utils.delete-button :href="route('admin.page.destroy', $page->id)" />
                            </td>
                        </tr>
                        @endforeach
                        @else
                        No Data
                        @endif
                    </tbody>
                </table>
            </div>
        </x-slot>
    </x-card>
@endsection
@push('after-scripts')
@include('layouts.partials.script-data-table')
<script>
    $(function () {

      $('#pages').DataTable({
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