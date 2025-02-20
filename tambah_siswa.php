<?php
include "koneksi.php";

if(isset($_POST['submit'])) {
    $nis = $_POST['nis'];
    $nama = $_POST['nama_siswa'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $id_kelas = $_POST['id_kelas'];
    $id_wali = $_POST['id_wali'];
    
    $query = "INSERT INTO siswa (nis, nama_siswa, jenis_kelamin, tempat_lahir, tanggal_lahir, id_kelas, id_wali) 
              VALUES ('$nis', '$nama', '$jenis_kelamin', '$tempat_lahir', '$tanggal_lahir', '$id_kelas', '$id_wali')";
    mysqli_query($koneksi, $query);
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2>Tambah Siswa</h2>

        <?php if (isset($error)) : ?>
            <div class="alert alert-danger">
                <?php echo $error; ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($success)) : ?>
            <div class="alert alert-success">
                <?php echo $success; ?>
            </div>
        <?php endif; ?>

        <form method="POST" onsubmit="return validateForm()">

            <div class="mb-3">
                    <label for="nis" class="form-label">NIS</label>
                    <input type="text" name="nis" class="form-control" id="nis" required>
            </div>
                <div class="mb-3">
                    <label for="nama_siswa" class="form-label">Nama Siswa</label>
                    <input type="text" name="nama_siswa" class="form-control" id="nama_siswa" required>
                </div>

                <div class="mb-3">
                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-control" id="jenis_kelamin" required>
                        <option value="">-- Jenis Kelamin --</option>
                        <option value="L">Laki Laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir" required>
                </div>

                <div class="mb-3">
                    <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" class="form-control" id="tanggal_lahir" required>
                </div>

                <div class="mb-3">
                    <label for="id_kelas" class="form-label">Kelas</label>
                    <select name="id_kelas" class="form-control" id="id_kelas" required>
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
                    <label for="id_wali" class="form-label">Wali Murid</label>
                    <select type="text" name="id_wali" class="form-control" id="id_wali" required>
                        <option value="">-- Nama Wali Murid --</option>
                        <?php
                        $wali_query = mysqli_query($koneksi, "SELECT * FROM wali_murid");
                        while ($wali = mysqli_fetch_assoc($wali_query)) {
                            echo "<option value='{$wali['id_wali']}'>{$wali['nama_wali']}</option>";
                        }
                        ?>
                    </select>
                </div>

                <button type="submit" name="submit" class="btn btn-success">Tambah Kelas</button>
                <a href="kelas.php" class="btn btn-primary">Kembali</a>
            </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>