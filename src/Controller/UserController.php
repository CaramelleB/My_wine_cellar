<?php

namespace App\Controller;

use \App\Model\LoginModel;
use \App\App;

class UserController extends Controller{

    public function __construct(){
        parent::__construct();
        $user = new LoginModel(App::getInstance()->getDb());
        if(!$user->logged()){
            $this->forbidden();
        }
        $this->loadModel('User');
        $this->loadModel('Login');
    }
    
    public function update(){
        $userId = $this->Login->getUserId();
        $user = $this->Login->getUserInfo($userId);
        $popup = '';
        if (isset($_POST['submit'])) {
            $username = $_POST['username'] ;
            $userPassword = ($_POST['password']);
            if(empty($username) || empty($userPassword)){
                $popup .= 'Username and Password are required';
            }
            elseif(!empty($username) || !empty($userPassword)){
                $userUpdate = $this->User->update($username, $userPassword, $userId);
                if($userUpdate){
                    $popup .= 'Account is updated !';
                    $user = $userUpdate;
                }
            }   
        }
        $this->render('user', compact('popup', 'user'));
    }
}