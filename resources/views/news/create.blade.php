@extends('layouts.app')

@section('title', __('Create Activity'))

@section('page-title', __('News') )

@push('after-styles')
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

@endpush
@section('content')
<x-forms.post :action="route('admin.news.store')">
    <x-card>
        <x-slot name="body">
            <div class="container">
                <div class="row">
                <div class="form-group col-sm-12">
                    <label for="title" class="col-form-label">Title </label>
                    <input type="text" name="title" id="title" class="form-control " value="{{ old('title') }}" required>
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
                                <input type="text" name="meta_keyword" id="meta_keyword" class="form-control" value="" required>
                            </div>
                            <div class="form-group">
                                <label for="meta_description" class="col-form-label">Meta Description </label>
                                <input type="text" name="meta_description" id="meta_description" class="form-control" value="" required>
                            </div>
                            <div class="form-group">
                                <label for="description" class="col-form-label">Short Description </label>
                                <textarea name="description" id="description" cols="30" rows="10" class="form-control" required></textarea>
                            </div>
                        </div>
                        <!-- <div class="col-sm-6">
                            <label for="" class="col-form-label">Select Thumbnail</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-info input-group-text">
                                    <i class="fa-solid fa-image"></i>
                                </a>
                                </div>
                                <input id="thumbnail" class="form-control" type="text" name="en[thumbnail]" readonly="" value="">
                            </div>
                        </div> -->
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-12">
                            <textarea name="content" id="content" cols="50" rows="10" class="form-control" required>{{ old('content') }}</textarea>
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
                                    <option value="0">Publish</option>
                                    <option value="1">Save as draft</option>
                                </select>
                            </div>
                        </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </x-slot>
    </x-card>
</x-forms.post>
@endsection

@push('after-scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.5.11/ckeditor.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.5.11/adapters/jquery.js"></script>
    <script>
        $( function() {
          $( "#post_date" ).datepicker({
            dateFormat: 'yy-mm-d',
            minDate: getFormattedDate(new Date())
          }).datepicker("setDate",'now');
        } );
        function getFormattedDate(date) {
            var day = date.getDate();
            var month = date.getMonth() + 1;
            var year = date.getFullYear().toString().slice(2);
            return year + '-' + month + '-' + day;
        }
    </script>
@endpush