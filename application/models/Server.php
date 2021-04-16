<?php
class Server extends CI_Model {
    public function getRequests($url){
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "cache-control: no-cache",
            "postman-token: 9dae614c-9a80-9032-66ef-6cccd3725bc4"
        ),
        ));

        return $response = curl_exec($curl);
    }
    public function postRequests($url,$body){
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS =>$body,
        CURLOPT_HTTPHEADER => array(
            "cache-control: no-cache",
            "postman-token: 9dae614c-9a80-9032-66ef-6cccd3725bc4"
        ),
        ));

        return $response = curl_exec($curl);
    }
}