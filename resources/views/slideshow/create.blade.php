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
                            <label for="" class="col-form label">Title</label>
                            <input type="text" name="headline" id="" class="form-control {{ $errors->has('headline') ? 'is-invalid' : '' }}" value="{{ old('headline') ?? ''}}">
                            @if($errors->has('headline'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('headline') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="" class="col-form label">Link URL</label>
                            <input type="text" name="link" id="" class="form-control {{ $errors->has('link') ? 'is-invalid' : '' }}" value="{{ old('link') ?? ''}}">
                            @if($errors->has('link'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('link') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="" class="col-form label">Content</label>
                            <textarea name="content" class="form-control {{ $errors->has('content') ? 'is-invalid' : '' }}" id="" cols="30" rows="10">{{ old('content') ?? ''}}</textarea>
                            @if($errors->has('content'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('content') }}
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="" class="col-form-label">{{ __('dashboard.status') }}</label>
                            <select name="is_published" id="is_published" class="form-control">
                                @foreach (pulishedOpt() as $k => $item)
                                    <option value="{{ $k }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success">Save</button>
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
                </div>
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
