<html>

<head>

  <style>
    .header {
      overflow: hidden;
      background-color: #eb2c29;
      top: 0;
      width: 100%;
      padding: 10px 5px;
      color: white;
    }

    .header a {
      float: left;
      color: white;
      text-align: center;
      padding: 12px;
      text-decoration: none;
      font-size: 18px;
      line-height: 25px;
      border-radius: 4px;
      font-weight: bold;
    }


    .header a.logo {
      font-size: 25px;
      font-weight: bold;
      color: white;
    }

    .header a:hover {

      color: #333333;
    }



    .header-right {
      float: right;
    }


    @media screen and (max-width: 500px) {
      .header a {
        float: none;
        display: block;
        text-align: left;
      }

      .header-right {
        float: none;
      }
    }

    a.act {
      background: linear-gradient(to right, #fd746c 0%, #ff9068 100%);
      color: white;
      border-radius: 30px;
    }

    a.logo:hover {
      color: white;
      cursor: pointer;
    }

    .wrapper {
      width: 360px;
      padding: 20px;
    }

    div#google_translate_element {
      display: inline-block;

      background: white;
    }

    a.goog-logo-link {
      display: none;
    }
  </style>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
  <div class="header">
    <a href="index.php" class="logo" <?php if ($active == 'home') echo "class='logo2'"; ?>>Blood Bank & Donation </a>
    <div class="header-right">

      <a href="about_us.php" <?php if ($active == 'about') echo "class='act'"; ?>>About Us</a>
      <a href="why_donate_blood.php" <?php if ($active == 'why') echo "class='act'"; ?>>Why Donate Blood</a>
      <a href="donate_blood.php" <?php if ($active == 'donate') echo "class='act'"; ?>>Become A Donor</a>
      <a href="need_blood.php" <?php if ($active == 'need') echo "class='act'"; ?>>Search Blood</a>
      <a href="register.php" <?php if ($active == 'Register') echo "class='act'"; ?>>Register</a>
      <?php
      session_start();
      if (isset($_SESSION["loggedin"])) { ?>

        <a href="myProfile.php" <?php if ($active == 'myProfile') echo "class='act'"; ?>>My Account</a>
      <?php } else { ?>
        <a href="login.php" <?php if ($active == 'Login') echo "class='act'"; ?>>Login</a>
      <?php }

      ?>


      <a href="contact_us.php" <?php if ($active == 'contact') echo "class='act'"; ?>>Contact Us</a>

      <!-- Translation Code here -->

      <!-- <div class="translate" id="google_translate_element"></div>

      <script type="text/javascript">
        function googleTranslateElementInit() {
          new google.translate.TranslateElement({
            pageLanguage: 'en'
          }, 'google_translate_element');
        }
      </script>
      <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script> -->

      <!-- Translation Code End here -->



    </div>
  </div>

</body>

</html>