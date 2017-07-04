<?php
  include("../util.php");
  configSession();

  if (! hasEmpty([$_POST['loc-city']])) {
    $city = htmlspecialchars_decode($_POST['loc-city']);
    $addr = htmlspecialchars_decode($_POST['loc-address']);
    $prov = htmlspecialchars_decode($_POST['loc-province']);
    $pos = htmlspecialchars_decode($_POST['loc-poscode']);
    $summ = htmlspecialchars_decode($_POST['des-summary']);
    $tel = htmlspecialchars_decode($_POST['info-tel']);
    $wechat = htmlspecialchars_decode($_POST['info-wechat']);
    $email = htmlspecialchars_decode($_POST['info-email']);


    $sql = "INSERT INTO house (username, houseStatus) VALUES ('".$_SESSION['login_user']."','0')";
    $query = $db->prepare($sql);
    if (!$query->execute()) {
      echo '{"status":"error", "errorMsg" : "服务器繁忙，请稍后再试"}';
      exit;
    }

    $houseID = mysqli_insert_id($db);
    $sql2 = "INSERT INTO house_loc (houseID, city, address, province, postalCode) VALUES ('".$houseID."',?,?,?,?)";
    $query2 = $db->prepare($sql2);
    $query2->bind_param('ssss',$city,$addr,$prov,$pos);
    if (!$query2->execute()) {
      echo '{"status":"error", "errorMsg" : "服务器繁忙，请稍后再试"}';
      exit;
    }
    $sql3 = "INSERT INTO house_info (houseID, description) VALUES ('".$houseID."',?)";
    $query3 = $db->prepare($sql3);
    $query3->bind_param('s',$summ);
    if (!$query3->execute()) {
      echo '{"status":"error", "errorMsg" : "服务器繁忙，请稍后再试"}';
      exit;
    }
    //ameni
    $sql5 = "INSERT INTO house_contact (houseID, phone, wechat, email) VALUES ('".$houseID."',?,?,?)";
    $query5 = $db->prepare($sql5);
    $query5->bind_param('sss',$tel,$wechat,$email);
    if (!$query5->execute()) {
      echo '{"status":"error", "errorMsg" : "服务器繁忙，请稍后再试"}';
      exit;
    }

    echo '{"status":"success"}';
  }

?>
