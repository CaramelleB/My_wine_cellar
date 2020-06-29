<?php

namespace App\Controller;

use \App\Model\LoginModel;
use \App\App;

class LoginController extends Controller{

    public function login(){
        $errors = '';
        if (isset($_POST['submit'])) {
            if(empty($_POST['username']) || empty($_POST['password'])){
                $errors .= 'Username and Password are required';
            }
            elseif(!empty($_POST['username']) || !empty($_POST['password'])){
                $id = new LoginModel(App::getInstance()->getDb());
                if($id->login($_POST['username'], $_POST['password'])){
                    header('Location: index.php?url=slider.slide');
                } else {
                    $errors .= 'Username or Password is wrong';
                }
            }   
        }
        $this->render('login', compact('errors'));
    }

    public function logout(){
        $logout = session_unset();
        header('Location: index.php?');
    }

}