<?php

use App\Models\Category;

test('example', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});

test('shold be get categories' , function (){
    $response = $this->get('/api/catalog/category');
    $response->assertStatus(200);
});

test('shold be get category for id' , function (){
    $category = Category::factory()->create();
    $response = $this->get('/api/catalog/category/unique/' . $category->id);
    $response->assertStatus(200);
});

test('shold not be get category for id' , function (){
    $response = $this->get('/api/catalog/category/unique/0');
    $response->assertStatus(404);
});

test('shold be store category' , function (){
    $response = $this->post('api/catalog/category/store', [
        'name' => 'test category',
        'description' => 'test description'
    ]);
    $response->assertStatus(201);
    $this->assertDatabaseHas('categories', [
        'name' => 'test category',
        'description' => 'test description'
    ]);
});


test('shold be update category' , function (){
    $category = Category::factory()->create();
    $response = $this->put('api/catalog/category/update/' . $category->id, [
        'name' => 'test category',
        'description' => 'test description'
    ]);
    $response->assertStatus(201);
    $this->assertDatabaseHas('categories', [
        'name' => 'test category',
        'description' => 'test description'
    ]);
});

test('shold not be update category without name null' , function (){
    $category = Category::factory()->create();
    $response = $this->put('api/catalog/category/update/' . $category->id, [
        'description' => 'test description',
        'name' => ""
    ],[
        'Accept' => 'application/json',
        'Content-Type' => 'application/json'
    ]);
    $response->assertStatus(422);
});


test('shold not be update category without name' , function (){
    $category = Category::factory()->create();
    $response = $this->put('api/catalog/category/update/' . $category->id, [
        'description' => 'test description'
    ],[
        'Accept' => 'application/json',
        'Content-Type' => 'application/json'
    ]);
    $response->assertStatus(422);
});


test('shold be delete category' , function (){
    $category = Category::factory()->create();
    $response = $this->delete('api/catalog/category/delete/' . $category->id);
    $response->assertStatus(201);
});

test('shold not be delete category' , function (){
    $response = $this->delete('api/catalog/category/delete/0');
    $response->assertStatus(404);
});
