@extends('layouts.app')

@push('before-styles')
@include('layouts.partials.style-data-table')
@endpush

@section('content')
<x-card>
    <x-slot name="header">
        {{ __('dashboard.partner_management') }}
    </x-slot>
    @can('partner-create')
    <x-slot name="headerAction">
        <a href="{{ route('admin.partner.create') }}" class="btn btn-success">{{ __('dashboard.create_new') }}</a>
    </x-slot>
    @endcan
    <x-slot name="body">
        <table class="table table-bordered text-center table-striped" id="partner">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Thumbnail</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($partners as $k => $partner)
                <tr>
                    <td>{{ ++$k }}</td>
                    <td><img src="{{$partner->logo}}" alt="" width="70"></td>
                    <td>{{ $partner->title_km }}</td>
                    <td>
                        @foreach (pulishedOpt() as $k => $status)
                            @if ($partner->is_published == $k)
                            <span class="badge {{ $k == 1 ? 'badge-success' : 'badge-danger' }}">{{ $status }}</span>
                            @endif
                        @endforeach
                    </td>
                    <td>
                        @include('partner.actions')
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
        $('#partner').DataTable({
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
