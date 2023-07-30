<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
        integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Data Pegawai</title>
</head>

<body>
    <h1 class="text-center mb-4">Data Pegawai</h1>

    <div class="container">
        <a href="/tambahpegawai" type="button" class="btn btn-success">Tambah Data +</a>
        <div class="row">
            @if ($message = Session::get('success'))
                <div class="alert alert-success mt-4 mb-4" role="alert">
                    {{ $message }}
                </div>
            @endif
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">No Telpon</th>
                        <th scope="col">Dibuat</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($data as $item)
                        <tr>
                            <th scope="row">{{ $no++ }}</th>
                            <td>{{ $item->nama }}</td>
                            <td>
                                <img src="{{ asset('fotopegawai/' . $item->foto) }}" alt="fotopegawai"
                                    style="width: 40px;">
                            </td>
                            <td>{{ $item->jeniskelamin }}</td>
                            <td>0{{ $item->notelpon }}</td>
                            <td>{{ $item->created_at->format('D M Y') }}</td>
                            <td>
                                <a href="/tampilkandata/{{ $item->id }}" class="btn btn-info">Edit</a>
                                <a href="javascript:void(0)" class="btn btn-danger delete" data-id="{{ $item->id }}"
                                    data-nama="{{ $item->nama }}">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $('.delete').click(function() {

            var pegawaiid = $(this).attr('data-id');
            var nama = $(this).attr('data-nama');

            swal({
                    title: "Yakin ?",
                    text: "Kamu akan menghapus data pegawai dengan nama " + nama + " ",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location = "/deletedata/" + pegawaiid + "";
                        swal("data berhasil dihapus!", {
                            icon: "success",
                        });
                    } else {
                        swal("data tidak jadi dihapus");
                    }
                });
        });

        @if(session()->has('success'))
            toastr["success"]("{{ session()->get('success') }}");
        @endif
    </script>
</body>

</html>