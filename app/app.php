<?php

Route::post('/usuario', 'AuthController@login');
Route::post('/usuario/novo', 'AuthController@cadastro');
Route::post('/produto/novo', function (Request $request) {
    $produto = new App\Model\Product();
    $produto->tipo = $request->tipo;
    $produto->nome = $request->nome;
    $produto->endereco = $request->endereco;
    $produto->idUsuario = $request->idUsuario;
    $test = $produto->save();
    var_dump($test);
});
Route::get('/produtos', function (Request $request) {
    $produto = App\Model\Product::all();
    assign('json', json_encode($produto));
    render('recolhe');
});
Route::get('/produto/@id:[\d]+', function (Request $request) {
    $produto = App\Model\Product::find_by_idUsuario($request->id);
    assign('json', json_encode($produto));
    render('recolhe');
});
Route::get('/produto/@busca', function (Request $request) {
    $produto = App\Model\Product::find_by_tipo($request->busca);
    assign('json', json_encode($produto));
    render('recolhe');
});
Route::post('/produto/@id/edit', function (Request $request) {
    $produto = App\Model\Product::find($request->id);
    $produto->tipo = $request->tipo;
    $produto->nome = $request->nome;
    $produto->endereco = $request->endereco;
    $produto->update();
});
Route::post('/produto/@id/del', function (Request $request) {
    $produto = App\Model\Product::find($request->id);
    $produto->delete();
});
