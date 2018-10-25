<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/app.css">
    <title>Ajouter un utilisateur</title>
</head>
<body>
    <main class="container">
        <h2>Ajouter un élève</h2>
        <div class="row">
            <form action="ajout.php" method="POST" class="form-horizontal">
                <div class="form-group">
                    <input type="text" name="lastName" placeholder="Saisir votre nom">
                </div>
                <div class="form-group">
                    <input type="text" name="firstName" placeholder="Saisir votre prénom">
                </div>
                <div class="form-group">
                    <input type="text" name="old" placeholder="Saisir votre age">
                </div>
                <div class="form-group">
                    <input type="submit" value="Valider">
                </div>
            </form>
        </div>
    </main>
</body>
</html>