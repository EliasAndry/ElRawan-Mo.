<?php
include('includes/connect.php');
include('functions/common_function.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ElRawan & Mo - cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"/>
    <!-- CSS only -->
    <link rel="stylesheet" href="css/style.css">
    <style>
        .cart_img {
            width: 70px;
            height: 70px;
            object-fit: contain;
        }

    </style>
</head>
<body>
    <!--NAVIGATION BAR-->
    <nav class="navbar sticky-top navbar-light navbar-expand-lg">
        <div class="container max-width">
        <a href="#" class="navbar-brand">
        <img class="logo" src="images/elrawan.png" alt="Logo" title="Logo"></a>
        <button class="navbar-toggler bg-light" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-label="navbar">
        <span class="navbar-toggler-icon bg-light">
        </span></button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
            <li class="nav-item"><a href="index.php" class="nav-link active text-black">Home</a></li>
            <li class="nav-item"><a href="contact.php" class="nav-link active text-black">Contact</a></li>  
            <li class="nav-item"><a href="display.php" class="nav-link active text-black">Collection</a></li>
            <li class="nav-item"><a href="./users_area/user_registeration.php" class="nav-link active text-black ">Register</a></li>  
            <li class="nav-item"><a href="cart.php" class="nav-link active text-black"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item(); ?></sup></a></li>
        </div>
        </div>
    </nav>
    

    <!-- calling cart function -->
    <?php
        cart();
    ?>

    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
        <ul class="navbar-nav me-auto">
            
            <?php
            if(!isset($_SESSION['username'])){
                echo "<li class='nav-item'>
                <a class='nav-link' href='#'>welcome guest</a>
            </li>";
            }else{
                echo "<li class='nav-item'>
                <a class='nav-link' href='#'>Welcome ".$_SESSION['username']."</a>
            </li>";
            }
            if(!isset($_SESSION['username'])){
                echo "<li class='nav-item'>
                <a class='nav-link' href='./users_area/user_login.php'>login</a>
            </li>";
            }else{
                echo "<li class='nav-item'>
                <a class='nav-link' href='./users_area/logout.php'>logout</a>
            </li>";
            }
                
            ?>
        </ul>
    </nav>

    <div class="container">
        <div class="row">
            <form action="" method="post">
            <table class="table table-bordered text-center">
                
                    <!--- php code for dynamic data ---->
                    <?php
                        
                        $get_ip_address = getIPAddress();
                        $total=0;
                        $cart_query="select * from `cart_details` where ip_address='$get_ip_address'";
                        $result=mysqli_query($con,$cart_query);
                        $result_count=mysqli_num_rows($result);
                        if($result_count>0){
                            echo "<thead>
                            <tr>
                                <th>Product Title</th>
                                <th>Product Image</th>
                                <th>Quantity</th>
                                <th>Total Price</th>
                                <th>Remove</th>
                                <th colspan='2'>Operations</th>
                            </tr>
                        </thead>
                        <tbody>";
                        

                        while($row=mysqli_fetch_array($result)){
                            $product_id=$row['product_id'];
                            $select_products="select * from `products` where product_id='$product_id'";
                            $result_products=mysqli_query($con,$select_products);
                            while($row_product_price=mysqli_fetch_array($result_products)){
                                $product_price=array($row_product_price['product_price']);
                                $price_table=$row_product_price['product_price'];
                                $product_title=$row_product_price['product_title'];
                                $product_image1=$row_product_price['product_image1'];
                                $product_values=array_sum($product_price);
                                $total+=$product_values;
                    
                    ?>
                    <tr>
                        <td><?php echo $product_title?></td>
                        <td><img src="./admin/product_images/<?php echo $product_image1?>" alt="" class="cart_img"></td>
                        <td><input type="text" name="qty" class="form-input w-50"></td>
                        <?php 
                            $get_ip_address = getIPAddress();
                            if(isset($_POST['update_cart'])){
                                $quantities=$_POST['qty'];
                                $update_cart="update `cart_details` set quantity=$quantities where ip_address='$get_ip_address'";
                                $result_products_quantity=mysqli_query($con,$update_cart);
                                $total=$total*$quantities;
                                    
                            }
                        ?>
                        <td><?php echo $price_table?></td>
                        <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id ?>"></td>
                        <td>
                            <!---<button class="bg-info mx-3 px-3 py-2 border-0">Update</button> -->
                            <input type="submit" value="Update Cart" class="bg-info mx-3 px-3 py-2 border-0" name="update_cart">
                            <!--<button class="bg-info mx-3 px-3 py-2 border-0">Remove</button> -->
                            <input type="submit" value="Remove Cart" class="bg-info mx-3 px-3 py-2 border-0" name="remove_cart">
                        </td>
                    </tr>
                    <?php 
                    }}}
                    else{
                        echo "<h2 class='text-center text-danger'>Cart is empty</h2>";
                    }
                    ?>
                </tbody>
            </table>
            <!-- subtotal -->
            <div class="d-flex mb-3">
                <?php
                    $get_ip_address = getIPAddress();
                    $cart_query="select * from `cart_details` where ip_address='$get_ip_address'";
                    $result=mysqli_query($con,$cart_query);
                    $result_count=mysqli_num_rows($result);
                    if($result_count>0){
                        echo "<h4 class='px-3'>Subtotal:<strong class='text-info'>$total</strong></h4>
                        <input type='submit' value='Continue Shopping' class='bg-info mx-3 px-3 py-2 border-0' name='continue_shopping'>
                        <button class='bg-secondary p-3 py-2 border-0'><a href='./users_area/checkout.php' class='text-light text-decoration-none'>Checkout</a></button>";   
                    }
                    else{
                        echo "<input type='submit' value='Continue Shopping' class='bg-info mx-3 px-3 py-2 border-0' name='continue_shopping'>";
                    }

                    if(isset($_POST['continue_shopping'])){
                        echo "<script>window.open('index.php','_self')</script>";
                    }
                ?>
                
            </div>
        </div>
    </div>
    </form>
    
    <!----- function to remove items -->
    <?php
        function remove_cart_item(){
            global $con;
            if(isset($_POST['remove_cart'])){
                foreach($_POST['removeitem'] as $remove_id){
                    echo $remove_id;
                    $delete_query="Delete from `cart_details` where product_id=$remove_id";
                    $run_delete=mysqli_query($con,$delete_query);
                    if($run_delete){
                        echo "<script>window.open('cart.php','_self')</script>";
                    }
                }
            }
        }
        echo $remove_item=remove_cart_item();
    ?>
    

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
