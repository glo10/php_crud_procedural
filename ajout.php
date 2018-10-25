<?php
    if(
        isset($_POST['lastName'])   && 
        isset($_POST['firstName'])  && 
        isset($_POST['old'])        && 
        !empty($_POST['lastName'])  && 
        !empty($_POST['firstName']) && 
        !empty($_POST['old']) 
    ){
        require_once 'connexion.php';
        array_map('htmlspecialchars',$_POST);
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $old = $_POST['old'];
        $insert = $pdo->prepare('
                                    INSERT 
                                    INTO eleve(nom,prenom,age)
                                    VALUES(:nom,:prenom,:age)
                                ');

        $insert->bindParam(':nom',$lastName);
        $insert->bindParam(':prenom',$firstName);
        $insert->bindParam(':age',$old);

        $insert->execute();
    }

    header('location:list.php');