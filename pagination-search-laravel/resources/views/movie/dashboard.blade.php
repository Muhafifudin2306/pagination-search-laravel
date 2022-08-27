<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Movie CRUD </title>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container">
            <a class="navbar-brand" href="/">Film Saya</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/genre') }}">Genre</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container col-lg-8">
        <div id="title" style="margin-top : 100px">
            <div class="title">
                <h4> Daftar Film Saya </h4>
            </div>
        </div>

        <form action="{{ route('search') }}" class="d-flex justify-content-end" method="get">
            <input class="form-control me-2" name="search" type="search" placeholder="Search" style="width: 300px"
                value="{{ request('search') }}">
            <button class="btn btn-outline-success" type="submit"><i class="fa fa-search"></i></button>
        </form>
    </div>

    </div>
    <div id="table-body" style="margin-top: 10px">
        <div class="container col-lg-8">
            <table class="table table-bordered align-middle" border="2">
                <thead class="table table-primary">
                    <tr style="text-align: center">
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
                        <tr>
                            <td align="center"> {{ $index + $movie->firstItem() }} </td>
                            <td> {{ $item->judul }} </td>
                            <td> {{ \Carbon\Carbon::parse($item->tanggal)->format('d F Y') }} </td>
                            <td> {{ $item->genre->nama }} </td>
                            <td> {{ $item->rating * 2 }}</td>


                            <td class="d-flex justify-content-center">


                                <form method="GET" action="{{ route('edit-movie', $item->id) }}"
                                    style="margin-right:10px">
                                    @csrf
                                    <input type="hidden" value="EDIT" name="_method">
                                    <button type="submit" class="btn btn-warning"> <i class="fa fa-edit"></i> </button>
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
    </div>
    <div id="pagination" style="margin-top:30px">
        <div class="container col-lg-8">

            {{ $movie->links() }}

        </div>
    </div>

</body>

</html>
