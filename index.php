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
$flavors = array(
    "grasshopper" => "The Grasshopper",
    "maple" => "Whiskey Maple Bacon",
    "carrot" => "Carrot Walnut",
    "caramel" => "Salted Caramel Cupcake",
    "velvet" => "Red Velvet",
    "lemon" => "Lemon Drop",
    "tiramisu" => "Tiramisu"
);

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $errors = [];
    $choices =[];
    // validate and store errors

    // display complete message
}
?>

<form action="index.php">
    <label for="name">Your name:</label>
    <input id="name" type="text" placeholder="Please input your name"
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
    <input type="submit" value="Order">
</form>
</body>
</html>
