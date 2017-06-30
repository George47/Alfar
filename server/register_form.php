<?php
   include("../util.php");
   configSession();
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form

      $username = mysqli_real_escape_string($db,$_POST['username']);
      $password = mysqli_real_escape_string($db,$_POST['password1']);
      // $cpw = mysqli_real_escape_string($db,$_POST['cpassword']);

      $sql = "INSERT INTO accounts (username, password) VALUES ('$username', '$password')";
      $result = mysqli_query($db,$sql);

      if($result){
         $_SESSION['login_user'] = $username;
         echo '{"status":"success", "redirect" : "index.php"}';
      } else {
         echo '{"status":"error", "errorMsg" : "Username taken. Please try another one"}';
      }
   }
?>
