<div class="form-group row mb-4">
    <label class="col-sm-3 col-form-label">Quote</label>
    <div class="col-sm-9">
        <textarea class="form-control summernote" name="quote_news" rows="4">{{ $setting['quote_news'] ?? '' }}</textarea>
    </div>
</div>
<div class="form-group row mb-4">
    <label class="col-sm-3 col-form-label">Image Header News</label>
    <div class="col-sm-4">
        <div id="image-preview" class="image-preview p-2">
            <div class="gallery gallery-lg">
                <div class="gallery-item img-preview" id="image_header_news"
                    style="background-image: url('{{ asset($setting['image_header_news'] ?? '') }}');">
                    <button type="button" class="btn btn-danger float-right btn-remove-image" data-key="image_header_news">
                        <i class="fa fa-trash"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
