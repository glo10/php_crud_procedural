<?php
    print_r($_POST);
    if(
        isset($_POST['id'])         &&
        !empty($_POST['id'])        &&
        isset($_POST['firstName'])  &&
        !empty($_POST['firstName']) &&
        isset($_POST['lastName'])   &&
        !empty($_POST['lastName'])  &&
        isset($_POST['old'])        &&
        !empty($_POST['old'])
    ){
        array_map($_POST,htmlspecialchars);
        require_once 'connexion.php';

        $id = $_POST['id'];
        $nom = $_POST['lastName'];
        $prenom = $_POST['firstName'];
        $age = $_POST['old'];

        $update = $pdo->prepare('   UPDATE  eleve 
                                    SET     nom = :nom, 
                                            prenom = :prenom, 
                                            age = :age 
                                    WHERE   id = :id'
                                );

        $update->bindParam(':id',$id);
        $update->bindParam(':nom',$nom);
        $update->bindParam(':prenom',$prenom);
        $update->bindParam(':age',$age);

        $update->execute();
        header('location:list.php');
    }
    else{
        echo 'itiidojd';
    }