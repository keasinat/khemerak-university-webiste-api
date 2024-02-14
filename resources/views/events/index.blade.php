@extends('layouts.app')
@section('title', __('Events Management'))
@push('before-styles')
@include('layouts.partials.style-data-table')
@endpush
@section('content')
    <x-card>
        <x-slot name="header">
           {{ __('dashboard.event_management') }}
        </x-slot>
        @can('event-create')
        <x-slot name="headerAction">
            <x-utils.link
                icon="c-icon cil-plus"
                class="card-header-action"
                :href="route('admin.event.create')"
                :text="__('dashboard.create_new')"
                />
        </x-slot>
        @endcan
        <x-slot name="body">
            <div class="table-responsive p-3">
                <table class="table table-bordered table-striped" id="events">
                    <thead>
                        <tr>
                            <th>{{ __('dashboard.id') }}</th>
                            <th>{{ __('dashboard.thumbnail') }}</th>
                            <th>{{ __('dashboard.title') }}</th>
                            <th>{{ __('dashboard.start_date') }} ~ {{ __('dashboard.end_date') }}</th>
                            <th>{{ __('dashboard.status') }}</th>
                            <th>{{ __('dashboard.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                    @if (isset($events))
                        @foreach ($events as $k => $event)
                        <tr>
                            <td>{{ ++$k }}</td>
                            <td><img src="{{ asset($event->thumbnail) }}" width="70" height="50" /></td>
                            <td style="width:30%">{{ $event->title }}</td>
                            <td>{{ $event->start_date ? $event->start_date->format('d-m-Y') : '-' }} ~ {{ $event->end_date ? $event->end_date->format('d-m-Y') : '-' }}</td>
                            <td>
                                @foreach (pulishedOpt() as $k => $status)
                                    @if ($event->is_published == $k)
                                    <span class="badge {{ $k == 1 ? 'badge-success' : 'badge-danger' }}">{{ $status }}</span>
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                @include('events.includes.actions')
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

          $('#events').DataTable({
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
