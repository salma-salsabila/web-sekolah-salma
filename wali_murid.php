<?php
include 'koneksi.php';

// Initialize search query
$search = isset($_GET['search']) ? $_GET['search'] : '';

// Build the search query if there's a search term
$search_query = "";
if ($search) {
    $search_query = "WHERE nama_wali LIKE '%$search%' OR kontal LIKE '%$search%'";
}

// Define pagination variables
$limit = 10; // Number of records per page
$start = isset($_GET['start']) ? $_GET['start'] : 0;

// Ambil data wali murid
$query = "SELECT * FROM wali_murid $search_query LIMIT $start, $limit";
$result = mysqli_query($koneksi, $query);

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Wali Murid</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-4">
        <h2 class="mb-3">Data Wali Murid</h2>
        <div class="d-flex justify-content-between mb-3">
            <a href="index.php" class="btn btn-primary">Kembali ke Data Siswa</a>
            <form method="GET" class="d-flex">
                <input type="text" name="search" class="form-control me-2" placeholder="Cari wali murid..." value="<?php echo $search; ?>">
                <button type="submit" class="btn btn-succes">Cari</button>
            </form>
            <a href="tambah_wali.php" class="btn btn-succes">Tambah Wali Murid</a>
        </div>
        <table class="table table-boardered">
            <thead class="table-dark">
                <tr>
                    <th>Nama Wali</th>
                    <th>No. Telpon</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                    <tr>
                        <td><?php echo $row['nama_wali']; ?></td>
                        <td><?php echo $row['kontak']; ?></td>
                        <td>
                            <a href="edit_wali.php?id=<?php echo $row['id_wali']; ?>" class="btn btn-warning btn sm">Edit</a>
                            <a href="hapus_wali.php?id=<?php echo $row['id_siswa']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?');">Hapus</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <nav>
            <ul class=""></ul>
        </nav>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>