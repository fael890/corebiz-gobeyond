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

        //? Comando abaixo é utilizado para remover erro de certificado no postman
        $httpClient = new \GuzzleHttp\Client([
            'base_uri' => 'http://loja.chillibeans.com.br/api/catalog_system/pub/products/search?Rayban',
            'verify' => false
        ]);
    }
    

    public function listagemSearchVtex()
    {  
        return $this->endpointSearch->searchServiceVtex("http://loja.chillibeans.com.br/api/catalog_system/pub/products/search?Rayban");
    }

    public function addProductVtex($productId){
        return $this->endpointSearch->findVtexProductById($productId, "http://loja.chillibeans.com.br/api/catalog_system/pub/products/search?Rayban");
    } 
    
    public function listProductVtex(){
        return Product::all();
    }
}
