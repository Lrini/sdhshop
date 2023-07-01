<?php
 include "function.php";
 if(isset($_POST['simpan'])){
 	if(editkelas ($_POST) > 0){
 		 echo " 
           <script>
                document.location.href = '../kelas.php?r=sukses';
            </script>";
 	}else{
 		 echo " 
           <script>
                document.location.href = '../kelas.php?r=gagal';
            </script>";
 	}
 }
 ?>