@extends('layouts.app')
@section('title', __('Create Document'))
@section('content')
    <x-forms.post :action="route('admin.document.store')">
        <x-card>
            <x-slot name="header">{{ __('dashboard.create_new') }}</x-slot>
            <x-slot name="headerAction">
                <x-utils.link class="card-header-action" :href="route('admin.document.index')" :text="__('dashboard.cancel')"/>
            </x-slot>
            <x-slot name="body">
                <div class="container-fuild">
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
                                <input id="file" class="form-control" type="text" name="file" value="{{ old('file') }}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group ">
                                <label for="">{{ __('dashboard.document_category') }}</label>
                                <select name="dcategory_id" id="" class="form-control">
                                    @if( isset($categories) )
                                        @foreach ($categories as $category)
                                            @php $dash=''; @endphp
                                            <option value="{{ $category->id }}" {{ old('dcategory_id') == $category->id ? 'selected' : '' }}>{{ $category->title_km }}</option>
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
                                <input id="thumbnail" class="form-control" type="text" name="thumbnail" value="{{ old('thumbnail') }}">
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

<script>
    document.addEventListener("DOMContentLoaded", function() {
      document.getElementById('lfm').addEventListener('click', (event) => {
        event.preventDefault();
        inputId = 'thumbnail'
        window.open('/file-manager/fm-button', 'fm', 'width=1400,height=800');
      });

      document.getElementById('filepath').addEventListener('click', (event) => {
        event.preventDefault();
        inputId = 'file'
        window.open('/file-manager/fm-button', 'fm', 'width=1400,height=800');
      });

    });

    let inputId = '';

    // set file link
    function fmSetLink($url) {
      document.getElementById(inputId).value = $url;
    }
  </script>
@endpush