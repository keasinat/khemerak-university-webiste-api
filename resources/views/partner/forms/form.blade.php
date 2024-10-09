<div class="container-fuild">
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="" class="col-form-label">Name</label>
                <input type="text" name="title_km" id="" class="form-control {{ $errors->has('title_km') ? 'is-invalid' : '' }}" value="{{ old('title_km') ?? ''}}">
                @if($errors->has('title_km'))
                    <div class="invalid-feedback">
                        {{ $errors->first('title_km') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="" class="col-form-label">Link Partner</label>
                <input type="text" name="link" id="" class="form-control {{ $errors->has('link') ? 'is-invalid' : '' }}" value="{{ old('link') ?? ''}}">
                @if($errors->has('link'))
                    <div class="invalid-feedback">
                        {{ $errors->first('link') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="" class="col-form-label">{{__('dashboard.select_logo')}}</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                    <a id="lfm" data-input="logo" data-preview="holder" class="btn btn-info input-group-text">
                        <i class="fa-solid fa fa-image"></i>
                    </a>
                    </div>
                    <input id="logo" class="form-control {{ $errors->has('logo') ? 'is-invalid' : '' }}" type="text" name="logo" value="{{ old('logo') }}">
                    @if($errors->has('logo'))
                        <div class="invalid-feedback">
                            {{ $errors->first('logo') }}
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
    </div>
</div>
