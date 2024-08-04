<?php

namespace App\Http\Controllers\Brand;

use App\Actions\Brand\GetBrandForIdAction;
use App\Actions\Brand\GetBrandsAction;
use App\Actions\Brand\StoreBrandAction;
use App\Actions\Brand\UpdateBrandAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Brand\StoreBrandRequest;

class BrandController extends Controller
{
    public function index(){
        $brands = GetBrandsAction::run();
        return response()->json($brands, 200);
    }

    public function getById($id){
        $brand = GetBrandForIdAction::run($id);
        if(!$brand){
            return response()->json([ 'status' => $brand ,'message' => 'brand not found'], 404);
        }
        return response()->json($brand, 200);
    }
    public function store(StoreBrandRequest $request){
        $validated = $request->validated();
        if(!$validated){
            return response()->json($validated, 422);
        }
        $data = $request->all();
        $brand = StoreBrandAction::run($data['name'] , $data['description'] ?? "");
        return response()->json($brand, 201);
    }

    public function update(StoreBrandRequest $request , $id){
        $brand = UpdateBrandAction::run($id , $request->name , $request->description??"");
        if(!$brand){
            return response()->json([ 'status' => $brand ,'message' => 'brand not found'], 404);
        }
        return response()->json(['status' => $brand , 'message' => 'brand updated successfully'], 201);
    }
}
