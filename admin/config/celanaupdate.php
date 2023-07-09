<?php
 include "function.php";
 if(isset($_POST['simpan'])){
 	if(editcelana ($_POST) > 0){
 		 echo " 
           <script>
                document.location.href = '../celana.php?r=sukses';
            </script>";
 	}else{
 		 echo " 
           <script>
                document.location.href = '../celana.php?r=gagal';
            </script>";
 	}
 }
 ?>