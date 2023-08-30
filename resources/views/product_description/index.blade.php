<x-app-layout title="Product Service">
    <x-content_header>
        <div class="col-sm-6">
            <h4>Product Service</h4>
        </div>

        <x-breadcrumb>
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item item">{{ __('Product Service') }}</li>
        </x-breadcrumb>
    </x-content_header>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12" style="position: sticky !important; top: 0 !important">
                    <div class="card" style="position: sticky !important; top: 0 !important">
                        <div class="card-header card-outline">
                            <a class="btn btn-primary border-0" href="{{ route('product-service.create') }}"><i class="fa fa-plus px-1"></i> Add Product Service</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered  table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Product Service</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                {{-- <div class="col-md-5 form-inputan" style="display: none">
                    <div class="card">
                        <div class="card-header card-outline">
                            <h3 class="card-title">Inputan Product Service</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="alert-error"></div>
                            <form action="{{ route('product-service.store') }}" method="post" id="form">
                                <input type="hidden" name="id" value="0" />
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
                                    <label for="link">
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
                                    <textarea class="form-control" id="summernoteDescription" name="description"></textarea>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="image">Image</label>
                                    <div id="image-preview" class="image-preview sm p-2">
                                        <div class="gallery gallery-sm">
                                            <div class="gallery-item img-preview sm" id="image" style="background-image: url('{{ asset($data->image ?? '') }}');">
                                                <label for="image-upload">Pilih Gambar</label>
                                                <input type="file" name="image">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-primary"><i class="fa fa-save"></i>&nbsp; Simpan</button>
                                <button type="button" class="btn btn-secondary btn-kembali"><i class="fas fa-times"></i>&nbsp; Batal</button>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div> --}}
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
        </section>
    <!-- /.content -->


    @include('lib.summernote')
    @include('lib.datatable')
    @push('script')
    <script>
      const summernoteEditor = $('#summernoteDescription').summernote({
            height: 300,
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
    <script src="{{ asset('assets/dist/js/pages/productDescription/index.js') }}"></script>
    <script src="{{ asset('assets/dist/js/gallery.js') }}"></script>
    @endpush
</x-app-layout>
