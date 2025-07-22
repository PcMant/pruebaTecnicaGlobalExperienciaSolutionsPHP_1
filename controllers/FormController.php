<?php
require_once('./models/FormModel.php');
// require_once('./assets/php/simple_html_dom.php');
class FormController{
    private $url;

    public function __construct(){
        $this->url = '';
    }

    public function setUrl($url){
        $this->url = $url;
    }
    
    public function getUrl(){
        return $this->url;
    }

    private function extractDomain($url){
        $protocols = ['http://', 'https://', 'ftp://', 'www.'];
        $url = explode('/', str_replace($protocols, '', $url));
        return $url[0];
    }

    public function urlOutput(){

        $domain = $this->extractDomain($this->url);
        $fromModel = new FormModel();
        $fromModel->setUrl($this->getUrl());
        $data = $fromModel->scraping($this->url);
        
        if($data['data'] && $data['status'] && ($domain == 'vividseats.com' | $domain == 'seatgeek.com')){
            $data['domain'] = $domain;
            $data['data'] = $domain == 'vividseats.com' ? $this->vividseatsDataOutput($data['data']) : $this->seatgeekDataOutput($data['data']);
            return $data;
        }else{
            return $data;
        }
    }

    private function vividseatsDataOutput($body)
    {
        $data = $body;
        // Iterrar con el DOM
        return $data;
    }

    private function seatgeekDataOutput($body)
    {
        $data = $body;
        // Iterrar con el DOM
        return $data;
    }
}

?>