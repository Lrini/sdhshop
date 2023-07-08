<?php
include('../../koneksi.php');
if (isset($_POST['edit_id5'])) {
    $id = $_POST['edit_id5'];
    $data = mysqli_query($koneksi, "select * from user where id_user='$id'");
    while ($sql = mysqli_fetch_array($data)) : ?>
        <form role="form" action="config/tingsmpupdate.php" method="post" enctype="multipart/form-data">
            <div class="from-group">
                <label>Id_user </label>
                <input type="text" class="form-control" name="id_user" value="<?php echo $sql['id_user'] ?>" required='required' disabled='disable'>
                <input type="hidden" name="id_user" value="<?php echo $sql['id_user'] ?>">
            </div>
            <div class="form-group">
                <label> Nama siswa</label>
                <input type="text" class="form-control" name="nama" value="<?php echo $sql['nama'] ?>" placeholder="Nama" />
            </div>
            <div class="form-group">
                <label> No handphone</label>
                <input type="text" class="form-control" name="no_hp" value="<?php echo $sql['no_hp'] ?>" placeholder="No handphone" />
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <input type="text" class="form-control" name="alamat" value="<?php echo $sql['alamat'] ?>" placeholder="Alamat" />
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="text" class="form-control" name="email" value="<?php echo $sql['email'] ?>" placeholder="Email" />
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="text" class="form-control" name="konfirm" value="<?php echo $sql['konfirm'] ?>" placeholder="Pasword" />
            </div>
            <div class="form-group">
            <label>Password</label>
                <select name="status" id="status" type="text" class="form-control">
                    <option>Status </option>
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