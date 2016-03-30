<html>
    <head>

    </head>
    <body>
        <h1>Date and Time</h1>
        <?php
echo "Today is " . date("d.m.Y h.i.sa l") . "<br>";

$d=strtotime("tomorrow");
echo "Tomorrow is " . date("Y-m-d h:i:sa", $d) . "<br>";

$d=strtotime("next Saturday");
echo "Next Sataurday is " . date("Y-m-d h:i:sa", $d) . "<br>";

$d=strtotime("+3 Months");
echo "Next 3 month is " . date("Y-m-d h:i:sa", $d) . "<br>";
?>
    </body>
</html>
