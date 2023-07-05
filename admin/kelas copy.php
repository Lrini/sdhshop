<!DOCTYPE html>
<html>
<head>
    <title>Fitur CRUD</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 960px;
            margin: 20px auto;
            padding: 20px;
            background-color: #f5f5f5;
            border-radius: 5px;
        }

        h2 {
            margin-top: 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            font-size: 14px;
            text-align: center;
            text-decoration: none;
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn-primary {
            background-color: #007bff;
        }

        .btn-danger {
            background-color: #dc3545;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 500px;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
<?php
// Fungsi untuk membuat koneksi ke database
function connect()
{
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "sdhshop";

    $conn = new mysqli($host, $username, $password, $database);

    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    return $conn;
}

// Fungsi untuk mengambil data kelas dari database
function getKelas()
{
    $conn = connect();

    $sql = "SELECT * FROM kelas";
    $result = $conn->query($sql);

    $kelas = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $kelas[] = $row;
        }
    }

    $conn->close();

    return $kelas;
}

// Fungsi untuk menambah kelas ke database
function tambahKelas($nama, $wali)
{
    $conn = connect();

    $nama = $conn->real_escape_string($nama);
    $wali = $conn->real_escape_string($wali);

    $sql = "INSERT INTO kelas (nama_kelas, walikelas) VALUES ('$nama', '$wali')";

    if ($conn->query($sql) === TRUE) {
        echo '<script>alert("Kelas berhasil ditambahkan.");window.location.href = "index.php";</script>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}

// Fungsi untuk mengedit kelas dalam database
function editKelas($id, $nama, $wali)
{
    $conn = connect();

    $id = $conn->real_escape_string($id);
    $nama = $conn->real_escape_string($nama);
    $wali = $conn->real_escape_string($wali);

    $sql = "UPDATE kelas SET nama_kelas='$nama', walikelas='$wali' WHERE id_kelas='$id'";

    if ($conn->query($sql) === TRUE) {
        echo '<script>alert("Kelas berhasil diubah.");window.location.href = "index.php";</script>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}

// Fungsi untuk menghapus kelas dari database
function hapusKelas($id)
{
    $conn = connect();

    $id = $conn->real_escape_string($id);

    $sql = "DELETE FROM kelas WHERE id_kelas='$id'";

    if ($conn->query($sql) === TRUE) {
        echo '<script>alert("Kelas berhasil dihapus.");window.location.href = "index.php";</script>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}

// Cek apakah ada data POST dari form tambah/edit kelas
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['tambah'])) {
        $nama = $_POST['nama_kelas'];
        $wali = $_POST['walikelas'];

        tambahKelas($nama, $wali);
    } elseif (isset($_POST['edit'])) {
        $id = $_POST['id_kelas'];
        $nama = $_POST['nama_kelas'];
        $wali = $_POST['walikelas'];

        editKelas($id, $nama, $wali);
    }
}

// Cek apakah ada data GET dari tombol hapus
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];

    hapusKelas($id);
}

$kelas = getKelas();
?>

<div class="container">
    <h2>Data Kelas</h2>
    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Nama Kelas</th>
            <th>Wali Kelas</th>
            <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($kelas as $kelas) : ?>
            <tr>
                <td><?php echo $kelas['id_kelas']; ?></td>
                <td><?php echo $kelas['nama_kelas']; ?></td>
                <td><?php echo $kelas['walikelas']; ?></td>
                <td>
                    <button class="btn btn-primary" onclick="editKelas('<?php echo $kelas['id_kelas']; ?>',
                        '<?php echo $kelas['nama_kelas']; ?>', '<?php echo $kelas['walikelas']; ?>')">Edit</button>
                    <button class="btn btn-danger" onclick="hapusKelas('<?php echo $kelas['id_kelas']; ?>')">Hapus</button>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <button class="btn" onclick="tambahKelas()">Tambah Kelas</button>
</div>

<div id="myModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2 id="modal-title"></h2>
        <form id="modal-form" method="post">
            <input type="hidden" name="id_kelas" id="modal-id">
            <label for="nama_kelas">Nama Kelas:</label>
            <input type="text" name="nama_kelas" id="modal-nama" required>
            <label for="walikelas">Wali Kelas:</label>
            <input type="text" name="walikelas" id="modal-wali" required>
            <button class="btn" type="submit" name="tambah" id="modal-submit"></button>
        </form>
    </div>
</div>

<script>
    var modal = document.getElementById("myModal");
    var span = document.getElementsByClassName("close")[0];
    var form = document.getElementById("modal-form");
    var title = document.getElementById("modal-title");
    var submitBtn = document.getElementById("modal-submit");

    function tambahKelas() {
        form.action = "index.php";
        title.innerHTML = "Tambah Kelas";
        submitBtn.innerHTML = "Tambah";
        modal.style.display = "block";
    }

    function editKelas(id, nama, wali) {
        form.action = "index.php";
        title.innerHTML = "Edit Kelas";
        submitBtn.innerHTML = "Simpan";
        document.getElementById("modal-id").value = id;
        document.getElementById("modal-nama").value = nama;
        document.getElementById("modal-wali").value = wali;
        modal.style.display = "block";
    }

    function hapusKelas(id) {
        if (confirm("Apakah Anda yakin ingin menghapus kelas ini?")) {
            window.location.href = "index.php?hapus=" + id;
        }
    }

    span.onclick = function () {
        modal.style.display = "none";
    }

    window.onclick = function (event) {
        if (event.target === modal) {
            modal.style.display = "none";
        }
    }
</script>
</body>
</html>
