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
$valid = [];
$valid['bool']=false;
function emptyCheck($email,$city,$street,$number,$zipcode){
    var_dump($_POST);
    #$validEmailExtention = [".com",".be",".org"];
    #$emailMustContain = ["@hotmail","@yahoo","@outlook","@becode"];
    foreach($_POST as $key => $value){
        if($value == ""){
            $valid['bool']=false;
            $valid['error']='The forms are empty. Fill in the forms!!';
            $valid['emailPlaceholder']="wrong input";
            $valid['streetPlaceholder']="wrong input";
            $valid['cityPlaceholder']="wrong input";
            $valid['numberPlaceholder']="wrong input";
            $valid['zipcodePlaceholder']="wrong input";
            return $valid;
        }elseif(!is_numeric($zipcode)){
            $valid['bool']=false;
            $valid['error']='wrong zipcode input';
            $valid['emailPlaceholder']=$email;
            $valid['streetPlaceholder']=$street;
            $valid['cityPlaceholder']=$city;
            $valid['numberPlaceholder']=$number;
            $valid['zipcodePlaceholder']="wrong input";
            return $valid;
        }/*elseif($_POST['email'] !== ""){
            $success = false;
            foreach($validEmailExtention as $value){
                if(strpos($email,$value)>-1){
                    $success = true;
                }
            }
            if($success == true){
                foreach($emailMustContain as $containValue){
                    if(strpos($email,$containValue)>-1){
                        $valid['bool']= true;
                        $valid['error']='successfull';
                        return $valid;
                    }
                }
            }else{
                $valid['bool']= false;
                $valid['error']='Wrong email input';
                return $valid;
            }
        }*/
        elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $valid['bool']= false;
            $valid['error']='Wrong email input';
            $valid['emailPlaceholder']="wrong input";
            $valid['streetPlaceholder']=$street;
            $valid['cityPlaceholder']=$city;
            $valid['numberPlaceholder']=$number;
            $valid['zipcodePlaceholder']=$zipcode;
            return $valid;
          }
        elseif(filter_var($email, FILTER_VALIDATE_EMAIL)){
            $valid['bool']= true;
            $valid['error']='Successfull';
            $valid['emailPlaceholder']=$email;
            $valid['streetPlaceholder']=$street;
            $valid['cityPlaceholder']=$city;
            $valid['numberPlaceholder']=$number;
            $valid['zipcodePlaceholder']=$zipcode;
            return $valid;
        }
        else{
            $valid['bool']= true;
            $valid['error']='successfull';
            $valid['emailPlaceholder']=$email;
            $valid['streetPlaceholder']=$street;
            $valid['cityPlaceholder']=$city;
            $valid['numberPlaceholder']=$number;
            $valid['zipcodePlaceholder']=$zipcode;

            return $valid;
        }
    }
    
}
function isValid($validator){
    if($validator){
        $shipmentArray =[];
        echo "everything is ready for process";
        foreach($_POST as $key => $value){
            $shipmentArray[$key]=$value;
        }
        unset($shipmentArray['btn']);
        return $shipmentArray;
    }
    elseif(!$validator){
        $shipmentArray['select your items']='and fill in the form';
        return $shipmentArray;
    }
}
function priceCalc($array,$prod){
    $price = 0;
    if($array){
        foreach($array as $key => $value){
            $price += $prod[$key]['price'];
        }
        return $price;
    }
    $price = 0;
    return $price;
}
function sessionData($posted){
    $session = [];
    $session = $posted;
    return $session;
        
}
if(isset($_POST['btn'])){
    $_POST['btn'] = "clicked";
    $valid = emptyCheck($_POST['email'],$_POST['city'],$_POST['street'],$_POST['streetnumber'],$_POST['zipcode']);
    $orderData = isValid($valid['bool']);
    $price = priceCalc($orderData['products'],$products);
    $_SESSION = sessionData($orderData);
    echo "SESSION_DATA";
    var_dump($_SESSION);
}
if(isset($_POST['btn1'])){
  
}
require 'form-view.php';