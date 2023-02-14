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
                <div class="container-fuild">
                    <div class="row">
                        <div class="col-sm-9">
                            <div class="bg p-2" style="background: #f1f1f1">
                            <div class="form-group">
                                <label for="title_km" class="form-label">{{ __('dashboard.page_name') }}</label>
                                <input type="text" name="title_km" id="title_km" class="form-control {{ $errors->has('title_km') ? 'is-invalid' : '' }}" value="{{ old('title_km') }}">
                                @if($errors->has('title_km'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('title_km') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">{{ __('dashboard.slug') }}</label>
                                <input type="text" name="slug" id="slug" class="form-control {{ $errors->has('slug') ? 'is-invalid' : '' }}" value="{{ old('slug') }}">
                                @if($errors->has('slug'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('slug') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label"></label>
                                <textarea name="content_km" id="content_km" cols="30" rows="10" class="form-control content"></textarea>
                            </div>
                                <div class="form-group">
                                    <label for="" class="form-label">{{ __('dashboard.meta_keyword') }}</label>
                                    <textarea name="meta_keyword" id="meta_keyword" cols="30" rows="5" class="form-control {{ $errors->has('meta_keyword') ? 'is-invalid' : '' }}"></textarea>
                                    @if($errors->has('meta_keyword'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('meta_keyword') }}
                                        </div>
                                    @endif
                                </div>
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
                        </div>
                        <div class="col-sm-3" style="background: #f1f1f1">
                            <div class="bg p-2">
                                <button type="submit" class="btn btn-primary">{{ __('dashboard.save') }}</button>
                                <hr>
                                <div class="form-group">
                                    <label for="" class="form-label">{{ __('dashboard.status') }}</label>
                                    <select name="is_published" id="" class="form-control">
                                        @foreach (pulishedOpt() as $k => $item)
                                            <option value="{{ $k }}">{{ $item }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </x-slot>
        </x-card>
    </x-forms>
@endsection

@push('after-scripts')
@include('layouts.partials.ckeditor')
<script>
    var route_prefix = "/file-manager";
    $('#content_km').ckeditor({
        height: 500,
        filebrowserImageBrowseUrl: route_prefix + '/ckeditor',
        allowedContent : true
    });
</script>
<script>
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