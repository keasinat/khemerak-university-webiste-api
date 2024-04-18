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

                    <input id="thumbnail" class="form-control {{ $errors->has('thumbnail') ? 'is-invalid' : '' }}" type="text" name="thumbnail" value="{{ old('thumbnail') ?? $staff->thumbnail }}">
                    @if($errors->has('thumbnail'))
                        <div class="invalid-feedback">
                            {{ $errors->first('thumbnail') }}
                        </div>
                    @endif
                </div>
                <div id="holder" style="margin-top:15px;max-height:400px;"></div>
                @if($staff->thumbnail)
                    <img src="{{ old('thumbnail') ?? $staff->thumbnail }}" alt="" width="200">
                    @endif
            </div>
            <hr>
            <div class="form-group">
                <label for="" class="col-form-label">Status</label>
                <select name="is_published" id="is_published" class="form-control">
                    @foreach (pulishedOpt() as $k => $item)
                        <option value="{{ $k }}" {{ $staff->is_published == $k ? 'selected' : '' }}>{{ $item }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-sm-9">
            <div class="row">
                <div class="form-group col-sm-6">
                    <label for="" class="col-form-label">Name in English</label>
                    <input type="text" name="name_en" id="" class="form-control {{ $errors->has('title_km') ? 'is-invalid' : '' }}" value="{{ old('name_en') ?? $staff->name_en }}">
                    @if($errors->has('name_en'))
                        <div class="invalid-feedback">
                            {{ $errors->first('name_en') }}
                        </div>
                    @endif
                </div>
                <div class="form-group col-sm-6">
                    <label for="" class="col-form-label">Name in Khmer</label>
                    <input type="text" name="name_km" id="" class="form-control {{ $errors->has('title_km') ? 'is-invalid' : '' }}" value="{{ old('name_km') ?? $staff->name_km }}">
                    @if($errors->has('name_km'))
                        <div class="invalid-feedback">
                            {{ $errors->first('name_km') }}
                        </div>
                    @endif
                </div>
                <div class="form-group col-sm-6">
                    <label for="" class="col-form-label">Position in English</label>
                    <input type="text" name="position_en" id="" class="form-control {{ $errors->has('position_en') ? 'is-invalid' : '' }}" value="{{ old('position_en') ?? $staff->position_en}}">
                    @if($errors->has('position_en'))
                        <div class="invalid-feedback">
                            {{ $errors->first('position_en') }}
                        </div>
                    @endif
                </div>
                <div class="form-group col-sm-6">
                    <label for="" class="col-form-label">Position in Khmer</label>
                    <input type="text" name="position_km" id="" class="form-control {{ $errors->has('position_km') ? 'is-invalid' : '' }}" value="{{ old('position_km') ?? $staff->position_km}}">
                    @if($errors->has('position_km'))
                        <div class="invalid-feedback">
                            {{ $errors->first('position_km') }}
                        </div>
                    @endif
                </div>
                
                <div class="form-group col-sm-6">
                    <label for="" class="col-form-label">Short Description in English</label>

                    <textarea name="short_desc_en" id="" class="form-control {{ $errors->has('short_desc_en') ? 'is-invalid' : '' }}" cols="30" rows="10">{{ old('short_desc_en') ?? $staff->short_desc_en }}</textarea>
                    @if($errors->has('short_desc_en'))
                        <div class="invalid-feedback">
                            {{ $errors->first('short_desc_en') }}
                        </div>
                    @endif
                </div>
                <div class="form-group col-sm-6">
                    <label for="" class="col-form-label">Short Description in Khmer</label>
                    <textarea name="short_desc_km" class="form-control {{ $errors->has('short_desc_km') ? 'is-invalid' : '' }}" id="" cols="30" rows="10">{{ old('short_desc_km') ?? $staff->short_desc_km }}</textarea>
                    @if($errors->has('short_desc_km'))
                        <div class="invalid-feedback">
                            {{ $errors->first('short_desc_km') }}
                        </div>
                    @endif
                </div>
                <div class="form-group col-sm-6">
                    <label for="" class="col-form-label">Bio in English</label>
                    <textarea name="bio_en" id="" cols="30" rows="10" class="form-control {{ $errors->has('bio_en') ? 'is-invalid' : '' }}" >{{ old('bio_en') ?? $staff->bio_en }}</textarea>
                    @if($errors->has('bio_en'))
                        <div class="invalid-feedback">
                            {{ $errors->first('bio_en') }}
                        </div>
                    @endif
                </div>
                <div class="form-group col-sm-6">
                    <label for="" class="col-form-label">Bio in Khmer</label>
                    <textarea name="bio_km" id="" cols="30" rows="10" class="form-control {{ $errors->has('bio_km') ? 'is-invalid' : '' }}" >{{ old('bio_km') ?? $staff->bio_km }}</textarea>
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