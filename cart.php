
<?php
session_start();
if(empty($_SESSION)){
 header('Location:login_form.php');
}else{
 $is_logged_in=1;
}
?>
<?php include("includes/header.php");?>

<div class="container">
	<h1 class="mt-5">My Cart</h1>
	<div class="row">
		<div class="col-8">
			<?php
			include("includes/dbhelper.php");
			$user_id=$_SESSION['user_id'];
			$query="SELECT * FROM cart c JOIN products p ON c.product_id = p.product_id WHERE c.user_id = $user_id";
			$result=mysqli_query($conn,$query);
            
			$amount=0;
			$counter=0;
			while($row=mysqli_fetch_assoc($result)){
				$img_path=explode(",",$row['bg'])[0];
                $img_path=substr($img_path,2,strlen($img_path)-3);
                $amount=$amount + $row['price']*$row['quantity'];
                echo '<div class="card mt-3" id="product-card'.$row['product_id'].'">
						<div class="row">
							<div class="col-3">
		                        <img src="'.$img_path.'" style="width: 100%;height: 150px;">
							</div>
							<div class="col-7">
								<h4 class="mt-3">'.$row['name'].'</h4>
								<h6>Rs <span id="price'.$row['product_id'].'">'.$row['price'].'</span></h6>
							</div>
							<div class="col-2">
								<div class="mt-4">
									<button data-id='.$row['product_id'].' class="btn plus-one btn-warning btn-sm text=dark">-</button>
									<span id="quantity'.$row['product_id'].'" class="ml-1 mr-1"><b>'.$row['quantity'].'</b></span>
									<button data-id='.$row['product_id'].' class="btn plus-one btn-warning btn-sm text=dark">+</button>
								</div>
							
							</div>
							
						</div>
						
				     </div>';
				     $counter++;

			}
			if($counter==0){
				echo '<p style="color:red;">Your Cart is empty.</p>';
			}else{
				echo '<hr>
					  <h5 style="display: inline;">Total amount is Rs <span id="total">'.$amount.'</span></h5>
					  <button id="checkout-btn" class="btn btn-dark text-white" style="float:right">Checkout</button>';
			}
			?>
			
		</div>
	</div>
</div>
<script type="text/javascript">
	$('#checkout-btn').click(function(){
		 var amount=Number($('#total').text());
		$.ajax({
			url:'place_order.php',
			type:"POST",
			data: {amount:amount},
			success:function(data){
                 console.log(data);
                 
                   
                 window.location.replace('show_address.php?order_id='+data,);
                 
             },
			error:function(error){
				console.log(error);
			}

		})
	})
	$('.plus-one').click(function(){
		var sign=$(this).text();
	    var product_id=$(this).attr('data-id');
	    var quantity=$('#quantity' + product_id).text();
	    var total=Number($('#total').text());
	    var price=Number($('#price' + product_id).text());
	   
	    
		$.ajax({
			url:'update_product_quantity.php?product_id=' +product_id + '&quantity=' +quantity+ '&sign='+sign,
			method:'GET',
			success:function(data){
				if(sign=='+'){
					$('#quantity'+product_id).text(Number(quantity)+1);
				    $('#total').text(total + price);

				}else{
                    $('#quantity'+product_id).text(Number(quantity)-1);
				    $('#total').text(total - price);
				    if(Number(quantity)-1===0){
				    	
				    	$.ajax({
				    		url:'remove_product_from_cart.php?product_id='+product_id,
				    		method:'GET',
				    		success:function(data){
				    			
				    			$('#product-card'+product_id).hide();
				    			// $('.btn').hide();

				    		},
				    		error:function(error){
                                  console.log(error);
				    		}
				    	})
				    }

				}
				
			},
			error:function(error){
				console.log(error);
		    }		
		})
		

	 })
	
</script>
</body>
</html>