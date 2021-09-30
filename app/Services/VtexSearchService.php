<?php

namespace App\Services;

use App\Models\Pessoas;
use App\Models\Product;

//? Classe de serviço Search, que utiliza a conexão.
class VtexSearchService {

    use VtexConnect;
    public $productId;

    //? função que mostra apenas o Id, name e brand de todos os produtos da url
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
    }
    
    public function findProducts($url){
        $product = $this->connectGet($url)->collect();

        return $product->filter(function($item){
            
            return $item['productId'];

        })->map(function($item){
            $item['productId'] = (int) $item['productId'];
    
            return [
                'productId' => $item['productId'],
                'productName' => $item['productName'],
                'brand' => $item['brand']
            ];
        })->values();
    }

    public function findVtexProductById($productId, $url){
        $product = $this->connectGet($url)->collect();

        $this->productId = $productId;

        $product = $product->filter(function($item){
            return $item['productId'] === $this->productId;
        })->map(function($item){
            $item['productId'] = (int) $item['productId'];

            return [
                'productId' => $item['productId'],
                'productName' => $item['productName'],
                'brand' => $item['brand']
            ];
        })->first();

        Product::create([
            'productId' => $product['productId'],
            'productName' => $product['productName'],
            'brand' => $product['brand']
        ]);
        
        return $product;
    }      
}