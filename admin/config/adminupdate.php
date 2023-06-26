<?php
 include "function.php";
 if(isset($_POST['simpan'])){
 	if(editadmin ($_POST) > 0){
 		 echo " 
           <script>
                document.location.href = '../admin.php?r=sukses';
            </script>";
 	}else{
 		 echo " 
           <script>
                document.location.href = '../admin.php?r=gagal';
            </script>";
 	}
 }
 ?>