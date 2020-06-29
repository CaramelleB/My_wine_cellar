<?php require(ROOT . '/src/Views/Layout/menu.php'); ?>
<div class="show">
    <a href="?url=slider.slide"><img src="img/logo-blanc.png" alt="Logo My Cave" class="logo"></a>
    <div class="login add">
        <img src="img/tonneaux.png" alt="tonneaux" class="tonneaux">
        <div class="white-round">
            <div class="round"></div>
            <form method="post" id="add_form" class="add-form" enctype="multipart/form-data">       
                <input type="text" class="add-input" name="name" id="name" placeholder="Name">
                <input type="text" class="add-input" name="country" id="country" placeholder="Country">
                <input type="text" class="add-input" name="region" id="region" placeholder="Region">
                <input type="text" class="add-input" name="grape" id="grape" placeholder="Grape">
                <input type="text" class="add-input" name="description" id="description" placeholder="Description">
                <div class="row row-add">
                    <input type="year" class="add-input" name="year" id="year" placeholder="Year">
                    <input type="number" class="add-input" name="nb" id="nb" placeholder="Nb">
                    <label>Load Picture<input type="file"  name="picture" id="picture" accept="image/png, image/jpeg, image/jpg, image/gif" ></label> 
                </div>
                <button type="submit" name="add" class="btn-log btn-log-2 btn-add">Add</button>
            </form>
        </div>
    </div>
    <?php if($errors != ''): ?>
        <div class='overpop pop'>
            <div class='popup pop'>
                <i class="fas fa-times closePop" id="closePop" onclick="closePopUp()" ></i>
                    <p class="popText"><?= $errors ?></p>
            </div>
        </div>
    <?php endif ?>
</div>