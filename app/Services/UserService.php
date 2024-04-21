<?php
namespace App\Services;
use App\Models\User;
use App\Models\Post;

class UserService{

    public function updateUser(){

        foreach($_POST as $key => $value)
        {
            $params[$key] = $value;
        }
        
        if (isset($params)){
            if (isset($params['confirmpassword'])){
                if (!password_verify($password, $user->password_hash)){
                    return false;
                }
            }
            //add user id from session
                $post = User::updateUser(1,$params);
        }
    }
//comment envoyer les infos to view pour l'affichage
    public function getInfoUser(int $userId){

        $user = User::getUserById($userId);
    
        if ($user !== null) {
            return $user;
        }
        return null;

    }

}