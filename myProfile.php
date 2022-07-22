<?php

$active = 'myProfile';
include('head.php');
?>
<?php


if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === false) {
  header("location: login.php");
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Profile Details</title>
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css'>

  <link rel="stylesheet" href="css/demo.css" />

  <link rel="stylesheet" href="css/style.css">
</head>
<style>
  .text {
    text-transform: none !important;
  }

  .student-profile .table th,
  .student-profile .table td {
    font-size: 14px;
    padding: 22px 20px;
    color: #000;
  }

  .row {
    margin-top: -50px;
    margin-bottom: 5px;
  }

  .ScriptHeader {
    position: relative;
  }

  span.log_button {
    position: absolute;
    right: 15px;
    bottom: 31px;

  }

  .log_button a {
    color: blue;
  }

  .p_update {
    background-color: yellowgreen;
    color: black;

    width: 200px;
    padding: 10px;
  }

  .action {
    right: -101px;
    position: absolute;
    bottom: 33px;
    display: block;
  }

  /* dropdown css */
  .dropbtn {
    background-color: #eb2c29;
    color: white;
    padding: 12px 48px 14px 46px;
    font-size: 20px;
    border: none;
    cursor: pointer;
  }

  .dropbtn:hover,
  .dropbtn:focus {
    background-color: #eb2c28;
  }

  .dropdown {
    position: absolute;
    display: inline-block;
    right: -123px;
    top: -16px;
  }

  .dropdown-content {
    display: none;
    position: absolute;
    background-color: #f1f1f1;
    min-width: 160px;
    overflow: auto;
    box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
    z-index: 1;
  }

  .dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
  }

  .dropdown a:hover {
    background-color: #ddd;
  }

  .show {
    display: block;
  }
</style>

<body>



  <header class="ScriptHeader">
    <div class="rt-container">
      <div class="col-rt-12">


        <div>
          <strong>
            <center><span class="text"><?php echo $_SESSION["username"] . ", Profile";  ?></span></center>

            <div class="dropdown">
              <button onclick="myFunction()" class="dropbtn">Action</button>
              <div id="myDropdown" class="dropdown-content">
                <a href="updateProfile.php">Update Profile</a>
                <a href="change-password.php">Change Password</a>
                <a href="logout.php">Logout</a>

              </div>
            </div>


          </strong>

          <hr>
        </div>
      </div>
    </div>
  </header>

  <section>
    <div class="rt-container">
      <div class="col-rt-12">
        <div class="Scriptcontent">
          <?php

          require_once "./admin/conn.php";
          $userName =  $_SESSION["username"];

          $query = "SELECT * FROM profile where username='{$userName}' ";
          $result = mysqli_query($conn, $query) or die("query failed.");


          if (mysqli_num_rows($result) == 1) {

            while ($row = mysqli_fetch_assoc($result)) { ?>

              <!--  Profile -->
              <div class="student-profile py-4">
                <div class="container">
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="card shadow-sm">
                        <div class="card-header bg-transparent text-center">
                          <img class="profile_img" src="./upload/<?php echo $row['img_file'] ?>" alt="profile dp">
                          <h3><?php echo $row['names']; ?></h3>
                        </div>
                        <div class="card-body">
                          <p class="mb-0"><strong class="pr-1">Username:</strong><?php echo $_SESSION["username"];  ?></p>
                          <p class="mb-0"><strong class="pr-1">Blood Group:</strong><?php echo $row['blood_group']; ?></p>

                        </div>
                      </div>
                    </div>
                    <div class="col-lg-8">
                      <div class="card shadow-sm">
                        <div class="card-header bg-transparent border-0">
                          <h3 class="mb-0"><i class="far fa-clone pr-1"></i>General Information</h3>
                        </div>
                        <div class="card-body pt-0">
                          <table class="table table-bordered">
                            <tr>
                              <th width="30%">Name</th>
                              <td width="2%">:</td>
                              <td><?php echo $row['names']; ?></td>
                            </tr>
                            <tr>
                              <th width="30%">Age </th>
                              <td width="2%">:</td>
                              <td><?php echo $row['age']; ?></td>
                            </tr>
                            <tr>
                              <th width="30%">Gender</th>
                              <td width="2%">:</td>
                              <td><?php echo $row['gender']; ?></td>
                            </tr>
                            <tr>
                              <th width="30%">Phone</th>
                              <td width="2%">:</td>
                              <td><?php echo $row['phone']; ?></td>
                            </tr>
                            <tr>
                              <th width="30%">blood</th>
                              <td width="2%">:</td>
                              <td><?php echo $row['blood_group']; ?></td>
                            </tr>
                            <tr>
                              <th width="30%">Adress</th>
                              <td width="2%">:</td>
                              <td><?php echo $row['address']; ?></td>
                            </tr>
                          </table>
                        </div>
                      </div>
                      <div style="height: 26px"></div>

                    </div>
                  </div>
                </div>
              </div>



            <?php

            }
            ?>

          <?php
          } else { ?>
            <!--  Profile -->
            <div class="student-profile py-4">
              <div class="container">
                <div class="row">
                  <div class="col-lg-4">
                    <div class="card shadow-sm">
                      <div class="card-header bg-transparent text-center">
                        <img class="profile_img" src="./upload/default.png" alt="profile dp">
                        <h3>Not Set</h3>
                      </div>
                      <div class="card-body">
                        <p class="mb-0"><strong class="pr-1">Username:</strong><?php echo $_SESSION["username"];  ?></p>
                        <p class="mb-0"><strong class="pr-1">Blood Group:</strong>N/A</p>

                      </div>
                    </div>
                  </div>
                  <div class="col-lg-8">
                    <div class="card shadow-sm">
                      <div class="card-header bg-transparent border-0">
                        <h3 class="mb-0"><i class="far fa-clone pr-1"></i>General Information</h3>
                      </div>
                      <div class="card-body pt-0">
                        <table class="table table-bordered">
                          <tr>
                            <th width="30%">Name</th>
                            <td width="2%">:</td>
                            <td>N/A</td>
                          </tr>
                          <tr>
                            <th width="30%">Age </th>
                            <td width="2%">:</td>
                            <td>N/A</td>
                          </tr>
                          <tr>
                            <th width="30%">Gender</th>
                            <td width="2%">:</td>
                            <td>N/A</td>
                          </tr>
                          <tr>
                            <th width="30%">Phone</th>
                            <td width="2%">:</td>
                            <td>N/A</td>
                          </tr>
                          <tr>
                            <th width="30%">blood</th>
                            <td width="2%">:</td>
                            <td>N/A</td>
                          </tr>
                          <tr>
                            <th width="30%">Adress</th>
                            <td width="2%">:</td>
                            <td>N/A</td>
                          </tr>
                        </table>
                      </div>
                    </div>
                    <div style="height: 26px"></div>

                  </div>
                </div>
              </div>
            </div>
          <?php }
          ?>

          <!-- partial -->

        </div>
      </div>
    </div>
  </section>



  <!-- Analytics -->
  <?php include 'footer.php' ?>
  <script>
    function myFunction() {
      document.getElementById("myDropdown").classList.toggle("show");
    }


    window.onclick = function(event) {
      if (!event.target.matches('.dropbtn')) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
          var openDropdown = dropdowns[i];
          if (openDropdown.classList.contains('show')) {
            openDropdown.classList.remove('show');
          }
        }
      }
    }
  </script>
</body>

</html>