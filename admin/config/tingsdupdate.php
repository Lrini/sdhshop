<?php
 include "function.php";
 if(isset($_POST['simpan'])){
 	if(editsd ($_POST) > 0){
 		 echo " 
           <script>
                document.location.href = '../tingsd.php?r=sukses';
            </script>";
 	}else{
 		 echo " 
           <script>
                document.location.href = '../tingsd.php?r=gagal';
            </script>";
 	}
 }
 ?>