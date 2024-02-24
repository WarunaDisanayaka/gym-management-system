<?php
    include "config/db.php";
    $result = $conn->query("SELECT * FROM products");
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="GYm, fitness, business, company, agency, multipurpose, modern, bootstrap4">
      <meta name="author" content="Themefisher.com">
      <title>AJ GYM - Products</title>
      <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
      <link rel="stylesheet" href="plugins/icofont/icofont.min.css">
      <link rel="stylesheet" href="plugins/themify/css/themify-icons.css">
      <link rel="stylesheet" href="plugins/animate-css/animate.css">
      <link rel="stylesheet" href="plugins/magnific-popup/dist/magnific-popup.css">
      <link rel="stylesheet" href="plugins/slick-carousel/slick/slick.css">
      <link rel="stylesheet" href="plugins/slick-carousel/slick/slick-theme.css">
      <link rel="stylesheet" href="css/style.css">
   </head>
   <body>
      <!-- Header Start -->
      <?php include "inc/header.php"; ?>
      <!-- Header Close -->
      <div class="main-wrapper">
         <section class="page-title bg-2">
            <div class="container">
               <div class="row">
                  <div class="col-lg-12 text-center">
                     <ul class="list-inline mb-0">
                        <li class="list-inline-item"><a href="index.html" class="text-sm letter-spacing text-white text-uppercase font-weight-bold">Home</a></li>
                        <li class="list-inline-item"><span class="text-white">|</span></li>
                        <li class="list-inline-item"><a href="#" class="text-color text-uppercase text-sm letter-spacing">Products</a></li>
                     </ul>
                     <h1 class="text-lg text-white mt-2">Our Products</h1>
                  </div>
               </div>
            </div>
         </section>
         <!-- Section products start -->
         <section class="section products bg-gray">
            <div class="container">
               <div class="row justify-content-center">
                  <div class="col-lg-8 text-center">
                     <div class="section-title">
                        <div class="divider mb-3"></div>
                        <h2>Explore Our Products</h2>
                     </div>
                  </div>
               </div>
               <div class="row justify-content-center">
                  <?php
                  // Loop through the result set and display each product
                  while ($row = $result->fetch_assoc()) {
                  ?>
                     <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card">
                           <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light"
                              data-mdb-ripple-color="light">
                              <img src="gym/<?php echo $row['image_path']; ?>" class="img-fluid" style="max-height: 300px;" />
                              <a href="#!">
                                 <div class="hover-overlay">
                                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                                 </div>
                              </a>
                           </div>
                           <div class="card-body">
                              <a href="" class="text-reset">
                                 <h5 class="card-title mb-3"><?php echo $row['product']; ?></h5>
                              </a>
                              <a href="" class="text-reset">
                                 <p><?php echo $row['product_category']; ?></p>
                              </a>
                              <h6 class="mb-3">Rs <?php echo $row['amount']; ?></h6>
                              <a href="payment.php?product_name=<?php echo urlencode($row['product']); ?>&product_price=<?php echo $row['amount']; ?>" class="btn btn-primary">Buy Now</a>
                           </div>
                        </div>
                     </div>
                  <?php
                  }
                  ?>
               </div>
            </div>
            </div>
         </section>
         <!-- Section products End -->
         <!-- Footer Start -->
         <footer class="footer bg-black-50">
            <!-- Add your footer content here -->
         </footer>
         <!-- Footer End -->
      </div>
      <!-- Essential Scripts -->
      <script src="plugins/jquery/jquery.js"></script>
      <script src="plugins/bootstrap/js/bootstrap.min.js"></script>
      <script src="plugins/slick-carousel/slick/slick.min.js"></script>
      <script src="plugins/magnific-popup/dist/jquery.magnific-popup.min.js"></script>
      <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery.form/3.32/jquery.form.js"></script>
      <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.11.1/jquery.validate.min.js"></script>
      <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_GOOGLE_MAPS_API_KEY"></script>
      <script src="plugins/google-map/gmap.js"></script>
      <script src="js/script.js"></script>
   </body>
</html>