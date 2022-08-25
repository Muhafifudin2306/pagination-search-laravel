<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Tambah Data Movie </title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
</head>

<body>

    <div class="container col-lg-6"">
        <div id="title" style="margin-top: 50px">
            <div class="title">
                <h4> Tambah Data Movie </h4>
            </div>
        </div>

        <div id="form" style="margin-top: 50px">
            <form action="{{ url('/addmovie') }}" method="post">
                {{ csrf_field() }}
                <div class="mb-3">
                    <label for="judul" class="form-label">Judul</label>
                    <input type="text" class="form-control" name="judul" required>
                </div>
                <div class="mb-3">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input type="date" class="form-control" name="tanggal" required>
                </div>
                <div class="mb-3">
                    <label for="total" class="form-label">Genre</label>
                    <select class="form-select" aria-label="Default select example" name="genre_id">
                        <option selected disabled>-- Pilih Genre --</option>
                        @foreach ($genre as $gen)
                            <option value="{{ $gen->genre_id }}">{{ ucfirst($gen->nama) }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="rating" class="form-label">Rating</label>
                    <input type="float" class="form-control" name="rating" required>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>

    </div>

</body>

</html>
