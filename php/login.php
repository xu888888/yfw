<?php
$username=$_POST['names'];
$password=$_POST['password'];
$conn=mysqli_connect('localhost','root','root','user');
$sql="SELECT * FROM `info` WHERE `names`='$username' AND `password`='$password'";
$res=mysqli_query($conn,$sql);
$result=mysqli_fetch_assoc($res);

if($result){
    $arr=array('code'=>1,'data'=>"$username");
    
}else{
    $arr=array('code'=>0,'msg'=>'用户名或者密码错误');
}
echo json_encode($arr);
mysqli_close($conn);
?>