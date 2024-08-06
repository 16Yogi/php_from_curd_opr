<?php
   $connection = mysqli_connect("localhost","root","","interview");
   if($connection){
        echo "Connection successfully...!";
   }else{
        echo "Connection failed...!";
   }

?>