<?php
require('connection.php');
require('function.inc.php');
require('header.php');
$cat_id ='';
$msg='';
$product_name = '';
$mrp = '';
$price = '';
$qty = '';
$short_descr = '';
$descr = '';
$meta_keyword = '';
$meta_descr = '';
$meta_title = '';
$image_required = 'required';
if(isset($_GET['id']) && $_GET['id'] !=''){
	$image_required ='';
	$id = safe_value($conn,$_GET['id']);
	$query = "select * from product where id = '$id'";
	$res=mysqli_query($conn,$query);
	$count = mysqli_num_rows($res);
	if($count > 0){
		$row = mysqli_fetch_assoc($res);
		$cat_id = $row['cat_id'];
		$product_name = $row['product_name'];
		$product_image = $row['product_image'];
		$mrp = $row['mrp'];
		$price = $row['price'];
		$qty = $row['qty'];
		$short_descr = $row['short_descr'];
		$descr = $row['descr'];
		$meta_keyword = $row['meta_keyword'];
		$meta_descr = $row['meta_descr'];
		$meta_title = $row['meta_title'];
	}else{
		header('location:product.php');
		die();
	}
}

if(isset($_POST['submit'])){
	$categories_id=safe_value($conn,$_POST['categories_id']);
	$product_name=safe_value($conn,$_POST['product_name']);
	$mrp=safe_value($conn,$_POST['mrp']);
	$price=safe_value($conn,$_POST['price']);
	$qty=safe_value($conn,$_POST['qty']);
	$short_descr=safe_value($conn,$_POST['short_descr']);
	$descr=safe_value($conn,$_POST['descr']);
	$meta_title=safe_value($conn,$_POST['meta_title']);
	$meta_descr=safe_value($conn,$_POST['meta_descr']);
	$meta_keyword=safe_value($conn,$_POST['meta_keyword']);
	$check = "select * from product where product_name = '$product_name'";
	$res=mysqli_query($conn,$check);
	$count = mysqli_num_rows($res);
					
	if($count>0){
			if(isset($_GET['id']) && $_GET['id'] !=''){
				$getid = mysqli_fetch_assoc($res);
				if($id==$getid['id']){
					
				}else{
					
					$msg = "Product already exist";
				}
			}else{
				
				$msg = "Product already exist";
			}
			
	}
	if($_FILES['product_image']['type']!=''){
		if($_FILES['product_image']['type'] !='image/jpg'&& $_FILES['product_image']['type'] !='image/png' && $_FILES['product_image']['type'] !='image/jpeg' ){
			$msg = "Please select only png,jpg and jpeg image formate";
		}
	}
	if($msg==''){
			if(isset($_GET['id']) && $_GET['id'] !=''){
				if($_FILES['product_image']['name']!=''){
					$product_image = rand(111111,999999).'_'.$_FILES['product_image']['name'];
					move_uploaded_file($_FILES['product_image']['tmp_name'],PRODUCT_IMAGE_SERVER_PATH.$product_image);
					$query = "update product set cat_id='$categories_id',product_name='$product_name',mrp='$mrp',price='$price',qty='$qty',short_descr='$short_descr',descr='$descr',meta_title='$meta_title',meta_descr='$meta_descr',meta_keyword='$meta_keyword',product_image='$product_image' where id='$id'";					
				}else{
					$query = "update product set cat_id='$categories_id',product_name='$product_name',mrp='$mrp',price='$price',qty='$qty',short_descr='$short_descr',descr='$descr',meta_title='$meta_title',meta_descr='$meta_descr',meta_keyword='$meta_keyword',product_image='$product_image' where id='$id'";					
				}
				mysqli_query($conn,$query);
			}else{
				$product_image = rand(111111,999999).'_'.$_FILES['product_image']['name'];
				 move_uploaded_file($_FILES['product_image']['tmp_name'],PRODUCT_IMAGE_SERVER_PATH.$product_image);
				$qry = "insert into product(cat_id,product_name,product_image,mrp,price,qty,short_descr,descr,meta_keyword,meta_descr,meta_title,status)values('$categories_id','$product_name','$product_image','$mrp','$price','$qty','$short_descr','$descr','$meta_keyword','$meta_descr','$meta_title','1')";
				mysqli_query($conn,$qry);	
			}			
			header('location:product.php');
			die();
		}	
}
?>
         <div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
					  <form method="post" enctype="multipart/form-data">
						 <div class="card">
							<div class="card-header"><strong>Add Product</strong></div>
							<div class="card-body card-block">
								<div class="form-group">
								   <label for="company" class=" form-control-label">Category Name</label>
								   <select class="form-control" name="categories_id">
								   <?php 
								   $qry = "select id,cat_name from categories order by cat_name asc";
									$res=mysqli_query($conn,$qry);
								   while($row = mysqli_fetch_assoc($res)){
										if($row['id'] == $cat_id){
											echo "<option selected value=".$row['id']."> ".$row['cat_name']."</option>";
										}else{
											echo "<option value=".$row['id']."> ".$row['cat_name']."</option>";
										}
									}?>
								   </select>
								   
							   </div>
							   <div class="form-group">
								   <label for="company" class=" form-control-label">Product Name</label>
								   <input type="text" name="product_name" placeholder="Enter your Product name" value="<?php echo $product_name; ?>" class="form-control" required>
							   </div>
							   <div class="form-group">
								   <label for="company" class=" form-control-label">Product Image</label>
								   <input type="file" name="product_image" class="form-control" <?php echo  $image_required;?>>
							   </div>
							   <div class="form-group">
								   <label for="company" class=" form-control-label">MRP</label>
								   <input type="text" name="mrp" placeholder="Enter your Product MRP" value="<?php echo $mrp; ?>" class="form-control" required>
							   </div>
							   <div class="form-group">
								   <label for="company" class=" form-control-label">Price</label>
								   <input type="text" name="price" placeholder="Enter your Product price" value="<?php echo $price; ?>" class="form-control" required>
							   </div>
							   <div class="form-group">
								   <label for="company" class=" form-control-label">Quantity</label>
								   <input type="text" name="qty" placeholder="Enter your Product Quantity" value="<?php echo $qty; ?>" class="form-control" required>
							   </div>
							    <div class="form-group">
								   <label for="company" class=" form-control-label">Short Description</label>
								   <input type="text" name="short_descr" placeholder="Enter your Product Short Description" value="<?php echo $short_descr; ?>" class="form-control" required>
							   </div>
							    <div class="form-group">
								   <label for="company" class=" form-control-label">Description</label>
								   <input type="textarea" name="descr" placeholder="Enter your Product Description" value="<?php echo $descr; ?>" class="form-control" required>
							   </div>
							    <div class="form-group">
								   <label for="company" class=" form-control-label">Meta Title</label>
								   <input type="text" name="meta_title" placeholder="Enter your Meta Title" value="<?php echo $meta_title; ?>" class="form-control" required>
							   </div>
							    <div class="form-group">
								   <label for="company" class=" form-control-label">Meta Keyword</label>
								   <input type="text" name="meta_keyword" placeholder="Enter your Meta Keyworde" value="<?php echo $meta_keyword; ?>" class="form-control" required>
							   </div>
							   <div class="form-group">
								   <label for="company" class=" form-control-label">Meta Description</label>
								   <input type="text" name="meta_descr" placeholder="Enter your Meta Description" value="<?php echo $meta_descr; ?>" class="form-control" required>
							   </div>
							   <button type="submit" name="submit" class="btn btn-lg btn-info btn-block">
							   <span id="payment-button-amount">Submit</span>
							   </button>
							   <span class="text-danger mt-2 float-left"><?php echo $msg; ?></span>							   
							</div>						
						 </div>
					  </form>				  
				  </div>
               </div>
            </div>
         </div>
 <?php require('footer.php');?>