<?php

$doc = new DomDocument;
libxml_use_internal_errors(true);

// We need to validate our document before refering to the id
// Need to fix with https
$doc->validateOnParse = true;
$doc->loadHtml(file_get_contents('http://localhost/~george/alfar/listings-single-page.php?id=114'));
libxml_clear_errors();


var_dump($doc->getElementById('boxed-widget margin-top-35'));

?>