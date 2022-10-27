@extends('layouts.app')
@push('before-styles')
@include('layouts.partials.style-data-table')
@endpush
@section('content')
<x-card>
    <x-slot name="header">
        សកម្មភាពអាជីវកម្ម
    </x-slot>
    <x-slot name="headerAction">
        <a href="{{ route('admin.activity.create') }}" class="btn btn-primary">{{ __('dashboard.create_new') }}</a>
    </x-slot>
    <x-slot name="body">
        <div class="table-responsive p-3">
            <table class="table table-bordered" id="category">
                <thead>
                    <tr>
                        <th>{{ __('dashboard.group') }}</th>
                        <th>{{ __('dashboard.class') }}</th>
                        <th>{{ __('dashboard.code') }}</th>
                        <th>{{ __('dashboard.description') }}</th>
                        <th>{{ __('dashboard.ministry_fullname') }}</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($categories) > 0)
                        @foreach ($categories as $item)
                        <tr>
                            <td>{{ $item->group }}</td>
                            <td>{{ $item->sub_group }}</td>
                            <td>{{ $item->code }}</td>
                            <td>{{ $item->name_km }}</td>
                            <td>{{ $item->m_name_km }}</td>
                            <td>{{ $item->sub_group }}</td>
                            <td></td>
                        </tr>
                        @endforeach
                    @else
                        <tr>No Data</tr>
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
        //   $("#category").DataTable({
        //     "responsive": true, "lengthChange": false, "autoWidth": false,
        //     "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        //   }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
          $('#category').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
          });
        });
      </script>
@endpush