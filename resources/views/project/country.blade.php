<div class="form-group row">
    <label class="col-sm-4 col-form-label">Country</label>
    <div class="col-sm-6">
        <select name="country_id[]" class="form-control fcNew country_id">
           <option value="">- Select Country -</option>
            @foreach($countries as $country)
                <option value="{{ $country->id }}">{{ $country->name }}</option>
            @endforeach
        </select>
    </div>
</div>