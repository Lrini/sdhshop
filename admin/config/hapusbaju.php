<?php
 include "function.php";
 $id_baju = $_GET ["id_baju"];
if(hapusbaju ($id_baju) > 0){
				 echo " 
			           <script>
			                document.location.href = '../baju.php?r=sukses';
			            </script>";
			}else{
				 echo " 
			           <script>
			                document.location.href = '../baju.php.php?r=gagal';
			            </script>";
			}
 ?>