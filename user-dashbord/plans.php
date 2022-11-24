<?php require "header.php"; ?>
<style>
     .fs-custom {
          font-size: 13px;
     }
</style>
<div class="content-inner w-100">
     <!-- Page Header-->
     <header class="bg-white shadow-sm px-4 py-3 z-index-20">
          <div class="container-fluid px-0">
               <h2 class="mb-0 p-1">Available packages</h2>
          </div>
     </header>
     <!-- Forms Section-->
     <section class="forms">
          <div class="container-fluid">
               <div class="row">
                    <!-- Horizontal Form-->
                    <?php
                    $results = $db->SelectAll("SELECT * FROM package", []);
                    if ($results && count($results)) {
                         foreach ($results as $i => $result) {
                    ?>
                              <div class="col-lg-4">
                                   <div class="card">
                                        <div class="card-header">
                                             <div class="card-close">
                                                  <div class="dropdown">
                                                       <button class="dropdown-toggle text-sm" type="button" id="closeCard1" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-v"></i></button>
                                                       <div class="dropdown-menu dropdown-menu-end shadow-sm" aria-labelledby="closeCard1"><a class="dropdown-item py-1 px-3 remove" href="#">
                                                                 <i class="fas fa-times"></i>Close</a><a class="dropdown-item py-1 px-3 edit" href="#"> <i class="fas fa-cog"></i>Edit</a></div>
                                                  </div>
                                             </div>

                                             <h3 class="h4 mb-0"><?= $result['package_name'] ?></h3>
                                        </div>
                                        <div class="card-body">
                                             <h1 class="text-center">$ <span class="display-3">
                                                       <?php ($result['max_deposit'] == 0 ? print('Unlimited') : print(number_format($result['max_deposit']))) ?></span></h1>
                                             <div class="d-flex">
                                                  <p class="card-text fs-custom">Minimum Possible Deposit:</p>
                                                  <p class="card-text ms-auto fs-custom">$<?= number_format($result['min_deposit']) ?></p>
                                             </div>
                                             <div class="d-flex">
                                                  <p class="card-text fs-custom">Maximum Possible Deposit:</p>
                                                  <p class="card-text ms-auto fs-custom">$
                                                       <?php
                                                       ($result['max_deposit'] == 0 ? print('Unlimited') : print($result['max_deposit']))
                                                       ?>
                                                  </p>
                                             </div>
                                             <div class="d-flex">
                                                  <p class="card-text fs-custom">Minimum Return:</p>
                                                  <p class="card-text ms-auto fs-custom">$<?= number_format($result['min_return']) ?></p>
                                             </div>
                                             <div class="d-flex">
                                                  <p class="card-text fs-custom">Maximum Return:</p>
                                                  <p class="card-text ms-auto fs-custom">$
                                                       <?php
                                                       ($result['max_return'] == 0 ? print('Unlimited') : print($result['max_return']))
                                                       ?>
                                                  </p>
                                             </div>
                                             <div class="d-flex">
                                                  <p class="card-text fs-custom">Gift Bonus:</p>
                                                  <p class="card-text ms-auto fs-custom">$<?= $result['bonus'] ?></p>
                                             </div>
                                             <div class="d-flex">
                                                  <p class="card-text fs-custom">Duration:</p>
                                                  <p class="card-text ms-auto fs-custom"><?= $result['duration'] ?></p>
                                             </div>
                                             <div class="mb-3">
                                                  <label for="formGroupExampleInput" class="form-label">Amount to invest: (<?= number_format($result['max_deposit']) ?>)</label>
                                                  <input type="number" class="form-control" id="formGroupExampleInput" placeholder="<?= $result['max_deposit'] ?>">
                                             </div>
                                             <div class="d-grid gap-2">
                                                  <button class="btn btn-primary" type="button"><a class="text-light" href="deposit.php">Join Plan</a></button>
                                             </div>
                                        </div>


                                   </div>
                              </div>
                    <?php }
                    }
                    ?>

               </div>
          </div>
     </section>
     <!-- Page Footer-->
     <?php require 'footer.php' ?>
</div>
</div>
</div>