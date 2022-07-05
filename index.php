<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
</head>

<?php
include_once "controller/product.controller.php";
include_once "controller/user.controller.php";

// ROUTEUR
class Router
{
    public function __construct()
    {
        $this->productController = new ProductController();
        $this->connexionController = new UserController();

    }
// afficher un seul post
    public function displaySpecificProduct()
    {
        $product = $this->productController->getSpecificProduct($_GET['id']);
        include_once "view/mainPage.view.php";
    }

    public function displayProductsByFilter()
    {
        $products = $this->productController->getProductsByFilter($_GET['size'], $_GET['color'], $_GET['category']);
        include_once "view/mainPage.view.php";
    }

    public function displayProductsBySearch()
    {

        $products = $this->productController->getProductsBySearch($_GET['search']);

        include_once "view/mainPage.view.php";
    }
    //vue
    //
    // afficher tout les products
    public function displayProducts()
    {
        $view = $_GET['view'];
        if ($_GET["view"] == "products") {
            // condition de remplissage des input a la creation d'un post
            if (isset($_POST['add-product'])
                && isset($_POST['name']) && isset($_POST['description'])
                && isset($_POST['price']) && isset($_POST['size'])
                && isset($_POST['category']) && isset($_POST['color'])
                && !empty($_POST['name']) && !empty($_POST['description'])
                && !empty($_POST['price']) && !empty($_POST['size'])
                && !empty($_POST['category']) && !empty($_POST['color'])) {
                $this->productController->addproduct();
            } else {
                $error = "<p class='error'>You must fill all the inputs</p>";
            }
            $products = $this->productController->getProducts();
            include_once "view/mainPage.view.php";
            //
            //
            // condition d'affichage des commande admin si cookie admin
        } elseif ($_GET['view'] == "admin") {
            if (isset($_COOKIE['role']) && $_COOKIE['role'] == "admin") {
                $products = $this->productController->getProducts();
                if (isset($_GET['delete'])) {
                    // suppression d'un post si url=delete
                    $this->productController->deleteProduct($_GET['delete']);
                    header("Location: ?view=admin");
                }
                // deconnexion si url= deconnexion
                if (isset($_GET['deconnexion']) && $_GET['deconnexion'] == 1) {
                    $this->connexionController->deconnexion();

                }
                include_once "view/admin.view.php";
            } else {
                echo "<p class='error'>You must be an admin to access this page</p>";
            }
            // connexion
        } elseif ($_GET['view'] == "connexion") {
            if (isset($_POST['connexion'])) {

                if ($this->connexionController->connexion($_POST['username'], $_POST['password']) == false) {

                    $connexionError = "compte inexistant";
                } else {
                    $this->connexionController->connexion($_POST['username'], $_POST['password']);
                    header("Location: index.php?view=admin");

                }
            }
            // verifiecation du cookie de connexion
            if (isset($_COOKIE['role']) && $_COOKIE['role'] == "admin") {

                header("Location: index.php?view=admin");
            } else {
                include_once "view/user.view.php";
            }
            include_once "view/user.view.php";

            // inscription

            // } elseif ($_GET['view'] == "inscription") {
            //     if (isset($_POST['inscription'])) {
            //         $this->inscriptionController->inscription($_POST['username'], $_POST['password'], $_POST['email'], $_POST['role']);
            //         if (!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['email']) && !empty($_POST['role'])) {
            //             header('Location: ?view=connexion');
            //         }
            //         // verifiecation du cookie de connexion

            //     } else {
            //         include_once "view/Inscription.vue.php";
            //     }

        }

        // erreur

        else {
            include_once "view/404.view.php";
        }

    }

}
$router = new Router();
if (isset($_GET['id'])) {
    $router->displaySpecificProduct();
} elseif (isset($_GET['search-submit'])) {
    $router->displayProductsBySearch();
} elseif (isset($_GET['filter-submit'])) {
    $router->displayProductsByFilter();
} else {
    $router->displayProducts();
}
?>

</html>