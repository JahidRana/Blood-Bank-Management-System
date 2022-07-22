<!-- savedata start -->


<?php
include 'conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST['fullname'];


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

  if (empty($phone_err)) {

    $sql = "INSERT INTO `donor_details`( `donor_name`, `donor_number`, `donor_mail`, `donor_age`, `donor_gender`, `donor_blood`, `donor_district`, `donor_upzila`) VALUES ('{$name}','{$phone}','{$email}','{$age}','{$gender}','{$blood_group}','{$district_Name}','{$upzila_Name}')";
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
}

?>


<!-- savedata_end -->

<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">


  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<style>
  .donor_add {
    background-color: yellowgreen;
    color: black;

    width: 200px;
    padding: 10px;
  }
</style>

<body>
  <?php
  $active = 'donate';
  include('head.php') ?>

  <div id="page-container" style="margin-top:50px; position: relative;min-height: 84vh;">
    <div class="container">
      <div id="content-wrap" style="padding-bottom:50px;">
        <div class="row">
          <div class="col-lg-6">
            <h1 class="mt-4 mb-3">Donate Blood </h1>
          </div>
        </div>
        <form name="donor" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
          <div class="row">
            <div class="col-lg-4 mb-4">
              <div class="font-italic">Full Name<span style="color:red">(Required)</span></div>
              <div><input type="text" name="fullname" class="form-control" required>

              </div>
            </div>

            <div class="col-lg-4 mb-4">
              <div class="font-italic">Mobile Number<span style="color:red">(Required)</span></div>
              <div><input type="number" name="phone" class="form-control  <?php echo (!empty($phone_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $phone; ?> " required>
                <span class="invalid-feedback"><?php echo $phone_err; ?></span>
              </div>
            </div>
            <div class="col-lg-4 mb-4">
              <div class="font-italic">Email Id<span style="color:red">(Optional)</span></div>
              <div><input type="email" name="emailid" class="form-control"></div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-4 mb-4">
              <div class="font-italic">Age<span style="color:red">(Required)</span></div>
              <div><input type="text" name="age" class="form-control" required></div>
            </div>
            <div class="col-lg-4 mb-4">
              <div class="font-italic">Gender<span style="color:red">(Required)</span></div>
              <div><select name="gender" class="form-control" required>
                  <option value="">Select</option>
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                </select>
              </div>
            </div>
            <div class="col-lg-4 mb-4">
              <div class="font-italic">Blood Group<span style="color:red">(Required)</span></div>
              <div><select name="blood" class="form-control" required>
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
            </div>
          </div>

          <!-- another try -->
          <div class="row">

            <div class="col-lg-4 mb-4">
              <div class="font-italic">Select District<span style="color:red">(Required)</span></div>
              <div>
                <select name="district" id="district" class="form-control" required>
                  <option value="" selected disabled>Select District</option>

                </select>
              </div>
            </div>
            <div class="col-lg-4 mb-4">
              <div class="font-italic">Select Upzila<span style="color:red">(Required)</span></div>
              <div>
                <select id="upzila" name="upzila" class="form-control" required>

                  <option value="" selected disabled>Select Upzila</option>

                </select>
              </div>
            </div>
          </div>

          <!-- another try end -->



          <div class="row">
            <div class="col-lg-4 mb-4">
              <div><input type="submit" name="submit" class="btn btn-primary" value="Submit" style="cursor:pointer"></div>
            </div>
          </div>
          <?php
          if (isset($_SESSION["donor_add"])) {
            if (time() - $_SESSION["donor_add_time"] < 18) { ?>
              <span class="donor_add">Congrats You are added</span>
          <?php  }
          }
          ?>


      </div>
    </div>
    <!-- my_jquery_start -->
    <script type="text/javascript" src="./js/jquery.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        function loadData(type, category_id) {
          $.ajax({
            url: "load-cs.php",
            type: "POST",
            data: {
              type: type,
              id: category_id
            },
            success: function(data) {
              if (type == "upzilaData") {
                $("#upzila").html(data);
              } else {
                $("#district").append(data);
              }

            }
          });
        }

        loadData();

        $("#district").on("change", function() {
          var district = $("#district").val();

          if (district != "") {
            loadData("upzilaData", district);
          } else {
            $("#upzila").html("");
          }


        })
      });
    </script>
    <!-- my_jquery_end -->
    <?php include('footer.php') ?>
  </div>
</body>

</html>