<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\VtexSearchService;
use Illuminate\Http\Request;

class ServicesAPIVtexController extends Controller
{

    protected $endpointSearch;

    public function __construct()
    {   
        //? Controller API VTEX que utiliza o Service Search, podendo utilizar diversos Services Diferentes.
        $this->endpointSearch = new VtexSearchService();

        $httpClient = new \GuzzleHttp\Client([
            'base_uri' => 'http://loja.chillibeans.com.br/api/catalog_system/pub/products/search?Rayban',
            'verify' => false
        ]);
    }
    

    public function listagemSearchVtex()
    {  
        $result = $this->endpointSearch->searchServiceVtex("http://loja.chillibeans.com.br/api/catalog_system/pub/products/search?Rayban");

        return $result;
    }

    public function addAllProducts()
    {
        $result = $this->endpointSearch->findProducts("http://loja.chillibeans.com.br/api/catalog_system/pub/products/search?Rayban");

        Product::create();
    }

    public function addProductVtex($productId){
        $product = $this->endpointSearch->findVtexProductById($productId, "http://loja.chillibeans.com.br/api/catalog_system/pub/products/search?Rayban");

        return $product;
        //return response()->json(['products'=>$product], 200);
    } 
    
    public function listProductVtex(){
        return Product::all();
    }
}
