<?php
include_once 'model/product.model.php';

class ProductController
{
    private $__post;

    public function getProducts()
    {
        $this->post = new ProductModel();
        $product = $this->post->getProducts();

        return $product;
    }

    public function getSpecificProduct($id)
    {
        $this->product = new ProductModel();
        $product = $this->product->getSpecificProduct($id);

        return $product;
    }
    public function getProductsByFilter($size, $color, $category)
    {
        $this->product = new ProductModel();
        $product = $this->product->getProductsByFilter($size, $color, $category);

        return $product;
    }

    public function getProductsBySearch($search)
    {
        $this->product = new ProductModel();

        $products = $this->product->getProductsBySearch($search);

        return $products;
    }

    public function addProduct()
    {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $size = $_POST['size'];
        $category = $_POST['category'];
        $color = $_POST['color'];

        $this->post = new ProductModel();
        $this->post->addProduct($name, $description, $price, $size, $category, $color);
    }

    public function deleteProduct($id)
    {
        $this->post = new ProductModel();
        $this->post->deleteProduct($id);
    }
}