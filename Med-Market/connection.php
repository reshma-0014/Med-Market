<?php 
//connect to db
$conn = mysqli_connect('localhost' , 'STUPID_BRAIN' , 'sridevi2002' , 'meat_shopping');
if(!$conn){
    echo 'connection error:' . mysqli_connect_error();
}


    ?>