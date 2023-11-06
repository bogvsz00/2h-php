<?php

$conn = mysqli_connect("localhost", "root", "", "filmwebsite");

if (isset($_POST["dodaj"])) {
    $titleT = $_POST["title"];
    $dateT = $_POST["date"];
    $descriptionT = $_POST["description"];
    $imageT = $_POST["image"];

    $sql = "INSERT INTO `film`(
        `Title`,
        `ImageLink`,
        `ProductionDate`,
        `Description`
    )
    VALUES(
        '$titleT',
        '$imageT',
        '$dateT',
        '$descriptionT'
    )";

    mysqli_query($conn, $sql) or die("Problem z połączeniem");
}

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
    <form method="POST">
        <label for="title">Title: </label>
        <input type="text" name="title" /><br>

        <label for="date">Production date: </label>
        <input type="date" name="date" /><br>

        <label for="description">Description: </label>
        <textarea type="text" name="description"></textarea><br>

        <label for="image">Image link: </label>
        <input type="text" name="image" /><br>

        <input type="submit" name="dodaj" value="dodaj">
    </form>

    <table>
        <?php
        while ($row = mysqli_fetch_row($result)) {
            echo '<tr>';

            for ($i = 0; $i < 6; $i++) {
                echo '<th style="padding: 0 2px">';
                if ($i == 3)
                    echo '<img height="50px" src="' . $row[$i] . '"></img>';
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