<?php

namespace App\Model;

use App\Database\Database;

class LoginModel{

    private $db;

    public function __construct(Database $db){
        $this->db = $db;
    }

    public function getUserId(){
        if($this->logged()){
            return $_SESSION['id'];
        }
        return false;
    }

    public function getUserInfo($userId){
        if($this->logged()){
            $user = $this->db->prepare('SELECT * FROM user WHERE id = ?', [$userId], null, true);
            $userInfo = [
                    "id" => $userId,
                    "username" => $user->username,
                    "password" => $user->password
            ];
           return($userInfo);
        }
    }

    /**
     * @param $username
     * @param $password
     * @return boolean
     */
    public function login($username, $password){
        $username = strip_tags($username);
        $user = $this->db->prepare('SELECT * FROM user WHERE username = ?', [$username], null, true);
        if($user){
            if($user->password === sha1($password)){
                $_SESSION['id'] = $user->id;
                return true;
            }
        }
        return false;
    }

    public function logged(){
        return isset($_SESSION['id']);
    }


}