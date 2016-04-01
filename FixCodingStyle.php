<html>
<head>
</head>
<body>
    <?php
    $firstNameError = "";
    $lastNameError  = "";
    $genderError    = "";

    $firstName      = "";
    $lastName       = "";
    $gender         = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["first_name"])) {
            $firstNameError = "Name is required";
        } else {
            $firstName = test_input($_POST["first_name"]);
        }
        if (empty($_POST["last_name"])) {
            $lastNameError = "Name is required";
        } else {
            $lastName = test_input($_POST["last_name"]);
        }
        if (empty($_POST["Gender"])) {
            $genderError = "Gender is required";
        } else {
            $gender = test_input($_POST["Gender"]);
        }
    }
    ?>
    <form class="form" action = ""  method="post">
        First Name:<br>
        <input type="text" name="first_name">
        <spam>*<?php echo $firstNameError; ?></spam><br><br>
        Last Name:<br>
        <input type="text" name="last_name">
        <spam>*<?php echo $lastNameError;?></spam><br><br>
        Gender:<br>
        <input type="radio" name="Gender" value="male">Male
        <input type="radio" name="Gender" value="female">Female
        <spam>*<?php echo $genderError;?></spam><br><br>
        <input type="submit" name="submit" value="Submit">
        <input type="reset" name="reset" value="Clear">
    </form>
</body>
    </html>
