<div class="form-group row mb-4">
    <label class="col-sm-3 col-form-label">Quote</label>
    <div class="col-sm-9">
        <textarea class="form-control summernote" name="quote_career" rows="4">{{ $setting['quote_career'] ?? '' }}</textarea>
    </div>
</div>
<div class="form-group row mb-4">
    <label class="col-sm-3 col-form-label">Image Header Career</label>
    <div class="col-sm-4">
        <div id="image-preview" class="image-preview p-2">
            <div class="gallery gallery-lg">
                <div class="gallery-item img-preview" id="image_header_career"
                    style="background-image: url('{{ asset($setting['image_header_career'] ?? '') }}');">
                    <button type="button" class="btn btn-danger float-right btn-remove-image" data-key="image_header_career">
                        <i class="fa fa-trash"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
