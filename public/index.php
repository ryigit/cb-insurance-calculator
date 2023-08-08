<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Coolblue\Interview\Controller\TypeController;
use Coolblue\Interview\Controller\ProductController;

use Coolblue\Interview\Core\Router;

use Coolblue\Interview\Database\MySql;
use Coolblue\Interview\Entity\ProductEntity;
use Coolblue\Interview\Entity\ProductTypeEntity;
use Coolblue\Interview\Repository\ProductRepository;
use Coolblue\Interview\Repository\TypeRepository;

$request = $_SERVER['REQUEST_URI'];

// If needed another adapter can be implemented and passed to repositories.
$db = new MySql();

$productEntity = new ProductEntity($db);
$productTypeEntity = new ProductTypeEntity($db);

$productRepository = new ProductRepository($productEntity);
$typeRepository = new TypeRepository($productTypeEntity);

$router = new Router();
$typeController = new TypeController($typeRepository);
$productController = new ProductController($productRepository);

$router->addRoute('GET', '/', function () {
    echo 'Welcome...';
    return true;
});

$router->addRoute('GET', '/types/:id', function ($id) use ($typeController) {
    echo json_encode($typeController->getTypeById($id));
    exit();
});

$router->addRoute('GET', '/product/:id', function ($id) use ($productController) {
    echo json_encode($productController->getProductById($id));
});

$router->addRoute('GET', '/product/insurance/:id', function ($id) use ($productController) {
    echo json_encode($productController->getInsuranceFeeForProduct($id));
});

try {
    $router->matchRoute();
} catch (Exception $e) {
    echo 'Failed To Route, Error:' . $e->getMessage();
}
