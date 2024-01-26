<?php
namespace App\Services;

use Nette;
class CardReaderService{

    public function checkOpen(int $cardNumber) : bool{
        $curl = curl_init();
         curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://app.lamael.com/api/v1/cards',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Request-ID: 100',
            'Workspace-Token: 2bdb6d4f1838657ffb3f0f8155513bed',
            'cardNumber:'.$cardNumber."'",
            'User-Token: 96e9128bcfa90da639583588b39f6dc7',
            'Cookie: PHPSESSID=teqbrkf6skpgh82rvetkmn7r61; _nss=1'
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        $data = json_decode($response, true);
	    return $data["open"] ?? false;
    }
}