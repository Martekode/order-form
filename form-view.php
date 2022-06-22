<?php // This file is mostly containing things for your view / html ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" type="text/css"
          rel="stylesheet"/>
    <title>Kodesco</title>
</head>
<body>

<div class="container">
    <h1 style="text-align:center; margin-bottom:2em; margin-top:2em;">Welcome to Kodesco</h1>
    <h2>Place your order</h2>
    <?php // Navigation for when you need it ?>
    <?php /*
    <nav>
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link active" href="?food=1">Order food</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?food=0">Order drinks</a>
            </li>
        </ul>
    </nav>
    */ ?>
    <form method="post">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="email">E-mail:</label>
                <input value="<?php if(isset($_POST['btn'])){echo $valid['emailPlaceholder'];}?>" type="email" id="email" name="email" class="form-control"/>
            </div>
            <div></div>
        </div>

        <fieldset>
            <legend>Address</legend>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="street">Street:</label>
                    <input value="<?php if(isset($_POST['btn'])){echo $valid['streetPlaceholder'];}?>" type="text" name="street" id="street" class="form-control">
                </div>
                <div class="form-group col-md-6">
                    <label for="streetnumber">Street number:</label>
                    <input value="<?php if(isset($_POST['btn'])){echo $valid['numberPlaceholder'];}?>" type="text" id="streetnumber" name="streetnumber" class="form-control">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="city">City:</label>
                    <input value="<?php if(isset($_POST['btn'])){echo $valid['cityPlaceholder'];}?>" type="text" id="city" name="city" class="form-control">
                </div>
                <div class="form-group col-md-6">
                    <label for="zipcode">Zipcode</label>
                    <input value="<?php if(isset($_POST['btn'])){echo $valid['zipcodePlaceholder'];}?>" type="text" id="zipcode" name="zipcode" class="form-control">
                </div>
            </div>
        </fieldset>

        <fieldset>
            <legend>Products</legend>
            <?php foreach ($products as $i => $product): ?>
                <label>
					<?php // <?= is equal to <?php echo ?>
                    <input type="checkbox" value="<?=$product['name'] . ": " . $product['price']?>" name="products[<?php echo $i ?>]"/> <?php echo $product['name'] ?> -
                    &euro; <?= number_format($product['price'], 2) ?></label><br />
            <?php endforeach; ?>
        </fieldset>

        <button name="btn" type="submit" class="btn btn-primary">Order!</button>
        <div class="alert <?php if(isset($_POST['btn'])){ if($valid['bool']){echo "alert-success";}else{echo "alert-danger";}} ?> alert-dismissible fade show" role="alert">
            <strong><?php if(isset($_POST['btn'])){if($valid['bool']){echo $valid['error'];}elseif(!$valid['bool']){echo $valid['error'];}}?></strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </form>
    <div class="receit col-md-6" style="text-align:center; width:90%; margin-inline:auto;">
        <h2>Your Address:</h2>

        <p><em style="font-weight:bold;">Email: </em><?php if(isset($_POST['btn'])){if($valid['bool']){echo $orderData['email'];} }?></p>
        <p><em style="font-weight:bold;">Street: </em><?php if(isset($_POST['btn'])){if($valid['bool']){echo $orderData['street'] . ", ". $orderData['streetnumber'];}}?></p>
        <p><em style="font-weight:bold;">City: </em><?php if(isset($_POST['btn'])){if($valid['bool']){echo $orderData['city'] . ", " . $orderData['zipcode'];}}?></p>
        <h2>Your selected items:</h1>
        <ul>
            <?php if(isset($_POST['btn'])){if($valid['bool']){foreach ($orderData['products'] as $i => $order): ?>
                <li><?php echo $order;?></li>
            <?php endforeach;}} ?>
            
        </ul>
        <h1 style="color:green;">€ <?php if(isset($_POST['btn'])){if($valid['bool']){echo $price;}}?></h1>
    </div>
    <footer>You already ordered <strong>&euro; <?php echo $totalValue ?></strong> in food and drinks.</footer>
</div>

<style>
    footer {
        text-align: center;
    }
</style>
<!-- jQuery library -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>

<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
