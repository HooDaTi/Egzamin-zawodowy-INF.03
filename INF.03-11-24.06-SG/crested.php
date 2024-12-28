<?php
    $conn = mysqli_connect('localhost', 'root', '', 'hodowla');
    mysqli_select_db($conn, 'hodowla');
?>

<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <title>Hodowla świnek morskich</title>
        <link rel="stylesheet" type="text/css" href="styl.css">
    </head>
    <body>
        <header>
            <h1>Hodowla świnek morskich - zamów świnkowe maluszki</h1>
        </header>
        <section id="lewy">
            <a href="peruwianka.php">Rasa Peruwianka</a>
            <a href="american.php">Rasa American</a>
            <a href="crested.php">Rasa Crested</a>
        </section>
        
        <section id="prawy">
            <h3>Poznaj wszystkie rasy świnek morskich</h3>
            <ol>
                <?php
                    $query = "SELECT rasa FROM rasy;";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<li>$row[0]</li>";
                    }
                ?>
            </ol>
        </section>
        <main>
            <img src="crested.jpg" alt="Świnka morska rasy crested">
            <?php
                $query = "SELECT DISTINCT data_ur, miot, rasa FROM swinki JOIN rasy ON swinki.rasy_id = rasy.id WHERE rasy_id = 7;";
                $result = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_array($result)){
                    echo "<h2>Rasa: $row[2]</h2>";
                    echo "<p>Data urodzenia: $row[0]</p>";
                    echo "<p>Oznaczenie miotu: $row[1]</p>";
                }
            ?>
            <hr>
            <h2>Świnki w tym miocie</h2>
            <?php
                $query = "SELECT imie, cena, opis FROM swinki WHERE rasy_id = 7;";
                $result = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_array($result)){
                    echo "<h3>$row[0] - $row[1]zł</h3>";
                    echo "<p>$row[2]</p>";
                }
                mysqli_close($conn);
            ?>
        </main>
        <footer>
            <p>Stronę wykonał: 44444444444</p>
        </footer>
    </body>
</html>