<html>
<head>
</head>
<body>
    <?php include 'dbConnect.php';?>
        <?php
        $firstname = $_POST['first_name'];
        $lastname  = $_POST['last_name'];
        $gender    = $_POST['Gender'];

        mysqli_query($connect, "INSERT INTO user(First_Name,Last_Name,Gender)
         VALUES('$firstname','$lastname','$gender')");

        if (mysqli_affected_rows($connect) > 0) {
            echo "<p>*User have been Added to the database*</p>";
            echo "<a href = 'FixCodingStyle.php'>Go Back</a>";
        } else {
                echo "User have NOT been Added<br/>";
                echo mysqli_error($connect);
        }
    ?>
</body>
</html>