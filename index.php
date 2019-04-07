<!--

Kaephas Kain
4-6-2019
http://kaephas.greenriverdev.com/IT328/Cupcakes/index.php

Takes a cupcake "order" and prints the order and cost.


-->
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cupcakes</title>
</head>
<body>
<h2>Cupcake Fundraiser</h2>

<?php
// associated cupcake array
$flavors = array(
    "grasshopper" => "The Grasshopper",
    "maple" => "Whiskey Maple Bacon",
    "carrot" => "Carrot Walnut",
    "caramel" => "Salted Caramel Cupcake",
    "velvet" => "Red Velvet",
    "lemon" => "Lemon Drop",
    "tiramisu" => "Tiramisu"
);

// after order button pushed
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $errors = [];
    // validate entries and store errors
    if(!isset($_POST['name']) || $_POST['name'] == "") {
        $errors[] = "Please enter your name.";
    } else {
        $name = trim($_POST['name']);
    }

    if(!isset($_POST['flavors']) || count($_POST['flavors']) < 1) {
        $errors[] = "Please select at least 1 flavor";
    } else {
        foreach($_POST['flavors'] as $flav) {
            if(!array_key_exists($flav, $flavors)) {
                $errors[] = "Somehow there's a weird flavor in here. Please try again.";
            }
        }
    }
    // display success or error message
    if(empty($errors)) {
        // order successful
        echo "<p>Thank you, $name, for your order!</p>";
        echo "<p>Order Summary:</p>";
        echo "<ul>";
        foreach($_POST['flavors'] as $cupcake) {
            echo "<li>$flavors[$cupcake]</li>";
        }
        echo "</ul>";
        // number_format($var, 2) for 2 digits
        echo "<p>Order Total: $" . number_format((count($_POST['flavors']) * 3.50), 2) . "</p>";
        exit();
    } else {
        // errors found
        foreach($errors as $error) {
            echo "<p>$error</p>";
        }
    }
}
?>
<!-- form -->
    <form action="index.php" method="post">
        <label for="name">Your name:</label>
        <input id="name" name="name" type="text" placeholder="Please input your name"
               value="<?php if(isset($_POST['name'])) echo ($_POST['name']); ?>">
        <p>Cupcake flavors:</p>
        <?php
        foreach($flavors as $name => $flavor) {

            echo '<input type="checkbox" name ="flavors[]" id ="'. $name. '" value="'. $name. '"';
            if(isset($_POST['flavors']) && in_array($name, $_POST['flavors'])) {
                echo ' checked';
            }
            echo '>';
            echo '<label for="'. $name . '">'. $flavor . '</label ><br>';
        }
        ?>
        <br>
        <input type="submit" name="submit" value="Order">
    </form>
</body>
</html>
