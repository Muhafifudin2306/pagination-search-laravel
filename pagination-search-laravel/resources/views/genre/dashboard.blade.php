@extends('layout.dashboard')

@section('title-page', 'CRUD Genre')

@push('style')
    <link href="{{ asset('asset/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Daftar Genre Saya</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"></h6>
            </div>

            <div class="card-body">

                <div class="table-responsive">
                    <form action="{{ route('search-genre') }}" class="d-flex justify-content-end" method="get">
                        <input class="form-control me-2" name="search" type="search" placeholder="Search"
                            style="width: 100%; margin-right: 15px" value="{{ request('search') }}">
                        <button class="btn btn-outline-success" type="submit"><i class="fa fa-search"></i></button>
                    </form>

                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"
                        style="margin-top:20px">
                        <thead>
                            <tr align="center">
                                <th width="50px">#</th>
                                <th width="300px">Nama Genre</th>
                                <th width="10px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($genre) == 0)
                                <tr>
                                    <td colspan="6" align="center" style="color: gray"> <i>Data kosong</i> </td>
                                </tr>
                            @endif


                            @foreach ($genre as $index => $item)
                                <tr>
                                    <td align="center"> {{ $index + $genre->firstItem() }} </td>
                                    <td> {{ $item->nama }} </td>


                                    <td class="d-flex justify-content-center">


                                        <form method="GET" action="{{ route('edit-genre', $item->genre_id) }}"
                                            style="margin-right:10px">
                                            @csrf
                                            <input type="hidden" value="EDIT" name="_method">
                                            <button type="submit" class="btn btn-warning"> <i class="fa fa-edit"></i>
                                            </button>
                                        </form>



                                        <form method="POST" onsubmit="return confirm('Move data to trash?')"
                                            action="{{ route('destroy-genre', [$item->genre_id]) }}">
                                            @csrf
                                            <input type="hidden" value="DELETE" name="_method">
                                            <button type="submit" class="btn btn-danger"> <i class="fa fa-remove"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach




                    </table>
                </div>
                </tbody>
                <div class="d-flex justify-content-center">
                    <div id="button-add">
                        <a href="{{ url('/tambahgenre') }}" class="btn btn-success"style="width:400px"> +Tambah Genre
                        </a>
                    </div>
                </div>
            </div>

            <div id="pagination" style="margin-top:30px">
                <div class="container-fluid">
                    <div class="pagination pagination-sm justify-content-end">

                        {{ $genre->links() }}


                    </div>

                </div>
            </div>
        @endsection

        @push('script')
            <!-- Page level plugins -->
            {{-- <script src="{{ asset('asset/vendor/datatables/jquery.dataTables.min.js') }}"></script> --}}
            <script src="{{ asset('asset/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

            <!-- Page level custom scripts -->
            <script src="{{ asset('asset/js/demo/datatables-demo.js') }}"></script>
        @endpush
