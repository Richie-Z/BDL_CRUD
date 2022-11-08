<?php

include_once __DIR__ . "/koneksi.php";

$action = $_GET["action"];
$nim = $_POST["tnim"];
$nama = $_POST["tnama"];
$alamat = $_POST["talamat"];
$prodi = $_POST["tprodi"];

function runQuery($query)
{
    global $koneksi;
    $run = mysqli_query($koneksi, $query);

    $peringatan  = $run ? "Berhasil" : "Gagal";

    echo <<< html
        <script>
            alert("{$peringatan}");
            document.location= "index.php";
        </script>
    html;
}

if ($action == "tambah") {
    if (!isset($_POST["bsimpan"]))
        return;
    $query = "INSERT INTO mahasiswa(nim, nama, alamat, prodi) VALUES('$nim', '$nama', '$alamat', '$prodi')";
    runQuery($query);
} elseif ($action == "hapus") {
    $id = $_GET["id"];
    $query = "DELETE from mahasiswa where id=$id";
    runQuery($query);
} elseif ($action == "update") {
    if (!isset($_POST["bsimpan"]))
        return;
    $id = $_GET["id"];
    $query = "UPDATE mahasiswa set nim = '$nim', nama ='$nama', alamat='$alamat',prodi= '$prodi' where id=$id";
    runQuery($query);
}
