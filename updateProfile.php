<html>

<head>
    <meta charset="UTF-8">
    <title>Update Profile Details</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        #footer {


            left: 0;
            bottom: 0;
            width: 100%;
            height: 75px;
            background-color: #000000;
            color: white;
            text-align: center;
        }

        .footer_desc {
            padding-top: 27px;
        }

        .wrapper {
            margin: auto;
            width: 470px !important;
            background-color: blanchedalmond;
            padding-left: 21px;
        }

        h1.update_profile {
            display: inline-block;
        }

        .profile_log {
            display: inline-block;
            font-size: 26px;
            position: absolute;
            right: 25px;
            text-decoration: none;

        }

        .profile_log a {
            padding: 10px;
        }

        .profile_log a:hover {
            background-color: greenyellow;
            text-decoration: none;
            border-radius: 20px;
        }
    </style>
</head>
<?php
$active = '';

include('head.php');

?>
<?php
ob_start();
require_once "./admin/conn.php";

if (isset($_FILES['fileToUpload'])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $age = $_POST["age"];
    $phone = $_POST["phone"];
    $gender = $_POST["gender"];
    $blood = $_POST["blood"];
    $address = $_POST["address"];
    $userName =  $_SESSION["username"];
    $errors = array();

    echo $file_name = $_FILES['fileToUpload']['name'];
    echo $file_size = $_FILES['fileToUpload']['size'];
    echo $file_tmp = $_FILES['fileToUpload']['tmp_name'];
    echo $file_type = $_FILES['fileToUpload']['type'];

    $file_ext = end(explode('.', $file_name));

    $extension = array("jpeg", "jpg", "png");

    if (in_array($file_ext, $extension) === false) {
        $errors[] = "This extension file not allowed,please choose a JPG or PNG file";
    }

    if ($file_size > 5097152) {
        $errors[] = "File size must be 5mb or lower";
    }

    $new_name = date("d-m-y", time()) . "-" . basename($file_name);

    $target = "./upload/" . $new_name;



    if (empty($errors) == true) {
        move_uploaded_file($file_tmp, $target);
    } else {
        print_r($errors);
        die();
    }

    $sql = "INSERT INTO profile(username,names,email,age,phone,blood_group,address,gender,img_file) VALUES('{$userName}','{$name}','{$email}','{$age}','{$phone}','{$blood}','{$address}','{$gender}','{$new_name}');";
    $result = mysqli_query($conn, $sql) or die("query unsuccessful.");
    if ($result) {
        $_SESSION["isUpdate"] = true;
    echo "<script>location='https://bloodbankms.xyz/myProfile.php'</script>";
    } else {
        $_SESSION["isUpdate"] = false;
       
            echo "<script>location='https://bloodbankms.xyz/updateProfile.php.php'</script>";
    }
}
ob_end_flush();
?>

<body>


    <hr>
    <h1 class="update_profile">Update Profile Details</h1>


    <hr>
    <div class="wrapper">


        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data" method="post">
            <div class="form-group">

                <label>Name: </label>
                <input type="text" name="name" class="form-control" value="" required>

            </div>
            <div class="form-group">
                <label>Email: </label>
                <input type="text" name="email" class="form-control" value="">

            </div>
            <div class="form-group">
                <label>Phone: </label>
                <?php


                require_once "./admin/conn.php";
                $userName =  $_SESSION["username"];

                $query = "SELECT * FROM users where username='{$userName}' ";
                $result = mysqli_query($conn, $query) or die("query failed.");
                if (mysqli_num_rows($result) == 1) {

                    while ($row = mysqli_fetch_assoc($result)) { ?>

                        <input type="number" name="phone" class="form-control" value="<?php echo $row['phone'] ?>" required>
                <?php }
                }
                ?>
            </div>
            <label>Gender: </label>
            <div class="form-group"><select name="gender" class="form-control" required>
                    <option value="" selected disabled>Select</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>
            <label>Blood Group: </label>
            <div class="form-group">
                <select name="blood" class="form-control" required>
                    <option value="" selected disabled>Select</option>
                    <?php
                    include 'conn.php';
                    $sql = "select * from blood";
                    $result = mysqli_query($conn, $sql) or die("query unsuccessful.");
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <option value=" <?php echo $row['blood_group'] ?>"> <?php echo $row['blood_group'] ?> </option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label>Age: </label>
                <input type="number" name="age" class="form-control" value="">

            </div>
            <div class="form-group">
                <label>Address: </label>
                <input type="text" name="address" class="form-control" value="">

            </div>
            <div class="form-group">
                <label>Profile Picture: </label>
                <input type="file" name="fileToUpload" class="form-control">

            </div>
            <div class="form-group">
                <input type="submit" name="submit" class="btn btn-primary" value="Update">

            </div>

        </form>

    </div>
    <div id="footer">

        <center class="footer_desc"> COPYRIGHT © 2022
            Blood Bank & Donation Management

            ALL RIGHTS RESERVED.
        </center>
    </div>
</body>




</html>