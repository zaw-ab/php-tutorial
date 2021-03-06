<?php
include 'functions.php';

$errors  = array();
$input   = array(
    'first_name' => '',
    'last_name'  => '',
    'email'      => '',
    'comment'    => ''
);
$success = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input['first_name']    = sanitize($_POST['first_name']);
    $input['last_name']     = sanitize($_POST['last_name']);
    $input['gender']        = isset($_POST['gender']) ? sanitize($_POST['gender']) : null;
    $input['email']         = sanitize($_POST['email']);
    $input['comment']       = sanitize($_POST['comment']);
    $input['User_ID']       = sanitize($_POST['User_ID']);

    if (empty($input['User_ID'])) {
        $errors[] = "User ID is required.";
    }
    if (empty($input['first_name'])) {
        $errors[] = "First Name is required.";
    }
    if (!preg_match("/^[a-zA-Z ]*$/", $input['first_name'])) {
        $errors[] = "Enter Valid First Name";
    }

    if (empty($input['last_name'])) {
        $errors[] = "Last Name is required.";
    }
    if (!preg_match("/^[a-zA-Z ]*$/", $input['last_name'])) {
        $errors[] = "Enter Valid Last Name";
    }

    if (!filter_var($input['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format";
    }

    if (empty($input['gender'])) {
        $errors[] = "Gender is required.";
    }

    if (count($errors) === 0) {
        // error free
        // db operation
        include 'process2.php';

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
    <fieldset>
    <legend style="color: green;"><h1>PhP Form Handling</h1></legend>
    <?php
    if (count($errors)) {
        foreach ($errors as $err) {
        ?>
            <div class="error"><?php echo $err; ?></div>
        <?php
        }
    }
    ?>
    <form style="color: blue;" action="" method="post">
        <div>
            <label>User_ID:</label>
            <div><input type="text" name="User_ID" ></div>
        </div>
        <div>
            <label>First Name:</label>
            <div><input type="text" name="first_name" ></div>
        </div>
        <div>
            <label>Last Name:</label>
            <div><input type="text" name="last_name" ></div>
        </div>
        <div>
            <label>Email:</label>
            <div><input type="text" name="email" </div>
        </div>
        <div>
            <label>
                Comment:
            </label>
            <div>
                <textarea name="comment" rows="5" cols="40"><?php echo $input['comment']; ?></textarea>
            </div>
        </div>
        <div>
        <lable>Gender:</lable>
            <div>
        <input type="radio" name="gender" value="male">Male
        <input type="radio" name="gender" value="female">Female
        </div>
        <div>
        <input type="submit" name="submit" value="Update">
        <input type="reset" name="reset" value="Clear">
        </div>
    </form>
        </fieldset>
</body>
</html>
