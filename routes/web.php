<?php

//
// ─── PLAYERS ───────────────────────────────────────────────────────────────────────
//
    
Route::get('/', 'PageController@playerSearch');

//
// ─── LEADERBOARDS ───────────────────────────────────────────────────────────────────
//

Route::get('/leaderboards', 'PageController@leaderboards');
