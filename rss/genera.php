<?php
    
    $json = "../json/entradas.json";
    $datos = file_get_contents($json);
    $datosjson = json_decode($datos,true);
    
    $rss = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8" ?><rss version="2.0"></rss>');
    $canal = $rss->addChild('channel');
    $canal->addChild('title','La web de Jose Vicente');
    $canal->addChild('link','https://jocarsa.com');
    $canal->addChild('description','Formador, programador, y diseñador en Valencia, España');

    foreach($datosjson['entradas'] as $entrada){
        $elemento = $canal->addChild('item');
        $elemento->addChild('title',$entrada['título']);
        $elemento->addChild('description',$entrada['texto']);
        $elemento->addChild('link','https://jocarsa.com');
        $elemento->addChild('fecha',$entrada['fecha']);
    }

    //header('Content-type: application/rss+xml;charset=utf-8');
    //echo $rss->asXML();
    file_put_contents('entradas.rss',$rss->asXML());
    echo "RSS guardado";
?>