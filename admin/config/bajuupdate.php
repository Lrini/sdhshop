<?php
 include "function.php";
 if(isset($_POST['simpan'])){
 	if(editbaju ($_POST) > 0){
 		 echo " 
           <script>
                document.location.href = '../baju.php?r=sukses';
            </script>";
 	}else{
 		 echo " 
           <script>
                document.location.href = '../baju.php?r=gagal';
            </script>";
 	}
 }
 ?>