<?php
    if(isset($_GET['id']) && !empty($_GET['id'])){
        require_once 'connexion.php';
        $id = htmlspecialchars($_GET['id']);
        $select = $pdo->prepare('SELECT nom,prenom,age FROM eleve WHERE id = :id');
        $select->bindParam(':id',$id);
        $select->execute();

        $result = $select->fetch();
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/app.css">
    <title>Modifier un utilisateur</title>
</head>
<body>
    <main class="container">
        <h2>Modifier l'élève</h2>
        <form action="modifier.php" method="POST" class="form-horizontal">
            <div class="form-group">
                <input type="hidden" name="id" value="<?=$id?>" >
                <input type="text" name="lastName" placeholder="Saisir votre nom" value="<?=$result['nom']?>">
            </div>
            <div class="form-group">
                <input type="text" name="firstName" placeholder="Saisir votre prénom" value="<?=$result['prenom']?>">
            </div>
            <div class="form-group">
                <input type="text" name="old" placeholder="Saisir votre age" value="<?=$result['age']?>">
            </div>
            <div class="form-group">
                <input class="btn btn-success" type="submit" value="Modifier">
            </div>
        </form>
    </main>
</body>
</html>