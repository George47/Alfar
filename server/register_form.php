<?php
   include("../util.php");
   configSession();

   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form

      $username = mysqli_real_escape_string($db,$_POST['username']);
      $password = mysqli_real_escape_string($db,$_POST['password1']);
      // $cpw = mysqli_real_escape_string($db,$_POST['cpassword']);

      $publishdate = date('Y-n-j H:i:s');
      $sql = "INSERT INTO accounts (username, password, regisDate) VALUES ('$username', '$password', '".$publishdate."')";
      $result = mysqli_query($db,$sql);

      if($result){
         $_SESSION['login_user'] = $username;
         $_SESSION['login_id'] = mysqli_insert_id($db);
         echo '{"status":"success", "redirect" : "index.php"}';
      } else {
         echo '{"status":"error", "errorMsg" : "Username taken. Please try another one"}';
      }
   }
?>
