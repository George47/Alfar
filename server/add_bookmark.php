<?php
  include("../util.php");
  configSession();
  $houseID = $_GET['id'];
  $currentUser = $_SESSION['login_user'];
  $currentID = $_SESSION['login_id'];
  $sql = "INSERT INTO usr_likes (user_id, house_ID) VALUES ('".$currentID."', '".$houseID."')";
  $query = $db->prepare($sql);
  $query->execute();
  header('location'.'../index.php');
?>
