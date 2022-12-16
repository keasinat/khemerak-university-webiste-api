@extends('layouts.app')
@section('title', __('Category Edit'))
@section('content')
<x-forms.patch :action="route('admin.document.category.update', $category->id)">
    <x-card>
        <x-slot name="header">
            @lang('Category Edit')
        </x-slot>
        <x-slot name="headerAction">
            <x-utils.link
                icon="c-icon cil-plus"
                class="card-header-action"
                :href="route('admin.document.category.index')"
                :text="__('Cancel')"
                />
        </x-slot>
        <x-slot name="body">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="" class="form-label">{{ __('dashboard.category_name') }}</label>
                    <input type="text" name="title_km" class="form-control {{ $errors->has('title_km') ? 'is-invalid' : '' }}" value="{{ old('title_km') ?? $category->title_km }}">
                    @if($errors->has('title_km'))
                        <div class="invalid-feedback">
                            {{ $errors->first('title_km') }}
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="" class="form-label">{{ __('dashboard.slug') }}</label>
                    <input type="text" name="slug" class="form-control {{ $errors->has('slug') ? 'is-invalid' : '' }}" value="{{ old('slug') ?? $category->slug }}">
                    @if($errors->has('slug'))
                        <div class="invalid-feedback">
                            {{ $errors->first('slug') }}
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="" class="form-label">{{ __('dashboard.document_category') }}</label>
                    <select name="parent_id" id="" class="form-control">
                        <option value="">none</option>
                        @if ($categories)
                            @foreach ($categories as $category)
                            @php $dash= ''; @endphp
                            <option value="{{ $category->id }}" {{ old('parent_id') == $category->id ? "selected" : "" }}>{{ $category->title_km }}</option>
                            @if(count($category->subcategory))
                            @include('documents.category.subcategory-opt', ['subcategories' => $category->subcategory])
                            @endif
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </x-slot>
    </x-card>
</x-forms>
@endsection