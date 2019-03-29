
<?php
//select data from db 
function m_get_data(){
    $query = "Select * from user"; //select data from tbl_employee
    include "connection.php";
    $result = mysqli_query($conn,$query); // connect to db and query
    $rows = []; 
    if($result && mysqli_num_rows($result)>0){ //check if selcet can get the result is rows or not 
        while ($get_array = mysqli_fetch_assoc($result)){ //loop it for get array
            $rows[]= $get_array;
        }
    }
  
    return $rows;


}

function m_add_data(){
    include_once 'connection.php';
    //$id = $_GET['id'];
        $username=$_POST['username'];
        $name=$_POST['name'];
        $pwd=$_POST['password'];
       
        $query = "INSERT INTO   user(username,name,password) VALUES('$username','$name','$pwd')";
        $result = mysqli_query($conn, $query);
       
        return $result;
        //var_dump($result);die();
       
}
    function m_delete_user(){
        include 'connection.php';
        $id = $_GET['id'];
        $query = "DELETE FROM  user WHERE id = '$id'";
        $result =mysqli_query($conn,$query);
        return $result;
    }

 function detail_user(){ //method call from c_employee
     include 'connection.php';
     $id = $_GET['id'];

        $query = "SELECT * FROM user where id='$id' ";
        $result = mysqli_query($conn, $query);
        // var_dump($result); die();
        return $result;
       
    }
    function m_update_user(){
        include 'connection.php';
        $id = $_GET['id'];

        $username = $_POST['username'];
        $name = $_POST['name'];
       
        $pwd = $_POST['password'];
       
        $query = " UPDATE employee set firstname='$username' , lastname='$name' , 
        password='$pwd' ";
         $query.="WHERE id='$id'";
    
         $result = mysqli_query($conn, $query);

         return $result;
    }

    function validateFormDb (){
        include 'connection.php';

    if(isset($_POST['but_submit'])){

    $uname = mysqli_real_escape_string($conn,$_POST['txt_uname']);
    $password = mysqli_real_escape_string($conn,$_POST['txt_pwd']);

    if ($uname != "" && $password != ""){

        $sql_query = "select count(*) as cntUser from user where username='".$uname."' and password='".$password."'";
        $result = mysqli_query($conn,$sql_query);
        $row = mysqli_fetch_array($result);

        $count = $row['cntUser'];

        if($count > 0){
            $_SESSION['uname'] = $uname;
            header('Location: login.php?action=login');
        }

    }

}
    }
    
   function userRegister (){
    include 'connection.php';
        $funame = $_POST['username'];
        $nname=$_POST['name'];
        $pwd = $_POST["pwd"];
        $query = "INSERT INTO   user(username,name,password) VALUES('$funame','$nname','$pwd')";
        $result = mysqli_query($conn, $query);
         if($result){
             header( 'location:login.php');
         }else{
             echo 'you not create';
         }
        //var_dump($result); die();
        return $result;
    
   } 

