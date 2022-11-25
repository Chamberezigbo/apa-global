<?php 
require_once('app.php');
include "header.php"; 
?>
<style>
     .fs-custom {
          font-size: 13px;
     }
</style>
<div class="content-inner w-100">
     <!-- Page Header-->
     <header class="bg-white shadow-sm px-4 py-3 z-index-20">
          <div class="container-fluid px-0">
               <h2 class="mb-0 p-1">Request for Withdrawal</h2>
          </div>
     </header>
     <div class="mt-5 me-5 d-flex justify-content-md-end">
          <button class="btn btn-primary btn-sm" type="button"><i class="fa-regular fa-envelope"></i> Request OTP</button>
     </div>
     <!-- Forms Section-->
     <section class="forms">
          <div class="container-fluid">
               <div class="row">
                    <!-- Horizontal Form-->
                    <div class="p-md-4 p-2 rounded card bg-light">
                         <div class="card-body">
                              <div class="d-flex justify-content-md-center">
                                   <div class="alert alert-success d-flex align-items-center w-50" role="alert">
                                        <i class="fa-solid fa-check"></i>
                                        <div class="mx-auto">
                                             <h4 class="text-dark">Your Payment Method is <strong>USDT</strong></h4>
                                        </div>
                                   </div>
                              </div>
                              <form action="https://user.equitrim-capital.org/dashboard/completewithdrawal" method="post">
                                   <input type="hidden" name="_token" value="VwJXSdV5Py8OIzWjZnjqdOUj6MXszJxbjQZCUJJF">
                                   <div class="form-group">
                                        <h5 class="text-dark">Enter Amount to withdraw</h5>
                                        <input class="form-control text-dark bg-light" placeholder="Enter Amount" type="number" name="amount" required="">
                                   </div>
                                   <input value="USDT" type="hidden" name="method">

                                   <div class="form-group">
                                        <h5 class="text-dark">Enter OTP</h5>
                                        <input class="form-control text-dark bg-light" placeholder="Enter Code" type="text" name="otpcode" required="">
                                        <small class="text-dark">OTP will be sent to your email when you request</small>
                                   </div>
                                   <div class="form-group">
                                        <h5 class="text-dark">Enter USDT Address </h5>
                                        <input class="form-control text-dark bg-light" placeholder="Enter USDT Address" type="text" name="details" required="">
                                        <small class="text-dark">USDT is not a default withdrawal option in your account, please enter the correct wallet address to recieve your funds.</small>
                                   </div>

                                   <div class="form-group">
                                        <button class="btn btn-primary" type="submit">Complete Request</button>
                                   </div>
                              </form>
                         </div>
                    </div>
                    <!-- Inline Form-->
               </div>
          </div>
     </section>
     <!-- Page Footer-->
     <?php require 'footer.php' ?>
</div>
</div>
</div>