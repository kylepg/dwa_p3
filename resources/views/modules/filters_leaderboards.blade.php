<ul class="nav nav-tabs">
    @foreach(config('app.tabs') as $request => $tab)
    <a href="{{ $request }}">
        <li class="nav-item">
            <div class="nav-link {{ Request::is($request) ? 'active' : '' }}" data-menu="{{ $tab }}">{{ $tab }}</div>
        </li>
    </a>
    @endforeach
    <a class="reset-button" href="{{ Request::path() }}">
        <input type='submit' value='Reset' class='btn btn-primary ml-sm-3'>
    </a>
</ul>
<form method='GET'>
    <!-- START FORM -->
    <div id="leaderboards" class="filter-block {{ Request::is('leaderboards') ? 'active' : '' }}">
        <div class="row m-0">
            <div class="col-md-6 col-sm-12 py-5 px-5" style="border-right: 1px solid gray">
                <div class="col-12">
                    <h3 class="">Find a player</h3>
                </div>
                <div class="col-12 by-player flex-column">
                    <div class="form-group">
                        <input id="leaderboards-player" type='text' name='player' value='{{ $playerSearch }}' class='mb-3'>
                        <input type="submit" onClick="document.getElementById('leaderboards-roster').value = 'all'" value="Search" class="btn btn-primary ml-sm-3">
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12 py-5 px-5">
                <div class="col-12">
                    <h3 class="">Find a roster</h3>
                </div>
                <div class="col-md-12">
                    <select id="leaderboards-roster" onChange="document.getElementById('leaderboards-player').value = ''; this.form.submit()"
                        name="team" class="w-50" style="height: 35px">
                        <option value="all">All teams</option>
                        @foreach ($teamInfo2 as $teamInfo => $teamObj)
                        <option {{ $teamSearch == $teamObj->ta ? ' selected="selected"' : '' }} value='{{ $teamObj->ta }}'> {{ $teamObj->tc }} {{  $teamObj->tn }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-12 hidden-sm-down p-0">
                <div class="filter-block_divider-h"></div>
            </div>
            <div class="col-12 py-5 px-5 filter-permode">
                <h3 class="">Rank by</h3>
                <div class="stat-button-wrap">
                    <label class="btn btn-primary {{ $statType == 'pts' ? 'selected ' : ' ' }}">PTS<input onChange="this.form.submit()" name='stat' type='radio' value='pts' {{ $statType == 'pts' ? 'checked ' : ' ' }}/></label>
                    <label class="btn btn-primary {{ $statType == 'fgp' ? 'selected ' : ' ' }}">FG%<input onChange="this.form.submit()" name='stat' type='radio' value='fgp' {{ $statType == 'fgp' ? 'checked ' : ' ' }}/></label>
                    <label class="btn btn-primary {{ $statType == '3pp' ? 'selected ' : ' ' }}">3P%<input onChange="this.form.submit()" name='stat' type='radio' value='3pp' {{ $statType == '3pp' ? 'checked ' : ' ' }}/></label>
                    <label class="btn btn-primary {{ $statType == 'ftp' ? 'selected ' : ' ' }}">FT%<input onChange="this.form.submit()" name='stat' type='radio' value='ftp' {{ $statType == 'ftp' ? 'checked ' : ' ' }}/></label>
                    <label class="btn btn-primary {{ $statType == 'reb' ? 'selected ' : ' ' }}">REB<input onChange="this.form.submit()" name='stat' type='radio' value='reb' {{ $statType == 'reb' ? 'checked ' : ' ' }}/></label>
                    <label class="btn btn-primary {{ $statType == 'ast' ? 'selected ' : ' ' }}">AST<input onChange="this.form.submit()" name='stat' type='radio' value='ast' {{ $statType == 'ast' ? 'checked ' : ' ' }}/></label>
                    <label class="btn btn-primary {{ $statType == 'stl' ? 'selected ' : ' ' }}">STL<input onChange="this.form.submit()" name='stat' type='radio' value='stl' {{ $statType == 'stl' ? 'checked ' : ' ' }}/></label>
                    <label class="btn btn-primary {{ $statType == 'blk' ? 'selected ' : ' ' }}">BLK<input onChange="this.form.submit()" name='stat' type='radio' value='blk' {{ $statType == 'blk' ? 'checked ' : ' ' }}/></label>
                </div>
                <input class="mt-4 mr-2 additionalStats" onChange="this.form.submit()" type="checkbox" name="additionalStats" {{ ($additionalStats)
                    ? 'checked' : '' }}/>Show additional stats
            </div>
        </div>
    </div>
    <!-- END FORM -->
</form>