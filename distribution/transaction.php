<?php
require './header.php';
?>
<div class="content-inner w-100">
     <!-- Page Header-->
     <header class="bg-white shadow-sm px-4 py-3 z-index-20">
          <div class="container-fluid px-0">
               <h2 class="mb-0 p-1">Charts</h2>
          </div>
     </header>
     <!-- Breadcrumb-->
     <div class="bg-white">
          <div class="container-fluid">
               <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 py-3">
                         <li class="breadcrumb-item"><a class="fw-light" href="index.html">Home</a></li>
                         <li class="breadcrumb-item active fw-light" aria-current="page">Charts</li>
                    </ol>
               </nav>
          </div>
     </div>
     <!-- Charts Section-->
     <section class="charts">
          <div class="container-fluid">
               <div class="row gy-4 align-items-stretch">
                    <!-- Line Charts-->
                    <div class="col-lg-8">
                         <div class="card mb-0 h-100">
                              <div class="card-header d-flex align-items-center">
                                   <div class="card-close">
                                        <div class="dropdown">
                                             <button class="dropdown-toggle text-sm" type="button" id="closeCard1" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-v"></i></button>
                                             <div class="dropdown-menu dropdown-menu-end shadow-sm" aria-labelledby="closeCard1"><a class="dropdown-item py-1 px-3 remove" href="#"> <i class="fas fa-times"></i>Close</a><a class="dropdown-item py-1 px-3 edit" href="#"> <i class="fas fa-cog"></i>Edit</a></div>
                                        </div>
                                   </div>
                                   <h3 class="h4 mb-0">Line Chart Example</h3>
                              </div>
                              <div class="card-body">
                                   <canvas id="lineChartExample"></canvas>
                              </div>
                         </div>
                    </div>
                    <div class="col-lg-4">
                         <div class="card mb-0">
                              <div class="card-header d-flex align-items-center">
                                   <div class="card-close">
                                        <div class="dropdown">
                                             <button class="dropdown-toggle text-sm" type="button" id="closeCard1" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-v"></i></button>
                                             <div class="dropdown-menu dropdown-menu-end shadow-sm" aria-labelledby="closeCard1"><a class="dropdown-item py-1 px-3 remove" href="#"> <i class="fas fa-times"></i>Close</a><a class="dropdown-item py-1 px-3 edit" href="#"> <i class="fas fa-cog"></i>Edit</a></div>
                                        </div>
                                   </div>
                                   <h3 class="h4 mb-0">Line Chart Example</h3>
                              </div>
                              <div class="card-body">
                                   <canvas id="lineChartExample1"></canvas>
                              </div>
                         </div>
                         <div class="card mb-0">
                              <div class="card-close">
                                   <div class="dropdown">
                                        <button class="dropdown-toggle text-sm" type="button" id="closeCard1" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-v"></i></button>
                                        <div class="dropdown-menu dropdown-menu-end shadow-sm" aria-labelledby="closeCard1"><a class="dropdown-item py-1 px-3 remove" href="#"> <i class="fas fa-times"></i>Close</a><a class="dropdown-item py-1 px-3 edit" href="#"> <i class="fas fa-cog"></i>Edit</a></div>
                                   </div>
                              </div>
                              <div class="card-body">
                                   <canvas id="lineChartExample2"></canvas>
                              </div>
                         </div>
                    </div>
                    <!-- Bar Charts-->
                    <div class="col-lg-4">
                         <div class="card mb-0">
                              <div class="card-header d-flex align-items-center">
                                   <div class="card-close">
                                        <div class="dropdown">
                                             <button class="dropdown-toggle text-sm" type="button" id="closeCard1" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-v"></i></button>
                                             <div class="dropdown-menu dropdown-menu-end shadow-sm" aria-labelledby="closeCard1"><a class="dropdown-item py-1 px-3 remove" href="#"> <i class="fas fa-times"></i>Close</a><a class="dropdown-item py-1 px-3 edit" href="#"> <i class="fas fa-cog"></i>Edit</a></div>
                                        </div>
                                   </div>
                                   <h3 class="h4 mb-0">Bar Chart Example</h3>
                              </div>
                              <div class="card-body">
                                   <canvas id="barChart1"></canvas>
                              </div>
                         </div>
                         <div class="card mb-0">
                              <div class="card-close">
                                   <div class="dropdown">
                                        <button class="dropdown-toggle text-sm" type="button" id="closeCard1" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-v"></i></button>
                                        <div class="dropdown-menu dropdown-menu-end shadow-sm" aria-labelledby="closeCard1"><a class="dropdown-item py-1 px-3 remove" href="#"> <i class="fas fa-times"></i>Close</a><a class="dropdown-item py-1 px-3 edit" href="#"> <i class="fas fa-cog"></i>Edit</a></div>
                                   </div>
                              </div>
                              <div class="card-body">
                                   <canvas id="barChart2"></canvas>
                              </div>
                         </div>
                    </div>
                    <div class="col-lg-8">
                         <div class="card mb-0 h-100">
                              <div class="card-header d-flex align-items-center">
                                   <div class="card-close">
                                        <div class="dropdown">
                                             <button class="dropdown-toggle text-sm" type="button" id="closeCard1" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-v"></i></button>
                                             <div class="dropdown-menu dropdown-menu-end shadow-sm" aria-labelledby="closeCard1"><a class="dropdown-item py-1 px-3 remove" href="#"> <i class="fas fa-times"></i>Close</a><a class="dropdown-item py-1 px-3 edit" href="#"> <i class="fas fa-cog"></i>Edit</a></div>
                                        </div>
                                   </div>
                                   <h3 class="h4 mb-0">Bar Chart Example</h3>
                              </div>
                              <div class="card-body">
                                   <canvas id="barChartExample"></canvas>
                              </div>
                         </div>
                    </div>
                    <!-- Doughnut Chart -->
                    <div class="col-lg-6">
                         <div class="card mb-0">
                              <div class="card-header d-flex align-items-center">
                                   <div class="card-close">
                                        <div class="dropdown">
                                             <button class="dropdown-toggle text-sm" type="button" id="closeCard1" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-v"></i></button>
                                             <div class="dropdown-menu dropdown-menu-end shadow-sm" aria-labelledby="closeCard1"><a class="dropdown-item py-1 px-3 remove" href="#"> <i class="fas fa-times"></i>Close</a><a class="dropdown-item py-1 px-3 edit" href="#"> <i class="fas fa-cog"></i>Edit</a></div>
                                        </div>
                                   </div>
                                   <h3 class="h4 mb-0">Doughnut Chart Example</h3>
                              </div>
                              <div class="card-body">
                                   <div class="row">
                                        <div class="col-lg-10 mx-auto">
                                             <canvas id="doughnutChartExample"></canvas>
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>
                    <!-- Pie Chart -->
                    <div class="col-lg-6">
                         <div class="card mb-0">
                              <div class="card-header d-flex align-items-center">
                                   <div class="card-close">
                                        <div class="dropdown">
                                             <button class="dropdown-toggle text-sm" type="button" id="closeCard1" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-v"></i></button>
                                             <div class="dropdown-menu dropdown-menu-end shadow-sm" aria-labelledby="closeCard1"><a class="dropdown-item py-1 px-3 remove" href="#"> <i class="fas fa-times"></i>Close</a><a class="dropdown-item py-1 px-3 edit" href="#"> <i class="fas fa-cog"></i>Edit</a></div>
                                        </div>
                                   </div>
                                   <h3 class="h4 mb-0">Pie Chart Example</h3>
                              </div>
                              <div class="card-body">
                                   <div class="row">
                                        <div class="col-lg-10 mx-auto">
                                             <canvas id="pieChartExample"></canvas>
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>
                    <!-- Polar Chart-->
                    <div class="col-lg-6">
                         <div class="card mb-0">
                              <div class="card-header d-flex align-items-center">
                                   <div class="card-close">
                                        <div class="dropdown">
                                             <button class="dropdown-toggle text-sm" type="button" id="closeCard1" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-v"></i></button>
                                             <div class="dropdown-menu dropdown-menu-end shadow-sm" aria-labelledby="closeCard1"><a class="dropdown-item py-1 px-3 remove" href="#"> <i class="fas fa-times"></i>Close</a><a class="dropdown-item py-1 px-3 edit" href="#"> <i class="fas fa-cog"></i>Edit</a></div>
                                        </div>
                                   </div>
                                   <h3 class="h4 mb-0">Polar Chart Example</h3>
                              </div>
                              <div class="card-body">
                                   <div class="row">
                                        <div class="col-lg-10 mx-auto">
                                             <canvas id="polarChartExample"></canvas>
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>
                    <!-- Radar Chart-->
                    <div class="col-lg-6">
                         <div class="card mb-0">
                              <div class="card-header d-flex align-items-center">
                                   <div class="card-close">
                                        <div class="dropdown">
                                             <button class="dropdown-toggle text-sm" type="button" id="closeCard1" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-v"></i></button>
                                             <div class="dropdown-menu dropdown-menu-end shadow-sm" aria-labelledby="closeCard1"><a class="dropdown-item py-1 px-3 remove" href="#"> <i class="fas fa-times"></i>Close</a><a class="dropdown-item py-1 px-3 edit" href="#"> <i class="fas fa-cog"></i>Edit</a></div>
                                        </div>
                                   </div>
                                   <h3 class="h4 mb-0">Radar Chart Example</h3>
                              </div>
                              <div class="card-body">
                                   <div class="row">
                                        <div class="col-lg-10 mx-auto">
                                             <canvas id="radarChartExample"></canvas>
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </section>
     <!-- Page Footer-->
     <footer class="position-absolute bottom-0 bg-darkBlue text-white text-center py-3 w-100 text-xs" id="footer">
          <div class="container-fluid">
               <div class="row gy-2">
                    <div class="col-sm-6 text-sm-start">
                         <p class="mb-0">Your company &copy; 2017-2022</p>
                    </div>
                    <div class="col-sm-6 text-sm-end">
                         <p class="mb-0">Design by <a href="https://bootstrapious.com/p/admin-template" class="text-white text-decoration-none">Bootstrapious</a></p>
                         <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
                    </div>
               </div>
          </div>
     </footer>
</div>
</div>
</div>
<!-- JavaScript files-->
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="vendor/chart.js/Chart.min.js"></script>
<script src="vendor/just-validate/js/just-validate.min.js"></script>
<script src="vendor/choices.js/public/assets/scripts/choices.min.js"></script>
<script src="js/charts-custom.js"></script>
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
</body>

</html>