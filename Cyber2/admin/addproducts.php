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
            <div class="col-sm-12 col-xl-6">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h4 class="mb-4">Add Products</h4>
                            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                    <li class="breadcrumb-item"><a href="addcategory.php">Categories</a></li>
                                    <li class="breadcrumb-item"><a href="products.php">View Products</a></li>
                                   
                                </ol>
                            </nav>
                            <form action="" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
                            <?php
                                if(count($errors) > 0){
                                    ?>
                                    <div class="alert alert-danger text-center">
                                        <?php
                                        foreach($errors as $showerror){
                                            echo $showerror."<br>"; 
                                        }
                                        ?>
                                    </div>
                                    <?php
                                }
                                ?>
                                    <div class="mb-3">
                                        <label for="formFile" class="form-label">Product Image</label>
                                        <input class="form-control bg-dark" type="file" name="lis_img0" id="formFile">
                                    </div>
                                    <div class="mb-3">
                                        <label for="formFile" class="form-label">Product File</label>
                                        <input class="form-control bg-dark" type="file" name="fileApk" id="formFile">
                                    </div>
                                    <?php if (isset($details['productImage'])) { ?>
                                        <div class="input-group mb-3">
                                            <img src="../assets/images/game/<?php echo $details['productImage']?>" alt="" width="100px">
                                        </div>
                                    <?php }?>
                                   
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">Product Name</span>
                                        <input type="text" class="form-control" placeholder="" name="podname" aria-label="Username"
                                            aria-describedby="basic-addon1" value="<?php echo $details['productName']?>">
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">₱ </span>
                                        <input type="number" name="prize" class="form-control" value="<?php echo $details['productPrice']?>">
                                        <span class="input-group-text">.00</span>
                                    </div>

                                    <div class="input-group mb-3">
                                        <span class="input-group-text">Product Category</span>
                                        <select name="cath"  class="form-control" id="">
                                            <?php if (mysqli_num_rows($cat) > 0) { ?>
                                               <?php while ($category = mysqli_fetch_array($cat)) { ?>
                                                    <option value="<?php echo $category['categoryID']?>"><?php echo $category['categoryName']?></option>
                                               <?php }?>
                                            <?php }else { ?>
                                                <option value="#">No Categories found</option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <?php if (mysqli_num_rows($cat) > 0) { ?>
                                        <div class="input-group mb-3">
                                            <button type="submit" class="btn btn-primary" name="addproduct">

                                                <?php if (isset($details['productID'])) { ?>
                                                    Update Product
                                                <?php }else {
                                                    echo 'Add Product';
                                                }?>
                                            </button>
                                        </div>
                                    <?php }else { ?>
                                        <div class="input-group mb-3">
                                            <button class="btn btn-primary" >No Categories Found</button>
                                        </div>
                                    <?php } ?>
                                   
                            </form>
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