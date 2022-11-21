@extends('layouts.app')
@section('content')
<x-forms.post :action="route('admin.news.store')">
    <x-card>
        <x-slot name="header">
            ព័ត៍មាន
        </x-slot>
        <x-slot name="body">
            <div class="container">
                <div class="row">
                <div class="form-group col-sm-12">
                    <label for="title" class="col-form-label">{{__('dashboard.title')}} </label>
                    <input type="text" name="title_km" id="title_km" class="form-control " value="{{ old('title_km') }}" required>
                    @if($errors->has('title'))
                        <div class="invalid-feedback">
                            {{ $errors->first('title') }}
                        </div>
                    @endif
                </div>
                </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="meta_keyword" class="col-form-label">Meta Keyword </label>
                                <input type="text" name="meta_keyword" id="meta_keyword" class="form-control" value="{{ old('meta_keyword') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="description" class="col-form-label">Short Description </label>
                                <textarea name="description_km" id="description_km" cols="30" rows="10" class="form-control" value="" required>{{ old('description_km') }}</textarea>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="meta_description" class="col-form-label">Meta Description </label>
                                <input type="text" name="meta_description" id="meta_description" class="form-control" value="{{ old('meta_description') }}" required>
                            </div>
                            <label for="" class="col-form-label">{{__('dashboard.select_thumbnail')}}</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-info input-group-text">
                                    <i class="fa-solid fa fa-image"></i>
                                </a>
                                </div>
                                <input id="thumbnail" class="form-control" type="text" name="thumbnail" readonly="" value="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-12">
                            <textarea name="content_km" id="content_km" cols="50" rows="10" class="form-control" required="required" >{{ old('content_km') }}</textarea>
                        </div>
                    </div>
                    <div class="row">
                            <div class="form-group col-sm-6">
                                <label for="slug" class="col-form-label">@lang('Slug')</label>
                                <input type="text" name="slug" id="slug" class="form-control @error('slug') is-invalid @enderror" value="{{ old('slug') }}" required>
                                @if($errors->has('slug'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('slug') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="" class="col-form-label">Status</label>
                                <select name="is_published" id="is_published" class="form-control">
                                    @foreach (pulishedOpt() as $k => $item)
                                        <option value="{{ $k }}">{{ $item }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                <button type="submit" class="btn btn-primary">{{ __('dashboard.save') }}</button>
            </div>
        </x-slot>
    </x-card>
</x-forms.post>
@endsection

@push('after-scripts')
    <script src="//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.5.11/ckeditor.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.5.11/adapters/jquery.js"></script>
    <script>
        var route_prefix = "/filemanager";
    </script>
    <script>
        $('#content_km').ckeditor({
            height: 500,
            filebrowserImageBrowseUrl: route_prefix + '?type=Images',
            filebrowserImageUploadUrl: route_prefix + '/upload?type=Images&_token={{csrf_token()}}',
            filebrowserBrowseUrl: route_prefix + '?type=Files',
            filebrowserUploadUrl: route_prefix + '/upload?type=Files&_token={{csrf_token()}}'
        });
    </script>
    <script>
        {!! \File::get(base_path('vendor/unisharp/laravel-filemanager/public/js/stand-alone-button.js')) !!}
    </script>
    <script>
        $('#lfm').filemanager('image', {prefix: route_prefix});
    </script>
@endpush