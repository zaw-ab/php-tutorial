<html>
<head>
</head>
<body>
    <?php
    $connect = mysqli_connect('localhost', 'abcd', 'abcdefg', 'dbs');
    if (mysqli_connect_errno($connect)) {
        echo 'Failed to connect';
    }
    ?>
</body>
</html>
