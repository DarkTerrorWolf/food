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
//order path
$f3->route('GET|POST /order',function($f3) {

    //if the form has been submitted
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        var_dump($_POST);
        //array(2) {["food"]=> "tacos", ["meal"]=> "breakfast" }

        //validate data
        $meals = array("Breakfast","Lunch","Dinner");
        if(empty($_POST['food'])){
            echo "<p>Please enter a food</p>";
        }
        if(empty($_POST['meal']|| !in_array($_POST['meal'],$meals))){
            echo "<p>Please choose a meal time</p>";
        }
        //Data is valid
        else{
            //Store the data in the session array
            //start a session
            session_start();
            $_SESSION['food'] =$_POST['food'];
            $_SESSION['meal']=$_POST['meal'];
            $f3 ->reroute("summary");
            session_destroy();
        }
    }
    $view = new Template();
    echo $view->render("views/orderform.html");

});
$f3->route('GET /summary',function() {

    $view = new Template();
    echo $view->render("views/summary.html");

});

$f3->run();