<?php
    $ds = DIRECTORY_SEPARATOR;
    $storeFolder = '../images/uploads';
    if (!empty($_FILES)) {
        $tempFile = $_FILES['file']['tmp_name'];
        $temp = explode(".", $_FILES['file']['name']);
        $newfilename = round(microtime(true)) . '.' . end($temp);
        $targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds;
        $targetFile =  $targetPath. $newfilename;
        move_uploaded_file($tempFile,$targetFile);
    }
?>
