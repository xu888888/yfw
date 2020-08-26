<?php

$id = $_REQUEST['id'];
$type=$_REQUEST['type'];
$conn=mysqli_connect('localhost','root','root','user');
if($type=='del'){
    //根据id删除数据
    $sql = "DELETE FROM `cart` WHERE `product_id`=$id";
}else if($type=='clear'){
	//删除所有数据
	// $sql = "DELETE FROM `cart` WHERE `product_id`=$id";
	$sql="TRUNCATE TABLE `cart`";

}

$result = mysqli_query($conn,$sql);
if($result){
	echo json_encode(array("code"=>1));
}else{
	echo json_encode(array("code"=>0));
}

?>