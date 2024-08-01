@extends('layouts.app')

@section('content')

<x-forms.post :action="route('admin.slideshow.store')">
    <x-card>
        <x-slot name="header">
            Create Slideshow
        </x-slot>
        <x-slot name="headerAction">
            <a href="{{ route('admin.slideshow.index') }}" class="btn btn-primary">{{ __('dashboard.cancel') }}</a>
        </x-slot>
        <x-slot name="body">
            <div class="container-fuild">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="" class="col-form label">Title Khmer</label>
                            <input type="text" name="headline_km" id="" class="form-control {{ $errors->has('headline_km') ? 'is-invalid' : '' }}" value="{{ old('headline_km') ?? ''}}">
                            @if($errors->has('headline_km'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('headline_km') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="" class="col-form label">Title English</label>
                            <input type="text" name="headline_en" id="" class="form-control {{ $errors->has('headline_en') ? 'is-invalid' : '' }}" value="{{ old('headline_en') ?? ''}}">
                            @if($errors->has('headline_en'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('headline_en') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-6">

                        <div class="form-group">
                            <label for="" class="col-form-label">{{ __('dashboard.status') }}</label>
                            <select name="is_published" id="is_published" class="form-control">
                                @foreach (pulishedOpt() as $k => $item)
                                    <option value="{{ $k }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="" class="col-form-label">{{__('dashboard.select_thumbnail')}}</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                <a id="button-image" data-input="thumbnail" data-preview="holder" class="btn btn-info input-group-text" aria-describedby="button-image">
                                    <i class="fa-solid fa fa-image"></i>
                                </a>
                                </div>
                                <input id="thumbnail" class="form-control {{ $errors->has('thumbnail') ? 'is-invalid' : '' }}" type="text" name="thumbnail" value="{{ old('thumbnail') }}" onchange="loadFile(event)">
                                @if($errors->has('thumbnail'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('thumbnail') }}
                                    </div>
                                @endif
                            </div>
                            <img src="" alt="" id="output" width="120">
                            <div id="holder" style="margin-top:15px;max-height:400px;"></div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="" class="col-form label">Content Khmer</label>
                            <textarea name="content_km" class="form-control {{ $errors->has('content_km') ? 'is-invalid' : '' }}" id="" cols="30" rows="10">{{ old('content_km') ?? ''}}</textarea>
                            @if($errors->has('content_km'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('content_km') }}
                                </div>
                            @endif
                        </div>

                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="" class="col-form label">Content English</label>
                            <textarea name="content_en" class="form-control {{ $errors->has('content_en') ? 'is-invalid' : '' }}" id="" cols="30" rows="10">{{ old('content_en') ?? ''}}</textarea>
                            @if($errors->has('content_en'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('content_en') }}
                                </div>
                            @endif
                        </div>

                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="" class="col-form label">Button Text Khmer</label>
                            <input type="text" name="btn_label_km" id="" class="form-control {{ $errors->has('btn_label_km') ? 'is-invalid' : '' }}" value="{{ old('btn_label_km') ?? ''}}">
                            @if($errors->has('btn_label_km'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('btn_label_km') }}
                                </div>
                            @endif
                        </div>

                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="" class="col-form label">Button Text English</label>
                            <input type="text" name="btn_label_en" id="" class="form-control {{ $errors->has('btn_label_en') ? 'is-invalid' : '' }}" value="{{ old('btn_label_en') ?? ''}}">
                            @if($errors->has('btn_label_en'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('btn_label_en') }}
                                </div>
                            @endif
                        </div>

                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="" class="col-form label">Button URL</label>
                            <input type="text" name="link" id="" class="form-control {{ $errors->has('link') ? 'is-invalid' : '' }}" value="{{ old('link') ?? ''}}">
                            @if($errors->has('link'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('link') }}
                                </div>
                            @endif
                        </div>

                    </div>
                </div>
                <button type="submit" class="btn btn-success">Save</button>
            </div>
        </x-slot>
    </x-card>
</x-forms>
@endsection

@push('after-scripts')

    <script>
        var route_prefix = "/file-manager";


        document.addEventListener("DOMContentLoaded", function() {

            document.getElementById('button-image').addEventListener('click', (event) => {
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
