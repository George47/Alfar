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

    echo '{"status":"success"}';

    // $query2 = $db->prepare("INSERT INTO house_loc (houseID, city, address, province, postalCode) VALUES ('".$houseID."', ?,?,?,?);");
    // $query2->bind_param ('ssss', $city, $addr, $prov, $pos);
    // if (!$query2->execute()) {
    //   echo '{"status":"error", "errorMsg" : "服务器繁忙，请稍后再试"}';
    //   exit;
    // }
    // $query2->execute();






    //echo $res? '{"status":"success", "houseID":"'.mysqli_insert_id($db).'"}' : '{"status":"error", "errorMsg" : "服务器繁忙，请稍后再试"}';


  }







 //  include("../util.php");
 //  configSession();
 //
 //  if (! hasEmpty([$_POST['location']])) {
 //    $loc = json_decode(htmlspecialchars_decode($_POST['location']), true);
 //
 //    $query = $db->prepare("INSERT INTO house (username) VALUES ('".$_SESSION['login_user']."');");
 //    if(!$query->execute()) {
 //      echo '{"status":"error", "errorMsg":"服务器繁忙，请稍后再试"}';
 //      exit;
 //    }
 //    $houseID = mysqli_insert_id($db);
 //
 // } else {
 //    echo '{"status":"error", "errorMsg" : "卖家名，买家名，买家联系方式及运输选项不能为空"}';
 // }
?>
