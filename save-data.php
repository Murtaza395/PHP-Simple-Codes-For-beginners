<?php
include'database1.php';
$obj= new Database(); 



$sname =$_POST['sname'];
$sroll =$_POST['sroll'];
$sadd =$_POST['sadd'];
$scity =$_POST['scity'];

$value = ['name'=>$sname,'roll_no'=>$sroll,'address'=>$sadd , 'city'=>$scity];
if($obj->insert('student',$value)){
echo"Data inserted successfully;";
}
else{
    echo"Data not inserted";
}
?>