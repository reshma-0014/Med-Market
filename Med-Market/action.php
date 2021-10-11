<?php 
session_start();
require "connection.php";

if(isset($_POST['pid'])){
    $pid = $_POST['pid'];
    $pname = $_POST['pname'];
    $pprice = $_POST['pprice'];
    $pimage = $_POST['pimage'];
    $pper = $_POST['pper'];
    $pcode = $_POST['pcode'];
    $pqty= 1;


    $stmt =$conn->prepare("SELECT product_code FROM cart WHERE product_code=?");
    $stmt->bind_param("s",$pcode);
    $stmt->execute();
    $res =$stmt->get_result();
    $r=$res->fetch_assoc();
    $code=$r['product_code'];

    if(!$code){
       $query =$conn->prepare("INSERT INTO cart (product_name,product_image,product_price,total_price,product_per,product_qty,product_code)VALUES (?,?,?,?,?,?,?)"); 
        $query->bind_param("sssssis",$pname,$pimage,$pprice,$pprice,$pper ,$pqty,$pcode);
       $query->execute();

    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>The item added to your cart!</strong> 
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';


    }

    else{
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Oops! already added to your cart!</strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
    }

}



/*if(isset($_GET['cartItem']) && isset($_Get['cartItem'])== 'cart_item'){

  $stmt =$conn->prepare("SELECT * FROM cart");
  $stmt->execute();
  $stmt->store_result();
  $rows= $stmt-> num_rows;
  echo $rows;
}*/

$query = "SELECT * FROM cart";
$result = mysqli_query($conn,$query);

if ($result)
    {
        // it return number of rows in the table.
        $row = mysqli_num_rows($result);
          
           if ($row)
              {
                 printf($row);
              }
        // close the result.
        mysqli_free_result($result);
    }



  if(isset($_GET['remove'])){
    $id=$_GET['remove'];

    $stmt =$conn->prepare("DELETE FROM cart WHERE id=?");
    $stmt->bind_param("i",$id);
    $stmt->execute();


    $SESSION['showAlert']='block';
    $SESSION['message']='Item removed from the cart!';
    header('location:cart.php');
  }
  
  if(isset($_GET['clear'])){
    $id=$_GET['clear'];

    $stmt =$conn->prepare("DELETE FROM cart");
    $stmt->bind_param("i",$id);
    $stmt->execute();


    $SESSION['showAlert']='block';
    $SESSION['message']='Item removed from the cart!';
    
    
    header('location:cart.php');
  }
  
  if(isset($_POST['qty'])){
    $qty = $_POST['qty'];
    $pid = $_POST['pid'];
    $pprice = $_POST['pprice'];

    $tprice = $qty*$pprice;
    $stmt=$conn->prepare("UPDATE cart SET product_qty=?,total_price=? WHERE id=?");
    $stmt->bind_param("isi",$qty,$tprice,$pid);
    $stmt->execute();

  }
  
  


?> 