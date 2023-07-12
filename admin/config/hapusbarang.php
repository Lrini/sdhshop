<?php
 include "function.php";
 $id_barang = $_GET ["id_barang"];
if(hapusbarang ($id_barang) > 0){
				 echo " 
			           <script>
			                document.location.href = '../tambahan.php?r=sukses';
			            </script>";
			}else{
				 echo " 
			           <script>
			                document.location.href = '../tambahan.php.php?r=gagal';
			            </script>";
			}
 ?>