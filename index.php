<?php

// This file is your starting point (= since it's the index)
// It will contain most of the logic, to prevent making a messy mix in the html

// This line makes PHP behave in a more strict way
declare(strict_types=1);

// We are going to use session variables so we need to enable sessions
session_start();

// Use this function when you need to need an overview of these variables
function whatIsHappening() {
    echo '<h2>$_GET</h2>';
    var_dump($_GET);
    echo '<h2>$_POST</h2>';
    var_dump($_POST);
    echo '<h2>$_COOKIE</h2>';
    var_dump($_COOKIE);
    echo '<h2>$_SESSION</h2>';
    var_dump($_SESSION);
}

// TODO: provide some products (you may overwrite the example)
$products = [
    ['name' => 'Event Photographer', 'price' => 350],
    ['name' => 'Promotional Video', 'price' => 1000],
    ['name' => 'Logo-Design', 'price' => 300],
    ['name' => 'General Prints', 'price' => 200],
    ['name' => 'Create Your Website', 'price' => 2000]
];

$totalValue = 0;

#function validate()
#{
#    // TODO: This function will send a list of invalid fields back
#    return [];
#}
#
#function handleForm()
#{
#    // TODO: form related tasks (step 1)
#
#    // Validation (step 2)
#    $invalidFields = validate();
#    if (!empty($invalidFields)) {
#        // TODO: handle errors
#    } else {
#        // TODO: handle successful submission
#    }
#}
#
#// TODO: replace this if by an actual check
#$formSubmitted = false;
#if ($formSubmitted) {
#    handleForm();
#}
#
bool: $valid = false;

function emptyCheck(){
    var_dump($_POST);
    foreach($_POST as $key => $value){
        if($value == ""){
            $valid = false;
            return $valid;
        }else{
            $valid= true;
            return $valid;
        }
    }
    
}
function isValid($validator){
    if($validator){
        echo "everything is ready for process";
    }else{
        echo "noooooooooooooooooooooooooooooob";
    }
}
if(isset($_POST['btn'])) {
    $_POST['btn'] = "clicked";
    $valid = emptyCheck();
    isValid($valid);
    
}
require 'form-view.php';