<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <style>
    .col-lg-4.col-sm-6.portfolio-item {
      max-width: 26.333333%;
    }
  </style>
</head>

<body>
  <?php
  $active = 'need';
  include('head.php') ?>

  <div id="page-container" style="margin-top:50px; position: relative;min-height: 84vh;">
    <div class="container">
      <div id="content-wrap" style="padding-bottom:50px;">

        <div class="row">
          <div class="col-lg-6">
            <h1 class="mt-4 mb-3">Need Blood</h1>

          </div>
        </div>
        <form name="needblood" action="" method="post">
          <div class="row">
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



            <!-- Search By district start -->
            <div class="col-lg-4 mb-4">
              <div class="font-italic">Select District<span style="color:red">(Required)</span></div>
              <div>
                <select name="district" id="district" class="form-control" required>
                  <option value="" selected disabled>Select District</option>

                </select>

              </div>
            </div>

            <!-- Search By district end -->


            <!-- search upzilla start -->



            <div class="col-lg-4 mb-4">
              <div class="font-italic">Select Upzila<span style="color:red">(Optional)</span></div>
              <div>
                <select id="upzila" name="upzila" class="form-control">

                  <option value="" selected disabled>Select Upzila</option>

                </select>
              </div>
            </div>


            <!-- search upzilla end -->

            <div class="col-lg-4 mb-4">

            </div>
          </div>



          <div class="row">
            <div class="col-lg-4 mb-4">
              <div><input type="submit" name="search" class="btn btn-primary" value="Search" style="cursor:pointer"></div>
            </div>

          </div>
          <div class="row">
            <?php if (isset($_POST['search'])) {

              $bg = $_POST['blood'];

              if ($_POST['district']) {
                $district = $_POST['district'];
                $dist = "select * from district_tb where dist_id=$district";
                $result = mysqli_query($conn, $dist) or die("query unsuccessful.");
                $followingdata = $result->fetch_assoc();
                $district_Name = $followingdata['district_name'];
              }

              $upzila_Name = "";
              if ($_POST['upzila']) {
                $upzila = $_POST['upzila'];

                $upzila = "select * from upzila_tb where uid='$upzila'";
                $results = mysqli_query($conn, $upzila) or die("query unsuccessful.");
                $followingdatau = $results->fetch_assoc();
                $upzila_Name = $followingdatau['upzila_name'];
              }

              if ($upzila_Name == null) {

                $sql = "select * from donor_details where donor_blood='" . trim($bg) . "' AND donor_district='" . trim($district_Name) . "' order by rand() limit 5;";
                $result = mysqli_query($conn, $sql) or die("query unsuccessful.");
              } else {
                $sql = "select * from donor_details where donor_blood='" . trim($bg) . "' AND donor_district='" . trim($district_Name) . "' AND donor_upzila='" . trim($upzila_Name) . "'  order by rand() limit 5;";

                $result = mysqli_query($conn, $sql) or die("query unsuccessful.");
              }




              if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {

            ?>

                  <div class="col-lg-4 col-sm-6 portfolio-item"><br>
                    <div class="card" style="width:250px;margin-bottom: 20px;">
                      <img class="card-img-top" src="image\blood_drop_logo.jpg" alt="Card image" style="width:70%;height:171px;margin:auto">
                      <div class="card-body">
                        <h3 class="card-title"><?php echo $row['donor_name']; ?></h3>
                        <p class="card-text">
                          <b>Blood Group : </b> <b><?php echo $row['donor_blood']; ?></b><br>
                          <?php


                          if (isset($_SESSION['username'])) { ?>
                            <?php
                            if ($_SESSION['view'] + 30 * 60 > time()) { ?>
                              <b>Mobile No. : </b> <?php echo $row['donor_number']; ?><br>


                          <?php
                            }
                          }

                          ?>


                          <b>Gender : </b><?php echo $row['donor_gender']; ?><br>
                          <b>Age : </b> <?php echo $row['donor_age']; ?><br>
                          <b>District : </b> <?php echo $row['donor_district']; ?><br>
                          <b>Upzila : </b> <?php echo $row['donor_upzila']; ?><br>
                          <?php
                          if (!isset($_SESSION["loggedin"])) { ?>
                            <a href="https://bloodbankms.xyz/login.php"><b>View Details</b></a>
                          <?php }


                          ?>


                        </p>

                      </div>
                    </div>
                  </div>

            <?php
                }
              } else {

                echo '<div class="alert alert-danger">No Donor Found For your location </div>';
              }
            } ?>





          </div>
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

    <?php include 'footer.php' ?>
  </div>
</body>

</html>