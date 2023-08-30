<div class="form-group row mb-4">
    <label class="col-sm-3 col-form-label">Quote</label>
    <div class="col-sm-9">
        <textarea class="form-control summernote" name="quote_home" rows="4">{{ $setting['quote_home'] ?? '' }}</textarea>
    </div>
</div>
<div class="form-group row mb-4">
    <label class="col-sm-3 col-form-label">Image Header Home</label>
    <div class="col-sm-4">
        <div id="image-preview" class="image-preview p-2">
            <div class="gallery gallery-lg">
                <div class="gallery-item img-preview" id="image_header_home"
                    style="background-image: url('{{ asset($setting['image_header_home'] ?? '') }}');">
                    <button type="button" class="btn btn-danger float-right btn-remove-image" data-key="image_header_home">
                        <i class="fa fa-trash"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
