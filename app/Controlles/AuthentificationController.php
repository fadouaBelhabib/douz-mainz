<?php
namespace App\Controlles;
use App\Services\AuthentificationService;
use App\Models\User;

class AuthentificationController {

    public $email;
    public $password;

    public function indexAction() {
		//View::renderTemplate('Login/new.html');
	}

    public function checkUser()
    {
        session_start();
        $authentificationService = new AuthentificationService();
        $user = $authentificationService->checkUserExist($_POST['email'],$_POST['password']);

        if ($user !== null) {
            $_SESSION['userId'] = $user->id;
            $_SESSION['userName'] = $user->name;
        }
        header("Location: /");
    }

    public function newUser()
    {
        $authentificationService =  new AuthentificationService();
        $emailUsed = $authentificationService->isEmailUsed($_POST['email']);
        if ($emailUsed === false) {
            $authentificationService->saveNewUser($_POST['name'],$_POST['email'],$_POST['password'],$_POST['confirmpassword']);
            header("Location: /");
        } else {
            header("Location: /register?error=email_used");
        }
    }

    public function register()
    {
        include "../app/Views/RegisterView.php";
    }

    public function logout()
    {
        session_start();
        session_destroy();
        header("Location: /");
    }

}