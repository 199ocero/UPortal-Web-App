<?php
    session_start();
    include('dbcon.php');

    if(isset($_POST['save-data'])){
        $fName = $_POST['fName'];
        $mName = $_POST['mName'];
        $lName = $_POST['lName'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        $postData = [
            'fName' =>$fName,
            'mName' =>$mName,
            'lName' =>$lName,
            'email' =>$email,
        ];

        $ref_table = "students";
        $postRef = $database->getReference($ref_table)->push($postData);
        $postKey = $postRef->getKey();

        $userProperties = [
            'uid' => $postKey,
            'email' =>$email,
            'password' =>$password,
        ];

        $createdUser = $auth->createUser($userProperties);
        if($postRef && $createdUser){
            $_SESSION['status'] = "Student Registered Successfully.";
            header("Location: register-student.php");
            
        }else{
            $_SESSION['status'] = "Student Registration Failed.";
            header("Location: register-student.php");
        }
    }

    if(isset($_POST['delete-data'])){
        $token = $_POST['ref-token-delete'];

        $deleteData = $database->getReference('students/'.$token)->remove();
        $auth->deleteUser($token);

        if($deleteData){
            $_SESSION['status'] = "Data Deleted Successfully.";
            header("Location: index.php");
            
        }else{
            $_SESSION['status'] = "Data not Deleted. Something went wrong.";
            header("Location: index.php");
        }
    }

    if(isset($_POST['update-data'])){

        $fName = $_POST['fName'];
        $mName = $_POST['mName'];
        $lName = $_POST['lName'];
        $email = $_POST['email'];
        $token = $_POST['token'];


        $postData = [
            'fName' =>$fName,
            'mName' =>$mName,
            'lName' =>$lName,
            'email' =>$email,
        ];


        $updateData = $database->getReference("students/".$token)->update($postData);

        if($updateData){
            $_SESSION['status'] = "Data Updated Successfully.";
            header("Location: index.php");
            
        }else{
            $_SESSION['status'] = "Data not Updated. Something went wrong.";
            header("Location: index.php");
        }
    }

?>