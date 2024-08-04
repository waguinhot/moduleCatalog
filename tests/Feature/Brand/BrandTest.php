<?php

use App\Models\Brand;

test('example', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});


test('shold be a test store brand', function () {
    $response = $this->post('api/catalog/brand/store', [
        'name' => 'test brand',
        'description' => 'test description'
    ]);

    $response->assertStatus(201);
    $this->assertDatabaseHas('brands', [
        'name' => 'test brand',
        'description' => 'test description'
    ]);
});


test('shold be a test update brand', function () {
    $brand = Brand::factory()->create();
    $response = $this->put('api/catalog/brand/update/' . $brand->id, [
        'name' => 'test brand',
        'description' => 'test description'
    ]);
    $response->assertStatus(201);
    $this->assertDatabaseHas('brands', [
        'name' => 'test brand',
        'description' => 'test description'
    ]);
});

test('shold be get brand for id', function () {
    $brand = Brand::factory()->create();
    $response = $this->get('api/catalog/brand/unique/' . $brand->id);
    $response->assertStatus(200);
});

test('shold be get all brands', function () {
    $response = $this->get('api/catalog/brand');
    $response->assertStatus(200);
});

test('shold not be store brand without name', function () {
    $response = $this->post('api/catalog/brand/store', [
        'description' => 'test description'
    ], [
        'Accept' => 'application/json',
        'Content-Type' => 'application/json'
    ]);
    $response->assertStatus(422);
});

test('shold not be update brand without name', function () {
    $brand = Brand::factory()->create();
    $response = $this->put('api/catalog/brand/update/' . $brand->id, [
        'description' => 'test description'
    ], [
        'Accept' => 'application/json',
        'Content-Type' => 'application/json'
    ]);
    $response->assertStatus(422);
});

test('shold not be get brand for id', function () {
    $response = $this->get('api/catalog/brand/unique/' . 100000);
    $response->assertStatus(404);
});
test('shold not be get brand update for id', function () {
    $response = $this->put('api/catalog/brand/update/' . 100000 , [
       'name' => 'test brand',
        'description' => 'test description'
    ]);
    $response->assertStatus(404);
});

