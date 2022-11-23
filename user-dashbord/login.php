<?php
//check if session is started already
if (session_status() === PHP_SESSION_NONE)
     session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
     require '../process/pdo.php';
     $db = new DatabaseClass();
     $email = trim($_POST['loginUsername']);
     $password = $_POST['loginPassword'];
     // $date = date("Y/m/d");
     // $time = date("h:i:sa");
     // $fullDate = $date . " " . $time;

     if ($email == "apa-finacial" && $password == "admin12345") {
          $_SESSION['auth'] = true;
          $_SESSION['start'] = time();
          $_SESSION['expire'] = $_SESSION['start'] + (40 * 60);
          print('<script>
                    document.addEventListener("DOMContentLoaded", function() {
                    toastr.success("You have been loged in as APA Admin");
                    })
          </script>');
          //? need to change the rediraction // 
          header("Location:../admin/");
          exit();
     } else {
          // $sql = "SELECT * FROM users WHERE username = '$email' OR email = '$email'";
          // $result = mysqli_fetch_assoc(mysqli_query($conn, $sql));
          $result = $db->SelectOne("SELECT * FROM users WHERE username = :email OR email = :email", ['email' => $email]);
          if (($result)) {
               if ($result['is_activated'] == 'no') {
                    print('<script>
                    document.addEventListener("DOMContentLoaded", function() {
                         toastr.error("Something went wrong contact the Customer care");
                         toastr.clear()
                    })
                    </script>');
               } else {
                    if ($password == $result['password']) {
                         // $sql = "UPDATE  users SET lastSeen = '$fullDate'  WHERE email= '$email'";
                         // $resultSeen = mysqli_query($conn, $sql);
                         // if ($resultSeen) {
                         $_SESSION['auth'] = true;
                         $_SESSION['start'] = time();
                         $_SESSION['expire'] = $_SESSION['start'] + (40 * 60);
                         $_SESSION["user_id"] = $result['user_id'];
                         //? $_SESSION['balance'] =  $result['bonus_balance'];//
                         //? $_SESSION['balance'] =  $result['referal_balance'];//
                         print('<script>
                              document.addEventListener("DOMContentLoaded", function() {
                              toastr.success("Welcome youve been login");
                              })
                         </script>');
                         header("Location:index.php");
                         exit();
                         // } else {
                         //      $_SESSION['error'] = 1;
                         //      $_SESSION['errorMassage'] = "Error updating last seen";
                         //      header("Location:index.php");
                         //      exit();
                         // }
                    } else {
                         print('<script>
                                   document.addEventListener("DOMContentLoaded", function() {
                                   toastr.error("Wrong password");
                                   toastr.clear()
                              })
                         </script>');
                    }
               }
          } else {
               print('<script>
                         document.addEventListener("DOMContentLoaded", function() {
                         toastr.error("Wrong password");
                         setTimeout(function() {
                              toastr.clear()
                         }, 3000);
                         
                    })
               </script>');
          }
     }
}
?>
<!DOCTYPE html>
<html>

<head>
     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <title>APA Login</title>
     <meta name="description" content="">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <meta name="robots" content="all,follow">
     <!-- Google fonts - Poppins -->
     <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">
     <!-- Choices CSS-->
     <link rel="stylesheet" href="vendor/choices.js/public/assets/styles/choices.min.css">
     <!-- theme stylesheet-->
     <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
     <!-- Custom stylesheet - for your changes-->
     <link rel="stylesheet" href="css/custom.css">
     <!-- Favicon-->
     <link rel="shortcut icon" href="img/favicon.ico">
     <script src="js/jquerry.3.6.js"></script>
     <link rel="stylesheet" href="../assets/toastr-master/build/toastr.min.css">
     <!-- Tweaks for older IEs-->
     <!--[if lt IE 9]>
     <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
     <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>

<body>
     <div class="login-page">
          <div class="container d-flex align-items-center position-relative py-5">
               <div class="card shadow-sm w-100 rounded overflow-hidden bg-none">
                    <div class="card-body p-0">
                         <div class="row gx-0 align-items-stretch">
                              <!-- Logo & Information Panel-->
                              <div class="col-lg-6">
                                   <div class="info d-flex justify-content-center flex-column p-4 h-100">
                                        <div class="py-5">
                                             <h1 class="display-6 fw-bold">APA Financial</h1>
                                             <p class="fw-light mb-0">Login for a free account and login to your user
                                                  dashboard</p>
                                        </div>
                                   </div>
                              </div>
                              <!-- Form Panel    -->
                              <div class="col-lg-6 bg-white">
                                   <div class="d-flex align-items-center px-4 px-lg-5 h-100">
                                        <form class="login-form py-5 w-100" method="post" action="">
                                             <div class="input-material-group mb-3">
                                                  <input class="input-material" id="login-username" type="text"
                                                       name="loginUsername" autocomplete="off">
                                                  <label class="label-material" for="login-username">User Name /
                                                       Email</label>
                                             </div>
                                             <div class="input-material-group mb-4">
                                                  <input class="input-material" id="login-password" type="password"
                                                       name="loginPassword" required
                                                       data-validate-field="loginPassword">
                                                  <label class="label-material" for="login-password">Password</label>
                                             </div>
                                             <button class="btn btn-primary mb-3" type="submit">Login</button><br><a
                                                  class="text-sm text-paleBlue" href="#">Forgot Password?</a><br><small
                                                  class="text-gray-500">Do not have an account? </small><a
                                                  class="text-sm text-paleBlue" href="../register.php">Signup</a>
                                        </form>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </div>
     <!-- JavaScript files-->
     <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
     <script src="vendor/chart.js/Chart.min.js"></script>
     <script src="vendor/just-validate/js/just-validate.min.js"></script>
     <script src="vendor/choices.js/public/assets/scripts/choices.min.js"></script>
     <!-- Main File-->
     <script src="js/front.js"></script>
     <script src="../assets/toastr-master/build/toastr.min.js"></script>
     <script>
          // ------------------------------------------------------- //
          //   Inject SVG Sprite - 
          //   see more here 
          //   https://css-tricks.com/ajaxing-svg-sprite/
          // ------------------------------------------------------ //
          function injectSvgSprite(path) {

               var ajax = new XMLHttpRequest();
               ajax.open("GET", path, true);
               ajax.send();
               ajax.onload = function (e) {
                    var div = document.createElement("div");
                    div.className = 'd-none';
                    div.innerHTML = ajax.responseText;
                    document.body.insertBefore(div, document.body.childNodes[0]);
               }
          }
          // this is set to BootstrapTemple website as you cannot 
          // inject local SVG sprite (using only 'icons/orion-svg-sprite.svg' path)
          // while using file:// protocol
          // pls don't forget to change to your domain :)
          injectSvgSprite('https://bootstraptemple.com/files/icons/orion-svg-sprite.svg');
     </script>
     <!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"
          integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</body>

</html>