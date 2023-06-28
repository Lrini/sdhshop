<?php
 include "function.php";
 $id_user = $_GET ["id_user"];
if(hapussma ($id_user) > 0){
				 echo " 
			           <script>
			                document.location.href = '../tingsma.php?r=sukses';
			            </script>";
			}else{
				 echo " 
			           <script>
			                document.location.href = '../tingsma.php.php?r=gagal';
			            </script>";
			}
 ?>