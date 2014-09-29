<?php

Route::get('/', function()
{
    $art = new Art();
    $pieces = $art->getAll();

	return View::make('home')->with('pieces', $pieces);
});

Route::get('/art/traditional', function()
{
    $art = new Art();
    $pieces = $art->getTraditional();

    return View::make('home')->with('pieces', $pieces);
});

Route::get('/art/digital', function()
{
    $art = new Art();
    $pieces = $art->getDigital();

    return View::make('home')->with('pieces', $pieces);
});

Route::get('/art/{name}', function($name)
{
    $art = new Art();
    $piece = $art->getPiece($name);

    return View::make('piece')->with('piece', $piece);
});