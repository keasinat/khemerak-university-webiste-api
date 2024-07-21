@extends('layouts.app')
@section('title', __('Documents Management'))
@push('before-styles')
@include('layouts.partials.style-data-table')
@endpush
@section('content')
    <x-card>
        <x-slot name="header">
           {{ __('Subject list') }}
        </x-slot>
        @can('menu-create')
        <x-slot name="headerAction">
            <x-utils.link
                icon="c-icon cil-plus"
                class="card-header-action"
                :href="route('admin.menu.subject.create')"
                :text="__('dashboard.create_new')"
                />
        </x-slot>
        @endcan
        <x-slot name="body">
            <div class="table-responsive p-3">
                <table class="table table-bordered table-striped" id="documents">
                    <thead>
                        <tr>
                            <th>{{ __('dashboard.title') }}</th>
                            <th>{{ __('dashboard.document.category') }}</th>
                            <th>{{ __('Thumbnail') }}</th>
                            <th>{{ __('dashboard.document.published') }}</th>
                            <th>{{ __('dashboard.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                    @if (isset($subjects))
                        @foreach ($subjects as $subject)
                        <tr>
                            <td>{{ $subject->title_km }}</td>
                            <td>{{ $subject->academic->title_km }}</td>
                            <td><img src="{{$subject->thumbnail}}" alt="none"></td>
                            <td>
                                @foreach(pulishedOpt() as $k => $item)
                                    @if($subject->is_published == $k)
                                    <span class="badge {{ $subject->is_published == 0 ? 'badge-danger' : 'badge-success'}}">{{ $item }}</span>
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                @include('menu.subject.includes.actions')
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

          $('#documents').DataTable({
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
