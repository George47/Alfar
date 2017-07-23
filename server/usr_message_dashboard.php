<?php
  include("../util.php");
  configSession();

  $currentUser = $_SESSION['login_user'];
  $currentID = getSingleValue('accounts', 'username', $currentUser, 'userID');
  $sendToID = mysqli_real_escape_string($db,$_POST['user']);
  $message = mysqli_real_escape_string($db, $_REQUEST['message']);
  $publishdate = date('Y-n-j H:i:s');

  $que = mysqli_query($db, "SELECT c_id FROM conversation WHERE (user_one = '$currentID' AND user_two = '$sendToID')
            OR (user_one = '$sendToID' AND user_two ='$currentID') LIMIT 1");
  $res=mysqli_fetch_array($que,MYSQLI_ASSOC);
  $conversationID = $res['c_id'];

  $sql = "INSERT INTO conversation_reply (reply, user_id_fk, replyTime, c_id_fk) VALUES ('$message','$currentID','$publishdate','$conversationID')";
  mysqli_query($db, $sql);
  $sql2 = "UPDATE conversation SET convTime = '$publishdate' WHERE c_id = '$conversationID'";
  mysqli_query($db, $sql2);

  if(isset($_REQUEST["destination"])){
      header("Location: {$_REQUEST["destination"]}");
  }else if(isset($_SERVER["HTTP_REFERER"])){
      header("Location: {$_SERVER["HTTP_REFERER"]}");
  }else{
      header('Location: '.'../index.php');
  }

?>
