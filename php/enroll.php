<?php
$username=$_POST['names'];
$password=$_POST['password'];
$conn=mysqli_connect('localhost','root','root','user');
$sql="SELECT * FROM `info` WHERE `names`='$username'";
$res=mysqli_query($conn,$sql);
$result=mysqli_fetch_assoc($res);

if($result){
    $arr=array('code'=>0,'msg'=>"用户名已注册");
    
}else{
    $sql = "INSERT INTO `info` (`names`,`password`) VALUES ('$username','$password')";
    $result = mysqli_query($conn,$sql);
    if($result){
        $arr = array('code'=>1,'data'=>array('username'=>$username));
    }else{
        $arr = array('code'=>0,'msg'=>'后端出错了');
    }
}
echo json_encode($arr);

?>