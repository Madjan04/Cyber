<?php include "head.php";
$a = 2;?>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

        <?php include "sidebar.php"?>


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <?php include "navbar.php"?>
            <!-- Navbar End -->


            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-12">
                        <div class="card bg-secondary">
                            
                            <div class="card-body">
                                <h5 class="card-title">Digital Products</h5>
                                </div>
                        </div>
                    </div>

                    
                </div>
            </div>
            <!-- Sales Chart Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <?php while ($product = mysqli_fetch_array($prod)) {?>
                        <div class="col-sm-12 col-xl-4">
                            <div class="card bg-secondary">
                                <img src="../assets/images/game/<?php echo $product['productImage']?>" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $product['productName']?></h5>
                                    <p class="card-text"><?php echo $product['categoryName']?></p>
                                    <p class="card-text">₱ <?php echo number_format($product['productPrice'], 2, '.', ',')?></p>
                                    <a href="index.php?purchase=<?php echo $product['productID']?>" class="btn btn-primary">Buy Now</a>
                                </div>
                            </div>
                        </div>
                    <?php }?>
                    

                    
                </div>
            </div>
            


            <?php include "footer.php"?>
        </div>
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>