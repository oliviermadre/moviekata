<?php

spl_autoload_register(function ($class_name) {
    $class_name =  str_replace('\\', '/', $class_name);
    require_once  __DIR__ . '/app/' . $class_name . '.php';
});

use MovieRental\Movie;
use MovieRental\Rental;
use MovieRental\Customer;

$movie = new Movie("Transformer", Movie::REGULAR);
$rental = new Rental($movie, 3);
$customer = new Customer("jpartogi");
$customer->addRental($rental);
$statement = $customer->statement();
print_r( $statement );