@extends('layouts.app')
@section('title', __('User Management'))
@push('before-styles')
@include('layouts.partials.style-data-table')
@endpush
@section('content')
<x-card>
    <x-slot name="header">
        @lang('Roles Management')
    </x-slot>
    @can('role-create')
    <x-slot name="headerAction">
        <x-utils.link
        icon="far fa-plus nav-icon"
        class="card-header-action"
        :href="route('admin.roles.create')"
        :text="__('Create')"
        />
    </x-slot>
    @endcan
    <x-slot name="body">
        <div class="table-responsive p-3">
            <table class="table table-bordered table-striped" id="roles">
                <thead>
                    <tr>
                        <th>{{ __('dashboard.role_type') }}</th>
                        <th>{{ __('dashboard.action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <td>{{ $role->name }}</td>
                            <td>
                                @include('auth.roles.actions')
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
        $(function () {

          $('#roles').DataTable({
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