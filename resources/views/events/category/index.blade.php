@extends('layouts.app')
@section('title', __('Category Management'))
@push('before-styles')
@include('layouts.partials.style-data-table')
@endpush
@section('content')
    <x-card>
        <x-slot name="header">
            {{ __('dashboard.event_categories') }}
        </x-slot>
        <x-slot name="headerAction">
            @can('event-create')
            <x-utils.link
                icon="c-icon cil-plus"
                class="card-header-action"
                :href="route('admin.event.category.create')"
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
                            <th>{{__('dashboard.event_parent')}}</th>
                            <th>{{__('dashboard.num_of_event')}}</th>
                            <th>{{__('dashboard.action')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                        @php $dash=''; @endphp
                        <tr>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->slug }}</td>
                            <td>
                                @if (isset( $category->parent_id ))
                                {{ $category->parent->name }}
                                @else
                                None
                                @endif
                            </td>
                            <td>{{ $category->events->count() }}</td>
                            <td>
                                @include('events.category.includes.actions')
                            </td>
                        </tr>
                            @if(count($category->subcategory))
                                @include('events.category.subcategory-list',['subcategories' => $category->subcategory])
                            @endif
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