<?php
include('../../koneksi.php');
if (isset($_POST['edit_id5'])) {
    $id = $_POST['edit_id5'];
    $data = mysqli_query($koneksi, "select * from celana where id_celana='$id'");
    while ($sql = mysqli_fetch_array($data)) : ?>
        <form role="form" action="config/bajuupdate.php" method="post" enctype="multipart/form-data">
            <div class="from-group">
                <img src="../data/<?php echo $sql['gambar']; ?>" width="350">
            </div>
        <?php endwhile; ?>
        </form>
    <?php
}
    ?>