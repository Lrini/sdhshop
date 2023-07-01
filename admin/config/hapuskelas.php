<?php
 include "function.php";
 $id_user = $_GET ["id_user"];
if(hapuskelas ($id_user) > 0){
				 echo " 
			           <script>
			                document.location.href = '../kelas.php?r=sukses';
			            </script>";
			}else{
				 echo " 
			           <script>
			                document.location.href = '../kelas.php.php?r=gagal';
			            </script>";
			}
 ?>