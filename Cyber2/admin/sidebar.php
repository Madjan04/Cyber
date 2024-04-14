<!-- Sidebar Start -->
<div class="sidebar pe-4 pb-3">
    
            <nav class="navbar bg-secondary navbar-dark">
                <a href="index.html" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><img src="../assets/images/icons/favicon-32x32.png" alt=""> Cyber +</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="../assets/images/icons/<?php echo $fetch_info['profile']; ?> " alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0"><?php if ($fetch_info['first_name'] != '' && $fetch_info['last_name'] != ''){ echo $fetch_info['first_name']." ". $fetch_info['last_name'];}else{ echo "update your account";}?></h6>
                        <span><?php echo $title?></span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="index.php" class="nav-item nav-link <?php if($a == 1){ echo "active";}?>"><i class="fi fi-rr-chart-histogram me-2"></i> Dashboard</a>
                    <a href="products.php" class="nav-item nav-link <?php if($a == 2){ echo "active";}?>"><i class="fi fi-rr-box-open-full me-2"></i> Products</a>
                    <a href="users.php" class="nav-item nav-link <?php if($a == 3){ echo "active";}?>"><i class="fi fi-rr-circle-user me-2"></i> Users</a>
                    
                    
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->