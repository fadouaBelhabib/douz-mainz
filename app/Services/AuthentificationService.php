<?php
namespace App\Services;
use App\Models\User;

class AuthentificationService{

    public function checkUserExist(string $email, string $password){
        
        $user = User::getUserByEmail($email);

        if ($user !== null) {
			if (password_verify($password, $user->passwordHash) === true) {
				return $user;
			}
		}
		return null;

    }

    public function saveNewUser(string $name,string $email, string $password, string $confirmPassword){
        
        if ($password === $confirmPassword) {
            return User::saveUser($name, $email, $password);
		}
		return false;

    }

    public function isEmailUsed(string $email): bool
    {
        $user = User::getUserByEmail($email);

        if($user !== null) {
            return true;
        }

        return false;
    }
    
}