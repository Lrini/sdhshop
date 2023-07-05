<!DOCTYPE html>
<html>
<head>
  <title>Fitur CRUD</title>
    <link rel="stylesheet" href="assets/css/jquery.dataTables.css">
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

// Fungsi untuk menambahkan kelas ke database
function tambahKelas($namaKelas, $waliKelas)
{
  $conn = connect();

  $namaKelas = $conn->real_escape_string($namaKelas);
  $waliKelas = $conn->real_escape_string($waliKelas);

  $sql = "INSERT INTO kelas (nama_kelas, walikelas) VALUES ('$namaKelas', '$waliKelas')";

  if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Kelas berhasil ditambahkan.');</script>";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();
}

// Fungsi untuk menghapus kelas dari database
function hapusKelas($idKelas)
{
  $conn = connect();

  $idKelas = $conn->real_escape_string($idKelas);

  $sql = "DELETE FROM kelas WHERE id_kelas='$idKelas'";

  if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Kelas berhasil dihapus.');</script>";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();
}

// Memproses inputan tambah kelas
if (isset($_POST['tambah'])) {
  $namaKelas = $_POST['nama_kelas'];
  $waliKelas = $_POST['wali_kelas'];

  if ($namaKelas != '' && $waliKelas != '') {
    tambahKelas($namaKelas, $waliKelas);
  } else {
    echo "<script>alert('Harap isi semua field.');</script>";
  }
}

// Memproses inputan hapus kelas
if (isset($_POST['hapus'])) {
  $idKelas = $_POST['id_kelas'];

  hapusKelas($idKelas);
}

// Memproses inputan update kelas
if (isset($_POST['update'])) {
  $idKelas = $_POST['id_kelas'];
  $namaKelas = $_POST['nama_kelas'];
  $waliKelas = $_POST['wali_kelas'];

  if ($namaKelas != '' && $waliKelas != '') {
    updateKelas($idKelas, $namaKelas, $waliKelas);
  } else {
    echo "<script>alert('Harap isi semua field.');</script>";
  }
}

// Fungsi untuk mengupdate kelas dalam database
function updateKelas($idKelas, $namaKelas, $waliKelas)
{
  $conn = connect();

  $idKelas = $conn->real_escape_string($idKelas);
  $namaKelas = $conn->real_escape_string($namaKelas);
  $waliKelas = $conn->real_escape_string($waliKelas);

  $sql = "UPDATE kelas SET nama_kelas='$namaKelas', walikelas='$waliKelas' WHERE id_kelas='$idKelas'";

  if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Kelas berhasil diupdate.');</script>";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();
}
?>

<div class="container">
    <h2>Daftar Kelas</h2>

    <table>
        <tr>
            <th>ID Kelas</th>
            <th>Nama Kelas</th>
            <th>Wali Kelas</th>
            <th>Aksi</th>
        </tr>
        <?php
        $kelas = getKelas();

        foreach ($kelas as $row) {
          echo "<tr>";
          echo "<td>" . $row['id_kelas'] . "</td>";
          echo "<td>" . $row['nama_kelas'] . "</td>";
          echo "<td>" . $row['walikelas'] . "</td>";
          echo "<td>";
          echo "<button class='btn btn-primary' onclick=\"showModal(" . $row['id_kelas'] . ",'" . $row['nama_kelas'] . "','" . $row['walikelas'] . "')\">Edit</button>";
          echo "<button class='btn btn-danger' onclick=\"confirmDelete(" . $row['id_kelas'] . ")\">Hapus</button>";
          echo "</td>";
          echo "</tr>";
        }
        ?>
    </table>

    <br>

    <button class="btn" onclick="showModal(0,'','')">Tambah Kelas</button>
</div>

<div id="myModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <h2 id="modalTitle">Tambah Kelas</h2>
        <form method="post" action="">
            <input type="hidden" id="id_kelas" name="id_kelas">
            <label for="nama_kelas">Nama Kelas:</label><br>
            <input type="text" id="nama_kelas" name="nama_kelas"><br><br>
            <label for="wali_kelas">Wali Kelas:</label><br>
            <input type="text" id="wali_kelas" name="wali_kelas"><br><br>
            <input type="submit" class="btn btn-primary" name="tambah" value="Tambah">
            <input type="submit" class="btn btn-primary" name="update" value="Update">
        </form>
    </div>
</div>

<script>
    var modal = document.getElementById("myModal");
    var span = document.getElementsByClassName("close")[0];

    function showModal(idKelas, namaKelas, waliKelas) {
        document.getElementById("modalTitle").innerHTML = idKelas ? "Edit Kelas" : "Tambah Kelas";
        document.getElementById("id_kelas").value = idKelas;
        document.getElementById("nama_kelas").value = namaKelas;
        document.getElementById("wali_kelas").value = waliKelas;
        modal.style.display = "block";
    }

    function closeModal() {
        modal.style.display = "none";
    }

    function confirmDelete(idKelas) {
        if (confirm("Apakah Anda yakin ingin menghapus kelas ini?")) {
            document.getElementById("id_kelas").value = idKelas;
            document.getElementById("hapusForm").submit();
        }
    }
</script>
</body>
</html>
