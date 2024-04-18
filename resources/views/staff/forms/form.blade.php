<div class="container-fuild">
    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                <label for="" class="col-form-label">{{__('dashboard.select_thumbnail')}}</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                    <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-info input-group-text">
                        <i class="fa-solid fa fa-image"></i>
                    </a>
                    </div>
                    <input id="thumbnail" class="form-control {{ $errors->has('thumbnail') ? 'is-invalid' : '' }}" type="text" name="thumbnail" value="{{ old('thumbnail') }}">
                    @if($errors->has('thumbnail'))
                        <div class="invalid-feedback">
                            {{ $errors->first('thumbnail') }}
                        </div>
                    @endif
                </div>
                <div id="holder" style="margin-top:15px;max-height:400px;"></div>
            </div>
            <hr>
            <div class="form-group">
                <label for="" class="col-form-label">{{ __('dashboard.status') }}</label>
                <select name="is_published" id="is_published" class="form-control">
                    @foreach (pulishedOpt() as $k => $item)
                        <option value="{{ $k }}">{{ $item }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-sm-9">
            <div class="row">
                <div class="form-group col-sm-6">
                    <label for="" class="col-form-label">Name in English</label>
                    <input type="text" name="name_en" id="" class="form-control {{ $errors->has('name_km') ? 'is-invalid' : '' }}" value="{{ old('name_en') ?? ''}}">
                    @if($errors->has('name_en'))
                        <div class="invalid-feedback">
                            {{ $errors->first('name_en') }}
                        </div>
                    @endif
                </div>
                <div class="form-group col-sm-6">
                    <label for="" class="col-form-label">Name in Khmer</label>
                    <input type="text" name="name_km" id="" class="form-control {{ $errors->has('name_km') ? 'is-invalid' : '' }}" value="{{ old('name_km') ?? ''}}">
                    @if($errors->has('name_km'))
                        <div class="invalid-feedback">
                            {{ $errors->first('name_km') }}
                        </div>
                    @endif
                </div>
                <div class="form-group col-sm-6">
                    <label for="" class="col-form-label">Position in English</label>
                    <input type="text" name="position_en" id="" class="form-control {{ $errors->has('position_en') ? 'is-invalid' : '' }}" value="{{ old('position_en') ?? ''}}">
                    @if($errors->has('position_en'))
                        <div class="invalid-feedback">
                            {{ $errors->first('position_en') }}
                        </div>
                    @endif
                </div>
                <div class="form-group col-sm-6">
                    <label for="" class="col-form-label">Position in Khmer</label>
                    <input type="text" name="position_km" id="" class="form-control {{ $errors->has('position_km') ? 'is-invalid' : '' }}" value="{{ old('position_km') ?? ''}}">
                    @if($errors->has('position_km'))
                        <div class="invalid-feedback">
                            {{ $errors->first('position_km') }}
                        </div>
                    @endif
                </div>
            
                <div class="form-group col-sm-6">
                    <label for="" class="col-form-label">Short Description in English</label>
                    <input type="text" name="short_desc_en" id="" class="form-control {{ $errors->has('short_desc_en') ? 'is-invalid' : '' }}" value="{{ old('short_desc_en') ?? ''}}">
                    @if($errors->has('short_desc_en'))
                        <div class="invalid-feedback">
                            {{ $errors->first('short_desc_en') }}
                        </div>
                    @endif
                </div>
                <div class="form-group col-sm-6">
                    <label for="" class="col-form-label">Short Description in Khmer</label>
                    <input type="text" name="short_desc_km" id="" class="form-control {{ $errors->has('short_desc_km') ? 'is-invalid' : '' }}" value="{{ old('short_desc_km') ?? ''}}">
                    @if($errors->has('short_desc_km'))
                        <div class="invalid-feedback">
                            {{ $errors->first('short_desc_km') }}
                        </div>
                    @endif
                </div>
                <div class="form-group col-sm-6">
                    <label for="" class="col-form-label">Bio in English</label>
                    <textarea name="bio_en" id="" cols="30" rows="10" class="form-control {{ $errors->has('bio_en') ? 'is-invalid' : '' }}" >{{ old('bio_en') ?? ''}}</textarea>
                    @if($errors->has('bio_en'))
                        <div class="invalid-feedback">
                            {{ $errors->first('bio_en') }}
                        </div>
                    @endif
                </div>
                <div class="form-group col-sm-6">
                    <label for="" class="col-form-label">Bio in Khmer</label>
                    <textarea name="bio_km" id="" cols="30" rows="10" class="form-control {{ $errors->has('bio_km') ? 'is-invalid' : '' }}" >{{ old('bio_km') ?? ''}}</textarea>
                    @if($errors->has('bio_km'))
                        <div class="invalid-feedback">
                            {{ $errors->first('bio_km') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>