<?php
   include("util.php");
   configSession();

   if(session_destroy()) {
      header("Location: index.php");
   }
?>
