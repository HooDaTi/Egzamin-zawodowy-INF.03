<?php
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbname = 'motory';

    $conn = mysqli_connect($dbhost, $dbuser, '', $dbname);
    mysqli_select_db($conn, $dbname);
?>

<html lang="PL">
    <head>
        <meta charset="UTF-8">
        <title>Motocykle</title>
        <link rel="stylesheet" type="text/css" href="styl.css">
    </head>
    <body>
        <img id="motor-foto" src="motor.png" alt="motocykl">
        <header>
            <h1>Motocykle - moja pasja</h1>
        </header>
        <section id="lewy">
            <h2>Gdzie pojechać?</h2>
            <?php
                $query = "SELECT nazwa, opis, poczatek, zrodlo FROM wycieczki JOIN zdjecia ON zdjecia_id = zdjecia.id;";
                $result = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_array($result)){
                    echo '<p>'.$row['nazwa'].', rozpoczyna się w '. $row['poczatek'].', '.'<a href="'.$row['zrodlo'].'.jpg">zobacz zdjęcie</a></p>';
                    echo '<ul><li>'.$row['opis'].'</li></ul>';
                };
            ?>
        </section>
        <section id="prawy-gora">
            <h2>Co kupić?</h2>
            <ol>
                <li>Honda CBR125R</li>
                <li>Yamaha YBR125</li>
                <li>Honda VFR800i</li>
                <li>Honda CBR1100XX</li>
                <li>BMW R1200GS LC</li>
            </ol>
        </section>
        <section id="prawy-dol">
            <h2>Statystyki</h2>
            <p>Wpisanych wycieczek: 
                <?php
                $query = "SELECT COUNT(*) FROM `wycieczki`;";
                $result = mysqli_query($conn, $query);
                $row = mysqli_fetch_row($result);
                echo $row[0];
                mysqli_close($conn);
                ?>
            </p>
            <p>Użytkowników forum: 200</p>
            <p>Przesłanych zdjęć: 1300</p>
        </section>
        <footer>
            <p>Stronę wykonał: 44444444444</p>
        </footer>
    </body>
</html>