<?php
namespace App\Services;
use App\Models\User;
use App\Models\Post;
use Database\DbConnection;

class PostService{

    private DbConnection $dbConnection;

    public function __construct()
    {
        $this->dbConnection = new DbConnection('myapp','localhost:3306','root','');
    }

    public function addNewPost(string $title, string $name, int $tag,int $userId){

        $post = Post::savePost($this->dbConnection->getPDO(), $title,$name,$tag,$userId);
    }

    public function updatePost(){

        foreach($_POST as $key => $value)
        {
            $params[$key] = $value;
        }
        if (isset($params)){
            //add user id from session
            $post = Post::updatePost($this->dbConnection->getPDO(), 1,$params);
        }
    }

    public function listPost(){

        $allPosts = Post::getAllPosts($this->dbConnection->getPDO());
        if ($allPosts !== null) {
            return $allPosts;
        }
        return null;
    }

    public function userPosts(int $userId){

        $posts = Post::getPostsByUser($this->dbConnection->getPDO(), $userId);
        if ($posts !== null) {
            return $posts;
        }
        return null;
    }
    
}

