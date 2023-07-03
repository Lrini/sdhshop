<?php
session_start();
$nama = isset($_SESSION['name']) ? $_SESSION['name'] : '';
?>
<!DOCTYPE html>
<html>
<head>
  <title>Fitur CRUD</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    .container {
      margin: 20px auto;
      width: 80%;
    }

    .table th,
    .table td {
      padding: 8px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    .button-primary {
      background-color: #4CAF50;
      color: white;
      border: none;
      padding: 10px 20px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin: 4px 2px;
      cursor: pointer;
      border-radius: 4px;
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

  // Memproses inputan hapus kelas
  if (isset($_POST['hapus'])) {
    $idKelas = $_POST['id_kelas'];
    hapusKelas($idKelas);
  }
  ?>

  <div class="container">
    <!-- Form tambah kelas -->
    <h2>Tambah Kelas</h2>
    <form method="post">
      <div class="form-group">
        <label for="nama_kelas">Nama Kelas:</label>
        <input type="text" class="form-control" name="nama_kelas" required>
      </div>

      <div class="form-group">
        <label for="wali_kelas">Wali Kelas:</label>
        <input type="text" class="form-control" name="wali_kelas" required>
      </div>

      <button type="submit" name="tambah" class="btn btn-primary">Tambah</button>
    </form>

    <!-- Tabel daftar kelas -->
    <h2>Daftar Kelas</h2>
    <table class="table">
      <thead>
        <tr>
          <th>ID Kelas</th>
          <th>Nama Kelas</th>
          <th>Wali Kelas</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $dataKelas = getKelas();
        foreach ($dataKelas as $kelas) {
          echo "<tr>";
          echo "<td>" . $kelas['id_kelas'] . "</td>";
          echo "<td>" . $kelas['nama_kelas'] . "</td>";
          echo "<td>" . $kelas['walikelas'] . "</td>";
          echo "<td><button onclick=\"showModal('" . $kelas['id_kelas'] . "', '" . $kelas['nama_kelas'] . "', '" . $kelas['walikelas'] . "')\" class=\"btn btn-primary\">Update</button> <button onclick=\"confirmDelete('" . $kelas['id_kelas'] . "')\" class=\"btn btn-danger\">Delete</button></td>";
          echo "</tr>";
        }
        ?>
      </tbody>
    </table>

    <!-- Modal update kelas -->
    <div id="modalUpdate" class="modal">
      <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <h2>Update Kelas</h2>
        <form method="post">
          <input type="hidden" id="id_kelas" name="id_kelas" required>

          <div class="form-group">
            <label for="nama_kelas_update">Nama Kelas:</label>
            <input type="text" id="nama_kelas_update" class="form-control" name="nama_kelas" required>
          </div>

          <div class="form-group">
            <label for="wali_kelas_update">Wali Kelas:</label>
            <input type="text" id="wali_kelas_update" class="form-control" name="wali_kelas" required>
          </div>

          <button type="submit" name="update" class="btn btn-primary">Update</button>
        </form>
      </div>
    </div>

    <!-- Modal konfirmasi hapus -->
    <div id="modalDelete" class="modal">
      <div class="modal-content">
        <h2>Apakah Anda yakin menghapus kelas ini?</h2>
        <form method="post">
          <input type="hidden" id="id_kelas_delete" name="id_kelas" required>
          <button type="submit" name="hapus" class="btn btn-danger">Ya</button>
          <button type="button" onclick="closeModal()" class="btn btn-primary">Tidak</button>
        </form>
      </div>
    </div>
  </div>

  <script>
    // Fungsi untuk menampilkan modal update dengan data kelas
    function showModal(id, namaKelas, waliKelas) {
      document.getElementById("id_kelas").value = id;
      document.getElementById("nama_kelas_update").value = namaKelas;
      document.getElementById("wali_kelas_update").value = waliKelas;

      document.getElementById("modalUpdate").style.display = "block";
    }

    // Fungsi untuk menutup modal
    function closeModal() {
      document.getElementById("modalUpdate").style.display = "none";
      document.getElementById("modalDelete").style.display = "none";
    }

    // Fungsi untuk menampilkan modal konfirmasi hapus
    function confirmDelete(id) {
      document.getElementById("id_kelas_delete").value = id;

      document.getElementById("modalDelete").style.display = "block";
    }
  </script>
</body>

</html>
