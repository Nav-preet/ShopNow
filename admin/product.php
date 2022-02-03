<?php
require('connection.php');
require('function.inc.php');
require('header.php');

$msg ='';
$query = "select product.*,categories.cat_name from product,categories where product.cat_id = categories.id order by product.id desc";
$res = mysqli_query($conn,$query);
$count  = mysqli_num_rows($res);
if($count > 0 )
{
	if(isset($_GET['type']) && $_GET['type'] !=''){
		$type = safe_value($conn,$_GET['type']);		
		if($type=='status'){
			$operation = safe_value($conn,$_GET['operation']);
			$id = safe_value($conn,$_GET['id']);
			if($operation == 'active'){
				$status = '1';
			}else{
				$status = '0';
			}
			$qry = "update product set status = '$status' where id = '$id'";
			mysqli_query($conn,$qry);
		}
		
		if($type=='delete'){
			$id = safe_value($conn,$_GET['id']);
			$qry = "delete from product where id = '$id'";
			mysqli_query($conn,$qry);
		}
		
	}
}
else{
	$msg = 'No Record Found';
}
?>
     
         <div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
						<div class="card-body">
							<span class="mt-2 float-left"><strong>Product</strong></span>
							<a href="manage_product.php" class="btn btn-primary float-right">Add Product </a>
						  </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead>
                                    <tr>
                                       <th>S.NO.</th>
									   <th width="15%">Name</th>
									   <th width="15%">Category</th>
									   <th width="10%">Image</th>
									   <th width="10%">MRP</th>
									   <th width="7%">Price</th>
									   <th width="7%">Qty</th>
									   <th width="40%"></th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <tr>
									<?php 
									$i=1;
									while($row = mysqli_fetch_array($res)){ ?>
                                       <td class="serial"><?php echo $i++; ?></td>
                                      
                                       <td> <span class="name"><?php echo $row['product_name']; ?></span> </td>
									   <td> <span class="name"><?php echo $row['cat_name']; ?></span> </td>
									   <td><img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$row['product_image']; ?>" alt="<?php echo $row['product_image']; ?>"/></td>
									    <td> <span class="name"><?php echo $row['mrp']; ?></span> </td>
										 <td> <span class="name"><?php echo $row['price']; ?></span> </td>
										  <td> <span class="name"><?php echo $row['qty']; ?></span> </td>
                                       <td>
                                          <?php
											  if($row['status'] == 1){
												echo '<span class="badge badge-complete">
													<a href="?type=status&operation=deactive&id='.$row['id'].'">Active </a>
													</span>';  
											  }else{
												  echo '<span class="badge badge-pending">
												  <a href="?type=status&operation=active&id='.$row['id'].'">Deactive </a>
												  </span>'; 
											  }
											?>
											</span>
											<span class="badge badge-complete">
											  <?php 	echo '<a href="manage_product.php?id='.$row['id'].'">Edit</a>'; ?>
										  </span>
											<span class="badge badge-danger">
											  <?php 	echo '<a href="?type=delete&id='.$row['id'].'">Delete</a>'; ?>
										  </span>
                                       </td>
                                    </tr>
                                    <?php } ?>
                                 </tbody>
                              </table>
							  
                           </div>
						   <span class="text-danger mt-2 float-left"><?php echo $msg;?><span>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
		  </div>
         <div class="clearfix"></div>
<?php
require('footer.php');
?>