<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $input['first_name'];
    $lastname  = $input['last_name'];
    $email     = $input['email'];
    $comment   = $input['comment'];
    $gender    = $input['gender'];
    $userId    = $_POST['id'];

    if (isset($_POST['id'])) {
        //test $userID
     if($_POST['id']) {
            //echo "$userId";exit;
        }

        // update
        $sql = '
            UPDATE users SET
                first_name = "' . $firstname . '",
                last_name = "' . $lastname . '",
                Email      = " ' . $email . ' ",
                comment    = " ' . $comment . ' ",
                gender     = "' . $gender . ' "
            WHERE User_ID = ' . $userId;
        ///$sql= "UPDATE users ". "SET first_name= $firstname ". "SET last_name= $lastname ". "SET Email= $email ". "SET comment= $comment ". "SET gender= $gender ". "WHERE User_ID= $userId ";
        //echo $sql; exit;
        $update =mysqli_query($connect, $sql);

        if (!$update) {
            $success= false;
            echo mysqli_error($connect);
            echo "Invalid user data";
            exit;
        } else {
            $success= true;
            echo "User Data have been updated";
        }
    } else {
        // insert
        $ssql = 'INSERT INTO users (first_name, last_name, Email, comment, gender) VALUES ("%s", "%s", "%s", "%s", "%s")';
        $ssql = sprintf($ssql, $firstname, $lastname, $email, $comment, $gender);
        $insert= mysqli_query($connect, $ssql);

        if (!$insert) {
            $success = false;
        } else {
            $success = true;
        }
    }
}
