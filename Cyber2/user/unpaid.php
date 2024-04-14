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
            <div class="col-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h3 class="mb-4">Unpaid digital products</h3>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Transacation ID</th>
                                            <th scope="col">Date Ordered</th>
                                            <th scope="col">Product Name</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Payment Status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; while ( $list = mysqli_fetch_array($unpaid)) { ?>
                                            <tr>
                                                <th scope="row"><?php echo $i++?></th>
                                                <td><?php echo $list['TransactionID'] ?></td>
                                                <td><?php echo $list['date_ordered'] ?></td>
                                                <td><?php echo $list['productName'] ?></td>
                                                <td>₱ <?php echo number_format($list['productPrice'], 2, '.', ',')?></td>
                                                <td class="<?php if($list['Status'] == 'validating'){ echo 'bg-success text-white';}?>"><?php echo $list['Status'] ?></td>
                                                <td>
                                                    <?php if($list['Status'] != 'validating'){ ?>

                                                        <a href="pay.php?paynow=<?php echo $list['ordersID'] ?>" class="btn btn-success" style = "width:100%;">Pay Now</a>
                                                        <a href="?cancelnow=<?php echo $list['ordersID'] ?>" class="btn btn-primary" style = "width:100%;">Cancel Payment</a>
                                                    <?php }else { ?>
                                                        validating your payment details 
                                                    <?php }?>
                                                </td>
                                            </tr>
                                        <?php }?>
                                    </tbody>
                                </table>
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