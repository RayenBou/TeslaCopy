<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/styles/header.css">
    <link rel="stylesheet" href="./assets/styles/main.css">
    <title>products</title>
</head>

<body>
    <header>
        <nav>
            <a href="?view=products"><img src="./assets/logostarbuck.png" alt="logo" id="logo"></a>
            <ul id="navbar">
                <li><a href="?view=products" class="link">Home</a></li>
                <li><a href="?view=admin&deconnexion=1" class="link">Deconnexion</a></li>
                <li><a href="?view=admin" class="link">Admin</a></li>

            </ul>
        </nav>
    </header>
    <main>
        <div class='products'>

            <?php

if (isset($products)) {
    foreach ($products as $product) {
        echo "<div class='product'>";
        echo "<div class='line'></div>";
        echo "<h1>" . $product['name'] . "</h1>";
        echo "<br/>";
        echo "<a href='?id=" . $product['id'] . "'>Acceder a l'article</a>";

        echo "<a href='?view=admin&delete=" . $product['id'] . "' class='btn-delete'>Delete</a>";

        echo "</div>";
    }
    ?>

        </div>


        <?php } elseif (isset($product)) {

    echo "<div class='product'>";
    echo "<div class='line'></div>";
    echo "<h1>" . $product['name'] . "</h1>";
    echo "<p>" . $product['description'] . "</p>";
    echo "<p>" . $product['size'] . "</p>";
    echo "<p>" . $product['price'] . "</p>";
    echo "<p>" . $product['category'] . "</p>";

    echo "</div>";

} ?>





    </main>
</body>

</html>