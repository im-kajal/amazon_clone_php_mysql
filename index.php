<?php
session_start();
$conn=mysqli_connect("localhost","root","","amazon");

if(!empty($_SESSION)){
 $is_logged_in=1;
}else{
 $is_logged_in=0;
}
?>
<?php include("includes/header.php");?>


  	     <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100" src="https://images-eu.ssl-images-amazon.com/images/G/31/img21/OHL_HMT/a_1500x600._CB669782425_.jpg" alt="First slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="https://images-eu.ssl-images-amazon.com/images/G/31/img20/PC/Mayactivation/Accessoriesday1/D23140543_IN_CEPC_Electronicsaccessories_underRs999_3000x12000.5x._CB669031984_.jpg" alt="Second slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="https://images-eu.ssl-images-amazon.com/images/G/31/img21/Gateway_JWELSSH/Feb/SSW/Super_saver_brands/1500PC._CB658944950_.jpg" alt="Third slide">
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
       </div>
      <div class="container" >
        <h1>Fitness</h1>
        <div class="row mt-5">
        <?php
        $query="SELECT * FROM products WHERE categories LIKE '%Sports & Fitness%'";
        $result=mysqli_query($conn,$query);
        while($row = mysqli_fetch_assoc($result)){
          $str=explode(",",$row['bg'])[0];
          $str=substr($str,2,strlen($str)-3);
          echo ' <div class="col-3">
                    <div class="card">
                      <div class="card-body">
                        <img src="'.$str.'" class="card-img-top" style="height:250px">
                        <a href="detail.php?id='.$row['product_id'].'" ><h5 class="card-title">Title '.$row['name'].'</h5></a>
                        <p class="card-text">Rs '.$row['price'].'</p>
                      </div>
                    </div>
                  </div>';
        }
        ?> 

        </div>

      </div>
       <div class="container" >
        <h1>Clothings</h1>
        <div class="row mt-5">
        <?php
        $query="SELECT * FROM products WHERE categories LIKE '%Clothing%'";
        $result=mysqli_query($conn,$query);
        $counter=0;
        while($row = mysqli_fetch_assoc($result)){
          
          if($counter<8){
            $str=explode(",",$row['bg'])[0];
          $str=substr($str,2,strlen($str)-3);
          echo ' <div class="col-3">
                    <div class="card">
                      <div class="card-body">
                        <img src="'.$str.'" class="card-img-top" style="height:250px">
                        <a href="detail.php?id='.$row['product_id'].'"><h5 class="card-title">Title '.$row['name'].'</h5></a>
                        <p class="card-text">Rs '.$row['price'].'</p>
                      </div>
                    </div>
                  </div>';
                  $counter++;
          }
          
        }
        ?> 

        </div>
        
      </div>
      <div class="container" >
        <h1>Footwears</h1>
        <div class="row mt-5">
        <?php
        $query="SELECT * FROM products WHERE categories LIKE '%Footwear%'";
        $result=mysqli_query($conn,$query);
        $counter=0;
        while($row = mysqli_fetch_assoc($result)){
          
          if($counter<4){
            $str=explode(",",$row['bg'])[0];
          $str=substr($str,2,strlen($str)-3);
          echo ' <div class="col-3">
                    <div class="card">
                      <div class="card-body">
                        <img src="'.$str.'" class="card-img-top" style="height:250px">
                       <a href="detail.php?id='.$row['product_id'].'"><h5 class="card-title">Title '.$row['name'].'</h5></a>
                        <p class="card-text">Rs '.$row['price'].'</p>
                      </div>
                    </div>
                  </div>';
                  $counter++;
          }
          
        }
        ?> 

        </div>
        
      </div>


</body>
</html>