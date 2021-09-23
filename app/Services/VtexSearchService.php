<?php

namespace App\Services;


//? Classe de serviço Search, que utiliza a conexão.
class VtexSearchService {

    use VtexConnect;

    //? função que mostra apenas o Id, name e brand de todos os produtos
    public function searchServiceVtex($url)
    {
    
        $result = $this->connectGet($url)->collect();

        return $result->filter(function($item){
            return $item['productId'];
        })->map(function($item){
            $item['productId'] = (int) $item['productId'];

            return [
                'productId' => $item['productId'],
                'productName' => $item['productName'],
                'brand' => $item['brand']
            ];
        })->values();
        

        /*return $result->filter(function($item){
            return $item['productId'] == "10015499";
        })->map(function($item){
            
            $item['productId'] = (int) $item['productId'];

            return [
                'productId' => $item['productId'],
                'productName' => $item['productName'],
                'brand' => $item['brand']
            ];
        })
        ->values();

        dd($result);*/

    }
}