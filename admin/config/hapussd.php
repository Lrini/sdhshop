<?php
 include "function.php";
 $id_user = $_GET ["id_user"];
if(hapussd ($id_user) > 0){
				 echo " 
			           <script>
			                document.location.href = '../tingsd.php?r=sukses';
			            </script>";
			}else{
				 echo " 
			           <script>
			                document.location.href = '../tingsd.php.php?r=gagal';
			            </script>";
			}
 ?>