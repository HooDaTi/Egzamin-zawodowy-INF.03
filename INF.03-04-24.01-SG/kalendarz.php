<?php
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbname = 'terminarz';

    $conn = mysqli_connect($dbhost, $dbuser, '', $dbname);
    mysqli_select_db($conn, $dbname);
?>
<html lang="PL">
    <head>
        <meta charset="UTF-8">
        <title>Zadania na lipiec</title>
        <link href="styl6.css" rel="stylesheet">
    </head>
    <body>
        <header>
            <div id="first-header-block">
                <img src="logo1.png" alt="lipiec">
            </div>
            <div id="second-header-block">
                <h1>TERMINARZ</h1>
                <p>najbliższe zadania: <?php
                $query = "SELECT DISTINCT wpis FROM zadania WHERE wpis <> '' AND dataZadania >= '2020-07-01' AND dataZadania <= '2020-07-07';";
                $result = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_array($result)) {
                    echo "$row[0]; ";
                }
                ?></p>
            </div>
        </header>
        <main>
        <?php 
            $query = "SELECT dataZadania, wpis FROM zadania WHERE miesiac = 'lipiec';";
            $result = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_array($result)){
                echo '<section class="el-kalendarza"><h6>'.$row['dataZadania'].'</h6><p>'.$row['wpis'].'</p></section>';
            }
            mysqli_close($conn);
        ?>
        </main>
        <footer>
            <a href="sierpien.html">Terminarz na sierpień</a>
            <p>Stronę wykonał: 44444444444</p>
        </footer>
    </body>
</html>