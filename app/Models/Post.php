<?php
namespace App\Models;
use PDO;

class Post {

    public int $id;
    public string $title;
    public string $content;
    public string $tag;
    public int $userId;

    static function savePost(PDO $con, string $title,string $content, int $tag,int $user_id){
    
        if (isset($con)) {
         $sql = 'INSERT INTO posts (title,content,tag,user_id)
         VALUES (:title,:content,:tag,:user_id);';
         $stmt = $con->prepare($sql);
         $stmt->execute(['title' => $title,'content' => $content,'tag' => $tag,'user_id' => $user_id]);
         return $stmt->fetch(PDO::FETCH_ASSOC);
        }
     }

     static function getAllPosts(PDO $con){
        if (isset($con)) {
         $sql = 'SELECT * FROM posts';
         $stmt = $con->prepare($sql);
         $stmt->execute();
         $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
         $postList = [];
         foreach($result as $elt) {
            $postList[] = self::createFromArray($elt);
         }

         return $postList;
        }
     }

     static function getPostsByUser(PDO $con, int $userId){
        if (isset($con)) {
         $sql = 'SELECT * FROM posts WHERE user_id = :user_id';
         $stmt = $con->prepare($sql);
         $stmt->execute(['user_id' => $userId]);
         return $stmt->fetch(PDO::FETCH_ASSOC);
        }
     }

     static function getPostByTag(PDO $con, int $tag){
        if (isset($con)) {
         $sql = 'SELECT * FROM posts WHERE tag = :tag';
         $stmt = $con->prepare($sql);
         $stmt->execute(['tag' => $tag]);
         return $stmt->fetch(PDO::FETCH_ASSOC);
        }
     }

     static function updatePost(PDO $con, string $idUser, array $params){
        if (isset($con)) {
            //i don't know the number of paramas
            foreach(self::UPDATE_PARAMS as $param){
                /*$sql = 'UPDATE users
                SET ".$key. ':'.$key;
                WHERE id = :idUser';
                $stmt = $con->prepare($sql);
                $stmt->execute(['idUser' => $idUser,'idUser' => $idUser]);
                return $stmt->fetch(PDO::FETCH_ASSOC);*/
        }
        }
     }

     private static function createFromArray(array $data): Post
     {
         $post = new Post();
         
         $post->id = $data['id'];
         $post->title = $data['title'];
         $post->content = $data['content'];
         $post->tag = $data['tag'];
         $post->userId = $data['user_id'];

         return $post;
     }
}