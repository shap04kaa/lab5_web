<?php
include "DBconnect.php"; // Подключаем файл с подключением к базе данных

// Запрос данных о терминах и их определениях
$termsQuery = "SELECT * FROM kapibara_terms";
$termsResult = mysqli_query($mysql, $termsQuery);

// Запрос данных о изображениях
$imagesQuery = "SELECT * FROM images";
$imagesResult = mysqli_query($mysql, $imagesQuery);
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CSS</title>
  <link href="css/pics_terms.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Libre+Franklin&display=swap" rel="stylesheet">

<body>
    <h1>Термины и определения:</h1>
    <table>
        <tr>
            <th>Термин</th>
            <th>Определение</th>
        </tr>
        <?php
        while ($termins = mysqli_fetch_assoc($termsResult)) {
            echo "<tr>"; 
            echo "<td>" . $termins['term'] . "</td>";
            echo "<td>" . $termins['definition'] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>

    <h1>Изображения:</h1>
    <div class="box">
        <?php
        while ($image = mysqli_fetch_assoc($imagesResult)) {
            echo '<div class="filters__img">';
            echo '<img title="' . $image['image_name'] . '"src="images/'. $image['file_path'] . '" />';
            echo '</div>';
        }
        ?>
    </div>
</body>
</html>
