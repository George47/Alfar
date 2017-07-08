<?php

$doc = new DomDocument;
libxml_use_internal_errors(true);

function getSslPage($url) {
    /*  http://www.manongjc.com/article/1428.html */
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_REFERER, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}

// We need to validate our document before refering to the id
// Need to fix with https
//$url = getSslPage("https://www.realtor.ca/Residential/Single-Family/18256515/1407---90-STADIUM-Road-Toronto-Ontario-M5V3W5-Niagara");
//$doc->validateOnParse = true;


$url = "http://www.cic.gc.ca/english/";



$doc->validateOnParse = true;
$doc->loadHtml('<?xml encoding="utf-8" ?>' . file_get_contents($url));
libxml_clear_errors();


$e = $doc->getElementById('wb-cont');
$address = $e->textContent;
echo $address;
//m_property_dtl_address_lft

$xpath = new DOMXpath($doc);
//$elements = $xpath->query('//div[contains(@class, "reference")]');
$elements = $xpath->query('//div[contains(@class, "test")]');
if (!is_null($elements)) {
  foreach ($elements as $element) {
    //echo "<br/>[". $element->nodeName. "]";

    $nodes = $element->childNodes;
    foreach ($nodes as $node) {
      echo $node->nodeValue. "\n";
    }
  }
}





?>