<?php
session_start();
 
if(isset($_POST['xacnhan'])){ //neu ton tai $_post['xacnhan']
 
 
       $error=array();
 
               $username =$_POST['username'];
 
               $password =$_POST['password'];


         if(isset($username) && isset($password)){
 
            $conn=  mysqli_connect('localhost','root','') or die("Lỗi kết nối");
 
            mysqli_select_db($conn,'webhangban') or die('Not find DataBase');
 
            $sql="select * from user where email ='".$username."' and password='".$password."'";
 
            $query=mysqli_query($conn,$sql);//thuc thi cau lenh
 
            $row=  mysqli_fetch_array($query);
 
            //kiem tra coi dung khong nhe
 
            if(($row['email']==$username) && $row['password']==$password && $row['role_id']==1){

                header('location: ../admin/admin.html');
 
            }
 
            else if(($row['email']==$username) && $row['password']==$password && $row['role_id']==2){
                     
 
                     header('location:../index.html');
                     
 
            }
 
            else {
                     header('locaton:../Login/Login.html');
                     
 
            }
 
                    
 
        }
 
        if($error){
 
            echo print_r($error);
 
        }
 
}
?>
