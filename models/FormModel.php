<?php

use Symfony\Component\Panther\Client;

class FormModel
{

    private $url;

    public function __construct()
    {
        $this->url = '';
    }

    public function setUrl($url)
    {
        $this->url = $url;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function scraping($url)
    {

        $data = array();

        //Intentando con curl (No soporta JS)
        // $curl = curl_init();
        // curl_setopt($curl, CURLOPT_URL, $url);
        // curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        // curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36');
        // curl_setopt($curl, CURLOPT_ENCODING, 'UTF-8');
        // $result = curl_exec($curl);
        // $status_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        // if ($result === false) {
        //     $data['error'] = 'Error: ' . curl_error($curl);
        // } elseif ($status_code != 200) {
        //     $data['data'] = $result;
        //     $data['status'] = $status_code;
        //     $data['error'] = "Solicitud fallida: " . $status_code;
        // } else {
        //     $data['error'] = false;
        //     $data['data'] = $result;
        //     $data['status'] = $status_code;
        // }
        // curl_close($curl);


        //Probando con Panther (En teoría soporta JS)


        //initialize a Chrome client instance
        $proxy_url = [
            '41.204.53.30:80',
            '41.204.53.17:80',
            '41.169.69.91:3128',
            '178.128.113.118:23128',
            '41.204.53.21:80',
            '15.235.153.57:8089',
            '152.52.153.231:80',
            '45.119.133.218:3128',
            '188.166.197.129:3128',
            '202.188.211.11:800',
            '80.13.43.193:80'
        ];

        $client = Client::createChromeClient("drivers/chromedriver", [
            // '--proxy-server=' . array_rand($proxy_url),
            '--proxy-server=80.13.43.193:80',
            '--user-agent=Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36',
            '--window-size=1200,1100',
            '--disable-web-security',
            '--disable-blink-features=AutomationControlled',
        ], ["port" => 9080,]);

        // connect to the target page
        $crawler = $client->request("GET", $url);

        // retrieve the HTML source code of the
        // target page and print it
        $html = $crawler->html();
        echo $html;



        exit();

        return $data;
    }
}
