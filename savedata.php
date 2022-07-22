<?php
include 'conn.php';


$name = $_POST['fullname'];

// $number = $_POST['phone'];
$phone_err = "";
if (empty(trim($_POST["phone"]))) {
    $phone_err = "Please enter phone number.";
} elseif (!preg_match('/^[0-9]{11}+$/', trim($_POST["phone"]))) {
    $phone_err = "Phone Number is inValid";
} else {
    $phone = trim($_POST["phone"]);
}


$email = $_POST['emailid'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$blood_group = $_POST['blood'];
$district = $_POST['district'];
$upzila = $_POST['upzila'];
$dist = "select * from district_tb where dist_id=$district";
$result = mysqli_query($conn, $dist) or die("query unsuccessful.");
$followingdata = $result->fetch_assoc();
$district_Name = $followingdata['district_name'];




$upzila = "select * from upzila_tb where uid='$upzila'";
$results = mysqli_query($conn, $upzila) or die("query unsuccessful.");
$followingdatau = $results->fetch_assoc();
$upzila_Name = $followingdatau['upzila_name'];



// $sql = "INSERT INTO donor_details(donor_name,donor_number,donor_mail,donor_age,donor_gender,donor_blood,donor_district,donor_upzila) values('{$name}','{$number}','{$email}','{$age}','{$gender}','{$blood_group}','{$district_Name}',{$upzila_Name}')";

if (empty($phone_err)) {

    $sql = "INSERT INTO `donor_details`( `donor_name`, `donor_number`, `donor_mail`, `donor_age`, `donor_gender`, `donor_blood`, `donor_district`, `donor_upzila`) VALUES ('{$name}','{$number}','{$email}','{$age}','{$gender}','{$blood_group}','{$district_Name}','{$upzila_Name}')";
    $result = mysqli_query($conn, $sql) or die("query unsuccessful.");


    session_start();
    if ($result) {
        $_SESSION["donor_add"] = true;
        $_SESSION["donor_add_time"] = time();
        header("location: donate_blood.php");
    } else {
        $_SESSION["donor_add"] = false;
    }
}



mysqli_close($conn);
