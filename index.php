<?php
include_once __DIR__ . "/koneksi.php";
$data = mysqli_query($koneksi, "SELECT * FROM mahasiswa ORDER BY id DESC");
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Latihan CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</head>

<body>
    <div class="cointaner">
        <div class="mT-3">
            <h1 class="text-center">Latihan Membuat Create Update Delete</h1>
        </div>
        <div class="card mt-3">
            <div class="card-header" style="background-color: #81642C ;">
                Data Mahasiswa
            </div>
            <div class="card-body">

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#modalTambah">
                    Tambah Data
                </button>

                <table class="table table-bordered table-striped table-hover">
                    <tr>
                        <th>No</th>
                        <th>Nim</th>
                        <th>Nama</th>
                        <th>alamat</th>
                        <th>jurusan</th>
                        <th>Action</th>
                    </tr>
                    <?php
                    $data = mysqli_query($koneksi, "SELECT * FROM mahasiswa ORDER BY id DESC");
                    $no = 1;
                    while ($d = mysqli_fetch_assoc($data)) :
                    ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $d['nim'] ?></td>
                            <td><?= $d['nama'] ?></td>
                            <td><?= $d['alamat'] ?></td>
                            <td><?= $d['prodi'] ?></td>
                            <td>
                                <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalEdit<?= $d['id'] ?>">Ubah</button>
                                <a href="aksi_crud.php?action=hapus&id=<?= $d['id'] ?>" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    <?php endwhile ?>
                </table>
            </div>
        </div>
    </div>
</body>

</html>

<!-- Tambah -->
<div class="modal fade" id="modalTambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Form Data Mahasiswa</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="aksi_crud.php?action=tambah" method="POST">
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">NIM</label>
                        <input type="text" class="form-control" name="tnim" placeholder="Masukkan nim anda">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" name="tnama" placeholder="Masukkan nama lengkap anda">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Alamat</label>
                        <textarea class="form-control" name="talamat" rows="3"></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Prodi</label>
                        <select name="tprodi" class="form-select">
                            <option selected disabled>Pilih prodi</option>
                            <option value="S1 Informatika">S1 Informatika</option>
                            <option value="S1 Manajemen">S1 Manajemen</option>
                            <option value="S1 Agama Kristen">S1 Agama Kristen</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" name="bsimpan">Simpan</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Keluar</button>
                </div>
            </form>
        </div>
    </div>
</div>


<?php
$data = mysqli_query($koneksi, "SELECT * FROM mahasiswa ORDER BY id DESC");
$no = 1;
while ($f = mysqli_fetch_assoc($data)) : ?>
    <div class="modal fade" id="modalEdit<?= $f['id'] ?>" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Ubah Data Mahasiswa</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="aksi_crud.php?action=update&id=<?= $f["id"] ?>" method="POST">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">NIM</label>
                            <input type="text" class="form-control" name="tnim" placeholder="Masukkan nim anda" value="<?= $f['nim'] ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" name="tnama" placeholder="Masukkan nama lengkap anda" value="<?= $f['nama'] ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Alamat</label>
                            <textarea class="form-control" name="talamat" rows="3"><?= $f['alamat'] ?></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Prodi</label>
                            <select name="tprodi" class="form-select">
                                <option value="S1 Informatika" <?= selected("S1 Informatika", $f["prodi"]) ?>>S1 Informatika</option>
                                <option value="S1 Manajemen" <?= selected("S1 Manajemen", $f["prodi"]) ?>>S1 Manajemen</option>
                                <option value="S1 Agama Kristen" <?= selected("S1 Agama Kristen", $f["prodi"]) ?>>S1 Agama Kristen</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="bsimpan">Simpan</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Keluar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php endwhile ?>