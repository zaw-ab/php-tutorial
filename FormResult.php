<?php
$success = $_GET['success'];

if ($success) {
    include 'select.php';
    echo "<p>***Congratz! User have been Added to the database***</p>";
    echo "<a href = 'FormHandling.php'>Go Back</a>";
} else {
    echo "Sorry!User have NOT been Added<br/>";
    echo "<a href = 'FormHandling.php'>Go Back</a>";
}
