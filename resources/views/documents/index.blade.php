@extends('layouts.app')
@section('title', __('Documents Management'))
@push('before-styles')
@include('layouts.partials.style-data-table')
@endpush
@section('content')
    <x-card>
        <x-slot name="header">
           {{ __('dashboard.document_management') }}
        </x-slot>
        @can('document-create')
        <x-slot name="headerAction">
            <x-utils.link
                icon="c-icon cil-plus"
                class="card-header-action"
                :href="route('admin.document.create')"
                :text="__('dashboard.create_new')"
                />
        </x-slot>
        @endcan
        <x-slot name="body">
            <div class="table-responsive p-3">
                <table class="table table-bordered table-striped" id="documents">
                    <thead>
                        <tr>
                            <th>{{ __('dashboard.thumbnail') }}</th>
                            <th>{{ __('dashboard.title') }}</th>
                            <th>{{ __('dashboard.document.category') }}</th>
                            <th>{{ __('dashboard.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                    @if (isset($documents))
                        @foreach ($documents as $document)
                        <tr>
                            <td>
                                <img src="{{ $document->thumbnail }}" alt="" width="50">
                            </td>
                            <td>{{ $document->title_km }}</td>
                            <td>{{ $document->dcategory->title_km }}</td>
                            <td>
                                @include('documents.includes.actions')
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