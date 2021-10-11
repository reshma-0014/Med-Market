<?php
session_start();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MEAT SHOPPING-cart</title>
    <script src="https://kit.fontawesome.com/5abeceb4ad.js" crossorigin="anonymous">
    </script>
  
    <style>
    .title{
        display:flex;
        justify-content:space-between;
    }
    

    
    
    

    </style>

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
 <!-- Latest compiled and minified CSS -->
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
 <link rel="stylesheet" href="style.css">

 <!-- jQuery library -->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 
 <!-- Popper JS -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
 
 <!-- Latest compiled JavaScript -->
 <script src="main.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 
</head>
<body>
    
<!--header start-->
    <header class="bloglist">
       
        <nav class="navbar  navbar-expand-lg navbar-dark  scrolling-navbar">
            <div class="container">
            <a href="index.php" class="navbar-brand"><img src="images/logo.png" alt="" width="70px" height="70px"></a>
    
             <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMenu"
             aria-controls="navbarMenu" aria-expanded="false" aria-lable="Toggle Navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
              
            <div class="collapse navbar-collapse"></div>
            <div class="collapse navbar-collapse" id="navbarMenu">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item ">
                        <a href="#" class="nav-link">Register</a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link">Log-in</a>
                    </li>
                    <li class="nav-item">
                        <a href="about.php" class="nav-link">About Us</a>
                                                                             </li>
                    <li class="nav-item">
                        <a href="contact.php" class="nav-link">Contact Us</a>
                    </li>
                   </ul>
                   <div class="cart"><a href="cart.php"><i class="material-icons">shopping_cart</i><span class="badge badge-danger" id="cart-item"></span></a></div>

            </div>
            
        </div>
        <div id="message"></div>

        </nav>
        
    </header>

  <!--header end-->
   
<!--cart start-->

<div class="container">
   

   <div class="d-flex justify-content-center">
       <div class="col-lg-10">
       <div class="table-responsive mt-2">
       <table class="table table-bordered table-striped text-center">
       <thead>
       <tr>
       <td colspan="7">
       <div class="title">
       <div class="dummy"></div>
       <div class="title_1"><h4 class="text-center text-info m-0 ">Product in  your cart!</h4></div>
       <div class="title_2">
       <a href="index.php"><button type="button" class="btn btn-success "><i class="fas fa-cart-plus">&nbsp;&nbsp;</i>Shop</button></a>
       </div>
       
       </div>
       
       </td>
       </tr>
<tr>
       <th>Product Name</th>       
       <th>Image</th>
       <th>Price</th>
       <th>Quantity</th>
       <th>Total Price</th>
       <th>
       <a href="action.php?clear=all" class="badge-danger badge p-2" onclick="return confirm('are you sure want to clear your cart?');"><i class="fas fa-trash">&nbsp;&nbsp;</i>Clear cart</a>
       </th>
</tr>
       </thead>

       <tbody>
       <?php
            require "connection.php";
            $stmt =$conn->prepare("SELECT * FROM cart");
            $stmt->execute();
            $result=$stmt->get_result();
            $grand_total=0;
            while($row=$result->fetch_assoc()):
            ?>

            <tr>
            <input type="hidden" class="pid" value="<?php echo $row['id']?>">
            <td tyle="font-weight:bold;"><?php echo $row['product_name'];?>
            </td>
            <td><a href="" class="img"> <img src="<?php echo $row['product_image'];?>"  height="50px" width="50px"></a></td>
           <td><p><b>&#8377;</b><?php echo $row['product_price'];?><br><span style="font-weight:10;">(<?php echo $row['product_per'];?>)</span></p></td>
           <input type="hidden" class="pprice" value="<?php echo $row['product_price']?>">
            <td><input type="number" class="form-control itemQty" value="<?php echo $row['product_qty'];?>" style=
  "-moz-appearance: textfield; width:70px;"></td>
  <td><p><b>&#8377;</b><?php echo $row['total_price'];?><br></p></td>
<td><a href="action.php?remove=<?= $row['id']?>" class="text-danger" onclick="return confirm('are you sure want to clear your cart?');"><i class="fas fa-trash"></i></a></td>
            </tr>
<?php   $grand_total+=$row['total_price'];?>
            <?php endwhile;?>
     <tr>
     <td colspan=2>
     
     </td>
     <td colspan=2><b>GRAND TOTAL</b></td>
     <td><p><b>&#8377;</b><?php echo number_format($grand_total);?><br></p></td>
     <td><a href="index.php"><button type="button" class="btn btn-success " <?=($grand_total>1)?"":"disabled"?>><i class="fas fa-credit-card">&nbsp;&nbsp;</i>OrderNow</button></a>
     </tr>
       
     
       </tbody>
       </table>
       </div>
       </div>
       </div>
       
       </div>

   

   </div>
</div>

<!--cart end-->
<div class="items"></div>
</body>




</html>

<script>
$(document).ready(function() {

   $(".itemQty").on('change',function(){
    var $el = $(this).closest('tr');

    var pid =$el.find(".pid").val();
    var pprice =$el.find(".pprice").val();
    var qty =$el.find(".itemQty").val();
   location.reload(true);
$.ajax({
    url:'action.php',
    method:'post',
    cache:'false',
    data:{qty:qty,pid:pid,pprice:pprice},
    success:function(response){
        console.log(response);
    }

    
});


   });

load_cart_item_number();

function load_cart_item_number(){
  $.ajax({
url: 'action.php',
method: 'get',
data :{cartItem:"cart_item"},
success:function(response){
   $("#cart-item").html(response);

}
});
}




});
</script>
