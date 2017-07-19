<?php
  include("util.php");
  configSession();
  $addr = "218 Timberbank Blvd.";
  $geo = file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?address='.urlencode($addr).'&sensor=false');
  // Convert the JSON to an array
  $geo = json_decode($geo, true);
  if ($geo['status'] == 'OK') {
    // Get Lat & Long
    $latitude = $geo['results'][0]['geometry']['location']['lat'];
    $longitude = $geo['results'][0]['geometry']['location']['lng'];
  }
  $sql6 = "INSERT INTO house_geo (houseID, lat, lng) VALUES ('1',?,?)";
  $query6 = $db->prepare($sql6);
  $query6->bind_param('ss',$latitude,$longitude);
  $query6->execute();
  echo $latitude;
?>
