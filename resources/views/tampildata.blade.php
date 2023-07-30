<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Tambah Data Pegawai</title>
</head>

<body>
    <body>

        <h1 class="text-center mb-4">Edit Data Pegawai</h1>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-8">
                    <div class="card">
                        <div class="card-body">
                            <form action="/updatedata/{{$data->id}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('POST')
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Nama</label>
                                    <input type="text" name="nama" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" value="{{$data->nama}}">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Jenis Kelamin</label>
                                    <select class="form-select" name="jeniskelamin" aria-label="Default select example">
                                        <option value="cowo" @if($data->jeniskelamin === 'cowo') selected @endif>cowo</option>
                                        <option value="cewe" @if($data->jeniskelamin === 'cewe') selected @endif>cewe</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">No Telpon</label>
                                    <input type="number" name="notelpon" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" value="{{$data->notelpon}}">
                                </div>
                                <div class="mb-3">
                                    <label for="currentFoto" class="form-label">Gambar Saat Ini</label>
                                    @if($data->foto)
                                    <img src="{{ asset('fotopegawai/' . $data->foto) }}" alt="Current Photo" class="img-thumbnail" width="200">
                                    @else
                                    <p>No photo available</p>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label for="foto" class="form-label">Ganti Gambar (kosongkan jika tidak ingin mengubah)</label>
                                    <input type="file" name="foto" class="form-control" id="foto">
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <!-- Optional JavaScript; choose one of the two! -->
    
        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
    
    </body>

</html>
