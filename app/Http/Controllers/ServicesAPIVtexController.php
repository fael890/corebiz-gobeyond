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
    }
    

    public function listagemSearchVtex()
    {
        $result = $this->endpointSearch->searchServiceVtex("https://loja.chillibeans.com.br/api/catalog_system/pub/products/search?Rayban");

        return $result;
    }

    public function addAllProducts(Product $request)
    {
        $request = $this->endpointSearch->findProducts("https://loja.chillibeans.com.br/api/catalog_system/pub/products/search?Rayban");

        Product::create($request->all());
    }

    public function addProductVtex($productId){
        $product = $this->endpointSearch->findVtexProductById("https://loja.chillibeans.com.br/api/catalog_system/pub/products/search?Rayban");
    
        $product = Product::find($productId);
        

        return response()->json(['products'=>$product], 200);
    } 
    
    public function listProductVtex(){
        return Product::all();
    }
}
