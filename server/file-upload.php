<?php
    include("../util.php");
    configSession();
    $ds = DIRECTORY_SEPARATOR;
    $storeFolder = '../images/uploads';
    if (!empty($_FILES)) {
        $tempFile = $_FILES['file']['tmp_name'];
        $temp = explode(".", $_FILES['file']['name']);
        $newfilename = round(microtime(true)) . rand(0,9) . rand(0,9) . '.' . end($temp);
        $targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds;
        //$_SESSION['user-img'] = $newfilename;
        //$_SESSION["user-img"] = $newfilename;
        $targetFile =  $targetPath. $newfilename;
        //move_uploaded_file($tempFile,$targetFile);
        if (move_uploaded_file($tempFile,$targetFile)) {
          //$houseID = mysqli_insert_id($db);
          $sql="INSERT INTO images_tbl (houseID, images_path) VALUES ('114','".$newfilename."')";
          //mysql_query($query_upload);
          $query = $db->prepare($sql);
          $query->execute();
        } else {
          return false;
        }
    }
?>
