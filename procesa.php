<?php
    
    $rss = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8" ?><formulario></formulario>');
    $rss->addChild('nombre',$_POST['nombre']);
    $rss->addChild('asunto',$_POST['asunto']);
    $rss->addChild('email',$_POST['email']);
    $rss->addChild('mensaje',$_POST['mensaje']);
 
    file_put_contents(
        'formularios/'
        .date('Y')
        .date('m')
        .date('d')
        .date('H')
        .date('i')
        .date('s')
        .'.xml',$rss->asXML());
    echo "
    <style>
        body{background:grey}
        p{background:white;width:50%;padding:20px;border-radius:10px;margin:auto;
        margin-top:50px;}
    </style>
   <p> Formulario guardado
   <br>
   Redirigiendo en 5 segundos...</p>
   
    ";
?>
<meta http-equiv='Refresh' content="5; url='index.html'" />