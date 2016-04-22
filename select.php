<?php
include 'dbConnect.php';

include 'delete.php';
?>
<html>
<head>
    <title></title>
    <script type="text/javascript">
        function confirmDelete(id) {
            if (confirm("Are you sure you want to delete?")) {
              document.getElementById('delete-id').value = id;
              document.getElementById('list-form').submit();
            }
        }
    </script>
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
            width: 200px;
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
<form id="list-form" method="post" >
    <input type="hidden" id="delete-id" name="delete-id">
    <input type="hidden" name="action" value="delete">
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
            <td><a href= "FormHandling.php?id=<?php echo $row['User_ID']; ?>">Edit</a></td>
            <td><a href="#" onclick="confirmDelete(<?php echo $row['User_ID']; ?>)">Delete</a></td>
        </tr>
        <?php } ?>
    </table>
</form>
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
