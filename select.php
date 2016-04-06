<?php
include 'dbConnect.php';
?>
<html>
<head>
    <title></title>
    <style type="text/css">
        table
        {
            width: auto;
            border: 3px solid #49ac49;
        }
        th
        {
            background-color: darkgrey;
            width: auto;
            border: 3px;
        }
        td
        {
            background-color: antiquewhite;
            width:200px;
            height: 50px;
            text-align:center;
        }
    </style>
</head>
<body>
<?php
$sql = "SELECT * FROM users order by User_ID ASC";
$result = mysqli_query($connect, $sql);

if (mysqli_num_rows($result) > 0) {
?>
    <table>
        <tr>
            <th>User_ID</th>
            <th>First_Name</th>
            <th>Last_Name</th>
            <th>Email</th>
            <th>Comment</th>
            <th>Gender</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?php echo $row['User_ID']; ?></td>
            <td><?php echo $row['first_name']; ?></td>
            <td><?php echo $row['last_name']; ?></td>
            <td><?php echo $row['Email']; ?></td>
            <td><?php echo $row['comment']; ?></td>
            <td><?php echo $row['gender']; ?></td>
            <td><a href= 'UpdateForm.php'>Edit</a></td>
            <td><a href= ''>Delete</a></td>
        </tr>
        <?php } ?>
    </table>
<?php
} else {
?>
    <div>There is no user.</div>
<?php
}
?>
</body>
</html>
<?php
mysqli_close($connect);
