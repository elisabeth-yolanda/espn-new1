<x-app-layout title="Message">
    <x-content_header>
        <div class="col-sm-6">
            <h4>Message</h4>
        </div>

        <x-breadcrumb>
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item item">{{ __('Message') }}</li>
        </x-breadcrumb>
    </x-content_header>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
                <div class="card card-outline">
                    <!-- /.card-header -->
                    <div class="card-body overflow-auto">
                        <table id="example1" class="table table-bordered  table-hover">
                            <thead>
                                <tr>
                                    <th width="10px">No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Subject</th>
                                    <th>Message</th>
                                    <th>Submitted At</th>
                                </tr>
                                <tr>
                                    <th></th>
                                    <th>
                                        <input class="form-control" placeholder="Search name" name="name" type="text">
                                    </th>
                                    <th>
                                        <input class="form-control" placeholder="Search email" name="email" type="text">
                                    </th>
                                    <th>
                                        <input class="form-control" placeholder="Search subject" name="subject" type="text">
                                    </th>
                                    <th>
                                        <input class="form-control" placeholder="Search message" name="message" type="text">
                                    </th>
                                    <th>
                                        <div class="d-flex align-items-center">
                                            <span>
                                                <label>From</label>
                                                <input class="form-control" type="date" name="start_date" style="max-width: 120px" type="text">
                                            </span>
                                            <span>
                                                <label>To</label>
                                                <input class="form-control" type="date" name="end_date" style="max-width: 120px" type="text">
                                            </span>
                                        </div>
                                    </th>
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
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->


    @include('lib.datatable')
    @push('script')
    <script src="{{ asset('assets/dist/js/pages/message/index.js') }}"></script>
    @endpush
</x-app-layout>
