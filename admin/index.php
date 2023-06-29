<?php
include('../includes/connect.php');
include('../functions/common_function.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"/>
    <!-- CSS only -->
    <link rel="stylesheet" href="../css/style.css">
    <style> /* delete it later*/
        body{
            overflow-x: hidden;
        }
        .admin_image {
            width: 100px;
            object-fit: contain;
            }
        .product_img{
            width:100px;
            object-fit: contain;
        }
    </style>
</head>
<body>
    <!-- navbar -->
    
    <div class="container-fluid p-0">
        <!-- first child-->
        <nav class="navbar navbar-expand-lg navbar-light ">
            <div class="container-fluid">
            <img class="logo" src="../images/elrawan.png" alt="Logo" title="Logo"></a>
            <nav class="navbar navbar-expand-lg">
                <ul class="navbar-nav ">
                    <li class="nav-item">
                        <a href="" class="nav-link">Welcome guest</a>
                    </li>
                </ul>
            </nav>
            </div>
        </nav>


        <!-- second child--->
        <div class="bg-light">
            <h3 class="text-center p-2">Manage Details</h3>
        </div>

        <!-- third child-->
        <div class="row">
            <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
                <div class="p-3">
                    <a href="#"><img src="../images/hero.jpg" alt="" class="admin_image"></a>
                    <p class="text-light text-center">Admin Name</p>
                </div>
                <div class="button text-center p-5">
                    <button><a href="add_product.php" class="nav-link text-light bg-info my-1 p-2">Add Product</a></button>
                    <button><a href="index.php?view_products" class="nav-link text-light bg-info my-1 p-2">View Products</a></button>
                    <button><a href="index.php?add_category" class="nav-link text-light bg-info my-1 p-2">Add Category</a></button>
                    <button><a href="index.php?view_categories" class="nav-link text-light bg-info my-1 p-2">View Category</a></button>
                    <button><a href="index.php?add_brand" class="nav-link text-light bg-info my-1 p-2">Add Brands</a></button>
                    <button><a href="index.php?view_brands" class="nav-link text-light bg-info my-1 p-2">View Brands</a></button>
                    <button><a href="index.php?list_orders" class="nav-link text-light bg-info my-1 p-2">All Orders</a></button>
                    <button><a href="index.php?list_payments" class="nav-link text-light bg-info my-1 p-2">All Payments</a></button>
                    <button><a href="index.php?list_users" class="nav-link text-light bg-info my-1 p-2">List Users</a></button>
                    <button><a href="" class="nav-link text-light bg-info my-1 p-2">Logout</a></button>
                </div>
            </div>
        </div>
    </div>

    <!--FOURTH CHILD   -->
    <div class="container my-3">
        <?php
        if(isset($_GET['add_category'])){
            include('add_categories.php');
        }
        if(isset($_GET['add_brand'])){
            include('add_brands.php');
        }
        if(isset($_GET['view_products'])){
            include('view_products.php');
        }
        if(isset($_GET['edit_products'])){
            include('edit_products.php');
        }
        if(isset($_GET['delete_product'])){
            include('delete_product.php');
        }
        if(isset($_GET['view_categories'])){
            include('view_categories.php');
        }
        if(isset($_GET['view_brands'])){
            include('view_brands.php');
        }
        if(isset($_GET['edit_category'])){
            include('edit_category.php');
        }
        if(isset($_GET['edit_brands'])){
            include('edit_brands.php');
        }
        if(isset($_GET['delete_category'])){
            include('delete_category.php');
        }
        if(isset($_GET['delete_brands'])){
            include('delete_brands.php');
        }
        if(isset($_GET['list_orders'])){
            include('list_orders.php');
        }
        if(isset($_GET['list_payments'])){
            include('list_payments.php');
        }
        if(isset($_GET['list_users'])){
            include('list_users.php');
        }
        ?>
    </div>








    <!-- footer section start -->
    <footer>
      <div class="footer col-md-12 text-center">
        <span>Copyright@ 2022 ElRawan & Mo | ALL Rights Reserved.</span>
      </div>
    </footer>


    <script src="script.js"></script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>