<x-app-layout title="Our Team">
    <x-content_header>
        <div class="col-sm-6">
            <h4>Our Team</h4>
        </div>

        <x-breadcrumb>
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item item">{{ __('Our Team') }}</li>
        </x-breadcrumb>
    </x-content_header>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-header card-outline">
                            <a class="btn btn-primary border-0 btn-tambah"><i class="fa fa-plus px-1"></i> Add Our Team</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered  table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
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
                <div class="col-md-5 form-inputan" style="display: none">
                    <div class="card">
                        <div class="card-header card-outline">
                            <h3 class="card-title">Inputan Our Team</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="alert-error"></div>
                            <form action="{{ route('our-team.store') }}" method="post" id="form">
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
                                    <label for="position">
                                        Position
                                    </label>
                                    <input type="text"
                                        name="position"
                                        value="{{ old('position', ($data->position ?? '')) }}"
                                        class="form-control @error('position') is-invalid @enderror" id="position">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="quote">
                                        Quote
                                    </label>
                                    <textarea name="quote"  class="form-control @error('link') is-invalid @enderror" id="link">{{ old('quote', ($data->quote ?? '')) }}</textarea>
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
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
        </section>
    <!-- /.content -->


    @include('lib.datatable')
    @push('script')
    <script src="{{ asset('assets/dist/js/pages/ourteam/index.js') }}"></script>
    <script src="{{ asset('assets/dist/js/gallery.js') }}"></script>
    @endpush
</x-app-layout>
