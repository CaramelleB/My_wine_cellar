<?php

namespace App\Model;

class UserModel extends Model{


    public function update($username, $userPassword, $userId)
    {   
        $attributes = [];
        $attributes[] = strip_tags($username);
        $attributes[] = sha1($userPassword);
        $attributes[] = $userId;
        $user = $this->db->prepare("UPDATE user SET username = ? , password = ? WHERE id = ?", $attributes, true);
        if($user){
            return true;
        }
        return false;
    }
}