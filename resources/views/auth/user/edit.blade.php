@extends('layouts.app')
@section('title', __('Edit User'))
@section('content')
<x-forms.patch :action="route('admin.users.update', $user->id)">
    <x-card>
        <x-slot name="header">@lang('Edit User')</x-slot>
        <x-slot name="headerAction">
            <x-utils.link class="card-header-action" :href="route('admin.users.index')" :text="__('Cancel')"/>
        </x-slot>
        <x-slot name="body">
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">{{ __('dashboard.username') }}</label>
                <div class="col-sm-10">
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name') ?? $user->name }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">{{ __('dashboard.email') }}</label>
                <div class="col-sm-10">
                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email') ?? $user->email }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="password" class="col-sm-2 col-form-label">{{ __('dashboard.password') }}</label>
                <div class="col-sm-10">
                    <input type="password" name="password" id="password" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">{{ __('dashboard.conf_password') }}</label>
                <div class="col-sm-10">
                    <input type="password" name="confirm-password" id="confirm-password" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">{{ __('dashboard.role') }}</label>
                <div class="col-sm-10">
                    <select name="roles[]" id="roles" class="form-control">
                        @foreach ($roles as $role)
                            <option value="{{ $role }}" >{{ $role }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">{{ __('dashboard.save') }}</button>
        </x-slot>
    </x-card>
</x-forms>
@endsection