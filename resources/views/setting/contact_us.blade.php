<div class="form-group row mb-4">
    <label class="col-sm-3 col-form-label">Phone</label>
    <div class="col-sm-9">
        <input type="text" class="form-control" name="phone_contact_us" value="{{ $setting['phone_contact_us'] ?? '' }}">
    </div>
</div>
<div class="form-group row mb-4">
    <label class="col-sm-3 col-form-label">Email</label>
    <div class="col-sm-9">
        <input type="text" class="form-control" name="email_contact_us" value="{{ $setting['email_contact_us'] ?? '' }}">
    </div>
</div>
<div class="form-group row mb-4">
    <label class="col-sm-3 col-form-label">Location</label>
    <div class="col-sm-9">
        <input type="text" class="form-control" name="location_contact_us" value="{{ $setting['location_contact_us'] ?? '' }}">
    </div>
</div>
<div class="form-group row mb-4">
    <label class="col-sm-3 col-form-label">Link Maps</label>
    <div class="col-sm-9">
        <input type="text" class="form-control" name="link_maps_contact_us" value="{{ $setting['link_maps_contact_us'] ?? '' }}">
    </div>
</div>
<div class="form-group row mb-4">
    <label class="col-sm-3 col-form-label">Quote</label>
    <div class="col-sm-9">
        <textarea class="form-control summernote" name="quote_contact_us" rows="4">{{ $setting['quote_contact_us'] ?? '' }}</textarea>
    </div>
</div>
<div class="form-group row mb-4">
    <label class="col-sm-3 col-form-label">Image Header Contact Us</label>
    <div class="col-sm-4">
        <div id="image-preview" class="image-preview p-2">
            <div class="gallery gallery-lg">
                <div class="gallery-item img-preview" id="image_header_contact_us"
                    style="background-image: url('{{ asset($setting['image_header_contact_us'] ?? '') }}');">
                    <button type="button" class="btn btn-danger float-right btn-remove-image" data-key="image_header_contact_us">
                        <i class="fa fa-trash"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

