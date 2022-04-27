<?php


if(isset($_POST["submit"])){

    $usernameeee = $_POST['usernameeee'];
    $lozinka = $_POST['lozinka'];
    



    include "config.php";
    include "function.php";



    if(emptyInputLogin($usernameeee,$lozinka) !== false)
    {
        header("location: login.php?error=prazaninput");
        exit();
    }
    loginUser($conn,$usernameeee,$lozinka);
    
    

}
else{
    header("location: login.php");
    exit(); 
}



