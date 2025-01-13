<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Codzienny cytat</title>
    <link rel="stylesheet" type="text/css" href="styl1.css">
</head>
<body>
    <header>
        <h1>Dzienna dawka motywacji</h1>
    </header>
    <section id="lewy">
        <img src="kwiaty.png" alt="kwiaty">
    </section>
    <section id="prawy">
        Zainspiruj się<a href="kwerendy.txt" target="_blank">innymi cytatami</a>
        <h2>Najlepsze dni tygodnia</h2>
        <ol>
            <li>piątek wieczór</li>
            <li>sobota</li>
            <li>niedziela</li>
        </ol>
        <?php
            $conn = mysqli_connect('localhost', 'root', '', 'quotes');
            $dzien = date('N');
            $piatek = 5;
            if ($dzien == 5 || $dzien == 6 || $dzien == 7){
                $dopiatku = 0;
            }
            else{
                $dopiatku = 5 - $dzien;
            }
            echo "<h3>Dni do weekendu: $dopiatku</h3>";
        ?>
    </section>
    <main>
        <q>
            <?php
                $query = "SELECT quote, author FROM daily WHERE day = $dzien;";
                $result = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_array($result)){
                    echo "$row[0]";
                }
            ?>
        </q>
        <?php
            $query = "SELECT quote, author FROM daily WHERE day = $dzien;";
            $result = mysqli_query($conn, $query);
            $aktualnydzien = date('d.m.Y');
            while($row = mysqli_fetch_array($result)) {
                echo "-$row[1]";
                echo "<p>Dzisiejsza data: $aktualnydzien</p>";
            }
        ?>
    </main>
    <footer>
        <p>autor: Hoodati</p>
    </footer>
</body>
</html>