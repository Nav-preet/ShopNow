<?php
session_start();
$conn = mysqli_connect("localhost","root","","shop_now");
define('SERVER_PATH',$_SERVER['DOCUMENT_ROOT'].'/shopnow/');
define('SITE_PATH','http://localhost/shopnow/');

define('PRODUCT_IMAGE_SITE_PATH',SITE_PATH.'images/product/');
define('PRODUCT_IMAGE_SERVER_PATH',SERVER_PATH.'images/product/');
?>