<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MEAT SHOPPING</title>
    <script src="https://kit.fontawesome.com/5abeceb4ad.js" crossorigin="anonymous">
    </script>
   
    
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
       
        <nav class="navbar fixed-top navbar-expand-lg navbar-dark  scrolling-navbar">
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
    <!--corousel start-->

    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleFade" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleFade" data-slide-to="1"></li>
            <li data-target="#carouselExampleFade" data-slide-to="2"></li>
          </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="img/7.jpeg" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="img/6.jpeg" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="img/5.jpeg" class="d-block w-100" alt="...">
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    <!--corousel end-->

    <!--card start-->
    <section>
    
      <div class="container">
     
       <div class="row">
      
       <?php



require "connection.php";

$query = "SELECT * FROM product";
$query_run = mysqli_query($conn,$query);

$check_product = mysqli_num_rows($query_run )>0;

if($check_product ){
      while($row = mysqli_fetch_assoc($query_run ))
      {
        ?>
<div class="col-md-4">
  
            <div class="card">
               <a href="" class="img"> <img src="<?php echo $row['product_image'];?>" class="card-img-top" height="250px" width="250px"></a>
                <div class="card-body">
                    <a href="" class="title"><h5 class="card-title"><?php echo $row['product_name'];?></h5></a>
                    <p class="per_piece"><?php echo $row['product_per'];?></p>
                    <h6><?php echo $row['product_price'];?>&#8377;</h6>

                    <form action="" class="form-submit">
                    <input type="hidden" class="pid" value="<?php echo $row['id']?>">
                    <input type="hidden" class="pimage" value="<?php echo $row['product_image']?>">
                    <input type="hidden" class="pname" value="<?php echo $row['product_name']?>">
                    <input type="hidden" class="pper" value="<?php echo $row['product_per']?>">
                    <input type="hidden" class="pprice" value="<?php echo $row['product_price']?>">
                    <input type="hidden" class="pcode" value="<?php echo $row['product_code']?>">
                    <button class="btn btn-info btn-block addItemBtn"><i class="fas fa-cart-plus" id="addItem"></i>&nbsp;&nbsp;Add Cart</a></button>
                    </form>
                    
                    
                    
                    
                  </div>
                          </div>
                          
               </div>
              
        <?php
      }
}

else
{
   echo "nothing inside the product";
}


   



                                 
?>


  
           
             </div>



             
      







   </div>





   
          </section>
    <!--card end-->
  <!-- Site footer -->
  <footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-6">
            <h6>About</h6>
            <p class="text-justify">Scanfcode.com <i>CODE WANTS TO BE SIMPLE </i> is an initiative  to help the upcoming programmers with the code. Scanfcode focuses on providing the most efficient code or snippets as the code wants to be simple. We will help programmers build up concepts in different programming languages that include C, C++, Java, HTML, CSS, Bootstrap, JavaScript, PHP, Android, SQL and Algorithm.</p>
          </div>

        
          <div class="col-xs-12 col-md-6">
            <h6>Quick Links</h6>
            <ul class="footer-links">
              <li><a href="">About Us</a></li>
              <li><a href="">Contact Us</a></li>
              <li><a href="">Register</a></li>
              <li><a href="">sign-up</a></li>
              <li><a href="">Privacy Policy</a></li>
              
            </ul>
          </div>
        </div>
        <hr>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-sm-6 col-xs-12">
            <p class="copyright-text">Copyright &copy; 2017 All Rights Reserved by 
         <a href="#">Scanfcode</a>.
            </p>
          </div>

          <!--<div class="col-md-4 col-sm-6 col-xs-12">
            <ul class="social-icons">
              <li><a class="facebook" href="#"><i class="material-icons">facebook</i></a></li>
              <li><a class="twitter" href="#"><i class="material-icons">twitter</i></a></li>
            </ul>
          </div>-->
        </div>
      </div>
      
</footer>
<!-- footer end-->
</body>




</html>

<script>
$(document).ready(function() {
   $(".addItemBtn").click(function(event) {
     event.preventDefault();
     var $form = $(this).closest(".form-submit");
     var pname=$form.find('.pname').val();
     var pimage =$form.find('.pimage').val();
     var pprice =$form.find('.pprice').val();
     var pid =$form.find('.pid').val();
     var pper =$form.find('.pper').val();
     var pcode =$form.find('.pcode').val();

$.ajax({
  url: 'action.php',
  method:'post',
  data:{pid:pid,pname:pname,pprice:pprice,pper:pper,pimage:pimage,pcode:pcode},
  success:function(response){
$('#message').html(response);
    load_cart_item_number();
  }
 })
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
