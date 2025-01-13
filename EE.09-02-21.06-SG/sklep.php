<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Warzywniak</title>
    <link rel="stylesheet" type="text/css" href="styl2.css">
</head>
<body>
    <header>
        <section id="blok1">
            <h1>Internetowy sklep z eko-warzywami</h1>
        </section>
        <section id="blok2">
            <ol>
                <li>warzywa</li>
                <li>owoce</li>
                <li><a href="https://terapiasokami.pl" target="_blank">soki</a></li>
            </ol>
        </section>
    </header>
    <main>
        <?php
            $conn = mysqli_connect('localhost', 'root', '', 'dane2');
            $query = "SELECT nazwa, ilosc, opis, cena, zdjecie FROM produkty WHERE Rodzaje_id = 1 OR Rodzaje_id = 2;";
            $result = mysqli_query($conn, $query);

            while($row = mysqli_fetch_array($result)) {
                echo "<section>";
                echo "<img src='$row[4]' alt='warzywniak'>";
                echo "<h5>$row[0]</h5>";
                echo "<p>opis: $row[2]</p>";
                echo "<p>na stanie: $row[1]</p>";
                echo "<h2>$row[3] zł</h2>";
                echo "</section>";
            }
        ?>
    </main>
    <footer>
        <form action="sklep.php" method="POST">
            <label>
                Nazwa: 
                <input type="text" name="nazwa" id="nazwa">
            </label>
            <label>
                Cena:
                <input type="text" name="cena" id="cena">
            </label>
            <button type="submit" name="wyslij">Dodaj produkt</button>
        </form>
        Stronę wykonał: 44444444444
    </footer>
    <?php
        if (!empty($_POST['nazwa']) && !empty($_POST['cena'])) {
            $nazwa = $_POST['nazwa'];
            $cena = $_POST['cena'];
            $query2 = "INSERT INTO `produkty`(`Rodzaje_id`, `Producenci_id`, `nazwa`, `ilosc`, `opis`, `cena`, `zdjecie`) VALUES ('1','4','$nazwa','10','',$cena,'owoce.jpg');";
            $result2 = mysqli_query($conn, $query2);
        }
        mysqli_close($conn);
    ?>
</body>
</html>