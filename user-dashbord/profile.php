<?php
require "header.php";
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['profile'])) {
     $result = $db->Update(
          "UPDATE users SET fullName = :fullName, phone = :phone, username = :username, balance = :balance WHERE users.id = :id",
          ['fullName' => $_POST['phone'], 'phone' => $_POST['phone'], 'username' => $_POST['username'], 'balance' => $_POST['username'], 'id' => $user_Id]
     );
     if ($result) {
          # code...
          print('<script>
          document.addEventListener("DOMContentLoaded", function(){
               toastr.error("Update successfully");
               setTimeout(function() {
                    toastr.clear()
               }, 3000);
     });</script>');
     }
}

?>
<div class="content-inner w-100">
     <!-- Page Header-->
     <header class="bg-white shadow-sm px-4 py-3 z-index-20">
          <div class="container-fluid px-0">
               <h2 class="mb-0 p-1">Account</h2>
          </div>
     </header>
     <!-- Breadcrumb-->
     <div class="bg-white">
          <div class="container-fluid">
               <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 py-3">
                         <li class="breadcrumb-item"><a class="fw-light" href="index.html">Home</a></li>
                         <li class="breadcrumb-item active fw-light" aria-current="page">Profile</li>
                    </ol>
               </nav>
          </div>
     </div>
     <!-- Charts Section-->
     <section class="charts">
          <div class="container-fluid">
               <div class="row gy-4 align-items-stretch">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                         <li class="nav-item" role="presentation">
                              <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Profile Settings</button>
                         </li>
                         <li class="nav-item" role="presentation">
                              <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Password Details</button>
                         </li>
                         <!-- <li class="nav-item" role="presentation">
                              <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Others</button>
                         </li> -->
                    </ul>
                    <div class="tab-content" id="myTabContent">
                         <!-- first tab -->
                         <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                              <div class="card mb-0">
                                   <div class="card-header">
                                        <div class="card-close">
                                             <div class="dropdown">
                                                  <button class="dropdown-toggle text-sm" type="button" id="closeCard1" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-v"></i></button>
                                                  <div class="dropdown-menu dropdown-menu-end shadow-sm" aria-labelledby="closeCard1"><a class="dropdown-item py-1 px-3 remove" href="#"> <i class="fas fa-times"></i>Close</a><a class="dropdown-item py-1 px-3 edit" href="#"> <i class="fas fa-cog"></i>Edit</a></div>
                                             </div>
                                        </div>
                                        <h3 class="h4 mb-0">Profile Settings</h3>
                                   </div>
                                   <div class="card-body">
                                        <form method="post" action="">
                                             <?php
                                             $results = $db->SelectAll("SELECT * FROM users WHERE user_id = :userId", ['userId' => $user_Id]);
                                             if ($results && count($results)) {
                                                  foreach ($results as $i => $result) {
                                             ?>

                                                       <div class="row">
                                                            <div class="col-sm-12 col-md-6">
                                                                 <div class="mb-3">
                                                                      <label for="disabledTextInput" class="form-label">Email</label>
                                                                      <input type="text" id="disabledTextInput" class="form-control input-sm" placeholder="<?= $result['email'] ?>" disabled>
                                                                 </div>
                                                                 <div class="mb-3">
                                                                      <label for="disabledTextInput" class="form-label">FullName</label>
                                                                      <input type="text" name="fullNaame" class="form-control" value="<?= $result['fullName'] ?>">
                                                                 </div>
                                                                 <div class="mb-3">
                                                                      <label for="disabledTextInput" class="form-label">Phone</label>
                                                                      <input type="text" name="phone" class="form-control" value="<?= $result['phone'] ?>">
                                                                 </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-6">
                                                                 <div class="mb-3">
                                                                      <label for="disabledTextInput" class="form-label">Username</label>
                                                                      <input type="text" name="username" class="form-control" value="<?= $result['username'] ?>">
                                                                 </div>

                                                            </div>
                                                       </div>
                                                       <button type="submit" name="profile" class="btn btn-primary">Update</button>
                                             <?php
                                                  }
                                             }
                                             ?>

                                        </form>
                                   </div>
                              </div>
                         </div>

                         <!-- Second Tab  -->
                         <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                              <div class="card mb-0">
                                   <div class="card-header">
                                        <div class="card-close">
                                             <div class="dropdown">
                                                  <button class="dropdown-toggle text-sm" type="button" id="closeCard1" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-v"></i></button>
                                                  <div class="dropdown-menu dropdown-menu-end shadow-sm" aria-labelledby="closeCard1"><a class="dropdown-item py-1 px-3 remove" href="#"> <i class="fas fa-times"></i>Close</a><a class="dropdown-item py-1 px-3 edit" href="#"> <i class="fas fa-cog"></i>Edit</a></div>
                                             </div>
                                        </div>
                                        <h3 class="h4 mb-0">Change Password</h3>
                                   </div>
                                   <div class="card-body">
                                        <form method="post" action="">

                                             <div class="row">
                                                  <div class="col-sm-12">
                                                       <div class="mb-3">
                                                            <label for="disabledTextInput" class="form-label">Password</label>
                                                            <input type="text" name="pass" class="form-control">
                                                       </div>
                                                       <div class="mb-3">
                                                            <label for="disabledTextInput" class="form-label">Comfirm Password</label>
                                                            <input type="text" name="confirmPass" class="form-control">
                                                       </div>
                                                  </div>
                                             </div>
                                             <button type="submit" class="btn btn-primary">Update</button>

                                        </form>
                                   </div>
                              </div>
                         </div>

                         <!-- last tab -->
                         <!-- <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">
                              <div class="card mb-0">
                                   <div class="card-header">
                                        <div class="card-close">
                                             <div class="dropdown">
                                                  <button class="dropdown-toggle text-sm" type="button" id="closeCard1" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-v"></i></button>
                                                  <div class="dropdown-menu dropdown-menu-end shadow-sm" aria-labelledby="closeCard1"><a class="dropdown-item py-1 px-3 remove" href="#"> <i class="fas fa-times"></i>Close</a><a class="dropdown-item py-1 px-3 edit" href="#"> <i class="fas fa-cog"></i>Edit</a></div>
                                             </div>
                                        </div>
                                        <h3 class="h4 mb-0">Your ROI history</h3>
                                   </div>
                                   <div class="card-body">
                                        <div class="table-responsive">
                                             <table class="table mb-0">
                                                  <thead>
                                                       <tr>
                                                            <th>Amount</th>
                                                            <th>Type</th>
                                                            <th>Plan/Nirration</th>
                                                            <th>Date</th>
                                                       </tr>
                                                  </thead>
                                                  <tbody>
                                                       <tr>
                                                            <th>$<?= $bonus ?></th>
                                                            <td>Bonus</td>
                                                            <td>Signup Bonus</td>
                                                            <td>Thu, Nov 17, 2022 12:41 PM</td>
                                                       </tr>
                                                  </tbody>
                                             </table>
                                        </div>
                                   </div>
                              </div>
                         </div> -->
                    </div>
               </div>
          </div>
     </section>
     <!-- Page Footer-->
     <?php
     require "./footer.php";
     ?>
</div>
</div>
</div>