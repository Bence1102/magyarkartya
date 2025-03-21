<?php
    include_once "AB.php"
?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stilus.css">
    <title>Kártya</title>
</head>
<body>
    <?php
        $adatbazis = new AB();
        if($adatbazis->meret("kartya") == 0){
            $adatbazis->feltoltes("kartya", "szinAzon", "formaAzon");
        }
        $matrix = $adatbazis->oszlopLeker2("nev","kep", "szin");
        echo "<table>";
        echo "<tr>
                <th>
                    <p>Név</p>
                </th>
                <th>
                    <p>Kép</p>
                </th>
              </tr>";
        $adatbazis->modosit("szin","nev","piros","vörös");
        $adatbazis->beszur("kartya","formaAzon","szin","szinAzon",5);
        $adatbazis->tableone($matrix);
        $adatbazis->bezar();
        

        

    ?>
</body>
</html>
