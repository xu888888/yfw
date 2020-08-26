<?php
$conn=mysqli_connect('localhost','root','root','user');

$id = $_REQUEST['id'];
$type = $_REQUEST['type'];
$gaiNum=$_REQUEST['num'];

$sql = "SELECT * FROM `cart` WHERE `product_id`='$id'";
$res = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($res);
$num = $row['product_num'];
if($type=='add'){	
	$num = $num+1;
	$sql = "UPDATE `cart` SET `product_num`='$num' WHERE `product_id`='$id'";
}else if($type=='jian'){
	$num = $num-1;
	if($num>0){
		$sql = "UPDATE `cart` SET `product_num`='$num' WHERE `product_id`='$id'";
	}
}else if($type=='gai'){
	$num =$gaiNum ;
	$sql = "UPDATE `cart` SET `product_num`='$num' WHERE `product_id`='$id'";
}

$result = mysqli_query($conn,$sql);
if($result){
	echo json_encode(array("code"=>1));
}else{
	echo json_encode(array("code"=>0));
}
?>