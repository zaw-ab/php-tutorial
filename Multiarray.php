<html>
<head>
</head>
<body>
    <h1>Multi Array</h1>
    <?php
$cars = array
   (
   array("Volvo",22,18),
   array("BMW",15,13),
   array("Saab",5,2),
   array("Land Rover",17,15)
   );

for ($row = 0; $row <  4; $row++) {
    echo "<p><b>Row number $row</b></p>";
    echo "<ul>";
    for ($col = 0; $col <  3; $col++) {
        echo "<li>".$cars[$row][$col]."</li>";
    }
    echo "</ul>";
}
?>
<?php
$heroes = array
    (
    array("am","twl","dr"),
    array("wd","lion","sil"),
    array("cw","lc","om"),
    );
for ($row= 0; $row < 3; $row++) {
    echo "<p><b>Heroes $row</b></p>";
    echo "<ul>";
    for ($col = 0; $col <3; $col++) {
        echo "<li>".$heroes[$row][$col]."</li>";
    }
    echo "</ul>";
}
        ?>
</body>
</html>
