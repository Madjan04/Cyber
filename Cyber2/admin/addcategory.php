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


            <!-- Blank Start -->
            <div class="container-fluid pt-4 px-4">
            <div class="row">
            <div class="col-sm-12 col-xl-6">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h4 class="mb-4">Add Categories</h4>
                            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                    <li class="breadcrumb-item"><a href="addcategory.php">Categories</a></li>
                                    <li class="breadcrumb-item"><a href="products.php">View Products</a></li>
                                   
                                </ol>
                            </nav>
                            <form action="" method="post">
                                    
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">Category Name</span>
                                        <input type="text" name="catname" class="form-control" value="<?php echo $details['categoryName']?>">
                                    </div>

                                   
                                    <div class="input-group mb-3">
                                        <button type="submit" class="btn btn-primary" name="adcath"><?php if(isset($details['categoryName'])){ echo "Edit Category";}else{ echo "Add Category";}?></button>
                                    </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-6">
                    <div class="bg-secondary rounded h-100 p-4">
                            <h4 class="mb-4">Categories</h4>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Category Name</th>
                                        <th scope="col">Action</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1 ;while ($cathgory = mysqli_fetch_array($cat)) { ?>
                                        <tr>
                                        <th scope="row"><?php echo $i++?></th>
                                        <td><?php echo $cathgory['categoryName']?></td>
                                        <td>
                                            <a href="addcategory.php?editcat=<?php echo $cathgory['categoryID']?>" class="btn btn-success">Edit</a>
                                            <a href="addcategory.php?deletecat=<?php echo $cathgory['categoryID']?>" class="btn btn-primary">Delete</a>
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