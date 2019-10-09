<?php
$nameErr = $emailErr = "";
$name = $email = "";
$submsg = "";
$city = $street = $streetnum = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

//    if (empty($_POST["name"])) {
//        $nameErr = "Name is required";
//    } else {
//        $name = test_input($_POST["name"]);
//        // check if name only contains letters and whitespace
//        if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
//            $nameErr = "Only letters and white space allowed";
//        }
//    }

    if (empty($_POST["city"])) {
        echo $cityErr = '<div class="alert alert-danger" role="alert">City is required</div>';
    } else {
        $city = $_POST["city"];
    }

    if (empty($_POST["street"])) {

        echo $strErr = '<div class="alert alert-danger" role="alert">Street is required</div>';
    } else {
        $street = $_POST["street"];
    }

    if (empty($_POST["streetnumber"])) {
        echo $strnumErr = '<div class="alert alert-danger" role="alert">Street number is required</div>';

    } else {
        $streetnum = $_POST["streetnumber"];
        if (is_numeric($streetnum)) {
            $streetnum = $_POST["streetnumber"];
        } else {
            echo $strnumErr = '<div class="alert alert-danger" role="alert">Street No: Numbers Only accepted</div>';
            PHP_EOL;
        }
    }


    if (empty($_POST["zipcode"])) {
        echo $zipcodeErr = '<div class="alert alert-danger" role="alert">Zipcode  is required</div>';
    } else {
        $zipcode = $_POST["zipcode"];
        if (is_numeric($zipcode)) {
            $zipcode = $_POST["zipcode"];
        } else {
            echo $zipcode = '<div class="alert alert-danger" role="alert">Zipcode : Numbers Only accepted</div>';
            PHP_EOL;
        }
    }


    if (empty($_POST["email"])) {
        echo $emailErr = '<div class="alert alert-danger" role="alert">Email is required</div>';
    } else {
        $email = test_input($_POST["email"]);
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo $emailErr = '<div class="alert alert-danger" role="alert">Invalid email format</div>';
        } else {
//            $emailErr = "good email";
        }
    }
}


function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


$op1 = date('h:i:s A', time() + 7200);  // 60*60*2
$op2 = date('h:i:s A', time() + 1440);  // 60*24

$current = date('h:i:s A', time() );//
//$current = strtotime('now') +;
//$diffference = ($two_h - $current);
//echo "<br>  Expected delivery time :  $two_h";
//echo "<br>  Expected delivery time (Express) :  $two_ex";



if (!isset($_POST["order"])) {
} else {
    echo $submsg = '<div class="alert alert-success" role="alert">Thank you for reaching out to us. We will get back to you shortly.</div>';

    if ($_POST["delivery"] == 0 ) {
        echo '<div class="alert alert-light" role="alert">'.'Expected delivery time '.$op1.' apox. 2 hours</div>';
    }
    else {
        echo '<div class="alert alert-light" role="alert">'.'Expected delivery time '.$op2.' apox. 45 mins</div>';
    }
//    echo "<div class="alert alert-warning" role="alert"> <br>  Expected delivery time : {$param} '$two_h' </div>";



}

/*  cookie

$cookie_str = "street";
$cookie_str_value = $streetnum;
setcookie($cookie_str, $cookie_str_value, time() + (86400 * 30), "/");


if (!isset($_COOKIE[$cookie_str])) {
    echo "Cookie named '" . $cookie_str . "' is not set!";
} else {
    echo "Cookie '" . $cookie_str . "' is set!<br>";
    echo "Value is: " . $_COOKIE[$cookie_str];
}

*/


if (empty($_POST['submit'])) {
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['street'] = $_POST['street'];
    $_SESSION['city'] = $_POST['city'];
    $_SESSION['zipcode'] = $_POST['zipcode'];
    $_SESSION['streetnumber'] = $_POST['streetnumber'];
}




?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" type="text/css"
          rel="stylesheet"/>


    <title>Order food & drinks</title>
</head>
<body>
<div class="container">
    <h1>Order food in restaurant "the Personal Ham Processors"</h1>
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

    <!--    <div id="contactform-messages" class="part-five part-four" style="display: flex; align-items: center; justify-content: center; background-size: auto !important;">-->
    <!--        <p> --><?php //echo $submsg ;?><!-- </p>-->
    <!--    </div>-->

    <form method="post">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="email">E-mail:</label>
                <input type="text" id="email" name="email" class="form-control" value="<?php echo $_POST['email'] ?>"/>
            </div>
            <div>

            </div>
            <!--            <div id="hide" class="alert alert-danger" role="alert">-->
            <!--                <span class="error">* --><?php //echo $emailErr."<br/>".$nameErr;?><!--</span>-->
            <!--            </div>-->

        </div>

        <fieldset>
            <legend>Address</legend>


            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="street">Street:</label>
                    <input type="text" name="street" id="street" class="form-control"
                           value="<?php echo $_POST['street'] ?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="streetnumber">Street number:</label>
                    <input type="text" id="streetnumber" name="streetnumber" class="form-control"
                           value="<?php echo $_POST['streetnumber'] ?>">
                </div>
                <!--                <div class="alert alert-danger" role="alert">-->
                <!--                    <span class="error">* --><?php //echo $strnumErr;?><!--</span>-->
                <!--                </div>-->


            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="city">City:</label>
                    <input type="text" id="city" name="city" class="form-control" value="<?php echo $_POST['city'] ?>">

                </div>
                <div class="form-group col-md-6">
                    <label for="zipcode">Zipcode</label>
                    <input type="text" id="zipcode" name="zipcode" class="form-control"
                           value="<?php echo $_POST['zipcode'] ?>">
                </div>

            </div>
        </fieldset>

        <fieldset>
            <legend>Products</legend>
            <?php foreach ($products AS $i => $product): ?>
                <label>
                    <input type="checkbox" value="1" name="products[<?php echo $i ?>]"/> <?php echo $product['name'] ?>
                    -
                    &euro; <?php echo number_format($product['price'], 2) ?></label><br/>
            <?php endforeach; ?>
        </fieldset>


        <fieldset>
            <legend>Delivery Method</legend>
            <select name="delivery" class="form-control col-md-6">
                <option value="0" selected>Standard Delivery </option>
                <option value="1">Express Delivery via express drone services</option>
            </select>
        </fieldset>


        <button type="submit" name="order" class="btn btn-primary">Order!</button>
        <!--        <input type="submit" name="submit" value="Submit">-->
    </form>
    <div>
    </div>
    <footer>You already ordered <strong>&euro; <?php echo $totalValue ?></strong> in food and drinks.</footer>
</div>

<style>
    footer {
        text-align: center;
    }

    #hide {
        display: none;
    }

</style>
</body>
</html>