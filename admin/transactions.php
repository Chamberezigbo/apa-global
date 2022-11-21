<?php
session_start();

$id = (isset($_GET) && isset($_GET['id'])) ? htmlspecialchars($_GET['id']) : exit();

require('../process/pdo.php');

$db = new DatabaseClass();

$user = $db->SelectOne("SELECT * FROM users WHERE users.id = :id", ['id' => $id]);
//if user does not exist, kill the page
(!$user) && exit();

$deposits = $db->SelectAll("SELECT * FROM deposit WHERE deposit.user_id = :uid AND deposit.action_type IS NULL", ['uid' => $user['user_id']]);
$withdrawals = $db->SelectAll("SELECT * FROM withdrawal WHERE withdrawal.user_id = :uid AND withdrawal.action_type IS NULL", ['uid' => $user['user_id']]);

//success / failure error
$msg = $success = '';
if (isset($_SESSION['success']) && isset($_SESSION['msg'])) {
     // || checks for boolean values only
     $success = $_SESSION['success'] || false;
     $msg = $_SESSION['msg'];
     //remove the session
     unset($_SESSION['success']);
     unset($_SESSION['msg']);
}
if ($_SERVER['REQUEST_METHOD'] == "POST") {
     if (isset($_POST['action']) && !empty($_POST['action'])) {
          $action = $_POST['action'];
          //confirm deposit transaction
          if ($action == 'confirm_deposit' && $user) {
               //check if transaction exists
               $checkTrans = $db->SelectOne("SELECT * FROM deposit WHERE deposit.user_id = :uid AND deposit.action_type IS NULL ", ['uid' => $user['user_id']]);
               //check if transaction exists
               if ($checkTrans) {
                    $trans_action = (isset($_POST['trans_action']) && !empty($_POST['trans_action']) && intval($_POST['trans_action']) == 1) ? 'confirmed' : 'rejected';
                    $currentBAl = $user['balance'] + $checkTrans['amount'];
                    $db->Update("UPDATE users SET balance = :bal WHERE user_id = :uid", ['bal' => $currentBAl, 'uid' => $user['user_id']]);
                    $db->Update("UPDATE deposit SET status = :st, action_type = :type WHERE deposit.id = :id", ['st' => $trans_action, 'id' => $checkTrans['id'], 'type' => "Confirm"]);
                    $_SESSION['success'] = true;
                    $_SESSION['msg'] = "Transaction has been updated successfully";
                    //reset post array
                    header("Location: ./transactions.php?id=$id");
                    exit();
               }
          }
          if ($action == 'confirm_withdrawal' && $user) {
               //check if transaction exists
               $checkTrans = $db->SelectOne("SELECT * FROM withdrawal WHERE withdrawal.user_id = :uid AND withdrawal.action_type IS NULL", ['uid' => $user['user_id']]);
               //check if transaction exists
               if ($checkTrans) {
                    $trans_action = (isset($_POST['trans_action']) && !empty($_POST['trans_action']) && intval($_POST['trans_action']) == 1) ? 'confirmed' : 'rejected';
                    // minunuse from user Balance</
                    $currentBAl = $user['balance'] - $checkTrans['amount'];
                    $db->Update("UPDATE withdrawal SET status = :st,action_type = :type WHERE withdrawal.id = :id", ['st' => $trans_action, 'id' => $checkTrans['id'], 'type' => "Confirm"]);
                    $_SESSION['success'] = true;
                    $_SESSION['msg'] = "Transaction has been updated successfully";
                    //reset post array
                    header("Location: ./transactions.php?id=$id ");
                    exit();
               }
          }
     }
}


//acc bal is sum of except 
require 'header.php';
?>
<div class="content-inner w-100">
     <!-- Page Header-->
     <header class="bg-white shadow-sm px-4 py-3 z-index-20">
          <div class="container-fluid px-0">
               <h2 class="mb-0 p-1">Transactions</h2>
          </div>
     </header>
     <!-- Breadcrumb-->
     <div class="bg-white">
          <div class="container-fluid">
               <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 py-3">
                         <li class="breadcrumb-item"><a class="fw-light" href="index.html">Home</a></li>
                         <li class="breadcrumb-item active fw-light" aria-current="page">Transactions</li>
                    </ol>
               </nav>
          </div>
     </div>
     <section class="tables">
          <div class="container-fluid">
               <div class="table-responsive mt-5 mb-5">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                         <li class="nav-item" role="presentation">
                              <button class="nav-link active" id="deposit-tab" data-bs-toggle="tab" data-bs-target="#deposit" type="button" role="tab" aria-controls="deposit" aria-selected="true">Deposit</button>
                         </li>
                         <li class="nav-item" role="presentation">
                              <button class="nav-link" id="withdrawal-tab" data-bs-toggle="tab" data-bs-target="#withdrawal" type="button" role="tab" aria-controls="withdrawal" aria-selected="false">Withdrawal</button>
                         </li>
                         <li class="nav-item" role="presentation">
                              <button class="nav-link" id="others-tab" data-bs-toggle="tab" data-bs-target="#others" type="button" role="tab" aria-controls="others" aria-selected="false">Others</button>
                         </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                         <div class="tab-pane fade show active" id="deposit" role="tabpanel" aria-labelledby="deposit-tab">
                              <table class="table table-bordered">
                                   <thead>
                                        <tr>
                                             <th>Amount </th>
                                             <th>Payment mode </th>
                                             <th>Status</th>
                                             <th>Date</th>
                                             <th class="text-center">Action</th>
                                        </tr>
                                   </thead>
                                   <tbody>
                                        <?php
                                        if (!$deposits) {
                                        ?>
                                             <td colspan="5" class="text-center">
                                                  <span class="text-danger">No deposit</span>
                                             </td>
                                        <?php
                                        }
                                        foreach ($deposits as $i => $deposit) {
                                        ?>
                                             <tr>
                                                  <td><?php echo ($deposit['amount']); ?></td>
                                                  <td><?php echo ($deposit['payment_mode']); ?> </td>
                                                  <td><?php echo ($deposit['status']); ?></td>
                                                  <td><?php echo ($deposit['date']); ?></td>
                                                  <td class="text-center">
                                                       <form method="post" class="d-inline me-3">
                                                            <input type="hidden" name="action" value="confirm_deposit" />
                                                            <input type="hidden" name="trans_action" value="1" />
                                                            <input type="hidden" name="trans_id" value="<?php echo $deposit['id']; ?>" />
                                                            <button class="btn btn-success">Confirm</button>
                                                       </form>
                                                       <form method="post" class="d-inline">
                                                            <input type="hidden" name="action" value="confirm_deposit" />
                                                            <input type="hidden" name="trans_action" value="0" />
                                                            <input type="hidden" name="trans_id" value="<?php echo $deposit['id']; ?>" />
                                                            <button class="btn btn-danger">Reject</button>
                                                       </form>
                                                  </td>
                                             </tr>
                                        <?php } ?>
                                   </tbody>
                              </table>
                         </div>
                         <div class="tab-pane fade" id="withdrawal" role="tabpanel" aria-labelledby="withdrawal-tab">
                              <table class="table table-bordered">
                                   <thead>
                                        <tr>
                                             <th>Amount </th>
                                             <th>Charges</th>
                                             <th>Payment mode </th>
                                             <th>Status</th>
                                             <th>Date</th>
                                             <th class="tect-center" colspan="2">Action</th>
                                        </tr>
                                   </thead>
                                   <tbody>
                                        <?php
                                        if (!$withdrawals) {
                                        ?>
                                             <td colspan="5" class="text-center">
                                                  <span class="text-danger">No deposit</span>
                                             </td>
                                        <?php
                                        }
                                        foreach ($withdrawals as $i => $withdrawal) {
                                        ?>
                                             <tr>
                                                  <td><?php echo ($withdrawal['amount']); ?></td>
                                                  <td><?php echo ($withdrawal['charges']); ?> </td>
                                                  <td><?php echo ($withdrawal['receive_mode']); ?></td>
                                                  <td><?php echo ($withdrawal['status']); ?></td>
                                                  <td><?php echo ($withdrawal['date']); ?></td>
                                                  <td class="text-center">
                                                       <form method="post" class="d-inline me-3">
                                                            <input type="hidden" name="action" value="confirm_withdrawal" />
                                                            <input type="hidden" name="trans_action" value="1" />
                                                            <input type="hidden" name="trans_id" value="<?php echo $deposit['id']; ?>" />
                                                            <button class="btn btn-success">Confirm</button>
                                                       </form>
                                                       <form method="post" class="d-inline">
                                                            <input type="hidden" name="action" value="confirm_withdrawal" />
                                                            <input type="hidden" name="trans_action" value="0" />
                                                            <input type="hidden" name="trans_id" value="<?php echo $deposit['id']; ?>" />
                                                            <button class="btn btn-danger">Reject</button>
                                                       </form>
                                                  </td>
                                             </tr>
                                        <?php } ?>
                                   </tbody>
                              </table>
                         </div>
                         <div class="tab-pane fade" id="others" role="tabpanel" aria-labelledby="others-tab">
                              <table class="table table-bordered">
                                   <thead>
                                        <tr>
                                             <th>Amount</th>
                                             <th>Type</th>
                                             <th>Date</th>
                                        </tr>
                                   </thead>
                                   <tbody>
                                        <tr>
                                             <td>$5</td>
                                             <td>Signup Bonus</td>
                                             <td>
                                                  <?php echo date('D M Y', time()); ?>
                                             </td>
                                        </tr>
                                   </tbody>
                              </table>

                         </div>
                    </div>
               </div>
          </div>
     </section>
     <!-- Page Footer-->

</div>
</div>
</div>
<!-- modal update password -->
<div class="modal" id="modal_bal" tabindex="-1">
     <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
               <div class="modal-header">
                    <h5 class="modal-title">Update Balance</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">

               </div>
               <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button form="form_upd_bal" class="btn btn-success">Update</button>
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
          ajax.onload = function(e) {
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
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
<script src="./toastr/toastr.min.js"> </script>
<script>
     document.addEventListener('DOMContentLoaded', function() {
          $('#btn_upd_pwd').on('click', function() {
               //show the modal
               new bootstrap.Modal('#modal_pwd').show()
          })
          $('#btn_upd_bal').on('click', function() {
               //show the modal
               new bootstrap.Modal('#modal_bal').show()
          })

          const myForm = new octaValidate('form_upd_pass')
          $('#form_upd_pass').on('submit', (e) => {
               e.preventDefault()
               if (myForm.validate()) {
                    e.currentTarget.submit()
               }
          })
     })
</script>
<script>
     <?php
     if (isset($success) && isset($msg)) {
          if ($success && !empty($msg)) {
     ?>
               toastr.success("<?php echo $msg; ?>")
          <?php
          } elseif (!$success && !empty($msg)) { ?>
               toastr.error("<?php echo $msg; ?>")
     <?php
          }
     }
     ?>
</script>
</body>

</html>