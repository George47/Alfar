<?php
   include("../util.php");
   configSession();

      $name = mysqli_real_escape_string($db,$_POST['name']);

      $sql =$db->prepare('INSERT INTO usr_info (u_id, name) VALUES ("1",?)
                        ON DUPLICATE KEY UPDATE name=VALUES(name);');
      $sql->bind_param("s", $name);
      $result = $sql->execute();

      echo $result? '{"status":"success"}' : '{"status":"error", "errorMsg" : "服务器繁忙，请稍后再试"}';
?>
