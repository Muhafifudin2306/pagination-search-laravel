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

</head>

<body>
    <div class="container col-lg-8">
        <div id="title" style="margin-top : 100px">
            <div class="title">
                <h4> Daftar Film Tontonan Saya </h4>
            </div>
        </div>
        <div id="button-add" style="margin-top: 50px">
            <a href="/add" class="btn btn-success"> +Tambah Film </a>
        </div>
    </div>
    <div id="table-body" style="margin-top: 30px">
        <div class="container col-lg-8">
            <table class="table table-bordered align-middle">
                <thead class="table table-primary">
                    <tr style="text-align: center">
                        <th width="200px">Judul</th>
                        <th width="100px">Tanggal Rilis</th>
                        <th width="100px">Genre</th>
                        <th width="100px">Rating</th>
                        <th width="10px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($movie) == 0)
                        <tr>
                            <td colspan="6" align="center" style="color: gray"> <i>Data kosong</i> </td>
                        </tr>
                    @endif


                    @foreach ($movie as $item)
                        <tr>
                            <td> {{ $item->judul }} </td>
                            <td> {{ $item->tanggal }} </td>
                            <td> {{ $item->genre->nama }} </td>
                            <td> {{ $item->rating }} </td>


                            <td class="d-flex justify-content-center">


                                <form method="GET" action="{{ route('edit-movie', $item->id) }}"
                                    style="margin-right:10px">
                                    @csrf
                                    <input type="hidden" value="EDIT" name="_method">
                                    <input type="submit" value="Edit" class="btn btn-warning">
                                </form>



                                <form method="POST" onsubmit="return confirm('Move data to trash?')"
                                    action="{{ route('destroy', [$item->id]) }}">
                                    @csrf
                                    <input type="hidden" value="DELETE" name="_method">
                                    <input type="submit" value="Delete" class="btn btn-danger">
                                </form>
                            </td>
                        </tr>
                    @endforeach




            </table>

        </div>
        </tbody>

    </div>
    </div>
    <div class="container col-lg-8">

        {{ $movie->links() }}

    </div>
</body>

</html>
