<?php
 include "function.php";
 if(isset($_POST['simpan'])){
 	if(editsmp ($_POST) > 0){
 		 echo " 
           <script>
                document.location.href = '../tingsmp.php?r=sukses';
            </script>";
 	}else{
 		 echo " 
           <script>
                document.location.href = '../tingsmp.php?r=gagal';
            </script>";
 	}
 }
 ?>