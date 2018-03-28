<div class="row mt-5">
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <div class="nav-link {{ $activeTabs['players'] }}" data-menu="search">Players</div>
        </li>
        <li class="nav-item">
            <div class="nav-link {{ $activeTabs['leaderboards'] }}" data-menu="filters">Leaderboards</div>
        </li>
    </ul>
</div>
<div id="search" class="row player-menu {{ $activeTabs['players'] }}">
    <div class="col-12">
        <h3 class="">Search for an active player</h3>
    </div>
    <div class="col-md-6 by-player flex-column">
        <form method='GET'>
            <div class="form-group">
                <input type='text' name='player' value='<?= $form->prefill(' player ') ?>' class='mb-3'>
                <input type='submit' value='Search' class='btn btn-primary ml-sm-3'>
            </div>
        </form>
    </div>
</div>
<div id="filters" class="row player-menu {{ $activeTabs['leaderboards'] }}">
    <div class="col-12">
        <h3 class="">Filter by team</h3>
    </div>
    <div class="col-md-12 p-3">
        <form method='GET'>
            <select name='team'>
                <option value='all'>All teams</option>
                <?php foreach ($teamList as $teamInfo => $teamObj) :?>
                <option <?= $teamSearch == $teamObj->ta ? ' selected="selected"' : '';?> value=' <?= $teamObj->ta ?>'><?= $teamObj->tc.' '.$teamObj->tn ?>
                </option>
                <?php endforeach ?>
            </select>
            <label class='d-block mt-3'>
                <input type='checkbox' name='photos' value='hide' <?= $photos == 'hide' ? 'checked' : '' ?>> Hide photos</label>
            <input type='submit' value='Filter' class='btn btn-primary d-block mt-3'>
        </form>
    </div>
</div>
