
    <div class="row mt-5">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <div class="nav-link {{ $active['players'] }}" data-menu="search">Players</div>
            </li>
            <li class="nav-item">
                <div class="nav-link {{ $active['leaderboards'] }}" data-menu="filters">Leaderboards</div>
            </li>
        </ul>
    </div>
    <div id="search" class="row player-menu {{ $active['players'] }}">
        <div class="col-12">
            <h3 class="">Search for an active player</h3>
        </div>
        <div class="col-md-6 by-player flex-column">
            <form method='GET'>
                <div class="form-group">
                    <input type='text' name='player' value='' class='mb-3'>
                    <input type='submit' value='Search' class='btn btn-primary ml-sm-3'>
                </div>
            </form>
        </div>
    </div>
    <div id="filters" class="row player-menu {{ $active['leaderboards'] }}">
        <div class="col-12">
            <h3 class="">Filter by team</h3>
        </div>
        <div class="col-md-12 p-3">
            <form method='GET'>
                <select name='team'>
                    <option value='all'>All teams</option>
                </select>
                <label class='d-block mt-3'>
                    <input type='checkbox' name='photos' value='hide'> Hide photos</label>
                <input type='submit' value='Filter' class='btn btn-primary d-block mt-3'>
            </form>
        </div>
    </div>   
