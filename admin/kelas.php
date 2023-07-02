<?php
session_start();
$nama = isset($_SESSION['name']) ? $_SESSION['name'] : '';
?>

<!DOCTYPE html>
<html>

<head>
    <?php include "public/header.php"; ?>

    <!-- Halaman untuk asset CSS pada halaman -->
    <meta charset="utf-8" />
    <!-- Datatables CSS -->
    <link rel="stylesheet" href="assets/css/jquery.dataTables.css">
    <style>
        /* ... gaya-gaya CSS Anda ... */
    </style>
</head>

<body>
    <?php include "public/akun.php"; ?>
    <?php
    include "../koneksi.php";

    function getDataKelas()
    {
        global $koneksi;
        $sql = "SELECT * FROM kelas";
        $result = mysqli_query($koneksi, $sql);
        return $result;
    }

    function getKelasById($id)
    {
        global $koneksi;
        $sql = "SELECT * FROM kelas WHERE id_kelas='$id'";
        $result = mysqli_query($koneksi, $sql);
        $kelas = mysqli_fetch_assoc($result);
        return $kelas;
    }

    function saveKelas($namaKelas, $waliKelas)
    {
        global $koneksi;
        $sql = "INSERT INTO kelas (nama_kelas, walikelas) VALUES ('$namaKelas', '$waliKelas')";
        if (mysqli_query($koneksi, $sql)) {
            return true;
        } else {
            return false;
        }
    }

    function updateKelas($id, $namaKelas, $waliKelas)
    {
        global $koneksi;
        $sql = "UPDATE kelas SET nama_kelas='$namaKelas', walikelas='$waliKelas' WHERE id_kelas='$id'";
        if (mysqli_query($koneksi, $sql)) {
            return true;
        } else {
            return false;
        }
    }

    function deleteKelas($id)
    {
        global $koneksi;
        $sql = "DELETE FROM kelas WHERE id_kelas='$id'";
        if (mysqli_query($koneksi, $sql)) {
            return true;
        } else {
            return false;
        }
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['create'])) {
        $namaKelas = $_POST['nama_kelas'];
        $waliKelas = $_POST['wali_kelas'];

        if (saveKelas($namaKelas, $waliKelas)) {
            echo "Kelas berhasil ditambahkan!<br>";
            echo "Nama Kelas: " . $namaKelas . "<br>";
            echo "Wali Kelas: " . $waliKelas . "<br><br>";
        } else {
            echo "Error: Gagal menambahkan kelas.<br>";
        }
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
        $kelasId = $_POST['kelas_id'];
        $namaKelas = $_POST['nama_kelas'];
        $waliKelas = $_POST['wali_kelas'];

        if (updateKelas($kelasId, $namaKelas, $waliKelas)) {
            echo "Kelas berhasil diperbarui!<br>";
            echo "ID Kelas: " . $kelasId . "<br>";
            echo "Nama Kelas: " . $namaKelas . "<br>";
            echo "Wali Kelas: " . $waliKelas . "<br><br>";
        } else {
            echo "Error: Gagal memperbarui kelas.<br>";
        }
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete'])) {
        $kelasId = $_POST['kelas_id'];

        if (deleteKelas($kelasId)) {
            echo "Kelas berhasil dihapus!<br>";
            echo "ID Kelas: " . $kelasId . "<br><br>";
        } else {
            echo "Error: Gagal menghapus kelas.<br>";
        }
    }

    ?>

    <div class="container">
        <h2>Data Kelas</h2>
        <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambahKelasModal">
            Tambah Kelas
        </button>

        <table id="kelasTable" class="display">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Kelas</th>
                    <th>Wali Kelas</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $kelasResult = getDataKelas();
                while ($kelas = mysqli_fetch_assoc($kelasResult)) {
                    echo "<tr>";
                    echo "<td>" . $kelas['id_kelas'] . "</td>";
                    echo "<td>" . $kelas['nama_kelas'] . "</td>";
                    echo "<td>" . $kelas['walikelas'] . "</td>";
                    echo "<td>";
                    echo "<button type='button' class='btn btn-info btn-sm' data-toggle='modal' data-target='#editKelasModal' data-id='" . $kelas['id_kelas'] . "' data-nama='" . $kelas['nama_kelas'] . "' data-wali='" . $kelas['walikelas'] . "'>Edit</button> ";
                    echo "<button type='button' class='btn btn-danger btn-sm' data-toggle='modal' data-target='#deleteKelasModal' data-id='" . $kelas['id_kelas'] . "'>Hapus</button>";
                    echo "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Modal Tambah Kelas -->
    <div class="modal fade" id="tambahKelasModal" tabindex="-1" role="dialog" aria-labelledby="tambahKelasModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahKelasModalLabel">Tambah Kelas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama_kelas">Nama Kelas</label>
                            <input type="text" class="form-control" id="nama_kelas" name="nama_kelas" required>
                        </div>
                        <div class="form-group">
                            <label for="wali_kelas">Wali Kelas</label>
                            <input type="text" class="form-control" id="wali_kelas" name="wali_kelas" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary" name="create">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Edit Kelas -->
    <div class="modal fade" id="editKelasModal" tabindex="-1" role="dialog" aria-labelledby="editKelasModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editKelasModalLabel">Edit Kelas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="kelas_id">ID Kelas</label>
                            <input type="text" class="form-control" id="kelas_id" name="kelas_id" readonly>
                        </div>
                        <div class="form-group">
                            <label for="nama_kelas">Nama Kelas</label>
                            <input type="text" class="form-control" id="nama_kelas" name="nama_kelas" required>
                        </div>
                        <div class="form-group">
                            <label for="wali_kelas">Wali Kelas</label>
                            <input type="text" class="form-control" id="wali_kelas" name="wali_kelas" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary" name="update">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Hapus Kelas -->
    <div class="modal fade" id="deleteKelasModal" tabindex="-1" role="dialog" aria-labelledby="deleteKelasModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteKelasModalLabel">Hapus Kelas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" class="form-control" id="kelas_id" name="kelas_id" readonly>
                        </div>
                        <p>Apakah Anda yakin ingin menghapus kelas ini?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-danger" name="delete">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php include "public/footer.php"; ?>

    <!-- Halaman untuk asset JS pada halaman -->
    <script src="assets/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#kelasTable').DataTable();
        });

        $('#editKelasModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var id = button.data('id');
            var nama = button.data('nama');
            var wali = button.data('wali');

            var modal = $(this);
            modal.find('#kelas_id').val(id);
            modal.find('#nama_kelas').val(nama);
            modal.find('#wali_kelas').val(wali);
        });

        $('#deleteKelasModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var id = button.data('id');

            var modal = $(this);
            modal.find('#kelas_id').val(id);
        });
    </script>
</body>

</html>
