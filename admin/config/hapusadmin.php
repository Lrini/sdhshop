<?php
 include "function.php";
 $id_user = $_GET ["id_user"];
if(hapusadmin ($id_user) > 0){
				 echo " 
			           <script>
			                document.location.href = '../form.php?r=sukses';
			            </script>";
			}else{
				 echo " 
			           <script>
			                document.location.href = '../form.php.php?r=gagal';
			            </script>";
			}
 ?>