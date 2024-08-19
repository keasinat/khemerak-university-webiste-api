@extends('layouts.app')
@section('title', __('Category Edit'))
@section('content')
<x-forms.patch :action="route('admin.menu.academic.update', $category->id)">
    <x-card>
        <x-slot name="header">
            {{ __('dashboard.document_category') }}
        </x-slot>
        <x-slot name="headerAction">
            <x-utils.link
                icon="c-icon cil-plus"
                class="card-header-action"
                :href="route('admin.menu.academic.index')"
                :text="__('dashboard.cancel')"
                />
        </x-slot>
        <x-slot name="body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="form-label">{{ __('Name in Khmer') }}</label>
                        <input type="text" name="title_km" class="form-control {{ $errors->has('title_km') ? 'is-invalid' : '' }}" value="{{ old('title_km') ?? $category->title_km }}">
                        @if($errors->has('title_km'))
                            <div class="invalid-feedback">
                                {{ $errors->first('title_km') }}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="">{{ __('Name in English') }}</label>
                        <input type="text" name="title_en" class="form-control {{ $errors->has('title_en') ? 'is-invalid' : '' }}" value="{{ old('title_en') ?? $category->title_en }}">
                        @if($errors->has('title_en'))
                            <div class="invalid-feedback">
                                {{ $errors->first('title_en') }}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="form-label">{{ __('dashboard.slug') }}</label>
                        <input type="text" name="slug" class="form-control {{ $errors->has('slug') ? 'is-invalid' : '' }}" value="{{ old('slug') ?? $category->slug }}">
                        @if($errors->has('slug'))
                            <div class="invalid-feedback">
                                {{ $errors->first('slug') }}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="form-label">{{ __('Menu Manu') }}</label>
                        <select name="parent_id" id="" class="form-control {{ $errors->has('parent_id') ? 'is-invalid' : '' }}">
                            <option value="">none</option>
                            @if ($categories)
                                @foreach ($categories as $cate)
                                @php $dash= ''; @endphp
                                <option value="{{ $cate->id }}"
                                    {{ (old('parent_id') !== null ? (old('parent_id') == $cate->id ? 'selected' : '') : ($category->parent_id == $cate->id ? "selected" : "")) }}>{{ $cate->title_km }}</option>
                                @if(count($cate->children))
                                @include('menu.academic.subcategory-opt', ['subcategories' => $cate->children])
                                @endif
                                @endforeach
                            @endif
                        </select>
                        @if($errors->has('parent_id'))
                            <div class="invalid-feedback">
                                {{ $errors->first('parent_id') }}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-form-label">{{__('dashboard.select_thumbnail')}}</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                            <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-info input-group-text">
                                <i class="fa-solid fa fa-image"></i>
                            </a>
                            </div>
                            <input id="thumbnail" class="form-control {{ $errors->has('thumbnail') ? 'is-invalid' : '' }}" type="text" name="thumbnail" value="{{ old('thumbnail') ?? $category->thumbnail }}">
                            @if($errors->has('thumbnail'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('thumbnail') }}
                                </div>
                            @endif
                        </div>
                        <div id="holder" style="margin-top:15px;max-height:400px;"></div>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <label for="" class="col-form-label">{{ __('dashboard.status') }}</label>
                        <select name="is_published" id="is_published" class="form-control">
                            @foreach (pulishedOpt() as $k => $item)
                                <option value="{{ $k }}" {{ (old('is_published') !== null) ? old('is_published') == $k ? 'selected' : '' : ($k == $category->is_published ? 'selected' :'') }}>{{ $item }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <label for="" class="col-form-label">Content on this Menu</label>
                        <select name="is_single_page" id="is_single_page" class="form-control">
                            @foreach (isSinglePage() as $k => $item)
                                <option value="{{ $k }}" {{ (old('is_single_page') !== null) ? old('is_single_page') == $k ? 'selected' : '' : ($k == $category->is_single_page ? 'selected' :'') }}>{{ $item }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <label for="" class="col-form-label"></label>
                        <div  class="mt-3 text-right">
                            <input type="checkbox" name="is_top" id="is_top" {{ (old('is_top') !== null) ?(old('is_top') == 1 ? 'checked':'') : ($category->is_top  == 1 ? 'checked' : '') }} value="1"> &nbsp; {{ __('Show on Home Page') }}
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="description_km" class="col-form-label">Short Description in Khmer</label>
                        <textarea name="description_km" id="description_km" cols="30" rows="10" class="form-control {{ $errors->has('description_km') ? 'is-invalid' : '' }}">{{ old('description_km') ?? $category->description_km }}</textarea>
                        @if($errors->has('description_km'))
                            <div class="invalid-feedback">
                                {{ $errors->first('description_km') }}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="description_en" class="col-form-label">Short Description in English</label>
                        <textarea name="description_en" id="description_en" cols="30" rows="10" class="form-control {{ $errors->has('description_en') ? 'is-invalid' : '' }}">{{ old('description_km') ?? $category->description_en }}</textarea>
                        @if($errors->has('description_en'))
                            <div class="invalid-feedback">
                                {{ $errors->first('description_en') }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </x-slot>
    </x-card>
</x-forms>
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


  </script>
@endpush
