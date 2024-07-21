@extends('layouts.app')
@section('title', __('Academic Management'))
@push('before-styles')
@include('layouts.partials.style-data-table')
@endpush
@section('content')
    <x-card>
        <x-slot name="header">
            {{ __('dashboard.document_category') }}
        </x-slot>
        <x-slot name="headerAction">
            @can('menu-create')
            <x-utils.link
                icon="c-icon cil-plus"
                class="card-header-action"
                :href="route('admin.menu.academic.create')"
                :text="__('dashboard.create_new')"
                />
            @endcan
        </x-slot>
        <x-slot name="body">
            <div class="table-responsive p-3">
                <table class="table table-bordered table-striped" id="category">
                    <thead>
                        <tr>
                            <th>{{__('dashboard.title')}}</th>
                            <th>{{__('dashboard.slug')}}</th>
                            <th>{{__('dashboard.document.parent_category')}}</th>
                            <th>{{__('Number of Subjects')}}</th>
                            <th>{{__('dashboard.action')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($academics as $academic)
                        @php $dash=''; @endphp
                        <tr>
                            <td>{{ $academic->title_km }}</td>
                            <td>{{ $academic->slug }}</td>
                            <td>
                                @if (isset( $academic->parent_id ))
                                {{ $academic->parent->title_km }}
                                @else
                                None
                                @endif
                            </td>
                            <td>{{ $academic->subjects->count() }}</td>
                            <td>
                                @include('menu.academic.includes.actions')
                            </td>
                        </tr>
                            {{-- @if(count($academic->children))
                                @include('menu.academic.subcategory-list',['subcategories' => $academic->children])
                            @endif --}}
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

          $('#category').DataTable({
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
