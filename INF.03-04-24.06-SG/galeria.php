<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Galeria</title>
    <link rel="stylesheet" type="text/css" href="styl.css">
</head>
<body>
    <header>
        <h1>Zdjęcia</h1>
    </header>
    <section id="lewy">
        <h2>Tematy zdjęć</h2>
        <ol>
            <li>Zwierzęta</li>
            <li>Krajobrazy</li>
            <li>Miasta</li>
            <li>Przyroda</li>
            <li>Samochody</li>
        </ol>
    </section>
    <main>
        <?php
            $conn = mysqli_connect('localhost', 'root', '', 'galeria');
            
            $query = "SELECT plik, tytul, polubienia, imie, nazwisko FROM zdjecia JOIN autorzy ON autorzy_id = autorzy.id ORDER BY nazwisko ASC;";
            $result = mysqli_query($conn, $query);

            while ($row = mysqli_fetch_array($result)) {
                echo "<section><img src='$row[0]' alt='zdjęcie'>";
                echo "<h3>$row[1]</h3>";
                if ($row[2] > 40){
                    echo "<p>Autor: $row[3] $row[4].<br> Wiele osób polubiło ten obraz</p>";
                }
                else {
                    echo "<p>Autor: $row[3] $row[4]</p>";
                }
                echo "<a href='$row[0]' download>Pobierz</a></section>";
            }
        ?>
    </main>
    <section id="prawy">
        <h2>Najbardziej lubiane</h2>
        <?php
            $query2 = "SELECT tytul, plik FROM zdjecia WHERE polubienia >= 100;";
            $result2 = mysqli_query($conn, $query2);

            while ($row = mysqli_fetch_array($result2)) {
                echo "<img src='$row[1]' alt='$row[0]'>";
            }

            mysqli_close($conn);
        ?>
        <strong>Zobacz wszystkie nasze zdjęcia</strong>
    </section>
    <footer>
        <h5>Stronę wykonał: 44444444444</h5>
    </footer>
</body>
</html>