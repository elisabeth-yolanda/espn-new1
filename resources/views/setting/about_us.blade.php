<div class="form-group row mb-4">
    <label class="col-sm-3 col-form-label">Visi</label>
    <div class="col-sm-9">
        <textarea class="form-control summernote" name="visi_about_us" rows="4">{{ $setting['visi_about_us'] ?? '' }}</textarea>
    </div>
</div>
<div class="form-group row mb-4">
    <label class="col-sm-3 col-form-label">Misi</label>
    <div class="col-sm-9">
        <textarea class="form-control summernote" name="misi_about_us" rows="4">{{ $setting['misi_about_us'] ?? '' }}</textarea>
    </div>
</div>
<div class="form-group row mb-4">
    <label class="col-sm-3 col-form-label">Value</label>
    <div class="col-sm-9">
        <textarea class="form-control summernote" name="value_about_us" rows="4">{{ $setting['value_about_us'] ?? '' }}</textarea>
    </div>
</div>
<div class="form-group row mb-4">
    <label class="col-sm-3 col-form-label">Image Header About Us</label>
    <div class="col-sm-4">
        <div id="image-preview" class="image-preview p-2">
            <div class="gallery gallery-lg">
                <div class="gallery-item img-preview" id="image_header_about_us"
                    style="background-image: url('{{ asset($setting['image_header_about_us'] ?? '') }}');">
                    <button type="button" class="btn btn-danger float-right btn-remove-image" data-key="image_header_about_us">
                        <i class="fa fa-trash"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
