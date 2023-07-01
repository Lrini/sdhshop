<?php
include('../../koneksi.php');
if (isset($_POST['edit_id5'])) {
    $id = $_POST['edit_id5'];
    $data = mysqli_query($koneksi, "select * from kelas where id_kelas='$id'");
    while ($sql = mysqli_fetch_array($data)) : ?>
        <form role="form" action="config/kelasupdate.php" method="post" enctype="multipart/form-data">
            <div class="from-group">
                <label>Id_kelas </label>
                <input type="text" class="form-control" name="id_kelas" value="<?php echo $sql['id_kelas'] ?>" required='required' disabled='disable'>
                <input type="hidden" name="id_kelas" value="<?php echo $sql['id_kelas'] ?>">
            </div>
            <div class="form-group">
                <label> Nama kelas</label>
                <input type="text" class="form-control" name="nama_kelas" value="<?php echo $sql['nama_kelas'] ?>" placeholder="Nama Kelas" />
            </div>
            <div class="form-group">
                <label>Walikelas</label>
                <input type="text" class="form-control" name="walikelas" value="<?php echo $sql['walikelas'] ?>" placeholder="walikelas" />
            </div>
            <div class="form-group">
                <label>Tingkat</label>
                <select name="status" id="status" class="form-control" type="text">
                    <option>Tingkat</option>
                    <option value="SD">SD</option>
                    <option value="SMP">SMP</option>
                    <option value="SMA">SMA</option>
                </select>
            </div>
            <button type="submit" name="simpan" value="simpan" class="btn btn-primary">Update</button>

        <?php endwhile; ?>
        </form>
    <?php
}
    ?>