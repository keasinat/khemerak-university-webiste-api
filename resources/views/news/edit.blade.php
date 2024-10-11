@extends('layouts.app')
@push('after-styles')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
@endpush
@section('content')
    <x-forms.patch :action="route('admin.news.update', $news)">
        <x-card>
            <x-slot name="header">
                ព័ត៍មាន
            </x-slot>
            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.news.index')" :text="__('Cancel')" />
            </x-slot>
            <x-slot name="body">
                <div class="container-fuild">
                    <div class="row">
                        <div class="col-sm-9">
                            <div class="row bg p-2">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="title_km" class="col-form-label">Title Khmer </label>
                                        <input type="text" name="title_km" id="title_km"
                                            class="form-control {{ $errors->has('title_km') ? 'is-invalid' : '' }} "
                                            value="{{ old('title_km') ?? $news->title_km }}">
                                        @if ($errors->has('title_km'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('title_km') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="title_en" class="col-form-label">Title English </label>
                                        <input type="text" name="title_en" id="title_km"
                                            class="form-control {{ $errors->has('title_en') ? 'is-invalid' : '' }} "
                                            value="{{ old('title_en') ?? $news->title_en }}">
                                        @if ($errors->has('title_en'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('title_en') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="description_km" class="col-form-label">Short Description Khmer</label>
                                        <textarea name="description_km" id="description_km" cols="30" rows="5"
                                            class="form-control {{ $errors->has('description_km') ? 'is-invalid' : '' }}">{{ $news->description_km }}</textarea>
                                        @if ($errors->has('description_km'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('description_km') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="description_en" class="col-form-label">Short Description English</label>
                                        <textarea name="description_en" id="description_en" cols="30" rows="5"
                                            class="form-control {{ $errors->has('description_en') ? 'is-invalid' : '' }}">{{ $news->description_en }}</textarea>
                                        @if ($errors->has('description_en'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('description_en') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="description_en" class="col-form-label">Content Khmer</label>
                                    <textarea name="content_km" id="content_km" cols="50" rows="10"
                                        class="form-control {{ $errors->has('content_km') ? 'is-invalid' : '' }}">{{ old('content_km') ?? $news->content_km }}</textarea>
                                    @if ($errors->has('content_km'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('content_km') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="description_en" class="col-form-label">Content English</label>
                                    <textarea name="content_en" id="content_en" cols="50" rows="10"
                                        class="form-control {{ $errors->has('content_en') ? 'is-invalid' : '' }}">{{ old('content_en') ?? $news->content_en }}</textarea>
                                    @if ($errors->has('content_en'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('content_en') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3" style="background: #f1f1f1">
                            <div class="bg p-2">
                                <button type="submit" class="btn btn-success">{{ __('dashboard.save') }}</button>
                                <hr>
                                <div class="form-group">
                                    <label for="" class="form-label">{{ __('dashboard.document_category') }}</label>
                                    <select name="ncategory_id" id="" class="form-control" required>
                                        <option value="">Select an option</option>
                                        @if (isset($categories))
                                            @foreach ($categories as $category)
                                                @php $dash= ''; @endphp
                                                <option value="{{ $category->id }}"
                                                    {{ old('ncategory_id') ?? $news->ncategory_id == $category->id ? 'selected' : '' }}>
                                                    {{ $category->title_km }}</option>
                                                @if (count($category->subcategory))
                                                    @include('documents.category.subcategory-opt', [
                                                        'subcategories' => $category->subcategory,
                                                    ])
                                                @endif
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label for="" class="col-form-label">Status</label>
                                    <select name="is_published" id="is_published" class="form-control">
                                        @foreach (pulishedOpt() as $k => $item)
                                            <option value="{{ $k }}"
                                                {{ $news->is_published == $k ? 'selected' : '' }}>{{ $item }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for=""
                                        class="col-form-label">{{ __('dashboard.select_thumbnail') }}</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <a id="lfm" data-input="thumbnail" data-preview="holder"
                                                class="btn btn-info input-group-text">
                                                <i class="fa-solid fa fa-image"></i>
                                            </a>
                                        </div>
                                        <input id="thumbnail"
                                            class="form-control {{ $errors->has('thumbnail') ? 'is-invalid' : '' }}"
                                            type="text" name="thumbnail"
                                            value="{{ old('thumbnail') ?? $news->thumbnail }}">
                                        @if ($errors->has('thumbnail'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('thumbnail') }}
                                            </div>
                                        @endif
                                        <div id="holder" style="margin-top:15px;max-height:200px;"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="meta_keyword" class="col-form-label">Meta Keyword </label>
                                        <textarea name="meta_keyword" id="meta_keyword" cols="30" rows="10"
                                            class="form-control {{ $errors->has('meta_keyword') ? 'is-invalid' : '' }}">{{ $news->meta_keyword }}</textarea>
                                        @if ($errors->has('meta_keyword'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('meta_keyword') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="meta_description" class="col-form-label">Meta Description </label>
                                        <textarea name="meta_description" id="meta_description" cols="30" rows="10"
                                            class="form-control {{ $errors->has('meta_description') ? 'is-invalid' : '' }}">{{ $news->meta_description }}</textarea>
                                        @if ($errors->has('meta_description'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('meta_description') }}
                                            </div>
                                        @endif
                                    </div>
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
                height: 250,
                filebrowserImageBrowseUrl: route_prefix + '/ckeditor',
                allowedContent: true
            });
            $('#content_en').ckeditor({
                height: 250,
                filebrowserImageBrowseUrl: route_prefix + '/ckeditor',
                allowedContent: true
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
