@extends('layouts.app')
@push('after-styles')
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
@endpush
@section('content')
<x-forms.post :action="route('admin.news.store')">
    <x-card>
        <x-slot name="header">
            ព័ត៍មាន
        </x-slot>
        <x-slot name="headerAction">
                <a href="{{ route('admin.news.index') }}" class="btn btn-primary">{{ __('dashboard.cancel') }}</a>
            </x-slot>
        <x-slot name="body">
            <div class="container-fuild">
                <div class="row">
                    <div class="col-sm-9">
                        <div class="bg p-2" style="background: #f1f1f1">
                            <div class="form-group">
                                <label for="title_km" class="col-form-label">{{__('dashboard.title')}} </label>
                                <input type="text" name="title_km" id="title_km" class="form-control {{ $errors->has('title_km') ? 'is-invalid' : '' }} " value="{{ old('title_km') }}">
                                @if($errors->has('title_km'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('title_km') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="slug" class="col-form-label">@lang('Slug')</label>
                                <input type="text" name="slug" id="slug" class="form-control @error('slug') is-invalid @enderror" value="{{ old('slug') }}" >
                                @if($errors->has('slug'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('slug') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <textarea name="content_km" id="content_km" cols="50" rows="10" class="form-control {{ $errors->has('content_km') ? 'is-invalid' : '' }}">{!! old('content_km') !!}</textarea>
                                @if($errors->has('content_km'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('content_km') }}
                                    </div>
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="description_km" class="col-form-label">Short Description </label>
                                        <textarea name="description_km" id="description_km" cols="30" rows="10" class="form-control {{ $errors->has('description_km') ? 'is-invalid' : '' }}">{{ old('description_km') }}</textarea>
                                        @if($errors->has('description_km'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('description_km') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="meta_description" class="col-form-label">Meta Description </label>
                                        <textarea name="meta_description" id="meta_description" cols="30" rows="10" class="form-control {{ $errors->has('meta_description') ? 'is-invalid' : '' }}">{{ old('meta_description') }}</textarea>
                                        @if($errors->has('meta_description'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('meta_description') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="meta_keyword" class="col-form-label">Meta Keyword </label>
                                        <textarea name="meta_keyword" id="meta_keyword" cols="30" rows="10" class="form-control {{ $errors->has('meta_keyword') ? 'is-invalid' : '' }} ">{{ old('meta_keyword') }}</textarea>
                                        @if($errors->has('meta_keyword'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('meta_keyword') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3" style="background: #f1f1f1">
                        <div class="bg p-2">
                            <button type="submit" class="btn btn-primary">{{ __('dashboard.save') }}</button>
                            <hr>
                            <div class="form-group">
                                <label for="" class="col-form-label">{{ __('dashboard.status') }}</label>
                                <select name="is_published" id="is_published" class="form-control">
                                    @foreach (pulishedOpt() as $k => $item)
                                        <option value="{{ $k }}">{{ $item }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label for="" class="col-form-label">{{__('dashboard.select_thumbnail')}}</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                    <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-info input-group-text">
                                        <i class="fa-solid fa fa-image"></i>
                                    </a>
                                    </div>
                                    <input id="thumbnail" class="form-control {{ $errors->has('thumbnail') ? 'is-invalid' : '' }}" type="text" name="thumbnail" value="{{ old('thumbnail') }}">
                                    @if($errors->has('thumbnail'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('thumbnail') }}
                                        </div>
                                    @endif
                                </div>
                                <div id="holder" style="margin-top:15px;max-height:400px;"></div>
                            </div>
                            <div class="form-group">
                                <label for="post_date" class="col-form-label">Public Date</label>
                                <input type="text" name="post_date" id="post_date" class="form-control" autocomplete="off" value="{{ old('post_date') }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </x-slot>
    </x-card>
</x-forms.post>
@endsection

@push('after-scripts')
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    @include('layouts.partials.ckeditor')
    <script>
        var route_prefix = "/file-manager";
        $('#content_km').ckeditor({
            height: 500,
            filebrowserImageBrowseUrl: route_prefix + '/ckeditor',
            allowedContent : true
        });

    document.addEventListener("DOMContentLoaded", function() {
      document.getElementById('lfm').addEventListener('click', (event) => {
        event.preventDefault();
        window.open('/file-manager/fm-button', 'fm', 'width=1400,height=800');
      });
    });
    // set file link
    function fmSetLink($url) {
      document.getElementById('thumbnail').value = $url;
    }

    $( function() {
        $( "#post_date" ).datepicker({
        dateFormat: 'yy-mm-d',
        minDate: getFormattedDate(new Date())
        }).datepicker("setDate",'now');
    } );
    function getFormattedDate(date) {
        var day = date.getDate();
        var month = date.getMonth() + 1;
        var year = date.getFullYear().toString().slice(2);
        return year + '-' + month + '-' + day;
    }

  </script>
@endpush