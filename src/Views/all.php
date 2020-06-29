<?php require(ROOT . '/src/Views/Layout/menu.php'); ?>
<div class="show">
    <a href="?url=slider.slide"><img src="img/logo-blanc.png" alt="Logo My Cave" class="logo"></a>
    <input type="text" class="research" id="myInput" onkeyup="searchWine()" placeholder="My search"><i class="fas fa-search"></i> </input>
    <div class="row row-all" id="all">
        <?php foreach ($wines as $wine): ?>
            <div class="contenu-vignette">
                <div class="vignette">
                    <div class="purple-block purple-block-vignette">
                        <div class="year-rotate year-rotate-vignette">
                            <h3 class="year year-vignette load"><?= $wine->wine_year ?></h3>
                        </div>
                    </div>
                    <div class="white-block white-block-vignette">
                        <button class="eraser" onclick="confirmDelete(<?= $wine->id ?>)" class="btn-log btn-log-2">
                            <i class="fas fa-times fa-eraser"></i>
                        </button>       
                        <img class="bottle bottle-vignette load" src="img/<?= $wine->picture ?>" alt="<?= $wine->name ?>">
                        <h2 class="name-vignette load"><a href="#"><?= $wine->name ?></a></h2>
                        <h3 class="origin origin-vignette load"><?= $wine->country ?>, <?= $wine->region ?></h3>
                        <h3 class="grapes grapes-vignette load">Grapes : <span><?= $wine->grape ?></span></h3>
                        <p class="description description-vignette style-1 load"><?= $wine->description ?></p>
                        <div class="row-stock-vignette">
                            <h3 class="stock stock-vignette">En stock : <span><?= $wine->number ?></span></h3>
                            <div class="add-stock add-stock-vignette" >
                                <form action='?url=wines.stock&id=<?= $wine->id ?>&stock=<?= $wine->number; ?>' method="post">
                                    <button type="add"  name="action" class="btn-stock" value="add">+</button>
                                    <button type="remove" name="action" class="btn-stock" value="remove">-</button>
                                    <select name="stock-select" class="stock-select stock-select-vignette">
                                        <option value=""></option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="5">5</option>
                                        <option value="10">10</option>
                                        <option value="20">20</option>  
                                    </select>  
                                </form>                          
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>   
    </div>
    <div class='overpop pop' id="pop" >
        <div class='popup pop' id='deletePopup'>
            <i class="fas fa-times closePop" id="closePop" onclick="closePopUp()" ></i>
            <form class="eraseForm" method="post" id="delete_form" action='?'> 
                <h3 class="popText">Are you sure you want to delete this item ?</h3>
                <button class="confirmDelete" type="delete" name="delete"  value="delete">Yes</button></a>
            </form>
        </div>
    </div> 
</div>
