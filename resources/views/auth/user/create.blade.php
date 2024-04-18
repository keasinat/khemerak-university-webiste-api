@extends('layouts.app')
@section('title', __('Create User'))
@section('content')
<x-forms.post :action="route('admin.users.store')">
    <x-card>
        <x-slot name="header">@lang('Create User')</x-slot>
        <x-slot name="headerAction">
            <x-utils.link class="card-header-action" :href="route('admin.users.index')" :text="__('Cancel')"/>
        </x-slot>
        <x-slot name="body">
            <div class="container-fuild">
                <div class="row">
                    <div class="col-sm-6">
                    <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">{{ __('dashboard.username') }}</label>
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
                <label for="email" class="col-sm-2 col-form-label">{{ __('dashboard.email') }}</label>
                <div class="col-sm-10">
                    <input type="email" name="email" id="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" value="{{ old('email') }}">
                    @if($errors->has('email'))
                        <div class="invalid-feedback">
                            {{ $errors->first('email') }}
                        </div>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label for="password" class="col-sm-2 col-form-label">{{ __('dashboard.password') }}</label>
                <div class="col-sm-10">
                    <input type="password" name="password" id="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}">
                    @if($errors->has('password'))
                        <div class="invalid-feedback">
                            {{ $errors->first('password') }}
                        </div>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">{{ __('dashboard.conf_password') }}</label>
                <div class="col-sm-10">
                    <input type="password" name="confirm-password" id="confirm-password" class="form-control {{ $errors->has('confirm-password') ? 'is-invalid' : '' }}">
                    @if($errors->has('confirm-password'))
                    <div class="invalid-feedback">
                        {{ $errors->first('confirm-password') }}
                    </div>
                @endif
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">{{ __('dashboard.role') }}</label>
                <div class="col-sm-10">
                    <select name="roles[]" id="roles" class="form-control {{ $errors->has('roles') ? 'is-invalid' : '' }}">
                        @foreach ($roles as $role)
                            <option value="{{ $role }}">{{ $role }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('roles'))
                        <div class="invalid-feedback">
                            {{ $errors->first('roles') }}
                        </div>
                    @endif
                </div>
            </div>
            <button type="submit" class="btn btn-primary">{{ __('dashboard.save') }}</button>
                    </div>
                </div>
            </div>
            
        </x-slot>
    </x-card>
</x-forms>
@endsection