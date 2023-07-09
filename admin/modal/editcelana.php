<?php
include('../../koneksi.php');
if (isset($_POST['edit_id3'])) {
    $id = $_POST['edit_id3'];
    $data = mysqli_query($koneksi, "select * from celana where id_celana='$id'");
    while ($sql = mysqli_fetch_array($data)) : ?>
        <form role="form" action="config/celanaupdate.php" method="post" enctype="multipart/form-data">
            <div class="from-group">
                <label>Id_Celana </label>
                <input type="text" class="form-control" name="id_celana" value="<?php echo $sql['id_celana'] ?>" required='required' disabled='disable'>
                <input type="hidden" name="id_celana" value="<?php echo $sql['id_celana'] ?>">
            </div>
            <div class="form-group">
                <label> Nama celana</label>
                <input type="text" class="form-control" name="nama_celana" value="<?php echo $sql['nama_celana'] ?>" placeholder="Nama celana" />
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