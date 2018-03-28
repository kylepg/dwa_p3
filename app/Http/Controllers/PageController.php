<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    private $playerJson;
    private $playerInfo;
    private $teamJson;
    private $teamInfo;

    //
    // ─── CONSTRUCT ──────────────────────────────────────────────────────────────────
    //

    public function __construct()
    {
        $this->playerJson = file_get_contents(database_path('/players.json'));
        $this->playerInfo = json_decode($this->playerJson, true);
        $this->teamJson = file_get_contents(database_path('/teams.json'));
        $this->teamInfo = json_decode($this->teamJson);
    }

    //
    // ─── PLAYER SEARCH ──────────────────────────────────────────────────────────────
    //
   
    public function playerSearch(Request $request)
    {
        $playerSearch = $request->input('player', '');
        $teamSearch = $request->input('team', 'all');
        $results = [];

        if ($playerSearch) {
            foreach ($this->playerInfo as $player) {
                $name = explode(" ", strtolower($player[1]));
                array_push($name, strtolower($player[1]));
                if (in_array($playerSearch, $name)) {
                    array_push($results, $player);
                }
            }
        } else {
            if ($teamSearch === 'all') {
                $results = $this->playerInfo;
            } else {
                foreach ($this->playerInfo as $index => $player) {
                    if ($player[3] == $teamSearch) {
                        array_push($results, $player);
                    }
                }
            }
        }
        return view('pages.playerSearch')->with([
            'teamInfo'     => $this->teamInfo->tms->t,
            'playerSearch' => $playerSearch,
            'results'      => $results
        ]);
    }

    //
    // ─── LEADERBOARDS ───────────────────────────────────────────────────────────────
    //

    public function leaderboards()
    {
        return view('pages.leaderboards')->with([
            'teamInfo'     => $this->teamInfo->tms->t,
        ]);
    }
}
