<?php

$conn = mysqli_connect("localhost", "root", "", "filmwebsite");
$sql = "SELECT * FROM `film`;";
$result = mysqli_query($conn, $sql) or die("Problem z połączeniem");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table>
        <?php
        while ($row = mysqli_fetch_row($result)) {
            echo '<tr>';

            for ($i = 0; $i < 6; $i++) {
                echo '<th style="padding: 0 2px">';
                if ($i == 3)
                    echo '<img src="'.$row[$i].'"></img>';
                else
                    echo $row[$i];
                    
                echo '</th>';
            }

            echo '</tr>';
        }
        ?>
    </table>
</body>

</html>