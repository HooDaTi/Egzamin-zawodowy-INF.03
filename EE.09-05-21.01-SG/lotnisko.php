<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Port Lotniczy</title>
    <link rel="stylesheet" type="text/css" href="styl5.css">
</head>
<body>
    <header>
        <section id="gora1">
            <img src="zad5.png" alt="logo lotnisko">
        </section>
        <section id="gora2">
            <h1>Przyloty</h1>
        </section>
        <section id="gora3">
            <h3>przydatne linki</h3>
            <a href="kwerendy.txt" target="_blank">Pobierz...</a>
        </section>
    </header>
    <main>
        <table>
            <tr>
                <th>czas</th>
                <th>kierunek</th>
                <th>numer rejsu</th>
                <th>status</th>
            </tr>
            <?php
                $conn = mysqli_connect('localhost', 'root', '', 'egzamin');
                $query = "SELECT czas, kierunek, nr_rejsu, status_lotu FROM przyloty ORDER BY czas ASC;";
                $result = mysqli_query($conn, $query);

                while ($row = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo "<td>$row[0]</td>";
                    echo "<td>$row[1]</td>";
                    echo "<td>$row[2]</td>";
                    echo "<td>$row[3]</td>";
                    echo "</tr>";
                }

                mysqli_close($conn);
            ?>
        </table>
    </main>
    <footer>
        <section id="dol1">
            <?php
                if (isset($_COOKIE['ciastko'])){
                    echo "<p><i>Witaj ponownie na stronie lotniska</i></p>";
                }
                else {
                    setcookie('ciastko', 1, time() + 7200);
                    echo "<p><b>Dzień dobry! Strona lotniska używa ciasteczek</b></p>";
                }
            ?>
        </section>
        <section id="dol2">
            Autor: 44444444444
        </section>
    </footer>
</body>
</html>