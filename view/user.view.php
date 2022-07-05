<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/styles/header.css">
    <link rel="stylesheet" href="./assets/styles/main.css">
    <title>Posts</title>
</head>

<body>

    <?php include_once 'header.view.php'; ?>


    <main class="formulaire">
        <form method="post" class="connexion-form">
            <input type="text" name="username" placeholder="Username">
            <input type="password" name="password" placeholder="Password123">
            <input type="submit" name="connexion" class="btn-submit">
            <?php
if (isset($connexionError)) {
    echo $connexionError;
}
?>


        </form>


    </main>
</body>

</html>