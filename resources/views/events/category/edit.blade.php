@extends('layouts.app')
@section('title', __('Category Edit'))
@section('content')
<x-forms.patch :action="route('admin.event.category.update', $category->id)">
    <x-card>
        <x-slot name="header">
            {{ __('dashboard.event_categories') }}
        </x-slot>
        <x-slot name="headerAction">
            <x-utils.link
                icon="c-icon cil-plus"
                class="card-header-action"
                :href="route('admin.event.category.index')"
                :text="__('dashboard.cancel')"
                />
        </x-slot>
        <x-slot name="body">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="" class="form-label">{{ __('dashboard.category_name') }}</label>
                    <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" value="{{ old('name') ?? $category->name }}">
                    @if($errors->has('name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('name') }}
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
                    <label for="" class="form-label">{{ __('dashboard.event_categories') }}</label>
                    <select name="parent_id" id="" class="form-control">
                        <option value="">none</option>
                        @if ($categories)
                            @foreach ($categories as $category)
                                @php $dash= ''; @endphp
                                <option value="{{ $category->id }}" {{ old('parent_id') == $category->id ? "selected" : "" }}>{{ $category->name }}</option>
                                @if(count($category->subcategory))
                                @include('events.category.subcategory-opt', ['subcategories' => $category->subcategory])
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