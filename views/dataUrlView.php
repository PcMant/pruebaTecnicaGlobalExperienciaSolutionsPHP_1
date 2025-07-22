<?php

require_once('./assets/php/simple_html_dom.php');
require_once('./controllers/FormController.php');

$url = isset($_POST['url']) ?? $_POST['url'];  

if($url && !empty($url)){

    $url = $_POST['url'];
    $urlData = new FormController();
    $urlData->setUrl($url);
    $data = $urlData->urlOutput();

    if($data){
        echo '<h2>Datos obtenidos de: '.$data['domain'].'</h2>';

        if($data['status'] == 200){
            // Iteración de lo obtenido del body
        }else{
            echo $data['error'];
        }
    }
}

?>