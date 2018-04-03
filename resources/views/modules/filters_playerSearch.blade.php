<ul class="nav nav-tabs">
    @foreach(config('app.tabs') as $request => $tab)
    <a href="{{ $request }}">
        <li class="nav-item">
            <div class="nav-link {{ Request::is($request) ? 'active' : '' }}" data-menu="{{ $tab }}">{{ $tab }}</div>
        </li>
    </a>
    @endforeach
    <a class="reset-button" href="{{ Request::path() }}">
        <input type="submit" value="Reset" class="btn btn-primary ml-sm-3">
    </a>
</ul>
<form method='GET'>
    <!-- START FORM -->
    <div id="playerSearch" class="filter-block {{ Request::is('/') ? 'active' : '' }}" style="border-radius: 0px 7px 7px 7px">
        <div class="row m-0">
            <div class="col-md-6 col-sm-12 py-5 px-5" style="border-right: 1px solid gray">
                <div class="col-12">
                    <h3 class="">Find a player</h3>
                </div>
                <div class="col-12 by-player flex-column">
                    <div class="form-group">
                        <input id="playersearch-player" type="text" name="player" value="{{ $playerSearch }}" class="mb-3">
                        <input type="submit" onClick="document.getElementById('playersearch-roster').value = 'all'" value="Search" class="btn btn-primary ml-sm-3">
                    </div>
                </div>
            </div>
            <div class="filter-block_divider hidden-sm-down"></div>
            <div class="col-md-6 col-sm-12 py-5 px-5">
                <div class="col-12">
                    <h3 class="">Find a roster</h3>
                </div>
                <div class="col-md-12">
                    <select name="team" id="playersearch-roster" onChange="document.getElementById('playersearch-player').value = ''; this.form.submit()"
                        class="w-50" style="height: 35px">
                        <option value="all">All teams</option>
                        @foreach ($teamInfo as $teamInfo => $teamObj)
                        <option {{ $teamSearch == $teamObj->ta ? ' selected="selected"' : '' }} value='{{ $teamObj->ta }}'> {{ $teamObj->tc }} {{  $teamObj->tn }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>
    <!-- END FORM -->
</form>