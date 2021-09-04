<?php
 	include "library.php";
    
    $path = "xml/myXml.xml";
	$id= getVariable("id",0);
	$xml = new DOMDocument();
	$xml->validateOnParse = true;
    $xml->load($path);
    $products = $xml->getElementsByTagName("item");
    $d = $xml->getElementById("1");
    $data = Array();
    foreach($products as $pr) {
        if ($pr->getAttribute('id') == $id){
            foreach($pr->childNodes as $el) {
                if($el->nodeName == "param"){
                    $data[$el->getAttribute('name')] = $el->getAttribute('value');
                }
            }
        }
    }
    echo json_encode($data);
?>
