<?php
 include "function.php";
 if(isset($_POST['simpan'])){
 	if(editsma ($_POST) > 0){
 		 echo " 
           <script>
                document.location.href = '../tingsma.php?r=sukses';
            </script>";
 	}else{
 		 echo " 
           <script>
                document.location.href = '../tingsma.php?r=gagal';
            </script>";
 	}
 }
 ?>