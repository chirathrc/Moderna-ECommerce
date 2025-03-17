<!DOCTYPE html>
<html lang="en">

<head>

   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">

   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="viewport" content="initial-scale=1, maximum-scale=1">

   <title>BELLE - Login</title>
   <meta name="keywords" content="">
   <meta name="description" content="">
   <meta name="author" content="">
   <link rel="icon" href="images/apple-touch-icon-114x114.png" type="image/png" />

   <link rel="stylesheet" href="css1/bootstrap.min.css" />

   <link rel="stylesheet" href="style1.css" />

   <link rel="stylesheet" href="css1/responsive.css" />

   <link rel="stylesheet" href="css1/colors.css" />

   <link rel="stylesheet" href="css1/bootstrap-select.css" />

   <link rel="stylesheet" href="css1/perfect-scrollbar.css" />

   <link rel="stylesheet" href="css1/custom.css" />
   <link rel="stylesheet" href="js/semantic.min.css" />

</head>

<body class="inner_page login">
   <div class="full_container">
      <div class="container">
         <div class="center verticle_center full_height">
            <div class="login_section">
               <div class="logo_login">
                  <div class="center">
                     <img width="210" src="images/logo.svg" alt="#" />
                  </div>
               </div>
               <div class="login_form">
                  <fieldset>
                     <div class="field">
                        <label class="label_field">Email Address</label>
                        <input type="email" id="email" placeholder="E-mail" />
                     </div>
                     <div class="field">
                        <label class="label_field">Password</label>
                        <input type="password" id="password" placeholder="Password" />
                     </div>

                     <div class="field">
                        <label class="label_field hidden">hidden label</label>
                        <label class="form-check-label"><input type="checkbox" class="form-check-input"> Remember
                           Me</label>
                        <a class="forgot" href="">Forgotten Password?</a>
                     </div>
                     <div class="field margin_0">
                        <label class="label_field hidden">hidden label</label>
                        <button class="main_bt" onclick="adminSignIn();">Sing In</button>
                     </div>

                  </fieldset>

               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- jQuery -->
   <script src="js/jquery.min.js"></script>
   <script src="js/popper.min.js"></script>
   <script src="js/bootstrap.min.js"></script>
   <!-- wow animation -->
   <script src="js/animate.js"></script>
   <!-- select country -->
   <script src="js/bootstrap-select.js"></script>
   <!-- nice scrollbar -->
   <script src="js/perfect-scrollbar.min.js"></script>
   <script>
      var ps = new PerfectScrollbar('#sidebar');
   </script>
   <!-- custom js -->
   <script src="js/custom.js"></script>
   <script src="script.js"></script>

</body>

</html>