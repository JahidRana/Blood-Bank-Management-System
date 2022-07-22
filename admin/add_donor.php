<?php include 'session.php'; ?>
<html>

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <style>
    #sidebar {
      position: relative;
      margin-top: -20px
    }

    #content {
      position: relative;
      margin-left: 210px
    }

    @media screen and (max-width: 600px) {
      #content {
        position: relative;
        margin-left: auto;
        margin-right: auto;
      }
    }
  </style>
</head>

<body style="color:black">
  <?php
  include 'conn.php';
  if (isset($_SESSION['loggedins']) || $_SESSION['loggedins'] == true) {
  ?>
    <div id="header">
      <?php $active = "add";
      include 'header.php';
      ?>
    </div>
    <div id="sidebar">
      <?php include 'sidebar.php'; ?>

    </div>
    <div id="content">
      <div class="content-wrapper">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12 lg-12 sm-12">

              <h1 class="page-title">Add Donor</h1>
            </div>
          </div>
          <hr>
          <form name="donor" action="save_donor_data.php" method="post">
            <div class="row">
              <div class="col-lg-4 mb-4"><br>
                <div class="font-italic">Full Name<span style="color:red">*</span></div>
                <div><input type="text" name="fullname" class="form-control" required></div>
              </div>
              <div class="col-lg-4 mb-4"><br>
                <div class="font-italic">Mobile Number<span style="color:red">*</span></div>
                <div><input type="text" name="mobileno" class="form-control" required></div>
              </div>
              <div class="col-lg-4 mb-4"><br>
                <div class="font-italic">Email Id</div>
                <div><input type="email" name="emailid" class="form-control"></div>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-4 mb-4"><br>
                <div class="font-italic">Age<span style="color:red">*</span></div>
                <div><input type="text" name="age" class="form-control" required></div>
              </div>


              <div class="col-lg-4 mb-4"><br>
                <div class="font-italic">Gender<span style="color:red">*</span></div>
                <div><select name="gender" class="form-control" required>
                    <option value="">Select</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                  </select>
                </div>
              </div>
              <div class="col-lg-4 mb-4"><br>
                <div class="font-italic">Blood Group<span style="color:red">*</span></div>
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
            <br>
            <div class="row">
              <div class="col-lg-4 mb-4">
                <div class="font-italic">Select District<span style="color:red">*</span></div>
                <div>
                  <select name="district" id="district" class="form-control" required>
                    <option value="" selected disabled>Select District</option>

                  </select>
                </div>
              </div>
              <!-- upazila start -->
              <div class="col-lg-4 mb-4">
                <div class="font-italic">Select Upzila<span style="color:red">*</span></div>
                <div>
                  <select id="upzila" name="upzila" class="form-control" required>

                    <option value="" selected disabled>Select Upzila</option>

                  </select>
                </div>
              </div>
              <!-- //end -->




            </div>



            <br>
            <div class="row">
              <div class="col-lg-4 mb-4">
                <div><input type="submit" name="submit" class="btn btn-primary" value="Submit" style="cursor:pointer" onclick="popup()"></div>
              </div>
            </div>
          </form>

        </div>
      </div>
    </div>
  <?php
  } else {
    echo '<div class="alert alert-danger"><b> Please Login First To Access Admin Portal.</b></div>';
  ?>
    <form method="post" name="" action="login.php" class="form-horizontal">
      <div class="form-group">
        <div class="col-sm-8 col-sm-offset-4" style="float:left">

          <button class="btn btn-primary" name="submit" type="submit">Go to Login Page</button>
        </div>
      </div>
    </form>
  <?php }
  ?>
  <script>
    function popup() {
      alert("Data added Successfully.");
    }
  </script>
</body>
<!-- my_jquery_start -->
<script type="text/javascript" src="./js/jquery.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    function loadData(type, category_id) {
      $.ajax({
        url: "../load-cs.php",
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

</html>