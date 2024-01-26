<?php

namespace App\Services;

use Nette;
class TickerCreator{

    public function createTicket($data){
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://app.lamael.com/api/v1/ticket',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>'{
  		    "ticketNumber": "32190003",
  		    "description": "Nový doklad",
  		    "variableSymbol": 12345,
  		    "userName": "Franta",
  		    "userVatNr": "CZ62913425",
  		    "issuedDateTime": "2019-09-21T17:32:28+01:00",
  		    "cashregisterId": 1,
  		    "ersEnabled": true,
  		    "offlineErsBKP": "8479e074-66030a79-56863f5f-18ce2ed7-db6ccf3f",
  		    "offlineErsPKP": "arPyL47rs9NWDq01qQkId6whhhU+gcvU+Ozl8XGNeT5LHLCXFvIliatSg4l0FRAU03vfQ284TDxRrpc//RBoYcMLJwD7F3temUhU7a+KWDp2ZeYJ7WBazWBH0r2ZLTg4dmV5OPWHtAJbLE8FDGun3N7ce6kvjqTQzlRvEp5jvh26w6wkXrJ5lxl0i47/hbUleX9r/vo1+tXx4eKlpTI6RXPz39ppSOpOeZ3/r79s0NNmo7zNuHclr063glLJPhUTomKorFX0ChoEVQdfz+2fCAKg87vIn4xen3MD5UZs9pU4CYzSqjQsek/aGmbgJ9BXI+lLzXxdmI2TW0LXraX3Sg==",
  		    "paymentType": 1,
  		    "transactionType": 1,
  		    "totalBase": 120.5,
  		    "totalPrice": 104.65,
  		    "totalPricePaid": 120.5,
  		    "receivedAmount": 200,
  		    "isCancellation": false,
  		    "isCancelled": false,
  		    "isPrinted": false,
  		    "supplierName": "QUITEC s.r.o.",
  		    "supplierStreet": "Na Vyhlídce 1291",
  		    "supplierCity": "Mníšek pod Brdy",
  		    "supplierState": "Česká republika",
  		    "supplierZipcode": "252 10",
  		    "supplierRegNr": "62913425",
  		    "supplierVatNr": "CZ62913425",
  		    "vatPayer": true,
  		    "subscriberName": "QUITEC s.r.o.",
  		    "subscriberStreet": "Na Vyhlídce 1291",
  		    "subscriberCity": "Mníšek pod Brdy",
  		    "subscriberState": "Česká republika",
  		    "subscriberZipcode": "252 10",
  		    "subscriberRegNr": "62913425",
  		    "subscriberVatNr": "CZ62913425",
  		    "siteName": "QUITEC s.r.o.",
  		    "siteStreet": "Na Vyhlídce 1291",
  		    "siteCity": "Mníšek pod Brdy",
  		    "siteState": "Česká republika",
  		    "siteZipcode": "252 10",
  		    "ticketFooterNote": "Poznámka k dokladu",
  		    "cashregisterTid": "string",
  		    "notes": "Sample ticket",
  		    "ticketItems": [
    		{
     		     "itemName": "Moje 1. položka",
      		    "category": "string",
          		"quantity": 3.5,
          		"unitShortcut": "kg",
          		"taxRate": 21,
          		"unitPrice": 29.9,
          		"totalPrice": 104.65,
          		"personCardNumber": "string",
          		"machineCardNumber": "string",
          		"personName": "string",
          		"machineName": "string",
     	    	"containerNumber": 1,
          		"fillingPointNumber": 1,
          		"fillingHoseNumber": 1,
          		"order": "string",
      	    	"meter": "string"
    		    }
  		    ]
		}',
            CURLOPT_HTTPHEADER => array(
                'Request-ID: 100',
                'Workspace-Token: 2bdb6d4f1838657ffb3f0f8155513bed',
                'cardNumber: 12345678',
                'User-Token: 96e9128bcfa90da639583588b39f6dc7',
                'Content-Type: application/json',
                'Cookie: PHPSESSID=teqbrkf6skpgh82rvetkmn7r61; _nss=1'
            ),
        ));
        curl_close($curl);
        $response = curl_exec($curl);
        echo "Ticket created successfully";
        return $response ?? false;
    }
}