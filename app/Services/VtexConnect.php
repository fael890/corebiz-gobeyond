<?php 

namespace App\Services;

use Illuminate\Support\Facades\Http;


//? Classe de conexão, apenas conecta.
trait VtexConnect {
    
    public function connectGet($url)
    {        
        return Http::accept('application/json')->get($url);
    }

}


