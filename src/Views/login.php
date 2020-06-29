<img src="img/logo-blanc.png" alt="Logo My Cave" class="logo">
<div class="login">
    <img src="img/tonneaux.png" alt="tonneaux" class="tonneaux">
    <div class="white-round">
        <div class="round"></div>
        <form class="login-form" method="post" id="login_form" enctype="multipart/form-data">       
            <input type="text" name="username" id="Username" placeholder="ID">
            <input type="password" name="password" id="Password" placeholder="Password">
            <i class="fas fa-eye" id="y" onclick="showPassword()"></i>
            <button type="submit" name="submit" class="btn-log btn-log-2">Enter</button>
        </form>
    </div>
</div>

<?php if($errors != ''): ?>
    <div class='overpop pop'>
        <div class='popup pop'>
            <i class="fas fa-times closePop" onclick="closePopUp()" ></i>
                <p class="popText"><?= $errors ?></p>
        </div>
    </div> 
    
<?php  endif ?>
