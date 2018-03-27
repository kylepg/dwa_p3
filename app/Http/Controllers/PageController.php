<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Route;

class PageController extends Controller
{
    private $playerJson;
    private $playerInfo;
    private $teamJson;
    public $teamInfo;

    private $filters;
    private $currentPath;
    private $active = [
        'players'      => '',
        'leaderboards' => ''
    ];

    //
    // ─── CONSTRUCT ──────────────────────────────────────────────────────────────────
    //

    public function __construct()
    {
        // Define data for filters view
        $currentPath = Route::getFacadeRoot()->current()->uri();
        if ($currentPath == 'leaderboards') {
            $this->active['leaderboards'] = 'active';
        } else {
            $this->active['players'] = 'active';
        }
    }

    //
    // ─── PLAYER SEARCH ──────────────────────────────────────────────────────────────
    //
   
    public function players($playerSearch = '', $teamSearch = 'all')
    {
        $this->playerJson = file_get_contents('./database/players.json');
        $this->playerInfo = json_decode($this->playerJson);
        $this->teamJson = file_get_contents('./database/teams.json');
        $this->teamInfo = json_decode($this->teamJson);
        $this->teamInfo = $this->teamInfo->tms->t;

        $results = [];

        if ($playerSearch !== '') {
            foreach ($this->playerInfo as $player) {
                if (strtolower($player[1]) == strtolower($playerSearch)) {
                    array_push($this->results, $player);
                }
            }
        }

        if ($teamSearch !== '') {
            $this->results = $this->playerInfo;
        } else {
            foreach ($this->playerInfo as $index => $player) {
                if ($player[3] == $teamSearch) {
                    array_push($results, $player);
                }
            }
        }

        return view('pages.players')->with([
            'active'  => $this->active,
            'players' => $results
        ]);
    }

    //
    // ─── LEADERBOARDS ───────────────────────────────────────────────────────────────
    //

    // public function leaderboards()
    // {
    //     return view('pages.leaderboards')->with([
    //         'active' => $this->activeTab
    //     ]);
    // }
}
