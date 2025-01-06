<?php
    $conn = mysqli_connect('localhost', 'root', '', 'portal');
?>
<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <title>Portal społecznościowy</title>
        <link rel="stylesheet" type="text/css" href="styl5.css">
    </head>
    <body>
        <header>
            <section id="blok1">
                <h2>Nasze osiedle</h2>
            </section>
            <section id="blok2">
                <?php
                    $query = "SELECT COUNT(*) FROM dane;";
                    $result = mysqli_query($conn, $query);

                    while ($row = mysqli_fetch_row($result)){
                        echo "<h5>Liczba użytkowników portalu: $row[0]</h5>";
                    }
                ?>
            </section>
        </header>
        <section id="lewy">
            <h3>Logowanie</h3>
            <form action="" method="POST">
                <label for="login">
                    login<br>
                    <input type="text" name="login">
                </label><br>
                <label for="haslo">
                    hasło<br>
                    <input type="password" name="haslo">
                </label><br>
                <input type="submit" name="wyslij" value="Zaloguj">
            </form>
        </section>
        <section id="prawy">
            <h3>Wizytówka</h3>
            <?php
                if (isset($_POST['wyslij'])){
                    if (!empty($_POST['login']) && !empty($_POST['haslo'])){
                        $login = $_POST['login'];
                        $haslo = $_POST['haslo'];
                        $query2 = "SELECT haslo FROM uzytkownicy WHERE login = '$login';";
                        $result2 = mysqli_query($conn, $query2);
                        
                        if ($row = mysqli_fetch_array($result2)){
                            if (sha1($haslo) == $row[0]){
                                $query3 = "SELECT login, rok_urodz, przyjaciol, hobby, zdjecie FROM uzytkownicy JOIN dane ON uzytkownicy.id = dane.id WHERE login = '$login';";
                                $result3 = mysqli_query($conn, $query3);

                                while ($row = mysqli_fetch_array($result3)){
                                    echo "<section>";
                                    echo "<img src='$row[4]' alt='osoba'>";
                                    // $wiek = date('Y') - $row[1];
                                    $wiek = 2025 - $row[1];
                                    echo "<h4>$login ($wiek)</h4>";
                                    echo "<p>hobby: $row[3]</p>";
                                    echo "<h1><img src='icon-on.png'> $row[2]</h1>";
                                    echo "<a href='dane.html'><button type='button'>Więcej informacji</button></a></section>";
                                }
                            }
                            else {
                                echo "hasło nieprawidłowe";
                            }
                        }
                        else {
                            echo "login nie istnieje";
                        }

                    }
                }

                mysqli_close($conn);
            ?>
        </section>
        <footer>
            <p>Stronę wykonał: 44444444444</p>
        </footer>
    </body>
</html>