@extends('layout.dashboard')

@section('title-page', 'CRUD Film')

@push('style')
    <link href="{{ asset('asset/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush

@section('content')


    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Daftar Film Saya</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"></h6>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <div id="tombol">
                        <div class="row">
                            <div class="col-lg-5">
                                <form action="{{ route('search') }}" class="d-flex justify-content-end" method="get">
                                    <input class="form-control mr-2" name="search" type="search" placeholder="Search"
                                        value="{{ request('search') }}">
                                    <button class="btn btn-outline-success" type="submit"><i
                                            class="fa fa-search"></i></button>
                                </form>
                            </div>
                            <div class="col-lg-4"></div>
                            <div class="col-lg-3">
                                <div class="dropdown">
                                    <a class="btn btn-info dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                        style="width: 100%">
                                        Order By
                                    </a>

                                    <ul class="dropdown-menu" style="width: 100%">
                                        <li><a class="dropdown-item" href="{{ url('/filterasc') }}">Ascending</a></li>
                                        <li><a class="dropdown-item" href="{{ url('/filterdesc') }}">Descending</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>


                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"
                        style="margin-top:20px">
                        <thead>
                            <tr align="center">
                                <th width="10%">#</th>
                                <th width="30%">Judul</th>
                                <th width="20%">Tanggal Rilis</th>
                                <th width="15%">Genre</th>
                                <th width="10%">Rating</th>
                                <th width="15%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($movie) == 0)
                                <tr>
                                    <td colspan="6" align="center" style="color: gray"> <i>Data kosong</i> </td>
                                </tr>
                            @endif


                            @foreach ($movie as $index => $item)
                                <tr align="center">
                                    <td> {{ $index + $movie->firstItem() }} </td>
                                    <td> {{ $item->judul }} </td>
                                    <td> {{ \Carbon\Carbon::parse($item->tanggal)->format('d F Y') }} </td>
                                    <td> {{ $item->genre->nama }} </td>
                                    <td> {{ $item->rating * 2 }}</td>


                                    <td class="d-flex justify-content-center">


                                        <form method="GET" action="{{ route('edit-movie', $item->id) }}"
                                            style="margin-right:10px">
                                            @csrf
                                            <input type="hidden" value="EDIT" name="_method">
                                            <button type="submit" class="btn btn-warning"> <i class="fa fa-edit"></i>
                                            </button>
                                        </form>



                                        <form method="POST" onsubmit="return confirm('Move data to trash?')"
                                            action="{{ route('destroy', [$item->id]) }}">
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
                        <a href="/add" class="btn btn-success"style="width:400px"> +Tambah Film
                        </a>
                    </div>
                </div>
            </div>
            <div id="pagination" style="margin-top:30px">
                <div class="container-fluid">
                    <div class="pagination pagination-sm justify-content-end">

                        {{ $movie->links() }}


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
