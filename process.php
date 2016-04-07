<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if ($_POST['id']) {
        // update
        $sql= "UPDATE users ". "SET first_name= $input['first_name'] ". "SET last_name= $input['last_name'] ". "SET Email= $input['email'] ". "SET comment= $input['comment'] ". "SET gender= $input['gender'] ". "WHERE User_ID= $userId ";
    } else {
        // insert
        $sql = 'INSERT INTO users (first_name, last_name, email, comment, gender) VALUES ("%s", "%s", "%s", "%s", "%s")';
        $sql = sprintf($sql, $input['first_name'], $input['last_name'], $input['email'], $input['comment'], $input['gender']);
    }
    mysqli_query($connect, $sql);

    if (mysqli_affected_rows($connect) > 0) {
        $success = true;
    } else {
        $success = false;
    }
}
