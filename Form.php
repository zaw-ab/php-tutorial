<html>
<head></head>
<body>
    <?php
    $FNameErr= $LNameErr= $EmailErr= $GenderErr= "";
    $FName= $LName= $Email= $Gender= "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["first name"])) {
            $FNameErr = "Name is Required";
        } else {
            $FName = test_input($_POST["first name"]);
        }
        if (empty($_POST["last name"])) {
            $LNameErr = "Name is required";
        } else {
            $LName = test_input($_POST["last name"]);
        }
        if (empty($_POST["email"])) {
            $EmailErr = "Email is required";
        } else {
            $Email = test_input($_POST["email"]);
        } if (empty($_POST["Gender"])) {
            $GenderErr = "Exact Gender is required";
        } else {
            $Gender = test_input($_POST["Gender"]);
        }
    }
    ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <h1>A simple html form</h1>
        First Name:<br>
        <input type="text" name="first name">
        <span class="error">* <?php echo $FNameErr;?></span><br><br>
        Last Name:<br>
        <input type="text" name="last name">
        <span class="error">* <?php echo $LNameErr;?></span><br><br>
        Email Address:<br>
        <input type="text" name="email" >
        <span class="error">* <?php echo $EmailErr;?></span><br><br>
        Gender:<input type="radio" value="male" name="male">male
        <input type="radio" value="female" name="female">female
        <span class="error">* <?php echo $GenderErr;?></span><br>
        <input type="submit" name="submit" value="Submit">
        <input type="reset" name="clear" value="cancle">
    </form>
</body>
</html>
