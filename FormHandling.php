<?php include 'functions.php'; ?>
<?php
$errors = array();
$input  = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['first_name'])) {
        $errors[] = "First Name is required.";
    } else {
        $input[] = test_input($_POST['first_name']);
    }
    {
    if (empty($_POST['last_name'])) {
            $errors[] = "Last Name is required.";
    } else {
        $input[] = test_input($_POST['last_name']);
    }
    }
    if (empty($_POST['Gender'])) {
            $errors[] = "Gender is required.";
    } else {
        $input[] =test_input($_POST['Gender']);
    }
    // ...

    if (count($errors) === 0) {
        // error free
        // db operation
    }
}
?>
<html>
<head>
    <title>Form Handling</title>
    <style type="text/css">
        .error {
            color: red;
        }
    </style>
</head>
<body>
    <h1>PhP Form Handling</h1>
    <?php
    if (count($errors)) {
        foreach ($errors as $err) {
        ?>
            <div class="error"><?php echo $err; ?></div>
        <?php
        }
    }
    ?>
    <form class="form" action="" method="post">
        <div>
            <label>First Name:</label>
            <div><input type="text" name="first_name"></div>
        </div>
        <div>
            <label>Last Name:</label>
            <div><input type="text" name="last_name"></div>
        </div>
        <div>
        <lable>Gender:</lable>
            <div>
        <input type="radio" name="Gender" value="male">Male
        <input type="radio" name="Gender" value="female">Female
            </div>
        </div>
        <div>
        <input type="submit" name="submit" value="Submit">
        <input type="reset" name="reset" value="Clear">
        </div>
    </form>
</body>
</html>
