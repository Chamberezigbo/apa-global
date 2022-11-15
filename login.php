<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
</head>

<style>
     body {
          background-color: rgb(228, 244, 255);
          height: 99vh;
     }
</style>

<body>
     <section class="section">
          <div class="container">
               <div class="columns is-centered my-6">
                    <div class="column is-two-fifths width pt-3">
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
                                        <div class="field">
                                             <p class="control has-icons-left has-icons-right">
                                                  <input class="input" type="email" placeholder="Email">
                                                  <span class="icon is-small is-left">
                                                       <i class="fas fa-envelope"></i>
                                                  </span>
                                                  <span class="icon is-small is-right">
                                                       <i class="fas fa-check"></i>
                                                  </span>
                                             </p>
                                        </div>
                                        <div class="field">
                                             <p class="control has-icons-left">
                                                  <input class="input" type="password" placeholder="Password">
                                                  <span class="icon is-small is-left">
                                                       <i class="fas fa-lock"></i>
                                                  </span>
                                             </p>
                                        </div>
                                        <div class="field is-grouped ">
                                             <div class="control">
                                                  <label class="checkbox is-size-6">
                                                       <input type="checkbox">
                                                       I agree to the <a href="#">terms and conditions</a>
                                                  </label>
                                             </div>
                                        </div>
                                        <div class="field">
                                             <p class="control">
                                                  <button class="button is-primary is-fullwidth">
                                                       Login
                                                  </button>
                                             </p>
                                        </div>
                                        <div class="field has-text-centered">
                                             <p class="is-size-7 ">
                                                  Don't have an account ? <a href="register.php">Sign up</a>
                                             </p>
                                        </div>
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


<script src="https://kit.fontawesome.com/678ed16258.js" crossorigin="anonymous"></script>

</html>