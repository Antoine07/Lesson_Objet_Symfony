<?php
// importer les namespaces PHP 7.1
// require_once __DIR__ . '/src/Product.php';
// require_once __DIR__ . '/src/Storable.php';
// require_once __DIR__ . '/src/StorageArray.php';
// require_once __DIR__ . '/src/Cart.php';

spl_autoload_register(function ($className) {

    $originClass = $className;

    $namespace = 'App\\';
    $dir = __DIR__ . '/src/';

    // optimisation
    $classAutoload = [
        'App\\Product' =>  $dir . 'Product.php',
        // ...
    ];

    if (array_key_exists($className, $classAutoload)) {

        require_once $classAutoload[$className];

        // die('optimized');

        return;
    }

    $className = substr($className, strlen($namespace));
    $fileName =  $dir . str_replace('\\', '/', $className) . '.php';

    if (file_exists($fileName)) {
        require_once $fileName;

        return;
    }

    // die($className);

    // si quelque chose arrive de pas prévu par le code on lance une exception
    // @todo notion qui sera revu dans le détails dans Symfony
    throw new Exception(sprintf('la classe %s n\'existe pas', $originClass));
});

// alias de namespace
use App\Cart;
use App\Product;
use App\StorageArray;
use App\Providers\FlashMessage;

try {
    // Quelques produits
    $dbProducts = [
        'apple'      => 10.5,
        'raspberry'  => 13,
        'strawberry' => 7.8,
    ];



    // instancier votre panier et commander quelques produits que vous supprimerez également
    $products = [];
    foreach ($dbProducts as $name => $price) $products[$name] = new Product($name, $price);

    echo '<pre>';
    print_r($products);
    echo '</pre>';

    // clé du tableau associatif en nom variable
    extract($products);

    $cart = new Cart(new StorageArray);

    // chainage des méthodes
    $cart->buy($apple, 7)->buy($apple, 8);

    echo '<pre>';
    print_r($cart);
    echo '</pre>';


    // psr 4
    $flashMessage = new FlashMessage;

    echo '<pre>';
    print_r($flashMessage);
    echo '</pre>';

    $myClass = new SuperClass;
} catch (Exception $e) {

    die($e->getMessage());
}
