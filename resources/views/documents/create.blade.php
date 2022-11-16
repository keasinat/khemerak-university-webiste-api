@extends('layouts.app')
@section('title', __('Create Document'))
@section('content')
    <x-forms.post :action="route('admin.document.store')">
        <x-card>
            <x-slot name="header">@lang('Create Document')</x-slot>
            <x-slot name="headerAction">
                <x-utils.link class="card-header-action" :href="route('admin.document.index')" :text="__('Cancel')"/>
            </x-slot>
            <x-slot name="body">
                <div class="container">
                    <div class="form-group">
                        <label for="" class="form-label">{{ __('dashboard.document_name') }}</label>
                        <input type="text" name="title_km" class="form-control {{ $errors->has('title_km') ? 'is-invalid' : '' }}" value="{{ old('title_km') }}">
                        @if($errors->has('title_km'))
                            <div class="invalid-feedback">
                                {{ $errors->first('title_km') }}
                            </div>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="" class="form-label">{{ __('dashboard.select_file') }}</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                  <a id="filepath" data-input="file" class="btn btn-info input-group-text">
                                    <i class="far fa-file-pdf"></i>
                                  </a>
                                </div>
                                <input id="file" class="form-control" type="text" name="file" readonly value="{{ old('thumbnail') }}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group ">
                                <label for="">{{ __('dashboard.document_category') }}</label>
                                <select name="dcategory_id" id="" class="form-control">
                                    @if( isset($categories) )
                                        @foreach ($categories as $category)
                                            @php $dash=''; @endphp
                                            <option value="{{ $category->id }}">{{ $category->title_km }}</option>
                                            @if(count($category->subcategory))
                                                @include('documents.category.subcategory-opt',['subcategories' => $category->subcategory])
                                            @endif
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="" class="col-form-label">{{ __('dashboard.thumbnail') }}</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                  <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-info input-group-text">
                                    <i class="far fa-image"></i>
                                  </a>
                                </div>
                                <input id="thumbnail" class="form-control" type="text" name="thumbnail" readonly value="{{ old('thumbnail') }}">
                            </div>
                            <div id="holder" style="margin-top:15px;max-height:200px;"></div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">{{ __('dashboard.save') }}</button>
                </div>
            </x-slot>
        </x-card>
    </x-forms>
@endsection

@push('after-scripts')
<script src="//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.5.11/ckeditor.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.5.11/adapters/jquery.js"></script>
<script>
    {!! \File::get(base_path('vendor/unisharp/laravel-filemanager/public/js/stand-alone-button.js')) !!}
</script>
    <script>
        var route_prefix = "/filemanager";
        $('#lfm').filemanager('image', {prefix: route_prefix});
        $('#filepath').filemanager('file', {prefix: route_prefix});
    </script>

@endpush