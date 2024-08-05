<?php
namespace App\Actions\Employe;
use App\Actions\AsAction;
use App\Models\Employe\Employe;

class GetEmployesAction extends AsAction {
    public function handle(){
        return Employe::all();
    }
}
