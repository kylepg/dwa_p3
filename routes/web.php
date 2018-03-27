<?php

//
// ─── PLAYERS ───────────────────────────────────────────────────────────────────────
//
    
Route::get('/', 'PageController@players');

//
// ─── LEADERBOARDS ───────────────────────────────────────────────────────────────────
//

Route::get('/leaderboards', 'PageController@leaderboards');
