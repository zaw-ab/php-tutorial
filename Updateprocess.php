<?php
include 'dbConnect.php';
$User_ID = isset($_GET['User_ID']) ? $_GET['User_ID'] : 0;

    $firstname = $input['first_name'];
    $lastname  = $input['last_name'];
    $email     = $input['email'];
    $comment   = $input['comment'];
    $gender    = $input['gender'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sql= "UPDATE users ". "SET first_name= $firstname ". "SET last_name= $lastname ". "SET Email= $email ". "SET comment= $comment ". "SET gender= $gender ". "WHERE User_ID= $User_ID ";
    mysqli_query($connect, $sql);

    if (mysqli_affected_rows($connect) > 0) {
        echo "<p>*User data have been UPDATED*</p>";
        echo "<a href = 'FormHandling.php'>Go Back</a>";
    } else {
        echo "User have NOT been UPDATED<br/>";
        echo mysqli_error($connect);
    }
}
