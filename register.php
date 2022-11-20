<?php
if (session_status() === PHP_SESSION_NONE) session_start();
require './process/pdo.php';
require 'assets/octaValidate-PHP-main/src/Validate.php';

use Validate\octaValidate;

$db = new DatabaseClass();




//set configuration
$options = array(
     "stripTags" => true,
     "strictMode" => true
);
//create new instance
$myForm = new octaValidate('register', $options);
//define rules for each form input name
$valRules = array(
     "username" => array(
          ["R", "Your username is required"],
          ["ALPHA_NUMERIC", "Please username mush be letters and numbers"],
     ),
     "email" => array(
          ["R", "Your Email Address is required"],
          ["EMAIL", "Your Email Address is invalid!"]
     ),
     "fullName" => array(
          ["R", "Your FullName is required"],
          ["ALPHA_SPACES", "full name must have spaces"]
     ),
     "phone" => array(
          ["R", "Your phone number is required"],
          ["DIGITS", "Phone number must be digits"]
     ),
     "pass" => array(
          ["R", "Your password is required"],
          ["PWD", "Password must contain a capital, lowercase and unique character or specail character"]
     ),
     "confirmPass" => array(
          ["R", "Your password is required"],
          ["EQUALTO", "pass", "password must equal to password",]
     ),
);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
     //begin validation on form fields from $_POST array
     if ($myForm->validateFields($valRules, $_POST)) {
          //Selecting a single row!//

          $result = $db->SelectOne("SELECT email FROM users WHERE email = :email", ['email' => $_POST['email']]);

          //If $row is FALSE, then no row was returned.
          if ($result) {
               $_SESSION['error'] = 1;
               $_SESSION['errorMassage'] = "Email has been taken";
               $errMsg = array(
                    'register' => array(
                         'email' => 'Email has been taken'
                    )
               );
               print('<script>
                    document.addEventListener("DOMContentLoaded", function(){
                         showErrors(' . json_encode($errMsg) . ');
                    });</script>');
          } else {
               //process form data here //
               $fullName = $_POST['fullName'];
               $username = $_POST['username'];
               $email = $_POST['email'];
               $phone = $_POST['phone'];
               $password = $_POST['pass'];
               $country = $_POST['country'];
               $balance = 5;
               $user_id = md5(time() . $email);

               $query = "INSERT INTO users (	user_id, fullName,	email, password, phone, country,balance,username)
               VALUES(:user_id, :fullname, :email, :password, :phone, :country, :balance, :username)";
               $data = [
                    'user_id' => $user_id,
                    'fullname' => $fullName,
                    'email' => $email,
                    'password' => $password,
                    'phone' => $phone,
                    'country' => $country,
                    'balance' => $balance,
                    'username' => $username
               ];

               $result = $db->Insert($query, $data);
               if ($result) {
                    $_SESSION['auth'] = true;
                    $_SESSION['start'] = time();
                    $_SESSION['expire'] = $_SESSION['start'] + (40 * 60);
                    $_SESSION['user_id'] = $user_id;
                    header("Location:user-dashbord");
               } else {
                    $_SESSION['error'] = 1;
                    $_SESSION['errorMassage'] = "Signup was not successful";
                    header("Location:register.php");
               };
          };
     } else {
          //return errors
     
          print('<script>
     document.addEventListener("DOMContentLoaded", function(){
          showErrors(' . json_encode($myForm->getErrors()) . ');
    });</script>');
     }
}

?>
<!DOCTYPE html>
<html>

<head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>APA</title>
     <!-- link for custom flag -->
     <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
     <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
     <link rel="stylesheet" href="//mojoaxel.github.io/bootstrap-select-country/dist/css/bootstrap-select-country.min.css">
     <!-- end -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
</head>

<style>
     body {
          background-color: rgb(228, 244, 255);
          height: auto;
     }

     label {
          color: rgb(41, 128, 189);
     }

     p {
          color: rgb(41, 128, 189);
     }
</style>

<body>

     <section class="section">
          <div class="container">
               <div class="columns is-centered">
                    <div class="column is-two-fifths">
                         <div class="card">
                              <header class="card-header">
                                   <p class="card-header-title">
                                        User Login
                                   </p>
                                   <button class="card-header-icon" aria-label="more options">
                                        <span class="icon">
                                             <i class="fas fa-angle-down" aria-hidden="true"></i>
                                        </span>
                                   </button>
                              </header>
                              <div class="card-content">
                                   <div class="content">
                                        <form action="" method="post" id="register" novalidate>
                                             <div class="field">
                                                  <label class="label">Username</label>
                                                  <div class="control">
                                                       <input class="input" value="<?php (isset($_POST) && isset($_POST['username'])) ? print($_POST['username']) : '' ?>" name="username" type="text" placeholder="Username">
                                                  </div>
                                             </div>

                                             <div class="field">
                                                  <label class="label">FullName</label>
                                                  <div class="control has-icons-left has-icons-right">
                                                       <input value="<?php (isset($_POST) && isset($_POST['fullName'])) ? print($_POST['fullName']) : '' ?>" class="input is-success" name="fullName" type="text" placeholder="Your fulname">
                                                       <span class="icon is-small is-left">
                                                            <i class="fas fa-user"></i>
                                                       </span>
                                                       <span class="icon is-small is-right">
                                                            <i class="fas fa-check"></i>
                                                       </span>
                                                  </div>
                                             </div>

                                             <div class="field">
                                                  <label class="label">Email</label>
                                                  <div class="control has-icons-left has-icons-right">
                                                       <input value="<?php (isset($_POST) && isset($_POST['email'])) ? print($_POST['email']) : '' ?>" class="input is-success" name="email" type="email" placeholder="Email input">
                                                       <span class="icon is-small is-left">
                                                            <i class="fas fa-envelope"></i>
                                                       </span>
                                                       <span class="icon is-small is-right">
                                                            <i class="fas fa-exclamation-triangle"></i>
                                                       </span>
                                                  </div>
                                             </div>

                                             <div class="field">
                                                  <label class="label">Phone Number</label>
                                                  <div class="control has-icons-left has-icons-right">
                                                       <input class="input is-success" value="<?php (isset($_POST) && isset($_POST['phone'])) ? print($_POST['phone']) : '' ?>" name="phone" type="number" placeholder="Phone">
                                                       <span class="icon is-small is-left">
                                                            <i class="fa-solid fa-phone"></i>
                                                       </span>
                                                       <span class="icon is-small is-right">
                                                            <i class="fas fa-check"></i>
                                                       </span>
                                                  </div </div>

                                                  <div class="field">
                                                       <label class="label">Password</label>
                                                       <div class="control has-icons-left has-icons-right">
                                                            <input class="input is-success" name="pass" type="password" placeholder="Password">
                                                            <span class="icon is-small is-left">
                                                                 <i class="fa-solid fa-lock"></i>
                                                            </span>
                                                       </div>
                                                  </div>
                                                  <div class="field">
                                                       <label class="label">Confirm Password</label>
                                                       <div class="control has-icons-left has-icons-right">
                                                            <input class="input is-success" name="confirmPass" type="password" placeholder="Confirm Passowrd">
                                                            <span class="icon is-small is-left">
                                                                 <i class="fa-solid fa-lock"></i>
                                                            </span>
                                                       </div>
                                                  </div>
                                                  <div class="field my-5">
                                                       <!-- <label class="label">Country</label> -->
                                                       <div class="control">
                                                            <select class="selectpicker countrypicker" name="country" data-flag="true"></select>
                                                            <!-- <input class="input is-success" name="country" type="text" placeholder="Text input"> -->
                                                       </div>
                                                  </div>

                                                  <div class="field">
                                                       <label class="label">Referral ID</label>
                                                       <div class="control has-icons-left has-icons-right">
                                                            <input class="input is-success" name="referralId" type="text" placeholder="Referral optional">
                                                            <span class="icon is-small is-left">
                                                                 <i class="fa-thin fa-repeat"></i>
                                                            </span>
                                                       </div>
                                                  </div>


                                                  <div class="field">
                                                       <div class="control">
                                                            <label class="checkbox">
                                                                 <input type="checkbox">
                                                                 I agree to the <a href="#">terms and conditions</a>
                                                            </label>
                                                       </div>
                                                  </div>

                                                  <div class="field is-grouped">
                                                       <div class="control">
                                                            <button class="button is-link">Submit</button>
                                                       </div>
                                                       <div class="control">
                                                            <button class="button is-link is-light">Cancel</button>
                                                       </div>
                                                  </div>
                                        </form>
                                   </div>
                              </div>
                              <footer class="card-footer">
                                   <a href="#" class="card-footer-item">© Copyright 2022 APA finacial All Rights Reserved.</a>
                              </footer>
                         </div>
                    </div>
               </div>
          </div>
     </section>

</body>

<!-- for country flag -->
<script src="//code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
<script src="//mojoaxel.github.io/bootstrap-select-country/dist/js/bootstrap-select-country.min.js"></script>
<!-- all needed -->
<script src="https://kit.fontawesome.com/678ed16258.js" crossorigin="anonymous"></script>
<script src="assets/octaValidate-PHP-main//frontend/helper.js"></script>

</html>