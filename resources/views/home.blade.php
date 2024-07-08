<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .btn-custom {
            background-color: #7d7d7d;
            color: #ffffff;
        }
        .btn-custom-light {
            background-color: #9d9d9e;
            color: #ffffff;
        }
    </style>
</head>
<body>
    <nav class="navbar" style="background-color: #9d9d9e;">
        <div class="container-fluid">
            <a class="navbar-brand" style="color: #131212;">Data Mahasiswa</a>
            <form class="search-form d-flex">
                <div class="input-group">
                    <input type="search" class="form-control" placeholder="Search" aria-label="Search" style="border: 1px solid #ccc;">
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
            <button type="button" class="btn btn-custom" data-bs-toggle="modal" data-bs-target="#addDataModal">
                Tambah Data
            </button>
        </div>
        <div class="container mt-4">
            <div id="mahasiswaGrid" class="row gy-4 gx-4">
                <!-- Kolom data mahasiswa akan ditambahkan di sini -->
            </div>
        </div>
    </div>

    <!-- Modal Tambah Data -->
    <div class="modal fade" id="addDataModal" tabindex="-1" aria-labelledby="addDataModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="background-color: #9d9d9e; color: #ffffff;">
                <div class="modal-header" style="background-color: #7d7d7d;">
                    <h5 class="modal-title" id="addDataModalLabel">Tambah Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addDataForm">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="nim" class="form-label">NIM</label>
                            <input type="text" class="form-control" id="nim" name="nim" required>
                        </div>
                        <div class="mb-3">
                            <label for="university" class="form-label">Universitas</label>
                            <input type="text" class="form-control" id="university" name="university" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Keterangan</label>
                            <input type="text" class="form-control" id="description" name="description" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer" style="background-color: #7d7d7d;">
                    <button type="button" class="btn btn-custom-light" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-custom" onclick="submitData()">Simpan</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit Data -->
    <div class="modal fade" id="editDataModal" tabindex="-1" aria-labelledby="editDataModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="background-color: #9d9d9e; color: #ffffff;">
                <div class="modal-header" style="background-color: #7d7d7d;">
                    <h5 class="modal-title" id="editDataModalLabel">Edit Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editDataForm">
                        <input type="hidden" id="editId" name="editId">
                        <div class="mb-3">
                            <label for="editName" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="editName" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="editNim" class="form-label">NIM</label>
                            <input type="text" class="form-control" id="editNim" name="nim" required>
                        </div>
                        <div class="mb-3">
                            <label for="editUniversity" class="form-label">Universitas</label>
                            <input type="text" class="form-control" id="editUniversity" name="university" required>
                        </div>
                        <div class="mb-3">
                            <label for="editDescription" class="form-label">Keterangan</label>
                            <input type="text" class="form-control" id="editDescription" name="description" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer" style="background-color: #7d7d7d;">
                    <button type="button" class="btn btn-custom-light" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-custom" onclick="updateData()">Update</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        let dataMahasiswa = [];
        let editIndex = -1;

        function submitData() {
            const name = document.getElementById('name').value;
            const nim = document.getElementById('nim').value;
            const university = document.getElementById('university').value;
            const description = document.getElementById('description').value;

            const newData = { name, nim, university, description };
            dataMahasiswa.push(newData);

            document.getElementById('addDataForm').reset();
            document.getElementById('addDataModal').querySelector('.btn-close').click();
            renderData();
        }

        function renderData() {
            const grid = document.getElementById('mahasiswaGrid');
            grid.innerHTML = '';

            dataMahasiswa.forEach((data, index) => {
                const col = document.createElement('div');
                col.className = 'col-md-4';
                col.innerHTML = `
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">${data.name}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">${data.nim}</h6>
                            <p class="card-text">Universitas: ${data.university}</p>
                            <p class="card-text">Keterangan: ${data.description}</p>
                            <button class="btn btn-custom" onclick="editData(${index})">Edit</button>
                            <button class="btn btn-danger" onclick="deleteData(${index})">Hapus</button>
                        </div>
                    </div>
                `;
                grid.appendChild(col);
            });
        }

        function editData(index) {
            editIndex = index;
            const data = dataMahasiswa[index];
            document.getElementById('editId').value = index;
            document.getElementById('editName').value = data.name;
            document.getElementById('editNim').value = data.nim;
            document.getElementById('editUniversity').value = data.university;
            document.getElementById('editDescription').value = data.description;
            const editModal = new bootstrap.Modal(document.getElementById('editDataModal'));
            editModal.show();
        }

        function updateData() {
            const index = document.getElementById('editId').value;
            const name = document.getElementById('editName').value;
            const nim = document.getElementById('editNim').value;
            const university = document.getElementById('editUniversity').value;
            const description = document.getElementById('editDescription').value;

            dataMahasiswa[index] = { name, nim, university, description };

            document.getElementById('editDataForm').reset();
            document.getElementById('editDataModal').querySelector('.btn-close').click();
            renderData();
        }

        function deleteData(index) {
            dataMahasiswa.splice(index, 1);
            renderData();
        }
    </script>
</body>
</html>
