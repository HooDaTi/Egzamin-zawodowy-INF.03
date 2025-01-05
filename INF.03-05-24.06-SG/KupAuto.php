<?php
    $conn = mysqli_connect('localhost', 'root', '', 'kupauto');
?>
<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <title>Komis aut</title>
        <link rel="stylesheet" type="text/css" href="styl.css">
    </head>
    <body>
        <header>
            <h1><em>KupAuto!</em> Internetowy Komis Samochodowy</h1>
        </header>
        <main>
            <section id="blok1">
                <?php
                    $query = "SELECT model, rocznik, przebieg, paliwo, cena, zdjecie FROM samochody WHERE id = 10;";
                    $result = mysqli_query($conn, $query);

                    while ($row = mysqli_fetch_array($result)) {
                        echo "<img src='$row[5]' alt='oferta dnia'>";
                        echo "<h4>Oferta Dnia: Toyota $row[0]</h4>";
                        echo "<p>Rocznik: $row[1], przebieg: $row[2], rodzaj paliwa: $row[3]</p>";
                        echo "<h4>Cena: $row[4]</h4>";
                    }
                ?>
            </section>
            <section id="blok2">
                <h2>Oferty Wyróżnione</h2>
                <?php
                    $query = "SELECT nazwa, model, rocznik, cena, zdjecie FROM marki JOIN samochody ON marki.id = samochody.marki_id WHERE wyrozniony = 1 LIMIT 4;";
                    $result = mysqli_query($conn, $query);

                    while ($row = mysqli_fetch_array($result)) {
                        echo "<section><img src='$row[4]' alt='$row[1]'>";
                        echo "<h4>$row[0] $row[1]</h4>";
                        echo "<p>Rocznik: $row[2]</p>";
                        echo "<h4>Cena: $row[3]</h4></section>";
                    }
                ?>
            </section>
            <section id="blok3">
                <h2>Wybierz markę</h2>
                <form action="" method="POST">
                    <select name="marka">
                        <?php
                            $query = "SELECT nazwa FROM marki;";
                            $result = mysqli_query($conn, $query);

                            while ($row = mysqli_fetch_array($result)){
                                echo "<option value='$row[0]'>$row[0]</option>";
                            }
                        ?>
                    </select>
                    <button type="submit" name="wyslij">Wyszukaj</button>
                </form>
                <?php
                    if (isset($_POST['wyslij'])){
                        if (isset($_POST['marka'])){
                            $marka = $_POST['marka'];
                            $query = "SELECT model, cena, zdjecie FROM samochody JOIN marki ON marki_id = marki.id WHERE nazwa = '$marka';";
                            $result = mysqli_query($conn, $query);

                            while ($row = mysqli_fetch_array($result)){
                            echo "<section><img src='$row[2]' alt='$row[0]'>";
                            echo "<h4>$marka $row[0]</h4>";
                            echo "<h4>Cena: $row[1]</h4></section>";
                            }
                        }
                    }
                    mysqli_close($conn);
                ?>
            </section>
        </main>
        <footer>
            <p>Stronę wykonał: 44444444444</p>
            <p><a href="http://firmy.pl/komis">Znajdź nas także</a></p>
        </footer>
    </body>
</html>