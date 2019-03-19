<?php

include('conn.php');


    if($_POST['name']!=NULL){
        $name=$_POST['name'];
        $email=$_POST['email'];
        $college=$_POST['college'];
        $phone=$_POST['phone'];
        $department=$_POST['department'];
        $age=$_POST['age'];
        $why1=$_POST['why1'];
        $why2=$_POST['why2'];

        $sql = "INSERT INTO ca (name,email,phone,college,department,age,why1,wh2)
        VALUES ('$name', '$email','$phone', '$college','$department','$age','$why1','$why2')";

        if ($conn->query($sql) === TRUE) {
            header('Location: campus.php?result=Regestered Sucessfully');
    
        } else {
            
            echo "Error: " . $sql . "<br>" . $conn->error;

        }



    }





?>