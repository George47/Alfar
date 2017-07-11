<?php

$doc = new DomDocument;
libxml_use_internal_errors(true);
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

<br>
<br>
<input id="takeURL">
<input type="submit" onclick="myFunction()">
<p id="enteredURL"></p>

<script>
  function myFunction() {
    document.getElementById("enteredURL").innerHTML = document.getElementById("takeURL").value;
  }
</script>
