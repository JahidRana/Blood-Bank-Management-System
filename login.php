<?php

$active = 'Login';
include('head.php');


?>

<?php

if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: myProfile.php");
    exit;
}


include 'conn.php';


$username = $password = "";
$username_err = $password_err = $login_err = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {


    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter username.";
    } else {
        $username = trim($_POST["username"]);
    }

    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter your password.";
    } else {
        $password = md5(trim($_POST["password"]));
    }

    if (empty($username_err) && empty($password_err)) {

        $sql = "SELECT * FROM users WHERE username = '$username'";
        $result = mysqli_query($conn, $sql) or die("query failed.");
        $row = mysqli_fetch_assoc($result);

        if ($password == $row['password']) {

            session_start();


            $_SESSION["loggedin"] = true;
            $_SESSION["id"] = $id;
            $_SESSION["view"] = time();
            $_SESSION["username"] = $username;


            header("location: myProfile.php");
        } else {

            $login_err = "Invalid username or password.";
        }
    } else {

        $login_err = "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font: 14px sans-serif;
        }

        .wrapper {
            margin: 0 auto;
            width: 360px;
            padding: 20px;
            margin-top: 25px;
        }

        .p_update {
            background-color: yellowgreen;
            color: black;

            width: 200px;
            padding: 10px;
        }
    </style>
</head>

<body>


    <div class="wrapper">

        <?php

        if (isset($_SESSION["reg_complete"])) { ?>
            <?php if ($_SESSION['timeout'] + 10 > time()) { ?>
                <p class="p_update">Registration Succesfully..</p>
        <?php }
        }
        ?>

        <?php

        if (isset($_SESSION["pwd_change"])) { ?>
            <?php if ($_SESSION['timeout_pwd'] + 10 > time()) { ?>
                <p class="p_update">Password Change Succesfully..</p>
        <?php }
        }
        ?>


        <h2>Login</h2>
        <p>Please fill in your credentials to login.</p>

        <?php
        if (!empty($login_err)) {
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
        }
        ?>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
                <input type="reset" class="btn btn-secondary ml-2" value="Reset">
            </div>

            <p>Don't have an account? <a href="register.php">Sign up now</a>.</p>
        </form>
    </div>
    <?php include 'footer.php' ?>
</body>

</html>