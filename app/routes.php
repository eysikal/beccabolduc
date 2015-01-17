<?php

Route::get('/', function()
{
    $art = new Art();
    $pieces = $art->getAll();

	return View::make('home')->with('pieces', $pieces);
});

Route::get('art/traditional', function()
{
    $art = new Art();
    $pieces = $art->getTraditional();

    return View::make('home')->with('pieces', $pieces);
});

Route::get('art/digital', function()
{
    $art = new Art();
    $pieces = $art->getDigital();

    return View::make('home')->with('pieces', $pieces);
});

Route::get('art/{name}', function($name)
{
    $art = new Art();
    $piece = $art->getPiece($name);

    return View::make('piece')->with('piece', $piece);
});

Route::get('contact', function()
{
    return View::make('contact');
});

Route::get('admin', array('before' => 'auth.basic', function()
{
   return View::make('admin');
}));

Route::post('admin/post-art', array('before' => 'auth.basic', function()
{
    $name = trim(Input::get('name'));
    $image_name = explode('-', $name)[0];

    $full = Input::file('full');
    $ext = strtolower($full->getClientOriginalExtension());
    $full_image_name = $image_name . '.' . $ext;

    $full->move(public_path() . '/assets/images/art/full/', $full_image_name);

    $tile = Input::file('tile');
    $ext = strtolower($tile->getClientOriginalExtension());
    $tile_image_name = $image_name . '-tile' . '.' . $ext;

    $tile->move(public_path() . '/assets/images/art/tile/', $tile_image_name);

    $medium = Input::get('medium');

    $art = new Art();
    $art->saveArt($name, $image_name, $medium);

    $art_url = url('art/' . $name, $parameters = array(), $secure = null);

    $view_vars = array(
        'art_name' => $name,
        'art_url' => $art_url
    );

    return View:: make('saved', $view_vars);

}));