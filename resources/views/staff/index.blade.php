@extends('layouts.app')

@push('before-styles')
@include('layouts.partials.style-data-table')
@endpush

@section('content')
<x-card>
    <x-slot name="header">
        {{ __('dashboard.staff_management') }}
    </x-slot>
    @can('staff-create')
    <x-slot name="headerAction">
        <a href="{{ route('admin.staff.create') }}" class="btn btn-success">{{ __('dashboard.create_new') }}</a>
    </x-slot>
    @endcan
    <x-slot name="body">
        <table class="table table-bordered text-center table-striped" id="staff">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Thumbnail</th>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($staffs as $k => $staff)
                <tr>
                    <td>{{ ++$k }}</td>
                    <td><img src="{{$staff->thumbnail}}" alt="" width="70"></td>
                    <td>{{ $staff->name_en }}</td>
                    <td>{{ $staff->position_en}}</td>
                    <td>
                        @foreach (pulishedOpt() as $k => $status)
                            @if ($staff->is_published == $k)
                            <span class="badge {{ $k == 1 ? 'badge-success' : 'badge-danger' }}">{{ $status }}</span>
                            @endif
                        @endforeach
                    </td>
                    <td>
                        @include('staff.actions')
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
        $('#staff').DataTable({
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