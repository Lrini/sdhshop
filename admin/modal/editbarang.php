<?php
include('../../koneksi.php');
if (isset($_POST['edit_id3'])) {
    $id = $_POST['edit_id3'];
    $data = mysqli_query($koneksi, "select * from barang where id_barang='$id'");
    while ($sql = mysqli_fetch_array($data)) : ?>
        <form role="form" action="config/barangupdate.php" method="post" enctype="multipart/form-data">
            <div class="from-group">
                <label>Id barang </label>
                <input type="text" class="form-control" name="id_barang" value="<?php echo $sql['id_barang'] ?>" required='required' disabled='disable'>
                <input type="hidden" name="id_barang" value="<?php echo $sql['id_barang'] ?>">
            </div>
            <div class="form-group">
                <label> Nama barang</label>
                <input type="text" class="form-control" name="nama_barang" value="<?php echo $sql['nama_brng'] ?>" placeholder="Nama Barang" />
            </div>
            <div class="form-group">
                <label>Jumlah barang</label>
                <input type="text" class="form-control" name="jmlh" value="<?php echo $sql['jmlh'] ?>" placeholder="Jumlah barang" />
            </div>
            <?php
            $query = mysqli_query($koneksi, "select * from kelas")
            ?>
            <div class="form-group">
                <label>Kelas</label>
                <select name="id_kelas" id="id_kelas" class="form-control" type="text">
                    <option>Kelas</option>
                    <?php
                    while ($coba = mysqli_fetch_assoc($query)) {
                    ?>
                        <option value="<?php echo $coba['id_kelas'] ?>"><?php echo $coba['id_kelas'] ?>|<?php echo $coba['nama_kelas'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label>Status</label>
                <select name="status" id="status" class="form-control" type="text">
                    <option>Status</option>
                    <option value="aktif">Aktif</option>
                    <option value="pasif">Pasif</option>

                </select>
            </div>
            <button type="submit" name="simpan" value="simpan" class="btn btn-primary">Update</button>

        <?php endwhile; ?>
        </form>
    <?php
}
    ?>