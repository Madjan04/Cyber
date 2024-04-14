<?php include "head.php";
$a = 0;?>

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


            <!-- Blank Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-secondary rounded h-100 p-4">
                           
                                <h3 class="mb-4">Order Details</h3>
                                
                                <div class="form-floating mb-3">
                                    <input type="text"  class="form-control" id="floatingInput"
                                        placeholder="" value="<?php echo $details['TransactionID']?>">
                                    <label for="floatingInput">Order ID</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text"  class="form-control" id="floatingInput"
                                        placeholder="" value="<?php echo $details['date_ordered']?>">
                                    <label for="floatingInput">Date Ordered</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text"  class="form-control" id="floatingInput"
                                        placeholder="" value="<?php echo $details['productName']?>">
                                    <label for="floatingInput">Product Name</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text"  class="form-control" id="floatingInput"
                                        placeholder="" value="₱ <?php echo number_format($details['productPrice'], 2, '.', ',')?>">
                                    <label for="floatingInput">Product Price</label>
                                </div>
                               
                                
                               
                           
                        </div>
                    </div>

                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-secondary rounded h-100 p-4">
                            <form action="" method="post">
                                <h3 class="mb-4">Payment Details</h3>
                                <p>
                                    Store Name : Cyber + <br>
                                    Gcash / Paymaya /PayPal / Palawan / Mluwillier/ : 09473748893<br>
                                    Metamask : MT8809473748893788 <br>
                                </p>
                                <div class="form-floating mb-3">
                                    <select class="form-select" name="mop" id="floatingSelect"
                                        aria-label="Floating label select example">
                                        <option value="Gcash">Gcash</option>
                                        <option value="Paymaya">Paymaya</option>
                                        <option value="Paypal">Paypal</option>
                                        <option value="Palawan">Palawan</option>
                                        <option value="Mlluwillier">MLhuillier</option>
                                        <option value="Metamask">Metamask</option>
                                    </select>
                                    <label for="floatingSelect">Mode of payment used</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" name="transation" class="form-control" id="floatingInput"
                                        placeholder="">
                                    <label for="floatingInput">Payment Transaction</label>
                                </div>
                                
                                <div class="form-floating mb-3">
                                <button type="submit" class="btn btn-success" name="paynows">Pay Now</button>
                                    <a href="?cancelnow=<?php echo $details['ordersID'] ?>" class="btn btn-primary">Cancel Order</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Blank End -->


            <?php include "footer.php"?>
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
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