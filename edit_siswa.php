<?php
include 'koneksi.php';

$id = $_GET['id'];
$query = "SELECT * FROM siswa WHERE id_siswa=$id";
$result = mysqli_query($koneksi, $query);
$row = mysqli_fetch_assoc($result);

if(isset($_POST['update'])) {

    $nis = $_POST['nis'];
    $nama = $_POST['nama_siswa'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $id_kelas = $_POST['id_kelas'];
    $id_wali = $_POST['id_wali'];

    $query = "UPDATE siswa SET 
              nis='$nis',
              nama_siswa='$nama',
              jenis_kelamin='$jenis_kelamin',
              tempat_lahir='$tempat_lahir',
              tanggal_lahir='$tanggal_lahir',
              id_kelas='$id_kelas',
              id_wali='$id_wali',
              WHERE id_siswa=$id";
    mysqli_query($koneksi, $query);
    header('Location: index.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2>Tambah Siswa</h2>

        <form method="POST" onsubmit="return validateForm()">
            <div class="mb-3">
                <label for="nama_siswa" class="form-label">Nama Siswa</label>
                <input type="text" name="nama_siswa" class="form-control" value="<?php echo $row['nama_siswa']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                <select name="jenis_kelamin" class="form-control" value="<?php echo $row['jenis_kelamin']; ?>" required>
                    <option value="">-- Jenis Kelamin --</option>
                    <option value="L">L</option>
                    <option value="P">P</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                <input type="text" name="tempat_lahir" class="form-control" value="<?php echo $row['tempat_lahir']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" class="form-control" value="<?php echo $row['tanggal_lahir']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="id_kelas" class="form-label">Nama Kelas</label>
                <select name="id_kelas" class="form-control" value="<?php echo $row['id_kelas']; ?>" required>
                    <option value="">-- Pilih Kelas --</option>
                    <?php
                        $kelas_query = mysqli_query($koneksi, "SELECT * FROM kelas");
                        while ($kelas = mysqli_fetch_assoc($kelas_query)) {
                            echo "<option value='{$kelas['id_kelas']}'>{$kelas['nama_kelas']}</option>";
                        }
                        ?>
                    </select>
            </div>
            <div class="mb-3">
                <label for="id_wali" class="form-label">Nama Wali</label>
                <select name="id_wali" class="form-control" value="<?php echo $row['id_wali']; ?>" required>
                    <option value="">-- Pilih Wali --</option>
                    <?php
                        $wali_query = mysqli_query($koneksi, "SELECT * FROM wali_murid");
                        while ($wali_murid = mysqli_fetch_assoc($wali_query)) {
                            echo "<option value='{$wali_murid['id_wali']}'>{$wali_murid['nama_wali']}</option>";
                        }
                        ?>
                    </select>
            </div>

            <button type="update" name="update" class="btn btn-primary">Update</button>
            <a href="index.php" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</body>
</html>