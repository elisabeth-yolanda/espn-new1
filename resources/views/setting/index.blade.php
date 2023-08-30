<x-app-layout title="Setting">
    <x-content_header>
        <div class="col-sm-6">
            <h4>Setting</h4>
        </div>

        <x-breadcrumb>
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item item">{{ __('Setting') }}</li>
        </x-breadcrumb>
    </x-content_header>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
            <div class="col-12">
                <div class="card card-outline">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <ul class="nav nav-pills flex-column" id="myTab4" role="tablist" style="position: sticky; top: 0">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#home" role="tab"
                                            aria-controls="home" aria-selected="false">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#about_us" role="tab"
                                            aria-controls="about_us" aria-selected="false">About Us</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#product_service" role="tab"
                                            aria-controls="product_service" aria-selected="false">Product & Service</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#news" role="tab"
                                            aria-controls="news" aria-selected="false">News</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#career" role="tab"
                                            aria-controls="career" aria-selected="false">Career</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#contact-us" role="tab"
                                            aria-controls="contact-us" aria-selected="false">Contact Us</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-9">
                                <form action="{{ route('setting.store') }}" method="post" id="form-setting" enctype="multipart/form-data">
                                @csrf
                                    <div class="tab-content" id="nav-tabContent">
                                        <div id="home" class="tab-pane fade show active">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h5>Home</h5>
                                                </div>
                                                <div class="card-body">
                                                    @include('setting.home')
                                                </div>
                                            </div>
                                        </div>
                                        <div id="about_us" class="tab-pane fade">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h5>About Us</h5>
                                                </div>
                                                <div class="card-body">
                                                    @include('setting.about_us')
                                                </div>
                                            </div>
                                        </div>
                                        <div id="product_service" class="tab-pane fade">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h5>Product & Service</h5>
                                                </div>
                                                <div class="card-body">
                                                    @include('setting.product_service')
                                                </div>
                                            </div>
                                        </div>
                                        <div id="news" class="tab-pane fade">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h5>News</h5>
                                                </div>
                                                <div class="card-body">
                                                    @include('setting.news')
                                                </div>
                                            </div>
                                        </div>
                                        <div id="career" class="tab-pane fade">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h5>Career</h5>
                                                </div>
                                                <div class="card-body">
                                                    @include('setting.career')
                                                </div>
                                            </div>
                                        </div>
                                        <div id="contact-us" class="tab-pane fade">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h5>Contact Us</h5>
                                                </div>
                                                <div class="card-body">
                                                    @include('setting.contact_us')
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-4 row ml-2">
                                        <button class="btn btn-primary btn-submit"><i class="fa fa-save"></i>&nbsp;Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
    <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    @include('lib.summernote')
    @push('script')
    <script src="{{ asset('assets/dist/js/pages/setting/index.js') }}"></script>
    <script src="{{ asset('assets/dist/js/gallery.js') }}"></script>
    @endpush
</x-app-layout>
