@extends('layouts.app')
@section('title', __('User Management'))
@push('before-styles')
@include('layouts.partials.style-data-table')
@endpush
@section('content')
    <x-card>
        <x-slot name="header">
            @lang('User Management')
        </x-slot>
        @can('user-create')
        <x-slot name="headerAction">
            <x-utils.link
            icon="far fa-plus nav-icon"
            class="card-header-action"
            :href="route('admin.users.create')"
            :text="__('Create')"
            />
        </x-slot>
        @endcan
        <x-slot name="body">
            <div class="table-responsive p-3">
                <table class="table table-bordered table-striped" id="users">
                    <thead>
                        <tr>
                            <th>{{ __('dashboard.username') }}</th>
                            <th>{{ __('dashboard.email') }}</th>
                            <th>{{ __('dashboard.role') }}</th>
                            <th>{{ __('dashboard.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($users))
                            @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if(!empty($user->getRoleNames()))
                                        @foreach($user->getRoleNames() as $v)
                                        <label class="badge badge-success">{{ $v }}</label>
                                        @endforeach
                                    @endif
                                </td>
                                <td>
                                    @include('auth.user.actions')
                                </td>
                            </tr>    
                            @endforeach   
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

          $('#users').DataTable({
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