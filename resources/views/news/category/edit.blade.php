@extends('layouts.app')
@section('title', __('Category Edit'))
@section('content')
    <x-forms.patch :action="route('admin.news.category.update', $category->id)">
        <x-card>
            <x-slot name="header">
                Edit Category
            </x-slot>
            <x-slot name="headerAction">
                <x-utils.link icon="c-icon cil-plus" class="card-header-action" :href="route('admin.news.category.index')" :text="__('dashboard.cancel')" />
            </x-slot>
            <x-slot name="body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="" class="form-label">Name in Khmer</label>
                            <input type="text" name="title_km"
                                class="form-control {{ $errors->has('title_km') ? 'is-invalid' : '' }}"
                                value="{{ old('title_km') ?? $category->title_km }}">
                            @if ($errors->has('title_km'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('title_km') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="" class="form-label">Name In English</label>
                            <input type="text" name="title_en"
                                class="form-control {{ $errors->has('title_en') ? 'is-invalid' : '' }}"
                                value="{{ old('title_en') ?? $category->title_en }}">
                            @if ($errors->has('title_en'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('title_en') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="" class="form-label">{{ __('dashboard.slug') }}</label>
                            <input type="text" name="slug"
                                class="form-control {{ $errors->has('slug') ? 'is-invalid' : '' }}"
                                value="{{ old('slug') ?? $category->slug }}">
                            @if ($errors->has('slug'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('slug') }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </x-slot>
        </x-card>
        </x-forms>
    @endsection
