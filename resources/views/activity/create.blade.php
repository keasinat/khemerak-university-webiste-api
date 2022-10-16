@extends('layouts.app')

@section('title', __('Create Activity'))

@section('page-title', __('Activity') )

@section('content')
<x-forms.post :action="route('admin.activity.store')">
    <div class="container">
        <div class="row">
            <div class="form-group col-sm-6">
                <label for="" class="form-label">Activity group Code</label>
                <input type="text" name="group" class="form-control">
            </div>
            <div class="form-group col-sm-6">
                <label for="" class="form-label">Activity Sub group Code</label>
                <input type="text" name="sub_group" class="form-control">
            </div>
            <div class="form-group col-sm-6">
                <label for="" class="form-label">Activity Code</label>
                <input type="text" name="code" class="form-control">
            </div>
            <div class="form-group col-sm-6">
                <label for="" class="form-label">Activity Name</label>
                <input type="text" name="name_km" class="form-control">
            </div>
            <div class="form-group col-sm-6">
                <label for="" class="form-label">Ministry Short Name</label>
                <input type="text" name="slug" class="form-control">
            </div>
            <div class="form-group col-sm-6">
                <label for="" class="form-label">Ministry Full Name</label>
                <input type="text" name="m_name_km" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </div>
</x-forms.post>
@endsection