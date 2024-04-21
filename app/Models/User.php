<?php
namespace App\Models;
use Database\DbConnection;
use PDO;

class User {

    public int $id;
    public string $email;
    public string $name;
    public string $passwordHash;
    
    private static function createFromArray(array $data) {
        $user = new User();

        $user->id = $data['id'];
        $user->email = $data['email'];
        $user->name = $data['name'];
        $user->passwordHash = $data['password'];

        return $user;
    }

    static function getUserByEmail(string $email){
       $db = new DbConnection('myapp','localhost:3306','root','');
       $con = $db->getPDO();
       if (isset($con)) {
            $sql = 'SELECT * FROM users WHERE email = :email';
            $stmt = $con->prepare($sql);
            $stmt->execute(['email' => $email]);
            if($stmt->rowCount() > 0){
                return self::createFromArray($stmt->fetch(PDO::FETCH_ASSOC));
            }
            return null;
        }
    }

    static function saveUser(string $name,string $email, string $password){
    
        $db = new DbConnection('myapp','localhost:3306','root','');
        $con = $db->getPDO();
        if (isset($con)) {
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);
            $sql = 'INSERT INTO users (name, email, password)
            VALUES (:name, :email, :password);';
            $stmt = $con->prepare($sql);
            return $stmt->execute(['name' => $name, 'email' => $email, 'password' => $passwordHash]);
        }

        return false;
    }

    static function updateUser(string $idUser, array $params){
        $db = new DbConnection('myapp','localhost:3306','root','');
        $con = $db->getPDO();
        if (isset($con)) {
            var_dump($params);die;
            //i don't know the number of paramas
           /* foreach($params as $key => $value){
                $sql = 'UPDATE users
                SET name = :name
                WHERE id = :idUser';
                $stmt = $con->prepare($sql);
                $stmt->execute(['idUser' => $idUser,'idUser' => $idUser]);
                return $stmt->fetch(PDO::FETCH_ASSOC);*/
        }
    }

    static function getUserById(int $userId){
        $db = new DbConnection('myapp','localhost:3306','root','');
        $con = $db->getPDO();
        if (isset($con)) {
             $sql = 'SELECT * FROM users WHERE id = :id';
             $stmt = $con->prepare($sql);
             $stmt->execute(['id' => $userId]);
             if($stmt->rowCount() > 0){
                 return self::createFromArray($stmt->fetch(PDO::FETCH_ASSOC));
             }
             return null;
         }
     }
}
