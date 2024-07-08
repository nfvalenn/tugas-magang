<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <nav class="navbar" style="background-color: #9d9d9e;">
        <div class="container-fluid">
            <a class="navbar-brand font-bold text-xl" style="color: #131212;">Data Mahasiswa</a>
            <form class="search-form d-flex" action="{{ route('mahasiswa.search') }}" method="GET">
                <div class="input-group">
                    <input type="search" id="searchInput" name="search" class="form-control" placeholder="Search" aria-label="Search" style="border: 1px solid #ccc;">
                    <button class="btn btn-custom-light" type="submit" style="background-color: #f6f6fa; color: #ffffff;">
                        <svg class="bi" width="16" height="16" viewBox="0 0 16 16">
                            <path d="M11.742 10.742a5.5 5.5 0 1 0-1.415 1.415l3.612 3.612a1 1 0 0 0 1.415-1.414l-3.612-3.613zM12.5 6a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0z"/>
                        </svg>
                    </button>
                </div>
            </form>
        </div>
    </nav>
    <div class="container mt-4">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
            <h1 style="flex: 1; text-align: center; margin: 0; font-size: 1.5rem;">Data Mahasiswa</h1>
            <button type="button" class="btn btn-custom" data-bs-toggle="modal" data-bs-target="#addDataModal"
                style="background-color: #7d7d7d; color: #ffffff;">
                Tambah Data
            </button>
        </div>
        <div class="container mt-4">
            <div id="mahasiswaGrid" class="row gy-4 gx-4">
                @foreach ($mahasiswas as $mahasiswa)
                    <div class="col-md-4">
                        <div class="card bg-secondary">
                            <div class="card-body">
                                <p class="card-text mb-0">Nama: {{ $mahasiswa['name'] }}</p>
                                <p class="card-text mb-0">Nim: {{ $mahasiswa['nim'] }}</p>
                                <p class="card-text mb-0">Universitas: {{ $mahasiswa['universitas'] }}</p>
                                <p class="card-text">Keterangan: {{ $mahasiswa['keterangan'] }}</p>
                                <button type="button" class="btn btn-dark" data-bs-toggle="modal"
                                    data-bs-target="#editDataModal-{{ $mahasiswa['id'] }}">
                                    Edit
                                </button>
                                {{-- modal edit data --}}
                                <div class="modal fade" id="editDataModal-{{ $mahasiswa['id'] }}" tabindex="-1"
                                    aria-labelledby="editDataModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content" style="background-color: #9d9d9e; color: #ffffff;">
                                            <div class="modal-header" style="background-color: #7d7d7d;">
                                                <h5 class="modal-title" id="editDataModalLabel" style="color: #ffffff;">
                                                    Edit Data</h5>
                                            </div>
                                            <form action="{{ route('mahasiswa.update', $mahasiswa['id']) }}"
                                                method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-body">
                                                    <input type="hidden" id="editIndex" name="editIndex">
                                                    <div class="mb-3">
                                                        <label for="editName" class="form-label">Nama</label>
                                                        <input type="text" class="form-control" id="editName"
                                                            name="name" value="{{ $mahasiswa['name'] }}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="editNim" class="form-label">NIM</label>
                                                        <input type="text" class="form-control" id="editNim"
                                                            name="nim" value="{{ $mahasiswa['nim'] }}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="editUniversitas"
                                                            class="form-label">Universitas</label>
                                                        <input type="text" class="form-control" id="editUniversitas"
                                                            name="universitas" value="{{ $mahasiswa['universitas'] }}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="editKeterangan"
                                                            class="form-label">Keterangan</label>
                                                        <input type="text" class="form-control" id="editKeterangan"
                                                            name="keterangan" value="{{ $mahasiswa['keterangan'] }}">
                                                    </div>
                                                </div>
                                                <div class="modal-footer" style="background-color: #7d7d7d;">
                                                    <button type="button" class="btn btn-custom-light"
                                                        data-bs-dismiss="modal"
                                                        style="background-color: #9d9d9e; color: #ffffff;">Batal</button>
                                                    <button type="submit" class="btn btn-custom"
                                                        style="background-color: #9d9d9e; color: #ffffff;">Update</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                {{-- modal delete data --}}
                                <button type="button" class="btn btn-dark position-relative" data-bs-toggle="modal"
                                    data-bs-target="#deleteDataModal-{{ $mahasiswa['id'] }}">
                                    Delete
                                </button>
                                <div class="modal fade" id="deleteDataModal-{{ $mahasiswa['id'] }}" tabindex="-1"
                                    aria-labelledby="deletetDataModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content" style="background-color: #9d9d9e; color: #ffffff;">
                                            <div class="modal-header" style="background-color: #9d9d9e;">
                                                <h5 class="modal-title" id="editDataModalLabel"
                                                    style="color: #ffffff;">
                                                    Delete Data</h5>
                                            </div>
                                            <form action="{{ route('mahasiswa.destroy', $mahasiswa['id']) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <div class="modal-body">
                                                    <h5>Are You Sure Want To Delete This Data?</h5>
                                                </div>
                                                <div class="modal-footer" style="background-color: #7d7d7d;">
                                                    <button type="button" class="btn btn-custom-light"
                                                        data-bs-dismiss="modal"
                                                        style="background-color: #9d9d9e; color: #ffffff;">Batal</button>
                                                    <button type="submit" class="btn btn-custom"
                                                        style="background-color: #7d7d7d; color: #ffffff;">Delete</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Modal Tambah Data -->
    <div class="modal fade" id="addDataModal" tabindex="-1" aria-labelledby="addDataModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="background-color: #9d9d9e; color: #ffffff;">
                <div class="modal-header" style="background-color: #7d7d7d;">
                    <h5 class="modal-title" id="addDataModalLabel" style="color: #ffffff;">Tambah Data</h5>
                </div>
                <form action="{{ route('mahasiswa.store') }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="name" name="name">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="nim" class="form-label">NIM</label>
                            <input type="text" class="form-control" id="nim" name="nim" required>
                        </div>
                        <div class="mb-3">
                            <label for="university" class="form-label">Universitas</label>
                            <input type="text" class="form-control" id="universitas" name="universitas" required>
                        </div>
                        <div class="mb-3">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <input type="text" class="form-control" id="keterangan" name="keterangan" required>
                        </div>
                    </div>
                    <div class="modal-footer" style="background-color: #7d7d7d;">
                        <button type="button" class="btn btn-custom-light" data-bs-dismiss="modal"
                            style="background-color: #9d9d9e; color: #ffffff;">Batal</button>
                        <button type="submit" class="btn btn-custom"
                            style="background-color: #7d7d7d; color: #ffffff;">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
