<?php include "head.php";
$a = 1;?>

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


            <!-- Sale & Revenue Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-6 col-xl-3" onclick="window.location.href='unpaid.php'">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fi fi-rr-wallet fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">To Pay</p>
                                <h6 class="mb-0"><?php echo $unpaidcnt['unpaid']?></h6></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-xl-3" onclick="window.location.href='validate.php'">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fi fi-rr-registration-paper fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">To Validate</p>
                                <h6 class="mb-0"><?php echo $valid['validating']?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-xl-3"  onclick="window.location.href='download.php'">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fi fi-rr-cloud-download-alt fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">To Download</p>
                                <h6 class="mb-0"><?php echo $paidww['paid']?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-xl-3" onclick="window.location.href='finished.php'">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            
                            <i class="fi fi-rr-check-circle fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Completed</p>
                                <h6 class="mb-0"><?php echo $rateds['rate']?></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sale & Revenue End -->

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
                                    <?php 
                                    $prdID = $product['productID'];
                                    $r = mysqli_query($con,"SELECT AVG(Rate) starr from orders WHERE productID = $prdID");
                                    $rate = mysqli_fetch_assoc($r);
                                    for ($i=1; $i < $rate['starr']; $i++) { 
                                        echo "⭐";
                                    }
                                    ?>
                                    <p class="card-text">₱ <?php echo number_format($product['productPrice'], 2, '.', ',')?></p>
                                    <a href="index.php?purchase=<?php echo $product['productID']?>" class="btn btn-primary">Buy Now</a>
                                </div>
                            </div>
                        </div>
                    <?php }?>
                    

                    
                </div>
            </div>
            <!-- Sales Chart End -->


            <!-- Recent Sales Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Cancelled Order</h6>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-white">
                                    <th scope="col">Ordered Date</th>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Product Price</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ( $cancel = mysqli_fetch_array($cancelled)) { ?>
                                    <tr>
                                        <td><?php echo $cancel['date_ordered']?></td>
                                        <td><?php echo $cancel['productName']?></td>
                                        <td>₱ <?php echo number_format($cancel['productPrice'], 2, '.', ',')?></td>
                                    </tr>
                                <?php }?>
                                
                                
                            </tbody>
                        </table>
                    </div>
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