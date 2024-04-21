<?php
namespace App\Controlles;
use App\Services\PostService;
use App\Controlles\User;

class PostController {


    public function getPost()
    {
        echo 'je suis un post';
    }

    public function newPost()
    {
        session_start();
        $postService =  new PostService();
        $newPost = $postServict->addNewPost($_POST['title'],$_POST['content'],$_POST['tag'],$_SESSION['userId']);
        if ($newPost !== null) {
            include "../app/Views/ListAllPostsView.php";
        }
        
    }

    public function updatePost()
    {
        $post =  new PostService();
        $post->updatePost();
        
    }

    public function listPost()
    {
        $postService =  new PostService();
        $allPosts = $postService->listPost();
        if ($allPosts !== null) {
            include "../app/Views/ListAllPostsView.php";
        }
        
    }

    public function userPosts()
    {
        session_start();
        $userId = $_SESSION['userId'];
        $postService =  new PostService();
        $posts = $postService->userPosts($userId);
        if ($posts !== null) {
            include "../app/Views/ListPostsUserView.php";
        }
    }

}