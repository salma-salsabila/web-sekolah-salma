<?php
include "koneksi.php";

if(isset($_POST['submit'])) {
    $nama = $_POST['nama_wali'];
    $kontak = $_POST['kontak'];
    
    $query = "INSERT INTO wali_murid (nama_wali, kontak) 
              VALUES ('$nama', '$kontak')";
    mysqli_query($koneksi, $query);
    header('Location: wali_murid.php');
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Wali Murid</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>[]
<body>
    <div class="container mt-4">
        <h2>Tambah Wali Murid</h2>

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
                <label for="nama_wali" class="form-label">Nama Wali</label>
                <input type="text" name="nama_wali" class="form-control" id="nama_wali" required>
            </div>

            <div class="mb-3">
                <label for="kontak" class="form-label">Kontak</label>
                <input type="text" name="kontak" class="form-control" id="kontak" required>
            </div>

            <button type="submit" name="submit" class="btn btn-success">Tambah Kelas</button>
            <a href="kelas.php" class="btn btn-primary">Kembali</a>
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>