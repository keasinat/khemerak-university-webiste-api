@extends('layouts.app')
@section('title', __('Category Management'))
@push('before-styles')
@include('layouts.partials.style-data-table')
@endpush
@section('content')
    <x-card>
        <x-slot name="header">
            @lang('Document Category Management')
        </x-slot>
        <x-slot name="headerAction">
            <x-utils.link
                icon="c-icon cil-plus"
                class="card-header-action"
                :href="route('admin.document.category.create')"
                :text="__('Create Category')"
                />
        </x-slot>
        <x-slot name="body">
            <div class="table-responsive p-3">
                <table class="table table-bordered table-striped" id="category">
                    <thead>
                        <tr>
                            <th>{{__('Title English')}}</th>
                            <th>{{__('Slug')}}</th>
                            <th>{{__('Parent Category')}}</th>
                            <th>{{__('Action')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                        @php $dash=''; @endphp
                        <tr>
                            <td>{{ $category->title_km }}</td>
                            <td>{{ $category->slug }}</td>
                            <td>
                                @if (isset( $category->parent_id ))
                                {{ $category->parent->title_km }}
                                @else
                                None
                                @endif
                            </td>
                            <td>
                                @include('documents.category.includes.actions')
                            </td>
                        </tr>
                        @if(count($category->subcategory))
                                     @include('documents.category.subcategory-list',['subcategories' => $category->subcategory])
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