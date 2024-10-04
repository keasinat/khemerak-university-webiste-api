@extends('layouts.app')
@section('title', __('Category Management'))
@push('before-styles')
@include('layouts.partials.style-data-table')
@endpush
@section('content')
    <x-card>
        <x-slot name="header">
            News Category
        </x-slot>
        <x-slot name="headerAction">
            @can('news-create')
            <x-utils.link
                icon="c-icon cil-plus"
                class="card-header-action"
                :href="route('admin.news.category.create')"
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
                            <th>Number of news</th>
                            <th>{{__('dashboard.action')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                        @php $dash=''; @endphp
                        <tr>
                            <td>{{ $category->title_km }}</td>
                            <td>{{ $category->slug }}</td>
                            <td>{{ $category->news->count() }}</td>
                            <td>
                                @include('news.category.includes.actions')
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
