<?php

namespace App\Http\Controllers;

use App\Actions\Category\DeleteCategoryAction;
use App\Actions\Category\GetCategoriesAction;
use App\Actions\Category\GetCategoryForIdAction;
use App\Actions\Category\StoreCategoryAction;
use App\Actions\Category\UpdateCategoryAction;
use App\Http\Requests\Category\StoreCategoryRequest;

class CategoryController extends Controller
{

    public function index(){
        $categoreis = GetCategoriesAction::run();
        return response()->json($categoreis, 200);
    }

    public function getById($id){
        $category = GetCategoryForIdAction::run($id);
        if(!$category){
            return response()->json([ 'status' => $category ,'message' => 'category not found'], 404);
        }
        return response()->json($category, 200);
    }
    public function store(StoreCategoryRequest $request){
       $data = $request->all();
       $category = StoreCategoryAction::run($data['name'] ,$data['description']??"", $data['parent_id']??null);
       return response()->json($category, 201);
    }

    public function update(StoreCategoryRequest $request , $id){
        $category = UpdateCategoryAction::run($id , $request->name , $request->parent_id);
        if(!$category){
            return response()->json([ 'status' => $category ,'message' => 'category not found'], 404);
        }
        return response()->json(['status' => $category , 'message' => 'category updated successfully'], 201);
    }

    public function delete($id)
    {   $category = GetCategoryForIdAction::run($id);
        if(!$category){
            return response()->json([ 'status' => $category ,'message' => 'category not found'], 404);
        }
        $category = DeleteCategoryAction::run($category);
        return response()->json(['status' => $category , 'message' => 'category deleted successfully'], 201);
    }

}
