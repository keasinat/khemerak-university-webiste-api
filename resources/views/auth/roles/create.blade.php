@extends('layouts.app')
@section('title', __('Create Role'))
@section('content')
<x-forms.post :action="route('admin.roles.store')">
    <x-card>
        <x-slot name="header">@lang('Create Role')</x-slot>
        <x-slot name="headerAction">
            <x-utils.link class="card-header-action" :href="route('admin.roles.index')" :text="__('Cancel')"/>
        </x-slot>
        <x-slot name="body">
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">{{ __('dashboard.role_type') }}</label>
                <div class="col-sm-10">
                    <input type="text" name="name" id="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" value="{{ old('name') }}">
                    @if($errors->has('name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </div>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">{{ __('dashboard.permission') }}</label>
                <div class="col-sm-10">
                    @foreach ($permission as $value)
                        <label for="{{ $value->id }}">
                            <input type="checkbox" name="permission[]" id="{{ $value->id }}" value="{{ $value->id }}"> &nbsp; {{ $value->name }}
                        </label>
                    @endforeach
                </div>
            </div>
            <button type="submit" class="btn btn-primary">{{ __('dashboard.save') }}</button>
        </x-slot>
    </x-card>
</x-forms>
@endsection