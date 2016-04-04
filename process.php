<?php
include 'dbConnect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $sql = 'INSERT INTO users (first_name, last_name, email, comment, gender) VALUES ("%s", "%s", "%s", "%s", "%s")';
    $sql = sprintf($sql, $input['first_name'], $input['last_name'], $input['email'], $input['comment'], $input['gender']);
    mysqli_query($connect, $sql);

    if (mysqli_affected_rows($connect) > 0) {
        $success = true;
    } else {
        $success = false;
    }
}
