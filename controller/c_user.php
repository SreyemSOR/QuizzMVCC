<?php
function view(&$data){
    //this variable loop in view
    $data['user_data']=m_get_data();
    $data['page']="user/view";
}



function add(&$data){
    $data ['user_data']=m_add_data();
    $data['page'] = 'user/add';
}


function edit(&$data){
    $data['employee_update'] = detail_user(); //call function name detai_employee in model
    $data['page'] = 'user/update';

}
function update($data){
    $id = $_GET['id'];
    $data = m_update_user();
    if($data){
        $action = 'view';
    }else{
    $action = 'edit&id=$id';
    }
header("Location:index.php?action=$action");
}

function delete(&$data){
   // $data['page'] = 'employee/delete';
   $delete = m_delete_user();
   if($delete){
       $action ='view';
   }else{
       echo 'cannot delete this record!';
   }
   header("Location:index.php?action=$action");
}

function login(&$data){
    $data['page'] = 'login';
  
    
}

function loginValidate(&$data){
validateFormDb();
}


function logout(&$data){
    include 'connection.php';
   
    if(isset($_POST['but_logout'])){
        session_destroy();
        header('Location: index.php?action=login');
    }
}


function createUser(&$data){
    // $data ['employee_data']= userRegister();
     $data['page'] = 'register';
 }
 function userrRegister(){
     $data['user_data'] = userRegister();
     if($data){
        $action = 'login';
    }else{
    $action = 'register';
    }
header("Location:index.php?action=$action");
}
?>