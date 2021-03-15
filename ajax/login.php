<?php
require_once("../config.php");
class User{
    function Login($nickname,$password){
        $db = new Connect;
        $user = $db-> prepare("SELECT id FROM users WHERE nickname = :name AND password = :pass");
        $user->execute(array(
            'name'=> $nickname,
            'pass'=> $password
        ));

        if ($user -> rowCount() > 0){
            $con = 'Hi, ' .$nickname;
        }else{
            $con ='The nickname or password is incorrect!';
        }
        return $con;
    }
}

$user = new User;
echo $user -> Login($_POST['nickname'],$_POST['password']);
?>