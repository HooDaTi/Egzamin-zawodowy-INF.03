<?php
    $conn = mysqli_connect('localhost', 'root', '', 'wazenietirow');
?>


<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <title>Ważenie samochodów ciężarowych</title>
        <link rel="stylesheet" type="text/css" href="styl.css">
    </head>
    <body>
        <header>
            <section id="blok1">
                <h1>Ważenie pojazdów we Wrocławiu</h1>
            </section>
            <section id="blok2">
                <img src="obraz1.png" alt="waga">
            </section>
        </header>
        <section id="lewy">
            <h2>Lokalizacje wag</h2>
            <ol>
                <?php
                    $query = "SELECT ulica FROM lokalizacje;";
                    $result = mysqli_query($conn, $query);

                    while ($row = mysqli_fetch_array($result)) {
                        echo "<li>ulica $row[0]</li>";
                    }
                ?>
            </ol>
            <h2>Kontakt</h2>
            <a href="mailto:wazenie@wroclaw.pl">napisz</a>
        </section>
        <main>
            <h2>Alerty</h2>
            <table>
                <tr>
                    <th>rejestracja</th>
                    <th>ulica</th>
                    <th>waga</th>
                    <th>dzień</th>
                    <th>czas</th>
                </tr>
                <?php
                    $query = "SELECT rejestracja, ulica, waga, dzien, czas FROM wagi JOIN lokalizacje ON lokalizacje_id = lokalizacje.id WHERE waga > 5;";
                    $result = mysqli_query($conn, $query);

                    while ($row = mysqli_fetch_array($result)) {
                        echo "<tr>";
                        echo "<td>$row[0]</td>";
                        echo "<td>$row[1]</td>";
                        echo "<td>$row[2]</td>";
                        echo "<td>$row[3]</td>";
                        echo "<td>$row[4]</td></tr>";
                    }
                ?>
            </table>
            <?php
                $query = "INSERT INTO `wagi`(`lokalizacje_id`, `waga`, `rejestracja`, `dzien`, `czas`) VALUES ('5', FLOOR(1 + RAND() * 10), 'DW12345', CURRENT_DATE, CURRENT_TIME);";
                mysqli_query($conn, $query);
                header("refresh: 10;");
                mysqli_close($conn);
            ?>
        </main>
        <section id="prawy">
            <img src="obraz2.jpg" alt="tir" id="img-2">
        </section>
        <footer>
            <p>Stronę wykonał: 44444444444</p>
        </footer>
    </body>
</html>