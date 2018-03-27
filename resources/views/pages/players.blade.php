@extends('layouts.master')

@section('content')
    <div class="row player-display mt-4">
        @foreach($players->results as $player)
            <div class="col-lg-4 col-sm-6 col-xs-12 player-wrap">
                <div class="player {{ $player[3] }}-border">
                    <p class="{{ $player[3] }}-light">
                        {{ $player[1] }}
                    </p>
                    <p>
                        {{ $player[1] }}
                    </p>
                    <img alt="Photo of <?=$player[0]?>" src="https://ak-static.cms.nba.com/wp-content/uploads/headshots/nba/latest/260x190/ {{ $player[0] }}>.png"
                        onerror="this.src='https://i.cdn.turner.com/nba/nba/.element/media/2.0/teamsites/celtics/media/generic-player-260x190.png';"/>
                </div>
            </div>
        @endforeach
    </div>
@endsection