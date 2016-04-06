<?php
include 'dbConnect.php';

    $firstname = $_input['first_name'];
    $lastname  = $_input['last_name'];
    $email     = $_input['email'];
    $comment   = $_input['comment'];
    $gender    = $_input['gender'];
    $userid    = $_input['User_ID'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sql= "UPDATE users ". "SET first_name= $firstname ". "SET last_name= $lastname ". "SET Email= $email ". "SET comment= $comment ". "SET gender= $gender ". "WHERE User_ID= $userid ";
mysqli_query($connect, $sql);

    if (mysqli_affected_rows($connect) > 0) {
        $success = true;
    } else {
        $success = false;
    }
}

