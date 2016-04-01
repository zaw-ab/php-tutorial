    <?php
    $connect = mysqli_connect('localhost', 'root', 'root', 'dbs');
    if (mysqli_connect_errno($connect)) {
        echo 'Failed to connect';
    }
    ?>
