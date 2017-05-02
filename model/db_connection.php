<?php
 $dsn = 'mysql:host=sql1.njit.edu;dbname=bs443';
 $username = 'bs443';
 $password = 'hUTiF2AN';
 try{
   $db = new PDO($dsn,$username,$password);
 }catch (PDOException $e){
   $error_message = $e->getMessage();
   echo $error_message;
   exit();
 }
?>
