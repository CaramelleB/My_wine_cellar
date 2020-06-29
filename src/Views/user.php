<?php require(ROOT . '/src/Views/Layout/menu.php'); ?>
<div class="show">
    <a href="?url=slider.slide"><img src="img/logo-blanc.png" alt="Logo My Cave" class="logo"></a>
    <div class="login">
        <img src="img/tonneaux.png" alt="tonneaux" class="tonneaux">
        <div class="white-round">
            <div class="round"></div>
            <form class="login-form" method="post" id="login_form" enctype="multipart/form-data">       
                <input type="text" name="username" id="Username" placeholder='Username' onfocus="changeOutputUser('<?= $user['username'] ?>')">
                <input type="password" name="password" id="Password" placeholder="Password">
                <i class="fas fa-eye" id="y" onclick="showPassword()"></i>
                <button type="submit" name="submit" class="btn-log btn-log-2">UPDATE</button>
            </form>
        </div>
    </div>
    <?php if($popup != ''): ?>
        <div class='overpop pop'>
            <div class='popup pop'>
                <i class="fas fa-times closePop" id="closePop" onclick="closePopUp()" ></i>
                    <p class="popText"><?= $popup ?></p>
            </div>
        </div>
    <?php endif ?>
</div>
