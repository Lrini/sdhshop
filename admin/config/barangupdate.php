<?php
 include "function.php";
 if(isset($_POST['simpan'])){
 	if(editbarang ($_POST) > 0){
 		 echo " 
           <script>
                document.location.href = '../tambahan.php?r=sukses';
            </script>";
 	}else{
 		 echo " 
           <script>
                document.location.href = '../tambahan.php?r=gagal';
            </script>";
 	}
 }
 ?>