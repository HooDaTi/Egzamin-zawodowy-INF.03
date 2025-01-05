<?php
    $conn = mysqli_connect('localhost','root','','rzeki');
?>
<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <title>Poziomy rzek</title>
        <link rel="stylesheet" type="text/css" href="styl.css">
    </head>
    <body>
        <header>
            <section id="blok1">
                <img src="obraz1.png" alt="Mapa Polski">
            </section>
            <section id="blok2">
                <h1>Rzeki w województwie dolnośląskim</h1>
            </section>
        </header>
        <menu>
            <form action="poziomRzek.php" method="POST">
                <label for="wszystkie" class="radio">
                    <input type="radio" id="wszystkie" value="wszystkie"  name="guzik">
                    Wszystkie
                </label>
                <label for="ostrzegawczy" class="radio">
                    <input type="radio" id="ostrzegawczy"   value="ostrzegawczy"  name="guzik">
                    Ponad stan ostrzegawczy
                </label>
                <label for="alarmowy" class="radio">
                    <input type="radio" id="alarmowy" value="alarmowy"  name="guzik">
                    Ponad stan alarmowy
                </label>
                <button type="submit" name="wyslij">Pokaż</button>
            </form>
        </menu>
        <section id="lewy">
            <h3>Stany na dzień 2022-05-05</h3>
            <table>
                <tr>
                    <th>Wodomierz</th>
                    <th>Rzeka</th>
                    <th>Ostrzegawczy</th>
                    <th>Alarmowy</th>
                    <th>Aktualny</th>
                </tr>
                <?php
                    if(isset($_POST['wyslij'])){
                        if(isset($_POST['guzik'])){
                            $wybrany = $_POST['guzik'];
                            if($wybrany == 'wszystkie'){
                                $query = "SELECT nazwa, rzeka, stanOstrzegawczy, stanAlarmowy, stanWody FROM wodowskazy JOIN pomiary ON wodowskazy.id = pomiary.wodowskazy_id WHERE dataPomiaru = '2022-05-05';";
                            }
                            else if($wybrany == 'ostrzegawczy'){
                                $query = "SELECT nazwa, rzeka, stanOstrzegawczy, stanAlarmowy, stanWody FROM wodowskazy JOIN pomiary ON wodowskazy.id = pomiary.wodowskazy_id WHERE dataPomiaru = '2022-05-05' AND stanWody > stanOstrzegawczy;";
                            }
                            else if($wybrany == 'alarmowy'){
                                $query = "SELECT nazwa, rzeka, stanOstrzegawczy, stanAlarmowy, stanWody FROM wodowskazy JOIN pomiary ON wodowskazy.id = pomiary.wodowskazy_id WHERE dataPomiaru = '2022-05-05' AND stanWody > stanAlarmowy;";
                            }
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_array($result)){
                                echo "<tr><td>$row[0]</td>
                                        <td>$row[1]</td>
                                        <td>$row[2]</td>
                                        <td>$row[3]</td>
                                        <td>$row[4]</td></tr>";
                            }
                        }
                    }
                ?>
            </table>
        </section>
        <section id="prawy">
            <h3>Informacje</h3>
            <ul>
                <li>Brak ostrzeżeń o burzach z gradem</li>
                <li>Smog w mieście Wrocław</li>
                <li>Silny wiatr w Karkonoszach</li>
            </ul>
            <h3>Średnie stany wód</h3>
            <?php
                $query = "SELECT dataPomiaru, AVG(stanWody) FROM pomiary GROUP BY dataPomiaru;";
                $result = mysqli_query($conn, $query);

                while($row = mysqli_fetch_array($result)){
                    echo "<p>$row[0]: $row[1]</p>";
                }
                mysqli_close($conn);
            ?>
            <a href="https://komunikaty.pl">Dowiedz się więcej</a>
            <img src="obraz2.jpg" alt="rzeka">
        </section>
        <footer>
            <p>Stronę wykonał: 44444444444</p>
        </footer>
    </body>
</html>