<html lang="pl">
<?php
$dbhost = "localhost";
$dbname = "podroze";
$dbuser = "root";
$dbpass = "";

$conn = mysqli_connect($dbhost, $dbuser, $dbpass);
mysqli_select_db($conn, $dbname);
mysqli_query($conn, "SET CHARACTER SET UTF8");

?>


<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styl9.css">
    <title>Poznaj Europę</title>
</head>
<body>
    <header>
        <h1>BIURO PODRÓŻY</h1>
    </header>
    <section id="blewy">
        <h2>Promocje</h2>
        <table>
            <tr>
                <td>Warszawa</td>
                <td>od 600zł</td>
            </tr>
            <tr>
                <td>Wenecja</td>
                <td>od 1200 zł</td>
            </tr>
            <tr>
                <td>Paryż</td>
                <td>od 1200 zł</td>
            </tr>
        </table>
    </section>
    <section id="bsrodkowy">
        <h2>W tym roku jedziemy do...</h2>
        <?php
        $query = "SELECT nazwaPliku, podpis FROM zdjecia ORDER BY podpis;";
        $result = mysqli_query($conn, $query);
        while($row = $result -> fetch_array()) {
            echo "<img src='$row[0]' alt='$row[1]' title='$row[1]'>";
        }
        ?>
    </section>
    <section id="bprawy">
        <h2>Kontakt</h2>
        <a href="mailto:biuro@wycieczki.pl">napisz do nas</a> 
        <p>telefon: 444555666</p>
    </section>
    <section id="bdane">
        <h3>W poprzednich latach byliśmy...</h3>
        <ol>
        <?php
        $query = "SELECT cel, dataWyjazdu FROM wycieczki WHERE dostepna = 0;";
        $result = mysqli_query($conn, $query);
        while($row = mysqli_fetch_array($result)) {
            echo "<li>Dnia $row[1] pojechaliśmy do $row[0]</li>";
        }
        ?>
        </ol>
    </section>
    <footer>
        <p>Stronę wykonał: 14</p>
    </footer>


</body>
</head>
</html>

