<?php

namespace App\Http\Controllers\Employe;

use App\Actions\Employe\GetEmployesAction;
use App\Actions\Employe\StoreEmployesAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Employe\StoreEmployeRequest;
use Illuminate\Http\Request;

class EmployeController extends Controller
{
   public function index(){
    $employes = GetEmployesAction::run();
    return response()->json($employes, 200);
   }


   public function store(StoreEmployeRequest $request){
    $employes = StoreEmployesAction::run($request->name , $request->codigo, $request->cnpj);
    return response()->json($employes,201);
}
}
