@extends('layouts.app')

@section('title', __('Create Activity'))

@section('page-title', __('Activity') )

@section('content')
<x-forms.post :action="route('admin.activity.store')">
    <x-card>
        <x-slot name="body">
                <div class="container">
                <div class="row">
                    <div class="form-group col-sm-4">
                        <label for="group" class="form-label">{{ __('dashboard.group_no') }}</label>
                        <input type="text" name="group" class="form-control {{ $errors->has('group') ? 'is-invalid' : '' }}" value="{{ old('group') }}">
                        @if($errors->has('group'))
                            <div class="invalid-feedback">
                                {{ $errors->first('group') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="" class="form-label">{{ __('dashboard.class_no') }}</label>
                        <input type="text" name="sub_group" class="form-control {{ $errors->has('sub_group') ? 'is-invalid' : '' }}" value="{{ old('sub_group') }}">
                        @if($errors->has('sub_group'))
                            <div class="invalid-feedback">
                                {{ $errors->first('sub_group') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="" class="form-label">{{ __('dashboard.subclass_no') }}</label>
                        <input type="text" name="code" class="form-control {{ $errors->has('code') ? 'is-invalid' : '' }}"  value="{{ old('code') }}">
                        @if($errors->has('code'))
                            <div class="invalid-feedback">
                                {{ $errors->first('code') }}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label for="" class="form-label">{{ __('dashboard.description') }}</label>
                        <input type="text" name="name_km" class="form-control {{ $errors->has('name_km') ? 'is-invalid' : '' }}"  value="{{ old('name_km') }}">
                        @if($errors->has('name_km'))
                            <div class="invalid-feedback">
                                {{ $errors->first('name_km') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="" class="form-label">{{ __('dashboard.ministry_shortname') }}</label>
                        <input type="text" name="slug" class="form-control {{ $errors->has('slug') ? 'is-invalid' : '' }}"  value="{{ old('slug') }}">
                        @if($errors->has('slug'))
                            <div class="invalid-feedback">
                                {{ $errors->first('slug') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group col-sm-12">
                        <label for="" class="form-label">{{ __('dashboard.ministry_fullname') }}</label>
                        <input type="text" name="m_name_km" class="form-control {{ $errors->has('m_name_km') ? 'is-invalid' : '' }}"  value="{{ old('m_name_km') }}">
                        @if($errors->has('m_name_km'))
                            <div class="invalid-feedback">
                                {{ $errors->first('m_name_km') }}
                            </div>
                        @endif
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </x-slot>
    </x-card>
</x-forms.post>
@endsection