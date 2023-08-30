<x-app-layout title="Product Service">
    <x-content_header>
        <div class="col-sm-6">
            <h4>{{ isset($data) ? 'Edit' : 'Add' }} Product Service</h4>
        </div>

        <x-breadcrumb>
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item item">
                <a href="{{ route('product-service.index') }}">{{ __('Product Service') }}</a>
            </li>
            <li class="breadcrumb-item item active">{{ __( (isset($data) ? 'Edit' : 'Add') . ' Product Service') }}</li>
        </x-breadcrumb>
    </x-content_header>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <form method="post" action="{{ route('product-service.store') }}" enctype="multipart/form-data">
                <input type="hidden" name="id" value="{{ $data->id ?? 0 }}" />
                @csrf
                <div class="row">
                    <div class="col-12">
                        <x-validation-errors/>
                    </div>
                    <div class="col-md-6">
                        <div class="card card-outline">
                            <div class="card-body">
                                <div class="form-group mb-3">
                                    <label for="name">
                                        Name
                                    </label>
                                    <input type="text"
                                        name="name"
                                        value="{{ old('name', ($data->name ?? '')) }}"
                                        class="form-control @error('name') is-invalid @enderror" id="name">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="name">
                                        Link
                                    </label>
                                    <input type="text"
                                        name="link"
                                        value="{{ old('link', ($data->link ?? '')) }}"
                                        class="form-control @error('link') is-invalid @enderror" id="link">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="description">
                                        Description
                                    </label>
                                    <textarea class="form-control text-editor @error('description') is-invalid @enderror" name="description" id="description">{{ old('description', ($data->description ?? '')) }}</textarea>
                                </div>
                                <div class="">
                                    <button class="btn btn-primary">
                                        <i class="fa fa-save"></i>
                                        Simpan
                                    </button>
                                    <a href="{{ route('product-service.index') }}" class="btn btn-danger">
                                        <i class="fa fa-times"></i>
                                        Batal
                                    </a>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-12">
                                <div class="card card-outline">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="image">Image</label>
                                            <div id="image-preview" class="image-preview sm p-2">
                                                <div class="gallery gallery-sm">
                                                    <div class="gallery-item img-preview sm" id="image" style="background-image: url('{{ asset($data->image ?? '') }}');">
                                                        @if (isset($data->image))
                                                            <button type="button" class="btn btn-danger float-right btn-remove-image" data-key="image">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                            @else
                                                            <label for="image-upload">Pilih Gambar</label>
                                                            <input type="file" name="image">
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title">
                                            Product in catalogue
                                        </h5>
                                    </div>
                                    <div class="card-body">
                                        <input type="hidden" name="productDetail" id="productDetail" value="{{ $productDetail ?? old('productDetail') }}">
                                        <div role="button"
                                            class="btn btn-primary btn-sm border-0"
                                            data-toggle="modal"
                                            data-target="#modalDetailProduct">
                                            <i class="fa fa-plus px-1"></i> Tambah
                                        </div>
                                        <div class="mt-4">
                                            <table class="table" id="productTable">
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- /.content -->

    @push('modals')
    <div class="modal fade" id="modalDetailProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Product in catalogue</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="submitInputDetail">
                <input type="hidden" name="id" value="0">
                @if (isset($data))
                <input type="hidden" name="product_service_id" value="{{ $data->id }}">
                @endif
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label for="nameDetail">Nama</label>
                        <input type="text"
                                class="form-control"
                                id="nameDetail"
                                name="name">
                    </div>
                    <div class="form-group">
                        <label for="imageInputDetail">Image</label>
                        <div id="image-preview" class="image-preview sm p-2">
                            <div class="gallery gallery-sm">
                                <div class="gallery-item img-preview sm" id="imageInputDetail" style="background-image: url('');">
                                    <label for="image-upload">Pilih Gambar</label>
                                    <input type="file" name="imageInputDetail">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button id="submitBtnDetail" class="btn btn-primary">Simpan</button>
                </div>
            </form>
            </div>
        </div>
    </div>

    @endpush

    @include('lib.summernote')
    @include('lib.datatable')
    @push('script')
    <script>
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        const summernoteEditor = $('#description').summernote({
            height: 150,
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']],
                ['Misc', ['codeview','fullscreen']]
            ],
        });
    </script>
    <script src="{{ asset('assets/dist/js/pages/productDescription/created-update.js') }}"></script>
    <script src="{{ asset('assets/dist/js/gallery.js') }}"></script>
    @endpush
</x-app-layout>
