<?php
  include("../util.php");
  configSession();

  if($_SERVER["REQUEST_METHOD"] == "POST") {
    $sql = "INSERT INTO usr_likes (username, houseID) VALUES ('".$_SESSION['login_user']."', '0')"
    $query = $db->prepare($sql);
    $query->execute();
  }
  echo '{"status":"success", "redirect" : "../index.php"}';
?>
