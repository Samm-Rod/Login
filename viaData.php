<?php
    require 'connectDb.php';
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $pass = filter_input(INPUT_POST, 'senha');

        if($email && $pass){
            $sql = $pdo->prepare("SELECT * FROM datas WHERE email = :email");
            $sql->bindValue(':email',$email);
            $sql->execute();

            if($sql->rowCount() === 0){
                $sql = $pdo->prepare("INSERT INTO datas(email, senha) VALUES (:email, :senha)");
                $sql->bindValue(':email',$email);
                $sql->bindValue(':senha',$pass);
                $sql->execute();

                header("Location: main.php");
                exit;
            }else{
                header("Location: login.php");
            }

        }else{
            header("Location: login.php");
            exit;
        }
?>