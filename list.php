<?php

    require_once 'connexion.php';

   $select = '  SELECT * 
                FROM eleve
            ';
    $result = null;
    if(isset($_POST['search']) && !empty($_POST['search'])){
        //Filter
        $search = '%'.htmlspecialchars($_POST['search']).'%';
        $result = $pdo->prepare($select.' WHERE nom LIKE :nom OR prenom LIKE :prenom');
        $result->bindParam(':nom',$search);
        $result->bindParam(':prenom',$search);
    }else{
        //No filter
        $result = $pdo->query($select);
    }

   $result->execute();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/app.css">
    <title>Liste des élèves</title>
</head>
<body>
    <main class="container">
        <h2>Liste des élèves</h2>
        <div class="row">
            <form action="list.php" method="POST">
                <input type="text" placeholder="Recherche" name="search">
                <input type="submit" class="btn btn-info" value="Rechercher">
            </form>
            <div>
                <a class="btn btn-primary" href="form.php">Ajouter une personne</a>
            </div>
        </div>
        <div class="row">
            <table class="table table-striped table-responsive">
                <thead>
                    <th>Identifiant</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Age</th>
                    <th></th>
                    <th></th>
                </thead>
                <tbody>
                    <?php
                        while($eleve =$result->fetch()){?>
                            <tr>
                                <td><?=$eleve['id']?></td>
                                <td><?=$eleve['nom']?></td>
                                <td><?=$eleve['prenom']?></td>
                                <td><?=$eleve['age']?></td>
                                <td><a class="btn btn-danger" href="supprimer.php?id=<?=$eleve['id']?>">X</a></td>
                                <td><a class="btn btn-warning" href="modifierForm.php?id=<?=$eleve['id']?>">!</a></td>
                            </tr>
                        <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>