<?php
namespace App\Controlles;
use App\Services\UserService;

class UserController {


    public function updateUser()
    {
        $post =  new UserService();
        $post->updateUser();
        
    }

    public function home()
    {
        session_start();
        if(isset($_SESSION['userId']) === true && $_SESSION['userId'] > 0) {
            include "../app/Views/UserHomeView.php";
            die;
        }
        include "../app/Views/LoginView.php";
    }
//bouton retourner
    public function profil()
    {
        session_start();
        $userService = new UserService();
        $user = $userService->getInfoUser($_SESSION['userId']);
    
        if ($user !== null) {
            include "../app/Views/ProfilView.php";
        }

    }

}