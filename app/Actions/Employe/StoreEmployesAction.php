<?php
namespace App\Actions\Employe;

use App\Actions\AsAction;
use App\Models\Employe\Employe;

class StoreEmployesAction extends AsAction{
    public function handle(
        ?string $name = "",
        ?string $codigo = "",
        ?string $cnpj = ""
    ){
        return Employe::query()->create([
            "name"=> $name,
            "codigo"=> $codigo,
            "cnpj"=> $cnpj
        ]);
    }
}
