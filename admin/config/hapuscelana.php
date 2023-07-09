<?php
 include "function.php";
 $id_celana = $_GET ["id_celana"];
if(hapuscelana ($id_celana) > 0){
				 echo " 
			           <script>
			                document.location.href = '../celana.php?r=sukses';
			            </script>";
			}else{
				 echo " 
			           <script>
			                document.location.href = '../celana.php.php?r=gagal';
			            </script>";
			}
 ?>