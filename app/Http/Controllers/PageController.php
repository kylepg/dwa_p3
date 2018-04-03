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

    public function __construct(Request $request)
    {
        $this->playerJson = file_get_contents(database_path('/players.json'));
        $this->playerInfo = json_decode($this->playerJson, true);
        $this->teamJson = file_get_contents(database_path('/teams.json'));
        $this->teamInfo = json_decode($this->teamJson);
        $this->query = [
            'player'          => $request->input('player', ''),
            'team'            => $request->input('team', 'all'),
            'stat'            => $request->input('stat', 'pts'),
            'additionalStats' => $request->has('additionalStats'),
        ];
    }
    

    //
    // ─── SORTING FUNCTION ───────────────────────────────────────────────────────────
    //

    private function sort_by_order($a, $b)
    {
        $statIndex;
        switch ($this->query['stat']) {
            case 'pts':
                $statIndex = 29;
                break;
            case 'fgp':
                $statIndex = 12;
                break;
            case '3pp':
                $statIndex = 15;
                break;
            case 'ftp':
                $statIndex = 18;
                break;
            case 'reb':
                $statIndex = 21;
                break;
            case 'ast':
                $statIndex = 22;
                break;
            case 'stl':
                $statIndex = 24;
                break;
            case 'blk':
                $statIndex = 25;
                break;
        }
        $result = 0;
        if ($a[$statIndex] < $b[$statIndex]) {
            $result = 1;
        } elseif ($a[$statIndex] > $b[$statIndex]) {
            $result = -1;
        }
        return $result;
    }

    //
    // ─── SEARCH RESULTS  ────────────────────────────────────────────────────
    //

    private function searchResults(Request $request)
    {
        $results = [];
        $this->playerInfo = array_values($this->playerInfo);
        if ($this->query['player']) {
            foreach ($this->playerInfo as $index => $player) {
                $name = explode(" ", strtolower($player[1]));
                array_push($name, strtolower($player[1]));
                if (in_array($this->query['player'], $name)) {
                    $results[$index] = $player;
                }
            }
        } else {
            if ($this->query['team'] === 'all') {
                $results = $this->playerInfo;
            } else {
                $this->query['player'] = '';
                foreach ($this->playerInfo as $index => $player) {
                    if ($player[3] == $this->query['team']) {
                        $results[$index] = $player;
                    }
                }
            }
        }
        return $results;
    }
        
    //
    // ─── PLAYER SEARCH ──────────────────────────────────────────────────────────────
    //
   
    public function playerSearch(Request $request)
    {
        $results = $this->searchResults($request);
        return view('pages.playerSearch')->with([
            'teamInfo'      => $this->teamInfo->tms->t,
            'teamInfo2'     => $this->teamInfo->tms->t,
            'playerSearch'  => $this->query['player'],
            'teamSearch'    => $this->query['team'],
            'statType'      => $this->query['stat'],
            'additionalStats'     => $this->query['additionalStats'],
            'results'       => $results
        ]);
    }

    //
    // ─── LEADERBOARDS ───────────────────────────────────────────────────────────────
    //

    public function leaderboards(Request $request)
    {
        uasort($this->playerInfo, [$this,'sort_by_order']);
        $results = $this->searchResults($request);
        return view('pages.leaderboards')->with([
            'teamInfo'            => $this->teamInfo->tms->t,
            'teamInfo2'           => $this->teamInfo->tms->t,
            'playerSearch'        => $this->query['player'],
            'teamSearch'          => $this->query['team'],
            'statType'            => $this->query['stat'],
            'additionalStats'     => $this->query['additionalStats'],
            'results'             => $results
        ]);
    }
}
?>