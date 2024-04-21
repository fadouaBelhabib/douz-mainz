<?php
require '../vendor/autoload.php';
use App\Controlles\PostController;
use App\Controlles\UserController;
use App\Controlles\AuthentificationController;

$router = new AltoRouter();

$router->map('GET','/',UserController::class,'home');
$router->map('GET','/logout',AuthentificationController::class,'logout');
$router->map('POST','/post',PostController::class,'getPost');
$router->map('GET','/show',PostController::class,'show');
$router->map('POST','/CheckUser',AuthentificationController::class,'checkUser');
$router->map('GET','/register',AuthentificationController::class,'register');
$router->map('POST','/register',AuthentificationController::class,'newUser');
$router->map('POST','/newpost',PostController::class,'newPost');
$router->map('POST','/UpdatePost',PostController::class,'updatePost');
$router->map('POST','/UpdateUser',UserController::class,'updateUser');
$router->map('GET','/profil',UserController::class,'profil');
$router->map('GET','/myposts',PostController::class,'userPosts');
$router->map('GET','/allposts',PostController::class,'listPost');

$match = $router->match();

if(is_array($match))  {
    $params = $match['params'];
    $controller = new $match['target'];
    $controller->{$match['name']}();
} else {
    include "../app/Views/LoginView.php";
}

?>