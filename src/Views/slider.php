<?php require(ROOT . '/src/Views/Layout/menu.php'); ?>
<div class="contenu show">
    <?php foreach ($wines as $wine): ?>
        <div class="slider">
            <div class="purple-block">
                <div class="year-rotate">
                    <h3 class="year load"><?= $wine->wine_year ?></h3>
                </div>
            </div>
            <div class="white-block">
                <img class="bottle load" src="img/<?= $wine->picture ?>" alt="<?= $wine->name ?>">
                <h2 class="load"><?= $wine->name ?></h2>
                <h3 class="origin load"><?= $wine->country ?>, <?= $wine->region ?></h3>
                <h3 class="grapes load">Grapes : <span><?= $wine->grape ?></span></h3>
                <div class="col-desc">
                    <p class="description style-1 load"><?= $wine->description ?></p>
                    <div class="col-stock">
                        <h3 class="stock">En stock : <span><?= $wine->number ?></span></h3> 
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <?php foreach($buttons as $button): ?>
        <a href="?url=slider.slide&id=<?= $button->prev?>">
            <button id="prev" class="prev">
                <i class="fas fa-arrow-left"></i>
            </button>
        </a>
        <a href="?url=slider.slide&id=<?= $button->next?>">
            <button id="next"class="next" >
                <i class="fas fa-arrow-right"></i>
            </button>
        </a>
        <a href="?url=wines.index">
            <button class="btn-log btn-all">All Wines</button>
        </a>
        <a href="?url=slider.slide&id=<?= $button->magic?>">
            <button class="btn-log btn-magic">Magic Lottery</button>
        </a>
    <?php endforeach; ?>
</div>