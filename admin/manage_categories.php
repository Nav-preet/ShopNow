<?php
require('connection.php');
require('function.inc.php');
require('header.php');

$msg='';
$category = '';
if(isset($_GET['id']) && $_GET['id'] !=''){
	$id = safe_value($conn,$_GET['id']);
	$query = "select * from categories where id = '$id'";
	$res=mysqli_query($conn,$query);
	$count = mysqli_num_rows($res);
	if($count > 0){
		$row = mysqli_fetch_assoc($res);
		$category = $row['cat_name'];
	}else{
		header('location:categories.php');
		die();
	}
}

if(isset($_POST['submit'])){
	$cat_name = safe_value($conn,$_POST['cat-name']);
	$check = "select * from categories where cat_name = '$cat_name'";
	
	$res=mysqli_query($conn,$check);
	$count = mysqli_num_rows($res);
	
	if($count>0){
		if(isset($_GET['id']) && $_GET['id'] !=''){
			$getid = mysqli_fetch_assoc($res);
			if($id==$getid['id']){
				
			}else{
				$msg = "Name already exist";
			}
		}
			
	}
	if($msg==''){
			if(isset($_GET['id']) && $_GET['id'] !=''){
				$query = "update categories set cat_name = '$cat_name' where id = '$id'";
				mysqli_query($conn,$query);
			}else{
				$qry = "insert into categories(cat_name,status)values('$cat_name',1)";
			mysqli_query($conn,$qry);	
			}			
			header('location:categories.php');
			die();
		}	
}

?>
         <div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
					  <form method="post">
						 <div class="card">
							<div class="card-header"><strong>Add Category</strong></div>
							<div class="card-body card-block">
							   <div class="form-group">
							   <label for="company" class=" form-control-label">Category Name</label>
							   <input type="text" name="cat-name" placeholder="Enter your Category name" value="<?php echo $category; ?>" class="form-control" required></div>
							   
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