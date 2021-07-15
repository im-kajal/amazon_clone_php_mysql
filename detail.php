<?php
session_start();
$conn=mysqli_connect("localhost","root","","amazon");

if(!empty($_SESSION)){
 $is_logged_in=1;
}else{
 $is_logged_in=0;
}
$product_id=$_GET['id'];
$query="SELECT * FROM products WHERE product_id=$product_id";
$result=mysqli_query($conn,$query);
$result=mysqli_fetch_assoc($result);
$img_path=explode(",",$result['bg'])[0];
$img_path=substr($img_path,2,strlen($img_path)-3);

if(empty($_SESSION)){
 $user_id=0;
}else{
$user_id=$_SESSION['user_id'];
}

$query2="SELECT * FROM wishlist WHERE user_id=$user_id AND  product_id=$product_id";
$result2=mysqli_query($conn,$query2);
$num_rows=mysqli_num_rows($result2);

$query3="SELECT * FROM cart WHERE user_id=$user_id AND  product_id=$product_id";
$result3=mysqli_query($conn,$query3);
$num_rows1=mysqli_num_rows($result3);
?>
<?php include("includes/header.php"); ?>
  <div class="container mt-5">
    <div class="row">
      <div class="col-6">
        <img src="<?php echo $img_path; ?>" style="width:100%;height:400px:">

      </div>
      <div class="col-6">
        <h1><?php echo $result['name'];?></h1>
        <h4>Rs <?php echo $result['price'];?></h4>
        <p><?php echo $result['details']; ?></p>
        <?php
        if(!empty($_SESSION)){
          if($num_rows1 ){
          echo '<button id="cart-btn" class="btn btn-lg btn-dark">Added to cart</button>';
          }else{
            echo '<button id="cart-btn" class="btn btn-lg btn-dark">Add to cart</button>';
          }
          }else{
          echo '<a href="login_form.php" <button class="btn btn-lg btn-dark">Add to cart</button></a>';
          }
        
        ?>
        
        <?php 
        if(!empty($_SESSION)){
          if($num_rows){
          echo '<button class="btn btn-lg btn-dark">Wishlisted</button>';
          }else{
            echo '<button class="btn btn-lg btn-dark" id="wishlist-btn">Wishlist</button>';
          }
        }else{
          echo '<a href="login_form.php"<button class="btn btn-lg btn-dark" >Wishlist</button></a>';

        }
        
        ?>
        
      </div>

    </div>
    
    
  </div>
  <script type="text/javascript">
    $(document).ready(function(){
      $('#wishlist-btn').click(function(){
        if($('#wishlist-btn').text()=='Wishlist' ){
           $.ajax({
              url:'add_wishlist.php?product_id=' + <?php echo $product_id; ?>,
              method:'GET',
              success:function(data){
                console.log(data);
                $('#wishlist-btn').text('Wishlisted');
                $('#wishlist-btn').css('background-color','black');

              },
              error:function(error){
                console.log(error);

              }
            })
        }
       
      })
       $('#cart-btn').click(function(){
        if($('#cart-btn').text()=='Add to cart' ){
           $.ajax({
              url:'add_to_cart.php?product_id=' + <?php echo $product_id; ?>,
              method:'GET',
              success:function(data){
                console.log(data);
                $('#cart-btn').text('Added to cart');
                $('#cart-btn').css('background-color','black');

              },
              error:function(error){
                console.log(error);

              }
            })
        }
       
       })


    })
  </script>


</body>
</html>