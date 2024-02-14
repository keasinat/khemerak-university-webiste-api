@extends('layouts.app')
@section('title', __('Create Event'))
@push('after-styles')
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
@endpush
@section('content')
    <x-forms.post :action="route('admin.event.store')">
        <x-card>
            <x-slot name="header">{{ __('dashboard.create_new') }}</x-slot>
            <x-slot name="headerAction">
                <x-utils.link class="card-header-action" :href="route('admin.event.index')" :text="__('dashboard.cancel')"/>
            </x-slot>
            <x-slot name="body">
                <div class="container-fuild">
                    <div class="row">
                        <div class="col-9">
                            <div class="row">
                                <div class="form-group col-12">
                                    <label for="title" class="form-label">{{ __('dashboard.event_name') }}</label>
                                    <input type="text" name="title" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" value="{{ old('title') }}">
                                    @if($errors->has('title'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('title') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-12">
                                <label for="content" class="form-label">{{ __('dashboard.content') }}</label>
                                    <textarea name="content" id="content" cols="30" rows="10" class="form-control content">{{ old('content') }}</textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-12">
                                    <label for="description">{{ __('dashboard.description') }}</label>
                                        <textarea name="description" id="description" cols="30" rows="5" class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}">{{ old('description') }}</textarea>
                                    @if($errors->has('description'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('description') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-12">
                                <label for="location" class="form-label">{{ __('dashboard.location') }}</label>
                                <div class="input-group">
                                <input type="text" name="location" class="form-control {{ $errors->has('location') ? 'is-invalid' : '' }}" value="{{ old('location') }}">
                                    @if($errors->has('location'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('location') }}
                                        </div>
                                    @endif
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group col-12">
                                <label for="start_date" class="form-label">{{ __('dashboard.start_date') }}</label>
                                <div class="input-group">
                                    <input type="text" name="start_date" id="start_date" class="form-control {{ $errors->has('start_date') ? 'is-invalid' : '' }}" value="{{ old('start_date') }}" autocomplete="off">
                                     @if($errors->has('start_date'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('start_date') }}
                                        </div>
                                     @endif
                                </div>
                            </div>
                            <div class="form-group col-12">
                                <label for="end_date">{{ __('dashboard.end_date') }}</label>
                                    <div class="input-group">
                                    <input type="text" name="end_date" id="end_date" class="form-control {{ $errors->has('end_date') ? 'is-invalid' : '' }}" value="{{ old('end_date') }}" autocomplete="off">
                                        @if($errors->has('end_date'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('end_date') }}
                                            </div>
                                        @endif
                                </div>
                            </div>
                            <div class="form-group col-12">
                                <label for="" class="col-form-label">{{ __('dashboard.thumbnail') }}</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                    <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-info input-group-text">
                                        <i class="far fa-image"></i>
                                    </a>
                                    </div>
                                    <input id="thumbnail" class="form-control {{ $errors->has('thumbnail') ? 'is-invalid' : '' }}" type="text" name="thumbnail" value="{{ old('thumbnail') }}">
                                    @if($errors->has('thumbnail'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('thumbnail') }}
                                        </div>
                                    @endif
                                </div>
                                <div id="holder" style="margin-top:15px;max-height:200px;"></div>
                            </div>
                            <div class="form-group col-12">
                                <label for="event_category_id">{{ __('dashboard.event_categories') }}</label>
                                <select name="event_category_id" id="" class="form-control {{ $errors->has('event_category_id') ? 'is-invalid' : '' }}">
                                    @if( isset($categories) )
                                        @foreach ($categories as $category)
                                            @php $dash=''; @endphp
                                            <option value="{{ $category->id }}" {{ old('event_category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                            @if(count($category->subcategory))
                                                @include('events.category.subcategory-opt',['subcategories' => $category->subcategory])
                                            @endif
                                        @endforeach
                                    @endif
                                </select>
                                @if($errors->has('event_category_id'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('event_category_id') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group col-12">
                                <label for="" class="col-form-label">{{ __('dashboard.published')}}</label>
                                <select name="is_published" id="is_published" class="form-control">
                                    @foreach (pulishedOpt() as $k => $item)
                                        <option value="{{ $k }}">{{ $item }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">{{ __('dashboard.save') }}</button>
                        </div>
                    </div>
                </div>  
                
            </x-slot>
        </x-card>
    </x-forms>
@endsection
@push('after-scripts')
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script>
    $( function() {
        $( "#start_date" ).datepicker({
        dateFormat: 'dd-mm-yy'
        });
    } );
    $( function() {
        $( "#end_date" ).datepicker({
        dateFormat: 'dd-mm-yy'
        });
    } );
    </script>
    @include('layouts.partials.ckeditor')
    <script>
        var route_prefix = "/file-manager";
        $('#content').ckeditor({
            height: 500,
            filebrowserImageBrowseUrl: route_prefix + '/ckeditor',
            allowedContent : true
        });
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById('lfm').addEventListener('click', (event) => {
                event.preventDefault();
                inputId = 'thumbnail'
                window.open('/file-manager/fm-button', 'fm', 'width=1000,height=800');
            });
        });
        let inputId = '';

        // set file link
        function fmSetLink($url) {
        document.getElementById(inputId).value = $url;
        }
    </script>
@endpush