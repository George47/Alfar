<?php

$doc = new DomDocument;
libxml_use_internal_errors(true);

// We need to validate our document before refering to the id
// Need to fix with https
$doc->validateOnParse = true;
$doc->loadHtml('<?xml encoding="utf-8" ?>' . file_get_contents('http://localhost/Alfar/listings-single-page.php?id=115'));
libxml_clear_errors();

// $profile = '<div><p>中文</p></div>';
// $dom = new DOMDocument();
// $dom->loadHTML(mb_convert_encoding($profile, 'HTML-ENTITIES', 'UTF-8'));
// echo $dom->saveHTML($dom->getElementsByTagName('div')->item(0));

//var_dump($doc->getElementById('testing-grab'));
$e = $doc->getElementById('titlebar');
$address = $e->textContent;
echo $address;

?>
