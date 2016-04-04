<?php
include 'functions.php';

$errors  = array();
$input   = array();
$success = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input['first_name']    = sanitize($_POST['first_name']);
    $input['last_name']     = sanitize($_POST['last_name']);
    $input['gender']        = isset($_POST['gender']) ? sanitize($_POST['gender']) : null;
    $input['email']         = sanitize($_POST['email']);
    $input['comment']       = sanitize($_POST['comment']);

    if (empty($input['first_name'])) {
        $errors[] = "First Name is required.";
    }

    if (empty($input['last_name'])) {
        $errors[] = "Last Name is required.";
    }

    if (empty($input['gender'])) {
        $errors[] = "Gender is required.";
    }

    if (empty($input['email'])) {
        $errors[] = "Enter your Email";
    }

    if (count($errors) === 0) {
        // error free
        // db operation
        include 'process.php';

        if ($success) {
            header('Location: FormResult.php?success=1');
            exit;
        } else {
            header('Location: FormResult.php?success=0');
            exit;
        }
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
            <label>Email:</label>
            <div><input type="text" name="email"></div>
        </div>
        <div>
            <label>
                Comment:
            </label>
            <div>
                <textarea name="comment" rows="5" cols="40"></textarea>
            </div>
        </div>
        <div>
        <lable>Gender:</lable>
            <div>
        <input type="radio" name="gender" value="male">Male
        <input type="radio" name="gender" value="female">Female
        </div>
        <div>
        <input type="submit" name="submit" value="Submit">
        <input type="reset" name="reset" value="Clear">
        </div>
    </form>
</body>
</html>
