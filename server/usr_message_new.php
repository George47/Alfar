<?php
  include("../util.php");
  configSession();

  // get userID from the username that registered the house
  //$sql = "SELECT A.userID FROM accounts A, house H WHERE A.username = H.username";

  // return the userID of user who posted house
  //SELECT A.userID FROM accounts A, house H WHERE houseID = 115 AND A.username = H.username

  // obtain houseID, find its related userID
  $houseID = $_SESSION['id'];
  //$que=mysqli_query($db, "SELECT A.userID FROM accounts A, house H WHERE houseID = '$houseID' AND A.username = H.username LIMIT 1");
  $que = mysqli_query($db, "SELECT userID FROM house WHERE houseID = '$houseID' LIMIT 1");
  $res=mysqli_fetch_array($que,MYSQLI_ASSOC);
  $houseOwnerID = $res['userID'];

  $currentUser = $_SESSION['login_user'];
  // Obtains current userID
  $currentID = $_SESSION['login_id'];

  $message = mysqli_real_escape_string($db, $_REQUEST['sentMessage']);
  $publishdate = date('Y-n-j H:i:s');

  // if table doesn't exist, create it
  $sql = "SELECT c_id FROM conversation WHERE (user_one='$currentID' AND user_two='$houseOwnerID') OR (user_one='$houseOwnerID' AND user_two='$currentID')";
  $result = mysqli_query($db, $sql);
  if (mysqli_num_rows($result) == 0){
    $sql2 = "INSERT INTO conversation (user_one, user_two, convTime) VALUES ('$currentID','$houseOwnerID','$publishdate')";
    $query2 = $db->prepare($sql2);
    $query2->execute();
  }

  // Obtains the conversation ID for both users
  //$q=mysqli_query($db, "SELECT c_id FROM conversation WHERE user_one='$currentID' OR user_two='$currentID' ORDER BY c_id DESC limit 1");
  $q=mysqli_query($db, "SELECT c_id FROM conversation WHERE (user_one='$currentID' AND user_two='$houseOwnerID') OR (user_one='$houseOwnerID' AND user_two='$currentID') ORDER BY c_id DESC limit 1");
  $v=mysqli_fetch_array($q,MYSQLI_ASSOC);

  $currentConvo = $v['c_id'];

  // insert context after or not creating table
  $sql3 = "INSERT INTO conversation_reply (reply, user_id_fk, replyTime, c_id_fk) VALUES ('$message','$currentID','$publishdate','$currentConvo')";
  mysqli_query($db, $sql3);
  $sql4 = "UPDATE conversation SET convTime = '$publishdate' WHERE c_id = '$currentConvo'";
  mysqli_query($db, $sql4);

  header('Location: '.'../index.php');


  ?>
