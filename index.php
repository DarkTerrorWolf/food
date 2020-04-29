<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once('vendor/autoload.php');

//F3 class
$f3 = Base::instance();

//Route
$f3->route('GET /', function () {
    //.echo "<h1>Welcome to my food page</h1>";
    $view = new Template();
    echo $view->render("views/home.html");
});
//breakfast route
$f3->route('GET /breakfast',function() {
    //echo "<h1>Welcome to my Breakfast page </h1>";
    $view = new Template();
    echo $view->render("views/bfast.html");

});
//breakfast green eggs and ham route
$f3->route('GET /breakfast/green-eggs',function() {
    //echo "<h1>Welcome to my Breakfast page </h1>";
    $view = new Template();
    echo $view->render("views/greenEggsAndHam.html");

});

//breakfast green eggs and ham route
$f3->route('GET /lunch',function() {
    //echo "<h1>Welcome to my Breakfast page </h1>";
    $view = new Template();
    echo $view->render("views/lunch.html");

});
$f3->route('GET /order',function() {
    //echo "<h1>Welcome to my Breakfast page </h1>";
    $view = new Template();
    echo $view->render("views/orderform.html");

});


$f3->run();