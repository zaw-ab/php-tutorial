<?php

    echo "<table style='width:100%;border: solid 1px blue;'>";
    echo "<tr style='color: green;'>
                <th>UserId</th>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Gmail</th>
                <th>Comment</th>
                <th>Gender</th>
                <th>edit data</th>
            </tr>";

class TableRows extends RecursiveIteratorIterator
{
    public function __construct($cst)
    {
        parent::__construct($cst, self::LEAVES_ONLY);
    }

    public function current()
    {
        return "<td style='width:150px;border: solid 1px blue;text-align:center;'>" . parent::current(). "</td>";
    }

    public function beginChildren()
    {
        echo "<tr>";
    }

    public function endChildren()
    {
        echo "<td style='width:100px;border: solid 1px blue;text-align:center;'><a href =''>Edit</a></td>"."</tr>";
    }
}

    $servername = "localhost";
    $username   = "root";
    $password   = "root";
    $dbname     = "dbs";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * FROM users order by User_ID ASC");
    $stmt->execute();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    foreach (new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k => $v) {
            echo $v;
    }
} catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
}
    $conn = null;
    echo "</table>";
