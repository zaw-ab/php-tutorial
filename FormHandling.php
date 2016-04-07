<?php
include 'dbConnect.php';
include 'functions.php';

$userId = isset($_GET['id']) ? $_GET['id'] : 0;

$errors  = array();
$input   = array(
    'first_name' => '',
    'last_name'  => '',
    'email'      => '',
    'comment'    => ''
);
$success = false;

if ($userId) {
    $sql = "SELECT * FROM users WHERE User_ID=$userId";
    $result = mysqli_query($connect, $sql);
    if ($row = mysqli_fetch_assoc($result)) {
        $input['first_name'] = $row['first_name'];
        $input['last_name']   = $row['last_name'];
        $input['email']      = $row['Email'];
        $input['comment']    = $row['comment'];
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input['first_name']    = sanitize($_POST['first_name']);
    $input['last_name']     = sanitize($_POST['last_name']);
    $input['gender']        = isset($_POST['gender']) ? sanitize($_POST['gender']) : null;
    $input['email']         = sanitize($_POST['email']);
    $input['comment']       = sanitize($_POST['comment']);

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
        <input type="hidden" name="id" value="<?php echo $userId; ?>">
        <div>
            <label>First Name:</label>
            <div><input type="text" name="first_name" value="<?php echo $input['first_name']; ?>"></div>
        </div>
        <div>
            <label>Last Name:</label>
            <div><input type="text" name="last_name" value="<?php echo $input['last_name']; ?>"></div>
        </div>
        <div>
            <label>Email:</label>
            <div><input type="text" name="email" value="<?php echo $input['email']; ?>"></div>
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
        <input type="radio" name="gender" value="male" checked="checked">Male
        <input type="radio" name="gender" value="female">Female
        </div>
        <div>
        <input type="submit" name="submit" value="Submit">
        <input type="reset" name="reset" value="Clear">
        </div>
    </form>
        </fieldset>
</body>
</html>
