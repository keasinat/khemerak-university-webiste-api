@extends('layouts.app')
@section('title', __('Documents Management'))
@push('before-styles')
@include('layouts.partials.style-data-table')
@endpush
@section('content')
    <x-card>
        <x-slot name="header">
            {{ __('dashboard.document.video_management') }}
        </x-slot>
        <x-slot name="headerAction">
            <x-utils.link
                icon="c-icon cil-plus"
                class="card-header-action"
                :href="route('admin.document.video.create')"
                :text="__('dashboard.create_new')"
                />
        </x-slot>
        <x-slot name="body">
            <div class="table-responsive p-3">
                <table class="table table-bordered table-striped" id="videos">
                    <thead>
                        <tr>
                            <th>{{ __('dashboard.thumbnail') }}</th>
                            <th>{{ __('dashboard.document.video_name') }}</th>
                            <th>{{ __('dashboard.document.video_url') }}</th>
                            <th>{{ __('dashboard.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                    @if (isset($videos))
                        @foreach ($videos as $video)
                        <tr>
                            <td>
                                <img src="{{ $video->thumbnail }}" alt="" width="50">
                            </td>
                            <td>{{ $video->title_km }}</td>
                            <td>{{ $video->file }}</td>
                            <td>
                                @include('documents.videos.actions')
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

          $('#videos').DataTable({
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