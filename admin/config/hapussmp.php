<?php
 include "function.php";
 $id_user = $_GET ["id_user"];
if(hapussd ($id_user) > 0){
				 echo " 
			           <script>
			                document.location.href = '../tingsmp.php?r=sukses';
			            </script>";
			}else{
				 echo " 
			           <script>
			                document.location.href = '../tingsmp.php.php?r=gagal';
			            </script>";
			}
 ?>