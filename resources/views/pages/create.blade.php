@extends('layouts.app')

@section('content')
    <x-forms.post :action="route('admin.page.store')">
        <x-card>
            <x-slot name="header">
                {{ __('dashboard.create_new') }}
            </x-slot>
            <x-slot name="headerAction">
                <a href="{{ route('admin.page.index') }}" class="btn btn-primary">{{ __('dashboard.cancel') }}</a>
            </x-slot>
            <x-slot name="body">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="title_km" class="form-label">{{ __('dashboard.page_name') }}</label>
                                <input type="text" name="title_km" id="title_km" class="form-control {{ $errors->has('title_km') ? 'is-invalid' : '' }}" value="{{ old('title_km') }}">
                                @if($errors->has('title_km'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('title_km') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="" class="form-label">{{ __('dashboard.meta_keyword') }}</label>
                                <textarea name="meta_keyword" id="meta_keyword" cols="30" rows="5" class="form-control {{ $errors->has('meta_keyword') ? 'is-invalid' : '' }}"></textarea>
                                @if($errors->has('meta_keyword'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('meta_keyword') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="" class="form-label">{{ __('dashboard.meta_description') }}</label>
                                <textarea name="meta_description" id="meta_description" cols="30" rows="5" class="form-control {{ $errors->has('meta_description') ? 'is-invalid' : '' }}"></textarea>
                                @if($errors->has('meta_description'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('meta_description') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-12 mb-3">
                            <label for="" class="form-label"></label>
                            <textarea name="content_km" id="content_km" cols="30" rows="10" class="form-control content"></textarea>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="" class="form-label">{{ __('dashboard.slug') }}</label>
                                <input type="text" name="slug" id="slug" class="form-control {{ $errors->has('slug') ? 'is-invalid' : '' }}" value="{{ old('slug') }}">
                                @if($errors->has('slug'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('slug') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="" class="form-label">{{ __('dashboard.status') }}</label>
                                <select name="is_published" id="" class="form-control">
                                    <option value="1">Publish</option>
                                    <option value="0">Save as draft</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">{{ __('dashboard.save') }}</button>
                    </div>
                </div>
            </x-slot>
        </x-card>
    </x-forms>
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
        // $('#title_km').change(function(e) {
        //     $.get('', 
        //         { 'title_en': $(this).val() }, 
        //         function( data ) {
        //         $('#slug').val(data.slug);
        //         }
        //     );
        // });
    </script>
@endpush