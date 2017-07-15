<?php
  include("../util.php");
  configSession();

  // AJAX not working, will fix later


  //$message = mysqli_real_escape_string($db, $_REQUEST['message']);
  //$sql = "INSERT INTO conversation_reply (reply, user_id_fk, replyTime, c_id_fk) VALUES (?,'1','3','1');";

  if($_SERVER["REQUEST_METHOD"] == "POST") {

    // $sql = "SELECT A.userID FROM accounts A, house H WHERE A.username = H.username";
    // $query = $db->prepare($sql);
    // $query->execute();

    // $publishdate = date('Y-n-j H:i:s');
    // $sql = "SELECT c_id FROM conversation WHERE (user_one='1' AND user_two='26') OR (user_one='26' AND user_two='1');";
    // $result = mysqli_query($db, $sql);
    // if (mysql_num_rows($result)==0){
    //   $sql2 = "INSERT INTO conversation (user_one, user_two, convTime) VALUES ('1','26','3');";
    //   $query2 = $db->prepare($sql2);
    //   $query2->execute();
    // }
    $recievedInfo = $_POST['foo'];


      //$convID = mysqli_insert_id($db);

      $sql3 = "INSERT INTO conversation_reply (reply, user_id_fk, replyTime, c_id_fk) VALUES (?,'1','3','1')";
      $query3 = $db->prepare($sql3);
      $query3->bind_param('s', $recievedInfo);
      $query3->execute();

      //header('Location: '.'../index.php');
      echo '{"status":"success"}';
  }
?>
