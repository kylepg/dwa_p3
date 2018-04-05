<?php

//
// ─── PLAYERS ───────────────────────────────────────────────────────────────────────
//
    
Route::get('/', 'PageController@playerSearch');
Route::post('/', 'PageController@getUpdates');

//
// ─── LEADERBOARDS ───────────────────────────────────────────────────────────────────
//

Route::get('/leaderboards', 'PageController@leaderboards');
Route::post('/leaderboards', 'PageController@getUpdates');
