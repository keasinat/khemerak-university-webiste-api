@extends('layouts.app')
@section('title', __('dashboard.video_document'))
@section('content')
    <x-forms.patch :action="route('admin.document.video.update', $video)">
        <x-card>
            <x-slot name="header">{{ __('dashboard.video_document') }}</x-slot>
            <x-slot name="headerAction">
                <x-utils.link class="card-header-action" :href="route('admin.document.video.update', $video)" :text="__('dashboard.cancel')"/>
            </x-slot>
            <x-slot name="body">
                <div class="container">
                    <div class="form-group">
                        <label for="" class="form-label">{{ __('dashboard.document.video_name') }}</label>
                        <input type="text" name="title_km" class="form-control {{ $errors->has('title_km') ? 'is-invalid' : '' }}" value="{{ old('title_km') ?? $video->title_km }}">
                        @if($errors->has('title_km'))
                            <div class="invalid-feedback">
                                {{ $errors->first('title_km') }}
                            </div>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="" class="form-label">{{ __('dashboard.document.video') }}</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text ">
                                        <i class="far fa-file-pdf"></i>
                                      </span>
                                    </div>
                                    <input class="form-control {{ $errors->has('file') ? 'is-invalid' : '' }}" type="text" name="file" placeholder="https://www.youtube.com/watch?v=xxxxxxxxx" value="{{ old('file') ?? $video->file }}">
                                    @if($errors->has('file'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('file') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="" class="form-label">{{ __('dashboard.thumbnail') }}</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                    <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-info input-group-text">
                                        <i class="far fa-image"></i>
                                    </a>
                                    </div>
                                    <input id="thumbnail" class="form-control {{ $errors->has('thumbnail') ? 'is-invalid' : '' }}" type="text" name="thumbnail" value="{{ old('thumbnail') ?? $video->thumbnail }}">
                                    @if($errors->has('thumbnail'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('thumbnail') }}
                                        </div>
                                    @endif
                                </div>
                                <div id="holder" style="margin-top:15px;max-height:200px;"></div>
                            </div>
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
        var route_prefix = "/filemanager";
        $('#lfm').filemanager('file', {prefix: route_prefix});

        $(document).ready(function() {

            $('input[name=file]').on('change',function() {
                var url = $(this).val();
                var thumbnailId = ytVidId(url);
            var thumbnailUrl = 'https://img.youtube.com/vi/' + thumbnailId + '/hqdefault.jpg';console.log(thumbnailUrl);
                $('input[name=thumbnail').val(thumbnailUrl);
            });

            });


            function ytVidId(url) {
            var p = /^(?:https?:\/\/)?(?:www\.)?(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|watch\?v=|watch\?.+&v=))((\w|-){11})(?:\S+)?$/;
            return (url.match(p)) ? RegExp.$1 : false;
            }
    </script>

@endpush