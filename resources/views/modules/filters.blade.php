<div class="row mt-5">
    <ul class="nav nav-tabs col-12">
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
</div>
<div id="playerSearch" class="row filter-block {{ Request::is('/') ? 'active' : '' }}">
    <div class="row">
        <div class="col-md-6 col-sm-12 py-5 px-5">
            <div class="col-12">
                <h3 class="">Find a player</h3>
            </div>
            <div class="col-12 by-player flex-column">
                <form method='GET'>
                    <div class="form-group">
                        <input type='text' name='player' value='' class='mb-3'>
                        <input type='submit' value='Search' class='btn btn-primary ml-sm-3'>
                    </div>
                </form>
            </div>
        </div>
        <div class="filter-block_divider hidden-sm-down"></div>
        <div class="col-md-6 col-sm-12 py-5 px-5">
            <div class="col-12">
                <h3 class="">Find a team</h3>
            </div>
            <div class="col-md-12">
                <form method='GET'>
                    <select name='team' class="w-50" style="height: 35px">
                        <option value='all'>All teams</option>
                        @foreach ($teamInfo as $teamInfo => $teamObj)
                        <option value='{{ $teamObj->ta }}'> {{ $teamObj->tc }} {{  $teamObj->tn }}</option>
                        @endforeach
                    </select>
                    <label class=''>
                    <input type='submit' value='Filter' class='btn btn-primary'>
                </form>
            </div>
        </div>
    </div>
</div>
<div id="leaderboards" class="row filter-block {{ Request::is('leaderboards') ? 'active' : '' }}">
</div>