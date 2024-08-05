<?php

test('example', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});

test('should be get employe', function(){
    $response = $this->get('/api/employe/all');
    $response->assertStatus(200);
});

test('shold be create employe', function(){
    $response = $this->post('/api/employe/store',[
        'name'=> 'fake employe',
        'cnpj'=> '00.000.000/0000-00',
        'codigo'=> '123456789'
    ]);

    $response->assertStatus(201);
    $this->assertDatabaseHas('employes',[
        'name'=> 'fake employe',
        'cnpj'=> '00.000.000/0000-00',
        'codigo'=> '123456789'
    ]);
});

test('not shold be create employe without name', function(){
    $response = $this->post('/api/employe/store',[
        'codigo' => '123456789',
        'cnpj'=> '00.000.000/0000-00',
    ],[
        'Accept' => 'application/json',
        'Content-Type' => 'application/json'
    ]);
    $response->assertStatus(422);
});


