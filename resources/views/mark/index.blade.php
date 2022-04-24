@extends('layouts.backend')

@section('css_before')
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('js/plugins/datatables/dataTables.bootstrap4.css') }}">
@endsection

@section('js_after')
    <!-- Page JS Plugins -->
    <script src="{{ asset('js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page JS Code -->
    <script src="{{ asset('js/mark/index.js') }}"></script>
@endsection

@section('content')
    <!-- Page Content -->
    <div class="content">
        <div class="my-50 text-center">
            <h2 class="font-w700 text-black mb-10"> Marks </h2>
            {{-- <h3 class="h5 text-muted mb-0">Plugin Integration</h3> --}}
        </div>

        <!-- Info -->
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="block">
                    <div class="block-content">
                        <p class="text-muted text-center">
                            Here you can manage all the Marks
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Info -->

        <!-- Dynamic Table Full -->
        <div class="block">
            <div class="block-header block-header-default">
                {{-- <h3 class="block-title">Dynamic Table <small>Full</small></h3> --}}
                <a href="{{ route('marks.create') }}" data-toggle="click-ripple"
                    style="overflow: hidden; position: relative; z-index: 1;">
                    <button type="button" class="btn btn-outline-primary min-width-125 js-click-ripple-enabled">
                        <i class="fa fa-plus mr-5"></i>
                        ADD
                    </button>
                </a>
            </div>
            <div class="block-content block-content-full">
                <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/tables_datatables.js -->
                <div class="table-responsive">
                    <table id="marks" class="table table-bordered table-striped table-vcenter js-dataTable-full" data-url="{{ route('marks.index') }}">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 40px;">#</th>
                                <th class="text-center" style="width: 20%;">Name</th>
                                <th class="text-center" style="width: 5%;">Maths</th>
                                <th class="text-center" style="width: 5%;">Science</th>
                                <th class="text-center" style="width: 5%;">History</th>
                                <th class="text-center" style="width: 5%;">Term</th>
                                <th class="text-center" style="width: 10%;">Total Marks</th>
                                <th class="text-center" style="width: 20%;">Created On</th>
                                <th class="text-center" style="width: 20%;">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- END Dynamic Table Full -->
    </div>
    <!-- END Page Content -->
@endsection
