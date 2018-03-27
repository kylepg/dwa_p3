<?php

class search
{
    private $playerJson;
    private $playerInfo;
    private $teamJson;
    public $teamInfo;

    public $results = [];
    public $activeTab = [
        'search'  => '',
        'filters' => ''
    ];

    public function __construct($teamSearch = null, $playerSearch = null)
    {
        $this->playerJson = file_get_contents('./data/players.json');
        $this->playerInfo = json_decode($this->playerJson);
        $this->teamJson = file_get_contents('./data/teams.json');
        $this->teamInfo = json_decode($this->teamJson);
        $this->teamInfo = $this->teamInfo->tms->t;

        if ($teamSearch !== null) {
            $this->filterTeam($teamSearch);
            $this->activeTab['filters'] = 'active';
        } elseif ($playerSearch !== null) {
            $this->searchPlayer($playerSearch);
            $this->activeTab['search'] = 'active';
        } else {
            $this->filterTeam('all');
            $this->activeTab['search'] = 'active';
        }
    }

    private function searchPlayer($playerSearch = '')
    {
        foreach ($this->playerInfo as $player) {
            if (strtolower($player[1]) == strtolower($playerSearch)) {
                array_push($this->results, $player);
            }
        }
    }

    private function filterTeam($teamSearch = 'all')
    {
        if ($teamSearch == 'all') {
            $this->results = $this->playerInfo;
        } else {
            foreach ($this->playerInfo as $index => $player) {
                if ($player[3] == $teamSearch) {
                    array_push($this->results, $player);
                }
            }
        }
    }
}
