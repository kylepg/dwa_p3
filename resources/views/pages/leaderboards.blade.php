@extends('layouts.master') 
@section('filters')
    @include('modules.filters_leaderboards')
@endsection
 
@section('content')
<div class="leaderboard-display mt-4">
    <table>
        <thead>
            <tr>
                <th>RANK</th>
                <th>PLAYER</th>
                <th>TEAM</th>
                <th>AGE</th>
                <th>GP</th>
                <th>MIN</th>
                <th class="{{ $statType == 'pts' ? 'ranked' : '' }}">PTS</th>
                <th class="{{ $additionalStats ? '' : 'hidden' }}">FGM</th>
                <th class="{{ $additionalStats ? '' : 'hidden' }}">FGA</th>
                <th class="{{ $statType == 'fgp' ? 'ranked' : '' }}">FG%</th>
                <th class="{{ $additionalStats ? '' : 'hidden' }}">3PM</th>
                <th class="{{ $additionalStats ? '' : 'hidden' }}">3PA</th>
                <th class="{{ $statType == '3pp' ? 'ranked' : '' }}">3P%</th>
                <th class="{{ $additionalStats ? '' : 'hidden' }}">FTM</th>
                <th class="{{ $additionalStats ? '' : 'hidden' }}">FTA</th>
                <th class="{{ $statType == 'ftp' ? 'ranked' : '' }}">FT%</th>
                <th class="{{ $additionalStats ? '' : 'hidden' }}">OREB</th>
                <th class="{{ $additionalStats ? '' : 'hidden' }}">DREB</th>
                <th class="{{ $statType == 'reb' ? 'ranked' : '' }}">REB</th>
                <th class="{{ $statType == 'ast' ? 'ranked' : '' }}">AST</th>
                <th class="{{ $statType == 'stl' ? 'ranked' : '' }}">STL</th>
                <th class="{{ $statType == 'blk' ? 'ranked' : '' }}">BLK</th>
                <th class="{{ $additionalStats ? '' : 'hidden' }}">TOV</th>
            </tr>
        </thead>
        <tbody>
            @if(count($results) == 0)
            <tr>
                <td class="error" colspan="100">'{{ $playerSearch }}' not found.</td>
            </tr>
            @else @foreach($results as $index => $player)
            <tr id="{{ str_replace(' ', '', $player[1]) }}">
                <td>{{ $index + 1 }}</td>
                <td>{{ $player[1] }}</td>
                <td class="{{ $player[3] }}-light">{{ $player[3] }}</td>
                <td class="additional-stat">{{ $player[4] }}</td>
                <td class="additional-stat">{{ $player[5] }}</td>
                <td class="additional-stat">{{ Helpers::force_decimal($player[9], 1) }}</td>
                <td class="{{ $statType == 'pts' ? 'ranked' : '' }}">{{ Helpers::force_decimal($player[29],1) }}</td>
                <td class="additional-stat {{ $additionalStats ? '' : 'hidden' }}">{{ Helpers::force_decimal($player[10],1) }}</td>
                <td class="additional-stat {{ $additionalStats ? '' : 'hidden' }}">{{ Helpers::force_decimal($player[11],1) }}</td>
                <td class="{{ $statType == 'fgp' ? 'ranked' : '' }}">{{ Helpers::percentage($player[12], 1) }}</td>
                <td class="additional-stat {{ $additionalStats ? '' : 'hidden' }}">{{ Helpers::force_decimal($player[13],1) }}</td>
                <td class="additional-stat {{ $additionalStats ? '' : 'hidden' }}">{{ Helpers::force_decimal($player[14],1) }}</td>
                <td class="{{ $statType == '3pp' ? 'ranked' : '' }}">{{ Helpers::percentage($player[15],1) }}</td>
                <td class="additional-stat {{ $additionalStats ? '' : 'hidden' }}">{{ Helpers::force_decimal($player[16],1) }}</td>
                <td class="additional-stat {{ $additionalStats ? '' : 'hidden' }}">{{ Helpers::force_decimal($player[17],1) }}</td>
                <td class="{{ $statType == 'ftp' ? 'ranked' : '' }}">{{ Helpers::percentage($player[18],1) }}</td>
                <td class="additional-stat {{ $additionalStats ? '' : 'hidden' }}">{{ Helpers::force_decimal($player[19],1) }}</td>
                <td class="additional-stat {{ $additionalStats ? '' : 'hidden' }}">{{ Helpers::force_decimal($player[20],1) }}</td>
                <td class="{{ $statType == 'reb' ? 'ranked' : '' }}">{{ Helpers::force_decimal($player[21],1) }}</td>
                <td class="{{ $statType == 'ast' ? 'ranked' : '' }}">{{ Helpers::force_decimal($player[22],1) }}</td>
                <td class="{{ $statType == 'stl' ? 'ranked' : '' }}">{{ Helpers::force_decimal($player[24],1) }}</td>
                <td class="{{ $statType == 'blk' ? 'ranked' : '' }}">{{ Helpers::force_decimal($player[25],1) }}</td>
                <td class="additional-stat {{ $additionalStats ? '' : 'hidden' }}">{{ Helpers::force_decimal($player[23],1) }}</td>
            </tr>
            @endforeach @endif
        </tbody>
    </table>
</div>
@endsection